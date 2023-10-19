<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }
    public function logout(){
        Auth::logout();
        return to_route('auth.login');
    }
    public function doLogin(LoginRequest $request){
        //recuperer les informations de connections
        $credentials = $request->validated();
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('produits.acheter-produit'));
        };
        return to_route('auth.login')->withErrors([
            'email' => "Email Invalide"
        ])->onlyInput('email');
    }
}