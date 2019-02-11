

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<style>
a:link {
    text-decoration: none;
}
a:visited {
    text-decoration: none;
}
a:hover {
    text-decoration: none;
}
a:active {
    text-decoration: none;
}
#logo { position: absolute; top: 0px; left: 200px; width: 200px }
#position_home { position: absolute; top: 43px; left: 680px; width: 200px ;font-size:25px}
#position_about { position: absolute; top: 43px; left:880px; width: 200px ;font-size:25px}
#position_sign { position: absolute; top: 43px; left: 1080px; width: 200px ;font-size:25px}
body, html {
    height: 100%;
    margin: 0;
}
.bg {
    background-image: url("form.jpg");
    height: 100%;  width: 50%;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
  width:200px;
}
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}
button:hover {
    opacity:1;
}
/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}
/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}
/* Add padding to container elements */
.container {
    padding: 16px;
}
/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}
/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
#sign { position: absolute; left: 780px; height=100%}
</style>

</head>
<body>

<?php 
	//database connection
	$dbservername="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbName="Healthcare";
	$conn=mysqli_connect($dbservername,$dbUsername,$dbPassword,$dbName);

	if(isset($_POST['login']))
	{
		$name=$_POST['username'];
		$pwd=$_POST['pwd'];
		$sql="SELECT * FROM USERS WHERE user_name = '".$name."' AND user_pwd = '".$pwd."' limit 1";
		
		$result= mysqli_query($conn,$sql);
		
		 while ( $row = mysqli_fetch_assoc($result) )
		 {
			if ( ($row['user_name'] == $name)  && ($row['user_pwd'] == $pwd) )
				{
					session_start();
					$_SESSION['username'] = $name;
					$_SESSION['pwd'] = $pwd;
              
			
					header('Location: profile.php');
					exit();
				}
		
			else 
				{
					echo "You have entered incorrect username/password";
					exit();
				}
		 }
	}
	
?>

<div style="background-color:white;color:brown;padding:20px;height:120px">

  <div id="logo">
  <img src="logo.jpg" alt="logo" height="121.5">
  </div>
  
 <a id="position_home" href="home.html" target="_self">Home</a> 
  
  <a id="position_about" href="about_us.html" target="_self">About us</a> 
  
  <a id="position_sign" href="signup.php" target="_self">Sign up/Login</a>
   
 </div>
   
   <div class="bg">
     <div id='sign'>
    <form action="login.php" method="POST"  style="border:1px solid #ccc">
  <div class="container">
    <h1>Log in</h1>
    <p>Please fill in this form to login.</p>
    <hr>
  
   <label for="username"><b>User Name:</b></label>
    <input type="text" placeholder="user name" name="username" required>
  
   <label for="pwd"><b>Password:</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" required>

    <div class="clearfix">
      <button type="submit" name ="login" class="signupbtn">log in</button>
    </div>
  </div>
</form>
</div>
 
   
   </div>
 
 

</body>
</html>
