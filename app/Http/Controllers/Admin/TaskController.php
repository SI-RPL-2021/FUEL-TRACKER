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

    public function tasks_dt(Request $request){
        $tasks = Tasks::all();
        return datatables($tasks)
        ->addColumn('shipment_no', function($db){
            return 'SHP-'.$db->tasks_id;
        })
        ->addColumn('vehicle_no', function($db){
            if($db->driver)
                return $db->driver->driver_data->vehicle_no;
            return null;
        })
        ->addColumn('driver_name', function($db){
            if($db->driver)
                return $db->driver->fullname;
            return null;
        })
        ->addColumn('locations', function($db){
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
                        <input type="checkbox" class="form-check-input" '.$status_1.' disabled>
                        <label class="form-check-label">SPBU 1 - '.$db->spbu_1->spbu_name.'</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" '.$status_2.' disabled>
                        <label class="form-check-label">SPBU 1 - '.$db->spbu_2->spbu_name.'</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" '.$status_2.' disabled>
                        <label class="form-check-label">SPBU 1 - '.$db->spbu_2->spbu_name.'</label>
                    </div>
                </div>
            ';
        })
        ->addColumn('status', function($db){
            return '
                <a class="btn btn-success" href="javascript:detail(\''.$db->tasks_id.'\')">Details</a>
            ';
        })
        ->addColumn('action', function($db){
            return '
            <div class="d-flex">
                <a href="javascript:edit(\''.$db->tasks_id.'\')" title="Edit Data" class="btn btn-sm btn-icon bg-success mx-1 w-50"><i class="icon-database-edit2"></i></a>
                <a href="javascript:remove(\''.$db->tasks_id.'\')" title="Delete Data" class="btn btn-sm btn-icon bg-danger-800 mx-1 w-50"><i class="icon-database-remove"></i></a>
            </div>
            ';
        })
        ->rawColumns(['action','locations','status'])->toJson();
    }
}
