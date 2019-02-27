<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    

// get_token
private function get_token($email)
{

    return $this->query_single_data("SELECT access_token FROM cl_members WHERE email ='$email' LIMIT 1")['access_token'];

}


// get_id
private function get_uid($email)
{

           return $this->query_single_data("SELECT id FROM cl_members WHERE email ='$email' LIMIT 1")['id'];


}


// login_user
public function login_user($email,$remember = 'yes')
{
  $uid = $this->get_uid($email);
  $token = $this->get_token($email);
  $rm = $remember === 'yes' ? (60 * 60 * 24 * 30) : false;
  set_cookie('cl_user_id', $uid, $rm);
  set_cookie('cl_access_token', $token, $rm);

  $this->insert(
    [
      'user_id' => $uid,
      'activity' => 'Logged into the platform with email  '.$email. 'on UNIX:'.time().'/'.date("d m Y h:i:s"),
      'ip'=>viewer_details()['ip'],
      'ua' =>$this->escape_string(viewer_details()['ua'])

    ],'cl_member_activity');


}


// logout_user
public function logout_user()
{
  $tm= new Transport_Manager;
  $tm->create_activity("Logged out of the platform");
  delete_cookie('cl_access_token','cl_user_id');
  return true;

}


// verify_email
public function verify_email($email)
{

           return $this->query_data("UPDATE cl_members SET email_verified = 'yes' WHERE email = '$email'");


}


// register_user
public function register_user($data)
{

  extract($this->clean_post($data));
    $insert = $this->insert(
      [
        'email' => $email,
        'loginid' => create_url($fullname),
        'fullname'=>$fullname,
        'phone'=>$phone,
        'password' => md5($confirm_password),
        'gender' => $gender,
        'date_of_birth' =>$this->now($date_of_birth),
        'access_token' =>uniqid().strrev(uniqid())

      ],'cl_members' );

      if($insert)
      {
        $this->insert(
          [
            'user_id' => $this->get_id(),
            'activity' => 'Newly registered on the platform with email '.$email.' on UNIX:'.time().'/'.date("d m Y h:i:s"),
            'ip'=>viewer_details()['ip'],
            'ua' =>$this->escape_string(viewer_details()['ua'])

          ],'cl_member_activity');
        $this->login_user($email);

        return true;

      }
      if($insert)
      {
        return false;

      }




}


// send_reset_link
public function send_reset_link($data)
{
extract($this->clean_post($data));

$reset_code = strrev(uniqid()).str_shuffle(uniqid());
return $this->insert(
  [
    'email' => $email,
    'code' =>$reset_code,
    'code_expiry' => $this->now(date("d, D F Y",(time() + 86400)))

  ],'cl_password_reset' );


require '../mailer/PHPMailerAutoload.php';

extract($_POST);

$from = 'password-reset@connectlagos.com.ng';
$from_label = 'connectlagos.com.ng';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom($from, $from_label );
//Set who the message is to be sent to


//send the message, check for errors
  $data = "
  <html>
  <head>

  </head>
  <body>
  <h3>Please click on the below link to reset your password </h3

  <p><hr></p>

  <p><a href=\"reset-password.php?code=$reset_code\"> reset-password.php?code=$reset_code</a></p>

  <p><hr></p>

  <p><i>This message was sent on <b>".date("D, d M Y")."</b> - please ignore if you did not initiate this message </i></p>


  </body>
  </html>

  ";
  $to =     $email;
  $mail->addReplyTo($from, $from);

  $subject = 'Reset your password';
  $content = $data;// $_POST['content'];

  $mail->addAddress($to,$to);
  $mail->Subject = $subject;
  $mail->msgHTML($content);
  $mail->AltBody = strip_tags($content);
  echo $mail->send() ? 'Message Sent': 'Message not Sent';

}


// reset_password
public function reset_password ($data)
{

  extract($this->clean_post($data));
    return $this->update(
      [
        'password' => md5($new_password)
        ],
      [ 'email'=> $email],'cl_members' );


}
}
