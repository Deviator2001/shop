<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\product;
use App\Category;
use App\Showed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Session;
use App\Cart;

class ProductController extends Controller
{

    public function show(Request $request, $productid)//отображение страницы товара(продукта)
    {
        $product = product::find($productid);
            $oldShowed = Session::has('showed') ? Session::get('showed') : null;
            $showed = new Showed($oldShowed);
            $showed->add($product, $productid);//добавляем товары в просмотренные
            $request->session()->put('showed', $showed);//заносим массив корзины в переменную сессии
            $brand = $product->brand->name;
            $pathCategory=$product->category;//Непосредственная категория товара (массив)
            return view('product.show', compact('product', 'brand', 'pathCategory'));

    }

    public function addtocart(Request $request)//добавление товара в корзину
    {
        $id = Input::get('id');//получаем id добавляемого товара
        $qtyadd = Input::get('qtyadd');//получаем количесво добавляемого товара
        $product = product::find($id);//получаем экземпляр товара из таблицы по его id
        $oldCart = Session::has('cart') ? Session::get('cart') : null;//проверяем задана ли переменная cart в массиве сессии, если устанвливаем ее и присваиваем null
        $cart = new Cart($oldCart);//создаем новый экземпляр корзины, в конструктор модели Cart передаем $oldCart
        $cart->add($product, $product->id, $qtyadd);//добавляем товары
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
        $oldCart = Session::get('cart');//проверяем задана ли переменная cart в массиве сессии, если устанвливаем ее и присваиваем null
        $cart = new Cart($oldCart);//создаем новый экземпляр корзины, в конструктор модели Cart передаем $oldCart
        $cart->remove($product, $product->id);//удаляем выбранный товар
        $request->session()->put('cart', $cart);//заносим массив корзины в переменную сессии
        return redirect()->back();
    }

    public function search()
    {
        $q = Input::get('q');
        $products = product::with('category')->where('model', 'LIKE', "%$q%")->get();
        return view('product.search', ['products' => $products]);
    }

}