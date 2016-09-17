<?php include "views/shared/header.php"; ?>
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
        <h4 class="pull-right">Pic2Gow</h4>
<img src="img/official-sponsor.png" class="img-responsive sponsor-size" alt="sponsor" />
      </div>
    </div>
  </section>

  <section class="foto-foto">
    <div class="container">
     <!--  <ul class="timeline">
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
              <a href="<?php echo 'gallery-moment/'.$gallery->gallery_year; ?>">
                <h2><?php echo $gallery->gallery_year; ?></h2>
              </a>
            </div>
          </div>
        </li>
        <?php endforeach; ?>
      </ul> -->
    </div>
  </section>
  <?php include "views/shared/footer.php"; ?>
</body>