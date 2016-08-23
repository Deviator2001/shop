<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Order;
use App\Payment;
use App\Http\Requests;
use App\User;
use Sentinel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function show()
    {
        $deliveries = Delivery::pluck('title', 'id');
        $payments = Payment::pluck('title', 'id');
        return view('order.show', compact('deliveries', 'payments'));
    }

    public function orderadd()
    {
        $cart = Session::get('cart');
        $order = Order::create([
            'user_id' => Sentinel::check()->id,
            'email' => Input::get('email'),
            'phone' => Input::get('phone'),
            'first_name' => Input::get('first_name'),
            'last_name' => Input::get('last_name'),
            'delivery_id' => Input::get('delivery_id'),
            'payment_id' => Input::get('payment_id'),
            'address' => Input::get('address'),
            'descr' => Input::get('descr'),
            'cart' => serialize($cart)
        ]);
    }

    public function status($id)
    {
        $orders = User::find($id)->orders;
        return view('order.status', compact('orders'));
    }
}
