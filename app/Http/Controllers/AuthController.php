<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm(){

        return view('auth.loginForm');

    }

    public function registerForm(){
    
        return view('auth.registerForm');
    
    }

    public function logoutForm(){
    
        return view('auth.logoutForm');
    
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
