<?php include "views/shared/header.php"; ?>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="background-color:#35363A;">
  <?php include "views/shared/home_navigation.php";?>
  <section class="profile-div top-space">
    <div class="container">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-content">
          <h2>Forgot Password</h2>  
          <p></p>
          <?php if(isset($msg)){echo $msg;} ?>
          <form method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="user_email" name="email" placeholder="Email" required />
            </div>
            <div class="login" align="middle">
              <button class="btn-round-white nofloat" type="submit" name="submit" value="submit">Send Password</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <?php include "views/shared/footer.php"; ?>
</body>