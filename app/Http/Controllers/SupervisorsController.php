<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupervisorsController extends Controller
{
    public function index(Request $request){
        return view('supervisor.index');
    }
}
