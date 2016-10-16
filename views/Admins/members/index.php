<?php include "views/Admins/shared/header.php"; ?>
<body>
  <?php include "views/Admins/shared/sidebar.php"; ?>
  <!-- Main Container Start -->
  <div id="mws-container" class="clearfix">
    <!-- Inner Container Start -->
    <div class="container">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Member Lists</span>
       <!--  <span class="mws-i-24 i-table-1">
          <a href="new-city">New Member</a>
        </span> -->
      </div>
      <div class="mws-panel-body">
      <table class="mws-table" id="city-table">
        <thead>
          <tr>
            <th>#</th>
            <th>name</th>
            <th>email</th>
            <th>gender</th>
            <th>organization</th>
            <th>city</th>
            <th>phone</th>
            <th>status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($members as $key => $member): ?>
          <tr class="gradeX">
            <td><?php echo $key+1; ?></td>
            <td><?php echo $member->first_name.' '.$member->last_name; ?></td>
            <td><?php echo $member->email; ?></td>
            <td><?php echo $member->gender; ?></td>
            <td><?php echo $member->organization; ?></td>
            <td><?php echo (is_null($member->city)) ? '' : $member->city->name; ?></td>
            <td><?php echo $member->phone; ?></td>
            <td><?php echo $member->status ? 'verified' : 'unverified'; ?></td>
            <td>
              <a href="detail<?php echo $member->id; ?>">Show</a>
              <a href="delete<?php echo $member->id; ?>">Delete</a>
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
