<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriversController extends Controller
{
    public function index(Request $request){
        return view('driver.index');
    }
}
