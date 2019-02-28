<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(){

        return view('home');

    }
    
    public function about(){
    
        return view('about');
    
    }
    
    public function contactForm(){
    
        return view('contactForm');
    
    }
    
    public function contact(){
    
    
    
    }
}
