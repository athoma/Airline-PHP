<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Check In</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style type="text/css">
body {
	background-color: #CCC;

}
</style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/index.php">Home</a></li>
        <li><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/reservation.php">Book a Flight</a></li>
        <li><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/costume.php">My trip/ Check in</a></li>
         <li><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/login.php">Login</a></li>

      </ul>
    </div>
  </div>
</nav>
<div class="jumbotron text-center">
  <h1>Missouri Airline</h1>
  <p>Fly with your own risk</p>
</div>
      <center><h3>Where are you going?</h3></center>
      <form action = "/~jpph3/lab8/lab8.php" method = "post" >
	<center><input type = "text" name = "firstname" placeholder="Passenger First Name" required>
	<input type = "text" name = "lastname" placeholder="Passenger Last Name " required>
	<input type = "text" name = "comfirmation" placeholder="Comfirmation Number " required>
	 <input type = "submit" class="btn btn-primary" name= "submit" value="Search"></input></center>





	</form>



</body>
</html>
