<?php include "views/Admins/shared/header.php"; ?>
<body>
  <?php include "views/Admins/shared/sidebar.php"; ?>
  <!-- Main Container Start -->
  <div id="mws-container" class="clearfix">
    <!-- Inner Container Start -->
    <div class="container">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Vouchers Lists</span>
        <span class="mws-i-24 i-table-1">
          <a href="new-voucher">New Voucher</a>
        </span>
      </div>
      <div class="mws-panel-body">
      <table class="mws-table" id="voucher-table">
        <thead>
          <tr>
            <th>#</th>
            <th>code</th>
            <th>type</th>
            <th>voucher value</th>
            <th>expire date</th>
            <th>used</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($vouchers as $key => $voucher): ?>
          <tr class="gradeX">
            <td><?php echo $key+1; ?></td>
            <td><?php echo $voucher->code; ?></td>
            <td><?php echo $voucher->master_voucher->type; ?></td>
            <td><?php echo $voucher->master_voucher->nilai; ?></td>
            <td><?php echo $voucher->expire_date; ?></td>
            <td><?php echo $voucher->used ? 'true' : 'false'; ?></td>
            <td>
              <a href="edit-voucher<?php echo $voucher->id; ?>">Edit</a>
              <a href="delete-voucher<?php echo $voucher->id; ?>">Delete</a>
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