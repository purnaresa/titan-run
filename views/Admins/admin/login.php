<?php include "views/Admins/shared/header.php"; ?>
<body>
	<div id="mws-login-bg">
    <div id="mws-login-wrapper">
      <div id="mws-login">
        <h1>Login</h1>
        <?php if(!empty($msg)){echo $msg;} ?>
        <div class="mws-login-lock"><img src="css/icons/24/locked-2.png" alt="" /></div>
        <div id="mws-login-form">
        <form class="mws-form" method="post">
            <div class="mws-form-row">
              <div class="mws-form-item large">
                <input type="text" name="username" class="mws-login-username mws-textinput required" placeholder="username" />
              </div>
            </div>
            <div class="mws-form-row">
              <div class="mws-form-item large">
                <input type="password" name="password" class="mws-login-password mws-textinput required" placeholder="password" />
              </div>
            </div>
            <div class="mws-form-row mws-inset">
              <ul class="mws-form-list inline">
                <li><input type="checkbox" /> <label>Remember me</label></li>
              </ul>
            </div>
            <div class="mws-form-row">
              <input type="submit" value="Login" name="submit" class="mws-button green mws-login-button" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>