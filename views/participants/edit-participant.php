<?php include "views/shared/header.php"; ?>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="background-color:#35363A;">
  <?php include "views/shared/home_navigation.php";?>
  <section class="title-gallery">
    <div class="container">
      <div class="col-sm-6">
        <ol class="breadcrumb pull-left">
          <li><a href="home">Home</a></li>
          <li><a href="profile">Profile</a></li>
          <li class="active">Participant</li>
        </ol>
      </div>
      <div class="col-sm-6">
        <h4 class="pull-right">EDIT PARTICIPANT</h4>
      </div>
    </div>
  </section>
  <section class="profile-div bottom-space">
    <div class="container">
      <div class="row profile">
        <div class="row profile-content">
          <h2>TITAN RUN REGISTRATION</h2>
          <?php if(isset($msg)){echo $msg;}?>
          <form class="form-horizontal" method="post">
            <div class="col-md-6"> 
              <div class="form-group">
              <label for="password" class="col-sm-4 control-label">Run Category</label>
              <div class="col-sm-8 ">
                <select class="form-control" name="category_id">
                  <option>-----SELECT-----</option>
                  <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category->id; ?>" <?php echo $category->id == $user_participant->category_id ? "selected" : ""; ?>><?php echo $category->name.' - IDR '.$category->price ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
              <div class="form-group">
                <label for="bibnumber" class="col-sm-4 control-label">BIB Name <small> / <i>Nama BIB</i></small></label>
                <div class="col-sm-8 ">
                  <input type="text" class="form-control" id="bibnumber" name="bib_name" value="<?php echo $user_participant->bib_name; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="emergencyname" class="col-sm-4 control-label">Emergency Contact Name <small> / <i>Nama Kontak Darurat</i></small></label>
                <div class="col-sm-8 ">
                  <input type="text" class="form-control" id="emergencyname" name="emergency_contact_name" value="<?php echo $user_participant->emergency_contact_name; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="emergencynumber" class="col-sm-4 control-label">Emergency Contact Number <small> / <i>No. Kontak Darurat</i></small></label>
                <div class="col-sm-8 ">
                  <input type="text" class="form-control" id="emergencynumber" name="emergency_contact_number" onkeypress="return isNumber(event)" value="<?php echo $user_participant->phone; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="groupname" class="col-sm-4 control-label">Group Name <small> / <i>Nama Grup</i></small></label>
                <div class="col-sm-8 ">
                  <select class="form-control" name="group_id" id="group_id">
                    <option value="">-----SELECT-----</option>
                    <?php foreach($groups as $group): ?>
                      <option value="<?php echo $group->name; ?>" <?php echo $group->name==$user_participant->group_name ? "selected" : ""; ?>><?php echo $group->name; ?></option>
                    <?php endforeach; ?>
                    <option value="other">Other</option>
                  </select>
                  <input type="text" class="form-control" id="groupname" name="group_name" value="<?php echo $user_participant->group_name; ?>" style="display:none;">
                </div>
              </div>
              <div class="form-group">
                <label for="occupation" class="col-sm-4 control-label">Occupation <small> / <i>Pekerjaan</i></small></label>
                <div class="col-sm-8 ">
                  <select class="form-control" name="occupation_id" id="occupation">
                    <option value="">-----SELECT-----</option>
                    <?php foreach($occupations as $occupation): ?>
                      <option value="<?php echo $occupation->id; ?>" <?php echo $occupation->id == $user_participant->occupation_id ? "selected" : ""; ?>><?php echo $occupation->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-4 control-label">Blood Type <small> / <i>Golongan Darah</i></small></label>
                <div class="col-sm-8 ">
                  <select class="form-control" name="blood_type">
                    <option value="">-----SELECT-----</option>
                    <option value="A+" <?php echo $user_participant->blood_type == "A+" ? "selected" : ""; ?>>A+</option>
                    <option value="A-" <?php echo $user_participant->blood_type == "A-" ? "selected" : ""; ?>>A-</option>
                    <option value="B+" <?php echo $user_participant->blood_type == "B+" ? "selected" : ""; ?>>B+</option>
                    <option value="B-" <?php echo $user_participant->blood_type == "A-" ? "selected" : ""; ?>>B-</option>
                    <option value="AB+" <?php echo $user_participant->blood_type == "AB+" ? "selected" : ""; ?>>AB+</option>
                    <option value="AB-" <?php echo $user_participant->blood_type == "AB-" ? "selected" : ""; ?>>AB-</option>
                    <option value="O+" <?php echo $user_participant->blood_type == "O+" ? "selected" : ""; ?>>O+</option>
                    <option value="O-" <?php echo $user_participant->blood_type == "O-" ? "selected" : ""; ?>>O-</option>
                  </select>
                </div>
              </div>
              
              <div class="form-group" id="medical">
                <label for="medicalcondition" class="col-sm-4 control-label">Medical Condition <small> / <i>Kondisi Medis</i></small></label>
                <div class="col-sm-8">
                  <select class="form-control" id="medical_condition" name="medical_condition">
                    <option value="">-----SELECT-----</option>
                    <option value="Yes" <?php echo $user_participant->medical==true ? "selected" : ""; ?>>Yes</option>
                    <option value="No" <?php echo $user_participant->medical==false ? "selected" : ""; ?>>No</option>
                  </select>
                </div>
              </div>
              <?php if($user_participant->medical==true) { ?>
                <div class="form-group" id="input_medical_condition">
              <?php } else { ?>
                <div class="form-group" style="display: none;" id="input_medical_condition">
              <?php } ?>
                <label for="medicalconditiondesc" class="col-sm-4 control-label">Medical Condition Desc <small> / <i>Deskripsi Kondisi Medis</i></small></label>
                <div class="col-sm-8 ">
                  <textarea class="form-control" id="medical_desc" name="medical_desc"><?php echo $user_participant->medical_desc; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="firstrun" class="col-sm-4 control-label">Your First Run <small> / <i>Lari pertama anda?</i></small></label>
                <div class="col-sm-8 ">
                  <select class="form-control" name="first_run" id="firstrun">
                    <option value="">-----SELECT-----</option>
                    <option value="Yes" <?php echo $user_participant->first_run=="Yes" ? "selected" : ""; ?>>Yes</option>
                    <option value="No" <?php echo $user_participant->first_run=="No" ? "selected" : ""; ?>>No</option>
                  </select>
                </div>
              </div>
              <?php if($user_participant->first_run=="Yes") { ?>
                <div class="form-group" id="besttime" style="display:none;">
              <?php } else { ?>
                <div class="form-group" id="besttime">
              <?php } ?>
                <label for="besttime" class="col-sm-4 control-label">Best Time <small> / <i>Waktu Terbaik</i></small></label>
                <div class="col-sm-8 ">
                  <!-- <input type="number" step="0.01" id="best_time" name="best_time" min=0 class="form-control" value="<?php echo $user_participant->best_time; ?>" /> -->
                  <input type="text" id="best_time" name="best_time" class="form-control" value="<?php echo $user_participant->best_time; ?>" />
                </div>
              </div>


              <div class="form-group">
                <label for="howyouknow" class="col-sm-4 control-label">How do you know this event? <small> / <i>Bagaimana anda tahu event ini?</i></small></label>
                <div class="col-sm-8 ">
                  <select class="form-control" name="event_information" id="howknow">
                    <option value="">-----SELECT-----</option>
                    <?php foreach($events as $event): ?>
                      <option value="<?php echo $event->id; ?>" <?php echo $event->id == $user_participant->event_id ? "selected" : ""; ?>><?php echo $event->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6"> 
              <div class="form-group">
                <label for="howyouknow" class="col-sm-4 control-label">Website you read for running-related information <small> / <i>Web yang anda untuk informasi?</i></small></label>
                <div class="col-sm-8 ">
                  <!-- <input type="text" class="form-control" id="relateinfo" name="related_information"> -->
                  <select class="form-control" name="related_information" id="relatedinfo">
                    <option>-----SELECT-----</option>
                    <?php foreach($relateds as $related): ?>
                      <option value="<?php echo $related->id; ?>" <?php echo $related->id == $user_participant->related_information_id ? "selected" : ""; ?>><?php echo $related->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="runapps" class="col-sm-4 control-label">Favorite Run Apps <small> / <i>Aplikasi Lari Favorit</i></small></label>
                <div class="col-sm-8 ">
                  <select class="form-control" name="favorit_run_app" id="favorit_run_app">
                    <option>-----SELECT-----</option>
                    <?php foreach($apps as $app): ?>
                      <option value="<?php echo $app->id; ?>" <?php echo $app->id == $user_participant->favourite_app_id ? "selected" : ""; ?>><?php echo $app->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="runapps" class="col-sm-4 control-label"></label>
                <div class="col-sm-8 ">
                  <img src="img/size-chart.jpg" class="img-responsive" alt="tshirt">
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-4 control-label">T-Shirt Size</label>
                <div class="col-sm-8 ">
                  <select class="form-control" name="tshirt_size" id="tshirt_size">
                    <option value="">--Select--</option>
                    <option value="XS" <?php echo $user_participant->tshirt_size == "XS" ? 'selected' : '' ?>>XS (Extra Small)</option>
                    <option value="S" <?php echo $user_participant->tshirt_size == "S" ? 'selected' : '' ?>>S (Small)</option>
                    <option value="M" <?php echo $user_participant->tshirt_size == "M" ? 'selected' : '' ?>>M (Medium)</option>
                    <option value="L" <?php echo $user_participant->tshirt_size == "L" ? 'selected' : '' ?>>L (Large)</option>
                    <option value="XL" <?php echo $user_participant->tshirt_size == "XL" ? 'selected' : '' ?>>XL (Extra Large)</option>
                    <option value="XXL" <?php echo $user_participant->tshirt_size == "XXL" ? 'selected' : '' ?>>XXL (Double Extra Large)</option>
                  </select>
                </div>
              </div>
                        
              <p class="warn-txt col-md-11 col-md-offset-1">
                Warning:<br>
                Check back columns that you change the page to change this profile.
                If you are confident with the changes made,press the "REGISTER" button
                to confirm the changes
              </p>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button class="btn-round-white pull-right" type="submit" name="submit" value="submit">Register</button> 
                  <button class="btn-round-white" onclick="history.go(-1);">Back </button>
                </div>
              </div>
            </div>
          </form>
        </div>

        <script type="text/javascript">
          $('#medical_condition').on('change',function(){
            if( $(this).val()==="Yes"){
              $("#input_medical_condition").show();
            }
            else{
              $("#input_medical_condition").hide();
            }
          });

          $('#firstrun').on('change',function(){
            if( $(this).val()==="No"){
              $("#besttime").show();
            }
            else{
              $("#besttime").hide();
            }
          });

          $('#howknow').on('change',function(){
            if( $(this).val()==="Other"){
              $("#specify").show();
            }
            else{
              $("#specify").hide();
            }
          });

          $('#group_id').on('change',function(){
            if( $(this).val()==="other"){
              $("#groupname").show();
              $("#groupname").val('');
            }
            else if( ( $(this).val()==="") ){
              $("#groupname").hide();
              $("#groupname").val(''); 
            }
            else{
              $("#groupname").hide();
              $("#groupname").val($(this).val());
            }
          });
          $('#best_time').timepicker({ 'timeFormat': 'H:i:s','showDuration': true,'step': 0.6 });
        </script>
      </div>
    </div>
  </section>
  <?php include "views/shared/footer.php"; ?>
</body>