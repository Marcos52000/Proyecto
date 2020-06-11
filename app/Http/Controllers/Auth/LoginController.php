<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\pagaments;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function inici(){
    return view("auth.login",array('Pagaments' => pagaments::all()));  
  }


    public function login(){

        $credentials = $this->validate(request(),[
            'email'=>'email|required|string|max:50',
            'password'=>'required|string|max:150'
            ]);

        if (Auth::attempt($credentials)) {
            return view('gestio');
        }
        return back()->withErrors(['email' => 'Credencials incorrectes,revisa el correu i la contrasenya']);
    }
}
