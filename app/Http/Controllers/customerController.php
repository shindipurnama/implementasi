<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use app\user;

class customerController extends Controller
{
    //
	public function index(){
		return view('konten/customer/customer');
	}

	public function dataCus(){
		return view('konten/customer/dataCus');
	}

	public function addCus1(){
	    $provinsi = DB::table('provinsi')->pluck("NAMA_PROVINSI","ID_PROVINSI");
        return view('konten/customer/addCus1',compact('provinsi'));
	}

	public function addCus2(){
	    $provinsi = DB::table('provinsi')->pluck("NAMA_PROVINSI","ID_PROVINSI");
        return view('konten/customer/addCus2',compact('provinsi'));
 	}

    public function getStates($id) 
    {
        $kota = DB::table('kota')->where("ID_PROVINSI",$id)->pluck("NAMA_KOTA","ID_KOTA");
        return json_encode($kota);
    }

    public function kecamatan($id) 
    {
        $kecamatan = DB::table('kecamatan')->where("ID_KOTA",$id)->pluck("NAMA_KECAMATAN","ID_KECAMATAN");
        return json_encode($kecamatan);
    }
    public function kelurahan($id) 
    {
        $kelurahan = DB::table('kelurahan')->where("ID_KECAMATAN",$id)->pluck("KODEPOS","NAMA_KELURAHAN","ID_KELURAHAN");
        return json_encode($kelurahan);
    }

    public function store (Request $request){
        
    }
}