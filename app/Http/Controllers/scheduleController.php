<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class scheduleController extends Controller
{

    public function __invoke() {
        return view('template.schedulePages.index');
    }
}
