<?php

namespace App\Http\Controllers\Backend\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function orders(){
        $orders = Order::where('state','=',2)->get();
        return view('backend.order.order',compact('orders'));
    }
    public function ordersdetail($order_id){
        $order = Order::find($order_id);

        return view('backend.order.detailorder',compact('order'));
    }
    public function approve($order_id){
        $order = Order::find($order_id);
        $order->state = 1;
        $order->save();
        return redirect()->route('orders.process');

    }

    public function process(){
        $orders = Order::where('state','=',1)->get();
        return view('backend.order.processed',compact('orders'));
    }
}
