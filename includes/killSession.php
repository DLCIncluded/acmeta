<?PHP
include("includes/dbConn.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(session_destroy()){
	header("location: $site");
}
?>