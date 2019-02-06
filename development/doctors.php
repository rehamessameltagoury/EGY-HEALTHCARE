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

<link rel="stylesheet" type="text/css" href="book_styling.css">

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
.bg {
    background-image: url("wallpaper.jpg");
    height: 100%; 
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
body, html {
    height: 100%;
    margin: 0;
}
* {
  box-sizing: border-box;
}
#myInput {
  background-image: url('searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}
#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}
#myUL li a:hover:not(.header) {
  background-color: #eee;
}
.dr{
	 background-color:white;
	 opacity: 0.7;
	 margin-top: 50px;
}
.drbutton{
	 background-color:white;
	 opacity: 0.7;
	 margin-top: 0px;
}
</style>

</head>

<div style="background-color:white;color:brown;padding:20px;height:120px">

  <div id="logo">
  <img src="logo.jpg" alt="logo">
  </div>
  
<a id="position_home" href="home.html" target="_self">Home</a> 
  
  <a id="position_about" href="about_us.html" target="_self">About us</a> 
  
  <a id="position_sign" href="Sign_Up_form.html" target="_self">Sign up/Login</a>
   
</div>

<div class="bg" style="text-align: center;">

<?php 
class Database {
		protected static $db = null;
		
		public static function connect($database, $uid, $pwd) {
			if(!empty(Database::$db)) return;
			$dsn = "mysql:host=localhost;dbname=$database";
			
			try {
		   		Database::$db = new PDO($dsn, $uid, $pwd);
			} catch(PDOException $e){
		   		echo $e->getMessage();
			}
		}
	}
class Doctor extends Database
{
	function __construct($id) {
			$sql = "SELECT * FROM doctors WHERE id = $id;";
			$statement = Database::$db->prepare($sql);
			$statement->execute();
			$data = $statement->fetch(PDO::FETCH_ASSOC);
			if(empty($data)){return;}
			foreach ($data as $key => $value) {
				$this->{$key} = $value;
			} }
	public static function doctors($input1,$input2,$input3) {
			$input1 = str_replace(" ", "%", $input1);
			$input2 = str_replace(" ", "%", $input2);
			$input3 = str_replace(" ", "%", $input3);
			$sql = "SELECT * FROM doctors WHERE name LIKE ('%$input1%') AND address LIKE ('%$input2%') AND department LIKE ('%$input3%');";
			$statement = Database::$db->prepare($sql);
			$statement->execute();
			$doctors = [];
			while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
				$doctors[] = new Doctor($row['id']);
			}
			return $doctors;
		}
	public static function all($keyword) {
			$keyword = str_replace(" ", "%", $keyword);
			$sql = "SELECT * FROM doctors WHERE department like ('%$keyword%');";
			$statement = Database::$db->prepare($sql);
			$statement->execute();
			$doctors = [];
			while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
				$doctors[] = new Doctor($row['id']);
			}
			return $doctors;
		}
	public static function allsymptoms($keyword) {
			$keyword = str_replace(" ", "%", $keyword);
			$sql = "SELECT * FROM doctors WHERE symptoms like ('%$keyword%');";
			$statement = Database::$db->prepare($sql);
			$statement->execute();
			$doctors = [];
			while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
				$doctors[] = new Doctor($row['id']);
			}
			return $doctors;
		}
}
Database::connect('healthcare system','root','');
if (isset($_GET['doc_name','city_name','area'])){
$doc=$_GET['doc_name','city_name','area'];
$doctors=Doctor::doctors($doc); 
foreach ($doctors as $doctor) {
		echo "<div class='dr'><p><B><h3> Dr/ $doctor->name</h3></B> <h4>$doctor->address</h4> <h4>$doctor->department</h4> <h4>$doctor->telephone</h4> </div>";
	    echo '<button type="button" class="btn btn-danger">Book</button> <button type="button" class="btn btn-danger">Review</button>';
	}
}
?>

</div>
</html>