<?PHP
ini_set('display_errors', '1');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once("dbConn.php");
include_once("accountChecker.php"); // this way we can get the session username
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


	if(isset($_POST['register'])){
		//echo "register";
		if($_POST['username'] != ''){
			
			if($_POST['password'] != ''){
				
				if($_POST['password2'] != ''){
					
					if($_POST['email'] != ''){
						
						//If we get this far we should be good to process 
						$username = strtolower($_POST['username']);
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
									$_SESSION['rank'] = $rank;									
									
									header("location: $site");
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
			
				$username = strtolower($_POST['username']);
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
						header("location: $site");
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

	
	if(isset($_POST['code'])){
		echo "code";
		if($_POST['username'] != ''){	
			$username = strtolower($_POST['username']);
			$query="SELECT * FROM users WHERE username='$username'";
			
			$result=$connection->query($query);
			
			if($result->num_rows == 1){
				echo "found user";
				$row=$result->fetch_assoc();
				$email = $row['email'];
				$code = md5(rand(0,100)); // generate random code

				$sql = "UPDATE users SET resetcode='".$code."' WHERE username='".$username."'";
				
				if($connection->query($query)){
					echo "sent to db";
					

					$to      = $email;
					$subject = 'ACMeta Password reset';
					$message = 'hello,  Please click the following link to complete your password reset: '.$site.'/passwordreset.php?code='.$code.'&username='.$username;
					$message = wordwrap($message, 70, "\r\n");
					$headers = 'From: webmaster@acmeta.dlcincluded.com' . "\r\n" .
						'Reply-To: DONOTREPLY@acmeta.dlcincluded.com' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();

					mail($to, $subject, $message, $headers);
					echo "sent mail";
					//header("location: $site/passwordreset.php?msg=sent");
				}
				
				
			} else {
			echo "User not found";
			}
		
		} else {
			echo "Missing Username";
		}
	}

<<<<<<< HEAD
=======
	if(isset($_POST['reset'])){
		if($_POST['username'] != ''){	
			$username = strtolower($_POST['username']);
			$password = $_POST['password'];
			$password2 = $_POST['password2'];
			if($password == $password2){
				$query="SELECT * FROM users WHERE username='$username'";
				
				$result=$connection->query($query);
				$row=$result->fetch_assoc();
				$email = $row['email'];
				
				if($result->num_rows == 1){
					//echo "found user";
					$row=$result->fetch_assoc();
					
					$salt = md5($username); //Create Salt for password crypt
					$password = crypt($password, '$2a$07$'.$salt.'$'); //Encrypt password using blowfish + salt just created

					$sql = "UPDATE users SET resetcode='', password='".$password."' WHERE username='".$username."'";
					
					if($connection->query($sql)){
						//reset their one time code and set the password

						
						//Create a new PHPMailer instance
						$mail = new PHPMailer;
						//Tell PHPMailer to use SMTP
						$mail->isSMTP();
						//Enable SMTP debugging
						// 0 = off (for production use)
						// 1 = client messages
						// 2 = client and server messages
						$mail->SMTPDebug = 0;
						//Set the hostname of the mail server
						$mail->Host = 'smtp.gmail.com';
						// use
						// $mail->Host = gethostbyname('smtp.gmail.com');
						// if your network does not support SMTP over IPv6
						//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
						$mail->Port = 587;
						//Set the encryption system to use - ssl (deprecated) or tls
						$mail->SMTPSecure = 'tls';
						//Whether to use SMTP authentication
						$mail->SMTPAuth = true;
						//Username to use for SMTP authentication - use full email address for gmail
						$mail->Username = "acmetatracker@gmail.com";
						//Password to use for SMTP authentication
						$mail->Password = "Cc147258";
						//Set who the message is to be sent from
						$mail->setFrom('acmetatracker@gmail.com', 'ACMeta Admin');
						//Set an alternative reply-to address
						$mail->addReplyTo('acmetatracker@gmail.com', 'ACMeta Admin');
						//Set who the message is to be sent to
						$mail->addAddress($email, $username);
						//Set the subject line
						$mail->Subject = 'AC Meta Tracker Account Update';
						//Read an HTML message body from an external file, convert referenced images to embedded,
						//convert HTML into a basic plain-text alternative body
						//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
						//Replace the plain text body with one created manually
						$mail->Body = 'Hello '.$username.', We just wanted to let you know that your password was changed. If you did not make this change please contact the admins. If it was you, please ignore this email. Thank you.';
						//Attach an image file
						//$mail->addAttachment('images/phpmailer_mini.png');
						//send the message, check for errors
						if (!$mail->send()) {
							echo "Mailer Error: " . $mail->ErrorInfo;
						} else {
							echo "Message sent!";
							header("location: $site/passwordreset.php?msg=reset");
						}
						
					}
				
				}else{
					echo "Account not found";
				}
			} else {
				echo "Passwords don't match";
			}
		
		} else {
			echo "Missing Username";
		}
	}

>>>>>>> Password reset funct done
?>
