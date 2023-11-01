<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\orderController;
use Illuminate\Support\Facades\Route;

route::middleware('guest')->group(function(){
  route::get('/', [dashboardController::class, 'index'])->name('dashboard');
  route::get('/orderlist', [orderController::class, 'index'])->name('order.index');
  route::get('/orderlist/create', [orderController::class, 'create'])->name('order.create');
  route::post('/orderlist/store', [orderController::class, 'store'])->name('order.store');
  route::get('/orderlist/{order}', [orderController::class, 'show'])->name('order.show');
  route::get('/orderlist/{order}/edit', [orderController::class, 'edit'])->name('order.edit');
  route::put('/orderlist/{order}/sub', [orderController::class, 'put'])->name('order.put');
  route::put('/orderlist/{order}/commit', [orderController::class, 'commit'])->name('order.commit');
  route::put('/orderlist/{order}/completing', [orderController::class, 'complete'])->name('order.complete');

//   route::post('/orderlist/delete', [orderController::class, 'delete'])->name('order.delete'); // delete all items from db
});
// middleware — auth
route::middleware('guest')->group(function(){
  // route::get('/', [dashboardController::class, 'index'])->name('dashboard');

  // route::get('/', [orderController::class, 'create'])->name('order.create');
  // route::get('/test', [dashboardController::class, 'indexTwo'])->name('dashboard2');
});

