<?php 
include ('models/MasterVoucher.php');
class AdminMasterVouchersController{
  public function index(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $master_vouchers = MasterVoucher::all();
    include "views/Admins/master_vouchers/index.php";
  }

  public function create(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    
    if(isset($_POST['submit'])){
      $type = $_POST['type'];
      $nilai = $_POST['nilai'];

      $attributes = array('type'=>$type, 'nilai'=>$nilai);

      $master_voucher = new MasterVoucher($attributes);

      if($master_voucher->save()){
        header("Location: master-vouchers");
        exit;
      }
    }
    include "views/Admins/master_vouchers/create.php";
  }

  public function edit($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }

    $master_voucher = MasterVoucher::find($id);

    if(isset($_POST['submit'])){
      $type = $_POST['type'];
      $nilai = $_POST['nilai'];

      $attributes = array('type'=>$type, 'nilai'=>$nilai);

      if($master_voucher->update_attributes($attributes)){
        header("Location: master-vouchers");
        exit;
      }
    }
    include "views/Admins/master_vouchers/edit.php";
  }

  public function delete($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $master_voucher = MasterVoucher::find($id);
    if($city->delete()){
      header("Location: master-vouchers");
      exit;
    }
  }
}
?>