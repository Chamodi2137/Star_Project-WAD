<?php
	
	$name = $_POST["name"];
	$Email = $_POST["email"];
	$password = $_POST["pass"];
	$contactnumber = $_POST["CNum"];
	$address = $_POST["address"];
	

	$con = mysqli_connect("localhost:3306","root","","customerdb");
	
	if(!$con)
	{
		die("Cannot connect to database server");
	}

	$sql = "INSERT INTO `customer` (`customerid`, 'name`, `address`, `email`, `password`, `contactno`) VALUES ('', '".$name."', '".$address."', '".$Email."', '".$password."', '".$contactnumber."');";

	mysqli_query($con,$sql);

	mysqli_close($con);
	header('Location:login.php');
?>