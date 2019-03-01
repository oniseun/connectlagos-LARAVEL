<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wallet;
use App\Auth;
use App\Activities;

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
    
        if (\Request::has(Wallet::$fundWalletFillable) 
        && \Request::only(Wallet::$fundWalletFillable)['amount'] < 5001 
            && Wallet::fund(Auth::id()) ) {
            extract(\Request::only(Wallet::$fundWalletFillable));
            Activities::create(Auth::id(),'Funded wallet with N'.e($amount).' through paystack #'.e($trans_ref).' on '.date("d/m/Y h:i:s"), 'wallet_transactions');
            echo 'Wallet funded successfully!! <a href="#" type="submit" onclick="window.close()" class="btn btn-danger btn-round">Close</a>';
        }
        else {
            echo 'Error occured (you can\'t fund more than 5k at once)  <a href="/admin/dialogs/wallet/topup"  class="btn btn-danger btn-round">back</a>';
        }
    
    }
    
}
