<div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="profile-content">
      <div class="row profile-content">
        <h2>START YOUR REGISTRATION </h2>  
        <form class="form-horizontal" method="post">
          <div class="col-md-10"> 
            <div class="form-group">
              <label for="bibnumber" class="col-sm-4 control-label">Email Address</label>
              <div class="col-sm-8 ">
                <label for="bibnumber" class="control-label"><?php echo $user['email']; ?></label>
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-sm-4 control-label">Run Category</label>
              <div class="col-sm-8 ">
                <select class="form-control" name="run_category">
                  <option>-----SELECT-----</option>
                  <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->name.' - IDR '.$category->price ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
                
            <p class="warn-txt col-md-8 col-md-offset-2 pull-right">
              Warning:<br>
              Satu Alamat Email hanya berlaku untuk satu peserta lomba<br>
              One account email is only eligible for one race participant only
            </p>
            <div class="form-group">
            <div class="col-sm-offset-2 col-sm-6">
              <a href="profile" class="btn-round-white pull-right">Register later</a>
            </div>
              <div class="col-sm-4">
                <button class="btn-round-white pull-right" type="submit" name="submit" value="submit">Continue</button> 
<button class="btn-round-white" onclick="history.go(-1);">Back </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<div class="col-md-2"></div>