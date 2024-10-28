<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index','show');
        $this->middleware('check_user')->except('index','show');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json(ProductResource::collection($products) , 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name ,
            'price'=> $request->price,
            'description' => $request->description
        ]);
        $product->categories()->sync($request->category_id);

        return response()->json(new ProductResource($product),200);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        /**
         *  I pass {{id}} not {{object}} , beacuse wher I use Route Modeling Larvel will search on this product 
         *  And if she not see , Laravel return 404 page , so when I pass id and then 
         *  search on this product , and if not found return json message 
         * 
         * */ 

        $product = Product::find($id);

        if(!isset($product)) return response()->json([ 'message' => 'the product not found'] , 404);

        return response()->json(new ProductResource($product) , 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return response()->json([
            'message' => 'done' , 
            ] , 201
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
