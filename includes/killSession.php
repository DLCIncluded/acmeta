<?PHP
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(session_destroy()){
	header("location: https://david-cary.com/testing/mike/");
}
?>