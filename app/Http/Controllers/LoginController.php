<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function logged(Request $request){
        if(Auth::check()){
            return redirect()->intended('productos');
        }else{
            return view('login');
        }
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $mensaje = 'Credenciales incorrectas';
        if (Auth::attempt($credentials)) {
            return redirect()->intended('productos');
        }else{
            return view('login',['mensaje' => 'Credenciales incorrectas']);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return view('login');
    }
}
