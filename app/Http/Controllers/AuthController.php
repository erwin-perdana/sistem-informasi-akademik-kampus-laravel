<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input; //untuk input::get
use Illuminate\Support\Facades\Auth;

use Redirect; //untuk redirect

use Illuminate\Http\Request;
use App\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use DB;

class AuthController extends Controller
{
    public function login()
    {
    	return view('otentikasi.login');
    }

    public function postlogin(Request $request)
    {
    	if(Auth::attempt($request->only('username','password'))){
            $akun = DB::table('users')->where('username', $request->username)->first();

            if($akun->role =='Administrator'){
                Auth::guard('Administrator')->LoginUsingId($akun->id);
                return redirect('/');
            }elseif($akun->role =='Mahasiswa'){
                Auth::guard('mahasiswa')->LoginUsingId($akun->id);
                $mahasiswa = Mahasiswa::where('nim', $request->username)->first();
                $request->session()->put('mahasiswa', $mahasiswa);
                return redirect('/mahasiswas');
            }elseif($akun->role =='Dosen'){
                Auth::guard('dosen')->LoginUsingId($akun->id);
                $dosen = Dosen::where('nidn', $request->username)->first();
                $request->session()->put('dosen', $dosen);
                return redirect('/dosens');
            }
    	}
    	return redirect('/login')->with('status','Username Atau Password Salah');
    }

    public function logout()
    {
        if(Auth::guard('Administrator')->check()){
            Auth::guard('Administrator')->logout();
        } else if(Auth::guard('mahasiswa')->check()){
            Auth::guard('mahasiswa')->logout();
        } else if(Auth::guard('dosen')->check()){
            Auth::guard('dosen')->logout();
        }
    	return redirect('/login')->with('status','Anda Telah Logout');
    }
}