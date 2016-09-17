<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TITANRUN 2016</title>
  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
  <link rel="icon" href="img/favicon.png" type="image/x-icon">

  <!-- Custom CSS -->
  <?php if(!empty($_SESSION['lang'])){ ?>
    <link href="css/ina-grayscale.css" rel="stylesheet">
  <?php } else { ?>
    <link href="css/grayscale.css" rel="stylesheet">
  <?php } ?>
  <link href="js/dataTables.bootstrap.css" rel="stylesheet">
  <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <link href="css/jquery.timepicker.css" rel="stylesheet">
  
  <!-- Custom Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/owl.theme.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

  <!-- <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
	
   <style type="text/css">
   		#mydiv {
			position: fixed;
			width: 100%;
			height: 100%;
			left: 0;
			top: 0;
			background: rgba(51,51,51,0.7);
			z-index: 10;
		  
		}
		.ajax-loader {
		  position: absolute;
		  left: 0;
		  top: 0;
		  right: 0;
		  bottom: 0;
		  margin: auto; /* presto! */
		}
   </style> 
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-75225753-1', 'auto');
    ga('send', 'pageview');
  </script>

  <!-- jQuery -->
  <script src="js/jquery.js"></script>
  <script src="js/grayscale.js"></script>
  <script src="js/moment.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
<script src="js/combodate.js"></script>
  <script src="js/owl.carousel.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-datetimepicker.js"></script>
  <script src="js/table-filter.js"></script>

  <!-- Plugin JavaScript -->
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/parallax-bg.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap.js"></script>
  
  <!-- Custom Theme JavaScript -->
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/highcharts.js"></script>
  <script src="js/exporting.js"></script>
  <script type="text/javascript">
    $(document).ajaxSend(function(event, request, settings) {
    	$('#mydiv').show();
	});
	
	$(document).ajaxComplete(function(event, request, settings) {
		$('#mydiv').hide();
	});
	function isNumber(evt) {
      evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
      }
      return true;
    }
  </script>
</head>

<div id="mydiv" style="display:none">
	<img src="<?php echo "uploads/ajax-loader1.gif"?>" class="ajax-loader" id="loading-indicator" width="100px" height="100px"/>
</div>