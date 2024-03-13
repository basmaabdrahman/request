<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Http\Trait\MessageTrait;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    use MessageTrait;
    /**
     * Display a listing of the resource.
     *
     */
    public function __construct(){
        return $this->middleware('auth:sanctum')->except('login','register');
    }
    public function index()
    {

         Cart::all()->load('product');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CartRequest $request)
    {

        $user=Auth::user()->id;
        $request->validated();
        $pro=Cart::create([
            'user_id'=>$user,
            'product_id'=>$request->product_id,
            'quantity'=>$request->quantity,
        ]);
       if (!$pro){
           return $this->errorMessage('The Product has not been stored','402');
       }
       else{
           return $this->successMessage('The Product has been stored','200');

       }
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
        $updated=$product->update([
            'product_id'=>$request->product_id,
            'quantity'=>$request->quantity,
        ]);
        if ($updated) {
            return $this->successMessage('product has been updated in your cart', 200);
        }
        else{
            return $this->errorMessage('product has not been updated in your cart', 402);

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Cart::findorFail($id);
        $product->delete();
        if ($product){
            return $this->successMessage('product has been deleted','200');
        }
        else{
            return $this->errorMessage('product has not been deleted','402');

        }
    }

}
