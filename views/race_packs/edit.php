<?php include "views/shared/header.php"; ?>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="background-color:#35363A;">
  <?php include "views/shared/home_navigation.php";?>
  <section class="title-gallery">
    <div class="container">
      <div class="col-sm-6">
        <ol class="breadcrumb pull-left">
          <li><a href="home">Home</a></li>
          <li><a href="profile">Profile</a></li>
          <li class="active">Race Pack and Shuttle Bus</li>
        </ol>
      </div>
      <div class="col-sm-6">
        <h4 class="pull-right">RACE PACK AND SHUTTLE BUS</h4>
      </div>
    </div>
  </section>
  <section class="profile-div bottom-space">
    <div class="container">
      <div class="row profile">
        <h2>RACE ADDONS</h2>  
         <form class="form-horizontal" method="post" enctype='multipart/form-data'>
          <div class="col-md-6"> 
            <div class="checkbox">
              <label class="col-sm-10 col-sm-offset-1">
                <?php if($race_pack){ ?>
                  <input type="checkbox" id="check-pack" name="check_pack" checked value="true"> 
                <?php } else { ?>
                  <input type="checkbox" id="check-pack" name="check_pack"> 
                <?php } ?>
                <h5>Pengantaran paket lomba / Race pack delivery</h5>
              </label>
            </div> 
            <div class="col-sm-10 col-sm-offset-1">
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
            <div class="form-group">
              <label for="name" class="col-sm-4 control-label">Nama Penerima</label>
              <div class="col-sm-8 ">
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $race_pack->name; ?>" >
              </div>
            </div>
            <div class="form-group">
              <label for="names" class="col-sm-4 control-label">Alamat Lengkap</label>
              <div class="col-sm-8 ">
                <textarea type="text" class="form-control" rows="5" id="address" name="address">
                <?php echo $race_pack->address; ?></textarea>
              </div>
            </div>
            <div class="form-group" id="load-province">
              <label for="address" class="col-sm-4 control-label">Provinsi</label>
              <div class="col-sm-8 ">
                 <select class="form-control" name="province_id" id="packprovince_id" required>
                  <option value="">--Select--</option>
                  <?php foreach($provinces as $province): ?>
                    <option value="<?php echo $province->id; ?>" <?php echo $province->id == $race_pack->province_id ? "selected" : ""; ?>><?php echo $province->name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group" id="load-city">
              <label for="company" class="col-sm-4 control-label">City</label>
              <div class="col-sm-8 ">
                <select class="form-control" name="city_id" required>
                  <option value="">--Select--</option>
                  <?php foreach ($cities as $city): ?>
                    <option value="<?php echo $city->id; ?>" 
                    <?php echo !empty($race_pack) ? ($race_pack->city_id==$city->id ? 'selected' : '') : ''; ?>>
                    <?php echo $city->name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="address" class="col-sm-4 control-label">Kode Pos</label>
              <div class="col-sm-8 ">
                <input type="text" class="form-control" id="post_code" name="post_code" 
                value="<?php echo $race_pack->postal_code; ?>">
              </div>
            </div> 
            <div class="form-group">
              <label for="groupname" class="col-sm-4 control-label">No.Telepon</label>
              <div class="col-sm-8 ">
                <input type="text" class="form-control" id="phone" name="phone" 
                value="<?php echo $race_pack->phone; ?>">
              </div>
            </div>
          </div>

          <div class="col-md-6"> 
            <div class="checkbox">
              <label class="col-sm-9 col-sm-offset-3">
                <?php if($race_pack->shuttle){ ?>
                  <input type="checkbox" id="check-shuttle" name="check_shuttle" checked value="true">
                <?php } else { ?>
                  <input type="checkbox" id="check-shuttle" name="check_shuttle"> 
                <?php } ?>
                <h5>Layanan Bus Pengantaran / Shuttle Bus Service</h5>
              </label>
            </div> 
            <div class="col-sm-9 col-sm-offset-3">
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
              <p>
                <table>
                  <tr>
                    <th>Name</th>
                    <th>Seats</th>
                    <th>Book</th>
                    <th>Total</th>
                  </tr>
                  <?php foreach($shuttles as $shuttle): ?>
                    <tr>
                      <td><?php echo $shuttle->name; ?></td>
                      <td><?php echo $shuttle->capacity; ?></td>
                      <td><?php echo count($shuttle->race_packs); ?></td>
                      <td><?php echo $shuttle->capacity - count($shuttle->race_packs); ?></td>
                    </tr>
                  <?php endforeach; ?>
                </table>
              </p>
              <hr>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-3 control-label"></label>
              <div class="col-sm-9 ">
                <select class="form-control" name="shuttle_bus_id" id='shuttle_id'>
                  <option value="">-----SELECT-----</option>
                  <?php foreach($shuttles as $shuttle): ?>
                    <option value="<?php echo $shuttle->id; ?>" <?php echo $shuttle->id==$race_pack->shuttle_id ? "selected" : ''; ?>><?php echo $shuttle->name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-offset-8 col-sm-4">
                <button class="btn-round-white pull-right nextBtn" type="submit" name="submit" value="submit" id='submit'>Next</button>
                <button class="btn-round-white" onclick="history.go(-1);">Back </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
<script type="text/javascript">
    $(document).ready(function(){
      if($("#check-shuttle").is(':checked') == true){
        $("#shuttle_id").attr('required','required');
        $("#shuttle_id").removeAttr('disabled');
      }else{
        $("#shuttle_id").removeAttr('required');
        $("#shuttle_id").attr('disabled', 'disabled');
        $("#shuttle_id").val('');
      }
      $("#check-shuttle").click(function(){
        if($("#check-shuttle").is(':checked') == true){
          $("#shuttle_id").attr('required','required');
          $("#shuttle_id").removeAttr('disabled');
        }else{
          $("#shuttle_id").removeAttr('required');
          $("#shuttle_id").attr('disabled', 'disabled');
          $("#shuttle_id").val('');
        }
      });
      $("#check-pack").click(function(){
        if($(this).is(':checked')==true){
          $('input').removeAttr('disabled');
          $('input:text').removeAttr('disabled');
          $('select').removeAttr('disabled');
          // $("#check-shuttle").removeAttr('disabled');
          // $('#submit').attr('type','submit');
          // $('#submit').attr('value','submit');
        }else{
          $('input:text').attr('disabled', 'disabled');
          $('select').attr('disabled', 'disabled');
          $('input:text').attr('value', '');
          // $("#check-shuttle").attr('disabled', 'disabled');
          $('select').attr('value', '');
          $('#shuttle_id').removeAttr('disabled');
          // $('#submit').removeAttr('type');
          // $('#submit').attr('value','');
          // $('button').removeAttr('value');
        }
      });
      if($("#check-pack").is(':checked')==true){
        $('input:text').removeAttr('disabled');
        $('select').removeAttr('disabled');
        // $("#check-shuttle").removeAttr('disabled');
        // $('#submit').attr('type','submit');
        // $('#submit').attr('value','submit');
      }else{
        $('input:text').attr('disabled', 'disabled');
        $('select').attr('disabled', 'disabled');
        $('input:text').attr('value', '');
        // $("#check-shuttle").attr('disabled', 'disabled');
        $('select').attr('value', '');
        $('#shuttle_id').removeAttr('disabled');
        // $('#submit').removeAttr('type');
        // $('#submit').attr('value','');
        // $('button').removeAttr('value');
      }
    });
  </script>
  <?php include "views/shared/footer.php"; ?>
</body>