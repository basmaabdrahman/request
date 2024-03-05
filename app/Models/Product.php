<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillable=[
        'name','quantity','image',
    ];
    public function cart(){
        return $this->hasMany(Cart::class,'product_id');
    }
}
