<?php include "views/shared/header.php"; ?>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="background-color:#35363A;">
  <?php include "views/shared/home_navigation.php";?>
  <section class="profile-div top-space">
    <div class="container">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-content">
          <h2>New Password</h2>  
          <p></p>
          <?php if(isset($msg)){echo $msg;} ?>
          <form method="post">
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="New Password" required />
            </div>
            <div class="form-group">
              <label for="password">Password Confirmation</label>
              <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="New Password Confirmation" required />
            </div>
            <div class="login" align="middle">
              <button class="btn-round-white nofloat" type="submit" name="submit" value="submit">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <?php include "views/shared/footer.php"; ?>
</body>