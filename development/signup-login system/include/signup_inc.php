<?php
//he must click the button
if (isset($_POST['submit'])) {
	include_once 'dbh_inc.php';
	$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$lname = mysqli_real_escape_string($conn,$_POST['lname']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$user_name = mysqli_real_escape_string($conn,$_POST['user_name']);
	$psw = mysqli_real_escape_string($conn,$_POST['psw']);
	
	$gender = $_POST['gender'];
	//error handlers
	//check for empty fields
	if (empty($fname) || empty($lname) || empty($email)|| empty($user_name)||empty($psw) || empty($gender)) {
		header("Location: ../signup.php?signup=empty");
		exit();
	}else{
		//check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname)) {
			header("Location: ../signup.php?signup=invalid");
			exit();
		} 

		else{
			// check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=email");
				exit();
			} else{
				//check user name is not repeated
				$sql="SELECT * FROM USERS WHERE user_name='$user_name'";
				$result = mysqli_query($conn,$sql);
				$resultCheck= mysqli_num_rows($result);

				if ($resultCheck >0) {
					header("Location: ../signup.php?signup=usertaken");
				exit();
				} else{
					//hashing the password
					$hashedpwd= password_hash($psw,PASSWORD_DEFAULT);
					//insert user inside the database
					session_start();
					$_SESSION['username'] = $user_name;
					$_SESSION['pwd'] = $psw;
					
					$sql="INSERT INTO USERS (user_first,user_last,user_email,user_name,user_pwd,user_gender) VALUES 
					('$fname','$lname','$email','$user_name','$hashedpwd','$gender');";
					mysqli_query($conn,$sql);
					header("Location: ../profile.php?signup=signupsuccess");
				exit();
				}
			
		


			}

		}
	}
}
else{
	//if they didn't use the submit we will reload the page
	header("Location: ../signup.php");
	exit();
}


?>
