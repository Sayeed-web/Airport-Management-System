<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>





    <style type="text/css">
    	
body{

padding: 0;
margin:0
background-color: black

}
#container{




}
.image{

height: 200px;
width: 200px;
transition: 1s;
display: flex;
align-items: center;
justify-content: center; 

}

.first{
	background: url(../bootstrap/images/fb.png);
	background-size: 200px;

	box-shadow: inset 0 0 10px 100px rgba(165,38,158,0.75);


}

.image:hover{

box-shadow: inset 0 0 0 0 rgba(255,255,255,0.75);



}

.label{
	color:white;
	height: 45px;
	width: 150px;
	font-size: 20px;
	text-align: center;
	padding-top: 50px;
	padding-bottom: 50px;
	padding-right: 180px;
	border-top: 1.5px solid white; 
	border-bottom: 1.5px solid white; 
	transition: 0.5s;
	text-transform: uppercase;
	font-family: 'Raleway',sans-serif;
	font-weight: bolder;


}

.image:hover .label {

	font-size: 0;
	border:none;
	opacity: 1;


}

.second{
	background: url(../bootstrap/images/veladoner-thumb.jpg);
	background-size: 200px;
	position: relative;
	top: 50px;
	box-shadow: inset 0 0 10px 100px rgba(255,255,51,0.8);

}

.third{
	background: url(../bootstrap/images/qari.jpeg);
	background-size: 200px;
	position: relative;
	bottom: 400px ;
	left:250px;
	box-shadow: inset 0 0 10px 100px rgba(153,255,51,0.8);

}



.fourd{
	background: url(../bootstrap/images/wandaleere-thumb.jpg);
	background-size: 200px;
	position: relative;
	bottom: 350px;
	left:250px; 
	box-shadow: inset 0 0 10px 100px rgba(255,51,133,0.8);

}

.Developer{

margin-right:60px;
position: absolute;
margin-top:90px;
color: white;
font-weight: bolder;


}

.Technical{

margin-right:60px;
position: absolute;
margin-top:90px;
color: #262626;
font-weight: bolder;


}

.view3{

margin-right:60px;
position: absolute;
margin-top:90px;
color: lightblue;
font-weight: bolder;


}

.view4{

margin-right:60px;
position: absolute;
margin-top:90px;
color: lightblue;
font-weight: bolder;


}


.speech{
color:white;
margin-left: 30px;
margin-top: 0px;

}





    </style>
</head>
<body style="background-color: #262626;" class="container">


		<div class="row">
			<nav class="navbar navbar-reverse" role="navigation" style="background-color: #428bca;">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" style="background-color: rgb(204,0,51)">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar" style="background-color: white;"></span>
			        <span class="icon-bar"style="background-color: white;"></span>
			        <span class="icon-bar "style="background-color: white;"></span>
			      </button>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="navbar">
			      <ul class="nav navbar-nav">
			      	<li class="active"><a href="Home.php" style="color: white;font-weight:bolder;">Home</a></li>

			        <li class="active"><a href="Airport.php" style="color: white;font-weight:bolder;">Airport</a></li>
			        <li><a href="Flight.php" style="color: white;font-weight:bolder;">Flight</a></li>
			        <li><a href="Worker.php" style="color: white;font-weight:bolder; ">Worker</a></li>

			        <li><a href="store.php" style="color: white;font-weight:bolder; ">Store</a></li>

			        <li><a href="Captain.php" style="color: white;font-weight:bolder; ">Captain</a></li>

			        <li><a href="passenger.php" style="color: white;font-weight:bolder; ">Passenger</a></li>

			        <li><a href="Ticket.php" style="color: white;font-weight:bolder; ">Ticket</a></li>

			        <li><a href="equipment.php" style="color: white;font-weight:bolder; ">Equipment</a></li>

			        <li><a href="User.php" style="color: white;font-weight:bolder; ">Users</a></li>
			         <li><a href="Tools.php" style="color: white;font-weight:bolder; ">Tools</a></li>
			       

			        <li><a href="about us.html" style="color: white;font-weight:bolder; ">About Us</a></li>
			      </ul>
			    </div><!-- end navbar-collapse -->
			  </div><!-- end container-fluid -->
			</nav>
		</div>



		





