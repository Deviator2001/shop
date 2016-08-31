<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function show($id='root')
    {
        // Если запрос пришел не на конкретную категорию, а на раздел категорий, отдаем коллекцию категорий верхнего уровня
        if ($id == 'root')
        {
            $nodes= Category::whereIsRoot()->get();
            $many = true;
            if (Session::has('showed'))
            $showed = Session::get('showed');
            else
            $showed = false;
            return view('category.show', compact('nodes','many','showed'));
        }
        // Иначе отдаем запрашиваемую категорию
        if ($node = Category::find($id))
        {
            $many = false;
            $products=Category::find($node->id)->products()->paginate(10);
            if (Session::has('showed'))
                $showed = Session::get('showed');
            else
                $showed = false;
            return view('category.show', compact('node','many','products','showed'));
        }

        abort(404);
    }
}
