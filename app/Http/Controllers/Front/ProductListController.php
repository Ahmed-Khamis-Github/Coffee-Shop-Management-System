<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderProduct;

class ProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $products = Product::paginate(8);
        return view('front.home' , compact('products'));
        
    }
    public function search(Request $request) {
  
        $search = $request->query->get('query');
        $products = Product::where(function($query) use ($search){
          $query->where('name', 'like', "%{$search}%");
        })->paginate(8);
      
        return view('front.home', compact('products'));
      
      }
      


    // to show all orders and order details
    public function orderList(Request $request){
        
    // {     $user = Auth::user();
    //     $orders = $user->orders;

    //     $order_items = OrderProduct::where('order_id', $orders->id)->get();

    //     $totalPrice = $order_items->sum(function ($item) {
    //         return $item->price * $item->quantity;
    //     });


    //     $orderDetails = OrderProduct::whereIn('order_id', $orders->pluck('id'))->get();
    //         return view('front.track', compact('orders', 'orderDetails' , 'totalPrice'));


    //update
    $user = $request->user();
    $user_orders = $user->orders;
    $order = Order::where('user_id', $user->id)->first();

    $order_items = OrderProduct::where('order_id', $order->id)->get();

    // $totalPrice = $order_items->sum(function ($item) {
    //     return $item->price * $item->quantity;
    // });

    $orderDetails = OrderProduct::all();

    return view('front.track', compact('user_orders', 'orderDetails', 'totalPrice'));
    }







    public function update(Request $request , $id){
        $order = Order::findOrFail($id);
        $order->update([
            "order_status"=> "cancelled"
        ]);
        return redirect()->route('orderList');
        
    }
    //make filter using Date
    public function filter(Request $request)
    {
        // $orderDetails = OrderProduct::all();
        $user = Auth::user();
        $orders = $user->orders;
        $orderDetails = OrderProduct::whereIn('order_id', $orders->pluck('id'))->get();

        
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        
        if ($start_date && $end_date) {
            $orders = Order::whereDate('created_at', '>=', date('Y-m-d', strtotime($start_date)))
            ->whereDate('created_at', '<=', date('Y-m-d', strtotime($end_date)))->where('user_id',$user->id)
            ->get();
        } else {
            $orders = [];
        }
    
        return view('front.track', compact('orders','orderDetails'));
    }

    /**
     * Display the specified resource.
     */
}
