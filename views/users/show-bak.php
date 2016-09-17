<?php include "views/shared/header.php"; ?>
<body>
  <?php include "views/shared/home_navigation.php";?>
  <section class="title-gallery">
    <div class="container">
      <div class="col-sm-6">
        <ol class="breadcrumb pull-left">
          <li><a href="home">Home</a></li>
          <li class="active">Profile</li>
        </ol>
      </div>
      <div class="col-sm-6">
        <h4 class="pull-right">PROFILE</h4>
      </div>
    </div>
  </section>
  <section class="profile-div">
    <div class="container">
      <div class="row profile">
        <div class="col-md-3">
          <div class="profile-sidebar">
            <!-- SIDEBAR USERPIC -->
            <div class="profile-userpic">
              <img src="<?php echo $user->avatar; ?>" class="img-responsive" alt="jpg">
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
              <div class="profile-usertitle-name"><?php echo $user->first_name.' '.$user->last_name; ?></div>
              <div class="profile-usertitle-job">Runner</div>
            </div>
            <div class="profile-usermenu">
              <ul class="nav">
                <li class="active">
                  <a href="#"><i class="glyphicon glyphicon-home"></i>Overview </a>
                </li>
                <li><a href="setting"><i class="glyphicon glyphicon-user"></i>Account Settings </a></li>
                <?php if($register->register_open): ?>
                  <?php if(!empty(end($user->participants))) { ?> 
                    <?php if(empty(end(end($user->participants)->payments))): ?>
                    <?php if(!end($user->participants)->status): ?>
                      <li><a href="edit-participant<?php echo end($user->participants)->id; ?>" ><i class="glyphicon glyphicon-user"></i>Edit participant </a></li>
                      <?php if(!empty(end($participant->race_packs))): ?>
                        <?php if(!empty(end(end($user->participants)->race_packs))): ?>
                          <li><a href="edit-race-pack<?php echo end(end($user->participants)->race_packs)->id?>" ><i class="glyphicon glyphicon-ok">
                          </i>Race Pack and Shuttle Bus</a></li>
                        <?php endif; ?>
                      <?php endif;?>
                    <?php endif; ?>
                    <?php endif; ?>
                  <?php } ?>
                <?php endif; ?>
<?php if(empty(end($user->participants))): ?> 
                <li><a href="participant-register" ><i class="glyphicon glyphicon-ok"></i>Register Event 2016 </a></li>
