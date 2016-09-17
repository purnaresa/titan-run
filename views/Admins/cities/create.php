<?php include "views/Admins/shared/header.php"; ?>
<body>
 <?php include "views/Admins/shared/sidebar.php"; ?>
 <!-- Main Container Start -->
 <div id="mws-container" class="clearfix">
  <!-- Inner Container Start -->
  <div class="container">
    <div class="mws-panel-header">
      <span class="mws-i-24 i-list">New City</span>
    </div>
    <div class="mws-panel-body">
     <form class="mws-form" method="post">
      <div class="mws-form-block">
       <div class="mws-form-row">
        <label>Name</label>
        <div class="mws-form-item small">
         <input type="text" class="mws-textinput" name="name" required/>
       </div>
     </div>
     <div class="mws-form-row">
       <label>Province</label>
       <div class="mws-form-item small">
        <select name="province_id" required>
          <option value="">---select---</option>
          <?php foreach($provinces as $province): ?>
            <option value="<?php echo $province->id; ?>"><?php echo $province->name; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="mws-form-row">
       <label>Pack</label>
       <div class="mws-form-item small">
        <input type="radio" name="pack" value="1" >yes
        <input type="radio" name="pack">no
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