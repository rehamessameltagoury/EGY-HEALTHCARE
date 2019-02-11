
<?php

  include_once 'dbh_inc.php';

    
    $name = $_POST['newName'];
    $time = $_POST['newTime'];
    $id      = $_POST['id'];
    $sql = "UPDATE medicine SET medicine_name='$name' , medicine_time='$time' WHERE id='$id'";
     mysqli_query($conn, $sql);
     
    header("location: ../Medicine_schedule.php?submit=success");



    ?> 
