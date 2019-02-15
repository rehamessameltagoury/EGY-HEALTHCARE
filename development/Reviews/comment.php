<?php require_once 'php/connect.php'; require_once 'php/functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
	    <title>EGY HEALTHCARE</title>
        <meta charset="UTF-8" lang="en-US">
        <link rel="stylesheet" href="style.css">
		<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
		<script src="js/global.js"></script>	

<style>
a,.old:link {
    text-decoration: none;
}
a,.old:visited {
    text-decoration: none;
}
a,.old:hover {
    text-decoration: none;
}
a,.old:active {
    text-decoration: none;
}
#logo { position: absolute; top: 0px; left: 200px; width: 200px }
#position_home { position: absolute; top: 43px; left: 680px; width: 200px ;font-size:25px}
#position_about { position: absolute; top: 43px; left:880px; width: 200px ;font-size:25px}
#position_sign { position: absolute; top: 43px; left: 1080px; width: 200px ;font-size:25px}
#notifications { position: absolute; top: 57px; left: 1300px; width: 200px ;font-size:25px}
body, html {
    height: 100%;
    margin: 0;
    background-attachment: fixed;
     background-image: url("comment.jpg");

    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.bg {

   /* background-image: url("comment.jpg");

    height: 100%; 

    /* Center and scale the image nicely */
   /* background-position: center;
    background-repeat: no-repeat;
    background-size: cover; */
}
body {font-family: Arial, Helvetica, sans-serif;

}
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
<script>
window.Engagespot={},q=function(e){return function(){(window.engageq=window.engageq||[]).push({f:e,a:arguments})}},f=["captureEvent","subscribe","init","showPrompt","identifyUser","clearUser"];for(k in f)Engagespot[f[k]]=q(f[k]);var s=document.createElement("script");s.type="text/javascript",s.async=!0,s.src="https://cdn.engagespot.co/EngagespotSDK.2.0.js";var x=document.getElementsByTagName("script")[0];x.parentNode.insertBefore(s,x);Engagespot.init('2pPMXEqgemY6QwNRguxpJBV7EdaImi');</script>
</head>
<body>

<div style="background-color:white;color:brown;padding:20px;height:160px">

  <div id="logo">
  <img src="logo.jpg" alt="logo" height="121.5">
  </div>
  
 <a class='old' id="position_home" href="index1.html" target="_self" style="text-transform:none;text-decoration:none;color:blue">Home</a> 
  
  <a id="position_about" href="about_us.html" target="_self" style="text-transform:none;color:blue">About us</a> 
  
  <a id="position_sign" href="profile.php" target="_self" style="text-transform:none;color:blue">Profile</a>

  <a id="notifications"href="#"></a>
   
 </div>

	</head>
	<body>
        <div class='bg'>
		<div class="page-container">
			<?php 
                $text=$_GET['review'];
				get_total($text); //get number of total comments written
				require_once 'php/check_com.php';
			?>
			<form action="" method="post" class="main">
				<label>enter a brief comment</label>
				<textarea class="form-text" name="comment" id="comment"></textarea>
				<br />
				<input type="submit" class="form-submit" name="new_comment" value="post">
			</form>
			<?php get_comments($text); //get comments on screen
			?> 
		</div>
    </div>
	</body>
</html>