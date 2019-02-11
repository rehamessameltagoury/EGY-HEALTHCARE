

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
body, html {
    height: 100%;
    margin: 0;
}
.bg {
    background-image: url("Schedule.jpg");
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
  font-size: 27px;
  font-family: Georgia, serif;
  display: block;
  text-align: center;
  color: black;
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
  
  <a id="position_sign" href="signup.php" target="_self">Sign up/Login</a>
   
 </div>
   
   <div class="bg">


    <form id="myform" action="include/medicine_inc.php" method="POST">
      <button class="button_save" type="submit" name="submit">Save</button>
      <div id="container">
        
      <table>
        <tr>
          <th>
            <input type="text" name="newName" value="<?php echo $_GET['name']; ?>" >
          </th>
          <th>
            <input type="text" name="newTime" value="<?php echo $_GET['time']; ?>" >
            <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>" >
          </th>
        </tr>
      </table>

      
       
      </div>
    </form>
    
  
   
   </div>
 
 

</body>
</html>
