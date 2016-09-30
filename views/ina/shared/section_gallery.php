<!-- Section Gallery TITAN RUN -->
<section id="download" class="text-center">
  <div class="download-section">
    <div class="container">
      <div class="col-md-6 title-about">
        <!-- <h3>TITAN RUN 2016</h3> -->
        <h2>FOTO GALERI</h2>
      </div>
      <div class="col-md-6 title-about">
       <!-- <h3>TITAN RUN 2016</h3> -->
<div class="row-pic2go-sect">
          <a href="pic2go" target="_blank"><img src="img/pic2go-register.png" class="img-responsive"></a>
          <a href="http://pic2goindonesia.com/gallery/2016/titanrun/" target="_blank"  ><img src="img/pic2go-gallery.png" class="img-responsive"></a>
         </div>
      <!-- <a href="" class="pull-right btnpic2gogall" data-toggle="modal" data-target="#galpic2go" ><img src="img/pic2go-gallery.png" class="img-responsive"></a> -->
     </div>
      <div class="col-lg-12">
        <div id="owl-example" class="owl-carousel photo-prev">
           <?php foreach($galleries as $gallery): ?>
            <div style="alignment-adjust: middle">
              <img src="<?php echo $gallery->thumbnail_location.$gallery->thumbnail; ?>" class="img-responsive" alt="<?php echo $gallery->name; ?>">
            </div>
          <?php endforeach; ?>
        </div>
        <div>
          <a href="galleries" class="btn btn-register">LIHAT SEMUA</a>
        </div>
        <br/>
        <div class="pull-right hide">
          <a href="upload_image.php" target="_blank">Upload</a>
        </div>
      </div>
    </div>
  </div>
</section>