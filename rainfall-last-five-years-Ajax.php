<head>
<link rel="stylesheet" href="style.css">
</head>
<?php
require __DIR__ . '/vendor/autoload.php';

use Google\Cloud\BigQuery\BigQueryClient;
use Google\Cloud\Core\ExponentialBackoff;

$projectId = 'rmit-one';

if (isset($_POST['stationNum'])) {
    $stationNumber = $_POST['stationNum'];
        $query = "Select * from `rmit-one.weather_analysis.tbl_rainfall_details` where Station_Number = " . $stationNumber." order by Year DESC LIMIT 5" ;
   
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
    ?>
 <table style="width:80%" style="color: black;border: 1px solid black;border-collapse: collapse;">
                            <tr>
                                <th class="showTableData" style = "border: 1px solid black;border-collapse: collapse;">Years</th>
                                <th class="showTableData" style = "border: 1px solid black;border-collapse: collapse;">January</th>
                                <th class="showTableData" style = "border: 1px solid black;border-collapse: collapse;">February</th>
                                <th class="showTableData" style = "border: 1px solid black;border-collapse: collapse;">March</th>
                                <th class="showTableData" style = "border: 1px solid black;border-collapse: collapse;">April</th>
                                <th class="showTableData" style = "border: 1px solid black;border-collapse: collapse;">May</th>
                                <th class="showTableData" style = "border: 1px solid black;border-collapse: collapse;">June</th>
                                <th class="showTableData" style = "border: 1px solid black;border-collapse: collapse;">July</th>
                                <th class="showTableData" style = "border: 1px solid black;border-collapse: collapse;">August</th>
                                <th class="showTableData" style = "border: 1px solid black;border-collapse: collapse;">September</th>
                                <th class="showTableData" style = "border: 1px solid black;border-collapse: collapse;">October</th>
                                <th class="showTableData" style = "border: 1px solid black;border-collapse: collapse;">November</th>
                                <th class="showTableData" style = "border: 1px solid black;border-collapse: collapse;">December</th>
                                <th class="showTableData" style = "border: 1px solid black;border-collapse: collapse;">Annual Average</th>
                            </tr>
                            <?php
                            foreach ($queryResults as $row) { ?>
<tr>
 <td class="showTableData" style = "border: 1px solid black;border-collapse: collapse;"><?php echo $row['Year'];?></td>
 <td class="showTableData" style = "border: 1px solid black;border-collapse: collapse;"><?php echo $row['Jan'];?></td>
 <td class="showTableData" style = "border: 1px solid black;border-collapse: collapse;"><?php echo $row['Feb'];?></td>
 <td class="showTableData" style = "border: 1px solid black;border-collapse: collapse;"><?php echo $row['Mar'];?></td>
 <td class="showTableData" style = "border: 1px solid black;border-collapse: collapse;"><?php echo $row['Apr'];?></td>
 <td class="showTableData" style = "border: 1px solid black;border-collapse: collapse;"><?php echo $row['May'];?></td>
 <td class="showTableData" style = "border: 1px solid black;border-collapse: collapse;"><?php echo $row['Jun'];?></td>
 <td class="showTableData" style = "border: 1px solid black;border-collapse: collapse;"><?php echo $row['Jul'];?></td>
 <td class="showTableData" style = "border: 1px solid black;border-collapse: collapse;"><?php echo $row['Aug'];?></td>
 <td class="showTableData" style = "border: 1px solid black;border-collapse: collapse;"><?php echo $row['Sep'];?></td>
 <td class="showTableData" style = "border: 1px solid black;border-collapse: collapse;"><?php echo $row['Oct'];?></td>
 <td class="showTableData" style = "border: 1px solid black;border-collapse: collapse;"><?php echo $row['Nov'];?></td>
 <td class="showTableData" style = "border: 1px solid black;border-collapse: collapse;"><?php echo $row['Dec'];?></td>
 <td class="showTableData" style = "border: 1px solid black;border-collapse: collapse;"><?php echo $row['Annual'];?></td>
</tr>
<?php } ?>
 </table>
<?php } ?>
