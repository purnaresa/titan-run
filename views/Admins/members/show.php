<?php include "views/Admins/shared/header.php"; ?>
<body>
  <?php include "views/Admins/shared/sidebar.php"; ?>
  <!-- Main Container Start -->
  <div id="mws-container" class="clearfix">
    <!-- Inner Container Start -->
    <div class="container">
      <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span class="mws-i-24 i-pencil">
              <?php echo $member->first_name.' '.$member->last_name; ?>
            </span>
          </div>
          <div class="mws-panel-body">
            <div class="mws-panel-content">
              <img src="<?php echo $member->avatar; ?>">
              <form class="mws-form" action="form_layouts.html">
                <div class="mws-form-inline">
                  <div class="mws-form-row">
                    <label>Email</label>
                    <div class="mws-form-item small">
                      <label><?php echo $member->email; ?></label>
                    </div>
                  </div>

                  <div class="mws-form-row">
                    <label>Gender</label>
                    <div class="mws-form-item medium">
                      <label><?php echo $member->gender; ?></label>
                    </div>
                  </div>
                  <div class="mws-form-row">
                    <label>Organization</label>
                    <div class="mws-form-item large">
                      <label><?php echo $member->organization; ?></label>
                    </div>
                  </div>
                  <div class="mws-form-row">
                    <label>City</label>
                    <div class="mws-form-item large">
                      <label><?php echo (is_null($member->city)) ? '' : $member->city->name; ?></label>
                    </div>
                  </div>
                  <div class="mws-form-row">
                    <label>Phone Number</label>
                    <div class="mws-form-item small">
                      <label><?php echo $member->phone; ?></label>
                    </div>
                  </div>
                  <div class="mws-form-row">
                    <label>Birthdate</label>
                    <div class="mws-form-item clearfix">
                      <label><?php echo date_format($member->dob, 'Y M D'); ?></label>
                    </div>
                  </div>
                  <div class="mws-form-row">
                    <label>Number ID</label>
                    <div class="mws-form-item clearfix">
                      <label><?php echo $member->id_number; ?></label>
                    </div>
                  </div>
                  <div class="mws-form-row">
                    <label>Country</label>
                    <div class="mws-form-item clearfix">
                      <label><?php echo (is_null($member->country)) ? '' : $member->country->name; ?></label>
                    </div>
                  </div>
                  <div class="mws-form-row">
                    <label>Status</label>
                    <div class="mws-form-item clearfix">
                      <label><?php echo $member->status ? 'verified' : 'unverified'; ?></label>
                    </div>
                  </div>
                  <div class="mws-form-row">
                    <label>Tshirt size</label>
                    <div class="mws-form-item clearfix">
                      <label><?php echo $member->tshirt_size; ?></label>
                    </div>
                  </div>
                  <div class="mws-form-row">
                    <label>Province</label>
                    <div class="mws-form-item clearfix">
                      <label><?php echo (is_null($member->province)) ? '' : $member->province->name; ?></label>
                    </div>
                  </div>
                  <div class="mws-form-row">
                    <label>Address</label>
                    <div class="mws-form-item clearfix">
                      <label><?php echo $member->address; ?></label>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>

      <div class="mws-panel grid_8">
        <div class="mws-panel-header">
          <span class="mws-i-24 i-table-1">Participant Histories</span>
        </div>
        <div class="mws-panel-body">
          <div class="mws-panel-toolbar top clearfix">
            <ul>
                <li><a href="members<?php echo $member->id;?>-participant" class="mws-ic-16 ic-add"> Add Member Participant</a></li>
              </ul>
          </div>
          <table class="mws-table mws-datatable-fn">
            <thead>
              <tr>
                <th>#</th>
                <th>bib name</th>
                <th>category</th>
                <th>group</th>
                <th>date</th>
                <th>occupation</th>
                <th>tshirt size</th>
                <th>status</th>
                <!-- <th>Action</th> -->
              </tr>
            </thead>
            <tbody>
            <?php foreach ($member->participants as $key => $participant): ?>
              <tr class="gradeX">
                <td><?php echo $key+1; ?></td>
                <td><?php echo $participant->bib_name; ?></td>
                <td><?php echo $participant->category->name; ?></td>
                <td><?php echo $participant->group_name; ?></td>
                <td><?php echo (is_null($participant->create_at)) ? '' : date_format($participant->create_at, 'Y-m-d'); ?></td>
                <td><?php echo (is_null($participant->occupation)) ? '' : $participant->occupation->name; ?></td>
                <td><?php echo $participant->tshirt_size; ?></td>
                <td><?php echo $participant->status ? 'pay' : 'unpay'; ?></td>
                <!-- <td>
                  <a href="detail<?php echo $member->id; ?>">Show</a>
                  <a href="delete<?php echo $member->id; ?>">Delete</a>
                </td> -->
             </tr>
             <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="mws-panel grid_8">
        <div class="mws-panel-header">
          <span class="mws-i-24 i-table-1">Race Histories</span>
        </div>
        <div class="mws-panel-body">
          <table class="mws-table mws-datatable-fn">
            <thead>
              <tr>
                <th>#</th>
                <th>year</th>
                <th>category</th>
                <th>timer</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($member->race_events as $key => $race): ?>
              <tr class="gradeX">
                <td><?php echo $key+1; ?></td>
                <td><?php echo $race->year; ?></td>
                <td><?php echo $race->category->name; ?></td>
                <td><?php echo $race->timer; ?></td>
             </tr>
             <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</body>
</html>
