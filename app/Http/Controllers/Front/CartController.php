<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!$request->session()->has('cart')) {
            $cart = [];
        } else {
            $cart = $request->session()->get('cart');
            // dd(count($cart)) ;
        }

        $items = collect($cart) ;
        // dd($items) ;
 
            $totalPrice = $items->sum(function ($item) {
                return $item['price'] ;
            });

            // dd($totalPrice) ;
       
        return view('front.cart',compact('items','totalPrice'));
    }


    public function addToCart(Request $request, $id)
    {
        // if($request->session()->has('cart')){
        //     $cart = $request->session()->get('cart');
        //     dd($cart) ;
        //     $numberOfArrays = count($cart);
        //     dd($numberOfArrays) ;
        // }
 
        $product = Product::findOrFail($id) ;
         $productData = [
            'id' => $product->id,
            'name' => $product->name,
            'image' => $product->image,
            'description' => $product->description,
            'price' => $product->price,
            'quantity'=> '1'
           
        ];
 
        if (!$request->session()->has('cart')) {
            $cart = [];
        } else {
            $cart = $request->session()->get('cart');
        }

        $cart[$product->id] = $productData;

         

        $request->session()->put('cart', $cart);
 
        // Optionally, you can return a response to indicate success.
        return redirect()->route('carts.index')->with('success', 'Item added to cart.');
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
        $itemId = $request->input('id');
        $newQuantity = $request->input('quantity');

        // Retrieve the cart data from the session
        $cart = session('cart', []);

        // Update the quantity for the specific item
        foreach ($cart as &$item) {
            if ($item['id'] == $itemId) {
                $item['quantity'] = $newQuantity;
            }
        }

        // Update the cart data in the session
        session(['cart' => $cart]);
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
    public function update(Request $request)
    {
        dd($request->all()) ;
        $quantity = $request->input('quantity');
 
        // Cart::update($id, ['quantity' => $quantity]);

        return redirect()->route('carts.index')->with('success', 'Cart item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request , string $id)
    {
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
    
            if (isset($cart[$id])) {
                unset($cart[$id]);
                $request->session()->put('cart', $cart);
                return redirect()->route('carts.index')->with('success', 'Item removed from cart.');
            }
        }
    }
}
