<?PHP
	include("utils.php");
	if(!isset($_GET['code']) && !isset($_GET['username'])){ //if we dont have username/code in url
?>	
<div class="login-form">

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

		$sql = "SELECT * FROM users WHERE username='$username' AND code='$code'";
		$result=$connection->query($query);
				
		if($result->num_rows == 1){
	
?>
			<form action="includes/accountManager.php" method="POST">
				<p>Enter your new password</p>
				<input type="text" name="username" id ="username" placeholder="Username" /><br/>
				<input type="hidden" name="reset" value="true" />
				<input type="submit" name="reset" value="Send Verification" />
			</form>

<?PHP
		}else{
?>
			<p>That link either was already used or is incorrect please try again.</p>
<?php		
		}
}
if(isset($_GET['msg'])){
	if($_GET['msg'] =="sent"){
		echo "<p>We have sent you an email with a link to reset your password. Please check your junk mail</p>";
	}
}
?>
</div>
<?php
	include("bottom.php");
?>



















