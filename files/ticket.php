

<!-- process.php -->

<?php 

session_start();




$mysqli=new mysqli('localhost','root','','crude') or die(mysql_error($mysqli));
$id=0;  

$update=false;
$order_name='';
$seat_class='';
$price='';

$passenger_name='';
$fk_flight='';
$fk_passenger='';


if (isset($_POST['save'])) {

	$order_name=$_POST['order_name'];
$seat_class=$_POST['seat_class'];
$price=$_POST['price'];

$passenger_name=$_POST['passenger_name'];
$fk_flight=$_POST['fk_flight'];
$fk_passenger=$_POST['fk_passenger'];




// $mysqli->query("INSERT INTO `store`(`name`, `place`, `store_type`, `product_type`, `airport_name`,'fk_worker','fk_airport') VALUES ('$name','$place','$store_type','$product_type','$airport_name','$fk_worker','$fk_airport')") or die($mysqli->error);


// $mysqli->query("INSERT INTO `passenger`(`name`, `flight number`, `seat class`, `price`, `flight time`, `contact number`, `fk_flight`) VALUES ('$name','$flight_number','$seat_class','$price','$flight_time','$contact_number','$fk_flight')") or die($mysqli->error);


// $mysqli->query("INSERT INTO `ticket`(`order name`, `seat class`, `price`, `fk_flight`, `fk_passenger`) VALUES ('$order_name','$seat_class','$price','$flight_number','$passenger_name','$fk_flight','$fk_passenger')");


$mysqli->query("INSERT INTO `ticket`(`order_name`, `seat_class`, `price`, `passenger_name`, `fk_flight`, `fk_passenger`)  VALUES ('$order_name','$seat_class','$price','$passenger_name','$fk_flight','$fk_passenger')") or die($mysqli->error);


$_SESSION['message']="Record has been saved!";
$_SESSION['msg_type']="success";

header("location: ticket.php");
}

if (isset($_GET['delete'])) {

	$id=$_GET['delete'];
	$mysqli->query("DELETE FROM ticket WHERE id=$id") or die($mysqli->error());

	$_SESSION['message']="Record has been deleted!";
 	$_SESSION['msg_type']="Danger";

 	header("location: ticket.php");

}

if (isset($_GET['edit'])) {

	$id=$_GET['edit'];

	$update=true;

	$result=$mysqli->query("SELECT * FROM `ticket` WHERE id=$id ") or die($mysqli->error());

	if (count($result)==1) {
			
		$row=$result->fetch_array();
		$order_name=$row['order_name'];
		$seat_class=$row['seat_class'];
		$price=$row['price'];
		
		$passenger_name=$row['passenger_name'];
		$fk_flight=$row['fk_flight'];
		$fk_passenger=$row['fk_passenger'];


		
		
	}
}


if (isset($_POST['update'])) {
	
	 $id=$_POST['id'];

	


	$order_name=$_POST['order_name'];
$seat_class=$_POST['seat_class'];
$price=$_POST['price'];

$passenger_name=$_POST['passenger_name'];
$fk_flight=$_POST['fk_flight'];
$fk_passenger=$_POST['fk_passenger'];

	

// $mysqli->query("UPDATE `passenger` SET `name`='$name',`flight number`='$flight_number',`seat class`='$seat_class',`price`='$price',`flight time`='$flight_time',`contact number`='$contact_number',`fk_flight`='$fk_flight' WHERE id=$id");

$mysqli->query("UPDATE `ticket` SET `order_name`='$order_name',`seat_class`='$seat_class',`price`='$price',`passenger_name`='$passenger_name',`fk_flight`='$fk_flight',`fk_passenger`='$fk_passenger' WHERE id=$id");





	$_SESSION['message']="Record has been updated!";
	$_SESSION['msg_type']="warning";

	header('location: ticket.php');
}

if (!$mysqli) {
	echo "Connection faild";
}





 ?>























<!-- <?php 
$servername="localhost";
$username="root";
$password="";
$dbname="crude";
$conn=mysqli_connect($servername,$username,$password,$dbname)or die("could not connect");



if (!$conn) {
	die("Connection faild".mysqli_connect_error());
}





$output='';

if (isset($_POST['search'])) {
	$searchq=$_POST['input_search'];

	 $searchq=preg_replace("#[^0-9a-z]#i","",$searchq);

	$sql="SELECT * FROM `ticket` WHERE 'order name' LIKE '%$searchq%' or 'seat class' LIKE '%$searchq%' or price LIKE '%$searchq%' or  'passenger name' LIKE '%$searchq%' or 'fk_flight' LIKE '%$searchq%' or fk_passenger LIKE '%$searchq%'";   


// single quad problem must be problem in above

	$result=mysqli_query($conn,$sql) or die("could not search");

//$count=mysql_num_rows($query);


if (mysqli_num_rows($result)>0) {
	while ($row=mysqli_fetch_assoc($result)) {



	echo "Order Name:".$row["order name"]."<br>"."Seat Class:".$row["seat class"]."<br>".
	"Price:".$row["price"]."<br>".
	"Passenger Name:".$row["passenger name"]."<br>"."Flight:".$row["fk_flight"]."<br>".
	"Passenger:".$row["fk_passenger"]."<br>"
	;

	
	



	}
}else{
		echo "There is no like this data in Database!";
	}







// if ($count==0) {
// 	$output='there was no search results!';
	
// }else{
// while ($row=mysql_fetch_array($query)) {
// 	$fname=$row['name'];
// 	$lname=$row['location'];
// 	$id=$row['id'];

// 	$output .='<div>'.$fname.''.$lname.'</div>';
	 
// }

// }

}

