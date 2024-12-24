
<?php 

session_start();




$mysqli=new mysqli('localhost','root','','crude') or die(mysql_error($mysqli));
$id=0;  

$update=false;
$name='';
$type='';
$fk_airport='';


if (isset($_POST['save'])) {

$name=$_POST['name'];
	$type=$_POST['type'];
	$fk_airport=$_POST['fk_airport'];





$mysqli->query("INSERT INTO `equipment`(`name`, `type`, `fk_airport`) VALUES ('$name','$type','$fk_airport')") or die($mysqli->error);


$_SESSION['message']="Record has been saved!";
$_SESSION['msg_type']="success";

header("location: equipment.php");
}

if (isset($_GET['delete'])) {

	$id=$_GET['delete'];
	$mysqli->query("DELETE FROM equipment WHERE id=$id") or die($mysqli->error());

	$_SESSION['message']="Record has been deleted!";
 	$_SESSION['msg_type']="Danger";

 	header("location: equipment.php");

}

if (isset($_GET['edit'])) {

	$id=$_GET['edit'];

	$update=true;

	$result=$mysqli->query("SELECT * FROM equipment WHERE id=$id") or die($mysqli->error());

	if (count($result)==1) {

		$row=$result->fetch_array();
		$name=$row['name'];
		$type=$row['type'];
		$fk_airport=$row['fk_airport'];
	}
}


if (isset($_POST['update'])) {
	
	$id=$_POST['id'];
	$name=$_POST['name'];
	$type=$_POST['type'];
	$fk_airport=$_POST['fk_airport'];


	

	$mysqli->query("UPDATE `equipment` SET `name`='$name',`type`='$type',`fk_airport`='$fk_airport' WHERE id=$id") or die($mysqli->error);

	$_SESSION['message']="Record has been updated!";
	$_SESSION['msg_type']="warning";

	header('location: equipment.php');
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


<h1 style="text-align: center; font-weight: bolder;">Equipment Section</h1>




<form action="equipment.php" method="post">
	<input type="text" name="input_search" placeholder="Search value" class="form-control">
	<input type="submit" value="Search" name="search" class="btn-info" style="margin-top: 20px;">
</form>





<!-- result show -->

<div class="container" > 

<div style="float: right;margin-top: -100px;">

<?php 


$mysqli=new mysqli('localhost','root','','crude') or die(mysql_error($mysqli));
// $result=$mysqli->query("SELECT * FROM equipment") or die($mysqli->error);


if (isset($_POST['search'])) {


	


	$searchq=$_POST['input_search'];

	 $searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
	// $search=mysqli_real_escape_string($_POST[])

	$sql="SELECT * FROM equipment WHERE name LIKE '%$searchq%' or Type LIKE '%$searchq%'or fk_airport LIKE '%$searchq%'";

	$result=mysqli_query($mysqli,$sql); //or die("could not search");
}

 ?>

<div class="row justify-content-center" style="float: left;padding-top: 100px">
	
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Type</th>
				<th>Airport ID</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>



<?php if (isset($_POST['search'])): ?>

		<?php 

		while ($row =$result->fetch_assoc()):   ?>

		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['type']; ?></td>
			<td><?php echo $row['fk_airport']; ?></td>
			<td>
				
				<a href="equipment.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>


				<a href="equipment.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>

			</td>

		





		</tr>
	<?php endwhile; ?>
 					<?php endif; ?>


	</table>

</div>

</div>


</div> 

















<?php require_once 'equipment.php'; ?>





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
<form action="equipment.php" method="POST">

	<input type="hidden" name="id" value="<?php echo $id ?>">

	 <div class="form-group">  

	<label>Name</label>
	<input type="text" name="name" value="<?php echo $name;?>" class="form-control" placeholder="Enter Equipment Name">
	 </div> 







	 <div class="form-group"> 
	<label>Type</label>
	<input type="text" name="type" value="<?php echo $type;?>" class="form-control" placeholder="Enter Equipment Type">
	
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
$result=$mysqli->query("SELECT * FROM equipment") or die($mysqli->error);

 ?>

<div class="row justify-content-center" style="float: left;padding-top: 100px">
	
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Type</th>
				<th>Airport ID</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>





		<?php 
		while ($row =$result->fetch_assoc()):  ?>

		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['type']; ?></td>
			<td><?php echo $row['fk_airport']; ?></td>
			<td>
				
				<a href="equipment.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>


				<a href="equipment.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>

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
<!-- end edit and search -->

</body>
</html>