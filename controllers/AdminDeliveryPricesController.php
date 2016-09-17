<?php 
class AdminDeliveryPricesController{
  public function index(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $delivery_prices = DeliveryPrice::all();
    include "views/Admins/delivery_prices/index.php";
  }

  public function create(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    if(isset($_POST['submit'])){
      $price = $_POST['price'];
      $event_date = $_POST['event_date'];
      $attributes = array('price'=>$price, 'event_date' => $event_date);
      $delivery_price = new DeliveryPrice($attributes);
      if($delivery_price->save()){
        header("Location: delivery_prices");
        exit;
      }
    }
    include "views/Admins/delivery_prices/create.php";
  }

  public function edit($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $provinces = Province::all();
    $delivery_price = DeliveryPrice::find($id);
    if(isset($_POST['submit'])){
      $price = $_POST['price'];
      $event_date = $_POST['event_date'];
      $attributes = array('price'=>$price, 'event_date' => $event_date);
      if($delivery_price->update_attributes($attributes)){
        header("Location: delivery_prices");
        exit;
      }
    }
    include "views/Admins/delivery_prices/edit.php";
  }


  public function changeStatus($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $delivery_price = DeliveryPrice::find($id);
    if($delivery_price->register_open){
      $attributes = array('register_open'=>false);
      $delivery_price->update_attributes($attributes);
    }
      header("Location: delivery_prices");
      exit;
  }

  public function delete($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $delivery_price = DeliveryPrice::find($id);
    if($delivery_price->delete()){
      header("Location: delivery_prices");
      exit;
    }
  }
}
?>