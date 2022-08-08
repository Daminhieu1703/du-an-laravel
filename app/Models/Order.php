<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'name',
        'email',
        'username',
        'phone',
        'address',
        'amount',
        'total',
        'note',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function order_details(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
