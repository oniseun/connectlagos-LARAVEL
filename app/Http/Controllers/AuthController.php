<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use App\Activities;

class AuthController extends Controller
{
    public function loginForm(){
        if(!Auth::check())
        {
        return view('auth.loginForm');
        }
        else {
            return redirect('/admin/dashboard');
        }

    }

    public function registerForm(){
        if(!Auth::check())
        {
            return view('auth.registerForm');
        }
        else {
            return redirect('/admin/dashboard');
        }
        
    
    }

    public function logoutForm(){
        $userInfo = Auth::currentUser();
        return view('auth.logoutForm',compact('userInfo'));
    
    }

    public function resetForm(){
        
           return view('auth.resetForm');
       
    
    }

    public function login(){
    
        if (!\Request::has(Auth::$loginFormFillable)) {
            return back()->with('failure', "Error in your form fields, please check, make corrections and submit again");
            exit;
        }

        if(Auth::login_user())
        {
            $email = \Request::only(Auth::$loginFormFillable)['email'];
            Activities::create(Auth::getInfoByEmail($email)->id,  'logged into the system on UNIX:'.time().'/'.date("d m Y h:i:s"));
            $redirect_url = \Request::has('redirect_url') ? \Request::input('redirect_url') : '/admin/dashboard';

            return redirect($redirect_url);;
        }
        else {
            return back()->with('failure', "Email or password Incorrect!!");
        }
    
    }
    

    
    public function register(){
    
        if (!\Request::has(Auth::$registerFormFillable)) {
            return back()->with('failure', "Error in your form fields, please check, make corrections and submit again");
            exit;
        }

        if(Auth::register_user())
        {
            $email = \Request::only(Auth::$registerFormFillable)['email'];
            $successMsg ='Newly registered on the platform with email '.$email.' on UNIX:'.time().'/'.date("d m Y h:i:s") ;
            Auth::create_session($email);
            Activities::create(Auth::getInfoByEmail($email)->id,  $successMsg);
            $redirect_url = \Request::has('redirect_url') ? \Request::input('redirect_url') : '/admin/dashboard';

            return redirect($redirect_url);;
        }
        else {
            return back()->with('failure', "Email already exist or some fields are empty or passwords do not match...");
        }
    
    }
        
    public function logout(){
    
        Activities::create(Auth::id(), 'Logged out of the platform');
        Auth::logout();
        return redirect('/home');
    
    }

    public function reset(){
    
        if (!\Request::has(Auth::$resetLinkFillable)) {
            echo ajax_alert('warning',"Error in your form fields, please check, make corrections and submit again");
            exit;
        }

        if(Auth::send_reset_link())
        {
            $email = \Request::only(Auth::$resetLinkFillable)['email'];
            Auth::send_reset_mail($email);

            echo ajax_alert('success','Reset link sent.. Check your mail!!');
        }
        else {
            echo ajax_alert('warning', "Email does not exist");
        }
    
    }


    
}
