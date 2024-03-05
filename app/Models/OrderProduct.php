<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    use HasFactory;
    public $incrementing=true;
    public $timestamps=false;
    protected $fillable=[
        'order_id','product_id','quantity','product_name'
    ];

    public function product(){
        return $this->belongsTo(Product::class)->withDefault([
            'name'=>$this->prduct_name
        ]);
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
