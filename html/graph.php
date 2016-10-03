<?php

echo "<CENTER><font color='white': font size= '7'> <u>ready set go:</u></font></CENTER>";

/**
 * Simple example of extending the SQLite3 class and changing the __construct
 * parameters, then using the open method to initialize the DB.
 */
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('/home/rhubarb0122/projects/Ultrasonic.db');
    }
}

echo "<CENTER><font color='white': font size= '7'> <u>right befor db def</u></font></CENTER>";
$db = new MyDB();

//$db->exec('CREATE TABLE foo (bar STRING)');
//$db->exec("INSERT INTO foo (bar) VALUES ('This is a test')");

$result = $db->query('SELECT * FROM SumpLog');
var_dump($result->fetchArray());
echo "<CENTER><font color='white': font size= '7'> <u>$result</u></font></CENTER>";

//$db = sqlite_open('/Home/rhubarb0122/projects/Ultrasonic.db', 0666, $error);
//echo "<CENTER><font color='white': font size= '7'> <u>$db</u></font></CENTER>";
//$query = "SELECT * FROM SumpLog WHERE Waterlevel = '3.3'";
//$result = sqlite_query($db, $query);
//if (!$result) die("NOPE");
//echo "<CENTER><font color='white': font size= '7'> <u>$query</u></font></CENTER>";

 
?>
