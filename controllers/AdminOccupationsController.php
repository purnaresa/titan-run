<?php 
class AdminOccupationsController{
  public function index(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $occupations = Occupation::all();
    include "views/Admins/occupations/index.php";
  }

  public function create(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    if(isset($_POST['submit'])){
      $name = $_POST['name'];

      $attributes = array('name'=>$name);
      $occupation = new Occupation($attributes);
      if($occupation->save()){
        header("Location: occupations");
        exit;
      }
    }
    include "views/Admins/occupations/create.php";
  }

  public function edit($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $occupation = Occupation::find($id);
    if(isset($_POST['submit'])){
      $name = $_POST['name'];

      $attributes = array('name'=>$name);
      if($occupation->update_attributes($attributes)){
        header("Location: occupations");
        exit;
      }
    }
    include "views/Admins/occupations/edit.php";
  }

  public function delete($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $occupation = Occupation::find($id);
    if($occupation->delete()){
      header("Location: occupations");
      exit;
    }
  }
}
?>