<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebPageController extends Controller
{
    public function index(Request $request){
        return view('home.webpage');
    }
}
