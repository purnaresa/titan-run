<?php 
class AdminEventsController{
  public function index(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $events = Event::all();
    include "views/Admins/events/index.php";
  }

  public function create(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    if(isset($_POST['submit'])){
      $name = $_POST['name'];

      $attributes = array('name'=>$name);
      $event = new Event($attributes);
      if($event->save()){
        header("Location: events");
        exit;
      }
    }
    include "views/Admins/events/create.php";
  }

  public function edit($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $provinces = Province::all();
    $event = Event::find($id);
    if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $province_id = $_POST['province_id'];

      $attributes = array('name'=>$name);
      if($event->update_attributes($attributes)){
        header("Location: events");
        exit;
      }
    }
    include "views/Admins/events/edit.php";
  }

  public function delete($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $event = Event::find($id);
    if($event->delete()){
      header("Location: events");
      exit;
    }
  }
}
?>