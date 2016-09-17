<?php 
  include "views/shared/header.php"; 
?>

<body>
  <?php
    if(empty($_SESSION['lang'])){
      include "views/shared/home_navigation.php";
      include "views/shared/home_header.php";
      include "views/shared/section_titan.php";
    }else{
      include "views/ina/shared/home_navigation.php";
      include "views/ina/shared/home_header.php";
      include "views/ina/shared/section_titan.php";
    }
  ?>

  <!-- support Section -->
  <section id="support"> 
    <div class="container">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-12" align="center">
            <h1 class="title-support">SUPPORTED BY:</h1>
          </div>
        </div>
        <div class="row">
          <img class="img-responsive" src="img/sponsor-done-with-uber.png" alt="sponsor">
        </div>
      </div>
    </div>
  </section>
  
  <!-- Tambahan -->
  <script src="js/countdown.js"></script>
  
  <?php 
    include "views/shared/footer.php";
  ?>
</body>