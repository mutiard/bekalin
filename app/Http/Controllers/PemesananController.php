<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Anak;
use App\Paket;
use Images;

class PemesananController extends Controller
{
    public function showMenuPaketMakanan(){
    	$paket = DB::select("select * from paket");
    	// dd($paket);
    	$anak = DB::select("select nama_anak from anak where users_id = '1'");
    	// $anak = Anak::where('id_ortu',1);
    	// dd($anak);
	    return view('order.index', ['paket' => $paket, 'anak' => $anak]);
    }

    public function showDetailPaketMakanan($id){
    	$detail_paket = DB::select("select * from paket where id = '$id'");
	    return view('order.detail', ['detail_paket' => $detail_paket]);
    }
    
    
}
