<?php include 'views/Admins/shared/header.php'; ?>

<body>
    <?php include 'views/Admins/shared/sidebar.php'; ?>
    <!-- Main Container Start -->
    <div id="mws-container" class="clearfix">
        <!-- Inner Container Start -->
        <div class="container">
            <div class="mws-panel grid_8">
                <div class="mws-panel-header">
                    <span class="mws-i-24 i-list">Add <?php echo $member->first_name . " " . $member->last_name; ?> Participants</span>
                </div>
                <div class="mws-panel-body">
                    <form class="mws-form" method="post" enctype='multipart/form-data'>
                        <div class="mws-form-inline">
                          <?php if (isset($errors)): ?>
                            <div class="mws-form-message error">
                                <ul>
                                  <?php foreach ($errors as $key => $error): ?>
                                    <?php echo '<li>' . $error . '<li />'; ?>
                                  <?php endforeach; ?>
                                </ul>
                            </div>
                          <?php endif; ?>

                          <?php if (isset($message)): ?>
                            <div class="mws-form-message error">
                                <?php echo $message; ?>
                            </div>
                          <?php endif; ?>
                            <div class="mws-form-message info">
                              Warning:<br>
                              Satu Alamat Email hanya berlaku untuk satu peserta lomba<br>
                              One account email is only eligible for one race participant only
                            </div>
                            <div class="mws-form-row">
                                <label>Email</label>
                                <div class="mws-form-item small">
                                  <label><?php echo $member->email; ?></label>
                                </div>
                            </div>
                            <div class="mws-form-row">
                                <label>Run Category</label>
                                <div class="mws-form-item small">
                                    <div class="mws-form-cols clearfix">
                                        <div class="mws-form-col-3-8 alpha">
                                            <div class="mws-form-item">
                                                <select class="chzn-select" name="run_category" required="">
                                                  <option value="">--Select--</option>
                                                  <?php foreach($categories as $category): ?>
                                                    <option value="<?php echo $category->id; ?>">
                                                      <?php echo $category->name.' - IDR '.$category->price ?>
                                                    </option>
                                                  <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mws-form-row">
                                <label>BIB Name</label>
                                <div class="mws-form-item large">
                                  <div class="mws-form-cols clearfix">
                                        <div class="mws-form-col-2-8 alpha">
                                            <div class="mws-form-item">
                                                <input type="text" name="bib_name" class="mws-textinput" placeholder="BIB Name" required="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mws-form-row">
                                <label>Emergency Contact Name</label>
                                <div class="mws-form-item large">
                                  <div class="mws-form-cols clearfix">
                                        <div class="mws-form-col-2-8 alpha">
                                            <div class="mws-form-item">
                                                <input type="text" name="emergency_contact_name" class="mws-textinput" placeholder="Emergency Contact Name" required="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mws-form-row">
                                <label>Emergency Contact Number</label>
                                <div class="mws-form-item large">
                                  <div class="mws-form-cols clearfix">
                                        <div class="mws-form-col-2-8 alpha">
                                            <div class="mws-form-item">
                                                <input type="tel" name="emergency_contact_number" class="mws-textinput" placeholder="Emergency Contact Number" required="" onkeypress="return isNumber(event)"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mws-form-row">
                                <label>Group Name</label>
                                <div class="mws-form-item small">
                                    <div class="mws-form-cols clearfix">
                                        <div class="mws-form-col-2-8 alpha">
                                            <div class="mws-form-item">
                                                <select class="chzn-select" name="group_id">
                                                  <option value="">--Select--</option>
                                                  <?php foreach($groups as $group): ?>
                                                    <option value="<?php echo $group->name; ?>"><?php echo $group->name; ?></option>
                                                  <?php endforeach; ?>
                                                  <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mws-form-row hide group-name-row">
                                <label></label>
                                <div class="mws-form-item large">
                                  <div class="mws-form-cols clearfix">
                                        <div class="mws-form-col-2-8 alpha">
                                            <div class="mws-form-item">
                                                <input type="text" name="group_name" class="mws-textinput" placeholder="Your Group Name" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mws-form-row">
                                <label>Occupation</label>
                                <div class="mws-form-item small">
                                    <div class="mws-form-cols clearfix">
                                        <div class="mws-form-col-3-8 alpha">
                                            <div class="mws-form-item">
                                                <select class="chzn-select" name="occupation_id">
                                                  <?php foreach($occupations as $occupation): ?>
                                                    <option value="<?php echo $occupation->id; ?>"><?php echo $occupation->name; ?></option>
                                                  <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mws-form-row">
                                <label>Blood Type</label>
                                <div class="mws-form-item small">
                                    <div class="mws-form-cols clearfix">
                                        <div class="mws-form-col-1-8 alpha">
                                            <div class="mws-form-item">
                                                <select class="chzn-select" name="blood_type">
                                                  <option value="">-----SELECT-----</option>
                                                  <option value="A+">A+</option>
                                                  <option value="A-">A-</option>
                                                  <option value="B+">B+</option>
                                                  <option value="B-">B-</option>
                                                  <option value="AB+">AB+</option>
                                                  <option value="AB-">AB-</option>
                                                  <option value="O+">O+</option>
                                                  <option value="O-">O-</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mws-form-row">
                                <label>Medical Condition</label>
                                <div class="mws-form-item clearfix">
                                    <ul class="mws-form-list inline">
                                        <li>
                                          <input type="radio" name="medical_condition" value="Yes"/> <label>Yes</label>
                                        </li>
                                        <li>
                                          <input type="radio" name="medical_condition" value="No" checked=""/> <label>No</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="mws-form-row hide medical-desc-row">
                                <label>Medical Condition Desc</label>
                                <div class="mws-form-item small">
                                    <textarea name="medical_desc" rows="3" cols="100%"></textarea>
                                </div>
                            </div>

                            <div class="mws-form-row">
                                <label>First Run</label>
                                <div class="mws-form-item clearfix">
                                    <ul class="mws-form-list inline">
                                        <li>
                                          <input type="radio" name="first_run" value="Yes" checked="" required=""/> <label>Yes</label>
                                        </li>
                                        <li>
                                          <input type="radio" name="first_run" value="No"/> <label>No</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="mws-form-row hide best-time-row">
                                <label>Best Time</label>
                                <div class="mws-form-item large">
                                  <div class="mws-form-cols clearfix">
                                        <div class="mws-form-col-2-8 alpha">
                                            <div class="mws-form-item">
                                                <input type="text" name="best_time" class="mws-textinput" placeholder="Best Time"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mws-form-row">
                                <label>How do you know this event</label>
                                <div class="mws-form-item small">
                                    <div class="mws-form-cols clearfix">
                                        <div class="mws-form-col-3-8 alpha">
                                            <div class="mws-form-item">
                                                <select class="chzn-select" name="event_information" required="">
                                                  <option value="">-----SELECT-----</option>
                                                  <?php foreach($events as $event): ?>
                                                    <option value="<?php echo $event->id; ?>"><?php echo $event->name; ?></option>
                                                  <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mws-form-row">
                                <label>Website you read for running-related information</label>
                                <div class="mws-form-item small">
                                    <div class="mws-form-cols clearfix">
                                        <div class="mws-form-col-3-8 alpha">
                                            <div class="mws-form-item">
                                                <select class="chzn-select" name="related_information" required="">
                                                  <option value="">-----SELECT-----</option>
                                                  <?php foreach($relateds as $related): ?>
                                                    <option value="<?php echo $related->id; ?>"><?php echo $related->name; ?></option>
                                                  <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mws-form-row">
                                <label>Favorite Run Apps</label>
                                <div class="mws-form-item small">
                                    <div class="mws-form-cols clearfix">
                                        <div class="mws-form-col-2-8 alpha">
                                            <div class="mws-form-item">
                                                <select class="chzn-select" name="favorit_run_app" required="">
                                                  <option value="">-----SELECT-----</option>
                                                  <?php foreach($apps as $app): ?>
                                                    <option value="<?php echo $app->id; ?>"><?php echo $app->name; ?></option>
                                                  <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mws-form-row">
                                <label></label>
                                <div class="mws-form-item large">
                                  <img src="../img/size-chart.jpg" class="img-responsive" alt="tshirt">
                                </div>
                            </div>

                            <div class="mws-form-row">
                                <label>T-Shirt Size</label>
                                <div class="mws-form-item small">
                                    <div class="mws-form-cols clearfix">
                                        <div class="mws-form-col-3-8 alpha">
                                            <div class="mws-form-item">
                                              <select class="form-control" name="tshirt_size" id="tshirt_size">
                                                <option value="">--Select--</option>
                                                <option value="XS">XS (Extra Small)</option>
                                                <option value="S">S (Small)</option>
                                                <option value="M">M (Medium)</option>
                                                <option value="L">L (Large)</option>
                                                <option value="XL">XL (Extra Large)</option>
                                                <option value="XXL">XXL (Double Extra Large)</option>
                                              </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mws-button-row">
                            <input type="submit" name="submit" value="Submit" class="mws-button red" />
                            <input type="reset" value="Reset" class="mws-button gray" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function(){
      $("select[name='group_id']").change(function(){
        var value = $(this).val();
        var groupNameRow = $('.group-name-row');
        var groupName = $('input[name="group_name"]');
        if(value === 'other') {
          groupNameRow.removeClass('hide');
          groupName.val('');
        } else if(value === '') {
          groupNameRow.addClass('hide');
          groupName.val('');
        } else {
          groupNameRow.addClass('hide');
          groupName.val(value);
        }
      });

      $("input[type='radio'][name='medical_condition']").change(function(){
        var isYes = ($(this).val() === 'Yes');
        var medicalDescRow = $('.medical-desc-row');
        if(isYes) {
          medicalDescRow.removeClass('hide');
        } else {
          medicalDescRow.addClass('hide');
        }
      });

      $("input[type='radio'][name='first_run']").change(function(){
        var isYes = ($(this).val() === 'Yes');
        var bestTimeRow = $('.best-time-row');
        if(isYes) {
          bestTimeRow.addClass('hide');
        } else {
          bestTimeRow.removeClass('hide');
        }
      });

      $("input[name='best_time']").timepicker({
        'showSecond': true,
        'showDuration': true,
        'step': 0.60,
        'timeFormat': 'hh:mm:ss'
      });
    });
    </script>
</body>
</html>
