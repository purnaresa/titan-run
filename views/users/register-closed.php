<?php include "views/shared/header.php"; ?>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="background-color:#35363A;">
  <?php include "views/shared/home_navigation.php";?>
  <section class="profile-div top-space bottom-space">
    <div class="container">
      <div class="col-md-10 col-md-offset-1">
        <div class="profile-content">
          <?php if(isset($msg)){echo $msg;}?>
          
            <div class="col-md-2"></div>
            <div class="col-md-8" align="center" style="margin-top:200px;">
             <h2>Registration has been closed</h2>
            </div>
            <div class="col-md-2"></div>
        </div>
      </div>
    </div>
  </section>
  <?php include "views/shared/footer.php"; ?>
</body>