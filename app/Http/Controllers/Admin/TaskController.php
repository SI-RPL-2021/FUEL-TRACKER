<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\Users;
use App\Models\Spbu;

class TaskController extends Controller
{
    public function index(){
        $spbus = Spbu::all();
        $drivers = Users::where('role','=','driver')->get();
        return view('admin.task_dt', compact('spbus','drivers'));
    }
}
