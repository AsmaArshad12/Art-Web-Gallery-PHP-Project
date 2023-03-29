<?php
session_start();
require '../database.php';
if(isset($_POST['addtocart'])){
	if(isset($_POST['productid'])){
			$product = $_POST['productid'];
			$userid=$_SESSION["client_id"];
			$quantity= 1;
			
					$query="INSERT INTO  cart VALUES ('','$product','$userid','$quantity')";
					$results=mysqli_query($connection,$query);
					if($results){
						
						echo("<script>alert('Product Added To Cart');</script>");
					}else{echo mysqli_error($connection);}	
	}else{echo("<script>alert('Select Product first');</script>");}
}
	$clientid=$_SESSION["client_id"];
	$query="SELECT * FROM cart WHERE cart_user_id='$clientid' ";
	$data=mysqli_query($connection,$query);
	$result=mysqli_num_rows($data);

?>

<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="style/style.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="logo-search">
			<form method="post" action="">
				<div class="search-box">
					<input class="search-txt" type="text" name="searcProduct" placeholder="Type to search">
					<button class="btn btn-success" name="searchBtn" style="margin-top:-9px;margin-right:-6px">Search</button>
				</div>
				</form>
				<div class="cart">
					<i class="fas fa-shopping-cart" id="cartlogo"></i>
					<h4 class="btn btn-success"><a href="confirmorder.php" style="color:white">Cart (<?php echo $result;?> items)</a></h4>
				</div>
			
		</div>
	</nav>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<a class="navbar-brand" href="clientHome.php">Client Panel</a>
			<div class="container">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item active">
						<a class="nav-link mr-3" href="clientHome.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="btn btn-danger btn-sm mt-2 mr-3 " href="manageorder.php">My Orders</a>
					</li>

					<li class="nav-item">
						<a class="btn btn-danger btn-sm mt-2 mr-3" href="view_Artists.php">View Artists</a>
					</li>


					<li class="nav-item">
						<a class="btn btn-danger btn-sm mt-2 mr-3" href="myfeedback.php">My Feedback</a>
					</li>
				</ul>
			</div>
			<form class="form-inline my-2 my-lg-0">
				<a href="../logout.php" class="btn btn-outline-warning btn-success my-2 my-sm-0" type="submit">Logout</a>
			</form>

		</div>
	</nav>