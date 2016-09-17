<?php include "views/Admins/shared/header.php"; ?>
<body>
 <?php include "views/Admins/shared/sidebar.php"; ?>
 <!-- Main Container Start -->
 <div id="mws-container" class="clearfix">
  <!-- Inner Container Start -->
  <div class="container">
    <div class="mws-panel-header">
      <span class="mws-i-24 i-list">Edit Gallery</span>
    </div>
    <div class="mws-panel-body">
     <form class="mws-form" method="post" enctype='multipart/form-data'>
      <div class="mws-form-block">
       <div class="mws-form-row">
        <label>Year</label>
        <div class="mws-form-item small">
         <input type="text" maxlength='4' class="mws-textinput" name="year" value="<?php echo $gallery->gallery_year; ?>" required/>
        </div>
      </div>
      <div class="mws-form-row">
       <label>Image</label>
       <div class="mws-form-item small">
        <input type="file" class="mws-textinput" name="gallery"/>
       </div>
      </div>
      <div class="mws-form-row">
       <label>Current Image</label>
       <div class="mws-form-item small">
        <img src="<?php echo '../'.$gallery->location.$gallery->name; ?>" class='img-responsive' />
       </div>
      </div>

     <div class="mws-form-row">
       <label>Thumbnail</label>
       <div class="mws-form-item small">
        <input type="file" class="mws-textinput" name="thumbnail"/>
       </div>
     </div>
     <div class="mws-form-row">
       <label>Current Thumbnail</label>
       <div class="mws-form-item small">
        <img src="<?php echo '../'.$gallery->thumbnail_location.$gallery->thumbnail; ?>" class='img-responsive' />
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