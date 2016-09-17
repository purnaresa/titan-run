<?php 
class AdminRunAppsController{
  public function index(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $run_apps = FavouriteApp::all();
    include "views/Admins/run_apps/index.php";
  }

  public function create(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    if(isset($_POST['submit'])){
      $name = $_POST['name'];

      $attributes = array('name'=>$name);
      $run_app = new FavouriteApp($attributes);
      if($run_app->save()){
        header("Location: run-apps");
        exit;
      }
    }
    include "views/Admins/run_apps/create.php";
  }

  public function edit($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }

    $run_app = FavouriteApp::find($id);
    if(isset($_POST['submit'])){
      $name = $_POST['name'];

      $attributes = array('name'=>$name);
      if($run_app->update_attributes($attributes)){
        header("Location: run-apps");
        exit;
      }
    }
    include "views/Admins/run_apps/edit.php";
  }

  public function delete($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $run_app = FavouriteApp::find($id);
    if($run_app->delete()){
      header("Location: run-apps");
      exit;
    }
  }
}
?>