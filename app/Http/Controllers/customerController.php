<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use app\customer;

class customerController extends Controller
{
    //
	public function index(){
		return view('konten/customer/customer');
	}

	public function dataCus(){
        $customer = DB::table('customer')->orderby('ID_CUSTOMER', 'asc')->get();
        $kelurahan = DB::table('kelurahan')->get();
		return view('konten/customer/dataCus', ['customer' => $customer, 'kelurahan' => $kelurahan]);
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
        $kelurahan = DB::table('kelurahan')->where('ID_KECAMATAN', $id)->get();
        return json_encode($kelurahan);
    }

    public function store1(Request $request){
        $id=(DB::table('customer')->count('ID_CUSTOMER'))+1;
	    $customer_id = "C".str_pad($id,3,"0",STR_PAD_LEFT);
        DB::table('customer')->insert([
            'ID_CUSTOMER' => $customer_id,
            'ID_KELURAHAN' => $request->kelurahan,
            'NAMA' => $request->nama,
            'ALAMAT' => $request->alamat,
            'FOTO' => base64_encode($request->foto)
        ]);
        return redirect('/dataCus');
    }

    public function store2(Request $request)
    {
        //dd($request);
        //decode base64 ke png
        $foto1 = $request->foto;
        $foto2 = str_replace('data:image/png;base64,','',$foto1);
        $foto3 = str_replace(' ', '+', $foto2);
        $foto_png = base64_decode($foto3);

        //nama foto
        $nama_foto1 = time(). $request->nama . '.png';
        $nama_foto2 = str_replace(' ', '_', $nama_foto1);

        //path foto 
        $path = '/foto/'.$nama_foto2;

        //simpan foto ke path
        \File::put(base_path().'/public/foto/'.$nama_foto2, $foto_png);

        $id=(DB::table('customer')->count('ID_CUSTOMER'))+1;
	    $customer_id = "C".str_pad($id,3,"0",STR_PAD_LEFT);
        DB::table('customer')->insert([
            'ID_CUSTOMER' => $customer_id,
            'ID_KELURAHAN' => $request->kelurahan,
            'NAMA' => $request->nama,
            'ALAMAT' => $request->alamat,
            'FILE_PATH' => $path
        ]);
        return redirect('/dataCus');
        
    }
} 