<?php endif; ?>
                <li><a href="add-races" ><i class="glyphicon glyphicon-ok"></i>Histories Race </a></li>
                <!-- <li><a href="payment-list" ><i class="glyphicon glyphicon-ok"></i>Payment List</a></li> -->
                <li><a href="logout"><i class="fa fa-sign-out"></i>Logout </a></li>
              </ul>
            </div>
            <!-- END MENU -->
          </div>
        </div>
        <div class="col-md-9">
          <div class="profile-content">
            <h2>OVERVIEW</h2>
            <p>
              <select class="form-control" name="run_category" id="run_category">
                <option value="">-----SELECT-----</option>
                <?php foreach($categories as $category): ?>
                  <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                <?php endforeach; ?>
              </select>
            </p>
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            <div class="profile-view">
              <div class="panel-body">
                <div class="row">
                  <div class="col-sm-6 nopaddingleft"> 
                    <div class="well">
                      <h2>USER INFORMATION</h2>
                      <table class="table table-user-information">
                        <tbody>
                          <tr>
                            <td>Email</td>
                            <td><?php echo $user->email; ?></td>
                          </tr>
                          <tr>
                            <td>Date of Birth</td>
                            <td><?php echo date_format($user->dob,'d M Y'); ?></td>
                          </tr>
                          <tr>
                            <td>Gender</td>
                            <td><?php echo $user->gender; ?></td>
                          </tr>
                          <tr>
                            <td>Organization</td>
                            <td><?php echo $user->titan_company; ?></td>
                          </tr>
                          <tr>
                            <td>City</td>
                            <td><?php echo $user->city->name; ?></td>
                          </tr>
                          <tr>
                            <td>Phone</td>
                            <td><?php echo $user->phone; ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-sm-6 nopaddingright"> 
                    <div class="well">
                      <h2>RACEPACK DETAILS</h2>
                      <div class="panel with-nav-tabs row custom-tabs">
                        <div class="panel-heading custom-tabs-head">
                          <ul class="nav nav-tabs custom-tabs-nav">
                            <li class="active"><a href="#tab1default" data-toggle="tab">DELIVERY</a></li>
                            <li><a href="#tab2default" data-toggle="tab">SHUTTLE</a></li>
                            <li><a href="#tab3default" data-toggle="tab">PAYMENT</a></li>
                          </ul>
                        </div>
                        <div class="panel-body custom-tabs-body">
                          <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1default">
                              <table class="table table-user-information customspace">
                                <tbody>
                                  <?php if(!empty(end($participant->race_packs))){ ?>
                                  <tr>
                                    <td>Alamat Lengkap:</td>
                                    <td><?php echo end($participant->race_packs)->address; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Kota:</td>
                                    <td><?php echo end($participant->race_packs)->city->name; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Provinsi</td>
                                    <td><?php echo end($participant->race_packs)->province->name; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Kode Pos</td>
                                    <td><?php echo end($participant->race_packs)->postal_code; ?></td>
                                  </tr>
                                  <tr>
                                    <td>No. Telepon</td>
                                    <td><?php echo end($participant->race_packs)->phone; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Airwaybill / no. resi</td>
                                    <td class="airway-bill">-</td>
                                  </tr>
                                  <?php } else { ?>
                                  <tr>
                                    <td>not found</td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                            <div class="tab-pane fade" id="tab2default">
                              <?php if(!empty(end($participant->race_packs))){ ?>
                                <h4 class="minititle">Bus Shuttle</h4>
                                <p class="customtext2"><?php echo end($participant->race_packs)->shuttle->name; ?></p>
                                <?php } else { ?>
                                  <h4 class="minititle">Not found</h4>
                                  <?php } ?>
                                </div>
                                <div class="tab-pane fade" id="tab3default">
                                  <h4 class="minititle">Status</h4>
                                  <?php if(!empty(end($user->participants))){ ?> 
                                    <p class="customtext2"><?php echo !empty(end(end($user->participants)->payments)) ? 'paid' : 'not yet'; ?></p>
                                  <?php }else{ ?>
                                    <p class="customtext2">not yet</p>
                                  <?php } ?>
                                  <?php if(!empty(end($user->participants))): ?> 
                                    <?php if(!empty(end(end($user->participants)->payments))): ?>
                                      <h4 class="minititle">Date</h4>
                                      <p class="customtext2"><?php echo date_format(end(end($user->participants)->payments)->create_at, 'd/m/y'); ?></p>
                                    <?php endif; ?>
                                  <?php endif; ?>
                                <!-- <p class="customtext2">DONE</p>
                                <h4 class="minititle">Transfer from</h4>
                                <p class="customtext2">0987587646736647637 <small>/ Steve Koswara</small></p>
                                <h4 class="minititle">Transfer to</h4>
                                <p class="customtext2">0928663567283766352 <small>/ TITANRUN 2016</small></p>
                                <h4 class="minititle">Date</h4>
                                <p class="customtext2">12-02-2016</p> -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="modal fade" id="modalParticipant" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" align="center">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;
          </span><span class="sr-only">Close</span></button>
        </div>
        <div class="name-list">
          <h4>Please register participants to join race</h4>
          <a href="participant-register" class="btn btn-register">Join Here</a>
        </div>
      </div>
    </div>
  </div>
  <?php include "views/shared/footer.php"; ?>
  <?php if(!empty(end($user->race_events))): ?>
          <script type="text/javascript">
        $(function () {
          $('#container').highcharts({
            title: {
              text: 'Latest Run History',
            x: -20 //center
          },
          subtitle: {
            text: '<?php echo $user->first_name.' '.$user->last_name; ?>',
            x: -20
          },
          xAxis: {
            type: 'datetime',
              categories: [<?php echo implode(',',$year); ?>],
              dateTimeLabelFormats : {
               year: '%Y'
              },
              title : { text: 'Year' }
          },
          yAxis: {
            type: 'datetime',
              title: {
                text: 'Time Reached (min)'
              },
              dateTimeLabelFormats : {
               second: '%H:%M:%S'
              },
            plotLines: [{
              value: 0,
              width: 0,
              color: '#808080'
            }]
          },
          tooltip: {
            formatter: function() {
                return  '<b>' + this.series.name +'</b><br/>' +
                    Highcharts.dateFormat('%H : %M : %S',
                                          new Date(this.y));
            }
},
          legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
          },
          series: <?php echo $results; ?>
        });

        $('#run_category').change(function(){
          if($( "select option:selected" ).val()==""){
            $('#container').highcharts({
              title: {
                text: 'Latest Run History',
            x: -20 //center
          },
          subtitle: {
            text: '<?php echo $user->first_name.' '.$user->last_name; ?>',
            x: -20
          },
           xAxis: {
              type: 'datetime',
              categories: [<?php echo implode(',',$year); ?>],
              dateTimeLabelFormats : {
               year: '%Y'
              },
              title : { text: 'Year' }
            },
          yAxis: {
type: 'datetime',
              title: {
                text: 'Time Reached (min)'
              },
              dateTimeLabelFormats : {
               second: '%H:%M:%S'
              },
            plotLines: [{
              value: 0,
              width: 1,
              color: '#808080'
            }]
          },
          tooltip: {
            formatter: function() {
                return  '<b>' + this.series.name +'</b><br/>' +
                    Highcharts.dateFormat('%H : %M : %S',
                                          new Date(this.y));
            }
},
          legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
          },
          series: <?php echo $results; ?>
        });
          }else{
            $.ajax({
              url: 'load-charts',
              data: {category: $( "select option:selected" ).val()},
              method: 'POST',
              dataType: 'json',
              success: function(response){
                var year= response.year;
                var timer = response.results;
var seriesOneData = [];
var seriestimer = [];
jQuery.each(timer, function(i, val) {
  seriesOneData.push([{"name":val.name, "data" : jQuery.each(val.data, function(){ 
  seriestimer.push((new Date(this)).toLocaleFormat('%T'));
  }) }]);
});
                $('#container').highcharts({
                  title: {
                    text: 'Latest Run History',
                x: -20 //center
            },
            subtitle: {
              text: '<?php echo $user->first_name.' '.$user->last_name; ?>',
              x: -20
            },
            xAxis: {
              type: 'datetime',
              categories: year,
              dateTimeLabelFormats : {
               year: '%Y'
              },
              title : { text: 'Year' }
            },
            yAxis: {
              type: 'datetime',
              title: {
                text: 'Time Reached (min)'
              },
              dateTimeLabelFormats : {
               second: '%H:%M:%S'
              },
              plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
              }]
            },
            tooltip: {
            formatter: function() {
                return  '<b>' + this.series.name +'</b><br/>' +
                    Highcharts.dateFormat('%H : %M : %S',
                                          new Date(this.y));
            }
        },
            legend: {
              layout: 'vertical',
              align: 'right',
              verticalAlign: 'middle',
              borderWidth: 0
            },
            series: timer
          });
              },
              error: function(){}
            });
          }
        });
      });
          /**
           * Dark theme for Highcharts JS
           * @author Torstein Honsi
           */

          // Load the fonts
          Highcharts.createElement('link', {
            href: '//fonts.googleapis.com/css?family=Unica+One',
            rel: 'stylesheet',
            type: 'text/css'
          }, null, document.getElementsByTagName('head')[0]);

          Highcharts.theme = {
            colors: ["#90ee7e","#2b908f", "#f45b5b", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
            "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
            chart: {
              backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
                stops: [
                [0, '#2a2a2b'],
                [1, '#3e3e40']
                ]
              },
              style: {
                fontFamily: "'Unica One', sans-serif"
              },
              plotBorderColor: '#606063'
            },
            title: {
              style: {
               color: '#E0E0E3',
               textTransform: 'uppercase',
               fontSize: '20px'
             }
           },
           subtitle: {
            style: {
             color: '#E0E0E3',
             textTransform: 'uppercase'
           }
         },
         xAxis: {
          gridLineColor: '#707073',
          labels: {
           style: {
            color: '#E0E0E3'
          }
        },
        lineColor: '#707073',
        minorGridLineColor: '#505053',
        tickColor: '#707073',
        title: {
         style: {
          color: '#A0A0A3'

        }
      }
      },
      yAxis: {
        gridLineColor: '#707073',
        labels: {
         style: {
          color: '#E0E0E3'
        }
      },
        // lineColor: '#707073',
        minorGridLineColor: '#505053',
        tickColor: '#707073',
        tickWidth: 1,
        title: {
         style: {
          color: '#A0A0A3'
        }
      }
      },
      tooltip: {
        backgroundColor: 'rgba(0, 0, 0, 0.85)',
        style: {
         color: '#F0F0F0'
       }
      },
      plotOptions: {
        series: {
         dataLabels: {
          color: '#B0B0B3'
        },
        marker: {
          lineColor: '#333'
        }
      },
      boxplot: {
       fillColor: '#505053'
      },
      candlestick: {
       lineColor: 'white'
      },
      errorbar: {
       color: 'white'
      }
      },
      legend: {
        itemStyle: {
         color: '#E0E0E3'
       },
       itemHoverStyle: {
         color: '#FFF'
       },
       itemHiddenStyle: {
         color: '#606063'
       }
      },
      credits: {
        style: {
         color: '#666'
       }
      },
      labels: {
        style: {
         color: '#707073'
       }
      },

      drilldown: {
        activeAxisLabelStyle: {
         color: '#F0F0F3'
       },
       activeDataLabelStyle: {
         color: '#F0F0F3'
       }
      },

      navigation: {
        buttonOptions: {
         symbolStroke: '#DDDDDD',
         theme: {
          fill: '#505053'
        }
      }
      },

       // scroll charts
       rangeSelector: {
        buttonTheme: {
         fill: '#505053',
         stroke: '#000000',
         style: {
          color: '#CCC'
        },
        states: {
          hover: {
           fill: '#707073',
           stroke: '#000000',
           style: {
            color: 'white'
          }
        },
        select: {
         fill: '#000003',
         stroke: '#000000',
         style: {
          color: 'white'
        }
      }
    }
  },
  inputBoxBorderColor: '#505053',
  inputStyle: {
   backgroundColor: '#333',
   color: 'silver'
 },
 labelStyle: {
   color: 'silver'
 }
},

navigator: {
  handles: {
   backgroundColor: '#666',
   borderColor: '#AAA'
 },
 outlineColor: '#CCC',
 maskFill: 'rgba(255,255,255,0.1)',
 series: {
   color: '#7798BF',
   lineColor: '#A6C7ED'
 },
 xAxis: {
   gridLineColor: '#505053'
 }
},

scrollbar: {
  barBackgroundColor: '#808083',
  barBorderColor: '#808083',
  buttonArrowColor: '#CCC',
  buttonBackgroundColor: '#606063',
  buttonBorderColor: '#606063',
  rifleColor: '#FFF',
  trackBackgroundColor: '#404043',
  trackBorderColor: '#404043'
},

       // special colors for some of the
       legendBackgroundColor: 'rgba(0, 0, 0, 0.5)',
       background2: '#505053',
       dataLabelsColor: '#B0B0B3',
       textColor: '#C0C0C0',
       contrastTextColor: '#F0F0F3',
       maskColor: 'rgba(255,255,255,0.3)'
     };

    // Apply the theme
    Highcharts.setOptions(Highcharts.theme);
  </script>
  <?php endif; ?>

  <?php if(empty(end($user->participants))): ?>
    <?php if(empty(end($user->participants)->payments)): ?>
    <script>
      $(document).ready(function () {
        $('#modalParticipant').modal('show');
      });
    </script>
    <?php endif; ?>
  <?php endif; ?>
</body>