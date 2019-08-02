<?PHP
$db_username="admin";

$db_password="David_Belle4";

$db_server="localhost";

$db="mike";

$connection = new mysqli($db_server,$db_username,$db_password,$db);

if ($connection->connect_error){
	die("Failed to connect: " + $connection->connect_error);
}
?>