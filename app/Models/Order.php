<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id' , 
        'product_id',
        'total_price',
        'status'
    ];

    public function product (){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function isPending(){
        return $this->status === 'pending';
    }

    public function isShipped(){
        return $this->status === 'shipped';
    }

    public function isDelivered(){
        return $this->status === 'delivered';
    }
    public function isCanceled(){
        return $this->status === 'canceled';
    }

}
