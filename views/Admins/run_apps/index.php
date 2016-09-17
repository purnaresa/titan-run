<?php include "views/Admins/shared/header.php"; ?>
<body>
  <?php include "views/Admins/shared/sidebar.php"; ?>
  <!-- Main Container Start -->
  <div id="mws-container" class="clearfix">
    <!-- Inner Container Start -->
    <div class="container">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Favourite Run App Lists</span>
        <span class="mws-i-24 i-table-1">
          <a href="new-run_app">New Favourite Run App</a>
        </span>
      </div>
      <div class="mws-panel-body">
      <table class="mws-table" id="run_app-table">
        <thead>
          <tr>
            <th>#</th>
            <th>name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($run_apps as $key => $app): ?>
          <tr class="gradeX">
            <td><?php echo $key+1; ?></td>
            <td><?php echo $app->name; ?></td>
            <td>
              <a href="edit-run_app<?php echo $app->id; ?>">Edit</a>
              <a href="delete-run_app<?php echo $app->id; ?>">Delete</a>
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
    $('#run_app-table').dataTable( {
      "bPaginate": true,
      "bFilter": true,
      "bInfo": false
    } );
  });
</script>
</body>
</html>