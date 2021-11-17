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

<?php require_once('header.php'); ?>

<body>

	<div class="site-content">
		<?php require_once('headerMenu.php'); ?>
		<div class="hero" data-bg-image="weatherImages/banner2.jpg">
			<div class="container">
				<!--<form action="#" class="find-location">
						<input type="text" placeholder="Find your location...">
						<input type="submit" value="Find">
					</form> -->

			</div>
		</div>
		<div class="forecast-table">
			<div class="container">
				<div class="forecast-container">
					<div class="today forecast">
						<div class="forecast-header">
							<div class="day" style="color: white;font-family: 'Times New Roman', Times, serif;font-size: 20px;">Weather Analysis of Past Rainfall and Temperature of the state Victoria</div>
							<div class="date">
								<?php
								date_default_timezone_set("Australia/Melbourne");
								echo date("d/m/Y") . " " . date("h:i:sa");
								?>
							</div>
						</div> <!-- .forecast-header -->

					</div>

				</div>
			</div>
		</div>

		<?php require_once('footer.php'); ?>
		<!-- .site-footer -->
	</div>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/app.js"></script>

</body>

</html>