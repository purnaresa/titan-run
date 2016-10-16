<?php include "views/Admins/shared/header.php"; ?>
<body>
  <?php include "views/Admins/shared/sidebar.php"; ?>
  <!-- Main Container Start -->
  <div id="mws-container" class="clearfix">
    <!-- Inner Container Start -->
    <div class="container">
      <div class="mws-panel grid_8">
          <div class="mws-panel-header">
              <span class="mws-i-24 i-list">Edit <?php echo $member->first_name . ' ' . $member->last_name; ?></span>
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
                      <div class="mws-form-row">
                          <label>Name</label>
                          <div class="mws-form-item large">
                            <div class="mws-form-cols clearfix">
                                  <div class="mws-form-col-1-8 alpha">
                                      <div class="mws-form-item">
                                          <input type="text" name="first_name" class="mws-textinput" placeholder="First Name" value="<?php echo $member->first_name; ?>" required="" />
                                      </div>
                                  </div>
                                  <div class="mws-form-col-1-8">
                                      <div class="mws-form-item">
                                          <input type="text" name="last_name" class="mws-textinput" placeholder="Last Name" value="<?php echo $member->last_name; ?>" required="" />
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="mws-form-row">
                          <label>Email</label>
                          <div class="mws-form-item large">
                              <div class="mws-form-cols clearfix">
                                  <div class="mws-form-col-2-8 alpha">
                                      <div class="mws-form-item">
                                          <input type="email" name="email" class="mws-textinput" placeholder="Email" value="<?php echo $member->email; ?>" required="" disabled=""/>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="mws-form-row">
                          <label>Password</label>
                          <div class="mws-form-item large">
                              <div class="mws-form-cols clearfix">
                                  <div class="mws-form-col-2-8 alpha">
                                      <div class="mws-form-item">
                                          <input type="password" name="password" id="password" class="mws-textinput" pattern=".{8,}" title="8 characters minimum" />
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="mws-form-row">
                          <label>Password Confirmation</label>
                          <div class="mws-form-item large">
                              <div class="mws-form-cols clearfix">
                                  <div class="mws-form-col-2-8 alpha">
                                      <div class="mws-form-item">
                                          <input type="password" name="password_confirmation" id="password_confirmation" class="mws-textinput" pattern=".{8,}" title="8 characters minimum"/>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="mws-form-row">
                          <label>Date of Birth</label>
                          <div class="mws-form-item large">
                              <div class="mws-form-cols clearfix">
                                  <div class="mws-form-col-1-8 alpha">
                                      <div class="mws-form-item">
                                          <input type="text" name="dob" class="mws-textinput datepicker" value="<?php echo $member->dob->format('d/m/Y'); ?>" required=""/>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="mws-form-row">
                          <label>Gender</label>
                          <div class="mws-form-item clearfix">
                              <ul class="mws-form-list inline">
                                  <li>
                                    <input type="radio" name="gender" value="Male" <?php echo ($member->gender === 'Male') ? "checked='checked'" : "" ; ?> required=""/> <label>Male</label>
                                  </li>
                                  <li>
                                    <input type="radio" name="gender" value="Female" <?php echo ($member->gender === 'Female') ? "checked='checked'" : "" ; ?>/> <label>Female</label>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <div class="mws-form-row">
                          <label>Organization</label>
                          <div class="mws-form-item large">
                              <div class="mws-form-cols clearfix">
                                  <div class="mws-form-col-2-8 alpha">
                                      <div class="mws-form-item">
                                          <input type="text" name="organization" class="mws-textinput" value="<?php echo $member->organization; ?>" required="" />
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="mws-form-row">
                          <label>Photo Profile</label>
                          <div class="mws-form-item medium">
                              <img src="<?php echo $member->avatar; ?>" />
                              <br />
                              <input type="file" name="avatar" />
                          </div>
                      </div>
                      <div class="mws-form-row">
                          <label>KTP/Passport/KITAS Number</label>
                          <div class="mws-form-item large">
                              <div class="mws-form-cols clearfix">
                                  <div class="mws-form-col-2-8 alpha">
                                      <div class="mws-form-item">
                                          <input type="text" name="id_number" class="mws-textinput" value="<?php echo $member->id_number; ?>" required="" />
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="mws-form-row">
                          <label>Country</label>
                          <div class="mws-form-item large">
                              <div class="mws-form-cols clearfix">
                                  <div class="mws-form-col-2-8 alpha">
                                      <div class="mws-form-item">
                                          <select class="chzn-select" name="country_id" required="">
                                            <option value="">--Select--</option>
                                            <?php foreach($countries as $country): ?>
                                              <option value="<?php echo $country->id; ?>"
                                                <?php echo $country->id == $member->country_id ? 'selected' : '' ?>>
                                                <?php echo $country->name; ?></option>
                                            <?php endforeach; ?>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="mws-form-row" id="province-row">
                          <label>Province</label>
                          <div class="mws-form-item large">
                              <div class="mws-form-cols clearfix">
                                  <div class="mws-form-col-2-8 alpha">
                                      <div class="mws-form-item">
                                          <select class="chzn-select" name="province_id" required="">
                                            <option value="">--Select--</option>
                                            <?php foreach($provinces as $province): ?>
                                              <option value="<?php echo $province->id; ?>"
                                                <?php echo $province->id == $member->province_id ? 'selected' : ''; ?>>
                                                <?php echo $province->name; ?></option>
                                            <?php endforeach; ?>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="mws-form-row <?php echo ($member->city_id) ? '' : 'hide'; ?>" id="city-row">
                          <label>City</label>
                          <div class="mws-form-item large">
                              <div class="mws-form-cols clearfix">
                                  <div class="mws-form-col-2-8 alpha">
                                      <div class="mws-form-item">
                                          <select class="chzn-select" name="city_id" required="">
                                            <option value="">--Select--</option>
                                            <?php foreach($cities as $city): ?>
                                              <option value="<?php echo $city->id; ?>"
                                                <?php echo $city->id == $member->city_id ? 'selected' : ''; ?>>
                                                <?php echo $city->name; ?></option>
                                            <?php endforeach; ?>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="mws-form-row">
                          <label>address</label>
                          <div class="mws-form-item small">
                              <textarea name="address" rows="3" cols="100%"><?php echo $member->address; ?></textarea>
                          </div>
                      </div>
                      <div class="mws-form-row">
                          <label>Phone Number</label>
                          <div class="mws-form-item large">
                              <div class="mws-form-cols clearfix">
                                  <div class="mws-form-col-2-8 alpha">
                                      <div class="mws-form-item">
                                          <input type="tel" name="phone" class="mws-textinput" maxlength="16" size="16" onkeypress="return isNumber(event)" value="<?php echo $member->phone; ?>" required="" />
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="mws-button-row">
                      <input type="submit" name="submit" value="Update" class="mws-button red" />
                  </div>
              </form>
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

  <script type="text/javascript">
  window.onload = function () {
    document.getElementById("password").onchange = validatePassword;
    document.getElementById("password_confirmation").onchange = validatePassword;
  }
  function validatePassword(){
    var pass2=document.getElementById("password").value;
    var pass1=document.getElementById("password_confirmation").value;

    if (pass2.length) {
      if(pass1!=pass2) {
        document.getElementById("password_confirmation").setCustomValidity("Passwords Don't Match");
      } else {
        //empty string means no validation error
        document.getElementById("password_confirmation").setCustomValidity('');
      }
    }
  }

  $(document).ready(function(){
    $("#password").keyup(function () {
      var value = $(this).val();
      $(this).prop('required', value);
    });

    $('select[name="country_id"]').change(function(){
      var country = $(this).val();
      var isIndonesia = (country === "101");

      var provinceIdRow = $("#province-row");
      var provinceIdElem = $('select[name="province_id"]');
      var provinceIdFirst = provinceIdElem.find("option:first").val();

      var cityIdRow = $("#city-row");
      var cityIdElem = $('select[name="city_id"]');
      var cityIdFirst = cityIdElem.find("option:first").val();

      if(isIndonesia){
        provinceIdElem.removeAttr('disabled');
        provinceIdElem.attr('required', 'required');
        provinceIdRow.show();
        provinceIdElem.show();

        cityIdElem.removeAttr('disabled');
        cityIdElem.attr('required', 'required');
        cityIdRow.show();
        cityIdElem.show();
        return;
      }

      $(provinceIdElem).val(provinceIdFirst);
      provinceIdElem.attr('disabled', 'disabled');
      provinceIdElem.removeAttr('required');
      provinceIdElem.hide();
      provinceIdRow.hide();

      $(cityIdElem).val(cityIdFirst);
      cityIdElem.attr('disabled', 'disabled');
      cityIdElem.removeAttr('required');
      cityIdElem.hide();
      cityIdRow.hide();
    });

    $('select[name="province_id"]').change(function(){
      var provinceId = $(this).val();

      var cityIdRow = $("#city-row");
      var cityIdElem = $('select[name="city_id"]');

      $.ajax({
        url: "../cities/getByProvinceId/" + provinceId + "/json",
        data: {},
        method: 'GET',
        dataType: 'json',
        success: function(response){
          cityIdElem.find("option").remove();

          var toAppend = '<option value="">--Select--</option>';
          $.each(response, function (idx, obj) {
            toAppend += '<option value="' + obj.id + '">' + obj.name + '</option>';
          });
          cityIdElem.append(toAppend);
          cityIdElem.show();
          cityIdRow.show();
        },
        error: function(response){}
      });
    });
  });
  </script>
</body>
</html>
