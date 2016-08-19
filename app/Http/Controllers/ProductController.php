<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\product;
use App\Category;
use Illuminate\Http\Request;
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

    public function addtocart(Request $request, $id)
    {
        $product = product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
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


}