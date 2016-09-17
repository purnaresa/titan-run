<?php 
class AdminCitiesController{
  public function index(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $cities = City::all();
    include "views/Admins/cities/index.php";
  }

  public function create(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $provinces = Province::all();
    if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $province_id = $_POST['province_id'];
      $pack = $_POST['pack'];

      $attributes = array('name'=>$name,'province_id'=>$province_id,'pack'=>$pack);

      $city = new City($attributes);
      if($city->save()){
        header("Location: cities");
        exit;
      }
    }
    include "views/Admins/cities/create.php";
  }

  public function edit($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $provinces = Province::all();
    $city = City::find($id);
    if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $province_id = $_POST['province_id'];
      $pack = $_POST['pack'];

      $attributes = array('name'=>$name,'province_id'=>$province_id,'pack'=>$pack);
      if($city->update_attributes($attributes)){
        header("Location: cities");
        exit;
      }
    }
    include "views/Admins/cities/edit.php";
  }

  public function delete($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $city = City::find($id);
    if($city->delete()){
      header("Location: cities");
      exit;
    }
  }
}
?>