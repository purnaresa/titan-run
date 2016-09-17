<?php
  class Member extends ActiveRecord\Model {
    static $validates_presence_of = array(
      array('first_name', 'message' => 'cannot be blank!'),
      array('email', 'message' => 'cannot be blank!'),
      array('password', 'message' => 'cannot be blank!')
    );

    static $validates_uniqueness_of = array(
      array('email', 'message' => 'already exist!'),
      array('id_number', 'message' => 'already exist!')
    );
    
    static $validates_format_of = array(
      array('email', 'with' =>'/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/')
    );

    static $belongs_to = array(array('country'),array('city'),array('province'),array('company'));
    static $has_many = array(array('member_shuttles'),array('participants'),array('race_events'),array('race_eventvs'),array('race_packs', 'through'=>'participants', 'class_name' => 'RacePack'),array('payments', 'through'=>'participants'));

    public function sendEmail(){
      //extract data from the post
      //set POST variables
      $url = 'http://domain.com/get-post.php';
      $fields = array(
        'lname' => urlencode($_POST['last_name']),
        'fname' => urlencode($_POST['first_name']),
        'title' => urlencode($_POST['title']),
        'company' => urlencode($_POST['institution']),
        'age' => urlencode($_POST['age']),
        'email' => urlencode($_POST['email']),
        'phone' => urlencode($_POST['phone'])
      );

      //url-ify the data for the POST
      foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
      rtrim($fields_string, '&');

      //open connection
      $ch = curl_init();

      //set the url, number of POST vars, POST data
      curl_setopt($ch,CURLOPT_URL, $url);
      curl_setopt($ch,CURLOPT_POST, count($fields));
      curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

      //execute post
      $result = curl_exec($ch);

      //close connection
      curl_close($ch);
    }
  }
?>