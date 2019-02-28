<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    
public static $fundDebitWalletFillable = ['amount' ,'trans_ref' ];
public static $searchWalletTransactionFillable = ['q'];
// 7.) wallet_balance
public static function balance($userID)
{
    return \DB::select("SELECT

    ((SELECT sum(amount) from cl_wallet_transactions WHERE user_id = $userID and trans_type ='credit' ) 
    - (SELECT sum(amount) from cl_wallet_transactions WHERE user_id = $userID and trans_type ='debit' )) AS wallet_balance
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
public static function fund_wallet($userID,$description = 'wallet fund from paystack')
{

    $data = \Request::only(self::$fundWalletFillable);

    $data['user_id'] = $userID;
    $data['description'] = $description ;
    $data['trans_type'] = 'credit';
    $data['approved'] = 'yes';
    $data['gateway'] = 'paystack';

    return \DB::table('cl_wallet_transactions')->insert($data);


  //if($this->verify_trans($trans_ref,$amount)):


    
 //$this->create_activity('Funded wallet with N'.$amount.' through paystack #'.$trans_ref.' on '.date("d/m/Y h:i:s"), 'wallet_transactions',$this->get_id());

    // endif;

}

// 11.) debit_wallet
public static function debit_wallet($userID,$description = 'wallet debit from paystack')
{

    $data = \Request::only(self::$fundWalletFillable);

    $data['user_id'] = $userID;
    $data['description'] = $description ;
    $data['trans_type'] = 'debit';
    $data['approved'] = 'yes';
    $data['gateway'] = 'wallet';

    return \DB::table('cl_wallet_transactions')->insert($data);


      //   $this->create_activity($description.' #'.$trans_ref.' on '.date("d/m/Y h:i:s"),
      //   'wallet_transactions',$this->get_id());
     



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
