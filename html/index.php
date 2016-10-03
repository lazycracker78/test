﻿<!DOCTYPE html>
<!--TheFreeElectron 2015, http://www.instructables.com/member/TheFreeElectron/ -->

<html>
    <head>
        <meta charset="utf-8" />
        <title>Raspberry Pi Gpio</title>
        
       /* <style type="text/css">
        .myImage {
			margin: auto;
			display: block;
		}
        
        </style>*/
        
    </head>
 
    <body style="background-color: black;">
    <!-- On/Off button's picture -->
	<?php
	
	include 'test.php';
	
	$val_array = array(0,0,0,0,0,0,0,0);

		system("gpio mode 25 out");
		exec ("gpio read 25", $val_array[0], $return );
		exec ("gpio read 25", $val_array[2], $return );
		system("gpio mode 7 out");
		exec ("gpio read 7", $val_array[1], $return );
		
	//for loop to read the value
	$i =0;
	for ($i = 0; $i < 3; $i++) {
		//if off
		if ($val_array[$i][0] == 0 ) {
			echo ("<img id='button_".$i."' src='data/img/red/red_".$i.".jpg' class='myImage' onclick='change_pin (".$i.");'/>");
		}
		//if on
		if ($val_array[$i][0] == 1 ) {
			echo ("<img id='button_".$i."' src='data/img/green/green_".$i.".jpg' class='myImage' onclick='change_pin (".$i.");'/>");
		}	 
	}
	echo "<br><br>";
	echo "<br>";
	echo "<CENTER><font color='white': font size= '7'> <u>SUMP PUMP STATUS:</u></font></CENTER>";
	echo "<br>";
	echo "<CENTER><font color='white': font size= '6'> ".tailCustom()."</font></CENTER>";

include 'graph.php';

	?>
	 
	<!-- javascript -->
	<script src="script.js"></script>
    </body>
</html>
