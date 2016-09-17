<?php include "views/Admins/shared/header.php"; ?>
<body>
  <?php include "views/Admins/shared/sidebar.php"; ?>
  <!-- Main Container Start -->
  <div id="mws-container" class="clearfix">
    <!-- Inner Container Start -->
    <div class="container">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Master Event Lists</span>
        <span class="mws-i-24 i-table-1">
          <a href="new-master-event">New Master Event</a>
        </span>
      </div>
      <div class="mws-panel-body">
      <table class="mws-table" id="event-table">
        <thead>
          <tr>
            <th>#</th>
            <th>name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($events as $key => $event): ?>
          <tr class="gradeX">
            <td><?php echo $key+1; ?></td>
            <td><?php echo $event->name; ?></td>
            <td>
              <a href="edit-master-event<?php echo $event->id; ?>">Edit</a>
              <a href="delete-master-event<?php echo $event->id; ?>">Delete</a>
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
    $('#event-table').dataTable( {
      "bPaginate": true,
      "bFilter": true,
      "bInfo": false
    } );
  });
</script>
</body>
</html>