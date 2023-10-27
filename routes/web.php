<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\scheduleController;
use Illuminate\Support\Facades\Route;

route::middleware('guest')->group(function(){
  route::get('/', dashboardController::class)->name('dashboard');
  route::prefix('/orderlist')->group(function(){
    route::get('/', [orderController::class, 'index'])->name('order.index');
    route::get('/create', [orderController::class, 'create'])->name('order.create');
    route::get('/store', [orderController::class, 'store'])->name('order.store');
    route::get('/{order}', [orderController::class, 'show'])->name('order.show');
    route::get('/{order}/edit', [orderController::class, 'edit'])->name('order.edit');
    route::get('/{order}/sub', [orderController::class, 'put'])->name('order.put');
    route::get('/{order}/commit', [orderController::class, 'commit'])->name('order.commit');
    route::get('/{order}/completing', [orderController::class, 'complete'])->name('order.complete');
  });
  route::prefix('/schedule')->name('schedule.')->group(function(){
    route::get('/', [scheduleController::class, 'index'])->name('index');
  });
});
// middleware — auth
route::middleware('guest')->group(function(){
  // route::get('/', [dashboardController::class, 'index'])->name('dashboard');

  // route::get('/', [orderController::class, 'create'])->name('order.create');
  // route::get('/test', [dashboardController::class, 'indexTwo'])->name('dashboard2');
});

