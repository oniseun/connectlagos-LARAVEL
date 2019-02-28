<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use App\Site;
use App\Wallet;


class ProfileController extends Controller
{
    public function dashboard(){

        return view('dashboard');

    }
    
    public function ajaxMiniStats(){
    
        $balance = Wallet::balance(Auth::id());
        $userStats = Site::user_stats(Auth::id());
        
        return view('miniStats',compact('balance','userStats'));
    }
    
    public function profileForms(){
    
        $userInfo = Auth::currentUser();
        return view('profileForm',compact('userInfo'));
    }
    
    public function updateInfo(){
    
    
    
    }
    
    public function updatePassword(){
    
    
    
    }
    
    public function updatePhoto(){
    
    
    
    }
    
}
