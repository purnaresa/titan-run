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
        <h4 class="pull-right">RACE HISTORY</h4>
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

                <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#addrun" aria-controls="home" role="tab" data-toggle="tab" class="tab-link-hist">Add Run</a></li>
                      <li role="presentation"><a href="#histories" aria-controls="profile" role="tab" data-toggle="tab" class="tab-link-hist">Race History</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content spacing-tab-history">
                      <div role="tabpanel" class="tab-pane active" id="addrun">
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
                              <label for="category" class="col-sm-4 control-label">Run Category</label>
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
                        <label for="password" class="col-sm-4 control-label">Your Time </label>
                        <div class="col-sm-8">
                          <input type="text" id="run_timer" data-format="HH:mm:ss"  name="datetime" style="background-color:black;" >
                        </div>
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
                              <button class="btn-round-white" onClick="history.go(-1);">Back </button>
                            </div>
                        </form>
                      </div>

                      <div role="tabpanel" class="tab-pane" id="histories">
                        <table class="table table-responsive">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Event</th>
                              <th>Year</th>
                              <th>Category</th>
                              <th>Time</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
							
                            <?php foreach($race_events2 as $key=>$race_event): ?>
                            <tr>
                              <td><?php echo $key+1 ?></td>
                              <td><?php echo $race_event->name; ?></td>
                              <td><?php echo $race_event->year; ?></td>
                              <td><?php echo $race_event->category->name; ?></td>
                              <td><?php echo $race_event->timer; ?></td>
                              <td><a href="remove-event<?php echo $race_event->id; ?>">delete</a></td>
                            </tr>
                            <?php endforeach; ?>
							
							
                          </tbody>
                        </table>
                      </div>

                    </div>

                  </div>

                
                
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
  maxYear: 2020,

  firstItem: 'name',

  // years order.
  yearDescending: true,

  // step of values in minutes dropdown.
  minuteStep: 1,

  // step of values in seconds dropdown.
  secondStep: 1,

  // CSS class applied if date is incorrect
  errorClass: null,

  // CSS class applied to each dropdow
  customClass: 'form-control',

  // whether to round minutes and seconds if step > 1
  roundTime: true, 

  // whether days in combo depend on selected month: 31, 30, 28
  smartDays: false 

}); 

    });
  </script>
  <?php include "views/shared/footer.php"; ?>
</body>