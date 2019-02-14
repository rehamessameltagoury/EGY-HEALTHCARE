<?php
	include_once 'dbh_inc.php';
	session_start();
	$name = $_POST['name'];
    $time = $_POST['time'];
    $username=$_SESSION['username'];
    $sql = "INSERT INTO medicine (medicine_name,medicine_time, user_name) VALUES('$name','$time', '$username');";
     mysqli_query($conn, $sql);
     
    header("location: ../Medicine_schedule.php?submit=success");
    ?> 

    
