<?php include "views/Admins/shared/header.php"; ?>
<body>
  <?php include "views/Admins/shared/sidebar.php"; ?>
  <!-- Main Container Start -->
  <div id="mws-container" class="clearfix">
    <!-- Inner Container Start -->
    <div class="container">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Master Vouchers Lists</span>
        <span class="mws-i-24 i-table-1">
          <a href="new-master-voucher">New Master Voucher</a>
        </span>
      </div>
      <div class="mws-panel-body">
      <table class="mws-table" id="master-table">
        <thead>
          <tr>
            <th>#</th>
            <th>type</th>
            <th>nilai</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($master_vouchers as $key => $master_voucher): ?>
          <tr class="gradeX">
            <td><?php echo $key+1; ?></td>
            <td><?php echo $master_voucher->type; ?></td>
            <td><?php echo $master_voucher->nilai; ?></td>
            <td>
              <a href="edit-master-voucher<?php echo $master_voucher->id; ?>">Edit</a>
              <a href="delete-master-vouchers<?php echo $master_voucher->id; ?>">Delete</a>
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
    $('#master-table').dataTable( {
      "bPaginate": true,
      "bFilter": true,
      "bInfo": false
    } );
  });
</script>
</body>
</html>