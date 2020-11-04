<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\barang;
use PDF;

class barangController extends Controller
{
    //
	public function index(){
		$barang = barang::all();
        return view('konten/barang/barang',['barang'=>$barang]);
	}

	public function barcode(){
    	return view('konten/barang/barcode');
	}


	public function scan(){
    	return view('konten/barang/scan');
	}

	public function store(Request $request){
		$date= date('mdy');
    	$d = $date.'%';
		$id = (DB::table('barang')->where('ID_BARANG','like', $d)->count('ID_BARANG'))+1;
	    $barang_id = $date.str_pad($id,2,"0",STR_PAD_LEFT);
        DB::table('barang')->insert([
            'id_barang' => $barang_id,
            'nama' => $request->nama
        ]);
        return redirect('/barang');
    }
	
	public  function printBarcode(){ 
		$barang =  barang::limit(40)->get(); 
		$no = 1; 
		$paper_width = 793.7007874; // 38 mm
        $paper_height = 623.62204724; // 18 mm
        $paper_size = array(0, 0, $paper_width, $paper_height);
		$pdf =  PDF::loadView  ('konten/barang/barcode',  compact('barang', 'no')); 
		$pdf->setPaper("f4"); 
		return $pdf->stream(); 
	}

	public  function printBarcodeId($id){ 
		$barang = DB::table('barang')->where('id_barang',$id)->get();
		$no = 1; 
		$brid=$id; 
		$paper_width = 793.7007874; // 38 mm
        $paper_height = 623.62204724; // 18 mm
        $paper_size = array(0, 0, $paper_width, $paper_height);
		$pdf =  PDF::loadView  ('konten/barang/barcodeId',  compact('barang', 'no')); 
		$pdf->setPaper('letter'); 
		return $pdf->stream(); 
	}

	public function getNama($id){
		$data = DB::table('barang')->select("nama")->where("id_barang",$id)->get();
		return response()->json(['data'=>$data]);
	}
}