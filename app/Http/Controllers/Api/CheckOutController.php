<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $order=Order::create([
           'user_id'=>$request->user_id,
            'status'=>$request->status,
        ]);
        OrderProduct::create([
            'order_id'=>$order->id
            ,'product_id'=>$request->product_id,
            'quantity'=>$request->quantity,
            'product_name'=>$request->product_name
        ]);
        OrderAddress::create([
            'order_id'=>$order->id
            ,'firstname'=>$request->firstname
            ,'lastname'=>$request->lastname
            ,'email'=>$request->email
            ,'phone'=>$request->phone
            ,'street_address'=>$request->street_address
            ,'city'=>$request->city
        ]);
        return response()->json($request,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
