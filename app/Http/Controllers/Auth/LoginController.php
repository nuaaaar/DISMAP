<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function logout(){
        Auth::logout();
    
        return redirect('/login');
      }

    public function login(){
         return view('dismap/login');
    }
    
    public function authenticate(Request $request){
        $username = User::where('username', $request->username)->first();

         if ($username != null) {
            $berhasil = Auth::attempt(['username'=>$request->username, 'password'=>$request->password]);
            if($berhasil){
                return redirect('/dismap/maps');
            }else{
                return redirect()->back()->with('message', 'Username atau password salah.');
            }
        }else{
            return redirect()->back()->with('message', 'Username tidak ditemukan.');
        }
    }
}
