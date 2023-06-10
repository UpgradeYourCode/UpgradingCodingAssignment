<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index(){
        return view("admin.login");
    }

    public function login(Request $request){
        if(Auth::attempt(['name'=>$request->name,'password' => $request->password])){
            $level = Auth::User()->level;

            if($level == 'master'){
                $request->session()->put('level', $level);
                return redirect('/');
            }
            return redirect('/');
        }
        else{
            return redirect('/admin/login/')->with('message','Nama atau Password salah');
        }
    }

    public function logout(){
        session()->flush();
        Auth::logout();
        return redirect('/admin/login/');
    }
}

