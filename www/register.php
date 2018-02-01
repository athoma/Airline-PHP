<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
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


?>



<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/index.php">Home</a></li>
        <li><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/reservation.php">Book a Flight</a></li>
        <li><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/customer.php">My trip/ Check in</a></li>
 		<li><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/login.php">Login</a></li>
      </ul>
    </div>
  </div>
</nav>




<div class="jumbotron text-center">
  <h1>Missouri Airline</h1>
  <p>Fly with your own risk</p>
</div>

<div class="container">
  <div class="row">
    
    <center><h2>Type the password that you have been given</h2></center>
    <div class="col-md-12">
      <center>
    	 <form action = "http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/register.php" method = "post" >
        <input type = "text" name = "username" placeholder="Username" maxlength="15" required></center>  <br>
<center><input type="password" name = "password" placeholder="Password" maxlength="15" required></center><br>
		<center><input type = "submit" class="btn btn-primary" name= "register" value="register"></input></center>
		
	
		</form>
    </div>

  </div>
</div>



<?php

if(isset($_POST['register']))
{


//echo "I gonna fine you<br>";

//check if the username is not dublicate from our database 
//not everybody can create the account
//the account will be given 
// echo "new password is ".$_POST['username'],$_POST['password']."<br>";
			$sql = 'SELECT * FROM newuser WHERE username = "'.$_POST['username'].'";';
			$result = $conn->query($sql);
			
			
			$field_cnt = mysqli_num_rows($result);
		
			echo $field_cnt." Results";
		
			
			if( $field_cnt > 0)
			{//newuser account is correct
			//link to the create page account
				echo "Congratulation your account is valid ^_^ <br>";
				header( 'Location: http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/createAccount.php' ) ;
				
			}
			else
			{//the add-in account is not correct
				echo "newusername or password is not correct<br>";
				echo "If you don't have one, contact the admin <love> <br>";
			
			}


}//end if
$conn->close();
?>

</body>
</html>
 