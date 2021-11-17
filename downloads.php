<?php
session_start();
if (!isset($_SESSION['userID'])) {
    echo '<script type="text/javascript">
	alert("Please login");
    window.location = "login.php"
    </script>';
}

use Google\Cloud\Storage\StorageClient;
?>

<!DOCTYPE html>
<html lang="en">
<?php
require_once('header.php');
$projectId = 'rmit-one';

?>

<body>

    <div class="site-content">
        <?php require_once('headerMenu.php'); ?>

        <main class="main-content">
            <div class="container">
                <div class="breadcrumb">
                    <a href="home.php">Home</a>
                    <span>Downloads</span>
                </div>
                <div style="background-color:white;padding-left: 50px;padding-bottom: 20%;" style="clear:both;">
                    <div style="padding-top: 20px;">
                        <h3 style="font-family: 'Times New Roman', Times, serif;font-size: 22px;color: green;">View your downloads</h3>
                        <?php $count = 0; ?>

                        
                        <table style="border: 1px solid black;border-collapse: collapse;width: 75%">
                            <tr>
                                <th style="border: 1px solid black;border-collapse: collapse; padding: 5px;color: black;">Sl.No</th>
                                <th style="border: 1px solid black;border-collapse: collapse; padding: 5px;color: black;">Downloaded Files</th>
                            </tr>
                            <?php
                            //downloads the file to gcp bucket
                            register_stream_wrapper('rmit-one');
                            $bucketName = "weather-analysis-storage";
                            $storage = new StorageClient();
                            $bucket = $storage->bucket($bucketName);
                            

                            foreach ($bucket->objects() as $object) {
                                $count++;
                            ?>
                                <tr>

                                    <td style="border: 1px solid black;border-collapse: collapse; padding: 5px;color: black;">
                                        <?php echo $count; ?>
                                    </td>
                                    <td style="border: 1px solid black;border-collapse: collapse;padding-left: 5px;">

                                        <a href="https://storage.cloud.google.com/weather-analysis-storage/<?php echo $object->name(); ?>" style="color: blue;"><?php echo $object->name(); ?></a>
                                    </td>
                                </tr>
                            <?php

                            }
                           
                            ?>


                        </table>
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

function list_objects($bucketName)
{
    $storage = new StorageClient();
    $bucket = $storage->bucket($bucketName);
    foreach ($bucket->objects() as $object) {
        echo $object->name() . "<br>";
    }
}


//for wrapping google storage bucket
function register_stream_wrapper($projectId)
{
    $client = new StorageClient(['projectId' => 'rmit-one']);
    $client->registerStreamWrapper();
}
?>