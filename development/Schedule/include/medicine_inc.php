
  

<?php

	include_once 'dbh_inc.php';

	$name = $_POST['name'];
    $time = $_POST['time'];

    $sql = "INSERT INTO medicine (medicine_name,medicine_time) VALUES('$name','$time');";
     mysqli_query($conn, $sql);
     




    //echo "<table>";
     // echo"<tr><th>Medicine</th><th>Time</th></tr>";
      //while($row = mysqli_fetch_assoc($result)){
        //echo"<tr><td>{$row['medicine_name']}</td><td>{$row['medicine_time']}</td></tr>";

     //}


    //echo"</table>";

    header("location: ../Medicine_schedule.php?submit=success");



    ?> 