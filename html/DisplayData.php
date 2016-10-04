$dbhandle = sqlite_open('db/test.db', 0666, $error);

if (!$dbhandle) die ($error);
    
$query = "SELECT Name, Sex FROM Friends";
$result = sqlite_query($dbhandle, $query);
if (!$result) die("Cannot execute query.");

$rows = sqlite_num_rows($result);

$field1 = sqlite_field_name($result, 0);
$field2 = sqlite_field_name($result, 1);

echo "<table style='font-size:12;font-family:verdana'>";
echo "<thead><tr>";
echo "<th align='left'>$field1</th>";
echo "<th align='left'>$field2</th>";
echo "</tr></thead>";

for ($i = 0; $i < $rows; $i++) {
    $row = sqlite_fetch_array($result, SQLITE_NUM); 
    echo "<tr>";
    echo "<td>$row[0]</td>";
    echo "<td>$row[1]</td>";
    echo "</tr>";
}

echo "</table>";

sqlite_close($dbhandle);

?>
