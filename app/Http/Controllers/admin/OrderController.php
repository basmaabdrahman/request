<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders=Order::all();
        $address=OrderAddress::all();
        $items=OrderProduct::all();
        return view('layouts.partial.master',compact(['orders','items','address']));
    }
}
