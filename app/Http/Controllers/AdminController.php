<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Drivers;

class AdminController extends Controller
{
    public function index(Request $request){
        return view('admin.index');
    }
}
