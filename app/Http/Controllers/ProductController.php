<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use App\Cart;

class ProductController extends Controller
{

    public function show($categoryid, $productid)
    {
        if ( $product = product::find($productid))
        {
            $brand = $product->brand->name;
            $parentCategores=$product->categories;
            $pathCategory=Category::find($categoryid);
            return view('product_show', compact('product', 'brand', 'parentCategores', 'pathCategory'));
        }
        abort(404);
    }

    public function addtocart(Request $request)
    {
        $id = Input::get('id');//получаем id добавляемого товара
        $qtyadd = Input::get('qtyadd');//получаем количесво добавляемого товара
        $cat = Input::get('cat');//получаем id категории добавляемого товара
        $product = product::find($id);//получаем экземпляр товара из таблицы по его id
        $oldCart = Session::has('cart') ? Session::get('cart') : null;//проверяем задана ли переменная cart в массиве сессии, если устанвливаем ее и присваиваем null
        $cart = new Cart($oldCart);//создаем новый экземпляр корзины, в конструктор модели Cart передаем $oldCart
        $cart->add($product, $product->id, $qtyadd, $cat);//добавляем товары
        $request->session()->put('cart', $cart);//заносим массив корзины в переменную сессии
        return redirect()->back();

    }

    public function showcart()
    {
        if (!Session::has('cart'))
        {
            return view('cart.show', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart.show', ['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
    }

    public function remove(Request $request, $id)
    {
        $product = product::find($id);//получаем экземпляр товара из таблицы по его id
        $oldCart = Session::has('cart') ? Session::get('cart') : null;//проверяем задана ли переменная cart в массиве сессии, если устанвливаем ее и присваиваем null
        $cart = new Cart($oldCart);//создаем новый экземпляр корзины, в конструктор модели Cart передаем $oldCart
        $cart->remove($product, $product->id);//удаляем выбранный товар
        $request->session()->put('cart', $cart);//заносим массив корзины в переменную сессии
        return redirect()->back();
    }

}