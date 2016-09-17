<?php 
class AdminCategoriesController{
	public function index(){
		if(empty($_SESSION['admin'])){
			header("Location: login");
			exit;
		}
		$categories = Category::all();
		include "views/Admins/categories/index.php";
	}

	public function create(){
		if(empty($_SESSION['admin'])){
			header("Location: login");
			exit;
		}
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$price = $_POST['price'];
                        $year = $_POST['year'];

			$attributes = array('name'=>$name,'price'=>$price,'year'=>$year);
			$category = new Category($attributes);
			if($category->save()){
				header("Location: categories");
				exit;
			}
		}
		include "views/Admins/categories/create.php";
	}

	public function edit($id){
		if(empty($_SESSION['admin'])){
			header("Location: login");
			exit;
		}
		$category = Category::find($id);
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$price = $_POST['price'];
                        $year = $_POST['year'];

			$attributes = array('name'=>$name,'price'=>$price,'year'=>$year);
			if($category->update_attributes($attributes)){
				header("Location: categories");
				exit;
			}
		}
		include "views/Admins/categories/edit.php";
	}

	public function delete($id){
		if(empty($_SESSION['admin'])){
			header("Location: login");
			exit;
		}
		$category = Category::find($id);
		if($category->delete()){
			header("Location: categories");
			exit;
		}
	}
}
?>