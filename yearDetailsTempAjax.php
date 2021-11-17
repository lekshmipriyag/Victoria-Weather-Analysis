<?php
require __DIR__ . '/vendor/autoload.php';

use Google\Cloud\BigQuery\BigQueryClient;
use Google\Cloud\Core\ExponentialBackoff;

$projectId = 'rmit-one';
if ((isset($_POST['stationNumber']) && $_POST['stationNumber'] != "") && (isset($_POST['dataAbout']) && $_POST['dataAbout'] != "")) {
    $stationNumber = $_POST['stationNumber'];
    $dataAbout = $_POST['dataAbout'];
    $temperatureType= $_POST['temperatureType'];

    if($dataAbout == "yearbased" && $temperatureType =="maximum" ){
        $query = "Select distinct Year from `rmit-one.weather_analysis.tbl_temperature_details_minimum` where Station_Number = " . $stationNumber." order by Year DESC" ;
    }
    if($dataAbout == "yearbased" && $temperatureType =="minimum" ){
        $query = "Select distinct Year from `rmit-one.weather_analysis.tbl_temperature_details_maximum` where Station_Number = " . $stationNumber." order by Year DESC" ;
    }
    if($dataAbout == "dailybased" && $temperatureType =="maximum" ){
        $query = "Select distinct Year from `rmit-one.weather_analysis.tbl_temp_daily_min` where Bureau_of_Meteorology_station_number = " . $stationNumber." order by Year DESC" ;
    }
    if($dataAbout == "dailybased" && $temperatureType =="minimum" ){
        $query = "Select distinct Year from `rmit-one.weather_analysis.tbl_temp_daily_max` where Bureau_of_Meteorology_station_number = " . $stationNumber." order by Year DESC" ;
    }
   

    $bigQuery = new BigQueryClient([
        'projectId' => $projectId,
    ]);
    $jobConfig = $bigQuery->query($query);
    $job = $bigQuery->startQuery($jobConfig);

    $backoff = new ExponentialBackoff(10);
    $backoff->execute(function () use ($job) {
        $job->reload();
        if (!$job->isComplete()) {
            throw new Exception('Job has not yet completed', 500);
        }
    });
    $queryResults = $job->queryResults();
    
    $availableYears = array();

    foreach ($queryResults as $row) {
       array_push($availableYears,$row['Year']);
    }
   print json_encode($availableYears);
}



    