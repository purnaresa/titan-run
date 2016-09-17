<!-- Header -->
<div id="mws-header" class="clearfix">
  <!-- Logo Container -->
  <div id="mws-logo-container">
    <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
    <div id="mws-logo-wrap">
    <!-- <img src="images/mws-logo.png" alt="mws admin" /> -->
    </div>
  </div>
  <!-- User Tools (notifications, logout, profile, change password) -->
  <div id="mws-user-tools" class="clearfix">
    <!-- User Information and functions section -->
    <div id="mws-user-info" class="mws-inset">
      <!-- User Photo -->
      <div id="mws-user-photo">
        <img src="example/profile.jpg" alt="User Photo" />
      </div>
      <!-- Username and Functions -->
      <div id="mws-user-functions">
        <div id="mws-username">
          Hello, <?php echo $_SESSION['admin']['username']; ?>
        </div>
        <ul>
          <!-- <li><a href="#">Profile</a></li> -->
          <!-- <li><a href="#">Change Password</a></li> -->
          <li><a href="logout">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Start Main Wrapper -->
<div id="mws-wrapper">

  <!-- Necessary markup, do not remove -->
  <div id="mws-sidebar-stitch"></div>
  <div id="mws-sidebar-bg"></div>

<!-- Sidebar Wrapper -->
<div id="mws-sidebar">

  <!-- Main Navigation -->
  <div id="mws-navigation">
    <ul>
      <li class="active"><a href="admin" class="mws-i-24">Admins</a></li>
      <li><a href="categories" class="mws-i-24">Categories</a></li>
      <li><a href="cities" class="mws-i-24">Cities</a></li>
      <li><a href="companies" class="mws-i-24">Companies</a></li>
      <li><a href="groups" class="mws-i-24">Groups</a></li>
      <li><a href="delivery_prices" class="mws-i-24">Delivery Prices</a></li>
      <li><a href="events" class="mws-i-24">Event Informations</a></li>
      <li><a href="run-apps" class="mws-i-24">Favourite Run Apps</a></li>
      <li><a href="galleries" class="mws-i-24">Galleries</a></li>
      <li><a href="members" class="mws-i-24">Members</a></li>
      <li><a href="occupations" class="mws-i-24">Occupations</a></li>
      <li><a href="provinces" class="mws-i-24">Provinces</a></li>
      <li><a href="master-events" class="mws-i-24">Master Race Event</a></li>
      <li><a href="related-informations" class="mws-i-24">Related Informations</a></li>
      <li><a href="shuttles" class="mws-i-24">Shuttle Bus</a></li>
      <li><a href="master-vouchers" class="mws-i-24">Master Vouchers</a></li>
      <li><a href="vouchers" class="mws-i-24">Vouchers</a></li>
      <li><a href="race-results" class="mws-i-24">Race results</a></li>
    </ul>
  </div>            
</div>