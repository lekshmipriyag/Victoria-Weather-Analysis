<?php
session_start();
if (!isset($_SESSION['userID'])) {
    echo '<script type="text/javascript">
	alert("Please login");
    window.location = "login.php"
    </script>';
}

?>

<!DOCTYPE html>
<html lang="en">
<?php
require_once('header.php');
?>

<body>

    <div class="site-content">
        <?php require_once('headerMenu.php'); ?>

        <main class="main-content">
            <div class="container">
                <div class="breadcrumb">
                    <a href="home.php">Home</a>
                    <span>Reports</span>
                </div>
                <div style="background-color:white;padding-left: 50px;padding-bottom: 20%;" style="clear:both;">
                    <div style="padding-top: 20px;">
                        <h3 style="font-family: 'Times New Roman', Times, serif;font-size: 20px;color: black;text-decoration: underline;">
                            Average rainfall of last 50 years across selected stations of Victoria State
                        </h3>
                        <div>
                            <table>
                                <tr>
                                    <td>
                                        <img src="weatherImages/rainfall/rainfall.jpg" height="400" width="700">
                                    </td>
                                    <td>
                                        <button class="button" name="rainfallReport" id="rainfallReport" onClick="window.open('reports/Rainfall_Average.pdf');" style="padding-left: 5px; font-family:'Times New Roman', Times, serif;color: white;font-weight: bold;">
                                            Click here to download the report
                                        </button>
                                        <img src="weatherImages/rainfall/stationList.jpg" height="250" width="300">
                                    </td>
                                </tr>
                            </table>

                        </div>
                        <h3 style="padding-top: 15px; font-family: 'Times New Roman', Times, serif;font-size: 20px;color: black;text-decoration: underline;">
                            Average Maximum Temperature of last 50 years across selected stations of Victoria
                        </h3>
                        <div>
                            <table>
                                <tr>
                                    <td>
                                        <img src="weatherImages/rainfall/maxTemp.jpg" height="400" width="700">
                                    </td>
                                    <td>
                                        <button class="button" name="maxTempReport" id="maxTempReport" onClick="window.open('reports/Average_of_Maximum_Temperature.pdf');" style="padding-left: 5px; font-family:'Times New Roman', Times, serif;color: white;font-weight: bold;">
                                            Click here to download the report
                                        </button>
                                        <img src="weatherImages/rainfall/stationList.jpg" height="250" width="300">
                                    </td>
                                </tr>
                            </table>

                        </div>
                        <h3 style="padding-top: 15px; font-family: 'Times New Roman', Times, serif;font-size: 20px;color: black;text-decoration: underline;">
                            Average Minimum Temperature of last 50 years across selected stations of Victoria
                        </h3>
                        <div>
                            <table>
                                <tr>
                                    <td>
                                        <img src="weatherImages/rainfall/minTemp.jpg" height="400" width="700">
                                    </td>
                                    <td>
                                        <button class="button" name="minTempReport" id="minTempReport" onClick="window.open('reports/Average_of_Minimum_Temperature.pdf');" style="padding-left: 5px; font-family:'Times New Roman', Times, serif;color: white;font-weight: bold;">
                                            Click here to download the report
                                        </button>
                                        <img src="weatherImages/rainfall/stationList.jpg" height="250" width="300">
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
    </div>

    </main> <!-- .main-content -->
    <?php require_once('footer.php'); ?>
    <!-- .site-footer -->
    </div>

    <!-- API for google map-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/app.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>