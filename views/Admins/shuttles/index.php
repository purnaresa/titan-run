<?php include "views/Admins/shared/header.php"; ?>
<body>
  <?php include "views/Admins/shared/sidebar.php"; ?>
  <!-- Main Container Start -->
  <div id="mws-container" class="clearfix">
    <!-- Inner Container Start -->
    <div class="container">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Shuttle Lists</span>
        <span class="mws-i-24 i-table-1">
          <a href="new-shuttle">New Shuttle</a>
        </span>
      </div>
      <div class="mws-panel-body">
      <table class="mws-table" id="shuttle-table">
        <thead>
          <tr>
            <th>#</th>
            <th>name</th>
            <th>capacity</th>
            <th>price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($shuttles as $key => $shuttle): ?>
          <tr class="gradeX">
            <td><?php echo $key+1; ?></td>
            <td><?php echo $shuttle->name; ?></td>
            <td><?php echo $shuttle->capacity; ?></td>
            <td><?php echo $shuttle->price; ?></td>
            <td>
              <a href="edit-shuttle<?php echo $shuttle->id; ?>">Edit</a>
              <a href="delete-shuttle<?php echo $shuttle->id; ?>">Delete</a>
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
    $('#shuttle-table').dataTable( {
      "bPaginate": true,
      "bFilter": true,
      "bInfo": false
    } );
  });
</script>
</body>
</html>