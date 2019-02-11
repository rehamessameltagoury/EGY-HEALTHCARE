<?php

	include_once 'dbh_inc.php';
	$id  = $_GET[del];
    $sql = "DELETE FROM appointment WHERE id='$id'";
     mysqli_query($conn, $sql);
     
    header("location: ../App_schedule.php?submit=success");
  ?> 