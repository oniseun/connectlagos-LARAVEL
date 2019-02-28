<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use App\Activities;

class ActivityController extends Controller
{
    public function listView(){
        return view('list.activities');

    }
    
    public function ajaxList(){
    
        $activities = Activities::_list(Auth::id());
        return view('list.activitiesAjax',compact('activities'));
    
    }

    public function ajaxListFew(){
    
        $activities = Activities::_list(Auth::id(),6);
        return view('list.activitiesAjax',compact('activities'));
    
    }

    public function nextAjaxList($from_time){
    
        $activities = Activities::next_list(Auth::id(),$from_time);
        return view('list.activitiesAjax',compact('activities'));
    
    }


    
    public function search(){
    
        $activities = Activities::search(Auth::id());
        return view('list.activitiesAjax',compact('activities'));
    
    }
    
}
