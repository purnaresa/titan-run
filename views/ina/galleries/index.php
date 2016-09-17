<?php include "views/shared/header.php"; ?>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="background-color:#35363A;">
  <?php include "views/shared/home_navigation.php"; ?>

    <section class="title-gallery">
    <div class="container">
      <div class="col-sm-6">
        <ol class="breadcrumb pull-left">
          <li><a href="home#download">Preview</a></li>
          <li class="active">Gallery</li>
        </ol>
      </div>
      <div class="col-sm-6">
        <h4 class="pull-right">GALLERY</h4>
      </div>
    </div>
  </section>
  <div class="container">
      <div class="row-pic2go pull-right">
        <a href="pic2go" target="_blank"><img src="img/pic2go-register.png" class="img-responsive"></a>
        <a href="" data-toggle="modal" data-target="#galpic2go" ><img src="img/pic2go-gallery.png" class="img-responsive"></a>
      </div>
    </div>
  <section class="foto-foto">
    <div class="container">
      <ul class="timeline">
        <?php $index=0; ?>
        <?php foreach ($galleries as $gallery): ?>
        <?php $index++; ?>
        <li class="<?php echo ($index%2==0) ? 'timeline-inverted' : '' ?>">
          <div class="timeline-badge"></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">YEAR</h4>
            </div>
            <div class="timeline-body">
              <a href="<?php echo 'gallery-moment'.$gallery->gallery_year; ?>">
                <h2><?php echo $gallery->gallery_year; ?></h2>
              </a>
            </div>
          </div>
        </li>
        <?php endforeach; ?>
      </ul>
      
    </div>
    
  </section>
<!-- MODAL GALLERY PIC2GO --> 
<div class="modal fade" id="galpic2go" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4>PIC2GO GALLERY</h4>
      </div>
      <div class="modal-body" align="middle">
        <h3>Will be accessible on 20<sup>th</sup> Aug 2016</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <?php include "views/shared/footer.php"; ?>
</body>