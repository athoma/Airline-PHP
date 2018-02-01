<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Book a flight</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">
  // $( function() {
//   $("#datepicker").datepicker({
//      minDate: +1,
//      maxDate: '+3M +10D',
//      changeMonth: true,
//      onSelect: function(dateText, inst){
//                var the_date = new Date(dateText);
//                $("#datepicker2").datepicker('option', 'minDate', the_date);
//      }
//  });
//  $("#datepicker2").datepicker();
//
//   } );




$(function() {
    $( "#StartDay" ).datepicker({
        // before datepicker opens run this function
        beforeShow: function(){
            // this gets today's date
            var theDate = new Date();
            // sets "theDate" 2 days ahead of today
            theDate.setDate(theDate.getDate() + 1);
            // set min date as 2 days from today
            $(this).datepicker('option','minDate',theDate);
        },
        // When datepicker for start date closes run this function
        onClose: function(){
            // this gets the selected start date
            var theDate = new Date($(this).datepicker('getDate'));
            // this sets "theDate" 1 day forward of start date
            theDate.setDate(theDate.getDate() + 1);
            // set min date for the end date as one day after start date
            $('#EndDay').datepicker('option','minDate',theDate);

        }
    });
    $( "#EndDay" ).datepicker();
});
  </script>


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
        <li><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/customer.php">My trip/ Check in</a></li>
 		<li><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP19/www/login.php">Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="jumbotron text-center">
    <div class="row">
        <div class="col-md-12">
            <h1>Missouri Airline</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>Fly with your own risk</p>
        </div>
    </div>
</div>


<div class="container text-center">
  <div class="row">
      <div class="col-md-12">
          <h3>You can pick a time and a place</h3>
      </div>
      <form action = "../www/reservation.php" method = "post" >

		From:<input type = "text" name = "From" value ="From"placeholder="From" required>
      	To:<input type = "text" name = "To" value="To" placeholder="To" required>
      	 <br>Depart: <input type="text" id="StartDay" required>
   			Return: <input type="text" id="EndDay" required>
   		<input type = "submit" class="btn btn-info" name= "Search" value="Search"></input>


     </form>
    </div>
</div>








</body>
</html>
