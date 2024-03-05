<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        return $this->middleware('auth:sanctum');
    }
    public function index()
    {
        $products=Product::all();
        return response()->json($products);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
            'quantity'=>'required',
            'image'=>'required',
        ]);
        Product::create($request->all());
        return response()->json('saved',200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json($product,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Product $product)
    {

        $request->validate([
            'name'=>'required|max:255',
            'quantity'=>'required',
            'image'=>'required',
        ]);
        $product->update($request->all());
        return response()->json($product,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Product::destroy($id);
        return response()->json('Deleted Successfully',200);
    }
}
