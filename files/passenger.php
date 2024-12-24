

<!-- process.php -->

<?php 

session_start();




$mysqli=new mysqli('localhost','root','','crude') or die(mysql_error($mysqli));
$id=0;  

$update=false;
$name='';
$seat_class='';
$price='';
$flight_time='';
$contact_number='';
$fk_flight='';


if (isset($_POST['save'])) {

	$name=$_POST['name'];
$seat_class=$_POST['seat_class'];
$price=$_POST['price'];
$flight_time=$_POST['flight_time'];
$contact_number=$_POST['contact_number'];
$fk_flight=$_POST['fk_flight'];




// $mysqli->query("INSERT INTO `store`(`name`, `place`, `store_type`, `product_type`, `airport_name`,'fk_worker','fk_airport') VALUES ('$name','$place','$store_type','$product_type','$airport_name','$fk_worker','$fk_airport')") or die($mysqli->error);


// $mysqli->query("INSERT INTO `passenger`(`name`,  `seat class`, `price`,'$seat_class','$price','$flight_time','$contact_number','$fk_flight')") or die($mysqli->error);

$mysqli->query("INSERT INTO `passenger`(`name`, `seat class`, `price`, `flight time`, `contact number`, `fk_flight`) VALUES ('$name','$seat_class','$price','$flight_time','$contact_number','$fk_flight')") or die($mysqli->error);



$_SESSION['message']="Record has been saved!";
$_SESSION['msg_type']="success";

header("location: passenger.php");
}

if (isset($_GET['delete'])) {

	$id=$_GET['delete'];
	$mysqli->query("DELETE FROM passenger WHERE id=$id") or die($mysqli->error());

	$_SESSION['message']="Record has been deleted!";
 	$_SESSION['msg_type']="Danger";

 	header("location: passenger.php");

}

if (isset($_GET['edit'])) {

	$id=$_GET['edit'];

	$update=true;

	$result=$mysqli->query("SELECT * FROM `passenger` WHERE id=$id ") or die($mysqli->error());

	if (count($result)==1) {
			
		$row=$result->fetch_array();
		$name=$row['name'];
		$seat_class=$row['seat class'];
		$price=$row['price'];
		$flight_time=$row['flight time'];
		$contact_number=$row['contact number'];
		$fk_flight=$row['fk_flight'];
		
		
	}
}


if (isset($_POST['update'])) {
	
	 $id=$_POST['id'];

	

	$name=$_POST['name'];
$seat_class=$_POST['seat_class'];
$price=$_POST['price'];
$flight_time=$_POST['flight_time'];
$contact_number=$_POST['contact_number'];
$fk_flight=$_POST['fk_flight'];

	

$mysqli->query("UPDATE `passenger` SET `name`='$name',`seat class`='$seat_class',`price`='$price',`flight time`='$flight_time',`contact number`='$contact_number',`fk_flight`='$fk_flight' WHERE id=$id");



	$_SESSION['message']="Record has been updated!";
	$_SESSION['msg_type']="warning";

	header('location: passenger.php');
}

if (!$mysqli) {
	echo "Connection faild";
}





 ?>





















<!-- 

<?php 
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

	$sql="SELECT * FROM `passenger` WHERE name LIKE '%$searchq%' or 'seat class' LIKE '%$searchq%' or 'price' LIKE '%$searchq%' or 'flight time' LIKE '%$searchq%' or 'contact number' LIKE '%$searchq%' or 'fk_flight' LIKE '%$searchq%'";    
// single quad problem must be problem in above

	$result=mysqli_query($conn,$sql) or die("could not search");

//$count=mysql_num_rows($query);


