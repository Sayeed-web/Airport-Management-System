



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


<h1 style="text-align: center; font-weight: bolder;">Worker Section</h1>





<form action="Worker.php" method="post">
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
	

	$sql="SELECT * FROM Worker WHERE name LIKE '%$searchq%' or age LIKE '%$searchq%' or payment LIKE '%$searchq%' or job LIKE '%$searchq%'";

	//attr must be single for searching

	$result=mysqli_query($mysqli,$sql); //or die("could not search");
}

 ?>

<div class="row justify-content-center" style="float: left;padding-top: 100px">
	
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Age</th>
				<th>Payment</th>
				<th>Job</th>
				<th>Airport ID</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>



<?php if (isset($_POST['search'])): ?>

		<?php 

		while ($row =$result->fetch_assoc()):   ?>

		<tr>
		<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['age']; ?></td>
			<td><?php echo $row['payment']; ?></td>
			<td><?php echo $row['job']; ?></td>
			<td><?php echo $row['fk_airport']; ?></td>
			<td>
				
				<a href="Worker.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>


				<a href="Worker.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>

			</td>


		</tr>
	<?php endwhile; ?>
 					<?php endif; ?>


	</table>

</div>

</div>


</div> 






<?php require_once 'process_Worker.php'; ?>





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
<form action="process_Worker.php" method="POST">

	<input type="hidden" name="id" value="<?php echo $id ?>">

	 <div class="form-group">  

	<label>Name</label>
	<input type="text" name="name" value="<?php echo $name;?>" class="form-control" placeholder="Enter Worker Name">
	 </div> 

	 <div class="form-group"> 

	<label>Age</label>
	<input type="text" name="age" value="<?php echo $age;?>" class="form-control" placeholder="Enter Worker Age">
	
	 </div> 




<!--  extera-->
<div class="form-group"> 

	<label>Payment</label>
	<input type="text" name="payment" value="<?php echo $payment;?>" class="form-control" placeholder="Enter Worker Salary">
	
	 </div> 


	 <div class="form-group"> 

	<label>Job</label>
	<input type="text" name="job" value="<?php echo $job;?>" class="form-control" placeholder="Enter Worker Job">
	
	 </div> 



	 <div class="form-group"> 

	<label>Airport</label>
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
$result=$mysqli->query("SELECT * FROM worker") or die($mysqli->error);

 ?>

<div class="row justify-content-center" style="float: left;padding-top: 100px">
	
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Age</th>
				<th>Payment</th>
				<th>Job</th>
				<th>Airport ID</th>
				
				<th colspan="2">Action</th>
			</tr>
		</thead>


		<?php 
		while ($row =$result->fetch_assoc()):  ?>

		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['age']; ?></td>
			<td><?php echo $row['payment']; ?></td>
			<td><?php echo $row['job']; ?></td>
			<td><?php echo $row['fk_airport']; ?></td>
		
			<td>
				
				<a href="Worker.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>


				<a href="process_Worker.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>

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