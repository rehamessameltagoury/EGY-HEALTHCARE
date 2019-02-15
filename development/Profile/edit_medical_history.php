
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
#notifications { position: absolute; top: 57px; left: 1300px; width: 200px ;font-size:25px}
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


::placeholder {
  color: black ;
  font-size: 18px;
  
}



button:hover {
    opacity:1;
}
</style>
<script>
window.Engagespot={},q=function(e){return function(){(window.engageq=window.engageq||[]).push({f:e,a:arguments})}},f=["captureEvent","subscribe","init","showPrompt","identifyUser","clearUser"];for(k in f)Engagespot[f[k]]=q(f[k]);var s=document.createElement("script");s.type="text/javascript",s.async=!0,s.src="https://cdn.engagespot.co/EngagespotSDK.2.0.js";var x=document.getElementsByTagName("script")[0];x.parentNode.insertBefore(s,x);Engagespot.init('2pPMXEqgemY6QwNRguxpJBV7EdaImi');</script>
</head>
<body>

<div style="background-color:white;color:brown;padding:20px;height:120px">

  <div id="logo">
  <img src="logo.jpg" alt="logo">
  </div>
  
  <a id="position_home" href="index1.html" target="_self">Home</a> 
  
  <a id="position_about" href="about_us.html" target="_self">About us</a> 
  
  <a id="position_sign" href="profile.php" target="_self">Profile</a>

  <a id="notifications"href="#"></a>
   
 </div>
   
   <div class="bg">
    <?php
    include_once 'include/dbh_inc.php';
    session_start();
     
     $username=$_SESSION['username'];
     
    $sql = "SELECT medical_history FROM users WHERE user_name = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    echo"<form action='include/med_history_inc.php' method='POST'>";
      echo "<textarea name='comment' id='comment' >{$row['medical_history']}</textarea>";
      
      echo "<button class='button_save' type='submit' name='submit'>Save</button>";
    echo "</form>";

    ?>
  
    

    
   </div>
 
 

</body>
</html>