

<!-- process.php -->

<?php 

session_start();




$mysqli=new mysqli('localhost','root','','crude') or die(mysql_error($mysqli));
$id=0;  

$update=false;
$name='';
$place='';
$store_type='';
$product_type='';
$airport_name='';
$fk_worker='';
$fk_airport='';


if (isset($_POST['save'])) {

$name=$_POST['name'];
$place=$_POST['place'];
$store_type=$_POST['store_type'];
$product_type=$_POST['product_type'];
$airport_name=$_POST['airport_name'];
$fk_worker=$_POST['fk_worker'];
$fk_airport=$_POST['fk_airport'];




// $mysqli->query("INSERT INTO `store`(`name`, `place`, `store_type`, `product_type`, `airport_name`,'fk_worker','fk_airport') VALUES ('$name','$place','$store_type','$product_type','$airport_name','$fk_worker','$fk_airport')") or die($mysqli->error);


$mysqli->query("INSERT INTO `store`(`name`, `place`, `store_type`, `product_type`, `airport_name`, `fk_worker`, `fk_airport`) VALUES ('$name','$place','$store_type','$product_type','$airport_name','$fk_worker','$fk_airport')") or die($mysqli->error);




$_SESSION['message']="Record has been saved!";
$_SESSION['msg_type']="success";

header("location: store.php");
}

if (isset($_GET['delete'])) {

	$id=$_GET['delete'];
	$mysqli->query("DELETE FROM store WHERE id=$id") or die($mysqli->error());

	$_SESSION['message']="Record has been deleted!";
 	$_SESSION['msg_type']="Danger";

 	header("location: store.php");

}

if (isset($_GET['edit'])) {

	$id=$_GET['edit'];

	$update=true;

	$result=$mysqli->query("SELECT * FROM `store` WHERE id=$id ") or die($mysqli->error());

	if (count($result)==1) {
			
		$row=$result->fetch_array();
		$name=$row['name'];
		$place=$row['place'];
		$store_type=$row['store_type'];
		$product_type=$row['product_type'];
		$airport_name=$row['airport_name'];
		$fk_worker=$row['fk_worker'];
		$fk_airport=$row['fk_airport'];
		
		
	}
}




