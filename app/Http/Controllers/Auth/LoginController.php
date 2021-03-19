<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        // $input = $request->all();
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        if($request->level == "Mahasiswa"){
            if(Auth::attempt(['username'=>$request->username, 'password'=>$request->password])){
                $user = Mahasiswa::where('nim', $request->username)->first();
                // dd($user['nama']);
                return redirect('/user')->with([
                    'user' => $user
                ]);
            }else{
                return redirect('/login')->with('status','Email atau password salah!');
            }
        }elseif ($request->level == "Administrator") {
            // dd(User::where('username', $request->username)->first());
            if(Auth::attempt(['username'=>$request->username, 'password'=>$request->password])){
                $user = User::where('username', $request->username)->first();
                return redirect('/');
            }else{
                return redirect('/login')->with('status','Email atau password salah!');
            }
        }elseif ($request->level == "Dosen") {
            // dd(User::where('username', $request->username)->first());
            if(Auth::attempt(['username'=>$request->username, 'password'=>$request->password])){
                $user = Dosen::where('username', $request->username)->first();
                return redirect('/');
            }else{
                return redirect('/login')->with('status','Email atau password salah!');
            }
        }
        // if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
        //     $user = User::where('email', $request->email)->first();
        //     // $level = $user->level;
        //     // if($level == "admin"){
        //     //     return redirect('/');
        //     // }elseif($level == "mahasiswa"){
        //     //     return redirect('/user');
        //     // }
        // }
        return redirect('/login')->with('status','Email atau password salah!');
    }
}
