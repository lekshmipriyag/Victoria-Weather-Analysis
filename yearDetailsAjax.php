<?php
require __DIR__ . '/vendor/autoload.php';

use Google\Cloud\BigQuery\BigQueryClient;
use Google\Cloud\Core\ExponentialBackoff;

$projectId = 'rmit-one';

if ((isset($_POST['stationNumber']) && $_POST['stationNumber'] != "") && (isset($_POST['dataAbout']) && $_POST['dataAbout'] != "")) {
    $stationNumber = $_POST['stationNumber'];
    $dataAbout = $_POST['dataAbout'];

    if($dataAbout == "yearbased"){
        $query = "Select distinct Year from `rmit-one.weather_analysis.tbl_rainfall_details` where Station_Number = " . $stationNumber." order by Year DESC" ;
    }
    if($dataAbout == "dailybased"){
        $query = "Select distinct Year from `rmit-one.weather_analysis.tbl_rainfall_daily` where Station_Number = " . $stationNumber." order by Year DESC" ;
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
