<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function show($categoryid, $productid)
    {
        if ( $product = Product::find($productid))
        {
            $brand = $product->brand->name;
            $parentCategores=$product->categories;
            $pathCategory=Category::find($categoryid);
            return view('product_show', compact('product', 'brand', 'parentCategores', 'pathCategory'));
        }
        abort(404);
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        dd($request->session()->get('cart'));
        return redirect()->route('product.show');

    }
}