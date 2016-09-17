<?php include "views/Admins/shared/header.php"; ?>
<body>
  <?php include "views/Admins/shared/sidebar.php"; ?>
  <!-- Main Container Start -->
  <div id="mws-container" class="clearfix">
    <!-- Inner Container Start -->
    <div class="container">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Delivery Price Lists</span>
        <span class="mws-i-24 i-table-1">
          <a href="new-delivery_price">New Delivery Price</a>
        </span>
      </div>
      <div class="mws-panel-body">
      <table class="mws-table">
        <thead>
          <tr>
            <th>#</th>
            <th>price</th>
            <th>event_date</th>
            <th>registration open</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($delivery_prices as $key => $delivery_price): ?>
          <tr class="gradeX">
            <td><?php echo $key+1; ?></td>
            <td><?php echo $delivery_price->price; ?></td>
            <td><?php echo date_format($delivery_price->event_date, 'Y-m-d'); ?></td>
            <td><?php echo $delivery_price->register_open; ?></td>
            <td>
              <a href="edit-delivery_price<?php echo $delivery_price->id; ?>">Edit</a>
              <a href="delete-delivery_price<?php echo $delivery_price->id; ?>">Delete</a>
              <?php if($delivery_price->register_open): ?>
              <a href="change-status<?php echo $delivery_price->id; ?>">Close</a>
              <?php endif; ?>
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

</body>
</html>