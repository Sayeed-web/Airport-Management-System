<?php 
// session_start();
// include "process.php"

$sname="localhost";
$aname="root";
$password4444="";
$db_name="crude";
$conn=mysqli_connect($sname,$aname,$password4444,$db_name);

if (!$conn) {
	echo "Connection failed!";
}


if(isset($_POST['uname']) && isset($_POST['password'])) {

function validate($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
	$uname=validate($_POST['uname']);
	$pass=validate($_POST['password']);

	if (empty($uname)) { 

		header("Location: index.php?error=UserName is required");
	    exit();

// header("Location: index 11111111.php");


	}else if (empty($pass)) {
		header("Location: index.php?error=Password is required");
	    exit();

     // header("Location: index 11111111.php");

	}else{
		$sql="SELECT * FROM user WHERE user_name='$uname' AND password='$pass'";

		$result=mysqli_query($conn,$sql);

		if (mysqli_num_rows($result)==1) {
			 $row=mysqli_fetch_assoc($result);


			if ($row['user_name'] === $uname && $row['password'] === $pass) {
				
				header("Location: Home.php");
				exit();
			}else{
				
				header("Location: index.php?error=Incorect Username or password");
				    exit();
			}
		}
	}
	
}
else{


	header("Location: index.php");
	exit();
}


 ?>