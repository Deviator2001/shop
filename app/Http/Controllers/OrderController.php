<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Payment;
use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{
    public function show()
    {
        $deliveries = Delivery::pluck('title', 'id');
        $payments = Payment::pluck('title', 'id');
        return view('order.show', compact('deliveries', 'payments'));
    }
}
