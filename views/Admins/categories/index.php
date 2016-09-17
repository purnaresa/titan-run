<?php include "views/Admins/shared/header.php"; ?>
<body>
  <?php include "views/Admins/shared/sidebar.php"; ?>
  <!-- Main Container Start -->
  <div id="mws-container" class="clearfix">
    <!-- Inner Container Start -->
    <div class="container">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Category Lists</span>
        <span class="mws-i-24 i-table-1">
          <a href="new-category">New Category</a>
        </span>
      </div>
      <div class="mws-panel-body">
      <table class="mws-table" id="category-table">
        <thead>
          <tr>
            <th>#</th>
            <th>year</th>
            <th>name</th>
            <th>price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $key => $category): ?>
          <tr class="gradeX">
            <td><?php echo $key+1; ?></td>
            <td><?php echo $category->year; ?></td>
            <td><?php echo $category->name; ?></td>
            <td><?php echo $category->price; ?></td>
            <td>
              <a href="edit-category<?php echo $category->id; ?>">Edit</a>
              <a href="delete-category<?php echo $category->id; ?>">Delete</a>
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
    $('#category-table').dataTable( {
      "bPaginate": true,
      "bFilter": true,
      "bInfo": false
    } );
  });
</script>
</body>
</html>