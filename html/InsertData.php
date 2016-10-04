<?php
   
$dbhandle = sqlite_open('db/test.db', 0666, $error);

if (!$dbhandle) die ($error);
    
$stm1 = "INSERT INTO Friends VALUES(1,'Jane', 'F')";
$stm2 = "INSERT INTO Friends VALUES(2,'Thomas', 'M')";
$stm3 = "INSERT INTO Friends VALUES(3,'Franklin', 'M')";

$ok1 = sqlite_exec($dbhandle, $stm1);
if (!$ok1) die("Cannot execute statement.");

$ok2 = sqlite_exec($dbhandle, $stm2);
if (!$ok2) die("Cannot execute statement.");

$ok3 = sqlite_exec($dbhandle, $stm3);
if (!$ok3) die("Cannot execute statement.");

echo "Data inserted successfully";

sqlite_close($dbhandle);

?>
