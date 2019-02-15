
<!DOCTYPE html>
<html>
<head>

<title>Appointment Schedule</title>

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
.button_save{
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
td, th, {
    border: 3px solid #000066;
    text-align: left;
    padding: 15px;
}
input[type=text] {
  width: 100%;
  border: 3px solid #000066;
  padding: 15px;
  box-sizing: border-box;
  background-color: transparent;
  border-radius: 7px;
  font-size: 25px;
  display: block;
  text-align: center;
  color: black;
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
  
  <a id="position_sign" href="signup.php" target="_self">Sign up/Login</a>

  <a id="notifications"href="#"></a>
   
 </div>
   
   <div class="bg">
    <?php
    
    session_start();
     
     $username=$_SESSION['username'];
  ?>
    

    <form id="myform" action="include/add_app_inc.php" method="POST">
      <div id="container">
      <table>
        <tr>
          <th>
            <input type="text" name="name" placeholder="Doctor Name">
          </th>
          <th>
            <input type="text" name="time" placeholder="Appointment Date">
          </th>
        </tr>
      </table>

      <button class="button_save" type="submit" name="submit">Save</button>
       
      </div>
    </form>
    
  
   
   </div>
 
 

</body>
</html>
