<?php
  include("models/RaceResult.php");
  include("models/RaceEvent.php");

class RaceResultsController {
  public $year;
  public $cat;

  public function __construct(){
    $this->year = !empty($_SESSION["year"]) ? $_SESSION["year"] : '2016';
    $this->cat = !empty($_SESSION["category"]) ? $_SESSION["category"] : '17.8K';
  }

  public function index(){
  $year = $_SESSION["year"];

  $cat = $_SESSION["category"];
    $race_conditions = array(
    'conditions'  => array('year like ? and category like ?','%'.$year.'%', '%'.$cat.'%'),
    'from'  => 'race_results',
    'order' => 'finish_time asc');
    $race_results = RaceResult::all($race_conditions);
    $table='';
    $index=0;
    $table.='
      <script type="text/javascript">
        $(function() {
          $(\'#example\').dataTable( {
            "bPaginate": true,
            "bFilter": true,
            "bInfo": false
          } );
        });

        $(\'#example tr\').click(function() {
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
        <tbody>';
        foreach($race_results as $result){
          $index++;
          $table.='
          <tr>
            <td> '.$index.' </td>
            <td>
              <a onclick="show_modaldetailuser(\''.$result->id.'\');">'.$result->name.' </a>
            </td>
            <td> '.$result->bib_number.' </td>
            <td> '.$result->gender.'</td>
            <td> '.$result->nationality.' </td>
            <td> '.$result->chip_time.' </td>
            <td> '.$result->finish_time.' </td>
          </tr>';
        }
        $table.='</tbody></table>';
        echo json_encode(array('data' => $table,'ttl'=>'TITAN RUN '.$year));
      }

    public function show($id){
      $race_result = RaceResult::find($id);
      $table='';
      $table.='
        <div class="title-about col-md-6">
        <h3>TITAN RUN '.$race_result->year.'</h3>
        <h2>RACE RESULTS</h2>
        <h4>CATEGORY '.$race_result->category.'</h4>
        </div>
        <div class="col-md-6">
        <img src="img/LOGO-TITAN.png" style="float:right;height: auto;width: 14%;margin-right: 5%;" class="img-responsive" alt="logotitan">
        </div>
        <div style="text-align:center">
        <h1 style="margin-right: 18%;margin-left: 18%;">'.$race_result->finish_time.'</h1>
        </div>
        <div class="name-list">
        <img src="img/logotitan.png" style="float:left;" class="img-responsive">
        <h4>'.$race_result->name.'</h4>
        </div>';
      echo json_encode(array('data' => $table,'ttl'=>'TITAN RUN '.$year));
    }

public function removeEvent($id){
  $race_event = RaceEvent::find_by_id($id);
  if($race_event){
   if($race_event->delete()){
    header("Location: add-races");
    exit;
   }
  }
}

    public function addRaces(){
      $begin = new DateTime( '2014-05-01' );
      $end = new DateTime( date('Y-m-d') );

      $interval = DateInterval::createFromDateString('1 year');
      $period = new DatePeriod($begin, $interval, $end);
$master_events = MasterEvent::all();

      $categories = Category::all();
	  
$race_events = RaceEvent::all();
      $member = Member::find($_SESSION['user']['id']);

      if(isset($_POST['submit'])){
        $timer = $_POST['datetime'];
        $year = $_POST['year'];
        $category = $_POST['category'];
        $member_id = $member->id;
        $name = $_POST['name'];

        $attributed = array(
          'year'=>$year,
          'timer'=>$timer,
          'category_id'=>$category,
          'member_id'=>$member_id,
          'name'=>$name
        );

        $race = new RaceEvent($attributed);
        if($race->save()){
          $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; update success</div>";
		  header("Location: add-races");
        }else{
          $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; error</div>";
          header("Location: profile");
          exit;
        }
      }
	  
      $user = $_SESSION['user'];

	  $conditions2 = array(
    	'conditions'  => array('member_id = ? ',$user['id']),
    	'order' => 'name,category_id,year'); 
		
	  
	  $race_events2 = RaceEvent::all($conditions2);
      $member = Member::find($_SESSION['user']['id']);

      if(isset($_POST['submit'])){
        $timer = $_POST['datetime'];
        $year = $_POST['year'];
        $category = $_POST['category'];
        $member_id = $member->id;
        $name = $_POST['name'];

        $attributed = array(
          'year'=>$year,
          'timer'=>$timer,
          'category_id'=>$category,
          'member_id'=>$member_id,
          'name'=>$name
        );

        $race = new RaceEvent($attributed);
        if($race->save()){
          $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; update success</div>";
        }else{
          $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; error</div>";
          header("Location: profile");
          exit;
        }
      }
	  
      include "views/race_results/add_races.php";
    }

    public function loadCharts(){
      $user = $_SESSION['user'];
      
      $year=array();
      
      $data = array();
      $temparray = array();

      //$eventrace = RaceEvent::find_all_by_member_id_and_category_id($user['id'], $_POST['category']);

$conditions = array(
    'conditions'  => array('x.member_id = ? and x.year <= (select max(year) from race_eventvs where category_id=\''.$_POST['category'].'\' and member_id=\''.$user['id'].'\') and x.category_id = ? ',$user['id'],$_POST['category']),
		'select' =>'x.member_id,x.year,x.name,x.category_id,y.conv ',
		'from' => ' (select b.year,a.name,a.category_id,a.member_id from race_eventvs a cross join (select year from race_eventvs group by year)b group by b.year,a.name,a.category_id,a.member_id) x left join race_eventvs y on x.name=y.name and x.year=y.year and x.category_id=y.category_id and x.member_id=y.member_id',
    	'order' => 'x.name,x.category_id,x.year'); 		
$i=1;
$eventrace = RaceEventv::all($conditions);
     if($eventrace){
        foreach ($eventrace as $race) :
          $temp = explode(",", $race->year);
          $tempname = explode(",", $race->name);
          $date = $temp[0];
          $name = $tempname[0];
		  $data[$date] = $race->conv;	 
		  $temparray[$name] = array('name'=>$name, 'data'=>array_values($data));
		  array_push($year, $date);
		  
        endforeach;
	  }
      echo json_encode(array('year' => $year, 'results'=>array_values($temparray)));
    }
  }
?>