<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    

public static $searchActivityFillable = ['search_string'];

public static function create_activity($userID,$description,$activity_table = NULL, $unique_id = NULL)
{


  return \DB::table('cl_member_activity')->insert(
    [
      'user_id' => $userID,
      'activity' => $description,
      'activity_table' => $activity_table,
      'unique_id' => $unique_id,
      'ip'=> \Request::ip(),
      'ua' => \Request::header('User-Agent') 

    ]);


}


public static function activity_list($userID,$limit = 50)
{ 
    return \DB::table('cl_member_activity')
            ->where('user_id',$userID)
            ->orderByRaw('UNIX_TIMESTAMP(action_date) DESC')
            ->limit($limit)
            ->get();


}


public static function next_activity($userID, $from_time, $limit = 50)
{
    return \DB::table('cl_member_activity')
                ->where('user_id',$userID)
                ->whereRaw("UNIX_TIMESTAMP(action_date) < $from_time")
                ->orderByRaw('UNIX_TIMESTAMP(action_date) DESC')
                ->limit($limit)
                ->get();



}


public static function search_activity($userID,$limit =50)
{
        $data = \Request::only(self::$searchActivityFillable);
        
        return \DB::table('cl_member_activity')
                ->where('user_id',$userID)
                ->where('activity', 'like', "%{$data['search_string']}%")
                ->orderByRaw('UNIX_TIMESTAMP(action_date) DESC')
                ->limit($limit)
                ->get();


}


}
