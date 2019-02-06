<!DOCTYPE html>
<html>
<head>
	<html>
<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1" >
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

</html>


<?php



global $con ;
$con= mysqli_connect('localhost','root','');

if (! $con) {
	echo "Not connected to server!";
}

if (! mysqli_select_db($con,'healthcare system')) {
	echo "Database not selected";
}

$patient=$_POST['full_name'];
$email=$_POST['e_mail'];
$dr=$_POST['dr_name'];
$depp=$_POST['dr_dep'];
$time=$_POST['day'];

//check that the doctor and appointment day entered by user exist
$sql1= "SELECT name,department FROM doctors WHERE name = '$dr' AND department='$depp' AND appointments LIKE ('%$time%')";
$result=mysqli_query($con,$sql1);

//executed when info. entered by user is valid
if(mysqli_num_rows($result)!=0) {

$sql2="INSERT INTO patients_appointments (name,email,doctor,department,appointment_day)
      VALUES ('$patient','$email','$dr','$depp','$time')";

if (!mysqli_query($con,$sql2)) {
	echo "Error saving data!";
}

else {

	echo '<div class="alert alert-success">
          <strong>Your appointment is successfully booked!</strong> </div>';
}
//header("refresh:2; url=book.html");
}

else {

echo '<div class="alert alert-danger">
      <strong>Error!Please check doctor name,department and appointment day.
              <h5>PS:check spelling or take them copy paste from the page.</h5></strong> </div>';

}



























?>