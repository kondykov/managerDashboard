<?php

namespace App\Http\Controllers;

use App\Models\order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class orderController extends Controller
{
  public function index()
  {
    $orders = order::all();
    // dd($orders);
    return view('template.orderPages.order', [
      'orders' => $orders,
    ]);
  }
  public function create()
  {
    return view('template.orderPages.orderCreate', []);
  }
  public function store(Request $request)
  {
    $order = new order();
    $order->name = $request->input('name');
    $order->status = 'unconfirmed';
    $order->created_at = Carbon::now();
    $order->save();
    return redirect()->route('order.index');
  }
  public function edit($order)
  {
    $order = order::find($order);
    if ($order->status !== 'completed') {
      return view('template.orderPages.orderEdit', [
        'order' => $order,
        'error' => '',
      ]);
    } else {
      return redirect()->back();
    }
  }
  public function put(Request $request, $order)
  {
    $order = order::find($order);
    $order->name = $request->input('name');
    $order->status = 'unconfirmed';
    $order->updated_at = Carbon::now();
    $order->save();
    return redirect()->route('order.index');
  }
  public function commit($order)
  {
    $order = order::find($order);
    $order->status = 'confirmed';
    $order->updated_at = Carbon::now();
    $order->save();
    return redirect()->route('order.index');
  }
  public function complete($order)
  {

    $order = order::find($order);

    $date = date_parse($order->created_at);
    if ($order->created_at < Carbon::now()->subMinutes(1)) {
      if($date > '12'){
        if($order->status !== 'confirmed') {
          $errors = [
            'The order must be confirmed before closing it!'
          ];
          return  redirect()->back()->withErrors($errors)->withInput();
        }
      }
      $order->status = 'completed';
      $order->updated_at = Carbon::now();
      $order->save();
    } else {
      $errors = [
        'The order was created less than a minute ago! Please, wait!'
      ];
      // dd($errors);
      return  redirect()->back()->withErrors($errors)->withInput();
    }

    return redirect()->route('order.index');
  }
  public function show($orderId)
  {
    $order = order::find($orderId);
    if($order) {
      return view('template.orderPages.orderShow', [
        'order' => $order,
        'error' => '',
      ]);
    }
  }
  public function delete()
  {
    return redirect()->route('order.index');
  }
}
