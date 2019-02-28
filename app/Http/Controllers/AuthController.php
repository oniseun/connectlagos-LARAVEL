<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;

class AuthController extends Controller
{
    public function loginForm(){

        return view('auth.loginForm');

    }

    public function registerForm(){
    
        return view('auth.registerForm');
    
    }

    public function logoutForm(){
        $userInfo = Auth::currentUser();
        return view('auth.logoutForm',compact('userInfo'));
    
    }

    public function resetForm(){
    
        return view('auth.resetForm');
    
    }

    public function login(){
    
    
    
    }
    

    
    public function register(){
    
    
    
    }
        
    public function logout(){
    
    
    
    }

    public function reset(){
    
    
    
    }


    
}
