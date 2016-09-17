
  <?php
    if(empty($_SESSION['lang'])){
      include "views/shared/home_navigation.php";
    }else{
      include "views/ina/shared/home_navigation.php";
    }
  ?>

<?php include "views/shared/header.php"; ?>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="background-color:#35363A;">

  <?php 
	if(empty($_SESSION['lang'])){
      include "views/ina/galleries/section.php";
    }else{
		include "views/galleries/section.php";
    }
	?>
	
  <?php include "views/shared/footer.php"; ?>
</body>