<?php

namespace App\Http\Controllers;

use App\Otel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function searchfunction()
    {

        $data=DB::table('otel')->get();
        return view('admin.rezervasyon.create',compact('data'));
    }


}
