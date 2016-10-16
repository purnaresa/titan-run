<?php include 'views/Admins/shared/header.php'; ?>

<body>
    <?php include 'views/Admins/shared/sidebar.php'; ?>
    <!-- Main Container Start -->
    <div id="mws-container" class="clearfix">
        <!-- Inner Container Start -->
        <div class="container">
            <div class="mws-panel grid_8">
                <div class="mws-panel-header">
                    <span class="mws-i-24 i-list">Add New Member</span>
                </div>
                <div class="mws-panel-body">
                    <form class="mws-form" method="post" enctype='multipart/form-data'>
                        <div class="mws-form-inline">
                            <div class="mws-form-row">
                              <?php if (isset($errors)): ?>
                                <?php foreach ($errors as $key => $error): ?>
                                  <?php echo $error . '<br />'; ?>
                                <?php endforeach; ?>
                              <?php endif; ?>
                              <?php if(isset($message)){echo $message;}?>
                            </div>
                            <div class="mws-form-row">
                                <label>Name</label>
                                <div class="mws-form-item large">
                                  <div class="mws-form-cols clearfix">
                                        <div class="mws-form-col-1-8 alpha">
                                            <div class="mws-form-item">
                                                <input type="text" name="first_name" class="mws-textinput" placeholder="First Name" required="" />
                                            </div>
                                        </div>
                                        <div class="mws-form-col-1-8">
                                            <div class="mws-form-item">
                                                <input type="text" name="last_name" class="mws-textinput" placeholder="Last Name" required="" />
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
                                                <input type="email" name="email" class="mws-textinput" placeholder="Email" required="" />
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
                                                <input type="password" name="password" id="password" class="mws-textinput" pattern=".{8,}" title="8 characters minimum" required="" />
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
                                                <input type="password" name="password_confirmation" id="password_confirmation" class="mws-textinput" pattern=".{8,}" title="8 characters minimum" required=""/>
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
                                                <input type="text" name="dob" class="mws-textinput datepicker" required=""/>
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
                                          <input type="radio" name="gender" value="Male" checked="" required=""/> <label>Male</label>
                                        </li>
                                        <li>
                                          <input type="radio" name="gender" value="Female"/> <label>Female</label>
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
                                                <input type="text" name="organization" class="mws-textinput" required="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-form-row">
                                <label>Photo Profile</label>
                                <div class="mws-form-item medium">
                                    <input type="file" name="avatar" />
                                </div>
                            </div>
                            <div class="mws-form-row">
                                <label>KTP/Passport/KITAS Number</label>
                                <div class="mws-form-item large">
                                    <div class="mws-form-cols clearfix">
                                        <div class="mws-form-col-2-8 alpha">
                                            <div class="mws-form-item">
                                                <input type="text" name="id_number" class="mws-textinput" required="" />
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
                                                      <?php echo $country->code == 'ID' ? 'selected' : '' ?>>
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
                                                    <option value="<?php echo $province->id; ?>"><?php echo $province->name; ?></option>
                                                  <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-form-row hide" id="city-row">
                                <label>City</label>
                                <div class="mws-form-item large">
                                    <div class="mws-form-cols clearfix">
                                        <div class="mws-form-col-2-8 alpha">
                                            <div class="mws-form-item">
                                                <select class="chzn-select" name="city_id" required="">
                                                  <option value="">--Select--</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-form-row">
                                <label>address</label>
                                <div class="mws-form-item small">
                                    <textarea name="address" rows="3" cols="100%"></textarea>
                                </div>
                            </div>
                            <div class="mws-form-row">
                                <label>Phone Number</label>
                                <div class="mws-form-item large">
                                    <div class="mws-form-cols clearfix">
                                        <div class="mws-form-col-2-8 alpha">
                                            <div class="mws-form-item">
                                                <input type="tel" name="phone" class="mws-textinput" maxlength="16" size="16" onkeypress="return isNumber(event)" required="" />
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
    window.onload = function () {
      document.getElementById("password").onchange = validatePassword;
      document.getElementById("password_confirmation").onchange = validatePassword;
    }
    function validatePassword(){
      var pass2=document.getElementById("password").value;
      var pass1=document.getElementById("password_confirmation").value;
      if(pass1!=pass2) {
        document.getElementById("password_confirmation").setCustomValidity("Passwords Don't Match");
      } else {
        //empty string means no validation error
        document.getElementById("password_confirmation").setCustomValidity('');
      }
    }

    $(document).ready(function(){
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
