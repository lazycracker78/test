<!DOCTYPE html>
<!--TheFreeElectron 2015, http://www.instructables.com/member/TheFreeElectron/ -->

<html>
<?php
//phpinfo();//good - pulls up all php info
//$dbh = new PDO('sqlite:testdb');

//$stmt = $dbh->prepare("INSERT INTO users VALUES(':user', ':pass')");
//$stmt->bindParam(':user', $user);
//$stmt->bindParam(':pass', $pass);
//$stmt->execute();




//$db = new SQLite3.php('/home/rhubarb0122/projects/test.db');
//$results = $db->query($query);
//echo 'results stored';
//while($row = $results->fetchArray()){
    //var_dump($row);echo "<br/>";
//}
//$db->close();

/**
 * Simple example of extending the SQLite3 class and changing the __construct
 * parameters, then using the open method to initialize the DB.
 */
 /*
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('/home/rhubarb0122/projects/mysqlitedb.db');
    }
}

$db = new MyDB();

$db->exec('CREATE TABLE foo (bar STRING)');
$db->exec("INSERT INTO foo (bar) VALUES ('This is a test')");

$result = $db->query('SELECT bar FROM foo');
var_dump($result->fetchArray());
*/

//echo phpversion();

//echo SQLite3::version();
//echo sqlite_libversion();

//http://zetcode.com/db/sqlitephp/
//echo sqlite_libversion();
echo 'SELECT sqlite_version() as SQLite Version';
echo "<br>";

print_r(SQLite3::version());
//$testvariable = sqlite_libversion();
//$testvariable = SQLite3::version();
//echo "<CENTER><font color='white': font size= '7'> <u>'$testvariable'</u></font></CENTER>";
//echo "$testvariable";

//class MyDB extends SQLite3
//{
//	function __construct()
//	{
//		$this->open('/home/rhubarb0122/projects/test.db');
//	}
//} 
//$db = new MyDB();

//echo $db

//if(!$db){
	//echo $db->lastErrorMsg();
//}else {
	//echo "Opened Database SUccessfully\n";
//}

?>
</html>
