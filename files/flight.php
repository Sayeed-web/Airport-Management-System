

<!-- process.php -->

<?php 

session_start();




$mysqli=new mysqli('localhost','root','','crude') or die(mysql_error($mysqli));
$id=0;  

$update=false;
// $flight_number=0;
$departure_airport='';
$departure_hour='';
$arrival_airport='';
$arrival_hour='';
$fk_captain='';
$fk_passenger='';
$fk_ticket='';


if (isset($_POST['save'])) {

//	$flight_number=$_POST['flight_number'];
$departure_airport=$_POST['departure_airport'];
$departure_hour=$_POST['departure_hour'];
$arrival_airport=$_POST['arrival_airport'];
$arrival_hour=$_POST['arrival_hour'];
$fk_captain=$_POST['fk_captain'];









$mysqli->query("INSERT INTO `flight`(`departure_airport`, `departure_hour`, `arrival_airport`, `arrival_hour`, `fk_captain`) VALUES ('$departure_airport','$departure_hour','$arrival_airport','$arrival_hour','$fk_captain')");







$_SESSION['message']="Record has been saved!";
$_SESSION['msg_type']="success";

header("location: flight.php");
}

if (isset($_GET['delete'])) {

	$id=$_GET['delete'];
	$mysqli->query("DELETE FROM flight WHERE id=$id") or die($mysqli->error());

	$_SESSION['message']="Record has been deleted!";
 	$_SESSION['msg_type']="Danger";

 	header("location: flight.php");

}

if (isset($_GET['edit'])) {

	$id=$_GET['edit'];

	$update=true;

	$result=$mysqli->query("SELECT * FROM `flight` WHERE id=$id ") or die($mysqli->error());

	if (count($result)==1) {
			
		$row=$result->fetch_array();
		//$flight_number=$row['flight_number'];
		$departure_airport=$row['departure_airport'];
		$departure_hour=$row['departure_hour'];
		$arrival_airport=$row['arrival_airport'];
		$arrival_hour=$row['arrival_hour'];
		$fk_captain=$row['fk_captain'];
	
		
		
	}
}


if (isset($_POST['update'])) {
	
	 $id=$_POST['id'];

	
//	$flight_number=$_POST['flight_number'];
$departure_airport=$_POST['departure_airport'];
$departure_hour=$_POST['departure_hour'];
$arrival_airport=$_POST['arrival_airport'];
$arrival_hour=$_POST['arrival_hour'];
$fk_captain=$_POST['fk_captain'];







	

// $mysqli->query("UPDATE `passenger` SET `name`='$name',`flight number`='$flight_number',`seat class`='$seat_class',`price`='$price',`flight time`='$flight_time',`contact number`='$contact_number',`fk_flight`='$fk_flight' WHERE id=$id");


$mysqli->query("UPDATE `flight` SET `departure_airport`='$departure_airport',`departure_hour`='$departure_hour',`arrival_airport`='$arrival_airport',`arrival_hour`='$arrival_hour',`fk_captain`='$fk_captain' WHERE id=$id");



	$_SESSION['message']="Record has been updated!";
	$_SESSION['msg_type']="warning";

	header('location: flight.php');
}

if (!$mysqli) {
	echo "Connection faild";
}





 ?>























<!DOCTYPE html>
<html>
<head>
	<title>crude</title>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
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


<h1 style="text-align: center; font-weight: bolder;">Flight Section</h1>





<form action="flight.php" method="post">
	<input type="text" name="input_search" placeholder="Search value" class="form-control">
	<input type="submit" value="Search" name="search" class="btn-info" style="margin-top: 20px;">
</form>

<!--
search print
-->





<!-- search show -->

<div class="container" > 

<div style="float: right;margin-top: -100px;">

<?php 


$mysqli=new mysqli('localhost','root','','crude') or die(mysql_error($mysqli));



if (isset($_POST['search'])) {


	


	$searchq=$_POST['input_search'];

	 $searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
	

$sql="SELECT * FROM `flight` WHERE departure_airport LIKE '%$searchq%' or departure_hour LIKE '%$searchq%' or arrival_airport LIKE '%$searchq%' or arrival_hour LIKE '%$searchq%' ";

	$result=mysqli_query($mysqli,$sql); //or die("could not search");
}

 ?>

<div class="row justify-content-center" style="float: left;padding-top: 100px">
	
	<table class="table">
		<thead>
			<tr>
				<th>Flight Number</th>
				<th>Departure Airport</th>
				<th>Departure Hour</th>
				<th>Arrival Airport</th>
				<th>Arrival Houre</th>
				<th>Captain ID</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>



