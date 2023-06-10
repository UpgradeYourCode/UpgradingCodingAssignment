<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('admin.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'level' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        //dd($request);
        $data = User::where('email',$request->email)->get();
        if ($data->all()){
           // echo'if';
           // dd($data->all());
            return redirect('/admin/register')->with('message','data sudah ada');
        }
        else{
           // echo'else';
           // dd($data->all());
        User::create([
            'name' => $request->name,
            'level' => $request->level,
            'email' => $request->email,
            'password' => bcrypt($request->password),

        ]);
        return redirect('/admin/login');
        //
       }
    }
}
