<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">


<style type="text/css">



body {font-family: "Lato", sans-serif;
background-color: #CCC;

}

ul.tab {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Float the list items side by side */
ul.tab li {float: left;}

/* Style the links inside the list items */
ul.tab li a {
    display: inline-block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of links on hover */
ul.tab li a:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
ul.tab li a:focus, .active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    -webkit-animation: fadeEffect 1s;
    animation: fadeEffect 1s;
}

@-webkit-keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}

@keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
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
        <li><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/reservation.php">Book Flights</a></li>
        <li><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/customer.php">My trip/ Check in</a></li>
         <li><a href="../www/login.php">Login</a></li>

      </ul>
    </div>
  </div>
</nav>


<!-- 
<div class="jumbotron text-center">
  <h1>Missouri Airline</h1>
  <center><h3>Administrator</h3></center>
</div>
 -->

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
 
 <ul class="tab">
  <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Pilots')">Pilots</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Attendants')">Attendants</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Custumers')">Custumers</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Flights')">Flights</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Airplanes')">Airplanes</a></li>

</ul>

<div id="Pilots" class="tabcontent">
  
  <div class="container">
  	<div class="row">
    	<div class="col-md-2">
    	 <h3>Search by...</h3>
      	<form action = "http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/admin.php" method = "post" >
		<input type = "text" name = "names" placeholder = "type keyword" required>
		<br>
		Search for ...<br>
		<input type = "radio" name = "choice" value = "1" required> FirstName<br>
		<input type = "radio" name = "choice" value = "2" required> LastName<br>
		<input type = "radio" name = "choice" value = "3" required> Username<br><br>
		
		<input type = "submit" class="btn btn-info" name= "Psubmit" value="Psubmit"></input>
		

		<br>
	</form>
	<form action = "http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/addPilot.php" method = "post" >
	<input type = "submit" class="btn btn-info" name= "addPilot" value="Add Pilot"></input>
	</form>
    	 
    	 
    	 
   		</div><?php  //end col2?>
   		<div class="col-md-10">
    	
    	<?php

      //create array input
      	if(isset($_POST['Psubmit']))
		{
			$nameC = "{$_POST['names']}%";
			switch($_POST['choice'])
			{
				case 1:
						$choiceC = "fname";
					break;
				case 2:
						$choiceC = "lname";
					break;
				case 3:
						$choiceC = "username";
					break;
			}
		
		
			//$stmt = $conn->stmt_init();
			$sql = "SELECT * FROM employees WHERE $choiceC LIKE ?";
			$stmt = $conn->prepare($sql);
			
			//var_dump($conn);
			

		    $stmt->bind_param("s" , $nameC);
 			$stmt->execute();
 		   
			
			table($stmt->get_result());
		}
	   	
?>
    	
    	
    	
   		</div>
   </div>
  </div>
  
  
  
  
</div>

<div id="Attendants" class="tabcontent">
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p>
</div>

<div id="Flights" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>

<div id="Custumers" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>









<div id="myModal" class="modal"><?php //pilot ?>

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">×</span>
    <h1>Are you sure? </h1>
    <p1>You you want to delete the user?</p1>
    
    <form method='POST' action='http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/admin.php' >
    	<input type="hidden" id="username" name="username" value="">
		<input type="submit" class="btn btn-danger" name = "question"  value = "Yes">
		<input type="submit" class="btn btn-info"   name = "question"  value = "No">
	</form>
	
	
	
<?php
	if(isset($_POST['question']))
	{
	
		switch($_POST['question'])
		{
			case 'Yes'://District and population from springfield
				$sql = "DELETE FROM employees WHERE username = ?";
				
				$stmt = $conn->prepare($sql);
			    $stmt->bind_param("s" , $_POST['username']);
 				$stmt->execute();
 				$stmt->fetch_assoc();
			
				//COUNT(Population) AS 'ROWS'
				$result = $conn->query($sql);
				$field_cnt = mysqli_num_rows($result);
				echo $field_cnt." Results";
			
				break;
			case 'No':
				//do nothing
				break;
	
		}
	}
?>
<?php
//print table function
function table($result)
{//for pilot


		echo '<table class="table table-bordered">';
		echo '<tr>';
				
			echo '<head>';	
			echo "<th>";
			echo 'employ ID';
			echo "</th>";
			echo "<th>";
			echo 'firstname';
			echo "</th>";
			echo "<th>";
			echo 'Lastname';
			echo "</th>";
			echo "<th>";
			echo 'certification';
			echo "</th>";
			echo "<th>";
			echo 'status';
			echo "</th>";
			echo "<th>";
			echo 'total Hours';
			echo "</th>";
			echo "<th>";
			echo 'rank';
			echo "</th>";
			echo "<th>";
			echo 'username';
			echo "</th>";
		//the extra row
			echo "<th>";
			echo 'Update';
			echo "</th>";
			echo "<th>";
			echo 'Delete';
			echo "</th>";
			
		echo '</tr>';
		//output data of each row
		echo '<tr>';
		
		echo '<tr>';
		$counter=0;
		$value;
		while($rows = $result->fetch_assoc())
		{
			echo '<tr>';
			foreach($rows as $row)
			{
				echo "<td>$row</td>";
				//echo $row;
				$counter++;
				//echo $counter."<br>";
				
				if($counter===8)
				{
    				$value = $row;
    				echo $row;	
				}
				if($counter === 10)
    			{
    				$counter = 0;
    			}
			}
		//inside php, form has to be echo
		//add pilot
		//echo "Hello from the other side";
		echo "<form method='POST' action='http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/updatePilot.php?key=$value' >";
		echo '<td><input type="submit" class="btn btn-success" name = "update" value = "Update"/></td>';
		echo "</form>";
		
		echo '<td><input type="submit" class="btn btn-danger" onclick="javascript:deleteRec(\''.$value.'\');" name = "delete" value = "Delete"/></td>';
		echo '</tr>';
		}
	
}

?>


<script>
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

function deleteRec(id)
		{
		document.getElementById('username').value = id;
		modal.style.display = "block";
		}
	// Get the modal
	var modal = document.getElementById('myModal');

	// Get the button that opens the modal
	var btn = document.getElementsByClassName("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal
	btn.onclick = function() {
		modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
		modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
		modal.style.display = "none";
		}
	}

</script>

</body>
</html>
