<?php
	include_once 'dbh_inc.php';
	$name = $_POST['name'];
    $time = $_POST['time'];
    $sql = "INSERT INTO medicine (medicine_name,medicine_time) VALUES('$name','$time');";
     mysqli_query($conn, $sql);
     
    header("location: ../Medicine_schedule.php?submit=success");
    ?> 