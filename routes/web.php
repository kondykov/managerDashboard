<?php

use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Route;

// route::middleware('auth')->group(function(){
// });

route::get('/', [dashboardController::class, 'index'])->name('dashboard');

