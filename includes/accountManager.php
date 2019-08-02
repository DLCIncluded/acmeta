<?PHP
ini_set('display_errors', '1');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once("dbConn.php");
include_once("accountChecker.php"); // this way we can get the session username



	if(isset($_POST['register'])){
		//echo "register";
		if($_POST['username'] != ''){
			
			if($_POST['password'] != ''){
				
				if($_POST['password2'] != ''){
					
					if($_POST['email'] != ''){
						
						//If we get this far we should be good to process 
						$username = $_POST['username'];
						$email = $_POST['email'];
						$password = $_POST['password'];
						$password2 = $_POST['password2'];
						$query="SELECT * FROM users WHERE username='$username'";
						
						if($password == $password2){
							//make sure passwords match
							
							//Lets get encrypting!
							$salt = md5($username); //Create Salt for password crypt
							$password = crypt($password, '$2a$07$'.$salt.'$'); //Encrypt password using blowfish + salt just created
							
							$result=$connection->query($query);
							
							if($result->num_rows == 0){
								//create a random workout ID for now
								// Does not already exist lets create it
								$sql = "INSERT INTO users (username,email,password) VALUES ('$username', '$email', '$password')";
								if($connection->query($sql)){
									echo "successfully created account";
									//account created lets log them in to make life easier
									$_SESSION['username'] = $username;
									$_SESSION['email'] = $email;									
									
									header("location: https://david-cary.com/testing/mike/");
								}else{
									echo $connection->error;
								}
							}else{
								echo "username already taken";
							}
							
						}else{
							echo "passwords do not match.";
						}
					}else {
					echo "Missing email";
					}
				}else {
					echo "Missing password";
				}
			}else {
				echo "Missing password";
			}
		} else {
			echo "Missing Username";
		}
		
		
		
	}
	
	if(isset($_POST['login'])){
		if($_POST['username'] != ''){
			
				$username = $_POST['username'];
				$password = $_POST['password'];
				$query="SELECT * FROM users WHERE username='$username'";
				
				$result=$connection->query($query);
				
				if($result->num_rows == 1){
					echo "found user $username -";
					$row=$result->fetch_assoc();
					
					$passwordHash = $row['password'];
					if(crypt($password, $passwordHash) == $passwordHash) { //generate new crypt using the hash in db as the salt to create a hash to check against the db... yea confusing but its how it works...
						//set session vars so we can use them elsewhere
						$_SESSION['username'] = $row['username'];
						$_SESSION['rank'] = $row['rank'];
						echo "logged in";
						header("location: https://david-cary.com/testing/mike");
					}else {
						echo "Invalid password";
						//header("location: ".$site."info.php?msg=pass");
					}
				}else {
				echo "User not found";
			}
			
		} else {
			echo "Missing Username";
		}
		
		
		
	}
	
	
?>
