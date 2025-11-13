<?php
namespace App\Models; // <-- Namespace phải là 'App\Models'

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    // Đảm bảo các cột này có trong $fillable
    protected $fillable = [
        'code', 'customer_name', 'customer_phone', 'customer_email', 
        'customer_address', 'total', 'payment_status', 'status', 'user_id'
    ];
    
    public function items() {
        return $this->hasMany(OrderItem::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}