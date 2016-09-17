<?php include "views/shared/header.php"; ?>
<style type="text/css">
  .dataTables_length{
    float: left;
    font-family: "Montserrat";
  }
  .dataTables_filter{
    font-family: "Montserrat";
  }
.sponsor-size {
    margin-top: -10px;
    max-height: 120px;
}
.sponsor-space {
    display: flex;
    padding-left: 113px;
}
.sponsor-space img.merdeka {
    height: 100px;
    width: 100px;
}
.block-merdeka-race img {
    padding-top: 70px;
}
/*sponsor edit css ini*/
h1.title-support {
    color: #f03d1d;
    font-family: "Oswald" !important;
    font-size: 25px;
    padding-top: 45px;
}

#support {
    background: #ffffff ;
    padding-bottom: 20px;
}

#support img {
/*margin-bottom: 10px;
    margin-top: 10px;
    width: 100px;*/
    width: 100%;
}
/*sampe sini*/
.block-merdeka-race-info img {
    margin-top: 200px;
    width: 100px;
}

.block-merdeka-race-schedule {
    position: absolute;
    right: -70px;
    top: 100px;
}
.block-merdeka-race-schedule img {
    width: 100px;
}

/*responsive*/
 /* Large Devices, Wide Screens */
    @media only screen and (min-width : 993px) and (max-width : 1200px) {

    }

    /* Medium Devices, Desktops */
    @media only screen and (min-width : 769px) and (max-width : 992px) {


    }

    @media only screen and (min-width : 641px) and (max-width : 768px) {
      .block-merdeka-race-schedule {
          position: relative;
          right: 0;
          top: -20px;
      }
    }

    @media only screen and (min-width : 481px) and (max-width : 640px) {
      .block-merdeka-race-schedule {
          position: relative;
          right: 0;
          top: -20px;
      }
    }

    /* Extra Small Devices, Phones */ 
    @media only screen and (min-width : 321px) and (max-width : 480px) {
      .block-merdeka-race-schedule {
          position: relative;
          right: 0;
          top: -20px;
      }

    }

    /* Custom, iPhone Retina */ 
    @media only screen and (max-width : 320px) {
      .block-merdeka-race-schedule {
          position: relative;
          right: 0;
          top: -20px;
      }

    }

	/* Pompom tambahan */
	
	@media (max-width: 767px) {
  .sponsor-space {
    display: block;
    padding-left: 0; 
    text-align: center;
  }
  .sponsor-space .merdeka{
    margin: 0 auto;
  }
}
#rcorners_d {
    border-radius: 5px;
    border: 3px solid #ffffff;
    padding: 5px; 
    width: 430px;
    font-family: 'Roboto', sans-serif;
    font-size: small;
    color: #F2F2F2;
    background-color: rgba(20, 90, 180, 0.6);
}

 #rcorners_m {
    border-radius: 5px;
    border: 2px solid #ffffff;
    padding: 5px; 
    width: 99%;
    font-family: 'Roboto', sans-serif;
    font-size: x-small;
    color: #F2F2F2;
    background-color: rgba(20, 90, 180, 0.6);
}

#pic2go h5 {
    text-transform: uppercase;
    font-family: 'Roboto', sans-serif;
    color: #ffffff;
}

a
{
    text-decoration:none;
    color: black;
}

</style>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="background-color:#35363A;">
  <?php include "views/shared/home_navigation.php"; ?>
  <section class="title-gallery">
    <div class="container">
      <div class="col-sm-6">
        <ol class="breadcrumb pull-left">
          <li><a href="home#download">Preview</a></li>
          <li class="active">Pic2Go</li>
        </ol>
      </div>
      <div class="col-sm-6">
        <!-- <h4 class="pull-right">Pic2Go</h4> -->
       <img src="img/pic2go small.png" class="img-responsive sponsor-size pull-right" alt="sponsor" />
      </div>
    </div>
  </section>

   <section id="result" class="text-center" style="margin-top:58px">
<div name="pic2go">
  <div class="vertical-align" align="center">
    <div class="container" align="center">
            <div class="row" id="pic2go" style="margin-bottom: -20px; margin-top: -20px;">
              <h5><b>Your race photos will be posted to Facebook Photo Album<br>Simply register your bib number and give permission to post.</b></h5>
            </div>
          </div>
            
          <div class="container" align="center">
            <div class="row">
              <div class="hidden-xs hidden-md">
                <iframe src="http://www.pic2go.com/f4.jsp?eventId=5314317684047872&locale=en&autoPref=1&startInfo=Enter your BIB number&myCodeText=my BIB number&height=285&width=430" height="285" width="430" frameborder="0" scrolling="no"></iframe>
              </div>
              <div class="hidden-lg hidden-xl">
                <iframe src="http://www.pic2go.com/f4.jsp?eventId=5314317684047872&locale=en&autoPref=1&startInfo=Enter your BIB number&myCodeText=my BIB number&height=330&width=305" height="330" width="305" frameborder="0" scrolling="no"></iframe>
              </div>
            </div>
          </div>
          
          <div class="container">
            <div class="row">
              <div class="text-center border hidden-xs hidden-md" id="rcorners_d">
              <font> <b>A T T E N T I O N</b><br>
              To get an accurate and clear photos, please wear your bib number in front of your body; make sure the barcode not covered with any other objects (earphone cables, clothes or plastic cover).</font>
              </div>
              <div class="text-center border hidden-lg hidden-xl" id="rcorners_m">
              <font> <b>A T T E N T I O N</b><br>
              To get an accurate and clear photos, please wear your bib number in front of your body; make sure the barcode not covered with any other objects (earphone cables, clothes or plastic cover).</font>
              </div>
                <div style="font-family: 'Roboto', sans-serif; color: #000000;font-size:small; margin-bottom:20px; margin-top:10px;">Powered by <a href="http://pic2goindonesia.com" target="_black">Pic2GoIndonesia</a></div>                
              </div>
            </div>
    </div>       
  </div>
    </section>
  <?php include "views/shared/footer.php"; ?>
</body>