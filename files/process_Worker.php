<?php 

// session_start();


$mysqli=new mysqli('localhost','root','','crude') or die(mysql_error($mysqli));
$id=0;  

$update=false;
$name='';
$age='';
$payment='';
$job='';
$fk_airport='';


if (isset($_POST['save'])) {

$name=$_POST['name'];
$age=$_POST['age'];
$payment=$_POST['payment'];
$job=$_POST['job'];
$fk_airport=$_POST['fk_airport'];




$mysqli->query("INSERT INTO `worker`(`name`, `age`, `payment`, `job`, `fk_airport`) VALUES ('$name','$age','$payment','$job','$fk_airport')") or die($mysqli->error);



$_SESSION['message']="Record has been saved!";
$_SESSION['msg_type']="success";

header("location: Worker.php");
}

if (isset($_GET['delete'])) {

	$id=$_GET['delete'];
	$mysqli->query("DELETE FROM worker WHERE id=$id") or die($mysqli->error());

	$_SESSION['message']="Record has been deleted!";
 	$_SESSION['msg_type']="Danger";

 	header("location: Worker.php");

}

if (isset($_GET['edit'])) {

	$id=$_GET['edit'];

	$update=true;

	$result=$mysqli->query("SELECT * FROM worker WHERE id=$id") or die($mysqli->error());

	if (count($result)==1) {

		$row=$result->fetch_array();
		$name=$row['name'];
		$age=$row['age'];
		$payment=$row['payment'];
		$job=$row['job'];
		$fk_airport=$row['fk_airport'];
		
	}
}


if (isset($_POST['update'])) {
	
	$id=$_POST['id'];


	$name=$_POST['name'];
$age=$_POST['age'];
$payment=$_POST['payment'];
$job=$_POST['job'];
$fk_airport=$_POST['fk_airport'];
	

	// $mysqli->query("UPDATE worker SET name='$name',age='$age',payment='$payment',job='$job','fk_airport'='$fk_airport' WHERE id=$id") or die($mysqli->error);

	$mysqli->query("UPDATE `worker` SET `name`='$name',`age`='$age',`payment`='$payment',`job`='$job',`fk_airport`='$fk_airport' WHERE id=$id");

	$_SESSION['message']="Record has been updated!";
	$_SESSION['msg_type']="warning";

	header('location: Worker.php');
}

if (!$mysqli) {
	echo "Connection faild";
}




















 ?>