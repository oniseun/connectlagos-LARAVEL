<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public static $searchCardsFillable = ['search_string'];
    public static $addCardFillable = ['card_number','card_provider','expiry_month', 'expiry_year', 'owners_name'];
    public static $updateCardFillable = ['ref_id','card_number','card_provider','expiry_month', 'expiry_year', 'owners_name'];
    public static $removeCardFillable = ['ref_id'];
    public static $fundCardFillable = ['amount','trans_ref','ref_id'];


public static function add_card($userID)
{

    $data = \Request::only(self::$addCardFillable);

    $data['user_id'] = $userID;

    return \DB::table('cl_transport_cards')->insert($data);
//  $this->create_activity("Added a new card $card_number/$card_provider  on ".date("d/m/Y h:i:s"), 'cl_transport_cards',$this->get_id());

}


// 2.) card_list
public static function card_list($userID,$limit =50)
{
    return \DB::table('cl_transport_cards')
    ->where('user_id',$userID)
    ->orderByRaw('UNIX_TIMESTAMP(date_added) DESC')
    ->limit($limit)
    ->get();

}

public static function next_cards($userID,$from_time,$limit =50)
{
    return \DB::table('cl_transport_cards')
    ->where('user_id',$userID)
    ->whereRaw("UNIX_TIMESTAMP(date_added) < '$from_time' ")
    ->orderByRaw('UNIX_TIMESTAMP(date_added) DESC')
    ->limit($limit)
    ->get();

}

// 2.) search_cards
public static function search_cards($userID,$limit =50)
{
    $data = \Request::only(self::$searchCardsFillable);
    $search_string = $data['search_string'];

    return \DB::table('cl_transport_cards')
    ->where('user_id',$userID)
    ->whereRaw("(card_number LIKE '%?%' OR card_provider LIKE '%?%')",[$search_string,$search_string])
    ->orderByRaw('UNIX_TIMESTAMP(date_added) DESC')
    ->limit($limit)
    ->get();

}


// 3.) card_info
public static function card_info($userID,$ref_id)
{
    return \DB::table('cl_transport_cards')
    ->where('user_id',$userID)
    ->where('ref_id',$ref_id)
    ->orderByRaw('UNIX_TIMESTAMP(date_added) DESC')
    ->first();


}


// 4.) update_card
public static function update_card($userID,$data)
{
    $data = \Request::only(self::$updateCardFillable);

    $data['user_id'] = $userID;

    return \DB::table('cl_transport_cards')->where('user_id',$userID)->where('ref_id',$data['ref_id'])->update($data);



}


// 5.) remove_card
public static function remove_card($userID)
{
    $data = \Request::only(self::$removeCardFillable);

    return \DB::table('cl_transport_cards')->where('user_id',$userID)->where('ref_id',$data['ref_id'])->delete();

// $this->create_activity("Removed a card $card_number/$card_provider  on ".date("d/m/Y h:i:s"),  'cl_transport_cards');
  


}


// 6.) fund_card
public static function fund_card($userID)
{
    $data = \Request::only(self::$fundCardFillable);

    $cardInfo = self::card_info($userID,$data['ref_id']);
    $data['user_id'] = $userID;
    $data['card_number'] = $cardInfo->card_number ;
    $data['card_provider'] = $cardInfo->card_provider ;
    $data['trans_type'] = 'credit';
    $data['approved'] = 'yes';
    $data['gateway'] = 'wallet';

    return \DB::table('cl_card_transactions')->insert($data);


   //  $this->debit_wallet($amount,"Card Funding of N$amount on $card_number/$card_provider",$trans_ref);
    


}


// 17.) card_trans
public static function card_trans($userID,$limit = 50)
{
    return \DB::table('cl_card_transactions')
            ->where('user_id',$userID)
            ->orderByRaw('UNIX_TIMESTAMP(date_created)')
            ->limit($limit)
            ->get();

      
}


// 18.) next_card_trans
public static function next_card_trans($userID,$from_time,$limit = 50)
{
    return \DB::table('cl_card_transactions')
    ->where('user_id',$userID)
    ->whereRaw("UNIX_TIMESTAMP(date_created)  < '$from_time'")
    ->orderByRaw('UNIX_TIMESTAMP(date_created)')
    ->limit($limit)
    ->get();


}


// 19.) search_card_trans
public static function search_card_trans($userID,$limit = 50)
{
    $data = \Request::only(self::$searchCardsFillable);
    $search_string = $data['search_string'];

    return \DB::table('cl_card_transactions')
            ->where('user_id',$userID)
            ->whereRaw("(card_number LIKE '%?%' OR  amount LIKE '%?%' OR trans_ref LIKE '%?%')",[$search_string,$search_string,$search_string])
            ->orderByRaw('UNIX_TIMESTAMP(date_created)')
            ->limit($limit)
            ->get();

}
}
