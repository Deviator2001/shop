<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class ProductController extends Controller
{

    public function show($categoryid, $productid)
    {
        if ( $product = Product::where('id',$productid)->first()) {
            $parentCategores=$product->categories;
            $pathCategory=Category::find($categoryid);
            return view('product_show', compact('product','parentCategores', 'pathCategory'));
        }
        abort(404);
    }
}