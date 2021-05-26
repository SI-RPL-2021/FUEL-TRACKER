<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;
use App\Models\Tasks;

class SupervisorsController extends Controller
{
    public function index(Request $request){
        $user = Users::where('uid','=',$request->session()->get('user')->uid)->first();
        $tasks = null;
        if($user->supervisor_data->spbu){
            $tasks = Tasks::where(function ($query) use($user) {
                $query->where('spbu_id_1', '=', $user->supervisor_data->spbu->spbu_id)
                    ->orWhere('spbu_id_2', '=', $user->supervisor_data->spbu->spbu_id)
                    ->orWhere('spbu_id_3', '=', $user->supervisor_data->spbu->spbu_id);
            })->get();
        }
        return view('supervisor.index', compact('user', 'tasks'));
    }

    public function dt(Request $request){
        $user = Users::where('uid','=',$request->session()->get('user')->uid)->first();
        $tasks = null;
        if($user->supervisor_data->spbu){
            $tasks = Tasks::where(function ($query) use($user) {
                $query->where('spbu_id_1', '=', $user->supervisor_data->spbu->spbu_id)
                    ->orWhere('spbu_id_2', '=', $user->supervisor_data->spbu->spbu_id)
                    ->orWhere('spbu_id_3', '=', $user->supervisor_data->spbu->spbu_id);
            })->get();
        }
        return datatables($tasks)
        ->addColumn('shipment_no', function($db){
            return $db->tasks_id;
        })
        ->addColumn('driver', function($db){
            return $db->driver->fullname;
        })
        ->addColumn('date', function($db){
            return $db->created_at;
        })
        ->addColumn('status', function($db) use($user) {
            if($user->supervisor_data->spbu){
                if($db->spbu_id_1 == $user->supervisor_data->spbu->spbu_id){
                    if($db->status_spbu_1 == 'Y') return 'Terkirim';
                    else if($db->status_spbu_1 == 'O') return 'Menunggu Konfirmasi';
                    else return 'On Progress';
                } else if($db->spbu_id_2 == $user->supervisor_data->spbu->spbu_id) {
                    if($db->status_spbu_2 == 'Y') return 'Terkirim';
                    else if($db->status_spbu_2 == 'O') return 'Menunggu Konfirmasi';
                    else return 'On Progress';
                } else if($db->spbu_id_3 == $user->supervisor_data->spbu->spbu_id) {
                    if($db->status_spbu_3 == 'Y') return 'Terkirim';
                    else if($db->status_spbu_3 == 'O') return 'Menunggu Konfirmasi';
                    else return 'On Progress';
                }
            }
            return '';
        })
        ->addColumn('tracking', function($db){
            return '
                <a class="btn btn-success rounded" href="supervisors/tasks/'.$db->tasks_id.'">Track Here</a>
            ';
        })
        ->rawColumns(['tracking'])->toJson();
    }

    public function task_track($id, Request $request){
        $user = Users::where('uid','=',$request->session()->get('user')->uid)->first();
        $task = Tasks::where('tasks_id','=',$id)->first();
        $spbus = [];
        if($task->spbu_1) array_push($spbus, $task->spbu_1);
        if($task->spbu_2) array_push($spbus, $task->spbu_2);
        if($task->spbu_3) array_push($spbus, $task->spbu_3);
        return view('task.supervisor', compact('user','task', 'spbus','id'));
    }

    public function confirm($id, Request $request){
        $task = Tasks::where('tasks_id','=',$id)->first();
        $task['status_spbu_'.$request->spbu] = 'Y';
        $task->save();
        return redirect()->back();
    }

}
