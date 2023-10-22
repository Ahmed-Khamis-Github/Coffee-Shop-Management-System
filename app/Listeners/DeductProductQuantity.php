<?php

namespace App\Listeners;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class DeductProductQuantity
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(): void
    {
        if (!request()->session()->has('cart')) {
            $cart = [];
        } else {
            $cart = request()->session()->get('cart');
        }
        
          foreach($cart as $id=>$item)
        {
           
            Product::where('id','=',$id)->update([
                'quantity'=>DB::raw('quantity-'.$item['quantity']) 
            ]);
        }
    }
}
