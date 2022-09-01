<!doctype html>
<html>
<head>
<title>Login Form</title>
<link rel="stylesheet" href="login.css">
</head>
<body>
	
	<form class="box" method="post" action="login.php" >
		<h1>Login</h1>
		<input type="text" name="txtname" placeholder="Username">
		<input type="password" name="txtpassword" placeholder="Password">
		<input type="submit" name="btnsubmit" value="Login">
		
		<a href="registration.php">Don't have an account?</a>
		
		<?php
		if(isset($_POST["btnsubmit"]))
		{
		$username=$_POST["txtname"];
		
		$password=$_POST["txtpassword"];
		$valid=false;
		
		$con=mysqli_connect("localhost:3306","root","","customerdb");
		if(!$con)
		{
		die("Cannot connect to DB server");
		}
		$sql="SELECT * FROM `customer` WHERE `email`='".$username."' and `password`='".$password."'";
		
		$result=mysqli_query($con,$sql);
		
		if(mysqli_num_rows($result)>0)
		{
		$valid=true;
		}
		mysqli_close($con);
		
		if($valid)
		{
			 $_SESSION["txtname"]=$username; 
           header('Location:home.php');  
		}
		else
		{
		echo "Please Enter correct Username and Password!";
		}
		
		}
		?>
	
	</form>
</body>
</html>
