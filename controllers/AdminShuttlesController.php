<?php 
class AdminShuttlesController{
	public function index(){
		if(empty($_SESSION['admin'])){
			header("Location: login");
			exit;
		}
		$shuttles = Shuttle::all();
		include "views/Admins/shuttles/index.php";
	}

	public function create(){
		if(empty($_SESSION['admin'])){
			header("Location: login");
			exit;
		}
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$capacity = $_POST['capacity'];
			$price = $_POST['price'];
			$attributes = array('name'=>$name,'capacity'=>$capacity,'price'=>$price);
			$shuttle = new Shuttle($attributes);
			if($shuttle->save()){
				header("Location: shuttles");
				exit;
			}
		}
		include "views/Admins/shuttles/create.php";
	}

	public function edit($id){
		if(empty($_SESSION['admin'])){
			header("Location: login");
			exit;
		}
		$shuttle = Shuttle::find($id);
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$capacity = $_POST['capacity'];
			$price = $_POST['price'];
			$attributes = array('name'=>$name,'capacity'=>$capacity,'price'=>$price);
			if($shuttle->update_attributes($attributes)){
				header("Location: shuttles");
				exit;
			}
		}
		include "views/Admins/shuttles/edit.php";
	}

	public function delete($id){
		if(empty($_SESSION['admin'])){
			header("Location: login");
			exit;
		}
		$shuttle = Shuttle::find($id);
		if($shuttle->delete()){
			header("Location: shuttles");
			exit;
		}
	}
}
?>