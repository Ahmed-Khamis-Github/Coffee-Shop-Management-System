<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use Illuminate\Http\Request;

class ChecksOfflineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $orders = Order::with('items')->where('order_type', 'offline')->get();
        
         
        return view('dashboard.orders.checks', compact('users', 'orders'));
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
        dd($request) ;
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
        $Order =Order::findOrFail($id) ;

        $Order->update([
            'order_status'=>'delivered'
        ]) ;

        return redirect()->route('checks.index') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
     
      
        //
    }

    //make filter using Date
    public function filter(Request $request)
    {
        $users = User::all();
        $orders = Order::with('items')->where('order_type', 'offline');
     
        $dateFrom = $request->dateFrom;
        $dateTo = $request->dateTo;
        $userSelect = $request->userSelect;
    
        if ($dateFrom && $dateTo) {
            $orders->whereDate('created_at', '>=', date('Y-m-d', strtotime($dateFrom)))
                   ->whereDate('created_at', '<=', date('Y-m-d', strtotime($dateTo)));
        }
    
        if ($userSelect) {
            $orders->where('user_id', $userSelect);
        }
    
        $orders = $orders->get();
    
        return view('dashboard.orders.checks', compact('orders', 'users'));
    }
}
