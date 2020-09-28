<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
		return view('konten/customer/addCus1');
	}

	public function addCus2(){
		return view('konten/customer/addCus2');
	}
}