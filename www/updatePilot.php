<!DOCTYPE html>
<!--Jitdawan Pawanna-->
<!--jpph3-->

<html>
	<head>
		<title> Update Pilot </title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	
<body>
	<a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/updatePilot.php">update pilot</a>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

<!-- 
<?php
	// $option = "";
// 
// 	if($_SERVER["REQUEST_METHOD"] == "POST")
// 	{
// 		$option = test_input($_POST["option"]);
// 		
// 	}

	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>
 -->
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

<?php
if(isset($_GET['key']) && isset($_POST))
{
	echo $_GET['key']." is a username <br>";


	$clear= $_GET['key'];
	$sql = "SELECT * FROM employees WHERE username = 'apple'";
	//$sql = "SELECT * FROM employees where uername = '$clear'";	
	$result = $conn->query($sql);
		
	if($result-> num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$empID = $row['empID'];
			$fname =$row['fname'];
			$lname =$row['lname'];
			$certification =$row['certification'];
			$status = $row['status'];	
			$totalHours = $row['totalHours'];
			$rank = $row['rank'];
			$username = $row['username'];	
		}	
	}
	else
	{
		echo " Can not reach the data";
	}
			
}
else
{
	header("Location: ../www/admin.php ");
}
?>
<?php //what to update:empID,fname,lname,certification,status, totalHours,rank,username ?>


<center><h1>Update Page</h1></center>
<br><br>
<form action = "http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/updatePilot.php" method = "post" >

	<input type = "text" name = "username" placeholder="Username" value="<?php echo $username?>" readonly>
	<input type = "text" name = "empID" placeholder="Employee ID" value="<?php echo $empID?>" >
	<input type = "text" name = "fname" placeholder="First name" value = "<?php echo $fname?>" required>
	<input type = "text" name = "lname" placeholder="Last Name" value = "<?php echo $lname?>"required>
	<input type = "text" name = "certification" placeholder=" Certification" value = "<?php echo $certification?>"required>

				<br><br>
<select required class="btn btn-default dropdown-toggle" name = "status" >
	<option value = "<?php echo $startP?>"><?php echo $status?></option>
	<option value = "active" >active</option>
	<option value = "inactive" >inactive</option>
</select>

<input type = "text" name = "totalHours" placeholder="totalHours" value = "<?php echo $totalHours?>"required>

<select required class="btn btn-default dropdown-toggle" name = "rank" >
	<option value = "<?php echo $rank?>"><?php echo $rank?></option>
	<option value = "captain" >Captain</option>
	<option value = "firstOfficer" >First Officer</option>
</select>


<br><br>

<div class="container">
	<input type = "submit" class="btn btn-primary" name= "submit" value="Enter"></input>
		</div>
			</form>
 
<?php

	
	
if(isset($_POST['submit']))
{
	//check connection
	
$sql = "UPDATE employees SET empID = ?, fname = ?, lname = ?, certification = ?, status = ?, totalHours = ?, rank = ? WHERE username = ?";
	$stmt = $conn->prepare($sql);

	if ($stmt === FALSE) {
		die($conn->error);
	}

$stmt->bind_param('ssssssss',$_POST['empID'],$_POST['fname'],$_POST['lname'],$_POST['certification'],$_POST['status'],$_POST['totalHours'],
	$_POST['rank'],$_POST['username']);
	$stmt->execute();
	
	$stmt->close();
	echo "The records update successfully";
	
}

?>


</div>
</body>
</html>
