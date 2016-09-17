<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
        <i class="fa fa-bars"></i>
      </button>
      <a class="navbar-brand page-scroll" href="home">
        <img src="img/logotitan.png" id="logo" class="img-brands" alt="brands">
      </a>
    </div>

    <div class="web-lang">
      <?php if(!empty($_SESSION['user'])): ?>
<button type="button" class="user-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="fa fa-user"></i> <?php echo $_SESSION['user']['name']; ?> <span class="caret"></button>
      <ul class="dropdown-menu profile-drop">
        <li><a href="profile"><i class="fa fa-user"></i> Lihat Profil</a></li>
        <li><a href="setting"><i class="fa fa-cog"></i> Edit Profil</a></li>
        <li><a href="change-password"><i class="fa fa-cog"></i> Ganti Password</a></li>
        <li><a href="logout"><i class="fa fa-sign-out"></i> Keluar</a></li>
      </ul>
        |&nbsp;&nbsp;
      <?php endif; ?>
      <a href="#" id="lang-eng"><img src="img/England.png" alt="indonesia"> EN</a>
    </div>
    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="hidden">
          <a href="#page-top"></a>
        </li>
        <?php if(empty($_SESSION['user'])): ?>
        <li>
          <a class="login-nav disable" href="register" onclick="hideNav()">REGISTER</a>
        </li>
        <?php endif; ?>
        <li>
          <a class="page-scroll" href="home#about" onclick="hideNav()">Info</a>
        </li>
        <li>
          <a class="page-scroll" href="home#contact" onclick="hideNav()">Schedule</a>
        </li>
        <li>
          <a class="page-scroll" href="home#download" onclick="hideNav()">Gallery</a>
        </li>
        <li>
          <a class="page-scroll" href="home#result" onclick="hideNav()">Race Results</a>
        </li>
        <li>
          <a class="" href="#" data-toggle="modal" data-target="#myModal2" onclick="hideNav()">Terms & conditions</a>
        </li>
        <li>
          <a class="" href="#" data-toggle="modal" data-target="#myModal4" onclick="hideNav()">Race Rules</a>
        </li>
        <li>
          <a class="" href="#" data-toggle="modal" data-target="#myModal3" onclick="hideNav()">FAQ</a>
        </li>
        <?php if(empty($_SESSION['user'])): ?>
        <li>
         <!-- <a class="login-nav" href="login">Login</a> -->
          <a class="login-nav" href="login">Login</a>  
        </li>
        <?php endif; ?>
        <li class="logo-titan-nav">
          <img src="img/LOGO-TITAN.png" id="logo2" class="hidden-md hidden-sm hidden-xs img-brands2" alt="logo-titan" />
        </li>
      </ul>
    </div>
  </div>
</nav>
<script>
 function hideNav(){
	$(".navbar-toggle").click();
 }
</script>