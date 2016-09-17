<?php 
class AdminProvincesController{
  public function index(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $provinces = Province::all();
    include "views/Admins/provinces/index.php";
  }

  public function create(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $countries = Country::all();
    if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $country_id = $_POST['country_id'];
      $pack = $_POST['pack'];

      $attributes = array('name'=>$name,'country_id'=>$country_id, 'pack'=>$pack);
      $province = new Province($attributes);
      if($province->save()){
        header("Location: provinces");
        exit;
      }
    }
    include "views/Admins/provinces/create.php";
  }

  public function edit($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $countries = Country::all();
    $province = Province::find($id);
    if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $country_id = $_POST['country_id'];
      $pack = $_POST['pack'];

      $attributes = array('name'=>$name,'country_id'=>$country_id, 'pack'=>$pack);

      if($province->update_attributes($attributes)){
        if($province->pack){
          City::update_all(array('set' => array('pack' => true), 'conditions'=>array('province_id'=>$id)));
        }else{
          City::update_all(array('set' => array('pack' => false), 'conditions'=>array('province_id'=>$id)));
        }
        header("Location: provinces");
        exit;
      }
    }
    include "views/Admins/provinces/edit.php";
  }

  public function delete($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $province = Province::find($id);
    if($province->delete()){
      header("Location: provinces");
      exit;
    }
  }
}
?>