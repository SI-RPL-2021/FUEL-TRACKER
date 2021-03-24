<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Supervisors;

class SupervisorsController extends Controller
{
    public function index(Request $request){
        return view('admin.supervisors_dt');
    }

    public function supervisors_dt(Request $reqest){
        $supervisors = Users::where('role','=','supervisor')->get();
        return datatables($supervisors)
        ->addColumn('id', function($db){
            return $db->uid;
        })
        ->addColumn('username', function($db){
            return $db->username;
        })
        ->addColumn('spbu_name', function($db){
            return $db->supervisor_data->spbu_name;
        })
        ->addColumn('spbu_iframe', function($db){
            return $db->supervisor_data->spbu_iframe;
        })
        ->addColumn('fullname', function($db){
            return $db->fullname;
        })
        ->addColumn('phone_no', function($db){
            return $db->supervisor_data->phone_no;
        })
        ->addColumn('action', function($db){
            return '
            <div class="d-flex">
                <a href="javascript:edit(\''.$db->uid.'\')" title="Edit Data" class="btn btn-sm btn-icon bg-success mx-1 w-50"><i class="icon-database-edit2"></i></a>
                <a href="javascript:remove(\''.$db->uid.'\')" title="Delete Data" class="btn btn-sm btn-icon bg-danger-800 mx-1 w-50"><i class="icon-database-remove"></i></a>
            </div>
            ';
        })
        ->rawColumns(['action'])->toJson();
    }

    public function supervisors_add(Request $request){
        $username = $request->username;
        $phone_no = $request->phone_no;
        $spbu_name = $request->spbu_name;
        $spbu_iframe = $request->spbu_iframe;
        $fullname = $request->fullname;
        $supervisor = new Supervisors();
        $supervisor->spbu_name = $spbu_name;
        $supervisor->spbu_iframe = $spbu_iframe;
        $supervisor->phone_no = $phone_no;
        $supervisor->save();
        $user = new Users();
        $user->username = $username;
        $user->fullname = $fullname;
        $user->role = 'supervisor';
        $user->password = '123';
        $user->sid = $supervisor->sid;
        $user->save();
        return $user->toJson();
    }

    public function supervisors_edit(Request $request){
        $data = Users::join('supervisors','supervisors.sid','=','users.sid')
        ->select('users.*', 'supervisors.spbu_name','supervisors.spbu_iframe','supervisors.phone_no')
        ->where('uid','=',$request->id)->first()->toJson();
        return $data;
    }

    public function supervisors_save(Request $request){
        $username = $request->username;
        $phone_no = $request->phone_no;
        $spbu_name = $request->spbu_name;
        $spbu_iframe = $request->spbu_iframe;
        $fullname = $request->fullname;
        $user = Users::where('uid','=',intval($request->id))->first();
        $user->username = $username;
        $user->fullname = $fullname;
        $supervisor = Supervisors::where('sid','=',$user->sid)->first();
        $supervisor->spbu_name = $spbu_name;
        $supervisor->spbu_iframe = $spbu_iframe;
        $supervisor->phone_no = $phone_no;
        $user->save();
        $supervisor->save();
        return $user->toJson();
    }

    public function supervisors_delete(Request $request){
        $user = Users::where('uid','=',intval($request->id))->first();
        $supervisor = Supervisors::where('sid','=',$user->sid)->first();
        $user->delete();
        $supervisor->delete();
        return $user->toJson();
    }

}
