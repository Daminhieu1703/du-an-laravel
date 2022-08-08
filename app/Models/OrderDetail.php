<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
        'name',
        'price',
        'amount',
        'img',
        'size',
        'sector',
        'user_id',
        'product_id',
        'order_id',
    ];
    public function products(){
        return $this->hasMany(Product::class,'product_id','id');
    }
    public function User()
    {
        return $this->hasOne(User::class);
    }
    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
