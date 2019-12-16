<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public static $updateInfoFillable = ['fullname','loginid','gender','phone','date_of_birth','about','email'];
    public static  $updatePasswordFillable = ['new_password','confirm_password'];
    public static  $updatePhotoFillable = ['photo'];
    public static  $blockUserFillable = ['person_id'];
    public static  $followUserFillable = ['friend_id'];
    
public static function update_info($userID)
{
    
    $data = \Request::only(self::$updateInfoFillable);
    //unset($data['email']); // don't allow changing of email address
    $data['date_of_birth'] = mysql_timestamp($data['date_of_birth']);
    $data['loginid'] = str_slug($data['loginid']);


    return \DB::table('cl_members')->where('id',$userID)->update($data);
    
}


// 21.) change_password
public static function change_password($userID)
{

    $data = \Request::only(self::$updatePasswordFillable);
    $new_password = bcrypt($data['confirm_password']);

    $access_token = md5(uniqid().microtime().strrev(uniqid()));

    return \DB::table('cl_members')->where('id',$userID)->update([ 'password' => $new_password, 'access_token' => $access_token ]);

   
   

}


// 22.) change_photo
public static function change_photo($userID)
{

    $data = \Request::only(self::$updatePhotoFillable);

    $upload_folder = 'assets-admin/uploads/'.date("Y/m");
    $user_name = $userID;
    $extension = \Request::file('photo')->extension();
    $new_name = str_slug($user_name.microtime().rand(111,666));	
    $full_file_name = "$new_name.$extension";

    $new_photo = \Request::file('photo')->storeAs($upload_folder,$full_file_name,'uploads');
  
    
    return \DB::table('cl_members')->where('id',$userID)->update([ 'photo' => $new_photo ]);


}

// 36.) user_info
public static function user_info($userID)
{
    return \DB::table('cl_members')->where('id',$userID)->first();

}

}
