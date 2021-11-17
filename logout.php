<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
if(isset($_SESSION['userID'])){
    session_destroy();
    $_SESSION['userID'] = "";
    $_SESSION['password'] = "";
    echo '<script type="text/javascript">
    window.location = "login.php"
    </script>';
}
?>