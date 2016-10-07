<?php


//echo "<CENTER><font color='white': font size= '7'> <u>'$result'</u></font></CENTER>"
$dataArray=array();

   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('/Ultrasonic.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      //echo "Opened database successfully\n";
   }

   $sql =<<<EOF

      SELECT * FROM SumpLog WHERE timedate > (SELECT DATETIME("now", "-1 hour"));
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
	   $timedata=$row['timedate'];
	   $leveldata=$row['Waterlevel'];
	   
	   $dataArray[$timedata]=$leveldata;
	   
      //echo  $row['timedate'] ;
      //echo  ", " . $row['Waterlevel'] . "\n";
   }
  
   //echo "Operation done successfully\n";
         //SELECT * FROM Sumplog WHERE Waterlevel='6.0';
   $db->close();
   
   //echo $timedata;
 include ('phpgraphlib.php');
$graph=new PHPGraphLib(650,350);

$data = array(12124, 5535, 43373, 22223, 90432, 23332, 15544, 24523, 32778, 
	38878, 28787, 33243, 34832, 32302);
	
	
$graph->addData($data);
$graph->setTitle('Sump Pump Status');
$graph->setBars(false);
$graph->setLine(true);
$graph->setDataPoints(true);
$graph->createGraph();
?>

