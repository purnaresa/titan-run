<?php include "modal.php"; ?>

<footer>
  <div class="container text-center">
    <div class="col-md-6 left-foot">
      <p>
        <a href="http://facebook.com/titanrunid"><img src="img/fb-ico.png" alt="fb-icon"></a>
        <a href="http://twitter.com/titanrunid"><img src="img/tweet-ico.png" alt="tw-icon"></a>
        <a href="http://instagr.am/titanrunid"><img src="img/insta-ico.png" alt="insta-icon"></a>
      </p>  
    </div>
    <div class="col-md-6 right-foot">
      <p>Copyright TITAN RUN <?php echo date('Y'); ?>. All rights reserved</p>
    </div>
  </div>
</footer>

<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 50) {
      $('#logo').addClass('shrink');
    } else {
      $('#logo').removeClass('shrink');
    }
  });
</script>

<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 50) {
      $('#logo2').addClass('shrink2');
    } else {
      $('#logo2').removeClass('shrink2');
    }
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#owl-example").owlCarousel({
      items : 3
    });
   loadFrame();
  });
</script>

<!-- Fadil Script -->
<script type="text/javascript">
  function set_year(id){
    document.getElementById("tahun_res").value=id;
	var cat_res = document.getElementById("cat_res").value;
	var year_res = document.getElementById("tahun_res").value
	$.post("race-results", {cat_res:cat_res,year_res:year_res},
      function(respon) {
		$('#race-cat').show();
        var table='';
        var table=respon.data;
        $('#data_res').html(table);
        $('#title_ab').html(respon.ttl);
      },
	'json');
  }

 function loadFrame(){
		/*$('#race-cat').hide();
			$('#data_res').html('<iframe src="https://run.id/result/titanrun2016/index.php" height="1000" width="1102" frameborder="0" scrolling="yes"></iframe>');
		$('#well-result').removeClass('well');*/
  }

  function set_cat(id){
   /* $.post("setuserdata", {
      type: 'C',  
      cat: id
    },
    function(respon) {
      $.post("race-results", '',
      function(respon) {
$('#race-cat').show();
        var table='';
        var table=respon.data;
        $('#data_res').html(table);
        $('#title_ab').html(respon.ttl);
      },'json');
    },'json');  */  
	document.getElementById("cat_res").value=id;
	var cat_res = document.getElementById("cat_res").value;
	var year_res = document.getElementById("tahun_res").value
	$.post("race-results", {cat_res:cat_res,year_res:year_res},
      function(respon) {
		$('#race-cat').show();
        var table='';
        var table=respon.data;
        $('#data_res').html(table);
        $('#title_ab').html(respon.ttl);
      },
	'json');
  }

  function show_modaldetailuser(id){
    $.post("race-result/"+id, {
      id: id
    },
    function(respon){
      var table='';
      var table=respon.data;
      $('#detailresult').html(table);
      document.getElementById("modaldetailuser_show").click();
    },'json');
  }

  // $('#country_id').change(function(){
  //   var id = $( "#country_id option:selected" ).val();
  //   $.ajax({
  //     url: "load-province",
  //     data: {
  //       country: id
  //     },
  //     method: 'POST',
  //     success: function(response){
  //       var option_province = '';
  //       var option_province = response.data;
  //       $("#load-province").html(option_province);
  //     },
  //     error: function(response){}
  //   });
  // });

  $('#province_id').change(function(){
    var id = $( "#province_id option:selected" ).val();
    $.ajax({
      url: "load-cities",
      data: {
        province: id
      },
      method: 'POST',
      dataType: 'json',
      success: function(response){
        var option_city = '';
        var option_city = response.data;
        $("#load-city").html(option_city);
      },
      error: function(response){}
    });
  });

  $('#packprovince_id').change(function(){
    var id = $( "#packprovince_id option:selected" ).val();
    $.ajax({
      url: "load-cities-pack",
      data: {
        province: id
      },
      method: 'POST',
      dataType: 'json',
      success: function(response){
        var option_city = '';
        var option_city = response.data;
        $("#load-city").html(option_city);
      },
      error: function(response){}
    });
  });

  $('#shuttle_id').change(function(){
    var id = $( "#shuttle_id option:selected" ).val();
    $.ajax({
      url: "check-shuttle",
      data: {
        shuttle: id
      },
      method: 'POST',
      dataType: 'json',
      success: function(response){
        if(response.data == false){
          alert('this shuttle has limit');
          $('#submit').attr('value', '');
          $('#submit').removeAttr('type');
        }else{
          $('#submit').attr('type','submit');
          $('#submit').attr('value','submit');
        }
      },
      error: function(response){}
    });
  });

  $('#lang-ina').click(function(){
    $.ajax({
      url: 'language',
      data: {lang: 'bahasa'},
      method: 'POST',
      dataType: 'json',
      success: function(response){
        window.location.reload();
      },error: function(response){
        window.location.reload();
      }
    })
  });

  $('#lang-eng').click(function(){
    $.ajax({
      url: 'language',
      data: {lang: 'english'},
      method: 'POST',
      dataType: 'json',
      success: function(response){
        window.location.reload();
      },error: function(response){
        window.location.reload();
      }
    })
  });
</script>
</html>