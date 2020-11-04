<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Response;

class indexController extends Controller
{
    //
	public function index(){
		return view('tampilan/home'); 
	}

	public function download(){
        $file="USER_MANUAL.pdf";
        return Response::download($file);
    }

}

