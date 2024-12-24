

<!-- process.php -->

<?php 

session_start();




$mysqli=new mysqli('localhost','root','','crude') or die(mysql_error($mysqli));
$id=0;  

$update=false;
$name='';
$shift='';
$gender='';
$company_name='';
$fk_airport='';





if (isset($_POST['save'])) {




		$name=$_POST['name'];
$shift=$_POST['shift'];
$gender=$_POST['gender'];
$company_name=$_POST['company_name'];
$fk_airport=$_POST['fk_airport'];






// $mysqli->query("INSERT INTO `passenger`(`name`, `flight number`, `seat class`, `price`, `flight time`, `contact number`, `fk_flight`) VALUES ('$name','$flight_number','$seat_class','$price','$flight_time','$contact_number','$fk_flight')") or die($mysqli->error);


$mysqli->query("INSERT INTO `captain`(`name`, `shift`, `gender`, `company_name`, `fk_airport`) VALUES ('$name','$shift','$gender','$company_name','$fk_airport')") or die($mysqli->error);





$_SESSION['message']="Record has been saved!";
$_SESSION['msg_type']="success";

header("location: captain.php");
}

if (isset($_GET['delete'])) {

	$id=$_GET['delete'];
	$mysqli->query("DELETE FROM captain WHERE id=$id") or die($mysqli->error());

	$_SESSION['message']="Record has been deleted!";
 	$_SESSION['msg_type']="Danger";

 	header("location: captain.php");

}

if (isset($_GET['edit'])) {

	$id=$_GET['edit'];

	$update=true;

	$result=$mysqli->query("SELECT * FROM `captain` WHERE id=$id ") or die($mysqli->error());

	if (count($result)==1) {
			
		$row=$result->fetch_array();
		$name=$row['name'];
		$shift=$row['shift'];
		$gender=$row['gender'];
		$company_name=$row['company_name'];
		$fk_airport=$row['fk_airport'];
		
		
		
	}
}


if (isset($_POST['update'])) {
	
	 $id=$_POST['id'];

	$name=$_POST['name'];
$shift=$_POST['shift'];
$gender=$_POST['gender'];
$company_name=$_POST['company_name'];
$fk_airport=$_POST['fk_airport'];


	

// $mysqli->query("UPDATE `passenger` SET `name`='$name',`flight number`='$flight_number',`seat class`='$seat_class',`price`='$price',`flight time`='$flight_time',`contact number`='$contact_number',`fk_flight`='$fk_flight' WHERE id=$id");


$mysqli->query("UPDATE `captain` SET `name`='$name',`shift`='$shift',`gender`='$gender',`company_name`='$company_name',`fk_airport`='$fk_airport' WHERE id=$id");




	$_SESSION['message']="Record has been updated!";
	$_SESSION['msg_type']="warning";

	header('location: captain.php');
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

	$sql="SELECT * FROM `captain` WHERE name LIKE '%$searchq%' or 'shift' LIKE '%$searchq%' or 'gender' LIKE '%$searchq%' or 'company name' LIKE '%$searchq%' or 'fk_airport' LIKE '%$searchq%' ";    
// single quad problem must be problem in above

	$result=mysqli_query($conn,$sql) or die("could not search");

//$count=mysql_num_rows($query);






if (mysqli_num_rows($result)>0) {
	while ($row=mysqli_fetch_assoc($result)) {
	echo "name:".$row["name"]."<br>"."Shift:".$row["shift"]."<br>".
	"Gender:".$row["gender"]."<br>"."Company Name:".$row["company name"]."<br>".
	"Airport:".$row["fk_airport"]."<br>"
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


<h1 style="text-align: center; font-weight: bolder;">Captain Section</h1>





<form action="captain.php" method="post">
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
	

$sql="SELECT * FROM `captain` WHERE name LIKE '%$searchq%' or 'shift' LIKE '%$searchq%' or 'gender' LIKE '%$searchq%' or company_name LIKE '%$searchq%' or 'fk_airport' LIKE '%$searchq%' ";

	$result=mysqli_query($mysqli,$sql); //or die("could not search");
}

 ?>

<div class="row justify-content-center" style="float: left;padding-top: 100px">
	
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Shift</th>
				<th>Gender</th>
				<th>Company Name</th>
				<th>Airport ID</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>



<?php if (isset($_POST['search'])): ?>

		<?php 

		while ($row =$result->fetch_assoc()):   ?>

		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['shift']; ?></td>
			<td><?php echo $row['gender']; ?></td>
			<td><?php echo $row['company_name']; ?></td>
			<td><?php echo $row['fk_airport']; ?></td>
			<td>
				
				<a href="captain.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>


				<a href="captain.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>

			</td>


		</tr>
	<?php endwhile; ?>
 					<?php endif; ?>


	</table>

</div>

</div>


</div> 






<?php require_once 'captain.php'; ?>





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
<form action="captain.php" method="POST">

	<input type="hidden" name="id" value="<?php echo $id ?>">

	 <div class="form-group">  

	<label>Name</label>
	<input type="text" name="name" value="<?php echo $name;?>" class="form-control" placeholder="Enter Captain Name">
	 </div> 

	 <div class="form-group"> 

	<label>Shift</label>
	<input type="text" name="shift" value="<?php echo $shift;?>" class="form-control" placeholder="Enter Captain Shift Place">
	
	 </div> 




<!--  extera-->
<div class="form-group"> 

	<label>Gender</label>
	<input type="text" name="gender" value="<?php echo $gender;?>" class="form-control" placeholder="Enter Captain Gender">
	
	 </div> 


	 <div class="form-group"> 

	<label>Company Name</label>
	<input type="text" name="company_name" value="<?php echo $company_name;?>" class="form-control" placeholder="Enter Company Name">
	
	 </div> 







	 <div class="form-group"> 

	<label>Airport ID</label>
	<input type="text" name="fk_airport" value="<?php echo $fk_airport;?>" class="form-control" placeholder="Enter Airport ID">



<?php  $mysqli=new mysqli('localhost','root','','crude') or die(mysql_error($mysqli));

$resultSet=$mysqli->query("SELECT id,name from data");

?>

	<select>

<option>

<?php 
;
while ($rows=$resultSet->fetch_assoc()) {
	

	$Airport_id=$rows['id'];
	$Airport_name=$rows['name'];
	echo "<option value='$Airport_id'>$Airport_id--------- $Airport_name</option>";
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
$result=$mysqli->query("SELECT * FROM captain") or die($mysqli->error);

 ?>


















<div class="row justify-content-center" style="float: left;padding-top: 100px">
	
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Shift</th>
				<th>Gender</th>
				<th>Company Name</th>
				<th>Airport ID</th>
				
				
				<th colspan="2">Action</th>
			</tr>
		</thead>




		<?php 
		while ($row =$result->fetch_assoc()):  ?>

		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['shift']; ?></td>
			<td><?php echo $row['gender']; ?></td>
			<td><?php echo $row['company_name']; ?></td>
			<td><?php echo $row['fk_airport']; ?></td>

			
		
			<td>
				
				<a href="captain.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>


				<a href="captain.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>

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