<!DOCTYPE html>
<html>
<head>
	<html>
<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1" >
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
#position_home { position: absolute; top: 57px; left: 680px; width: 200px ;font-size:25px}
#position_about { position: absolute; top: 57px; left:880px; width: 200px ;font-size:25px}
#position_sign { position: absolute; top: 57px; left: 1080px; width: 200px ;font-size:25px}
#notifications { position: absolute; top: 57px; left: 1300px; width: 200px ;font-size:25px}

body, html {
    height: 100%;
    margin: 0;
}


.bg {

    background-image: url("about us.jpg");

    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

div.transbox {
  margin: 30px;
  background-color: #ffffff;
  border: 1px solid white;
  opacity: 0.6;
  filter: alpha(opacity=60); /* For IE8 and earlier */
  width : 600px;
  height: 350px;
}

div.transbox p {
  margin: 5%;
  font-weight: bold;
  font-size: 25px;
  color: #000000;
}

</style>
<script>
window.Engagespot={},q=function(e){return function(){(window.engageq=window.engageq||[]).push({f:e,a:arguments})}},f=["captureEvent","subscribe","init","showPrompt","identifyUser","clearUser"];for(k in f)Engagespot[f[k]]=q(f[k]);var s=document.createElement("script");s.type="text/javascript",s.async=!0,s.src="https://cdn.engagespot.co/EngagespotSDK.2.0.js";var x=document.getElementsByTagName("script")[0];x.parentNode.insertBefore(s,x);Engagespot.init('2pPMXEqgemY6QwNRguxpJBV7EdaImi');</script>
</head>


<body>

<div style="background-color:white;color:brown;padding:20px;height:160px">

  <div id="logo">
  <img src="logo.jpg" alt="logo">
  </div>
  
 <a id="position_home" href="index1.html" target="_self">Home</a> 
  
  <a id="position_about" href="about_us.html" target="_self">About us</a> 
  
  <a id="position_sign" href="profile.php" target="_self">Profile</a>

   <a id="notifications"href="#"></a>
   
 </div>

</body>

</html>


<?php

//session_start();

global $con ;
$con= mysqli_connect('sql307.epizy.com','epiz_23426192','qrhufcVnYDEVx');

if (! $con) {
	echo "Not connected to server!";
}

if (! mysqli_select_db($con,'epiz_23426192_Healthcare')) {
	echo "Database not selected";
}
	
//$name=$_SESSION['username'];	

$patient=$_POST['full_name'];
$email=$_POST['e_mail'];
$dr=$_POST['dr_name'];
$depp=$_POST['dr_dep'];
$time=$_POST['day'];

//check that the doctor and appointment day entered by user exist
$sql1= "SELECT name,department FROM doctors WHERE name = '$dr' AND department='$depp' AND appointments LIKE ('%$time%')";

/*$sql1= "SELECT name,department FROM doctors WHERE name = '$dr' AND department='$depp' AND appointments LIKE ('%$time%') ,
    JOIN patients_appointments ON patients_appointments.doctor = doctors.name ,
    JOIN users ON users.user_email = patients_appointments.email where users.user_name = '".$name."'"; */

$result=mysqli_query($con,$sql1);

//executed when info. entered by user is valid
if(mysqli_num_rows($result)!=0) {

$sql2="INSERT INTO patients_appointments (name,email,doctor,department,appointment_day)
      VALUES ('$patient','$email','$dr','$depp','$time')";

if (!mysqli_query($con,$sql2)) {
	echo "Error saving data!";
}

else {

	echo '<div class="alert alert-success">
          <strong>Your appointment is successfully booked!</strong> </div>';
}
//header("refresh:2; url=book.html");
}

else {

echo '<div class="alert alert-danger">
      <strong>Error!Please check doctor name,department and appointment day.
              <h5>PS:check spelling or take them copy paste from the page.</h5></strong> </div>';

}



























?>
