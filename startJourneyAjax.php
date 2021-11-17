<?php
require __DIR__ . '/vendor/autoload.php';

use Google\Cloud\BigQuery\BigQueryClient;
use Google\Cloud\Core\ExponentialBackoff;

$projectId = 'rmit-one';

if (isset($_POST['stationName']) && $_POST['stationName'] != "") {
    $stationName = $_POST['stationName'];
    $query = "Select * from `rmit-one.weather_analysis.tbl_All_VIC_StationsList` where Name = '" . $stationName . "'";

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
    $nearestStation = "";
    $stationNum = "";
    foreach ($queryResults as $row) {
        $stationNum = $row['Station_Number'];
        $station_latitude = $row['Latitude'];
        $station_longitude = $row['Longitude'];
    }
    echo $stationNum . " " . $station_latitude. " " .$station_longitude;
}
