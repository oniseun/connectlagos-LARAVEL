<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wallet;
use App\Auth;

class WalletController extends Controller
{
    public function topUpForm(){

        $balance = Wallet::balance(Auth::id());
        return view('dialogs.walletTopUpForm',compact('balance'));


    }
    
    public function listView(){
    
        return view('list.walletTransactions');
    
    }
    
    public function ajaxList(){
    
        $transactions = Wallet::transactions(Auth::id());
        return view('list.walletTransactionsAjax',compact('transactions'));
    
    }

    public function nextAjaxList($from_time){
    
        $transactions = Wallet::next_transactions(Auth::id(),$from_time);
        return view('list.walletTransactionsAjax',compact('transactions'));
    
    }
    
    public function search(){

        $transactions = Wallet::search_transactions(Auth::id());
        return view('list.walletTransactionsAjax',compact('transactions'));
    
    
    }
    
    public function topUp(){
    
    
    
    }
    
}
