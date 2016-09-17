<?php include "views/Admins/shared/header.php"; ?>
<body>
 <?php include "views/Admins/shared/sidebar.php"; ?>
 <!-- Main Container Start -->
 <div id="mws-container" class="clearfix">
  <!-- Inner Container Start -->
  <div class="container">
    <div class="mws-panel-header">
      <span class="mws-i-24 i-list">Edit Province - <?php echo $province->name; ?></span>
    </div>
    <div class="mws-panel-body">
     <form class="mws-form" method="post">
      <div class="mws-form-block">
       <div class="mws-form-row">
        <label>Name</label>
        <div class="mws-form-item small">
         <input type="text" class="mws-textinput" name="name" value="<?php echo $province->name; ?>" required/>
       </div>
     </div>
     <div class="mws-form-row">
       <label>Country</label>
       <div class="mws-form-item small">
        <select name="country_id" required>
          <option value="">---select---</option>
          <?php foreach($countries as $country): ?>
            <option value="<?php echo $country->id; ?>" <?php echo $country->id == $province->country_id ? 'selected' : '' ; ?>><?php echo $country->name; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="mws-form-row">
      <label>Pack</label>
      <div class="mws-form-item small">
        <input type="radio" name="pack" value="1" <?php echo !empty($province->pack) ? 'checked' : ''; ?>>yes
        <input type="radio" name="pack" <?php echo empty($province->pack) ? 'checked' : ''; ?>>no
      </div>
    </div>
    <div class="mws-button-row">
    <input type="submit" value="submit" name="submit" class="mws-button red" />
   </div>
 </form>
</div>
</div>
</div>

</body>
</html>