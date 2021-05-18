<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Tasks;

use DateTime;

class DriversController extends Controller
{
    public function index(Request $request){
        $user = Users::where('uid','=',$request->session()->get('user')->uid)->first();
        $tasks = Tasks::where('did','=',$request->session()->get('user')->uid)->get();
        return view('driver.index', compact('user', 'tasks'));
    }

    public function dt(Request $request){
        $user = Users::where('uid','=',$request->session()->get('user')->uid)->first();
        $tasks = Tasks::where('did','=',$request->session()->get('user')->uid)->get();
        return datatables($tasks)
        ->addColumn('shipment_no', function($db){
            return $db->tasks_id;
        })
        ->addColumn('spbu', function($db){
            $status_1 = '';
            $status_2 = '';
            $status_3 = '';
            if($db->status_spbu_1 == 'Y')
                $status_1 = 'checked';
            if($db->status_spbu_2 == 'Y')
                $status_2 = 'checked';
            if($db->status_spbu_3 == 'Y')
                $status_3 = 'checked';
            return '
                <div>
                    <div class="form-check">
                        <label class="form-check-label">SPBU 1 - '.$db->spbu_1->spbu_name.'</label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">SPBU 2 - '.$db->spbu_2->spbu_name.'</label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">SPBU 3 - '.$db->spbu_3->spbu_name.'</label>
                    </div>
                </div>
            ';
        })
        ->addColumn('status', function($db) use($user) {
            if($db->status_spbu_1 == 'Y' && $db->status_spbu_2 == 'Y' && $db->status_spbu_3 == 'Y')
            return 'Selesai';
            else 
            return 'On Progress';
        })
        ->addColumn('tracking', function($db){
            return '
                <a class="btn btn-secondary rounded" href="drivers/tasks/'.$db->tasks_id.'">Track Here</a>
            ';
        })
        ->rawColumns(['tracking', 'spbu'])->toJson();
    }

    public function task_track($id, Request $request){
        $user = Users::where('uid','=',$request->session()->get('user')->uid)->first();
        $task = Tasks::where('tasks_id','=',$id)->first();
        $spbus = [];
        if($task->spbu_1) array_push($spbus, $task->spbu_1);
        if($task->spbu_2) array_push($spbus, $task->spbu_2);
        if($task->spbu_3) array_push($spbus, $task->spbu_3);
        return view('task.driver', compact('user','task', 'spbus','id'));
    }

    public function confirm($id, Request $request){
        $task = Tasks::where('tasks_id','=',$id)->first();
        $task['status_spbu_'.$request->spbu] = 'O';
        $task['arrival_spbu_'.$request->spbu] = new DateTime();
        $task->save();
        return redirect()->back();
    }

}
