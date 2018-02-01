<?php



echo "I gonna fine you<br>";
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
<!DOCTYPE html>
<html>
	<head>
		<title> example </title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
		

	</head>
	
<body><div class="row">
	<div class="col-md-8 col-md-offset-2">


<?php
	$option = "";

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$option = test_input($_POST["option"]);
		
	}

	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>



<br><br>
<form action = "http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/example.php" method = "post" >
<center><select class="btn btn-default dropdown-toggle" name = "option"></center>
	<option value = "12">Choose an option</option>
	<option value = "1">1 Springfield</option>
	


</select>

<br><br>

<div class="container">
  

  <center><input type = "submit" class="btn btn-info" name= "submit" value="Enter"></input></center>
</div>


</form>

<?php

switch($option)
{
	case 1://District and population from springfield
			$sql = "SELECT username, password FROM newuser WHERE username = 'back'";
			//COUNT(Population) AS 'ROWS'
			$result = $conn->query($sql);
			echo "<br><h4>Spring Field</h4>";
			
			
			$field_cnt = mysqli_num_rows($result);
			echo $field_cnt." Results";
			
			
			if($result->num_rows > 0)
			{
				echo '<table class="table table-bordered">';
				echo '<tr>';
				
				echo '<head>';	
				while($row = $result->fetch_field())
				{
					echo "<th>";
					echo $row->name;
					echo "</th>";
				}
				echo '</tr>';
				//output data of each row
				echo '<tr>';
				while($row = $result->fetch_assoc())
				{
					
					echo "<tr>";
					echo "<td>".$row['username']."</td>";
					echo "<td>".$row['password']."</td>";
					echo "</tr>";
					
				}
				echo '</tr>';
				 
				
			}
			else
			{
				echo "No Data";
			}
			break;
	
}
?>

</div>
</body>
</html>
