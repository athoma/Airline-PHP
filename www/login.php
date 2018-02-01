
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>
<?php
//in this page (login), we check 3 things: username, password, and empType from login table

?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
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

function checkAccount()
{

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






	






			
		if($stmt = $conn->prepare("SELECT * FROM login WHERE username = ? AND password = ? AND empType = ?"))
		{
		$stmt->bind_param('???',$_POST['username'],$_POST['password'],$_POST['option']);
		$stmt->execute();
		}
		else{
		printf("Errormessage: %s\n", $conn->error);
		}
			
			
		//	$result = $conn->query($sql);
			$field_cnt = mysqli_num_rows($stmt);
		
			echo $field_cnt." Results";
			
			if( $field_cnt === 1)
				{
					session_start();
    				$_SESSION['name'] = $_POST['username'];
    				
    				if($_POST['option']==='admin')
    				{
    					header( "Location: http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/admin.php?" ) ;

    				}
    				else if($_POST['option']==='pilot')
    				{
    					header( "Location: http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/pilot.php?" ) ;

    				}
    				else if($_POST['option']==='attendant')
    				{
    					header( "Location: http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/attendant.php?" ) ;

    				}
					
				}
			else
			{
				
				echo " username or password or domain is incorrect";
			}
		
}

?>

<?php //header ?>
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
    <div class="col-md-6">


    </div>
    <div class="col-md-6">
      <center><h3>Login</h3>
		<form action = "http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/login.php" method = "post">
			<input type = "text" name = "username" placeholder="Username" maxlength="8" required></center><br>
			<center><input type="password" name = "password" placeholder="Password" maxlength="20" required></center><br>
			<center><select class="btn btn-default dropdown-toggle" name = "option" value = "option" required ></center>
						<option value = ""> Domain</option>
						<option value = "pilot">Pilot</option>
						<option value = "attendant">Fligth attendant</option>
						<option value = "admin">Admin</option>
						</select>

					<center><input type = "submit" class="btn btn-primary" name= "Login" value="Login"  ></input></center>


					don't have an account? 
					<a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/register.php">register</a>
		 </form>
		 
 <?php
	
	if(isset($_POST))
	{
		
		checkAccount();
		
	}

	//$stmt->close();
	//$conn->close();


?>

    </div>
  </div>
</div>



</body>
</html>
