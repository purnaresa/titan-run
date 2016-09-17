<?php 
class AdminRelatedsController{
  public function index(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $relateds = RelatedInformation::all();
    include "views/Admins/relateds/index.php";
  }

  public function create(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    if(isset($_POST['submit'])){
      $name = $_POST['name'];

      $attributes = array('name'=>$name);
      $related = new RelatedInformation($attributes);
      if($related->save()){
        header("Location: related-informations");
        exit;
      }
    }
    include "views/Admins/relateds/create.php";
  }

  public function edit($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $related = RelatedInformation::find($id);
    if(isset($_POST['submit'])){
      $name = $_POST['name'];

      $attributes = array('name'=>$name);
      if($related->update_attributes($attributes)){
        header("Location: related-informations");
        exit;
      }
    }
    include "views/Admins/relateds/edit.php";
  }

  public function delete($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $related = RelatedInformation::find($id);
    if($related->delete()){
      header("Location: related-informations");
      exit;
    }
  }
}
?>