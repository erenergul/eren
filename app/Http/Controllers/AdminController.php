<?php

namespace App\Http\Controllers;

use UxWeb\SweetAlert\SweetAlert;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {

        return view('admin.index');
    }
}
