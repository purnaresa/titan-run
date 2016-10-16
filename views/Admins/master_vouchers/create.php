<?php include "views/Admins/shared/header.php"; ?>
<body>
    <?php include "views/Admins/shared/sidebar.php"; ?>
    <!-- Main Container Start -->
    <div id="mws-container" class="clearfix">
        <!-- Inner Container Start -->
        <div class="container">
          <div class="mws-panel-header">
            <span class="mws-i-24 i-list">New Master Voucher</span>
          </div>
          <div class="mws-panel-body">
            <form class="mws-form" method="post">
              <div class="mws-form-block">
                <div class="mws-form-row">
                  <label>Type</label>
                  <div class="mws-form-item small">
                    <select name="type" required>
                      <option value="">---select---</option>
                      <option value="persentase">persentase</option>
                      <option value="nilai">nilai</option>
                    </select>
                  </div>
                </div>
                <div class="mws-form-row">
                  <label>Nilai</label>
                  <div class="mws-form-item small">
                    <input type="text" class="mws-textinput" name="nilai" required/>
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
