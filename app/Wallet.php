<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    
public static $fundWalletFillable = ['amount' ,'trans_ref' ];
public static $searchWalletTransactionFillable = ['q'];
// 7.) wallet_balance
public static function balance($userID)
{
    return \DB::select("SELECT

    ((SELECT IFNULL(sum(amount),0) from cl_wallet_transactions WHERE user_id = $userID and trans_type ='credit' ) 
    - (SELECT IFNULL(sum(amount),0) from cl_wallet_transactions WHERE user_id = $userID and trans_type ='debit' )) AS wallet_balance
   ")[0]->wallet_balance;


}

public static function verify_trans($transref,$amount)
{
            //file_get_contents('');
           return true;
}

public static function transactions($userID,$limit =50)
{
    return \DB::table('cl_wallet_transactions')
                ->where('user_id',$userID)
                ->orderByRaw('UNIX_TIMESTAMP(date_created) DESC ')
                ->limit($limit)->get();


}

public static function next_transactions($userID,$from_time,$limit=50)
{
    return \DB::table('cl_wallet_transactions')
    ->where('user_id',$userID)
    ->whereRaw("UNIX_TIMESTAMP(date_created)  < '$from_time'")
    ->orderByRaw('UNIX_TIMESTAMP(date_created) DESC ')
    ->limit($limit)->get();

}


// 11.) fund_wallet
public static function fund($userID,$description = 'wallet fund from paystack')
{

    $data = \Request::only(self::$fundWalletFillable);

    $data['user_id'] = $userID;
    $data['description'] = $description ;
    $data['trans_type'] = 'credit';
    $data['approved'] = 'yes';
    $data['gateway'] = 'paystack';

    return \DB::table('cl_wallet_transactions')->insert($data);



}

// 11.) debit_wallet
public static function debit($userID,$amount,$trans_ref,$description = 'direct wallet debit for card funding')
{
$data = [];

    $data['user_id'] = $userID;
    $data['amount'] = $amount;
    $data['trans_ref'] = $trans_ref;
    $data['description'] = $description ;
    $data['trans_type'] = 'debit';
    $data['approved'] = 'yes';
    $data['gateway'] = 'wallet';

    return \DB::table('cl_wallet_transactions')->insert($data);





}


// 12.) search_wallet_trans
public static function search_transactions($userID,$limit =50)
{
   
    return \DB::table('cl_wallet_transactions')
            ->where('user_id',$userID)
            ->where(function ($query) {
                $data = \Request::only(self::$searchWalletTransactionFillable);
                $search_string =  '%'.$data['q'].'%';

                $query->where('amount', 'like',$search_string)
                      ->orWhere('description', 'like',$search_string)
                      ->orWhere('trans_ref', 'like',$search_string) ;
            })
             ->orderByRaw('UNIX_TIMESTAMP(date_created)')
            ->limit($limit)
            ->get();
            
}


}
