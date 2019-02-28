<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use App\Card;
use App\Wallet;
class CardController extends Controller
{
    public function listView(){

        return view('list.cards');

    }
    
    public function ajaxList(){
    
        $cards = Card::_list(Auth::id());
        return view('list.cardsAjax',compact('cards'));
    
    }

    public function nextAjaxList($from_time){
    
        $cards = Card::next_list(Auth::id(),$from_time);
        return view('list.cardsAjax',compact('cards'));
    
    }

    public function ajaxListFew(){
    
        $cards = Card::_list(Auth::id(),6);
        return view('list.cardsAjax',compact('cards'));
    
    }
    public function search(){
    
        $cards = Card::search(Auth::id());
        return view('list.cardsAjax',compact('cards'));
    
    }

    public function fundCardForm($ref_id){
        $balance = Wallet::balance(Auth::id());
        $cardInfo = Card::info(Auth::id(),$ref_id);
        return view('dialogs.cardFundForm',compact('cardInfo','balance'));

    }
    
    public function transactionListView(){
    
        return view('list.cardTransactions');
    
    }
    
    public function ajaxTransactionList(){
    
        $transactions = Card::transactions(Auth::id());
        return view('list.cardTransactionsAjax',compact('transactions'));
    
    }

    public function nextAjaxTransactionList($from_time){
    
        $transactions = Card::next_transactions(Auth::id(),$from_time);
        return view('list.cardTransactionsAjax',compact('transactions'));
    
    }

    public function searchTransactions(){
    
        $transactions = Card::search_transactions(Auth::id());
        return view('list.cardTransactionsAjax',compact('transactions'));
    
    }
    
    public function add(){
    
    
    
    }

    public function fund(){
    
    
    
    }

    public function delete(){
    
    
    
    }
    
}
