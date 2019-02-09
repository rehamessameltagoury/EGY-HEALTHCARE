 <?php
// Start the session
session_start();
?>
 
 
 <!DOCTYPE html>
 
<html>
<head>

<title>Profile-About</title>

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
body, html {
    height: 100%;
    margin: 0;
}
.bg {
    background-image: url("background.jpg");
    height: 100%; 
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.dropdown { position: absolute; top: 57px; left: 1080px; width:200px }
.dropbtn {
    background-color: white;
    font-size : 25px;
    color: black;
    border: none;
    cursor: pointer;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    font-size: 20px;
}
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}
.dropdown-content a:hover {background-color: #f1f1f1}
.options button:hover {background-color:#f1f1f1}
.dropdown:hover .dropdown-content {
    display: block;
}
.left_panel {
   
    text-align:justify;
    width:250px;   
}
.options{
    
    font-size: 20px;
    color:white;
    background-color:transparent;
    padding-top: 20px;
    padding-right: 20px;
    padding-bottom: 20px;
    padding-left: 20px;
    margin-bottom:5px;
    }
.options button
{
    background-color: transparent;
    width: 100%;
    font-size : 22px;
    color: white;
    border: 1 solid navy;
    border-radius: 12px;
    padding: 12px 28px;
    cursor: pointer;
    margin-left:5px;
    font-weight:bold;
    }
.container
{
    padding-left:300px;
    padding-top: 20px;
    right:50px;
}    
    
th, td {
    padding: 15px;
    font-size:20px;
    
}
th {
	color:DarkBlue;
	
}
</style>

</head>


<body>

<div style="background-color:white;color:brown;padding:20px;height:120px">

  <div id="logo">
  <img src="logo.jpg" alt="logo">
  </div>
  
  <a id="position_home" href="home.html" target="_self">Home</a> 
  
  <a id="position_about" href="about_us.html" target="_self">About us</a> 
  
  <div class="dropdown">
  <button class="dropbtn">Username</button>
  <div class="dropdown-content">
    <a href="#">Profile</a>
    <a href="#">Sign Out</a>
  </div>
</div>
   
 </div>
   
   <div class="bg">
    <div class="left_panel" style="float:left">
   
     
     <img src="profilephoto.jpg" alt="user_image" style="width:250px;height:250px;padding:5px; border-radius:200px">
    
	 
	 <?php 
	 
	 
	 //database connection
	$dbservername="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbName="Healthcare";
	$conn=mysqli_connect($dbservername,$dbUsername,$dbPassword,$dbName);
	 

    //Display User information
	
   $username = $_SESSION['username'];
   $pwd= $_SESSION['pwd'];
   $get = mysqli_query($conn,"SELECT * FROM USERS WHERE user_name='".$username."' AND user_pwd='".$pwd."';");
   $get2 = mysqli_fetch_assoc($get);
   $firstname = $get2{'user_first'};
   $lastname = $get2{'user_last'};
   $userid = $get2{'user_id'};
   $email = $get2{'user_email'};
   $gender = $get2{'user_gender'};
   
   
   ?>
	 
	  
	  
	  <div class="options">
       <button type="button"><a id="about" href="Profile.php" target="_self">About</a> <br>
      </div></button>
    
	<div class="options">
     <button type="button"><a id="medicine" href="Medicine_schedule.php" target="_self">Medicine Schedule</a> <br>
    </div></button>
   
   <div class="options">
     <button type="button"><a id="appointment" href="App_schedule.php" target="_self">Appointment Schedule</a>
    </div> </button>
	
   </div>
 

   <div class="container" >
   <table style="width:80%;margin-left:5%;text-align:left">
  <tr>
  	<th>User ID</th> 
    <td><?php echo $userid; ?></td>
  </tr>
  <tr>
    <th>First Name</th>
    <td><?php echo $firstname; ?></td>
  </tr>
  <tr>
  	<th>Last Name</th> 
    <td><?php echo $lastname; ?></td>
  </tr>
  <tr>
  	<th>Email</th> 
    <td><?php echo $email; ?></td>
  </tr>
  <tr>
  	<th>Gender</th> 
    <td><?php echo $gender; ?></td>
  </tr>
  

</table>
   </div>
   </div>
   
   </body>
</html>
