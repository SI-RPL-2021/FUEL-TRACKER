<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Spbu;

class SpbuController extends Controller
{
    public function index(){
        return view('admin.spbu_dt');
    }

    public function spbus_dt(Request $request){
        $spbus = Spbu::all();
        return datatables($spbus)
        ->editColumn('spbu_iframe', function($db){
            return '
                <a class="btn btn-success" href="javascript:detailRoute(\''.$db->spbu_id.'\')">Lihat Rute</a>
            ';
        })
        ->addColumn('action', function($db){
            return '
            <div class="d-flex">
                <a href="javascript:edit(\''.$db->spbu_id.'\')" title="Edit Data" class="btn btn-sm btn-icon bg-success mx-1 w-50"><i class="icon-database-edit2"></i></a>
                <a href="javascript:remove(\''.$db->spbu_id.'\')" title="Delete Data" class="btn btn-sm btn-icon bg-danger-800 mx-1 w-50"><i class="icon-database-remove"></i></a>
            </div>
            ';
        })
        ->rawColumns(['action','spbu_iframe'])->toJson();
    }

    public function spbus_add(Request $request){
        $spbu = new Spbu();
        $spbu->spbu_name = $request->spbu_name;
        $spbu->spbu_iframe = $request->iframe;
        $spbu->address = $request->address;
        $spbu->city = $request->city;
        $spbu->save();
        return $spbu->toJson();
    }

  

}
