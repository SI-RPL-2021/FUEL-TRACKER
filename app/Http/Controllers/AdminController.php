<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Tasks;

class AdminController extends Controller
{
    public function index(Request $request){
        $user = Users::where('uid','=',$request->session()->get('user')->uid)->first();
        $done = Tasks::where([['status_spbu_1','=','Y'],['status_spbu_2','=','Y'],['status_spbu_3','=','Y']])->get();
        $all =  Tasks::all();
        return view('admin.index', compact('user','done','all'));
    }
}
