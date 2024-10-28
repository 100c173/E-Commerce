<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Reflector;

class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check_user');
    }
    public function index()
    {
        $products = Product::all();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('product.add',compact('categories'));
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
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show',compact('product'));                                                                
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request,Product $product)
    {
        $product->update([
            'name' => $request -> name ,
            'descroption' => $request->descroption , 
            'price' => $request->price
        ]);
        $product->categories()->sync($request->category_id);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function trashe(){
        $products = Product::onlyTrashed()->get();
        return view('trashed.product',compact('products'));
    }

    public function forceDelete(string $id){
        $product =Product::withTrashed()->find($id);
        $product->forceDelete();
        return redirect()->route('products.trashed');
    }

    public function restore(string $id){
        $product =Product::withTrashed()->find($id);
        $product->restore();
        return redirect()->route('products.trashed');
    }

    public function search (Request $request){
        $product = Product::where('name',$request->name)->first();
        return view('product.search',compact('product'));
    }
}
