<?php include "views/Admins/shared/header.php"; ?>
<body>
  <?php include "views/Admins/shared/sidebar.php"; ?>
  <!-- Main Container Start -->
  <div id="mws-container" class="clearfix">
    <!-- Inner Container Start -->
    <div class="container">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Gallery Lists</span>
        <span class="mws-i-24 i-table-1">
          <a href="new-gallery">New Gallery</a>
        </span>
      </div>
      <div class="mws-panel-body">
      <table class="mws-table" id="gallery-table">
        <thead>
          <tr>
            <th>#</th>
            <th>gallery</th>
            <th>year</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($galleries as $key => $gallery): ?>
          <tr class="gradeX">
            <td><?php echo $key+1; ?></td>
            <td><img src='<?php echo '../'.$gallery->thumbnail_location.$gallery->thumbnail; ?>' class='img-responsive' /></td>
            <td><?php echo $gallery->gallery_year; ?></td>
            <td>
              <a href="edit-gallery<?php echo $gallery->id; ?>">Edit</a>
              <a href="delete-gallery<?php echo $gallery->id; ?>">Delete</a>
            </td>
         </tr>
         <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
<!-- Main Container End -->

</div>
<script type="text/javascript">
  $(function() {
    $('#gallery-table').dataTable( {
      "bPaginate": true,
      "bFilter": true,
      "bInfo": false
    } );
  });
</script>
</body>
</html>