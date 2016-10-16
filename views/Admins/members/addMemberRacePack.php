<?php include 'views/Admins/shared/header.php'; ?>

<body>
    <?php include 'views/Admins/shared/sidebar.php'; ?>
    <!-- Main Container Start -->
    <div id="mws-container" class="clearfix">
        <!-- Inner Container Start -->
        <div class="container">
            <div class="mws-panel grid_8">
                <div class="mws-panel-header">
                    <span class="mws-i-24 i-list"><?php echo $member->first_name . " " . $member->last_name; ?> Race Addons</span>
                </div>
                <div class="mws-panel-body">
                    <form class="mws-form" method="post" enctype='multipart/form-data'>
                        <div class="mws-form-inline">
                          <?php if (isset($errors)): ?>
                            <div class="mws-form-message error">
                                <ul>
                                  <?php foreach ($errors as $key => $error): ?>
                                    <?php echo '<li>' . $error . '<li />'; ?>
                                  <?php endforeach; ?>
                                </ul>
                            </div>
                          <?php endif; ?>

                          <?php if (isset($message)): ?>
                            <div class="mws-form-message error">
                                <?php echo $message; ?>
                            </div>
                          <?php endif; ?>
                            <div class="mws-form-row">
                                <label>Email</label>
                                <div class="mws-form-item small">
                                  <label><?php echo $member->email; ?></label>
                                </div>
                            </div>

                            <div id="deliveryContainer">
                              <div class="mws-form-row">
                                <label></label>
                                <div class="mws-form-item">
                                  <ul class="mws-form-list inline">
                                    <li><input type="checkbox" name="check_pack"> <label>PENGANTARAN PAKET LOMBA / RACE PACK DELIVERY</label></li>
                                  </ul>
                                </div>
                              </div>

                              <div class="mws-form-row">
                                <label></label>
                                <div class="mws-form-item">
                                  <p class="warn-txt">
                                    Saya ingin paket lomba saya diantar ke alamat yang saya isi di bawah.
                                    Saya setuju biaya pengantaran paket lomba sebesar Rp.25,000 dan saya
                                    menyatakan alamat yang diisi adalah benar dan bertanggung jawab penuh atas kendala
                                    pengiriman seandainya alamat yang saya isi tidak benar.
                                    Alamat pengantaran hanya berlaku di wilayah Indonesia
                                  </p>
                                  <hr>
                                  <p class="warn-txt">
                                    I want my race package delivered to the address I enter below.
                                    I agree the package-delivery costs amounting Rp.25,000 race and
                                    I declare that address filled in are correct and are fully responsible
                                    for delivery obstacles if the contents of the address I was not right.
                                    Delivery address is valid only in the territory of Indonesia
                                  </p>
                                </div>
                              </div>

                              <div class="mws-form-row">
                                  <label>Receiver Name</label>
                                  <div class="mws-form-item large">
                                    <div class="mws-form-cols clearfix">
                                          <div class="mws-form-col-2-8 alpha">
                                              <div class="mws-form-item">
                                                  <input type="text" name="name" class="mws-textinput" placeholder="Receiver Name" />
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="mws-form-row">
                                  <label>Address</label>
                                  <div class="mws-form-item small">
                                      <textarea name="address" rows="3" cols="100%"></textarea>
                                  </div>
                              </div>

                              <div class="mws-form-row" id="province-row">
                                  <label>Province</label>
                                  <div class="mws-form-item large">
                                      <div class="mws-form-cols clearfix">
                                          <div class="mws-form-col-2-8 alpha">
                                              <div class="mws-form-item">
                                                  <select class="chzn-select" name="province_id">
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
                                                  <select class="chzn-select" name="city_id">
                                                    <option value="">--Select--</option>
                                                  </select>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="mws-form-row">
                                  <label>Postal Code</label>
                                  <div class="mws-form-item large">
                                    <div class="mws-form-cols clearfix">
                                          <div class="mws-form-col-1-8 alpha">
                                              <div class="mws-form-item">
                                                  <input type="text" name="post_code" class="mws-textinput" placeholder="Postal Code" onkeypress="return isNumber(event)" />
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="mws-form-row">
                                  <label>Phone</label>
                                  <div class="mws-form-item large">
                                    <div class="mws-form-cols clearfix">
                                          <div class="mws-form-col-1-8 alpha">
                                              <div class="mws-form-item">
                                                  <input type="text" name="phone" class="mws-textinput" placeholder="Phone" onkeypress="return isNumber(event)" />
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>

                            <div id="shuttleContainer">
                              <div class="mws-form-row">
                                <label></label>
                                <div class="mws-form-item">
                                  <ul class="mws-form-list inline">
                                    <li><input type="checkbox" name="check_shuttle"> <label>PENGANTARAN PAKET LOMBA / RACE PACK DELIVERY</label></li>
                                  </ul>
                                </div>
                              </div>

                              <div class="mws-form-row">
                                <label></label>
                                <div class="mws-form-item">
                                  <p class="warn-txt">
                                    Titan Run 2016 akan menyediakan bus pengantaran bagi para peserta dari
                                    (4) titik penjemputan di seluruh Jakarta.
                                    Layanan bus pengantaran bebas biaya ini hanya berlaku untuk peserta Titan Run 2016.
                                    Bus Yang sama akan mengantarkan kembali peserta dari lokasi lomba mall @Alam Sutera
                                    kembali ke titik kapasitas terbatas sebanyak 432 kursi untuk 10 bus
                                  </p>
                                  <hr>
                                  <p class="warn-txt">
                                    Titan Run 2016 will provide a shuttle bus for participants from (4)
                                    pick-up points throughout Jakarta.
                                    shuttle bus service free of charge only applies to participants
                                    Titan Run 2016. The same bus will take back the participants of the race mall
                                    locations @Alam Sutera back to the point
                                    limited capacity of as many as 432  seats for 10 buses
                                  </p>
                                  <table class="mws-table">
                                    <thead>
                                      <tr>
                                        <th>Name</th>
                                        <th>Seats</th>
                                        <th>Book</th>
                                        <th>Total</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($shuttles as $shuttle): ?>
                                        <tr>
                                          <td><?php echo $shuttle->name; ?></td>
                                          <td><?php echo $shuttle->capacity; ?></td>
                                          <td><?php echo count($shuttle->race_packs); ?></td>
                                          <td><?php echo $shuttle->capacity - count($shuttle->race_packs); ?></td>
                                        </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                  </table>
                                  <hr />
                                </div>
                              </div>

                              <div class="mws-form-row">
                                  <label></label>
                                  <div class="mws-form-item small">
                                      <div class="mws-form-cols clearfix">
                                          <div class="mws-form-col-3-8 alpha">
                                              <div class="mws-form-item">
                                                  <select class="chzn-select" name="shuttle_bus_id" required="">
                                                    <option value="">-----SELECT-----</option>
                                                    <?php foreach($shuttles as $shuttle): ?>
                                                      <option value="<?php echo $shuttle->id; ?>"><?php echo $shuttle->name; ?></option>
                                                    <?php endforeach; ?>
                                                  </select>
                                              </div>
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
</body>
<script type="text/javascript">
$(document).ready(function () {
  $('input[type="checkbox"][name="check_pack"]').change(function () {
    var isChecked = $(this).is(":checked");
    var deliveryContainer = $("#deliveryContainer");

    deliveryContainer.find("input[type='text'], select, textarea").prop("disabled", !isChecked);
    deliveryContainer.find("input[type='text'], select, textarea").prop("required", isChecked);
  });

  $('input[type="checkbox"][name="check_shuttle"]').change(function () {
    var isChecked = $(this).is(":checked");
    var shuttleContainer = $("#shuttleContainer");

    shuttleContainer.find("select").prop("disabled", !isChecked);
    shuttleContainer.find("select").prop("required", isChecked);
  });

  $('select[name="province_id"]').change(function(){
    var provinceId = $(this).val();

    var cityIdRow = $("#city-row");
    var cityIdElem = $('select[name="city_id"]');

    if (provinceId === "") {
      cityIdRow.hide();
      return false;
    }

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

  $('input[type="checkbox"][name="check_pack"]').trigger('change');
  $('input[type="checkbox"][name="check_shuttle"]').trigger('change');

});
</script>
</html>
