<?php include "views/Admins/shared/header.php"; ?>
<body>
  <?php include "views/Admins/shared/sidebar.php"; ?>
  <!-- Main Container Start -->
  <div id="mws-container" class="clearfix">
    <!-- Inner Container Start -->
    <div class="container">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Company Lists</span>
        <span class="mws-i-24 i-table-1">
          <a href="new-company">New Company</a>
        </span>
      </div>
      <div class="mws-panel-body">
      <table class="mws-table" id="company-table">
        <thead>
          <tr>
            <th>#</th>
            <th>name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($companies as $key => $company): ?>
          <tr class="gradeX">
            <td><?php echo $key+1; ?></td>
            <td><?php echo $company->name; ?></td>
            <td>
              <a href="edit-company<?php echo $company->id; ?>">Edit</a>
              <a href="delete-company<?php echo $company->id; ?>">Delete</a>
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
    $('#company-table').dataTable( {
      "bPaginate": true,
      "bFilter": true,
      "bInfo": false
    } );
  });
</script>
</body>
</html>