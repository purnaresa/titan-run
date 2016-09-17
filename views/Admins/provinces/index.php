<?php include "views/Admins/shared/header.php"; ?>
<body>
  <?php include "views/Admins/shared/sidebar.php"; ?>
  <!-- Main Container Start -->
  <div id="mws-container" class="clearfix">
    <!-- Inner Container Start -->
    <div class="container">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Province Lists</span>
        <span class="mws-i-24 i-table-1">
          <a href="new-province">New Province</a>
        </span>
      </div>
      <div class="mws-panel-body">
      <table class="mws-table" id="province-table">
        <thead>
          <tr>
            <th>#</th>
            <th>name</th>
            <th>country</th>
            <th>race pack</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($provinces as $key => $province): ?>
          <tr class="gradeX">
            <td><?php echo $key+1; ?></td>
            <td><?php echo $province->name; ?></td>
            <td><?php echo $province->country->name; ?></td>
            <td><?php echo $province->pack; ?></td>
            <td>
              <a href="edit-province<?php echo $province->id; ?>">Edit</a>
              <a href="delete-province<?php echo $province->id; ?>">Delete</a>
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
    $('#province-table').dataTable( {
      "bPaginate": true,
      "bFilter": true,
      "bInfo": false
    } );
  });
</script>
</body>
</html>