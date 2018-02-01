<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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


			$sql = 'SELECT * FROM login WHERE username = "'.$_POST['username'].'";';
			$result = $conn->query($sql);
			
			
			$field_cnt = mysqli_num_rows($result);
		
			//echo $field_cnt." Results";
		
			
			if( $field_cnt > 0)
			{
				echo "username already exist";
				
			}
			else
			{
				$stmt = $conn->prepare("INSERT INTO login (username, password) VALUES (?,?)");
				$stmt->bind_param('ss',$_POST['username'], $_POST['password']);
	
				// set parameters and execute
				$stmt->execute();
				echo "insert success<br>";
				header( "Location: http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/login.php" ) ;
				$stmt->close();
			}
			
		
		$conn->close();

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
    <div class="col-md-6">

<?php
//stay right here in createAccount after submit form
//the new account can not have the same name as an exist account
?>
<h1>you are successfully login</h1>
   <h4>Enter you new username and password<h4>
   <form action = "http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/createAccount.php" method = "post" >
        <input type = "text" name = "username" placeholder="Username" maxlength="15" required> <br>
        <input type="password" name = "password" placeholder="Password" maxlength="15" required><br>
		<input type="password" name = "Repassword" placeholder="Re-Type Password" maxlength="15" required><br>

		<input type = "submit" class="btn btn-primary" name= "register" value="register">
		</form>
		
<?php
if(isset($_POST['register']))
	{
		 checkAccount();
		 	//header( 'Location: http://cs3380.rnet.missouri.edu/~jpph3/HW2/register.php' ) ;
	}



?>

		
		
		
   
   

		
    </div>
  </div>
</div>



</body>
</html>