if (isset($_POST['update'])) {
	
	 $id=$_POST['id'];

	

	$name=$_POST['name'];
$place=$_POST['place'];
$store_type=$_POST['store_type'];
$product_type=$_POST['product_type'];
$airport_name=$_POST['airport_name'];
$fk_worker=$_POST['fk_worker'];
$fk_airport=$_POST['fk_airport'];

	


	// $mysqli->query("UPDATE `store` SET `name`='$name',`place`='$place',`store type`='$store_type',`product type`='$product_type',`airport name`='$airport_name',`fk_worker`=$fk_worker',`fk_airport`='$fk_airport' WHERE id=$id");

$mysqli->query("UPDATE `store` SET `name`='$name',`place`='$place',`store_type`='$store_type',`product_type`='$product_type',`airport_name`='$airport_name',`fk_worker`='$fk_worker',`fk_airport`='$fk_airport' WHERE id=$id");



	$_SESSION['message']="Record has been updated!";
	$_SESSION['msg_type']="warning";

	header('location: store.php');
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

	$sql="SELECT * FROM `store` WHERE name LIKE '%$searchq%' or place LIKE '%$searchq%' or 'store type' LIKE '%$searchq%' or 'product type' LIKE '%$searchq%' or 'airport name' LIKE '%$searchq%' or 'fk_worker' LIKE '%$searchq%' or 'fk_airport' LIKE '%$searchq%'";    
// single quad problem must be problem in above

	$result=mysqli_query($conn,$sql) or die("could not search");

//$count=mysql_num_rows($query);


if (mysqli_num_rows($result)>0) {
	while ($row=mysqli_fetch_assoc($result)) {
	echo "name:".$row["name"]."<br>"."Place:".$row["place"]."<br>".
	"Store Type:".$row["store type"]."<br>"."Product Type:".$row["product type"]."<br>".
	"Airport name:".$row["airport name"]."<br>"."Worker:".$row["fk_worker"]."<br>".
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


<h1 style="text-align: center; font-weight: bolder;">Store Section</h1>




<form action="store.php" method="post">
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
	

$sql="SELECT * FROM `store` WHERE name LIKE '%$searchq%' or place LIKE '%$searchq%' or store_type LIKE '%$searchq%' or product_type LIKE '%$searchq%' or airport_name LIKE '%$searchq%' or 'fk_worker' LIKE '%$searchq%' or 'fk_airport' LIKE '%$searchq%'";  

	$result=mysqli_query($mysqli,$sql); //or die("could not search");
}

 ?>

<div class="row justify-content-center" style="float: left;padding-top: 100px">
	
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Place</th>
				<th>Store Type</th>
				<th>PRoduct Type</th>
				<th>Airport Name</th>
				<th>Worker</th>
				<th>Airport</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>



<?php if (isset($_POST['search'])): ?>

		<?php 

		while ($row =$result->fetch_assoc()):   ?>

		<tr>
	 		<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['place']; ?></td>
			<td><?php echo $row['store_type']; ?></td>
			<td><?php echo $row['product_type']; ?></td>
			<td><?php echo $row['airport_name']; ?></td>
			<td><?php echo $row['fk_worker']; ?></td>
			<td><?php echo $row['fk_airport']; ?>
				
			</td>
			<td>
				
				<a href="store.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>


				<a href="store.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>

			</td>


		</tr>
	<?php endwhile; ?>
 					<?php endif; ?>


	</table>

</div>

</div>


</div> 







<?php require_once 'store.php'; ?>





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
<form action="store.php" method="POST">

	<input type="hidden" name="id" value="<?php echo $id ?>">

	 <div class="form-group">  

	<label>Name</label>
	<input type="text" name="name" value="<?php echo $name;?>" class="form-control" placeholder="Enter Store Name">
	 </div> 

	 <div class="form-group"> 

	<label>Place</label>
	<input type="text" name="place" value="<?php echo $place;?>" class="form-control" placeholder="Enter Place">
	
	 </div> 






<!--  extera-->
<div class="form-group"> 

	<label>Store Type</label>
	<input type="text" name="store_type" value="<?php echo $store_type;?>" class="form-control" placeholder="Enter Store Type">
	
	 </div> 


	 <div class="form-group"> 

	<label>Product Type</label>
	<input type="text" name="product_type" value="<?php echo $product_type;?>" class="form-control" placeholder="Enter Product Type">
	
	 </div> 



	 <div class="form-group"> 

	<label>Airport Name</label>
	<input type="text" name="airport_name" value="<?php echo $airport_name;?>" class="form-control" placeholder="Enter Airport Name">
	
	 </div> 






	 <div class="form-group"> 

	<label>Worker</label>
	<input type="text" name="fk_worker" value="<?php echo $fk_worker;?>" class="form-control" placeholder="Enter Worker Name">

		
<?php  $mysqli=new mysqli('localhost','root','','crude') or die(mysql_error($mysqli));

$resultSet=$mysqli->query("SELECT id,name from worker");

?>

	<select>

<option>

<?php 
;
while ($rows=$resultSet->fetch_assoc()) {
	

	$Worker_id=$rows['id'];
	$Worker_name=$rows['name'];
	echo "<option value='$Worker_id'>$Worker_id--------- $Worker_name</option>";
	// echo "<option value='$captain_name'>$captain_name</option>";
}

 ?>

</option>

	
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
$result=$mysqli->query("SELECT * FROM store") or die($mysqli->error);

 ?>


















<div class="row justify-content-center" style="float: left;padding-top: 100px">
	
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Place</th>
				<th>Store Type</th>
				<th>PRoduct Type</th>
				<th>Airport Name</th>
				<th>Worker</th>
				<th>Airport</th>
				
				<th colspan="2">Action</th>
			</tr>
		</thead>


		<?php 
		while ($row =$result->fetch_assoc()):  ?>

		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['place']; ?></td>
			<td><?php echo $row['store_type']; ?></td>
			<td><?php echo $row['product_type']; ?></td>
			<td><?php echo $row['airport_name']; ?></td>
			<td><?php echo $row['fk_worker']; ?></td>
			<td><?php echo $row['fk_airport']; ?></td>
		
			<td>
				
				<a href="store.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>


				<a href="store.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>

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