<?php include "views/shared/header.php"; ?>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="background-color:#35363A;">
  <?php include "views/shared/home_navigation.php";?>
  <section class="profile-div top-space bottom-space">
    <div class="container">
      <div class="col-md-10 col-md-offset-1">
        <div class="profile-content">
          <h2>REGISTER</h2>  
          <?php if(isset($msg)){echo $msg;}?>
          <form class="row form-horizontal" method="post" enctype='multipart/form-data'>
            <div class="col-md-6">  
              <div class="form-group">
                <label for="name" class="col-sm-4 control-label">First Name</label>
                <div class="col-sm-8 ">
                  <input type="text" class="form-control" id="first_name" name="first_name" required value="<?php echo !empty($user) ? $user->first_name : ''; ?>"/>
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Last Name</label>
                <div class="col-sm-8 ">
                  <input type="text" class="form-control" id="last_name" name="last_name" required value="<?php echo !empty($user) ? $user->last_name : ''; ?>"/> 
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-4 control-label">Email</label>
                <div class="col-sm-8 ">
                  <input type="email" class="form-control" id="email" name="email" required value="<?php echo !empty($user) ? $user->email : ''; ?>"/>
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-4 control-label">Password</label>
                <div class="col-sm-8 ">
                  <input type="password" class="form-control" id="passwordnew" name="password" required />
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-4 control-label">Retype Password</label>
                <div class="col-sm-8 ">
                  <input type="password" class="form-control" id="passwordnew2" name="password_confirmation" required />
                </div>
              </div>
              <div class="form-group">
                <label for="gender" class="col-sm-4 control-label">Date Of Birth</label>
                <div class='col-sm-8 input-group date' id='datetimepicker1' style="padding-left: 15px;padding-right: 15px;">
                  <input type="text" class="form-control" id="datepicker" name="dob" required />
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label for="gender" class="col-sm-4 control-label">Gender</label>
                <div class="col-sm-8 ">
                  <select class="form-control" name="gender" required>
                    <option value="">--Select--</option>
                    <option value="Male" <?php echo !empty($user) ? ($user->gender=='Male' ? 'selected' : '') : ''; ?>>Male</option>
                    <option value="Female" <?php echo !empty($user) ? ($user->gender=='Female' ? 'selected' : '') : ''; ?>>Female</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="company" class="col-sm-4 control-label">Organization</label>
                <div class="col-sm-8 ">
                  <!-- <select name="company_id" class="form-control">
                    <option value="">--Select--</option>
                    <?php foreach ($companies as $company): ?>
                      <option value="<?php echo $company->id; ?>" <?php echo !empty($user) ? ($user->company_id==$company->id ? 'selected' : '') : ''; ?>>
                      <?php echo $company->name; ?></option>
                    <?php endforeach; ?>
                  </select> -->
                  <input type="text" class="form-control" id="organization" name="organization" required value="<?php echo !empty($user) ? $user->organization : ''; ?>"/> 
                </div>
              </div>
              <div class="form-group">
                <label for="company" class="col-sm-4 control-label">Photo Profile</label>
                <div class="col-sm-8 ">
                <!-- <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/> -->
                  <input type="file" class="form-control" id="avatar" name="avatar"/>
                </div>
              </div>
              <!-- <div class="form-group">
                <label for="company" class="col-sm-4 control-label">Company</label>
                <div class="col-sm-8 ">
                  <input type="text" class="form-control" id="titan_company" name="titan_company" required value="<?php echo !empty($user) ? $user->titan_company : ''; ?>"/>
                </div>
              </div> -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="company" class="col-sm-4 control-label">KTP/Passport/KITAS Number</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="passport" name="id_number" required value="<?php echo !empty($user) ? $user->id_number : ''; ?>"/>
                </div>
              </div>
              <div class="form-group" id="load-country">
                <label for="company" class="col-sm-4 control-label">Country</label>
                <div class="col-sm-8 ">
                  <select class="form-control" name="country_id" id="country_id" required>
                  <option value="">--Select--</option>
                  <?php foreach($countries as $country): ?>
                    <option value="<?php echo $country->id; ?>" 
                      <?php echo $country->code == 'ID' ? 'selected' : '' ?>>
                      <?php echo $country->name; ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group" id="load-province">
                <label for="company" class="col-sm-4 control-label">Province</label>
                <div class="col-sm-8 ">
                  <select class="form-control" name="province_id" id="province_id" required>
                  <option value="">--Select--</option>
                  <?php foreach($provinces as $province): ?>
                    <option value="<?php echo $province->id; ?>" <?php echo !empty($user) ? ($user->province_id==$province->id ? 'selected' : '') : ''; ?>><?php echo $province->name; ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group" id="load-city">
                <?php if(!empty($user)): ?>
                  <label for="company" class="col-sm-4 control-label">City</label>
                  <div class="col-sm-8 ">
                    <select class="form-control" name="city_id" required>
                      <option value="">--Select--</option>
                      <?php foreach ($cities as $city): ?>
                        <option value="<?php echo $city->id; ?>" 
                        <?php echo !empty($user) ? ($user->city_id==$city->id ? 'selected' : '') : ''; ?>>
                        <?php echo $city->name; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                <?php endif; ?>
              </div>
              <div class="form-group">
                <label for="company" class="col-sm-4 control-label">Address</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="address_delivery" name="address" required ><?php echo !empty($user) ? $user->address : ''; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="company" class="col-sm-4 control-label">Phone</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="phone" name="phone" maxlength=16 size=16 onkeypress="return isNumber(event)" required value="<?php echo !empty($user) ? $user->phone : ''; ?>" />
                </div>
              </div>
              <!-- <div class="form-group">
                <label for="gender" class="col-sm-4 control-label">Shirt Size</label>
                <div class="col-sm-8 ">
                  <select class="form-control" name="tshirt_size" required>
                    <option value="">--Select--</option>
                    <option value="XS" <?php echo !empty($user) ? ($user->tshirt_size=='XS' ? 'selected' : '') : ''; ?>>XS (Extra Small)</option>
                    <option value="S" <?php echo !empty($user) ? ($user->tshirt_size=='S' ? 'selected' : '') : ''; ?>>S (Small)</option>
                    <option value="M" <?php echo !empty($user) ? ($user->tshirt_size=='M' ? 'selected' : '') : ''; ?>>M (Medium)</option>
                    <option value="L" <?php echo !empty($user) ? ($user->tshirt_size=='L' ? 'selected' : '') : ''; ?>>L (Large)</option>
                    <option value="XL" <?php echo !empty($user) ? ($user->tshirt_size=='XL' ? 'selected' : '') : ''; ?>>XL (Extra Large)</option>
                    <option value="XXL" <?php echo !empty($user) ? ($user->tshirt_size=='XXL' ? 'selected' : '') : ''; ?>>XXL (Double Extra Large)</option>
                  </select>
                </div>
              </div> -->
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                  <button class="btn-round-white pull-right" type="submit" name="submit" value="submit">Save Changes</button>
                  <button class="btn-round-white" onclick="history.go(-1);">Back </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script>
    $(function () {
      $('#datetimepicker1').datetimepicker({
        format: 'DD/MM/YYYY',
        maxDate: '01/01/2004',
        useCurrent: false,
        defaultDate: "<?php echo !empty($user) ? date_format($user->dob,'d/m/Y') : '01/01/2004'; ?>"
      });
    });

    $(document).ready(function(){
      $('#country_id').change(function(){
        var country = $( "#country_id option:selected" ).val();
        if(country==101){
          $('#province_id').removeAttr('disabled');
          $('#city_id').removeAttr('disabled');
          $('#province_id').attr('required', 'required');
          $('#city_id').attr('required', 'required');
          $('#load-city').show();
          $('#province_id').show();
          $('#load-province').show();
        }else{
          $("#city_id").val($("#city_id option:first").val());
          $("#province_id").val($("#province_id option:first").val());
          $('#province_id').attr('disabled', 'disabled');
          $('#city_id').attr('disabled', 'disabled');
          $('#province_id').removeAttr('required');
          $('#city_id').removeAttr('required');
          $('#city_id').remove();
          $('#load-city').hide();
          $('#province_id').hide();
          $('#load-province').hide();
        }
      });
    });
  </script>
  <?php include "views/shared/footer.php"; ?>
</body>