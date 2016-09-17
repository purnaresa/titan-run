<?php include "views/Admins/shared/header.php"; ?>
<body>
  <?php include "views/Admins/shared/sidebar.php"; ?>
  <!-- Main Container Start -->
  <div id="mws-container" class="clearfix">
    <!-- Inner Container Start -->
    <div class="container">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-list">New Gallery</span>
      </div>
      <div class="mws-panel-body">
        <form class="mws-form" method="post" enctype='multipart/form-data'>
          <div class="mws-form-block">
            <div class="mws-form-row">
              <label>Year</label>
              <div class="mws-form-item small">
                <input type="text" class="mws-textinput" name="year" required />
              </div>
            </div>
            <div class="mws-form-row">
              <label>Image</label>
              <div class="mws-form-item small">
                <input type="file" class="mws-textinput" id='gallery' name="gallery" required/>
              </div>
            </div>
            <div class="mws-form-row">
              <label>Thumbnail</label>
              <div class="mws-form-item small">
                <input type="file" class="mws-textinput" id='thumbnail' name="thumbnail" required/>
              </div>
            </div>
            <div class="mws-button-row">
              <input type="submit" value="submit" name="submit" class="mws-button red" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>