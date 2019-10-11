<?PHP
	include("top.php");
	echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">';
?>
<div class="login-form">
<?php
if(isset($_GET['msg'])){
	if($_GET['msg'] =="sent"){
		echo "<p>We have sent you an email with a link to reset your password. Please check your junk mail</p>";
	}else if($_GET['msg'] == "reset"){
		echo "<p>Your Password has been reset, please try to <a href='login.php'>login</a>.</p>";
	}
}
	if(!isset($_GET['code']) && !isset($_GET['username'])){ //if we dont have username/code in url
?>	


	<form action="includes/accountManager.php" method="POST">
		<p>Enter your username and we will send you an email to reset your password</p>
		<input type="text" name="username" id ="username" placeholder="Username" /><br/>
		<input type="hidden" name="code" value="true" />
		<input type="submit" name="code" value="Send Verification" />
	</form>
<?PHP
	
	}else{
		//check the db for a username and the code
		$username = $_GET['username'];
		$code = $_GET['code'];

		$sql = "SELECT * FROM users WHERE username='$username' AND resetcode='$code'";
		$result=$connection->query($sql);
		
		if($result->num_rows == 1){
	
?>
	<form action="includes/accountManager.php" method="POST">
		<p>Enter your new password: </p>
		<input type="password" name="password" id ="password" placeholder="Password" /><br/>
		<input type="password" name="password2" id ="password" placeholder="Repeat" /><br/>
		<input type="hidden" name="username" value="<?php echo $_GET['username']; ?>" />
		<input type="hidden" name="reset" value="true" />
		<input type="submit" name="reset" value="Set Password" />
	</form>
<?PHP
		}else{
?>
	<p>That link either was already used or is incorrect please try again.</p>
<?php		
		}
	}
?>
</div>
<?php
	include("bottom.php");
?>



















