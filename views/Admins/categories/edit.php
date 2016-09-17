<?php include "views/Admins/shared/header.php"; ?>
  <body>
    <?php include "views/Admins/shared/sidebar.php"; ?>
    <!-- Main Container Start -->
    <div id="mws-container" class="clearfix">
    <!-- Inner Container Start -->
      <div class="container">
        <div class="mws-panel-header">
          <span class="mws-i-24 i-list">Edit Category - <?php echo $category->name; ?></span>
        </div>

        <div class="mws-panel-body">
          <form class="mws-form" method="post">
            <div class="mws-form-block">
              <div class="mws-form-row">
              <label>Name</label>
              <div class="mws-form-item small">
              <input type="text" class="mws-textinput" name="name" value="<?php echo $category->name; ?>"/>
              </div>
              </div>
            </div>
            <div class="mws-form-row">
              <label>Name</label>
              <div class="mws-form-item small">
              <input type="text" class="mws-textinput" name="year" value="<?php echo $category->year; ?>"/>
              </div>
            </div>
            <div class="mws-form-row">
              <label>Price</label>
              <div class="mws-form-item small">
              <input type="text" class="mws-textinput" name="price" value="<?php echo $category->price; ?>"/>
              </div>
            </div>
            <div class="mws-button-row">
              <input type="submit" value="submit" name="submit" class="mws-button red" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>