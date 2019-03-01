<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public static $searchCardsFillable = ['q'];
    public static $addCardFillable = ['card_number','card_provider','expiry_month', 'expiry_year', 'owners_name'];
    public static $updateCardFillable = ['ref_id','card_number','card_provider','expiry_month', 'expiry_year', 'owners_name'];
    public static $removeCardFillable = ['ref_id'];
    public static $fundCardFillable = ['amount','trans_ref','ref_id'];


public static function add($userID)
{

    $data = \Request::only(self::$addCardFillable);

    $data['user_id'] = $userID;

    return \DB::table('cl_transport_cards')->insert($data);

}


// 2.) card_list
public static function _list($userID,$limit =50)
{
    return \DB::table('cl_transport_cards')
    ->where('user_id',$userID)
    ->orderByRaw('UNIX_TIMESTAMP(date_added) DESC')
    ->limit($limit)
    ->get();

}

public static function next_list($userID,$from_time,$limit =50)
{
    return \DB::table('cl_transport_cards')
    ->where('user_id',$userID)
    ->whereRaw("UNIX_TIMESTAMP(date_added) < '$from_time' ")
    ->orderByRaw('UNIX_TIMESTAMP(date_added) DESC')
    ->limit($limit)
    ->get();

}

// 2.) search_cards
public static function search($userID,$limit =50)
{

    return \DB::table('cl_transport_cards')
    ->where('user_id',$userID)
    ->where(function ($query) {
        $data = \Request::only(self::$searchCardsFillable);
        $search_string =  '%'.$data['q'].'%';

        $query->where('card_number', 'like',$search_string)
              ->orWhere('card_provider', 'like',$search_string);
    })
    ->orderByRaw('UNIX_TIMESTAMP(date_added) DESC')
    ->limit($limit)
    ->get();

}


// 3.) card_info
public static function info($userID,$ref_id)
{
    return \DB::table('cl_transport_cards')
    ->where('user_id',$userID)
    ->where('ref_id',$ref_id)
    ->orderByRaw('UNIX_TIMESTAMP(date_added) DESC')
    ->first();


}


// 4.) update_card
public static function _update($userID,$data)
{
    $data = \Request::only(self::$updateCardFillable);

    $data['user_id'] = $userID;

    return \DB::table('cl_transport_cards')->where('user_id',$userID)->where('ref_id',$data['ref_id'])->update($data);



}


// 5.) remove_card
public static function remove($userID)
{
    $data = \Request::only(self::$removeCardFillable);
    return \DB::table('cl_transport_cards')->where('user_id',$userID)->where('ref_id',$data['ref_id'])->delete();


}


// 6.) fund_card
public static function fund($userID)
{
    $data = \Request::only(self::$fundCardFillable);

    $cardInfo = self::info($userID,$data['ref_id']);
    unset($data['ref_id']);
    $data['user_id'] = $userID;
    $data['card_number'] = $cardInfo->card_number ;
    $data['card_provider'] = $cardInfo->card_provider ;
    $data['trans_type'] = 'credit';
    $data['approved'] = 'yes';
    $data['gateway'] = 'wallet';

    return \DB::table('cl_card_transactions')->insert($data);


}


// 17.) card_trans
public static function transactions($userID,$limit = 50)
{
    return \DB::table('cl_card_transactions')
            ->where('user_id',$userID)
            ->orderByRaw('UNIX_TIMESTAMP(date_created)')
            ->limit($limit)
            ->get();

      
}


// 18.) next_card_trans
public static function next_transactions($userID,$from_time,$limit = 50)
{
    return \DB::table('cl_card_transactions')
    ->where('user_id',$userID)
    ->whereRaw("UNIX_TIMESTAMP(date_created)  < '$from_time'")
    ->orderByRaw('UNIX_TIMESTAMP(date_created)')
    ->limit($limit)
    ->get();


}


// 19.) search_card_trans
public static function search_transactions($userID,$limit = 50)
{
    return \DB::table('cl_card_transactions')
            ->where('user_id',$userID)
            ->where(function ($query) {
                $data = \Request::only(self::$searchCardsFillable);
                $search_string =  '%'.$data['q'].'%';

                $query->where('card_number', 'like',$search_string)
                      ->orWhere('amount', 'like',$search_string)
                      ->orWhere('trans_ref', 'like',$search_string) ;
            })
            ->orderByRaw('UNIX_TIMESTAMP(date_created)')
            ->limit($limit)
            ->get();

}
}
