<?php 

session_start();




$mysqli=new mysqli('localhost','root','','crude') or die(mysql_error($mysqli));
$id=0;  

$update=false;
$name='';
$password='';                 //for connecting input pass var password to edit password var in this form






//user section
if (isset($_POST['save'])) {

$name=$_POST['name'];
$password=$_POST['pass'];


$mysqli->query("INSERT INTO user (user_name,password) VALUES('$name','$password')") or die($mysqli->error);


$_SESSION['message']="Record has been saved!";
$_SESSION['msg_type']="success";

header("location: User.php");
}

if (isset($_GET['delete'])) {

	$id=$_GET['delete'];
	$mysqli->query("DELETE FROM user WHERE id=$id") or die($mysqli->error());

	$_SESSION['message']="Record has been deleted!";
 	$_SESSION['msg_type']="Danger";

 	header("location: User.php");

}

if (isset($_GET['edit'])) {

	$id=$_GET['edit'];

	$update=true;

	$result=$mysqli->query("SELECT * FROM user WHERE id=$id") or die($mysqli->error());

	if (count($result)==1) {

		$row=$result->fetch_array();
		$name=$row['user_name'];                    //db name and pass
		$password=$row['password'];                 //these var  is input field= <?php echo $password;> text  pass=pass
	}
}


if (isset($_POST['update'])) {
	
	$id=$_POST['id'];
	$name=$_POST['name'];                    //user.php id name
	$password=$_POST['pass'];

	$mysqli->query("UPDATE user SET user_name='$name',password='$password' WHERE id=$id") or die($mysqli->error);

	$_SESSION['message']="Record has been updated!";
	$_SESSION['msg_type']="warning";

	header('location: User.php');
}

if (!$mysqli) {
	echo "Connection faild";
}






