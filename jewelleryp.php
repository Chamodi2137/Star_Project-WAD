<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>jewellery</title>
<link rel="stylesheet" href="jewelleryc.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="http:/stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
	<h2>New Jewellery</h2>
	<div class="row">
	<div class="col-md-3">
	<div class="product-top">
	<img src="ban2.jpg">
		<div class="overlay">
		
		<button type="button" class="btn btn-secondary" title="Add to Cart"><i class="fa fa-shopping"></i></button>
	    </div>
	</div>
		<div class="product-bottom text-center">
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star-half-o"></i>
		<i class="fa fa-star-o"></i>
			<h3>Bangles</h3>
			<h5>RS5000.00</h5>
		</div>
	</div>
		
		
		<div class="col-md-3">
	<div class="product-top">
	<img src="neck1.jpg">
		<div class="overlay">
		
		<button type="button" class="btn btn-secondary" title="Add to Cart"><i class="fa fa-shopping"></i></button>
	    </div>
	</div>
		<div class="product-bottom text-center">
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star-o"></i>
			<h3>Necklaces</h3>
			<h5>RS8000.00</h5>
		</div>
	</div>
		
		
	<div class="col-md-3">
	<div class="product-top">
	<img src="rin1.jpg">
		<div class="overlay">
		
		<button type="button" class="btn btn-secondary" title="Add to Cart"><i class="fa fa-shopping"></i></button>
	    </div>
	</div>
		<div class="product-bottom text-center">
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star-half-o"></i>
			<h3>Rings</h3>
			<h5>RS1000.00</h5>
		</div>
	</div>
		
		
	<div class="col-md-3">
	<div class="product-top">
	<img src="ear2.jpg">
		<div class="overlay">
		
		<button type="button" class="btn btn-secondary" title="Add to Cart"><i class="fa fa-shopping"></i></button>
	    </div>
	</div>
		<div class="product-bottom text-center">
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
			<h3>Earrings</h3>
			<h5>RS3000.00</h5>
		</div>
	</div>
	</div>
	</div>
	
	
<?php 
session_start();
$connect = mysqli_connect("localhost:3306", "root", "", "customerdb");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "productid");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'productid'		=>	$_GET["productid"],
				'productname'	=>	$_POST["productname"],
				'price'		=>	$_POST["price"],
				'details'		=>	$_POST["details"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'productid'		=>	$_GET["productid"],
			'productname'	=>	$_POST["productname"],
			'price'		=>	$_POST["price"],
			'details'		=>	$_POST["details"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["productid"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="index.php"</script>';
			}
		}
	}
}

?>
</body>
</html>
