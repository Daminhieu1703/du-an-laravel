<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'description',
        'amount',
        'img',
        'height',
        'width',
        'status',
        'size_id',
        'sector_id'
    ];
    public function sector(){
        return $this->belongsTo(Sector::class,'sector_id','id');
    }
    public function size(){
        return $this->belongsTo(Size::class,'size_id','id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'product_id','id');
    }
}
