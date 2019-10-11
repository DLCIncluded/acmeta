<?PHP
	include("utils.php");
	if($loggedIn=="false"){
?>	
<div class="login-form">

	<form action="includes/accountManager.php" method="POST">
	<p>Please login:</p>
	<input type="text" name="username" id ="username" placeholder="Username" /><br/>
	<input type="password" name="password" id ="password" placeholder="Password" /><br/>
	<input type="hidden" name="login" value="true" />
	<input type="submit" name="login" value="Login" />
	</form>
	<p>Don't have an account? <a href="register.php" data-ajax="false">Register!</a></p>
<?PHP
	}else{
?>
	<p>You are already logged in, please <a href="includes/killSession.php" data-ajax="false">logout</a> before you can see this page.</p>

<?PHP
	}
?>

</div>

<?php
	include("bottom.php");
?>



















