<?php
	include_once 'dbh_inc.php';
	$name = $_POST['name'];
    $time = $_POST['time'];
    $sql = "INSERT INTO appointment (Dr_name,App_time) VALUES('$name','$time');";
     mysqli_query($conn, $sql);
     
    header("location: ../App_schedule.php?submit=success");
    ?> 