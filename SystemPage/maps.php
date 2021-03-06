<!DOCTYPE html>
<html lang="en">
<head>
	<title>Health Monitoring</title>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/googlemap.js"></script>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />

	<!-- Bootstrap core CSS     -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

	<!-- Animation library for notifications   -->
	<link href="assets/css/animate.min.css" rel="stylesheet"/>

	<!--  Paper Dashboard core CSS    -->
	<link href="assets/css/paper-dashboard.css" rel="stylesheet"/>

	<!--  Fonts and icons     -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="assets/css/themify-icons.css" rel="stylesheet">

	<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>

	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<style type="text/css">
	.container {
		height: 600px;
	}
	#map {
		width: 85%;
		height: 74%;
		border: 1px solid blue;
	}
	#data, #allData {
		display: none;
	}
</style>

</head>
<body>
	<div class="wrapper">
		<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

	<div class="sidebar-wrapper">
		<div class="logo">
			<a href="http://yuyangchen.com" class="simple-text">
				Creative Yuyang Chen
			</a>
		</div>

		<ul class="nav">
			<li>
				<a href="index.php">
					<i class="ti-panel"></i>
					<p>Dashboard</p>
				</a>
			</li>
			<li>
				<a href="user.php">
					<i class="ti-user"></i>
					<p>User Profile</p>
				</a>
			</li>
			<li>
				<a href="table.php">
					<i class="ti-view-list-alt"></i>
					<p>Table List</p>
				</a>
			</li>
			<li>
				<a href="typography.php">
					<i class="ti-text"></i>
					<p>Typography</p>
				</a>
			</li>
			<li class="active">
				<a href="maps.php">
					<i class="ti-map"></i>
					<p>Maps</p>
				</a>
			</li>
		</ul>
	</div>
</div>

<div class="main-panel">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar bar1"></span>
					<span class="icon-bar bar2"></span>
					<span class="icon-bar bar3"></span>
				</button>
				<a class="navbar-brand" href="#">Maps</a>
			</div>
			<div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="ti-bell"></i>
                        <p>Login/Sign Up</p>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="login.php">Log In</a></li>
                        <li><a href="register.php">Sign Up</a></li>
                    </ul>
                </li>
                    <li>
                        <a href="index?logout='1'">
                            <i class="ti-panel"></i>
                            <p>Log Out</p>
                            <?php
                            if (isset($_GET['logout'])) {
                             session_destroy();
                             unset($_SESSION['username']);
                            }
                            ?>
                        </a>
                    </li>
                <li>
                    <a href="#">
                        <i class="ti-settings"></i>
                        <p>Settings</p>
                    </a>
                </li>
            </ul>

        </div>
		</div>
	</nav>
	<div class="container">
		<h1>Markers in Google Maps</h1>
		<?php 
		require 'education.php';
		$edu = new education;
		$coll = $edu->getCollegesBlankLatLng();
		$coll = json_encode($coll, true);
		echo '<div id="data">' . $coll . '</div>';

		$allData = $edu->getAllColleges();
		$allData = json_encode($allData, true);
		echo '<div id="allData">' . $allData . '</div>';			
		?>
		<div id="map"></div>
	</div>

	<footer class="footer">
		<div class="container-fluid">
			<nav class="pull-left">
				<ul>

					<li>
						<a href="http://yuyangchen.com/">
							Yuyang Chen
						</a>
					</li>
					<li>
						<a href="https://yuyangchen0122.github.io/Health-Monitoring/">
							Home Page
						</a>
					</li>
					<li>
						<a href="https://github.com/yuyangchen0122">
							GitHub
						</a>
					</li>
				</ul>
			</nav>
			<div class="copyright pull-right">
				&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://yuyangchen.com/">Creative Yuyang Chen</a>
			</div>
		</div>
	</footer>

</div>
</div>
</body>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCckUpe7AIg-flGozXgeD8KFUFD7gfVEmc&callback=loadMap">
</script>
<!--   Core JS Files   -->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>


<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
</html>