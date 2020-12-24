<?php

namespace App\Http\Controllers;


use App\customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Imports\CustomerImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use Redirect;
use Storage;

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

    public function storeExcel(Request $request)
    {
        $message = [
            'mimes' => 'Hanya menerima File Excel dengan format .xls/.xlsx/.csv',
        ];

        $this->validate($request, [
			'file_excel' => 'required|mimes:csv,xls,xlsx'
        ],$message);
        
        $file_excel = $request->file('file_excel');
        $nama_file_excel = date('Y_m_d').'_'.$file_excel->getClientOriginalName();
        $path_file_excel = '/file_cust/'.$nama_file_excel;

        // Simpan file ke public
        $file_excel->move('file_cust', $nama_file_excel);
        
        $headings = (new HeadingRowImport)->toArray(public_path().$path_file_excel);

        $headings = $headings[0][0];

        if($headings[0] == "id_customer" && $headings[1] == "nama" && $headings[2] == "alamat" && $headings[3] == "id_kelurahan"){
            $customer = Excel::toArray(new CustomerImport, public_path().$path_file_excel);
            // $data_customer[] = customer::select('*')->get();
            $data = [];
            $old = [];

            for($i=0;$i<count($customer[0]);$i++){

                $customer[0][$i]['id_customer'] = trim($customer[0][$i]['id_customer'],"'");

                //mengecek apakah ada id customer di tabel customer. Jika tidak ada, data akan diinputkan.
                // if($data_customer[0][$i]['ID_CUSTOMER'] != $customer[0][$i]['id_customer']){
                if(!customer::where('id_customer', $customer[0][$i]['id_customer'])->exists()){
                    $data[] = [
                        'ID_CUSTOMER' => $customer[0][$i]['id_customer'],
                        'NAMA' => $customer[0][$i]['nama'],
                        'ALAMAT' => $customer[0][$i]['alamat'],
                        'ID_KELURAHAN' => $customer[0][$i]['id_kelurahan']
                    ];
                }
                elseif(!customer::where('nama', $customer[0][$i]['nama'])->exists()){
                    $old = $customer[0][$i]['id_customer'];
                }
                    
            }

            if($old == null){
                customer::insert($data);
                Session::flash('fsuccess','Data Berhasil Diimport.');
                return redirect('/dataCus');
            }else{
                Session::flash('ferror2','ID Sudah Ada : '.$old);
                return redirect('/dataCus');
            }

            //menghapus file excel
            Storage::disk('public')->delete($path_file_excel);
        }
        else{
            //menghapus file excel
            Storage::disk('public')->delete($path_file_excel);
            Session::flash('ferror','Data Excel tidak sesuai format.');
            return redirect('/dataCus');
        }
    }
} 