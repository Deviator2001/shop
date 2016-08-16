<?php

namespace App\Http\Controllers;

use App\Category;

use App\Http\Requests;

class IndexController extends Controller
{
            public function index()
    {
        return view('index');
    }
}
