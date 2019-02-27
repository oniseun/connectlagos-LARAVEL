<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
// database_analytics
public static function database_analytics($userID)
{
  return \DB::select("SELECT

      (SELECT count(*) FROM cl_transport_cards WHERE user_id = $userID ) AS transport_cards,
      (SELECT sum(amount) from cl_wallet_transactions WHERE user_id = $userID and trans_type ='credit' ) AS wallet_credit,
      (SELECT sum(amount) from cl_wallet_transactions WHERE user_id = $userID and trans_type ='debit' ) AS wallet_debit,
      (SELECT count(*) FROM cl_member_activity WHERE user_id = $userID ) AS user_activities")[0];
}


}