<!-- start -->

	<div style="margin-left: 400px;margin-right: 400px;color: white">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crude";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT name, departure_airport, company_name FROM v3";
$result = $conn->query($sql);

?>


<div class="row justify-content-center" style="float: left;padding-top: 100px">
	
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Dep Airport</th>
				<th colspan="2">Company Name</th>
			</tr>
		</thead>

<?php

if ($result->num_rows > 0) :?>
	<?php
    // output data of each row
    while($row = $result->fetch_assoc()):
        // echo "name: " . $row["name"]. " - Dep Airport: " . $row["departure_airport"]. " " . $row["company_name"]. "<br>";
?>
	
        	<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['departure_airport']; ?></td>
		
			<td><?php echo $row['company_name']; ?></td>

		</tr>


    <?php endwhile; ?>
 	<?php endif; ?>


	</table>


	

</div>



	</div>

<!-- end -->



<!-- start -->

	<div style="margin-left: 400px;margin-right: 400px;color: white;margin-top: 50px;">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crude";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "CALL count_pass();";
$result = $conn->query($sql);

?>


<div class="row justify-content-center" style="float: left;padding-top: 100px">
	
	<table class="table">
		<thead>
			<tr>
				<th>Total Passengers</th>
				
			</tr>
		</thead>

<?php

if ($result->num_rows > 0) :?>
	<?php
    // output data of each row
    while($row = $result->fetch_assoc()):
        // echo "name: " . $row["name"]. " - Dep Airport: " . $row["departure_airport"]. " " . $row["company_name"]. "<br>";
?>
	
        	<tr>
			<td><?php echo $row['COUNT(id)'] ?></td>
		

		</tr>


    <?php endwhile; ?>
 	<?php endif; ?>


	</table>


	

</div>



	</div>

<!-- end -->


<!-- start -->

	<div style="margin-left: 400px;margin-right: 400px;color: white;margin-top: 50px;">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crude";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "CALL sum_money();";
$result = $conn->query($sql);

?>


<div class="row justify-content-center" style="float: left;padding-top: 100px">
	
	<table class="table">
		<thead>
			<tr>
				<th></th>
				<th>Total Money</th>
			</tr>
		</thead>

<?php

if ($result->num_rows > 0) :?>
	<?php
    // output data of each row
    while($row = $result->fetch_assoc()):
        // echo "name: " . $row["name"]. " - Dep Airport: " . $row["departure_airport"]. " " . $row["company_name"]. "<br>";
?>
	
        	<tr>
        		<td ><?php echo'                        ' ?></td>
			<td ><?php echo $row['SUM(ticket.price)'] ?></td>
			
		

		</tr>


    <?php endwhile; ?>
 	<?php endif; ?>


	</table>


	

</div>



	</div>

<!-- end -->




<!-- start -->

	<div style="margin-left: 400px;margin-right: 400px;color: white;margin-top: 50px;">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crude";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM `log`";
$result = $conn->query($sql);

?>


<div class="row justify-content-center" style="float: left;padding-top: 100px">
	
	<table class="table">
		<thead>
			<tr>
					<th>User</th>
				<th>Note</th>
				<th colspan="2">Event Time</th>
			</tr>
		</thead>

<?php

if ($result->num_rows > 0) :?>
	<?php
    // output data of each row
    while($row = $result->fetch_assoc()):
        // echo "name: " . $row["name"]. " - Dep Airport: " . $row["departure_airport"]. " " . $row["company_name"]. "<br>";
?>
	
        	<tr>
			<td><?php echo $row['ByUser'] ?></td>
			<td><?php echo $row['Note'] ?></td>
			<td><?php echo $row['EventTime'] ?></td>

		</tr>


    <?php endwhile; ?>
 	<?php endif; ?>


	</table>


	

</div>



	</div>

<!-- end -->




</body>
</html>