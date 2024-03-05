<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function __construct(){
        return $this->middleware('auth:sanctum')->except('login','register');
    }
    public function index()
    {
        return Cart::all()->load('product');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user=Auth::user()->id;
        $request->validate([
            'product_id'=>'required',
            'quantity'=>'required',
        ]);
        $pro=Cart::create([
            'user_id'=>$user,
            'product_id'=>$request->product_id,
            'quantity'=>$request->quantity,
        ]);
        return response()->json($pro,200);
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
        $product=Cart::findorFail($id);
        $request->validate([
            'product_id'=>'required',
            'quantity'=>'required',
        ]);
        $product->update([
            'product_id'=>$request->product_id,
            'quantity'=>$request->quantity,
        ]);
        return response()->json($product,200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Cart::findorFail($id);
        $product->delete();
        return response()->json('deleted successfully','200');
    }
}
