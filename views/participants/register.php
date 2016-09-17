<?php
header("Location: profile");

 include "views/shared/header.php"; ?>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="background-color:#35363A;">
  <?php include "views/shared/home_navigation.php";?>
  <section class="profile-div top-space bottom-space">
    <div class="container">
      <div class="row profile">
        <?php if (!empty($_SESSION['run_category'])) { ?>
          <?php include "views/participants/_form.php"; ?>
        <?php } else { ?>
          <?php include "views/participants/_run_category.php"; ?>
        <?php } ?>
      </div>
    </div>
  </section>
  <?php include "views/shared/footer.php"; ?>
    
         

</body>