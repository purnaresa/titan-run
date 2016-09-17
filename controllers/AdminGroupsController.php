<?php 
class AdminGroupsController{
  public function index(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $groups = Group::all();
    include "views/Admins/groups/index.php";
  }

  public function create(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    if(isset($_POST['submit'])){
      $name = $_POST['name'];

      $attributes = array('name'=>$name);
      $group = new Group($attributes);
      if($group->save()){
        header("Location: groups");
        exit;
      }
    }
    include "views/Admins/groups/create.php";
  }

  public function edit($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $provinces = Province::all();
    $group = Group::find($id);
    if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $province_id = $_POST['province_id'];

      $attributes = array('name'=>$name);
      if($group->update_attributes($attributes)){
        header("Location: groups");
        exit;
      }
    }
    include "views/Admins/groups/edit.php";
  }

  public function delete($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $group = Group::find($id);
    if($group->delete()){
      header("Location: groups");
      exit;
    }
  }
}
?>