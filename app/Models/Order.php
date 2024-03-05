<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
      'user_id','status'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function products(){
        return $this->belongsToMany(Product::class,'order_product','order_id','product_id','id','id')
            ->withPivot('product_name','quantity');
    }
    public function address(){
        return $this->hasMany(OrderAddress::class,'order_id','id');

    }
}
