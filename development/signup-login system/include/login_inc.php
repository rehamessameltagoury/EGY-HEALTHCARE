<?php
// if he clicked already have an account

session_start();

if (isset($_POST['login'])) {
	include 'dbh_inc.php';
	$uid= mysqli_real_escape_string($conn,$_POST['user_name']);
		$psw= mysqli_real_escape_string($conn,$_POST['psw']);
		//Error handlers
		//check if inputs are empty
		if(empty($uid)||empty($psw))
		{
			header("Location: ../index.php?login=empty");
			exit();
		} else{
			//check password
			$sql="SELECT * FROM USERS WHERE user_uid='$uid'";
			$result = mysqli_query($conn,$sql);
			$resultCheck= mysqli_num_rows($result);
			if ($resultCheck <1) {
						header("Location: ../signup.php?login=error");
			            exit();
					} else{
						if ($row=mysqli_fetch_assoc($result)) {
							//de-hashing the password
							$hashedpwdCheck=password_verify($psw,$row['user_pwd']);
							if ($hashedpwdCheck == False) {
								header("Location: ../index.php?login=error");
			            exit();							}	
						} elseif ($hashedpwdCheck == True) {
							//log in the user here
							$_SESSION['u_id']=$row['user_id'];
								$_SESSION['u_first']=$row['user_first'];
									$_SESSION['u_last']=$row['user_last'];
										$_SESSION['u_email']=$row['user_email'];
											$_SESSION['u_uid']=$row['user_uid'];
												$_SESSION['u_gender']=$row['user_gender'];
												header("Location: ../profile.php?login=success");
			            exit();							

						}
					}		
				}


}
else{
			header("Location: ../index.php?login=error");
			exit();
		}





?>