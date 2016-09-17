<?php 
class AdminVouchersController{
  public function index(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $vouchers = Voucher::all();
    include "views/Admins/vouchers/index.php";
  }

  public function create(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $master_vouchers = MasterVoucher::all();
    if(isset($_POST['submit'])){
      
      $code = $_POST['code'];
      $master_voucher_id = $_POST['master_voucher'];
      $expire_date = $_POST['expire_date'];

      $attributes = array('code'=>$code,'expire_date'=>$expire_date,'master_voucher_id'=>$master_voucher_id);

      $voucher = new Voucher($attributes);
      if($voucher->save()){
        header("Location: vouchers");
        exit;
      }
    }
    include "views/Admins/vouchers/create.php";
  }

  public function edit($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $master_vouchers = MasterVoucher::all();
    $voucher = Voucher::find($id);
    if(isset($_POST['submit'])){
      $code = $_POST['code'];
      $master_voucher_id = $_POST['master_voucher'];
      $expire_date = $_POST['expire_date'];

      $attributes = array('code'=>$code,'expire_date'=>$expire_date,'master_voucher_id'=>$master_voucher_id);

      if($voucher->update_attributes($attributes)){
        header("Location: vouchers");
        exit;
      }
    }
    include "views/Admins/vouchers/edit.php";
  }

  public function delete($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $voucher = Voucher::find($id);
    if($city->delete()){
      header("Location: vouchers");
      exit;
    }
  }
}
?>