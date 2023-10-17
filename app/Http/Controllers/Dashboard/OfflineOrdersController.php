<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Throwable;

class OfflineOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::where('quantity',">","0")->get();
        $users = User::all();
        $rooms = Room::all();
        return view('dashboard.orders.offline', compact('users', 'products', 'rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $selectedProducts = request()->input('selected_products');
        $productQuantities = request()->input('product_quantities');

        $filteredData = collect($selectedProducts)->mapWithKeys(function ($productId) use ($productQuantities) {
            return [
                $productId => $productQuantities[$productId],
            ];
        })->toArray();


        $user = User::findOrFail($request->user_id);

        // dd($selected);
        // dd($request->all(),$filteredData);


        DB::beginTransaction();
        try {

            $order = order::create([
                'user_id' => $request->user_id,
                'user_name' => $user->name,
                'payment_method' => 'cash',
                'order_type' => 'offline',
                'order_status'=>'working_on_it'


            ]);

            // dd($order) ;




            foreach ($filteredData as $item => $quantity) {
                $product = Product::find($item);
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item,
                    'product_name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $quantity,
                ]);
            }

            $user->update([
                'room_id' => $request->room
            ]);



            DB::commit();

            // event(new OrderCreated($order)) ;

        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        return redirect()->route('offline.index');
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
