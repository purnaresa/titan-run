<!-- English --> 
<section id="result" class="text-center">
  <div class="container">
    <div class="col-md-6">
      <div class="title-about">
        <h3 id="title_ab">TITAN RUN 2016</h3>
        <h2>HASIL PERLOMBAAN</h2>
      </div>
    </div>

    <div class="col-md-6">
      <div class="col-xs-6" align="right">
        <img src="img/logoshape.png" class="img-responsive" alt="logoshape">
      </div>
      <div class="col-xs-6 periods">
        <h3>PERLOMBAAN</h3>
        <ul class="nav nav-tabs" role="tablist">
<!--          <li role="presentation" style="cursor:pointer" class="active" onClick="set_year('2016')"><a role="tab" data-toggle="tab">2016</a></li> -->
<li role="presentation" style="cursor:pointer" class="active"  onClick="loadFrame();"><a role="tab" data-toggle="tab">2016</a></li>

<li role="presentation" style="cursor:pointer"  onClick="set_year('2015')"><a role="tab" data-toggle="tab">2015</a></li>
<!-- <li role="presentation" style="cursor:pointer" onClick="loadFrame();"><a role="tab" data-toggle="tab">2015</a></li> -->

        </ul>
      </div>
    </div>

    <div class="clearfix"></div>
  
    <div class="tab-result">
      <!-- Nav tabs -->
      <div class="col-md-6" id='race-cat'>
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" style="cursor:pointer" onClick="set_cat('5K')"><a role="tab" data-toggle="tab">5K</a></li>
          <li role="presentation" style="cursor:pointer" onClick="set_cat('10K')"><a role="tab" data-toggle="tab">10K</a></li>
          <li role="presentation" style="cursor:pointer" onClick="set_cat('17.8K')" class="active"><a role="tab" 
        data-toggle="tab">17.8K</a></li>
        </ul>
      </div>
    <div class="col-md-6">
      <form action="#" method="get">
        <div class="input-group"></div>
      </form>
    </div>

    <div class="clearfix"></div>
    <!-- Tab panes -->
    <div class="tab-content" align="middle">
      <div class="well" id='well-result'>
        <div hidden="hidden">
          <a href="" id="modaldetailuser_show" data-toggle="modal" data-target="#modaldetailuser">click </a>
        </div>
        <div id="data_res" class="table-responsive">
          <script type="text/javascript">
            $(function() {
              $('#example').dataTable( {
                "bPaginate": true,
                "bFilter": true,
                "bInfo": false
              });
            });

            $('#example tr').click(function() {
              var href = $(this).find("a").attr("href");
              if(href) {
                window.location = href;
              }
            });
          </script>
          <table id="example" class="table table-list-search">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>BiB Number</th>
                <th>Gender</th>
                <th>Nationality</th>
                <th>Chip Time</th>
                <th>Finish Time</th>
              </tr>
            </thead>
            <tbody>
              <?php $index=1; ?>
              <?php foreach($race_results as $result): ?>
                
                <tr>
                  <td><?php echo $index++; ?></td>
                  <td>
                  <a onclick="show_modaldetailuser('<?php echo $result->id; ?>');">
                  <?php echo $result->name; ?></a>
                  </td>
                  <td><?php echo $result->bib_number; ?></td>
                  <td><?php echo $result->gender; ?></td>
                  <td><?php echo $result->nationality; ?></td>
                  <td><?php echo $result->chip_time; ?> </td>
                  <td><?php echo $result->finish_time; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>