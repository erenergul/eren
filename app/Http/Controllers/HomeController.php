<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller

{

    public function cariler() {
        return view('admin.cariler');
    }

}