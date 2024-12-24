
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
<style type="text/css">
	
	button{
		float: right;background: #555;padding: 10px 15px;color: #fff;border-radius: 5px;margin-right: 10px; border:none;
	}

button:hover{

background-color: green;
}

.error{
	background-color: #F1DEDE; color: #A94442;padding: 10px;width: 95%;border-radius: 5px; margin: 20px auto;
}

</style>

</head>
<body style="background-color: #1690A7; display: flex; justify-content: center; align-items: center; height: 100vh; box-sizing: border-box;">

<!--style of login-->
<div style="width: 500px;border:2px solid #ccc;padding: 30px;background-color: #fff;border-radius: 15px;">
	<form action="login.php" method="post">

<h2>Login</h2>


<?php 
if (isset($_GET['error'])) { ?>
	<p class="error"><?php echo $_GET['error']; ?></p>

 <?php } ?>



<label style="color: #888;font-size: 18px;padding: 10px;">User Name</label>


<input type="text" name="uname" placeholder="User Name" style="display: block;border:2px solid #ccc;width: 95%;padding: 10px;margin: 10px auto; border-radius: 5px;"><br>


<label style="color: #888;font-size: 18px;padding: 10px;">Password</label>


<input type="Password" name="password" placeholder="Password" style="display: block;border:2px solid #ccc;width: 95%;padding: 10px;margin: 10px auto; border-radius: 5px;"><br> 



<button type="submit">Login</button>


</form>
</div>
</body>
</html>