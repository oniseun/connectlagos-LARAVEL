<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use App\Card;
use App\Wallet;
use App\Activities;

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
    
        if (\Request::has(Card::$addCardFillable) && Card::add(Auth::id())) {

            extract(\Request::only(Card::$addCardFillable));
            Activities::create(Auth::id(),"Added a new card $card_number/$card_provider  on ".date("d/m/Y h:i:s"), 'cl_transport_cards');
            echo ajax_alert('success',' Card added Successfully');
        }
        else {
            echo ajax_alert('warning',' Card could not be added!! ');
        }
    
    }

    public function fund(){

        $error = 'Insufficient balance in wallet please fund!
        <a href="#" type="submit" data-dismiss="modal" onclick="window.close()" class="btn btn-danger btn-round">Close</a>
        ';

        if (\Request::has(Card::$fundCardFillable) ) {

            $balance = Wallet::balance(Auth::id());

            extract(\Request::only(Card::$fundCardFillable));

            if($balance < $amount)
                {
                    echo $error ;
                }
            else
            {
                    if(Card::fund(Auth::id())) {
                        $cardInfo = Card::info(Auth::id(),$ref_id);
                        $description = "Card Funding of N$amount on {$cardInfo->card_number}/{$cardInfo->card_provider}" ;
                        Wallet::debit(Auth::id(),$amount,$trans_ref,$description);
                        $activityComment = $description . ' #'.$trans_ref.' on '.date("d/m/Y h:i:s");
                        Activities::create(Auth::id(),$activityComment, 'wallet_transactions');

                        echo 'Card funded successfully!!
            <a href="#" type="submit" data-dismiss="modal" onclick="window.close()" class="btn btn-danger btn-round">Close</a>';
                    }
                    else 
                    {
                        echo $error ;
                    }
            }
        }
        else 
        {
            echo $error ;
        }
    
    
    }

    public function remove(){

        if (\Request::has(Card::$removeCardFillable) ) {

            $ref_id = \Request::only(Card::$removeCardFillable)['ref_id'];
            $cardInfo = Card::info(Auth::id(),$ref_id);
            Card::remove(Auth::id(),$ref_id);
            $successMsg =  "Removed a card {$cardInfo->card_number}/{$cardInfo->card_provider}  on ".date("d/m/Y h:i:s");
            Activities::create(Auth::id(),$successMsg,  'cl_transport_cards');

        }
        
    }
    
}
