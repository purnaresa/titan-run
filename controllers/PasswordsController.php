<?php

  class PasswordsController{
    public function forgotPassword(){
      if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $member = Member::find_by_email($email);
        if($member->id){
          $token = $this->generateToken();
          if($member->update_attributes(array('token'=>$token))){
            $this->sendEmail("Password Verificatioin", $member, "http://mockup.panenmaya.com/EmptySite/new-password");
            $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> 
          &nbsp; Please check your email to Verification password !</div>";
            header("Location: login");
            exit;
          };
        }else{
          $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> 
          &nbsp; Member with this email not found !</div>";
        }
      }
      include "views/passwords/forgot.php";
    }

    public function changePassword(){
      $user = $_SESSION['user'];

      if(empty($user)){
        header("Location: login");
        exit;
      }

      if(isset($_POST['submit'])){
        if(strlen($_POST['password']) > 7){
          $current_password = md5($_POST['current_password']);
          $password = $_POST['password'];
          $password_confirmation = $_POST['password_confirmation'];

          $member = Member::find_by_id_and_password($user['id'], $current_password);
          if($member){
            if((bool)($password == $password_confirmation)){
              $passwordhash = md5($password);
              $attributes = array('password'=>$passwordhash);
              if($member->update_attributes($attributes)){
                $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> 
            &nbsp; Member password has been changed, please login again to confirm !</div>";
                session_destroy();
                header("Location: login");
                exit;
              }else{
                $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> 
            &nbsp; Member password cannot be saved to records !</div>";
              }
            }
          }else{
            $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> 
            &nbsp; Member password not found !</div>";
          }
        }else{
          $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> 
            &nbsp; password too weak !</div>";
        }
      }

      include "views/passwords/change.php";
    }

    public function newPassword($token){
      if($token){
        $member = Member::find_by_token($token);
        if($member){

          $_SESSION['password'];

          if(isset($_POST['submit'])){
            if(strlen($_POST['password']) > 7){
              $newpassword = $_POST['password'];
              $confirmpassword = $_POST['password_confirmation'];
              if($newpassword == $confirmpassword){
                $passwordhash = md5($newpassword);
                if($member->update_attributes(array('password'=>$passwordhash, 'token'=>null, 'status'=>true))){
                  session_destroy();
                  $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; Member password has been changed !</div>";
                  header("Location: login");
                  exit;
                }else{
                  $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; Member password didn't change !</div>";
                }
              }else{
                $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; Password didn't match !</div>";
              }
            }else{
              $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; Password too weak !</div>";
            }
          }

        }else{
          $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> 
          &nbsp; Token invalid !</div>";
        }
      }else{
        $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> 
          &nbsp; Token missmatch or invalid !</div>";
      }
      include "views/passwords/new.php";
    }

    private function sendEmail($subject, $member, $url){
      $headers   = array();
      $headers[] = "MIME-Version: 1.0";
      $headers[] = "Content-type: text/html; charset=iso-8859-1";
      $headers[] = "From: no-reply <noreply@titanrun.com>";
      $headers[] = "Reply-To: ".$member->first_name." <".$member->email.">";
      $headers[] = "Subject: {$subject}";
      $headers[] = "X-Mailer: PHP/".phpversion();
      $md5email = $member->token;
      $message = '<html><head><style>.email-body{background:#fff;}.email-container {max-width:500px;margin: 0 auto;}
      .header {background:url("http://titan-run.id/img/bg1.jpg");background-position:center;background-size:cover;padding:50px;}
      .header hgroup {text-align:center;font-family:verdana;}
      .header hgroup h1 {font-size: 2em;color: #fff;font-weight: bold;letter-spacing:.3em;text-transform:uppercase;}
      .header hgroup h2 {padding:20px 0 0 0;font-size:.75em;color:#121212;}
		  .section1 {padding:20px;color:#666;font-family: verdana;background: #ecf0f1;}
		  .section1 h1 {font-size:1.2em;color: #121212;}
		  .section1 h2 {color:#121212;font-size:1.2em;}
		  .section1 p {line-height:1.5em;padding: 20px 0;font-size:.75em;}
		  .section1 img {width:100%;padding-top:20px;}
		  .section1 a.vip {color:#fff;padding: 10px 20px;background:#3498db;text-decoration: none;}
		  .footer{padding:20px;text-align:center;background:#1D1E20;color:#959595;font-family: Arial;}
		  .tg  {border-collapse:collapse;border-spacing:0;}
		  .tg td{padding:5px;font-size: 8pt;}
		  .tg th{font-weight:normal;}
		  .tg .tg-yw4l{vertical-align:top;}
		  .tg  {border-collapse:collapse;border-spacing:0;}
		  .tg td.borderedtop{border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;font-size:8pt;padding: 10px;}
		  .tg th.borderedtop{border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;font-size: 9pt;font-weight: bold;padding: 10px;}
		  .tg .tg-yw4l{vertical-align:top}
		  .tg td.noborder{overflow:hidden;word-break:normal;border:none;font-size:8pt;padding: 10px;}
      </style><title>Titanrun email Verification</title></head><body>';

      $message .='<div class="email-body" style=background:#fff;><div class="email-container" style=max-width:500px;margin: 0 auto;><div class="header" style=background:url("http://titan-run.id/img/bg1.jpg");background-position:center;background-size:cover;padding:50px;><hgroup style=text-align:center;font-family:verdana;><div align="middle"><img src="http://titan-run.id/img/logotitan.png" alt="logo titan run"></div><h1>Thank You</h1></hgroup></div><div class="section1">';
      $message .= '<p>Hi, '.$member->first_name.' '.$member->last_name.'</p><p>Thanks for join with us, to confirm your account please <a href="'.$url.$md5email.'" target="_blank" nofollow=true>Click here!</a></p><p>best regards,</p>';
      $message .= ' </div><div class="footer"><p>Copyright TITAN RUN 2016. All rights reserved</p></div></div></div></body></html>';

      $msg = "<div class='alert alert-success'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered, please login !</div>";
      mail($member->email, $subject, $message, implode("\r\n", $headers));
    }

    private function generateToken($length=10){

      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }

  }

?>