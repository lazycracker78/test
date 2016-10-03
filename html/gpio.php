<?php
//TheFreeElectron 2015, http://www.instructables.com/member/TheFreeElectron/
//This page is requested by the JavaScript, it updates the pin's status and then print it
//Getting and using values
if (isset ( $_GET["pic"] )) {
	$pic = strip_tags ($_GET["pic"]);
	$array = [25,7,25];
	
	//test if value is a number
	if ( (is_numeric($pic)) && ($pic <= 1) && ($pic >= 0) ) {
		
		//set the gpio's mode to output		
		system("gpio mode ".$array[$pic]." out");
		//reading pin's status
		exec ("gpio read ".$array[$pic], $status, $return );

		if ($status[0] == "0" ) { $status[0] = "1"; }
		else if ($status[0] == "1" ) { $status[0] = "0"; }
		
		system("gpio write ".$array[$pic]." ".$status[0] );
		//reading pin's status
		exec ("gpio read ".$array[$pic], $status, $return );
		//print it to the client on the response
		echo($status[0]);
	
	} elseif ( (is_numeric($pic)) && ($pic == 2) ) {
		//exec ("gpio read ".$array[$pic], $status, $return );
		exec ("gpio read 25", $status );
		echo($status[0]);
	}	
	else { echo ("fail"); }
} //print fail if cannot use values
else { echo ("fail"); }
?>