mysqli_close($conn);

 ?> -->



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


<h1 style="text-align: center; font-weight: bolder;">Ticket Section</h1>



<form action="ticket.php" method="post">
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
	

	$sql="SELECT * FROM ticket WHERE order_name LIKE '%$searchq%' or seat_class LIKE '%$searchq%' or price LIKE '%$searchq%' or  passenger_name LIKE '%$searchq%' or fk_flight LIKE '%$searchq%' or fk_passenger LIKE '%$searchq%'";  

	  // single database attr mustnt have '' but double attr like order number must have''

	$result=mysqli_query($mysqli,$sql); //or die("could not search");
}

 ?>

<div class="row justify-content-center" style="float: left;padding-top: 100px">
	
	<table class="table">
		<thead>
			<tr>
				<th>Order Name</th>
				<th>Seat Class</th>
				<th>Price</th>
			
				<th>Passenger Name</th>
				<th>Flight</th>
				<th>Passenger</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>



<?php if (isset($_POST['search'])): ?>

		<?php 

		while ($row =$result->fetch_assoc()):   ?>

		<tr>
	 		<td><?php echo $row['order_name']; ?></td>
			<td><?php echo $row['seat_class']; ?></td>
			<td><?php echo $row['price']; ?></td>
		
			<td><?php echo $row['passenger_name']; ?></td>
			<td><?php echo $row['fk_flight']; ?></td>
			<td><?php echo $row['fk_passenger']; ?>
				
			</td>
			<td>
				
				<a href="ticket.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>


				<a href="ticket.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>

			</td>


		</tr>
	<?php endwhile; ?>
 					<?php endif; ?>


	</table>

</div>

</div>


</div> 







<?php require_once 'ticket.php'; ?>





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
<form action="ticket.php" method="POST">

	<input type="hidden" name="id" value="<?php echo $id ?>">

	 <div class="form-group">  

	<label>Order Name</label>
	<input type="text" name="order_name" value="<?php echo $order_name;?>" class="form-control" placeholder="Enter Order Name">
	 </div> 

	 <div class="form-group"> 

	<label>Seat Class</label>
	<input type="text" name="seat_class" value="<?php echo $seat_class;?>" class="form-control" placeholder="Enter Seat Class">
	
	 </div> 



<!--  extera-->
<div class="form-group"> 

	<label>Price</label>
	<input type="text" name="price" value="<?php echo $price;?>" class="form-control" placeholder="Enter Price">
	
	 </div> 





	 <div class="form-group"> 

	<label>Passenger Name</label>
	<input type="text" name="passenger_name" value="<?php echo $passenger_name;?>" class="form-control" placeholder="Enter Passenger Name">
	
	 </div> 






	 <div class="form-group"> 

	<label>Flight</label>
	<input type="text" name="fk_flight" value="<?php echo $fk_flight;?>" class="form-control" placeholder="Enter Flight Number">
	


<?php  $mysqli=new mysqli('localhost','root','','crude') or die(mysql_error($mysqli));

$resultSet=$mysqli->query("SELECT id,departure_airport from flight");

?>

	<select>

<option>

<?php 
;
while ($rows=$resultSet->fetch_assoc()) {
	

	$Flight_id=$rows['id'];
	$Flight_name=$rows['departure_airport'];
	echo "<option value='$Flight_id'>$Flight_id--------- $Flight_name</option>";
	// echo "<option value='$captain_name'>$captain_name</option>";
}

 ?>

</option>
</select>
	
	 </div> 



	 <div class="form-group"> 

	<label>Passenger</label>
	<input type="text" name="fk_passenger" value="<?php echo $fk_passenger;?>" class="form-control" placeholder="Enter Passenger ID">
	



<?php  $mysqli=new mysqli('localhost','root','','crude') or die(mysql_error($mysqli));

$resultSet=$mysqli->query("SELECT id,name from passenger");

?>

	<select>

<option>

<?php 
;
while ($rows=$resultSet->fetch_assoc()) {
	

	$Passenger_id=$rows['id'];
	$Passenger_name=$rows['name'];
	echo "<option value='$Passenger_id'>$Passenger_id--------- $Passenger_name</option>";
	// echo "<option value='$captain_name'>$captain_name</option>";
}

 ?>

</option>
</select>


	 </div> 








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
$result=$mysqli->query("SELECT * FROM ticket") or die($mysqli->error);

 ?>


















<div class="row justify-content-center" style="float: left;padding-top: 100px">
	
	<table class="table">
		<thead>
			<tr>
				<th>Order Name</th>
				<th>Seat Class</th>
				<th>Price</th>
			
				<th>Passenger Name</th>
				<th>Flight</th>
				<th>Passenger</th>


				
				<th colspan="2">Action</th>
			</tr>
		</thead>



		<?php 
		while ($row =$result->fetch_assoc()):  ?>

		<tr>
			<td><?php echo $row['order_name']; ?></td>
			<td><?php echo $row['seat_class']; ?></td>
			<td><?php echo $row['price']; ?></td>
		
			<td><?php echo $row['passenger_name']; ?></td>
			<td><?php echo $row['fk_flight']; ?></td>
			<td><?php echo $row['fk_passenger']; ?></td>
		
			<td>
				
				<a href="ticket.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>


				<a href="ticket.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>

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