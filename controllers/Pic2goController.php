<?php
//  include("models/pic2go.php");
  class Pic2goController{
    public function index(){
     // $galleries = Gallery::all(array('group'=>'gallery_year'));
      include 'views/pic2go/index.php';
    }

   /* public function moment($year){
      $galleries = Gallery::find_all_by_gallery_year($year);
      include 'views/galleries/moment.php';
    }

    public function show($id){
      $gallery = Gallery::find($id);
      include 'views/galleries/show.php';
    } */
  }
?>