<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_id';
    public $incrementing = false;
    protected $fillable = [
        'order_id',
        'order_date',
        'pickup_date',
        'process_date',
        'delivery_date',
        'received_date',
        'message_order',
        'total_price',
        'address_id',
        'user_id',
        'status',
        'order_method',
        'courier_id'
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function usercourrier()
    {
        return $this->belongsTo(User::class, 'courrier_id', 'courrier_id');
    }
    // Relasi dengan model Address
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'address_id');
    }

    // Relasi dengan model OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }

}
