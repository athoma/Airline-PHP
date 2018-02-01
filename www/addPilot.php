<!DOCTYPE html>
<!--Jitdawan Pawanna-->
<!--jpph3-->

<html>
	<head>
		<title> Add Pilot </title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	
<body>
	<a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/admin.php">Admin Page</a>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">


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


<?php //what to update:empID,fname,lname,certification,status, totalHours,rank,username ?>


<center><h1>Add Pilots Page</h1></center>
<br><br>
<form action = "http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/addPilot.php" method = "post" >

	<input type = "text" name = "username" placeholder="Username" required>
	<input type = "text" name = "empID" placeholder="Employee ID" " required>
	<input type = "text" name = "fname" placeholder="First name"  required>
	<input type = "text" name = "lname" placeholder="Last Name" required>
	<input type = "text" name = "certification" placeholder=" Certification" required>

				<br><br>
<select required class="btn btn-default dropdown-toggle" name = "status" >
	<option value = "">Status</option>
	<option value = "active" >active</option>
	<option value = "inactive" >inactive</option>
</select>

<input type = "text" name = "totalHours" placeholder="totalHours" >

<select required class="btn btn-default dropdown-toggle" name = "rank" >
	<option value = "">Rank</option>
	<option value = "captain" >Captain</option>
	<option value = "firstOfficer" >First Officer</option>
	<option value = "Senior" >Senior Officer</option>
</select>


<br><br>

<div class="container">
	<input type = "submit" class="btn btn-primary" name= "submit" value="Enter"></input>
</div>
		</form>
 
 
<?php

	
	
if(isset($_POST['submit']))
{
	
	
$sql = "INSERT INTO employees (empID ,fname,lname ,certification ,status ,totalHours ,rank ,username) VALUES (?,?,?,?,?,?,?,?)";
	$stmt = $conn->prepare($sql);
var_dump($stmt);
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
