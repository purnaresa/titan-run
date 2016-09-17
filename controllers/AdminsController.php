<?php
	include("models/Admin.php");
	class AdminsController{
		public function admin(){
			header("Location: dashboards");
			exit;
		}
		public function index(){
			if(empty($_SESSION['admin'])){
				header("Location: login");
				exit;
			}
			$admins = Admin::all();
			include "views/Admins/admin/index.php";
		}

		public function login(){
			if(!empty($_SESSION['admin'])){
				header("Location: dashboards");
				exit;
			}
			if(isset($_POST['submit'])){
				$username = $_POST['username'];
				$password = md5($_POST['password']);
				$admin = Admin::find_by_username_and_password($username, $password);
				if(!empty($admin)){
					$_SESSION['admin'] = array("id" => $admin->id, "username" => $admin->username);
					header("Location: dashboards");
					exit;
				}else{
					$msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> 
					&nbsp; email or password does not exists !</div>";
				}
			}
			include "views/Admins/admin/login.php";
		}

		public function logout(){
			session_destroy();
			header("Location: login");
			exit;
		}
	}
?>