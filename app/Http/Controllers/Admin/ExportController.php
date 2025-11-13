<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{
    public function ordersExcel(Request $request)
    {
        $from = $request->input('from'); // YYYY-MM-DD
        $to   = $request->input('to');   // YYYY-MM-DD

        $query = Order::with('items')
            ->when($from, fn($q)=>$q->whereDate('created_at','>=',$from))
            ->when($to, fn($q)=>$q->whereDate('created_at','<=',$to))
            ->orderBy('created_at');

        $orders = $query->get();

        $spreadsheet = new Spreadsheet();
        $sheetOrders = $spreadsheet->getActiveSheet();
        $sheetOrders->setTitle('Orders');

        // Header
        $headers = ['Mã đơn','Khách hàng','SĐT','Email','Tổng (VND)','Trạng thái','Ngày tạo','Sản phẩm','Số lượng','Giá (VND)'];
        $sheetOrders->fromArray($headers, null, 'A1');
        $sheetOrders->getStyle('A1:J1')->getFont()->setBold(true);

        // Rows: each item = one row
        $row = 2;
        foreach ($orders as $o) {
            $created = $o->created_at? $o->created_at->format('Y-m-d H:i') : '';
            foreach ($o->items as $it) {
                $sheetOrders->setCellValue("A{$row}", $o->code);
                $sheetOrders->setCellValue("B{$row}", $o->customer_name);
                $sheetOrders->setCellValue("C{$row}", $o->customer_phone);
                $sheetOrders->setCellValue("D{$row}", $o->customer_email);
                $sheetOrders->setCellValue("E{$row}", (int)$o->total);
                $sheetOrders->setCellValue("F{$row}", $o->status);
                $sheetOrders->setCellValue("G{$row}", $created);
                $sheetOrders->setCellValue("H{$row}", $it->name);
                $sheetOrders->setCellValue("I{$row}", (int)$it->qty);
                $sheetOrders->setCellValue("J{$row}", (int)$it->price);
                $row++;
            }
            if ($o->items->count() === 0) {
                // row for order even if no items (rare)
                $sheetOrders->fromArray([$o->code,$o->customer_name,$o->customer_phone,$o->customer_email,(int)$o->total,$o->status,$created,'',0,0], null, "A{$row}");
                $row++;
            }
        }

        // Autosize columns
        foreach (range('A','J') as $col) {
            $sheetOrders->getColumnDimension($col)->setAutoSize(true);
        }

        // Currency formatting for VND columns (E and J)
        $currencyFormat = '#,##0 "₫"';
        $sheetOrders->getStyle("E2:E{$row}")->getNumberFormat()->setFormatCode($currencyFormat);
        $sheetOrders->getStyle("J2:J{$row}")->getNumberFormat()->setFormatCode($currencyFormat);

        // Summary sheet
        $sheetSummary = new Worksheet($spreadsheet, 'Summary');
        $spreadsheet->addSheet($sheetSummary, 1);

        $sheetSummary->fromArray(['Ngày','Doanh thu (VND)','Số đơn'], null, 'A1');
        $sheetSummary->getStyle('A1:C1')->getFont()->setBold(true);

        // Aggregate revenue by date
        $agg = [];
        foreach ($orders as $o) {
            $d = $o->created_at? $o->created_at->toDateString() : 'N/A';
            if (!isset($agg[$d])) $agg[$d] = ['sum'=>0,'count'=>0];
            $agg[$d]['sum'] += (int)$o->total;
            $agg[$d]['count'] += 1;
        }
        $r = 2;
        ksort($agg);
        foreach ($agg as $d=>$a) {
            $sheetSummary->setCellValue("A{$r}", $d);
            $sheetSummary->setCellValue("B{$r}", (int)$a['sum']);
            $sheetSummary->setCellValue("C{$r}", (int)$a['count']);
            $r++;
        }
        $sheetSummary->getColumnDimension('A')->setAutoSize(true);
        $sheetSummary->getColumnDimension('B')->setAutoSize(true);
        $sheetSummary->getColumnDimension('C')->setAutoSize(true);
        $sheetSummary->getStyle("B2:B{$r}")->getNumberFormat()->setFormatCode($currencyFormat);

        // Filename
        $dateStr = now()->format('Y-m-d');
        $filename = "HoaDon_{$dateStr}.xlsx";

        // Stream response
        return new StreamedResponse(function () use ($spreadsheet) {
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
            'Cache-Control' => 'max-age=0',
        ]);
    }
}