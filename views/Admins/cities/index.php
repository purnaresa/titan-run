<?php include "views/Admins/shared/header.php"; ?>
<body>
  <?php include "views/Admins/shared/sidebar.php"; ?>
  <!-- Main Container Start -->
  <div id="mws-container" class="clearfix">
    <!-- Inner Container Start -->
    <div class="container">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">City Lists</span>
        <span class="mws-i-24 i-table-1">
          <a href="new-city">New City</a>
        </span>
      </div>
      <div class="mws-panel-body">
      <table class="mws-table" id="city-table">
        <thead>
          <tr>
            <th>#</th>
            <th>name</th>
            <th>province</th>
            <th>country</th>
            <th>race pack</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($cities as $key => $city): ?>
          <tr class="gradeX">
            <td><?php echo $key+1; ?></td>
            <td><?php echo $city->name; ?></td>
            <td><?php echo $city->province->name; ?></td>
            <td><?php echo $city->province->country->name; ?></td>
            <td><?php echo $city->pack; ?></td>
            <td>
              <a href="edit-city<?php echo $city->id; ?>">Edit</a>
              <a href="delete-city<?php echo $city->id; ?>">Delete</a>
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
    $('#city-table').dataTable( {
      "bPaginate": true,
      "bFilter": true,
      "bInfo": false
    } );
  });
</script>
</body>
</html>