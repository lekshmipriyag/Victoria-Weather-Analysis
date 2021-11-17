<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
use Google\Cloud\Datastore\DatastoreClient;
$projectId = 'rmit-one';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - Weather Analysis Victoria</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body style="background-color: #999999;">

    <div class="limiter">
        <div class="container-login100">
            <div class="login100-more" style="background-image: url('images/login.png');"></div>

            <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                <form class="login100-form validate-form" name="loginForm" action="" method="POST" onsubmit="return validateLogin()">
                    <span class="login100-form-title" style="color: blueviolet;font-weight: bold;font-size: 36px;">
                        Victoria Weather Analysis
                    </span>
                    <div style="padding-left: 50px;padding-top: 25px; font-size: 20px;font-family: 'Times New Roman', Times, serif;padding-bottom: 30px;font-weight: bold;align-content: center;">
                        <h2 style="padding-left: 50px"> Login Here</h2>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" id="userID" name="userID" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" id="password" name="password" required>
                        <span class="focus-input100"></span>
                    </div>


                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn"  name="login">
                                Sign In
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="js/main.js"></script>
</body>
</html>

<script>
    function validateLogin() {
        var userID = document.forms["loginForm"]["userID"].value;
        var password = document.forms["loginForm"]["password"].value;
        if (userID == "" || password == "") {
            alert("Please fill both fields");
            return false;
        }
    }
</script>

<?php
$datastore = new DatastoreClient([
    'projectId' => $projectId
]);

 /*$task = $datastore->entity('user', [
        'id' => "key(user, 's3767475')",
        'name' => "LEKSHMI PRIYA GEETHA",
        'password' => '3767475'
    ]); 
    $datastore->insert($task);
    $task = $datastore->entity('user', [
        'id' => "key(user, 's3750566')",
        'name' => "JENI GEORGE",
        'password' => '3750566'
    ]); 
   
    $datastore->insert($task);
*/
    $userID = "";
    $userPass = "";
    $userName = "";
    
    if (array_key_exists('userID', $_POST)) {
        $userID =  htmlspecialchars($_POST['userID']);
        echo "\n</pre>";
    }
    
    if (array_key_exists('password', $_POST)) {
        $userPass = htmlspecialchars($_POST['password']);
        echo "\n</pre>";
    }
    
    echo "<br>";
    $userUniqueID =  "key(user, '" . $userID . "')";
    
    $filterquery = $datastore->query()
        ->kind('user')
        ->filter('id', '=', $userUniqueID)
        ->filter('password', '=', $userPass);
    
    $data = $datastore->runQuery($filterquery);
    $fetchData = [];
    foreach ($data as $resultData) {
    
        $keyIdentifier =  $resultData->key()->pathEndIdentifier();
        $fetchData[] = $resultData['id'];
        $fetchData[] = $resultData['name'];
		$fetchData[] = $resultData['password'];
    }
    
    if (isset($_POST['login'])) {
        if (!empty($fetchData)) {
            $_SESSION['userID'] = $userID;
		    $_SESSION['password'] = $userPass;
            echo '<script type="text/javascript">
            window.location = "home.php"
            </script>';
        } else {
            echo '<script type="text/javascript">
            alert("UserID/Password is invalid");
            </script>';
        }
    }
    
?>