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
$query = 'Select * from `rmit-one.weather_analysis.tbl_All_VIC_StationsList` order by Name ASC';

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
                    <span>Start a Journey</span>
                </div>
                <div style="background-color:white;padding-left: 50px;padding-bottom: 20%;" style="clear:both;">
                    <div style="padding-top: 20px;">
                        <h3 style="font-family: 'Times New Roman', Times, serif;font-size: 22px;color: red;">View the current weather details of your favorite locations of Victoria State.</h3>
                        <form method="POST" name="startJourney">
                            <table style="width:80%;">
                                <tr>
                                    <td style="padding: 5px">
                                        <label for="stationName" class="searchingLabel">Select a Weather Station </label>
                                        <select id="selectStation" class="selectionSearch" name="selectStation" style="width: 350px;" required>
                                            <option value="">Select</option>
                                            <?php
                                            foreach ($queryResults as $row) { ?>
                                                <option value="<?php echo $row['Name']; ?>"><?php echo $row['Name']; ?></option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </td>
                                    <td style="padding: 5px">
                                        <label for="stationNum" class="searchingLabel">Station Number</label>
                                        <input type="text" name="stationNum" id="stationNum" value="" class="selectionSearch" readonly>
                                        <input type="hidden" name="station_latitude" id="station_latitude" value="">
                                        <input type="hidden" name="station_longitude" id="station_longitude" value="">
                                    </td>
                                    <td style="padding: 5px">
                                        <label for="stationNum" class="searchingLabel">Click here to view current weather</label>
                                        <input type="button" name="currentWeather" id="currentWeather" value="WEATHER NOW" style="background-color:green;font-family:'Times New Roman', Times, serif;color: white;font-weight: bold;">
                                        <input type="button" name="mapData" id="mapData" value="SHOW MAP" style="background-color:green;font-family:'Times New Roman', Times, serif;color: white;font-weight: bold;" onclick="initialize()">

                                    </td>
                                </tr>
                            </table>

                        </form>
                        <div id="displayWeatherData" style = "color: #0066ff;font-weight: bold; padding-top: 5px;font-family:'Times New Roman', Times, serif;font-size: 22px;"></div>

                        <div id="map" style="width:100%;height:400px;padding-top: 5px;padding-bottom: 5px;">

                        </div>
                    </div>
                </div>
            </div>

        </main> <!-- .main-content -->
        <?php require_once('footer.php'); ?>
        <!-- .site-footer -->
    </div>

    <script>
        function initialize() {
            selectStation = document.getElementById("selectStation").value;


            if (selectStation == "") {
                alert('Please select a station');
                document.getElementById("map").style.display = 'none';
            } else {
                var weatherData = document.getElementById('displayWeatherData').innerText;
                station_latitude = document.getElementById("station_latitude").value;
                station_longitude = document.getElementById("station_longitude").value;
                var latitude = parseFloat(station_latitude);
                var longitude = parseFloat(station_longitude);
                document.getElementById("map").style.display = 'block';

                var stationLocation = {
                    lat: latitude,
                    lng: longitude
                };


                // The map, centered at stationLocation
                var map = new google.maps.Map(
                    document.getElementById('map'), {
                        zoom: 10,
                        center: stationLocation,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });

                var contentString = '<div id="content">' +
                    '<div id="siteNotice">' +
                    '</div>' +
                    '<h1 id="firstHeading" class="firstHeading" style = "color:black;">Weather Now</h1>' +
                    '<div id="bodyContent">' +
                    '<h3 style = "color:black";>' + weatherData + '</h3>' +
                    '</div>' +
                    '</div>';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                // The marker, positioned at stationLocation
                var marker = new google.maps.Marker({
                    position: stationLocation,
                    map: map,
                    title: 'Victoria Weather Analysis'
                });

                marker.addListener('mouseover', function() {
                    infowindow.open(map, marker);
                });

            }
        }
    </script>

    <!-- API for google map-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/app.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/viewAllWeather.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4jaRJ5fkTPJVGPXpJ75VtU5H5-lAxFuM&sensor=false&callback=initialize"></script>

</body>

</html>