<?php include "views/shared/header.php"; ?>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="background-color:#35363A;">
  <?php include "views/shared/home_navigation.php";?>
  <section class="title-gallery">
    <div class="container">
      <div class="col-sm-6">
        <ol class="breadcrumb pull-left">
          <li><a href="home">Home</a></li>
          <li><a href="profile">Profile</a></li>
          <li class="active">Add Races</li>
        </ol>
      </div>
      <div class="col-sm-6">
        <h4 class="pull-right">RACE HISTORIES</h4>
      </div>
    </div>
  </section>
  <section class="profile-div bottom-space">
    <div class="container">
      <div class="row profile">
        <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="profile-content">
              <div class="row profile-content">
                <h2>ADD RACES </h2>
                <?php if(isset($msg)){echo $msg;}?>
                <form class="form-horizontal" method="post">
                  <div class="col-md-10">
                    <div class="form-group">
                      <label for="bibnumber" class="col-sm-4 control-label">Event Name</label>
                      <div class="col-sm-8 ">
                        <input type="text" class="form-control" name="name" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="bibnumber" class="col-sm-4 control-label">Year</label>
                      <div class="col-sm-8 ">
                        <select class="form-control" name="year" required>
                          <option>-----SELECT-----</option>
                          <?php foreach ( $period as $dt ): ?>
                            <option value="<?php echo $dt->format( "Y" ); ?>"><?php echo $dt->format( "Y" ); ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password" class="col-sm-4 control-label">Run Category</label>
                      <div class="col-sm-8 ">
                        <select class="form-control" name="category" required>
                          <option>-----SELECT-----</option>
                          <?php foreach($categories as $category): ?>
                            <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                        
                    <div class="form-group">
                        <label for="password" class="col-sm-4 control-label">Your Time</label>
                        <input type="text" id="time" data-format="HH:mm:ss" data-template="HH : mm : ss" name="datetime">
                        <!-- <div class="col-sm-8 force-inline">
                          <select class="form-control" name="category" required>
                            <option>HH</option>
                            <option>1</option>
                            <option>2</option>
                          </select>
                          <select class="form-control" name="category" required>
                            <option>MM</option>
                            <option>1</option>
                            <option>2</option>
                          </select>
                          <select class="form-control" name="category" required>
                            <option>SS</option>
                            <option>1</option>
                            <option>2</option>
                          </select>
                        </div> -->
                      </div>

                    </div>
                    <div class="col-sm-offset-6 col-sm-6">
                      <button class="btn-round-white" type="submit" name="submit" value="submit">Submit</button> 
                      <button class="btn-round-white" onclick="history.go(-1);">Back </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <div class="col-md-2"></div>
      </div>
    </div>
  </section>
  <script type="text/javascript">
    $(document).ready(function(){
      //$('#run_timer').timepicker({ 'timeFormat': 'H:i:s','showDuration': true,'step': 0.6 });
$('#run_timer').combodate({
  
  // date time format
  format: 'HH:mm:ss',

  // default template
  template: 'HH : mm : ss',

  //initial value, can be new Date()
  value: null,

  // min year
  minYear: 1970,

  // max year
  maxYear: 2015,

  firstItem: 'name',

  // years order.
  yearDescending: true,

  // step of values in minutes dropdown.
  minuteStep: 5,

  // step of values in seconds dropdown.
  secondStep: 1,

  //'name', 'empty', 'none'
  firstItem: 'empty', 

  // CSS class applied if date is incorrect
  errorClass: null,

  // CSS class applied to each dropdow
  customClass: '',

  // whether to round minutes and seconds if step > 1
  roundTime: true, 

  // whether days in combo depend on selected month: 31, 30, 28
  smartDays: false 

}); 

    });
  </script>
  <?php include "views/shared/footer.php"; ?>
</body>