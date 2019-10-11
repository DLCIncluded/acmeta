<?PHP
	include("utils.php");
	if($loggedIn=="false"){
?>
<div class="login-form">
	<form action="includes/accountManager.php" method="POST">
	<p>Please enter the following</p>
	<input type="text" name="username" id ="username" placeholder="Username" /><br/>
	<input type="text" name="email" id ="email" placeholder="Email" /><br/>
	<input type="password" name="password" id ="password" placeholder="Password" /><br/>	
	<input type="password" name="password2" id ="password2" placeholder="Repeat Password" /><br/>	
	<input type="hidden" name="register" value="true" />
	<input type="submit" name="save" value="Save" />
	</form>
	<p>Already have an account? <a href="login.php" data-ajax="false">Login!</a></p>
<?PHP
	}else{
?>
	<p>You are already logged in, please <a href="logout.php" data-ajax="false">logout</a> before you can see this page.</p>
<?PHP
	}
?>
</div>

<?PHP
	include("bottom.php");
?>


