if (mysqli_num_rows($result)>0) {
	while ($row=mysqli_fetch_assoc($result)) {
	echo "name:".$row["name"]."<br>".
	"Seat Class:".$row["seat class"]."<br>"."Price:".$row["price"]."<br>".
	"Flight Time:".$row["flight time"]."<br>"."Contact Number:".$row["contact number"]."<br>".
	"Flight:".$row["fk_flight"]."<br>"
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

<h1 style="text-align: center; font-weight: bolder;">Passenger Section</h1>





<form action="passenger.php" method="post">
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
	

$sql="SELECT * FROM `passenger` WHERE name LIKE '%$searchq%' or 'seat class' LIKE '%$searchq%' or 'price' LIKE '%$searchq%' or 'flight time' LIKE '%$searchq%' or 'contact number' LIKE '%$searchq%' or 'fk_flight' LIKE '%$searchq%'";   

	$result=mysqli_query($mysqli,$sql); //or die("could not search");
}

 ?>

<div class="row justify-content-center" style="float: left;padding-top: 100px">
	
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Seat Class</th>
				<th>Price</th>
				<th>Flight Time</th>
				<th>Contact Number</th>
				<th>Flight Number</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>



<?php if (isset($_POST['search'])): ?>

		<?php 

		while ($row =$result->fetch_assoc()):   ?>

		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['seat class']; ?></td>
			<td><?php echo $row['price']; ?></td>
			<td><?php echo $row['flight time']; ?></td>
			<td><?php echo $row['contact number']; ?></td>
			<td><?php echo $row['fk_flight']; ?>
				
			</td>
			<td>
				
				<a href="passenger.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>


				<a href="passenger.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>

			</td>


		</tr>
	<?php endwhile; ?>
 					<?php endif; ?>


	</table>

</div>

</div>


</div> 








<?php require_once 'passenger.php'; ?>





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
<form action="passenger.php" method="POST">

	<input type="hidden" name="id" value="<?php echo $id ?>">

	 <div class="form-group">  

	<label>Name</label>
	<input type="text" name="name" value="<?php echo $name;?>" class="form-control" placeholder="Enter passenger Name">
	 </div> 




<!--  extera-->
<div class="form-group"> 

	<label>Seat Class</label>
	<input type="text" name="seat_class" value="<?php echo $seat_class;?>" class="form-control" placeholder="Enter Seat Class">
	
	 </div> 


	 <div class="form-group"> 

	<label>Price</label>
	<input type="text" name="price" value="<?php echo $price;?>" class="form-control" placeholder="Enter Price">
	
	 </div> 



	 <div class="form-group"> 

	<label>Flight Time</label>
	<input type="text" name="flight_time" value="<?php echo $flight_time;?>" class="form-control" placeholder="Enter Flight Time">
	
	 </div> 






	 <div class="form-group"> 

	<label>Contact Number</label>
	<input type="text" name="contact_number" value="<?php echo $contact_number;?>" class="form-control" placeholder="Enter Contact Number">
	
	 </div> 



	 <div class="form-group"> 

	<label>Flight Number</label>
	<input type="text" name="fk_flight" value="<?php echo $fk_flight;?>" class="form-control" placeholder="Enter Flight Number">




	
<?php  $mysqli=new mysqli('localhost','root','','crude') or die(mysql_error($mysqli));

$resultSet=$mysqli->query("SELECT id,departure_airport FROM flight");

?>

	<select>

<option>

<?php 
;
while ($rows=$resultSet->fetch_assoc()) {
	

	$Flight_id=$rows['id'];
	$Flight_name=$rows['departure_airport'];
	echo "<option value='$Flight_id'>$Flight_id----$Flight_name</option>";
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
$result=$mysqli->query("SELECT * FROM passenger") or die($mysqli->error);

 ?>


















<div class="row justify-content-center" style="float: left;padding-top: 100px">
	
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Seat Class</th>
				<th>Price</th>
				<th>Flight Time</th>
				<th>Contact Number</th>
				<th>Flight Number</th>
				
				<th colspan="2">Action</th>
			</tr>
		</thead>



		<?php 
		while ($row =$result->fetch_assoc()):  ?>

		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['seat class']; ?></td>
			<td><?php echo $row['price']; ?></td>
			<td><?php echo $row['flight time']; ?></td>
			<td><?php echo $row['contact number']; ?></td>
			<td><?php echo $row['fk_flight']; ?></td>
		
			<td>
				
				<a href="passenger.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>


				<a href="passenger.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>

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