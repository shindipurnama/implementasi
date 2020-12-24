<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\barang;

class BarangController extends Controller
{
    //

    public function index(){
        $barang = barang::all();
        return response()->json([
            "message" => "tampil data barang"
        ], 201);
    }

    public function createBarang(Request $request){
        $barang = new barang;
        $barang->id_barang= $request->id_barang;
        $barang->nama = $request->nama;
        $barang->save();

        return response()->json([
            "message" => "barang record created"
        ], 201);
    }

    public function updateBarang(Request $request, $id){
        barang::where('id_barang', $request->id)->update([
            'nama'=>$request->nama
        ]);

        return response()->json([
            "message" => "barang record updated"
        ], 201);
    }
}
