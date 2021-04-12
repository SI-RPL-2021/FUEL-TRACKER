<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Drivers;

class DriversController extends Controller
{
    public function index(Request $request){
        return view('admin.drivers_dt');
    }
    
    public function drivers_dt(Request $reqest){
        $drivers = Users::where('role','=','driver')->get();
        return datatables($drivers)
        ->addColumn('id', function($db){
            return $db->uid;
        })
        ->addColumn('username', function($db){
            return $db->username;
        })
        ->addColumn('vehicle_no', function($db){
            return $db->driver_data->vehicle_no;
        })
        ->addColumn('fullname', function($db){
            return $db->fullname;
        })
        ->addColumn('phone_no', function($db){
            return $db->driver_data->phone_no;
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

    public function drivers_add(Request $request){
        $username = $request->username;
        $phone_no = $request->phone_no;
        $vehicle_no = $request->vehicle_no;
        $fullname = $request->fullname;
        $driver = new Drivers();
        $driver->vehicle_no = $vehicle_no;
        $driver->phone_no = $phone_no;
        $driver->save();
        $user = new Users();
        $user->username = $username;
        $user->fullname = $fullname;
        $user->role = 'driver';
        $user->password = '123';
        $user->did = $driver->did;
        $user->save();
        return $user->toJson();
    }

    public function drivers_edit(Request $request){
        $data = Users::join('drivers','drivers.did','=','users.did')
        ->select('users.*', 'drivers.vehicle_no','drivers.phone_no')
        ->where('users.uid','=',$request->id)->first()->toJson();
        return $data;
    }

    public function drivers_save(Request $request){
        $username = $request->username;
        $phone_no = $request->phone_no;
        $vehicle_no = $request->vehicle_no;
        $fullname = $request->fullname;
        $user = Users::where('uid','=',intval($request->id))->first();
        $user->username = $username;
        $user->fullname = $fullname;
        $driver = Drivers::where('did','=',$user->did)->first();
        $driver->vehicle_no = $vehicle_no;
        $driver->phone_no = $phone_no;
        $user->save();
        $driver->save();
        return $user->toJson();
    }

    public function drivers_delete(Request $request){
        $user = Users::where('uid','=',intval($request->id))->first();
        $driver = Drivers::where('did','=',$user->did)->first();
        $user->delete();
        $driver->delete();
        return $user->toJson();
    }

}
