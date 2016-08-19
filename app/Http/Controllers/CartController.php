<?php

namespace App\Http\Controllers;

use Sentinel;
use Illuminate\Http\Request;
use App\Cart;
use App\product;

use App\Http\Requests;

class CartController extends Controller
{





































    /*public function index()
    {
        $cart = Cart::find(Sentinel::check()->id);
        if(!$cart)
        {
            $cart = Cart::create(
            [
                'user_id' => Sentinel::check()->id
            ]);
        }

        $items = $cart->cartItems;
        $total=0;
        foreach($items as $item){
            $total+=$item->product->price;
        }

        return view('cart.show',['items'=>$items,'total'=>$total]);
    }


    public function add($id)
    {
        $product = product::find($id);
    }*/
}
