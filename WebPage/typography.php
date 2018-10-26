<?php
$connect = mysqli_connect('softenggroup2.czmkb4udcq6o.us-east-2.rds.amazonaws.com', 'yuyangchen0122', 'a123123q45', 'HealthMonitoring');
$query = '
SELECT sensors_temperature_data, 
UNIX_TIMESTAMP(CONCAT_WS(" ", sensors_data_date, sensors_data_time)) AS datetime 
FROM tbl_sensors_data 
ORDER BY sensors_data_date DESC, sensors_data_time DESC
';
$result = mysqli_query($connect, $query);
$rows = array();
$table = array();

$table['cols'] = array(
	array(
		'label' => 'Date Time', 
		'type' => 'datetime'
	),
	array(
		'label' => 'Temperature (°C)', 
		'type' => 'number'
	)
);

while($row = mysqli_fetch_array($result))
{
	$sub_array = array();
	$datetime = explode(".", $row["datetime"]);
	$sub_array[] =  array(
		"v" => 'Date(' . $datetime[0] . '000)'
	);
	$sub_array[] =  array(
		"v" => $row["sensors_temperature_data"]
	);
	$rows[] =  array(
		"c" => $sub_array
	);
}
$table['rows'] = $rows;
$jsonTable = json_encode($table);

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Paper Dashboard by Yuyang Chen</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />


	<!-- Bootstrap core CSS     -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

	<!-- Animation library for notifications   -->
	<link href="assets/css/animate.min.css" rel="stylesheet"/>

	<!--  Paper Dashboard core CSS    -->
	<link href="assets/css/paper-dashboard.css" rel="stylesheet"/>

	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="assets/css/demo.css" rel="stylesheet" />

	<!--  Fonts and icons     -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="assets/css/themify-icons.css" rel="stylesheet">

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart()
		{
			var data = new google.visualization.DataTable(<?php echo $jsonTable; ?>);
			var options = {
				title:'Sensors Data',
				legend:{position:'bottom'},
				chartArea:{width:'95%', height:'65%'
			}
		};

		var chart = new google.visualization.LineChart(document.getElementById('line_chart'));

		chart.draw(data, options);
	}
</script>

<style>
.page-wrapper{
	width:1000px;
	margin:0 auto;
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
				<a href="dashboard.php">
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
			<li  class="active">
				<a href="typography.php">
					<i class="ti-text"></i>
					<p>Typography</p>
				</a>
			</li>
			<li>
				<a href="maps.php">
					<i class="ti-map"></i>
					<p>Maps</p>
				</a>
			</li>
			<li>
				<a href="http://healthmonitoringhomepage-env.5ndteffiz2.us-east-2.elasticbeanstalk.com/">
					<i class="ti-bell"></i>
                	<p>Home Page</p>
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
				<a class="navbar-brand" href="#">Typography</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="ti-panel"></i>
							<p>Stats</p>
						</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="ti-bell"></i>
							<p class="notification">5</p>
							<p>Notifications</p>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Notification 1</a></li>
							<li><a href="#">Notification 2</a></li>
							<li><a href="#">Notification 3</a></li>
							<li><a href="#">Notification 4</a></li>
							<li><a href="#">Another notification</a></li>
						</ul>
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


	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="header">
							<h4 class="title">Paper Dashboard Headings</h4>
							<p class="category">Created using <a href="https://www.google.com/fonts/specimen/Muli">Muli</a> Font Family</p>
						</div>
						<div class="content">
							<body>
								<div class="page-wrapper">
									<br />
									<h2 align="center">Heart Rate Garph</h2>
									<div id="line_chart" style="width: 100%; height: 500px"></div>
								</div>
							</body>
						</div>
					</div>
				</div>

			</div>
		</div>
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

<!--   Core JS Files   -->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>
