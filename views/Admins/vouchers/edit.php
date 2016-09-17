<?php include "views/Admins/shared/header.php"; ?>
<body>
    <?php include "views/Admins/shared/sidebar.php"; ?>
    <!-- Main Container Start -->
    <div id="mws-container" class="clearfix">
        <!-- Inner Container Start -->
        <div class="container">
          <div class="mws-panel-header">
            <span class="mws-i-24 i-list">Edit Voucher</span>
          </div>
          <div class="mws-panel-body">
            <form class="mws-form" method="post">
              <div class="mws-form-block">
                <div class="mws-form-row">
                  <label>Master Voucher</label>
                  <div class="mws-form-item small">
                    <select name="master_voucher" required>
                      <option value="">---select---</option>
                      <?php foreach($master_vouchers as $master_voucher): ?>
                        <option value="<?php echo $master_voucher->id; ?>" <?php echo $voucher->master_voucher_id == $master_voucher->id ? 'selected' : ''; ?>><?php echo $master_voucher->type.'-'.$master_voucher->nilai; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="mws-form-row">
                  <label>Code Voucher</label>
                  <div class="mws-form-item small">
                    <input type="text" class="mws-textinput" name="code" required/>
                  </div>
                </div>
                <div class="mws-form-row">
                  <label>Expire date</label>
                  <div class="mws-form-item small">
                    <input type="text" class="mws-textinput" name="expire_date" id='datepicker' required/>
                  </div>
                </div>

                <div class="mws-button-row">
                  <input type="submit" value="submit" name="submit" class="mws-button red" />
                </div>
              </form>
            </div>
          </div>
      </div>
      <script type="text/javascript">
        $(function () {
            $('#datepicker').datetimepicker();
          });
      </script>
</body>
</html>