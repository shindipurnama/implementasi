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
		$barang =  barang::where('id_barang',$id)->get(); 
		$no = 1; 
		$brid=$id;
		$paper_width = 793.7007874; // 38 mm
        $paper_height = 623.62204724; // 18 mm
        $paper_size = array(0, 0, $paper_width, $paper_height);
		$pdf =  PDF::loadView  ('konten/barang/barcode',['id'=>$brid],  compact('barang', 'no')); 
		$pdf->setPaper('letter'); 
		return $pdf->stream(); 
	}
}