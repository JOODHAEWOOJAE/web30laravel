<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderReceivedController extends Controller
{
    public function __invoke($id){
        $order = Order::find($id);
        if(Auth::user()->email == $order->email){
            return view('order_received', ['order' => $order]);
        }else{
            return view('404');
        }

    }
}
