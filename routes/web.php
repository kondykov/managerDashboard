<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\orderController;
use Illuminate\Support\Facades\Route;

route::middleware('guest')->group(function(){
  route::get('/', [dashboardController::class, 'index'])->name('dashboard');
  route::get('/orderlist', [orderController::class, 'index'])->name('order.index');
  route::get('/orderlist/create', [orderController::class, 'create'])->name('order.create');
  route::get('/orderlist/store', [orderController::class, 'store'])->name('order.store');
  route::get('/orderlist/{order}/edit', [orderController::class, 'edit'])->name('order.edit');
  route::get('/orderlist/{order}/sub', [orderController::class, 'put'])->name('order.put');

});
// middleware — auth
route::middleware('guest')->group(function(){
  // route::get('/', [dashboardController::class, 'index'])->name('dashboard');

  // route::get('/', [orderController::class, 'create'])->name('order.create');
  // route::get('/test', [dashboardController::class, 'indexTwo'])->name('dashboard2');
});

