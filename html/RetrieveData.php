<?php
   
$dbhandle = sqlite_open('db/test.db', 0666, $error);

if (!$dbhandle) die ($error);
    
$query = "SELECT Name, Sex FROM Friends";
$result = sqlite_query($dbhandle, $query);
if (!$result) die("Cannot execute query.");

$row = sqlite_fetch_array($result, SQLITE_ASSOC); 
print_r($row);
echo "<br>";

sqlite_rewind($result);
$row = sqlite_fetch_array($result, SQLITE_NUM); 
print_r($row);
echo "<br>";

sqlite_rewind($result);
$row = sqlite_fetch_array($result, SQLITE_BOTH); 
print_r($row);
echo "<br>";

sqlite_close($dbhandle);

?>
