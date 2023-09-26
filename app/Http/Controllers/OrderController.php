<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Http\Controllers\dashboardController;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function index()
  {
    $orders = order::all();
    // dd($orders);                                                                                
    return view('template.orderPages.order', [
      'orders' => $orders,
    ]);
  }
  public function create() {
    return view('template.orderPages.orderCreate', [
      
    ]);
  }
  public function store(Request $request) {
    $order = new order();
    $order->name=$request->input('name');
    $order->status='waiting';
    $order->created_at=Carbon::now();
    $order->save();
    return redirect()->route('order.index');
  }
  public function edit($order) {
    $order = order::find($order);
    return view('template.orderPages.orderEdit', [
      'order' => $order,
    ]);
  }
  public function put(Request $request) {
    $order = new order();
    $order->name=$request->input('name');
    $order->status='waiting';
    $order->updated_at=Carbon::now();
    $order->save();
    return redirect()->route('order.index');
  }
}
