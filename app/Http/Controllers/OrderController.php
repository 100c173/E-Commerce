<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Balance_user;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check_user');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        
        Order::create($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view ('order.edit',$order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, Order $order)
    {
        $order->update($request->all()) ; 
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }

    /**
     * 
     */
    public function updateStatus(Request $request , Order $order){
       
        $order->update([
            'status' => $request->status
        ]);
        return redirect()->route('orders.index');
    }

    public function finsh( Order $order){
        $order->update(['status' => 'delivered']);
        return redirect()->route('orders.index');
    }

    public function forceDelete(string $id){
        $order =Order::withTrashed()->find($id);
        $order->forceDelete();
    }

    public function restore(string $id){
        $order =Order::withTrashed()->find($id);
        $order->restore();
    }

}
