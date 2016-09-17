<?php include "views/shared/header.php"; ?>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="background-color:#35363A;">
  <?php include "views/shared/home_navigation.php";?>
  <section class="title-gallery">
      <div class="container">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
              <h4 class="pull-right">PROFILE</h4>
          </div>
      </div>
    </section>
    <section class="profile-div">
      
      <form role="form" action="process-payment" method="post">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div>
              <div class="row profile">
                <div class="col-md-12">
                  <div class="row profile-content">
                    <div>
                      <div>
                        <div class="col-sm-12">
                          <h4>PAYMENT PREVIEW</h4>
                          <p></p>
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Product</th>
                                <th></th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Total</th>
                                <th> </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="col-sm-8 col-md-6">
                                <div class="media">
                                  <div class="media-body">
                                    <h5 class="media-heading"><a href="#">Reg. Participant</a></h5>
                                  </div>
                                </div></td>
                                <td class="col-sm-1 col-md-1" style="text-align: center">
                                <!-- <input type="email" class="form-control" id="exampleInputEmail1" value="3">
                                 --></td>
                                <td class="col-sm-1 col-md-1 text-center">IDR <strong><?php echo end($member->participants)->category->price; ?></strong></td>
                                <td class="col-sm-1 col-md-1 text-center">IDR <strong id="run_price"><?php echo end($member->participants)->category->price; ?></strong></td>
                                <td class="col-sm-1 col-md-1">
                                <!-- <button type="button" class="btn btn-danger">
                                  <span class="glyphicon glyphicon-remove"></span> Remove
                                </button> --></td>
                              </tr>
<?php if(!empty(end(end($member->participants)->race_packs))) { ?>
                              <tr id='pack'>
                                <td class="col-sm-8 col-md-6">
                                <div class="media">
                                  <div class="media-body">
                                    <h5 class="media-heading"><a href="#">Reg. Pack</a></h5>
                                  </div>
                                </div></td>
                                <td class="col-sm-1 col-md-1" style="text-align: center">
                                <!-- <input type="email" class="form-control" id="exampleInputEmail1" value="3">
                                 --></td>
                                 <?php $race_delivery = !empty(end(end($member->participants)->race_packs)) ? end(end($member->participants)->race_packs)->price : 0; ?>
                                <td class="col-sm-1 col-md-1 text-center">IDR <strong><?php echo $race_delivery; ?></strong></td>
                                <td class="col-sm-1 col-md-1 text-center">IDR <strong id="pack_price"><?php echo $race_delivery; ?></strong></td>
                                <td class="col-sm-1 col-md-1">
                                <a href="#" class="btn btn-danger" id="remove-pack" data='<?php echo !empty(end(end($member->participants)->race_packs)) ? end(end($member->participants)->race_packs)->id : 0; ?>'>
                                  <span class="glyphicon glyphicon-remove"></span> Remove
                                </a></td>
                              </tr>
<?php } else { ?>
<tr><td><strong id="pack_price" style="display:none;">0</strong></td></tr>
?>
<?php } ?>
<?php if(!empty(end(end($member->participants)->shuttles))){ ?>
                              <tr id='shuttle'>
                                <td class="col-md-6">
                                <div class="media">
                                  <div class="media-body">
                                    <h5 class="media-heading"><a href="#">Reg. Shuttle Bus</a></h5>
                                  </div>
                                </div></td>
                                <td class="col-md-1" style="text-align: center">
                                <!-- <input type="email" class="form-control" id="exampleInputEmail1" value="2">
                                 --></td>
                                 <?php 
                $shuttle_price = !empty(end(end($member->participants)->shuttles)) ? end(end($member->participants)->shuttles)->price : 0; 
                $voucher = !empty($price_voucher) ? $voucher : 0;
              ?>
                                <td class="col-md-1 text-center">IDR <strong><?php echo $shuttle_price; ?></strong></td>
                                <td class="col-md-1 text-center">IDR <strong id="shuttle_price"><?php echo $shuttle_price; ?></strong></td>
                                <td class="col-md-1">
                                <a href="#" class="btn btn-danger" id="remove-shuttle" data='<?php echo !empty(end(end($member->participants)->shuttles)) ? end(end($member->participants)->shuttles)->id : 0; ?>'>
                                  <span class="glyphicon glyphicon-remove"></span> Remove
                                </a></td>
                              </tr>
<?php } else { ?>
<tr><td><strong id="shuttle_price" style="display:none;">0</strong></td></tr>
<?php } ?>
                              <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h5>Subtotal</h5></td>
                                <td class="text-right"><h5><strong id='subtotal_price'><?php echo (end($member->participants)->category->price + $shuttle_price + $race_delivery); ?></strong></h5></td>
                              </tr>
                              <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h5>Voucher Code</h5></td>
                                <td class="text-right"><input type="text" id="voucher_code" name="voucher_code" class="form-control"></td>
                              </tr>
<tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h5>Voucher</h5></td>
                                <td class="text-right"><h5>IDR <strong id='voucher_price'>0</strong></h5></td>
                              </tr>
                              <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h3>Total</h3></td>
                                <td class="text-right">IDR <h3><strong id='total_price'><?php echo (end($member->participants)->category->price + $shuttle_price + $race_delivery) - $voucher; ?></strong></h3></td>
                              </tr>
                              <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>
                                <button type="submit" valuel="submit" name="submit" class="btn btn-success">
                                  Send Email and Change Status <span class="glyphicon glyphicon-play"></span>
                                </button></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
<script type="text/javascript">
$(document).ready(function(){
var searchRequest = null;

$(function () {
    var minlength = 3;
    var voucher_price = parseFloat($('#voucher_price').text());
    var pack_price = parseFloat($('#pack_price').text());
    var shuttle_price = parseFloat($('#shuttle_price').text());
    var run_price = parseFloat($('#run_price').text());
    var total = parseFloat($('#total_price').text());
    var disc;

    $("#voucher_code").keyup(function () {
        var that = this,
        value = $(this).val();

        if (value.length >= minlength ) {
            if (searchRequest != null) 
                searchRequest.abort();
            searchRequest = $.ajax({
                type: "POST",
                url: "check-voucher",
                data: {
                    'voucher_code' : value
                },
                dataType: "json",
                success: function(msg){
                    console.log(msg.message);
                    //we need to check if the value is the same
                    if (msg.code==$(that).val()) {
                      //Receiving the result of search here
                      if(msg.type=='persentase'){
                        disc = (pack_price + shuttle_price + run_price)*parseFloat(msg.price);
                        total = (pack_price + shuttle_price + run_price)-disc;
                        $('#total_price').text(total);
                      }else{
                        total = (pack_price + shuttle_price + run_price)-parseFloat(msg.price);
                        $('#total_price').text(total);
                      }
                    }else{
                    alert(msg.message);
                    $('#voucher_price').text(0);
                   }
                },error: function(msg){}
            });
        }
    });
    $('#remove-pack').click(function(event){
      $.ajax({
        type: "POST",
        url: "remove-pack",
        data: {
          'race_pack_id' : $('#remove-pack').attr('data')
        },
        dataType: 'json',
        success: function(msg){
          if(msg==true){
            $('#pack').remove();
            total = (0 + shuttle_price + run_price)-voucher_price;
            $('#total_price').text(total);
            $('#subtotal_price').text((0 + shuttle_price + run_price));
          }
        },
        error: function(msg){}
      });
      event.preventDefault();
    });
    $('#remove-shuttle').click(function(event){
      $.ajax({
        type: "POST",
        url: "remove-shuttle",
        data: {
          'shuttle_id' : $('#remove-shuttle').attr('data')
        },
        dataType: 'json',
        success: function(msg){
          if(msg==true){
            $('#shuttle').remove();
            total = (pack_price + 0 + run_price)-voucher_price;
            $('#total_price').text(total);
            $('#subtotal_price').text((0 + shuttle_price + run_price));
          }
        },
        error: function(msg){}
      });
       event.preventDefault();
    });
});

});
</script>
  <?php include "views/shared/footer.php"; ?>
</body>