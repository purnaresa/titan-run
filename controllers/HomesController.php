<?php
  include("models/Shuttle.php");
  include("models/Voucher.php");
  include("models/Payment.php");
  
  class HomesController {

    public function pictogo(){
      include 'views/pic2go/register.php';
    }

    public function index(){
      $shuttles = Shuttle::all();
      $date = date('Y')-1;
      
      $gallery_conditions = array(
      'conditions'  => array('gallery_year = ?',$date),
      'order' => 'gallery_year desc', 'limit' => 15);

      $galleries = Gallery::all($gallery_conditions);

      $race_conditions = array(
      'conditions'  => array('year like ? and category like ?','%2016%', '%17.8K%'),
      'order' => 'finish_time desc');

      $race_results = RaceResult::all($race_conditions);

      include "views/homes/index.php";
      
    }

    public function setUserData(){
      $_SESSION["year"] = (!empty($_SESSION['year']) ? $_SESSION['year'] : '2016');
      $_SESSION["category"] = (!empty($_SESSION['category']) ? $_SESSION['category'] : '');
      
      $type=@$_POST["type"];
      
      if($type=='Y'){
        $_SESSION["year"]=@$_POST["year"];
      }
      
      if ($type=='C'){
        $_SESSION["category"]=@$_POST["cat"];
      }
      
      if ($type=='YC'){
        $_SESSION["year"]=@$_POST["year"];
        $_SESSION["category"]=@$_POST["cat"];
      }
      
      echo json_encode(array('status' => '1'));
    }

    public function language(){
      if(isset($_POST['lang'])){
        $lang = $_POST['lang']; 
        if($lang === 'bahasa'){
          $_SESSION['lang'] = true;
        }else{
          $_SESSION['lang'] = null;          
        }
      }
      echo json_encode($_SESSION['lang']);
    }
  }
?>