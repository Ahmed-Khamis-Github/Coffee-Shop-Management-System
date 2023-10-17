<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->session()->get('cart'));
        if (!$request->session()->has('cart')) {
            $cart = [];
        } else {
            $cart = $request->session()->get('cart');
        }
        // dd($cart) ;

        $items = collect($cart);
        // dd($items) ;

        $totalPrice = $items->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
        return view('front.checkout',compact('totalPrice'));
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
        $cart = $request->session()->get('cart');
        // dd($cart) ;
        $name = request()->input('user_name');
        $address = request()->input('user_address');
        $mobile = request()->input('mobile_number');
 
        


        $user = $request->user();

         


        DB::beginTransaction();
        try {

            $order = Order::create([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_address'=> $address ,
                'mobile_number'=>$mobile ,
                'payment_method' => $request->payment,
                'order_type' => 'online',
            ]);

            // dd($order) ;




            foreach ($cart as $item ) {
                 $product = Product::find($item['id']);
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'product_name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $item['quantity'],
                ]);
            }

            



            DB::commit();

            // event(new OrderCreated($order)) ;

        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        return redirect()->route('home') ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
