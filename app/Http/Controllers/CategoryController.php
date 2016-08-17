<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    public function show($id='root')
    {
        // Если запрос пришел не на конкретную категорию, а на раздел категорий, отдаем коллекцию категорий верхнего уровня
        if ($id == 'root')
        {
            $nodes= Category::whereIsRoot()->get();
            $many = true;
            return view('category.show', compact('nodes','many'));
        }
        // Иначе отдаем запрашиваемую категорию
        if ($node = Category::find($id))
        {
            $many = false;
            return view('category.show', compact('node','many'));
        }

        abort(404);
    }
}
