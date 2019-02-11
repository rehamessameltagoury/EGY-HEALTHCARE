
<?php

	include_once 'dbh_inc.php';

    
	$name = $_POST['newName'];
    $time = $_POST['newTime'];
    //$id   = $row[0];
    $id      = $_POST['id'];
    $sql = "UPDATE appointment SET Dr_name='$name' , App_time='$time' WHERE id='$id'";
     mysqli_query($conn, $sql);
     
    header("location: ../App_schedule.php?submit=success");



    ?> 
