<?php 
class AdminRaceResultsController{
	public function index(){
		if(empty($_SESSION['admin'])){
			header("Location: login");
			exit;
		}
		$race_results = RaceResult::all();
		include "views/Admins/race_results/index.php";
	}

	

	public function export(){
		if(empty($_SESSION['admin'])){
			header("Location: login");
			exit;
		}

        $name="Race Results Data";
        $header_row="";
        ini_set('max_execution_time', 1600);

        $race_results = RaceResult::all();
          
        $header_row.= "Name"."\t". "Bib Number" ."\t"."Gender"."\t"."Nationality"."\t"."Chip time"."\t"."Finish time"."\t"."Year"."\t"."Category"." \t \n";

        foreach($race_results as $race_result)
        {
            $header_row.= $race_result->name."\t". $voucher->bib_number ."\t".$race_result->gender."\t".$race_result->nationality."\t".$race_result->chip_time."\t".$race_result->finish_time."\t".$race_result->year."\t".$race_result->category." \t \n";
        }

        $filename = "Export Race Results"."-".date("Y.m.d").".xls";
        header('Content-type: application/ms-excel');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        echo($header_row);
	}
}
?>