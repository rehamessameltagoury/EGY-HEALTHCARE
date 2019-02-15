<!DOCTYPE html>
<html>
<head>

<title>Medical history</title>

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
body, html {
    height: 100%;
    margin: 0;
}
.bg {
    background-image: url("med_history1.jpg");

    height: 100%; 
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
#comment {
    border-radius: 8px;
      background-color: transparent;
      width: 790px;
      height:200px;
      font-size: 30px;
      color:#000000 ;
      font-weight: bold;
      position: absolute; top: 450px; left: 275px;

}
.button_save{
  border-radius: 8px;
            background-color: #008CBA;
      width: 200px;
      height:70px;
      font-size: 25px;
      color: white;
      
      position: absolute; top: 700px; left: 860px;

}
.button_edit{
  border-radius: 8px;
            background-color: #008CBA;
      width: 200px;
      height:70px;
      font-size: 25px;
      color: white;
      
      position: absolute; top: 750px; left: 860px;

}


::placeholder {
  color: black ;
  font-size: 18px;
  
}

.txt {
    position: absolute;
    left: 0;
    top: 36%;
    width: 100%;
    text-align: center;
    font-size: 50px;
    color: #000066;
}
div.transbox {
  border-radius: 8px;
  margin: 30px;
  background-color: #ffffff;
  border: 1px solid white;
  opacity: 0.8;
  filter: alpha(opacity=60); /* For IE8 and earlier */
  width : 600px;
  height: 350px;
  position: absolute; top: 350px; left: 275px;
}

div.transbox p {
  margin: 5%;
  font-weight: bold;
  font-size: 25px;
  color: black;
}

button:hover {
    opacity:1;
}
</style>

</head>
<body>

<div style="background-color:white;color:brown;padding:20px;height:120px">

  <div id="logo">
  <img src="logo.jpg" alt="logo">
  </div>
  
  <a id="position_home" href="index1.html" target="_self">Home</a> 
  
  <a id="position_about" href="about_us.html" target="_self">About us</a> 
  
  <a id="position_sign" href="profile.php" target="_self">Profile</a>
   
 </div>
   
   <div class="bg">
    <div class="txt"><b style="text-shadow: 4px 4px 4px #ffffff;">You can save your medical history here</b></div>

    <?php
    include_once 'include/dbh_inc.php';
    session_start();
     
     $username=$_SESSION['username'];
     
    $sql = "SELECT medical_history FROM users WHERE user_name = '$username'";
    
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if(empty($row['medical_history'])){
        echo"<form action='include/med_history_inc.php' method='POST'>";
      echo "<textarea name='comment' id='comment' placeholder='Enter your medical history here...'></textarea>";
      
      echo "<button class='button_save' type='submit' name='submit'>Save</button>";
    echo "</form>";

       
      
    }


    else{
         //$row = mysqli_fetch_assoc($result);
      echo"<form id='myform' action='edit_medical_history.php' method='POST'>";
        echo "<div class='transbox' name='medical_history' id='medical_history'>";
        $medical_history=$row['medical_history'];
        echo "<p name='medical_history' id='medical_history'>{$medical_history}</p>";
        echo "</div>";
        
        echo "<button class='button_edit' type='submit' name='submit'>Edit</button>";
        //echo "<input type='hidden' name='medical_history' value='$row['medical_history']' >";
        echo "</form>";
        //echo "<$medical_history = $_SESSION['medical_history']>";

//echo $medical_history $_SESSION['medical_history'];
          

    }


   
   
   ?>
   
   </div>
 
 

</body>
</html>