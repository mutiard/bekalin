<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\Anak;
use App\Http\Requests;
use Session;
use Auth;
use Input;
use Image;

class ProfilController extends Controller
{
    public function setProfil(Request $request){
        
        $user = User::where('id',Auth::user()->id)->first();
        //dd($user);
        $user->name = $request->input('name');
        $user->no_ktp = $request->input('no_ktp');
        $user->no_rek = $request->input('no_rek');
        $user->alamat = $request->input('alamat');
        $user->pekerjaan = $request->input('pekerjaan');
        $user->email = $request->input('email');

        $user->save();
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $foto_name = time() . '.' .$foto->getClientOriginalExtension();
            Image::make($foto)->resize(300, 300)->save( public_path('/fotoupload/' . $foto_name ));
            $user = Auth::user();
            $user->foto = $foto_name;
            $user->save();
        }

        return redirect('settingProfil');
    }

    public function setProfilAnak(Request $request){  
        // $user = Anak::where('id',Auth::user()->id)->first();
        $user = New Anak();
        //dd($user);
        $user->nama_anak = $request->input('name');
        $user->users_id = Auth::user()->id;
        $user->alamat_sekolah = $request->input('alamat_sekolah');
        $user->nama_sekolah = $request->input('nama_sekolah');
        $user->kelas = $request->input('kelas');
        $user->jenis_kelamin = $request->input('jenis_kelamin');
        $user->tgl_lahir = $request->input('tgl_lahir');
        $user->bb = $request->input('bb');
        $user->tb = $request->input('tb');
        $user->alergi = $request->input('alergi');
        $user->save();
        
        return redirect('settingProfilAnak');
    }   

    public function getProfil(){

    	return view('settingProfil');
    }
    public function getProfilAnak(){
        $anak = Anak::where('id',Auth::user()->id)->get();
        //dd($anak);
        return view('settingProfilAnak', ['anak' => $anak]);
    }
    public function showProfil(){
    	//fetch all posts //posts = paket , Post=Paket
         $user = User::where('id',Auth::user()->id)->get();
        //return User::where('id',Auth::user()->id)->first();
        
        //pass posts data to view and load list view
        return view('showProfil', ['user' => $user]);
    }

    public function showProfilAnak(){
        //fetch all posts //posts = paket , Post=Paket
         $anak = Anak::where('users_id',Auth::user()->id)->get();
        //return User::where('id',Auth::user()->id)->first();
        
        //pass posts data to view and load list view
        return view('showProfilAnak', ['anak' => $anak]);
    }
    
}
