<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Trait\MessageTrait;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    use MessageTrait;
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
    public function store(ProductRequest $request)
    {
        $validator = $request->validated();
        $product = Product::create($request->all());
        if ($product) {
            return $this->successMessage('product has been stored','200');
        }
        else
        {
            return $this->errorMessage('product has not been stored','402');
        }
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
    public function update(ProductRequest $request, Product $product)
    {

        $request->validated();
        $updated = $product->update($request->all());
        if ($updated) {
            return $this->successMessage('product has been updated', 200);
        }
        else{
            return $this->errorMessage('product has not been updated', 402);

        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Product::destroy($id);
        if ($product){
            return $this->successMessage('product has been deleted','200');
        }
        else{
            return $this->errorMessage('product has not been deleted','402');

        }
    }
}
