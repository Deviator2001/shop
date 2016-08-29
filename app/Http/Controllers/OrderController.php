<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Order;
use App\Payment;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
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

    public function orderadd(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address' => 'required'
            ]);

        if ($cart = Session::get('cart')) {
            if (Sentinel::check())
            {
                $order = Order::create([
                    'user_id' => Sentinel::check()->id,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'delivery_id' => $request->delivery_id,
                    'payment_id' => $request->payment_id,
                    'address' => $request->address,
                    'descr' => $request->descr,
                    'cart' => serialize($cart),
                    'status' => 'В обработке'
                ]);
            }
            else
            {
                $order = Order::create([
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'delivery_id' => $request->delivery_id,
                    'payment_id' => $request->payment_id,
                    'address' => $request->address,
                    'descr' => $request->descr,
                    'cart' => serialize($cart),
                    'status' => 'В обработке'
                ]);
            }
            Session::forget('cart');
            return Redirect::intended('/');
        }
        else
        return 'Корзина пуста';

    }

    public function status()
    {
        $orders = User::find(Sentinel::check()->id)->orders;//получаем все заказы по id авторизованного пользователя
        $orders->transform(function($order, $key)//функция десериализации переменной cart в заказе
        {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('order.status', compact('orders'));
    }

    public function allorders()
    {
        $orders = Order::with('user')->paginate(10);//получаем все заказы по id авторизованного пользователя
        $orders->transform(function($order, $key)//функция десериализации переменной cart в заказе
        {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('order.manager', compact('orders'));
    }

    public function orderitem($id)
    {
        $order = Order::find($id);//получаем заказ по id
        $cart = unserialize($order->cart);
        return view('order.cartitem', compact('order', 'cart'));
    }

    public function delorder($id)
    {
        $order = Order::find($id)->delete();
        return redirect('/allorders');
    }

}
