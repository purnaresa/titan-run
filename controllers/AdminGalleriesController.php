<?php 
class AdminGalleriesController{
	public function index(){
		if(empty($_SESSION['admin'])){
			header("Location: login");
			exit;
		}
		$galleries = Gallery::all();
		include "views/Admins/galleries/index.php";
	}

	public function create(){
		if(empty($_SESSION['admin'])){
			header("Location: login");
			exit;
		}
		if(isset($_POST['submit'])){
      $gallery_year = $_POST['year'];
      $date = date('dmYHi');
      
      // if(!empty($_FILES['gallery']['name'])){
        $dir = "uploads/galleries/".$date."/";
        
        if(!is_dir($dir)){
          $mkdir = @mkdir($dir, 0777, true); 
        }
        move_uploaded_file($_FILES['gallery']['tmp_name'], $dir.$_FILES['gallery']['name']);
        // $gallery = $dir.$_FILES['gallery']['name'];
      // }
      // if(!empty($_FILES['thumbnail']['name'])){
        $dir_thumbnail = "uploads/galleries/thumbnail/".$date."/";
        if(!is_dir($dir_thumbnail)){
          $mkdir = mkdir($dir_thumbnail, 0777, true);
        }
        move_uploaded_file($_FILES['thumbnail']['tmp_name'], $dir_thumbnail.$_FILES['thumbnail']['name']);
        // $thumbnail = $dir.$_FILES['thumbnail']['name'];
      // }

      $attributes = array(
        'name'=>$_FILES['gallery']['name'],
        'gallery_year'=>$gallery_year,
        'thumbnail'=>$_FILES['thumbnail']['name'],
        'location'=>$dir,
        'thumbnail_location'=>$dir_thumbnail
      );

			$gallery = new Gallery($attributes);
			if($gallery->save()){
				header("Location: galleries");
				exit;
			}
		}
		include "views/Admins/galleries/create.php";
	}

	public function edit($id){
		if(empty($_SESSION['admin'])){
			header("Location: login");
			exit;
		}

		$gallery = Gallery::find(5);

    if(isset($_POST['submit'])){
      $gallery_year = $_POST['year'];
    
      $date = date('dmYHi');
     
      if(!empty($_FILES['gallery']['name'])){
        $dir = "uploads/galleries/".$date."/";
        
        if(!is_dir($dir)){
          $mkdir = mkdir($dir, 0777, true);
        }
      
        move_uploaded_file($_FILES['gallery']['tmp_name'], $dir.$_FILES['gallery']['name']);
        
        $gallery->name=$_FILES['gallery']['name'];
        $gallery->location=$dir;
      }

      if(!empty($_FILES['thumbnail']['name'])){
        $dir_thumbnail = "uploads/galleries/thumbnail/".$date."/";
        if(!is_dir($dir_thumbnail)){
          $mkdir = mkdir($dir_thumbnail, 0777, true);
        }
        move_uploaded_file($_FILES['thumbnail']['tmp_name'], $dir_thumbnail.$_FILES['thumbnail']['name']);
        $gallery->thumbnail = $_FILES['thumbnail']['name'];
        $gallery->thumbnail_location = $dir_thumbnail;
      }

			$gallery->gallery_year = $gallery_year;

			if($gallery->save()){
				header("Location: galleries");
				exit;
			}
		}
		include "views/Admins/galleries/edit.php";
	}

	public function delete($id){
		if(empty($_SESSION['admin'])){
			header("Location: login");
			exit;
		}
		$gallery = Gallery::find($id);
		if($gallery->delete()){
			header("Location: galleries");
			exit;
		}
	}
}
?>