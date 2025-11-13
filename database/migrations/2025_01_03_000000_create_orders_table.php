<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            // Cột 'code' bị thiếu
            $table->string('code')->unique(); 
            
            // Các cột thông tin khách hàng bị thiếu
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email');
            $table->string('customer_address');
            
            // Cột 'total' (Bạn nên dùng kiểu decimal)
            $table->decimal('total', 10, 0); 
            
            // Cột 'payment_status' bị thiếu
            $table->string('payment_status')->default('pending'); 
            
            // Cột 'status'
            $table->string('status')->default('pending'); 
            
            // Cột 'user_id' (nên cho phép null)
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            
            $table->timestamps(); // (created_at, updated_at)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};