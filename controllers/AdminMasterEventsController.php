<?php 
include("models/MasterEvent.php");
class AdminMasterEventsController{
  public function index(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $events = MasterEvent::all();
    include "views/Admins/master_events/index.php";
  }

  public function create(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    if(isset($_POST['submit'])){
      $name = $_POST['name'];

      $attributes = array('name'=>$name);
      $event = new MasterEvent($attributes);
      if($event->save()){
        header("Location: master-events");
        exit;
      }
    }
    include "views/Admins/master_events/create.php";
  }

  public function edit($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    
    $event = MasterEvent::find($id);
    if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $province_id = $_POST['province_id'];

      $attributes = array('name'=>$name);
      if($event->update_attributes($attributes)){
        header("Location: master-events");
        exit;
      }
    }
    include "views/Admins/master_events/edit.php";
  }

  public function delete($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $event = MasterEvent::find($id);
    if($event->delete()){
      header("Location: master-events");
      exit;
    }
  }
}
?>