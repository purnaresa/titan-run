<?php 
class AdminCompaniesController{
  public function index(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $companies = Company::all();
    include "views/Admins/companies/index.php";
  }

  public function create(){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    if(isset($_POST['submit'])){
      $name = $_POST['name'];

      $attributes = array('name'=>$name);
      $company = new Company($attributes);
      if($company->save()){
        header("Location: companies");
        exit;
      }
    }
    include "views/Admins/companies/create.php";
  }

  public function edit($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $company = Company::find($id);
    if(isset($_POST['submit'])){
      $name = $_POST['name'];

      $attributes = array('name'=>$name);
      if($company->update_attributes($attributes)){
        header("Location: companies");
        exit;
      }
    }
    include "views/Admins/companies/edit.php";
  }

  public function delete($id){
    if(empty($_SESSION['admin'])){
      header("Location: login");
      exit;
    }
    $company = Company::find($id);
    if($company->delete()){
      header("Location: companies");
      exit;
    }
  }
}
?>