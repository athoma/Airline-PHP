<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Attendants</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">


<style type="text/css">
body {
	background-color: #CCC;

}

</style>
</head>
<body>

 <?php
	//connect to server
	$path = "/var/www/html/group/CS3380GRP19/www/secure/datasecure.php";
	//echo "Path : $path";
	require "$path";
	//create connection
	$conn = new mysqli(HOST, USERNAME , PASSWORD, DBNAME);

	//check connection
	if($conn->connect_error)
	{
		die("Connection failed:" . $conn->connect_error);
	}

////////////////////we need keyyyyyyyyyyy
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/index.php">Home</a></li>
        <li><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/reservation.php">Book Flights</a></li>
        <li><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/costume.php">My trip/ Check in</a></li>
         <li><a href="../www/login.php">Login</a></li>

      </ul>
    </div>
  </div>
</nav>


<div class="jumbotron text-center">
  <h1>Missouri Airline</h1>
  <center><h3>Attendants</h3></center>
</div>

<!--
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <h3>Menu</h3>
      <form action = "../www/admin.php" method = "post" >


		<input type = "radio" name = "choice" value = "3" required> Course ID<br>
		<input type = "submit" class="btn btn-primary" name= "submit" value="Search"></input></center>
		<input type = "submit" class="btn btn-info" name= "submit" value="Submit"></input>

		<br><br>
	</form>
    </div>
    <div class="col-md-9">
      <h3>Show Result </h3>
 -->
 <div class="container">
  <div class="row">
    <div class="col-md-2">
	  <nav class="w3-sidenav w3-white w3-card-2" style="width:15%;left:0;">
  <br>
  <a href="#info">information</a>
  <a href="#past">past flight</a>
  <a href="#current">Current flight</a>
  <a href="#coming">Coming Flights</a>
 
</nav>

<a  name="info"></a>
  <div class="content-section-a">
    <div class="container">
		printinfo();
    </div>
  </div>

<a  name="past"></a>
  <div class="content-section-a">
    <div class="container">

    </div>
  </div>


<a  name="current"></a>
  <div class="content-section-a">
    <div class="container">

    </div>
  </div>
  
<a  name="coming"></a>
  <div class="content-section-a">
    <div class="container">

    </div>
  </div>


</div>
 <div class="col-md-10">
      <h3>Class table </h3>
</div>
<div>
<?php
function printinfo()
{
	
}

?>

</body>
</html>
