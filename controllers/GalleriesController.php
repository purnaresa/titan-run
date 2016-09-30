<?php
  include("models/Gallery.php");
  class GalleriesController{
    public function index(){
      $galleries = Gallery::all(array(
	  									'from' => "galleries where gallery_year !='1800'",
	  									'group'=>'gallery_year', 
										'order' => 'gallery_year desc'));
      include 'views/galleries/index.php';
    }

    public function moment($year){
	  $start=0;
	  $limit=15;
	  if(isset($_GET['id']))
	  {
		  $id=$_GET['id'];
		  $start=($id-1)*$limit;
	  }
	  else{
		  $id=1;
	  }	
	  $condition=array(
	  					'select'  => '*',
						'from' => "galleries where gallery_year = ".$year." limit ".$start.",".$limit
						);
      $galleries = Gallery::all($condition);
	  $count = Gallery::all(array(
	  					'select'  => 'count(id) as rowcount',
	  					'conditions'  => array('gallery_year = ?',$year)));
						
	  $rows = 0;
	  foreach($count as $cnt):
	  $rows=$cnt->rowcount;
	  endforeach;		
	  $total=ceil($rows/$limit);
	  
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
