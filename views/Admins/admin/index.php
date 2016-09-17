<?php include "views/Admins/shared/header.php"; ?>
<body>
  <?php include "views/Admins/shared/sidebar.php"; ?>
  <!-- Main Container Start -->
  <div id="mws-container" class="clearfix">
    <!-- Inner Container Start -->
    <div class="container">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Admin Lists</span>
      </div>
      <div class="mws-panel-body">
      <table class="mws-table">
        <thead>
          <tr>
            <th>#</th>
            <th>name</th>
            <th>username</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($admins as $key => $admin): ?>
          <tr class="gradeX">
            <td><?php echo $key+1; ?></td>
            <td><?php echo $admin->name; ?></td>
            <td><?php echo $admin->username; ?></td>
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