<?php
session_start();
if (!isset($_SESSION['userID'])) {
    echo '<script type="text/javascript">
	alert("Please login");
    window.location = "login.php"
    </script>';
}

use Google\Cloud\BigQuery\BigQueryClient;
use Google\Cloud\Core\ExponentialBackoff;
use Google\Cloud\Storage\StorageClient;

?>

<!DOCTYPE html>
<html lang="en">
<?php
require_once('header.php');

$projectId = 'rmit-one';
$query = 'Select * from `rmit-one.weather_analysis.tbl_stationDetails` order by stationName ASC';

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

<body>

    <div class="site-content">
        <?php require_once('headerMenu.php'); ?>

        <main class="main-content">
            <div class="container">
                <div class="breadcrumb">
                    <a href="home.php">Home</a>
                    <span>Rainfall Across Victoria</span>
                </div>
                <div style="background-color:white;padding-left: 50px;padding-bottom: 20%;" style="clear:both;">
                    <div style="padding-top: 20px;">
                        <h3 style="font-family: 'Times New Roman', Times, serif;font-size: 22px;color: green;">You can download past rainfall data from here</h3>
                        <form method="POST" name="pastRainfall" onsubmit="return validateForm()">
                            <table style="width:50%;">
                                <tr>
                                    <td style="padding: 5px"> <label for="stationName" class="searchingLabel">Select a Weather Station </label></td>
                                    <td style="padding: 5px">
                                        <select id="selectStation" class="selectionSearch" name="selectStation" required>
                                            <option value="">Select</option>
                                            <?php
                                            foreach ($queryResults as $row) { ?>
                                                <option value="<?php echo $row['stationName']; ?>"><?php echo $row['stationName']; ?></option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px">
                                        <label for="nearestStation" class="searchingLabel">Nearest Bureau station </label>
                                    </td>
                                    <td style="padding: 5px">
                                        <input type="text" name="nearestBurStation" id="nearestBurStation" value="" class="selectionSearch" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px">
                                        <label for="stationNum" class="searchingLabel">Station Number</label>
                                    </td>
                                    <td style="padding: 5px">
                                        <input type="text" name="stationNum" id="stationNum" value="" class="selectionSearch" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px">
                                        <label for="dataType" class="searchingLabel">Select Type Of Data</label>
                                    </td>
                                    <td style="padding: 5px">
                                        <select id="dataType" name="dataType" class="selectionSearch" required>
                                            <option value="">Select</option>
                                            <option value="alldata">All Data</option>
                                            <option value="yearbased">Yearly Report</option>
                                            <option value="dailybased">Daily Report</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr id="selectYear">
                                    <td style="padding: 5px">
                                        <label for="selectYear" class="searchingLabel">Select Year</label>
                                    </td>
                                    <td style="padding: 5px">
                                        <select id="selectYears" name="selectYears" class="selectionSearch">
                                            <option value="">Select</option>

                                        </select>
                                    </td>

                                </tr>

                            </table>
                            <input type="submit" name="Download" value="DOWNLOAD DATA" class="searchButton">
                            <input type="button" name="showData" id="showData" value="SHOW DETAILS" style="background-color:#99cc00;font-family:'Times New Roman', Times, serif;color: white;font-weight: bold;">
                        </form>
                    </div>
                    <div id="tableData" style="padding-top: 20px;">
                        <h2 style="font-family: 'Times New Roman', Times, serif;font-size: 22px;color: #0059b3;" id="tableHead">Last 5 Years of Rainfall Data</h2>
                        <div id="displayTableData" style="color: black">

                        </div>
                    </div>

                </div>
            </div>

        </main> <!-- .main-content -->
        <?php require_once('footer.php'); ?>
        <!-- .site-footer -->
    </div>

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/app.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/search.js"></script>
</body>

</html>
<?php

if (isset($_POST['Download'])) {

    $stationName = isset($_POST['selectStation']) ? $_POST['selectStation'] : "";
    $stationNumber = isset($_POST['stationNum']) ? $_POST['stationNum'] : "";
    $dataType = isset($_POST['dataType']) ? $_POST['dataType'] : "";
    $selectYears = isset($_POST['selectYears']) ? $_POST['selectYears'] : "";

    if ($dataType == "alldata") {

        $fetchquery = "Select * from `rmit-one.weather_analysis.tbl_rainfall_details` where Station_Number = " . $stationNumber . "";
        $about = "-rainfall-allData";
    }
    if ($dataType == "yearbased") {
        $about = $selectYears . "-rainfall-yearlyReport";
        $fetchquery = "Select * from `rmit-one.weather_analysis.tbl_rainfall_details` where Station_Number =" . $stationNumber . " and Year = " . $selectYears;
    }

    if ($dataType == "dailybased") {
        $about =  $selectYears . "-rainfall-dailyReport";
        $fetchquery = "Select * from `rmit-one.weather_analysis.tbl_rainfall_daily` where Station_Number =" . $stationNumber . " and Year = " . $selectYears;
    }
    $jobConfigcsv = $bigQuery->query($fetchquery);
    $jobCsv = $bigQuery->startQuery($jobConfigcsv);
    $backoffCsv = new ExponentialBackoff(10);
    $backoffCsv->execute(function () use ($jobCsv) {
        $jobCsv->reload();
        if (!$jobCsv->isComplete()) {
            throw new Exception('Job has not yet completed', 500);
        }
    });
    $queryResults = $jobCsv->queryResults();

    //write csv inside downloadsHere(local) folder
    $fileActualname = "downlodsHere/" . $stationNumber . "-" . $stationName . "-" . $about;
    $fp = fopen($fileActualname . ".csv", 'w');
    $first = true;
    foreach ($queryResults as $val) {
        if ($first) {
            fputcsv($fp, array_keys($val));
            $first = false;
        }
        fputcsv($fp, $val);
    }

    //Upload the file to gcp bucket
    register_stream_wrapper('rmit-one');
    $objName = $stationNumber . "-" . $stationName . "-" . $about . ".csv";
    $handle = fopen('gs://weather-analysis-storage/' . $objName, 'w');

    $prime = true;
    foreach ($queryResults as $val) {
        if ($prime) {
            fputcsv($handle, array_keys($val));
            $prime  = false;
        }
        fputcsv($handle, $val);
    }
   
    echo '<script type="text/javascript">
    alert("Rainfall details about selected station is successfully downloaded");
    </script>';
}

?>


<?php
//for wrapping google storage bucket
function register_stream_wrapper($projectId)
{
    $client = new StorageClient(['projectId' => 'rmit-one']);
    $client->registerStreamWrapper();
}

?>
<script>
    function validateForm() {
        var year = document.forms["pastRainfall"]["selectYears"].value;
        const element = document.querySelector("#selectYear");
        if (element.classList.contains("active")) {
            if (year == "") {
                alert('Please select a year');
                return false;
            } else {
                return true;
            }
        }
    }
</script>