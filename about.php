<?php
session_start();
if(!isset($_SESSION['userID'])){
	echo '<script type="text/javascript">
	alert("Please login");
    window.location = "login.php"
    </script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('header.php'); ?>

	<body>
		
		<div class="site-content">
		<?php require_once('headerMenu.php'); ?>

			<main class="main-content">
				<div class="container">
					<div class="breadcrumb">
						<a href="home.php">Home</a>
						<span>About us</span>
					</div>
				</div>
				

				<div class="fullwidth-block">
					<div class="container">
						<div class="row">
							<div class="content col-md-12">
								<div class="post">
									<h2 class="entry-title">About Us</h2>
									<div class="featured-image"><img src="weatherImages/about.jpg" alt=""></div>
									<p>Weather Analysis is a web application for analyzing past rainfall and temperature details across different stations of Victoria State. 
									We have used the Australian Government’s Bureau of Meteorology (BOM) website for getting the source information for our project. 
                                    Moreover, We have used a managed application platform called App Engine for computing and hosting. App Engine is Google Cloud's platform as a service (PaaS). With App Engine, Google handles most of the management resources. 
								   Furthermore, The Victoria state has 2313 weather stations. However, we are concentrating on 22 selected stations only. Besides, with the help of Google Map and Dark Sky API services, we can see the current weather details of selected stations. 
								   In addition, after analysis, we have generated a report based on the average of past rainfall and temperature of chosen weather stations of the state Victoria.
								</p>
								
								</div>
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
		
	</body>

</html>