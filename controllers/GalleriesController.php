<?php
  include("models/Gallery.php");
  class GalleriesController{
    public function index(){
      $galleries = Gallery::all(array('group'=>'gallery_year', 'order' => 'gallery_year desc'));
      include 'views/galleries/index.php';
    }

    public function moment($year){
      $galleries = Gallery::find_all_by_gallery_year($year);
      include 'views/galleries/moment.php';
    }

    public function show($id){
      $gallery = Gallery::find($id);
      include 'views/galleries/show.php';
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
