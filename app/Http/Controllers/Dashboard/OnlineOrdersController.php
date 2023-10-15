<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OnlineOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('products')->get();

        return view('dashboard.orders.index', compact('orders'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order_items = OrderProduct::where('order_id', $id)->get();

        $totalPrice = $order_items->sum(function ($item) {
            return $item->price * $item->quantity;
        });


        return view('dashboard.orders.show', compact('order_items', 'totalPrice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail($id);

 

        if($order->order_status==="Awaiting_Approval")
        {
            $order->update(['order_status'=>'Working_On_It']);
        }elseif($order->order_status==="Working_On_It")
        {
            $order->update(['order_status' => 'delivered']);
        } 
        return redirect()->route('online.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('online.index');
    }
}
