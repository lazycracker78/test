<!DOCTYPE HTML>
<html>
<head>

<?php
//https://github.com/robinroche/rpi-temp-logger/blob/master/display_page.php
// connect to the database server
$dbhost = 'xxxx';
$dbuser = 'xxxx';
$dbpass = 'xxxx';
$con = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$con) {   die('Could not connect: ' . mysql_error()); }
// get the last 48 entries
mysql_select_db("xxxx", $con);
// GET DATA FOR BELFORT
$sql = mysql_query('SELECT * FROM xxxx ORDER BY ind DESC LIMIT 48;');
// for each entry
while ($row = mysql_fetch_array($sql)) {
	extract($row);
	
	// converts date to the format Highcharts understands
	$datetime1 = date('Y, n, j, G, i', strtotime($time)); 
	$datetime2 = 'Date.UTC('.$datetime1.')';
	// extract data
	$data[] = "[$datetime2, $temperature]";
}
// close connection
mysql_close($con);
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
$(function () {
	var chart;
	$(document).ready(function() {
		chart = new Highcharts.Chart({
			chart: {
				renderTo: 'container',
				type: 'line',
				marginRight: 130,
				marginBottom: 50
			},
			title: {
				text: 'Office temperature',
				x: -20
			},
			subtitle: {
				text: 'Updated using RPi + DS18B20',
				x: -20
			},
			xAxis: {
				type: 'datetime',
				dateTimeLabelFormats: { 
					day: '%e %b'    
				}
			},
			yAxis: {
				title: {
					text: 'Temperature (degC)'
				}
			},
			tooltip: {
				enabled: false
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'top',
				x: -10,
				y: 100,
				borderWidth: 0
			},
			series: [{
				name: 'Measurements',
				data: [<?php echo join($data, ',') ?>]
			}]
		});
	});
	
	Highcharts.setOptions({ // This is for all plots, change Date axis to local timezone
		global : {
			timezoneOffset: 0 * 60
		}
	});
	
});
</script>

</head>

<body>

<h1>Office conditions</h1>

Blah bla blah...

</body>
</html>
