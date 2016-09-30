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
		$data = array();
		$year = @$_POST['year'];
		if(empty($_SESSION['admin'])){
			header("Location: login");
			exit;
		}
		if(isset($_POST['submit']) && !empty( $_FILES['gallery'] ) && $year!='' ){
			$images = $this->restructure_array(  $_FILES );
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			
			foreach ( $images as $key => $value){
				$i = $key+1;
				//create directory if not exists
				if (!file_exists('uploads/galleries')) {
					mkdir('uploads/galleries', 0777, true);
				}
				$image_name = $value['name'];
				$image_width = 'width';
				//get image extension
				$ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
				//assign unique name to image
				
				$name = date('dmYHi').'_'.$i.'.'.$ext;
				$folder = date('dmYHi').'_'.$i;
				//$name = $image_name;
				//image size calcuation in KB
				$image_size = $value["size"] / 1024;
				$image_flag = true;
				
				//max image size
				$max_size = 1024;
				if( in_array($ext, $allowedExts) && $image_size < $max_size ){
					$image_flag = true;
				} else {
					$image_flag = false;
					$data[$i]['status'] = '[Error] Maybe width= '.$image_width.' '.$image_name. ' exceeds max '.$max_size.' KB size or incorrect file extension <br/>';
				} 
				
				if( $value["error"] > 0 ){
					$image_flag = false;
					$data[$i]['status']= '[Error] '.$image_name.' Image contains error - Error Code : '.$value["error"];
				}
				
				if($image_flag){
					mkdir('uploads/galleries/thumbnail/'.$folder.'', 0777, true);
					mkdir('uploads/galleries/'.$folder.'', 0777, true);
					move_uploaded_file($value["tmp_name"], 'uploads/galleries/'.$folder.'/'.$image_name);
					$src = 'uploads/galleries/'.$folder.'/'.$image_name;
					$dist ='uploads/galleries/thumbnail/'.$folder.'/'.$image_name;
					$folder_image = 'uploads/galleries/'.$folder.'/';
					$folder_thumbnail = 'uploads/galleries/thumbnail/'.$folder.'/';
					$data[$i]['success'] = $thumbnail = $image_name;
					$this->thumbnail($src, $dist, 352);
					  $attributes = array(
						'name'=>$image_name,
						'gallery_year'=>$year,
						'thumbnail'=>$thumbnail,
						'location'=>$folder_image,
						'thumbnail_location'=>$folder_thumbnail
					  );
			
						$gallery = new Gallery($attributes);
						$gallery->save();
					
				}
			}
			header("Location: galleries");
		}
		include "views/Admins/galleries/create.php";
	}

	function restructure_array(array $images)
	{
		$result = array();
	
		foreach ($images as $key => $value) {
			foreach ($value as $k => $val) {
				for ($i = 0; $i < count($val); $i++) {
					$result[$i][$k] = $val[$i];
				}
			}
		}
	
		return $result;
	}
	
	
	
	function thumbnail($src, $dist, $dis_width = 100 ){
	
		$img = '';
		$extension = strtolower(strrchr($src, '.'));
		switch($extension)
		{
			case '.jpg':
			case '.jpeg':
				$img = @imagecreatefromjpeg($src);
				break;
			case '.gif':
				$img = @imagecreatefromgif($src);
				break;
			case '.png':
				$img = @imagecreatefrompng($src);
				break;
		}
		$width = imagesx($img);
		$height = imagesy($img);
	
	
	
	
		$dis_height = $dis_width * ($height / $width);
	
		$new_image = imagecreatetruecolor($dis_width, $dis_height);
		imagecopyresampled($new_image, $img, 0, 0, 0, 0, $dis_width, $dis_height, $width, $height);
	
	
		$imageQuality = 100;
	
		switch($extension)
		{
			case '.jpg':
			case '.jpeg':
				if (imagetypes() & IMG_JPG) {
					imagejpeg($new_image, $dist, $imageQuality);
				}
				break;
	
			case '.gif':
				if (imagetypes() & IMG_GIF) {
					imagegif($new_image, $dist);
				}
				break;
	
			case '.png':
				$scaleQuality = round(($imageQuality/100) * 9);
				$invertScaleQuality = 9 - $scaleQuality;
	
				if (imagetypes() & IMG_PNG) {
					imagepng($new_image, $dist, $invertScaleQuality);
				}
				break;
		}
		imagedestroy($new_image);
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
	/*
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
	*/
}
?>