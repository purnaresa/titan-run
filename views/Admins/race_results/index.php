<?php include "views/Admins/shared/header.php"; ?>
<body>
  <?php include "views/Admins/shared/sidebar.php"; ?>
  <!-- Main Container Start -->
  <div id="mws-container" class="clearfix">
    <!-- Inner Container Start -->
    <div class="container">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Race Result Lists</span>
        <span class="mws-i-24 i-table-1">
          <a href="export-race-results">Export</a>
        </span>
      </div>
      <div class="mws-panel-body">
      <table class="mws-table" id="race-table">
        <thead>
          <tr>
            <th>#</th>
            <th>name</th>
            <th>bib number</th>
            <th>gender</th>
            <th>nationality</th>
            <th>chip time</th>
            <th>finish time</th>
            <th>year</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($race_results as $key => $race_result): ?>
          <tr class="gradeX">
            <td><?php echo $key+1; ?></td>
            <td><?php echo $race_result->name; ?></td>
            <td><?php echo $race_result->bib_number; ?></td>
            <td><?php echo $race_result->gender; ?></td>
            <td><?php echo $race_result->nationality; ?></td>
            <td><?php echo $race_result->chip_time; ?></td>
            <td><?php echo $race_result->finish_time; ?></td>
            <td><?php echo $race_result->year; ?></td>
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
    $('#race-table').dataTable( {
      "bPaginate": true,
      "bFilter": true,
      "bInfo": false
    } );
  });
</script>
</body>
</html>