<?php 
class AdminMembersController{
  public function index(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $members = Member::all();
    include "views/Admins/members/index.php";
  }

  public function show($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $member = Member::find($id);
    include "views/Admins/members/show.php";
  }

  public function delete($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $member = Member::find($id);
    if($member->delete()){
      header("Location: members");
      exit;
    }
  }
}
?>