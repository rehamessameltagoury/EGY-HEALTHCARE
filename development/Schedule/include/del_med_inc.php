<?php

	include_once 'dbh_inc.php';
	$id  = $_GET[del];
    $sql = "DELETE FROM medicine WHERE id='$id'";
     mysqli_query($conn, $sql);
     
    header("location: ../Medicine_schedule.php?submit=success");
  ?> 