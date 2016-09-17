<?php
  include "models/Member.php";
  include "models/City.php";
  include "models/Country.php";
  include "models/Province.php";
  include "models/Company.php";

  class UsersController{
    public function setting(){
      if(empty($_SESSION['user'])){
        header("Location: login");
        exit;
      }

      $user = $_SESSION['user'];
      
      $member = Member::find($user['id']);
      $companies = Company::all();
      $countries = Country::all();
if($member->province_id){
$conditions = array(
    'conditions'  => array('province_id = ?',$member->province_id)); 
$cities = City::all($conditions);
}else{
      $cities = City::find('all', array('include' => array('province')));
}
      $provinces = Province::find('all', array('include' => array('cities')));
      
      if(isset($_POST['submit'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $dob = date_format(date_create($_POST['dob']),'Y-m-d');
		//$dob = DateTime::createFromFormat('Y-m-d', $_POST['dob']);
        $province_id = $_POST['province_id'];
        $city_id = $_POST['city_id'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $id_number = $_POST['id_number'];
        $titan_company = $_POST['titan_company'];

        
        if(!empty($_FILES['avatar']['name'])){
          $dir = "uploads/avatar/".$first_name."-".$last_name.$id_number."/";
          if(!is_dir($dir)){
            $mkdir = mkdir($dir, 0777, true);
          }
          move_uploaded_file($_FILES['avatar']['tmp_name'], $dir.$_FILES['avatar']['name']);
          $avatar = $dir.$_FILES['avatar']['name'];
        }
        
        if((bool)(@$password===@$password_confirmation)){
          @$password_hash = md5(@$password);
        }else{
          $password_hash = NULL;
        }

        if(!empty($_FILES['avatar']['name'])){
          $attributes = array('first_name'=>$first_name, 'last_name'=>$last_name,
            'dob'=>$dob, 'country_id'=>101,'titan_company'=>$titan_company, 'province_id'=>$province_id, 'address'=>$address, 'phone'=>$phone, 'id_number'=>$id_number, 'avatar'=>$avatar, 'city_id'=>$city_id);
        }else{
          $attributes = array('first_name'=>$first_name, 'last_name'=>$last_name,
            'dob'=>$dob, 'country_id'=>101,'titan_company'=>$titan_company, 'province_id'=>$province_id,'address'=>$address, 'phone'=>$phone, 'id_number'=>$id_number, 'city_id'=>$city_id);
			//, 'organization' => $organization
        }
        $member->status = true;
        $member->created_at = date('Y-m-d');
        
        if($member->update_attributes($attributes)){
          $_SESSION['not'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; update success</div>";
          $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; update success</div>";
          header("Location: profile");
          exit;
        }else{
         $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; ".$member->errors."</div>"; 
        }
      }

      include "views/users/setting.php"; 
    }

    public function register(){

      if(!empty($_SESSION['user'])){
        header("Location: profile");
        exit;
      }

      $companies = Company::all();
      $countries = Country::all();
      $cities = City::find('all', array('include' => array('province')));
      $provinces = Province::find('all', array('include' => array('cities')));
      
      if(isset($_POST['submit'])){
        if(strlen($_POST['password']) > 7){
          $image = new Bulletproof\Image($_FILES);
          $first_name = $_POST['first_name'];
          $last_name = $_POST['last_name'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $password_confirmation = $_POST['password_confirmation'];
          $dob = date_format(date_create($_POST['dob']),'Y-m-d');
          $gender = $_POST['gender'];
          $province_id = $_POST['province_id'];
          $city_id = $_POST['city_id'];
          $address = $_POST['address'];
          $phone = $_POST['phone'];
          $id_number = $_POST['id_number'];
          $organization = $_POST['organization'];
          
          if((bool)($password===$password_confirmation)){
            $password_hash = md5($password);
          }else{
            $password_hash = NULL;
          }

          if($image["avatar"]){
            $dir = "uploads/avatar/".$first_name."-".$last_name.$id_number."/";
            if(!is_dir($dir)){
              $mkdir = mkdir($dir, 0777, true);
            }
            move_uploaded_file($_FILES['avatar']['tmp_name'], $dir.$_FILES['avatar']['name']);
            $avatar = $dir.$_FILES['avatar']['name'];
          }

          $attributes = array('first_name'=>$first_name, 'last_name'=>$last_name, 'email'=>$email, 'password'=>$password_hash,
            'dob'=>$dob, 'gender'=>$gender, 'country_id'=>101, 'province_id'=>$province_id,
            'city_id'=>$city_id, 'address'=>$address, 'phone'=>$phone, 'id_number'=>$id_number, 'avatar'=>$avatar, 'organization' => $organization);
          
          $user = new Member($attributes);
          $user->status = false;
          $user->token = $this->generateToken();
          $user->created_at = date('Y-m-d');
          if($user->is_valid()){
            if($user->save()){
              $this->sendEmail($user, "http://mockup.panenmaya.com/EmptySite/verify");
              $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; please login to see your profile</div>";
              header("Location: login");
              exit;
            }else{
             $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; ".$user->errors."</div>"; 
            }
          }else{
            $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; input invalid</div>"; 
          }
        }else{
          $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; password too weak</div>";
        }

      }

      // include "views/users/register.php"; 
      include "views/users/register-closed.php"; 
    }

    public function login(){
      if(!empty($_SESSION['user'])){
        header("Location: profile");
        exit;
      }

      if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $users = Member::find_by_email_and_password($email, md5($password));


        if(empty($users)){
          $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> 
          &nbsp; email or password does not exists !</div>";
        }else{
          if($users->status){
            $_SESSION['user'] = ['id'=>$users->id, 'email'=>$users->email, 'name'=>$users->first_name.' '.$users->last_name];
            if(!empty(end($users->participants))){
              header("Location: profile"); 
            }else{
              header("location: participant-register");
            }
            exit;
          }else{
            $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> 
          &nbsp; you must verification email first to continue !</div>";
          }
        }
      }
      include "views/users/login.php";
    }

    public function logout(){
      if(empty($_SESSION['user'])){
        header("Location: login");
        exit;
      }
      session_destroy();
      header("Location: home");
      exit;
    }

    public function profile(){
      if(empty($_SESSION['user'])){
        header("Location: login");
        exit;
      }

      $categories = Category::all();
      $user = Member::find($_SESSION['user']['id']);

      $register = DeliveryPrice::find('last');

      $year = array();

      $data = array();
      $temparray = array();
	  $laci = array();	
      $temparrayname = array();
      $temparraydata = array();
      $temparraylabel = array();
      $hasil = array();
      //$eventrace = RaceEvent::find_all_by_member_id_and_category_id($user->id, 1);
	$conditions = array(
    'conditions'  => array('x.member_id = ? and x.year <= (select max(year) from race_eventvs where category_id=\'1\' and member_id=\''.$user->id.'\') and x.category_id = ? ',$user->id,1),
		'select' =>'x.member_id,x.year,x.name,x.category_id,y.conv ',
		'from' => ' (select b.year,a.name,a.category_id,a.member_id from race_eventvs a cross join (select year from race_eventvs group by year)b group by b.year,a.name,a.category_id,a.member_id) x left join race_eventvs y on x.name=y.name and x.year=y.year and x.category_id=y.category_id and x.member_id=y.member_id',
    	'order' => 'x.name,x.category_id,x.year'); 
		
	$eventrace = RaceEventv::all($conditions);
	  foreach ($eventrace as $race):
	  
	   	  $temp = explode(",", $race->year);
          $tempname = explode(",", $race->name);
          $date = $temp[0];
          $name = $tempname[0];
		  if($race->conv){
		  	
		    $data[$date]=$race->conv; 
		  }
		  else{	  
		  	$data[$date]=''; 
		  }
		$temparray[$name] = array('name'=>$name, 'data'=>array_values($data));
	  array_push($year, $date);
	  endforeach;
	  
	  $results=json_encode(array_values($temparray));
	  //[{"name":"RUN 1","data":[247000,551000]},{"name":"RUN 2","data":[0,3600000]}] --->>> maunya keluarnya kaya gini bang
	  //[{"name":"RUN 1","data":[247000,551000]},{"name":"RUN 2","data":[247000,3600000]}] --->>> tapi keluarnya kaya gini
	  //json_encode(array_values($temparray));
      $participant = end($user->participants);
      include "views/users/show.php";
    }

    public function loadProvinces(){
      $country_id = @$_POST['country'];
      $provinces = Province::find_all_by_country_id($country_id);
      $option_province = '';
      $option_province .= '<label for="company" class="col-sm-4 control-label">Province</label>
      <div class="col-sm-8 "><select class="form-control" name="province_id" id="province_id" required><option value="">--Select--</option>';
      foreach($provinces as $province){
        $option_province .= '<option value='.$province->id.'>'.$province->name.'</option>';
      }
      $option_province .= '</select></div>';
      echo json_encode(array('data' => $option_province));
    }

    public function loadCities(){
      $province_id = @$_POST['province'];
      $cities = City::find_all_by_province_id($province_id);
      $option_city = '';
      $option_city .= '<label for="company" class="col-sm-4 control-label">City</label>
      <div class="col-sm-8 "><select class="form-control" id="city_id" name="city_id" required><option value="">--Select--</option>';
      foreach($cities as $city){
        $option_city .= '<option value='.$city->id.'>'.$city->name.'</option>';
      }
      $option_city .= '</select></div>';
      echo json_encode(array('data' => $option_city));
    }

    public function loadCitiesPack(){
      $province_id = @$_POST['province'];
      $cities = City::find_all_by_province_id_and_pack($province_id, true);
      $option_city = '';
      $option_city .= '<label for="company" class="col-sm-4 control-label">City</label>
      <div class="col-sm-8 "><select class="form-control" name="city_id" required><option value="">--Select--</option>';
      foreach($cities as $city){
        $option_city .= '<option value='.$city->id.'>'.$city->name.'</option>';
      }
      $option_city .= '</select></div>';
      echo json_encode(array('data' => $option_city));
    }

    public function verifyEmail($token){
      if(!empty($token)){
        $member = Member::find_by_token($token);
        if($member){
          if($member->update_attributes(array('status'=>true, 'token' => null))){
            $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> 
          &nbsp; Now your account has been active !</div>";
            header("Location: login");
            exit;
          }
        }else{
          $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> 
          &nbsp; Member not found !</div>";
          header("Location: home");
          exit;
        }
      }else{
        $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> 
          &nbsp; Member not found !</div>";
        header("Location: home");
        exit;
      }
    }

    private function sendEmail($member, $url){
      $subject = "Email Registration Verification";

      $headers   = array();
      $headers[] = "MIME-Version: 1.0";
      $headers[] = "Content-type: text/html; charset=iso-8859-1";
      $headers[] = "From: no-reply <noreply@titanrun.com>";
      $headers[] = "Reply-To: ".$member->first_name." <".$member->email.">";
      $headers[] = "Subject: ".$subject;
      $headers[] = "X-Mailer: PHP/".phpversion();

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

      $message .='<div class="email-body"><div class="email-container"><div class="header"><hgroup><div align="middle"><img src="http://titan-run.id/img/logotitan.png" alt="logo titan run"></div><h1>Thank You</h1></hgroup></div><div class="section1">';
      
      $message .= '<p>Hi, '.$member->first_name.' '.$member->last_name.'</p>
                  <p>Thanks for join with us, to confirm your account please <a href="'.$url.$member->token.'" target="_blank" nofollow=true>Click here!</a></p><p>best regards,</p>';
      
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
