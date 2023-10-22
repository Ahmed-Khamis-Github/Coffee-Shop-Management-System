<?php

namespace App\Http\Controllers\Front;

use App\Events\Order as EventsOrder;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Throwable;
use RealRashid\SweetAlert\Facades\Alert;

use Stripe\StripeClient;
use Stripe\Exception\CardException;
use Exception;

class CheckOutController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request)
	{
		$totalPrice = $this->getCartTotalPrice($request);
		return view('front.checkout', compact('totalPrice'));
	}
	private function getCartTotalPrice(Request $request)
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
		return $totalPrice;
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

	public function test(Request $request)
	{
	}
	private function createOrder($request)
	{
		$name = request()->input('user_name');
		$address = request()->input('user_address');
		$mobile = request()->input('mobile_number');
		$payment_method = $request->payment_method;
		$user = $request->user();
		$cart = $request->session()->get('cart');
		Alert::success('Order created', 'Please waite for admin approval');
		DB::beginTransaction();
		try {

			$order = Order::create([
				'user_id' => $user->id,
				'user_name' => $user->name,
				'user_address' => $address,
				'mobile_number' => $mobile,
				'payment_method' => $payment_method,
				'order_type' => 'online',
			]);

			// dd($order) ;

			foreach ($cart as $item) {
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
			event(new EventsOrder($order));
			session()->forget('cart');
		} catch (Throwable $e) {
			DB::rollBack();
			throw $e;
		}
	}

	public function cardPayment(Request $request)
	{
		$totalPrice = $this->getCartTotalPrice($request);
		try {
			$stripe = new StripeClient(env('SECRET_KEY'));

			$stripe->paymentIntents->create([
				'amount' => $totalPrice * 100,
				'currency' => 'usd',
				'payment_method' => $request->payment_method,
				'description' => 'Demo payment with stripe',
				'confirm' => true,
				'receipt_email' => 'm@m.com',
				'return_url' => 'http://localhost:8000/checkout/card_payment_success'
			]);
		} catch (CardException $th) {
			throw new Exception("There was a problem processing your payment", 1);
		}

		$request->merge(['payment_method' => 'visa']);
		$this->createOrder($request);
		// dd($stripe);
		return redirect()->route('orderList')->with('message', 'Your Order is awaiting for approval from admin');
	}

	public function cardPaymentSuccess(Request $request)
	{
		// return route('front.index');
	}
	public function store(Request $request)
	{
		$name = request()->input('user_name');
		$address = request()->input('user_address');
		$mobile = request()->input('mobile_number');
		// dd($cart) ;
		if ($request->payment_method == 'cash') {
			$this->createOrder($request);
			return redirect()->route('orderList')->with('message', 'Your Order is awaiting for approval from admin');
		} elseif ($request->payment_method == 'visa') {
			if($this->getCartTotalPrice($request)==0){
				return to_route('home');
			}
			return view('front.payment', compact('name', 'address', 'mobile'));
		}
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