<?php if (isset($_POST['search'])): ?>

		<?php 

		while ($row =$result->fetch_assoc()):   ?>

		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['departure_airport']; ?></td>
			<td><?php echo $row['departure_hour']; ?></td>
			<td><?php echo $row['arrival_airport']; ?></td>
			<td><?php echo $row['arrival_hour']; ?></td>
			<td><?php echo $row['fk_captain']; ?></td>
			<td>
				
				<a href="flight.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>


				<a href="flight.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>

			</td>


		</tr>
	<?php endwhile; ?>
 					<?php endif; ?>


	</table>

</div>

</div>


</div> 







<?php require_once 'flight.php'; ?>





<?php 

if (isset($_SESSION['message'])): ?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">

	<?php 
echo $_SESSION['message'];
unset($_SESSION['message']);
	 ?>
</div>
<?php endif ?>




<div style="float: right; padding-right: 150px; padding-top: 100px;">
<form action="flight.php" method="POST">

	<input type="hidden" name="id" value="<?php echo $id ?>">

<!-- 	 <div class="form-group">  

	<label>Flight Number</label>
	<input type="text" name="flight_number" value="<?php echo $flight_number;?>" class="form-control" placeholder="Enter Worker Name">
	 </div>  -->

	 <div class="form-group"> 

	<label>Departure Airport</label>
	<input type="text" name="departure_airport" value="<?php echo $departure_airport;?>" class="form-control" placeholder="Enter Departure Airport">
	
	 </div> 


<!--  extera-->
<div class="form-group"> 

	<label>Departure Hour</label>
	<input type="text" name="departure_hour" value="<?php echo $departure_hour;?>" class="form-control" placeholder="Enter Departure Hour">
	
	 </div> 


	 <div class="form-group"> 

	<label>Arrival Airport</label>
	<input type="text" name="arrival_airport" value="<?php echo $arrival_airport;?>" class="form-control" placeholder="Enter Arrival Airport">
	
	 </div> 



	 <div class="form-group"> 

	<label>Arrival Hour</label>
	<input type="text" name="arrival_hour" value="<?php echo $arrival_hour;?>" class="form-control" placeholder="Enter Arrival Hour">
	
	 </div> 






	 <div class="form-group"> 

	<label>Captain</label>
	<input type="text" name="fk_captain" value="<?php echo $fk_captain;?>" class="form-control" placeholder="Enter Foriegn key Captain">
	

	
<?php  $mysqli=new mysqli('localhost','root','','crude') or die(mysql_error($mysqli));

$resultSet=$mysqli->query("SELECT id,name from captain");

?>

	<select>

<option>

<?php 
;
while ($rows=$resultSet->fetch_assoc()) {
	

	$captain_id=$rows['id'];
	$captain_name=$rows['name'];
	echo "<option value='$captain_id'>$captain_id--------- $captain_name</option>";
	// echo "<option value='$captain_name'>$captain_name</option>";
}

 ?>

</option>

	 </select>
	 </div> 
<!-- //navbar================================================================= -->






	 <div class="form-group"> 

		<?php if ($update == true):?>
			<button type="submit" class="btn btn-info" name="update">Update
	</button>

	<?php else: ?>

	<button type="submit" class="btn btn-success" name="save">Save
	</button>

<?php endif; ?>
	

	 </div> 

</form>
</div>




<div class="container"> 
<?php 
$mysqli=new mysqli('localhost','root','','crude') or die(mysql_error($mysqli));
$result=$mysqli->query("SELECT * FROM flight") or die($mysqli->error);

 ?>


















<div class="row justify-content-center" style="float: left;padding-top: 100px">
	
	<table class="table">
		<thead>
			<tr>
				<th>Flight Number</th>
				<th>Departure Airport</th>
				<th>Departure Hour</th>
				<th>Arrival Airport</th>
				<th>Arrival Houre</th>
				<th>Captain ID</th>
			
				
				<th colspan="2">Action</th>
			</tr>
		</thead>



		<?php 
		while ($row =$result->fetch_assoc()):  ?>

		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['departure_airport']; ?></td>
			<td><?php echo $row['departure_hour']; ?></td>
			<td><?php echo $row['arrival_airport']; ?></td>
			<td><?php echo $row['arrival_hour']; ?></td>
			<td><?php echo $row['fk_captain']; ?></td>
		
		
			<td>
				
				<a href="flight.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>


				<a href="flight.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>

			</td>





		</tr>
	<?php endwhile; ?>

	<?php 
function pre_r($array){

	echo '<pre>';
	print_r($array);
	echo '</pre>';

}

	 ?>

	</table>

</div>


</div>

</body>
</html>