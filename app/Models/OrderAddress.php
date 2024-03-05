<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    protected $table='order_address';
    use HasFactory;
    public $fillable=[
        'order_id','firstname','lastname','email','phone','street_address','city',
    ];
}
