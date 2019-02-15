

<!DOCTYPE html>
<html>
<head>

<title>Medicine Schedule</title>

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
    background-image: url("schedule.jpg");
    height: 100%; 
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.button_add{
  border-radius: 8px;
            background-color: #008CBA;
      width: 200px;
      height:70px;
      font-size: 25px;
      color: white;
      
      position: absolute; top: 250px; left: 860px;

}

table {
    font-family: Georgia, serif;
    border-collapse: collapse;
    width: 60%;
    font-size: 25px;
    position: absolute; top: 350px; left: 250px;
}

td, th {
    border: 3px solid #000066;
    text-align: left;
    padding: 15px;
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
    <button class="button_add">
           <a href="add_med_schedule.php" target="_self" style="color:white" > Add New Medicine </a>
    </button>
    <?php
     include_once 'include/dbh_inc.php';
    session_start();
     $username= $_SESSION['username'];
     
    $sql = "SELECT * FROM medicine JOIN users ON users.user_name = medicine.user_name WHERE users.user_name = '$username'";
    $result = mysqli_query($conn, $sql);

    echo "<table>";
      echo"<tr><th>Medicine</th><th>Time</th></tr>";
      while($row = mysqli_fetch_assoc($result)){
        echo"<tr><td>{$row['medicine_name']}</td><td>{$row['medicine_time'] } <a href='edit_med_schedule.php?edit=$row[id]&name=$row[medicine_name]&time=$row[medicine_time]'>(edit)</a>  <a href='include/del_med_inc.php?del=$row[id]'> (delete)</a> </td></tr>";
        

     }


    echo"</table>";



    ?> 
   
   </div>
 
 

</body>
</html>
