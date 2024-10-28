<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
         * Just the current order related with the current customer
         */
     
        $orders = Order::where('user_id' , auth()->user()->id)->get();
        return response()->json(OrderResource::collection($orders),200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request) 
    {
        $userId = auth()->user()->id;
        $product= Product::find($request->product_id);
        
        $order = Order::create([
            'user_id'       =>$userId,
            'product_id'    =>$request->product_id,
            'total_price'   =>$product->price
        ]);
        return response()->json([
            'message' => 'Order created successfully',
            'order' => new OrderResource($order)]
            ,201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return response()->json(new OrderResource($order),200); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return response()->json(new OrderResource($order),200); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json([
            'message' => 'Deleteing order done'
        ],200); 

    }
}
