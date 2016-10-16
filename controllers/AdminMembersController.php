<?php

class AdminMembersController
{
    public function index()
    {
        if (empty($_SESSION['admin'])) {
            header('Location: login');
            exit;
        }
        $members = Member::all();
        include 'views/Admins/members/index.php';
    }

    public function show($id)
    {
        if (empty($_SESSION['admin'])) {
            header('Location: login');
            exit;
        }
        $member = Member::find($id);
        $avatarPath = "../" . $member->avatar;
        $member->avatar = ($member->avatar === "" || ($member->avatar !== "" && !file_exists($avatarPath))) ? 'http://placehold.it/150' : $avatarPath;

        include 'views/Admins/members/show.php';
    }

    public function delete($id)
    {
        if (empty($_SESSION['admin'])) {
            header('Location: login');
            exit;
        }
        $member = Member::find($id);
        if ($member->delete()) {
            header('Location: members');
            exit;
        }
    }

    public function add()
    {
        if (empty($_SESSION['admin'])) {
            header('Location: login');
            exit;
        }

        if (isset($_POST['submit'])) {
            $isPasswordValid = true;

            if (strlen($_POST['password']) < 7) {
                $message = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; password too weak</div>";
                $isPasswordValid = false;
            }

            if ((bool) $_POST['password'] === $_POST['password_confirmation']) {
                $message = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; confirmation password didn't match</div>";
                $isPasswordValid = false;
            }

            if ($isPasswordValid) {
                $image        = new Bulletproof\Image($_FILES);
                $first_name   = $_POST['first_name'];
                $last_name    = $_POST['last_name'];
                $email        = $_POST['email'];
                $password     = $_POST['password'];
                $dob          = date_format(date_create_from_format('d/m/Y', $_POST['dob']), 'Y-m-d');
                $gender       = $_POST['gender'];
                $province_id  = $_POST['province_id'];
                $city_id      = $_POST['city_id'];
                $address      = $_POST['address'];
                $phone        = $_POST['phone'];
                $id_number    = $_POST['id_number'];
                $organization = $_POST['organization'];

                //upload file
                $avatar = "";
                if ($image['avatar']) {
                    $dir = 'uploads/avatar/'.$first_name.'-'.$last_name.$id_number.'/';
                    if (!is_dir($dir)) {
                        $mkdir = mkdir($dir, 0777, true);
                    }
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir.$_FILES['avatar']['name']);
                    $avatar = $dir.$_FILES['avatar']['name'];
                }

                $attributes = array(
                  'first_name'   => $first_name,
                  'last_name'    => $last_name,
                  'email'        => $email,
                  'password'     => md5($password),
                  'dob'          => $dob,
                  'gender'       => $gender,
                  'country_id'   => 101, //TODO: remove this hardcoded country_id
                  'province_id'  => $province_id,
                  'city_id'      => $city_id,
                  'address'      => $address,
                  'phone'        => $phone,
                  'id_number'    => $id_number,
                  'avatar'       => $avatar,
                  'organization' => $organization,
                  'status'       => true,
                  'token'        => NULL
                );

                $user = new Member($attributes);

                if ($user->is_valid()) {
                    if ($user->save()) {
                        $this->sendEmail($user, 'http://mockup.panenmaya.com/EmptySite/verify');
                        $message = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; please login to see your profile</div>";
                        header('Location: detail' . $user->id);
                        exit;
                    }
                }

                $errors = $user->errors;
            }
        }

        $countries = Country::all();
        $provinces = Province::all();

        include 'views/Admins/members/create.php';
    }

    private function sendEmail($member, $url)
    {
        $subject = 'Email Registration Verification';

        $headers = array();
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = 'From: no-reply <noreply@titanrun.com>';
        $headers[] = 'Reply-To: '.$member->first_name.' <'.$member->email.'>';
        $headers[] = 'Subject: '.$subject;
        $headers[] = 'X-Mailer: PHP/'.phpversion();

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

        $message .= '<div class="email-body"><div class="email-container"><div class="header"><hgroup><div align="middle"><img src="http://titan-run.id/img/logotitan.png" alt="logo titan run"></div><h1>Thank You</h1></hgroup></div><div class="section1">';

        $message .= '<p>Hi, '.$member->first_name.' '.$member->last_name.'</p>
                  <p>Thanks for join with us, to confirm your account please <a href="'.$url.$member->token.'" target="_blank" nofollow=true>Click here!</a></p><p>best regards,</p>';

        $message .= ' </div><div class="footer"><p>Copyright TITAN RUN 2016. All rights reserved</p></div></div></div></body></html>';

        $msg = "<div class='alert alert-success'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered, please login !</div>";

        mail($member->email, $subject, $message, implode("\r\n", $headers));
    }
}
