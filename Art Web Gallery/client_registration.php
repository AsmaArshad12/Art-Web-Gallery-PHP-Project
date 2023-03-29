<?php
require 'database.php';
$msg= null;
if(isset($_POST['registration'])){

	$name = $_POST['fullName'];
	$contact_no = $_POST['contact'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query="INSERT INTO  client VALUES ('','$name','$contact_no','$address','$email','$username','$password')";
	$results=mysqli_query($connection,$query);
	if($results){
		$msg="Client Registered Successfully";
		echo('<script>alert("'.$msg.'");window.location.replace("index.php");</script>');
	}
	else{echo mysqli_error($connection);
	}}
	?>
<!DOCTYPE html>
<html>
<head>
<title> Client Registration</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Welcome To Art Web Gallery</a>
	<div class="container">
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
				<a href="client_registration.php" class="btn btn-danger mr-3">Client Registeration</a>
				</li>
				<li class="nav-item">
					<a href="registration.php" class="btn btn-danger mr-3">Artist Registeration</a>
				</li>
				<li class="nav-item">
				<a href="index.php" class="btn btn-warning">Login</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
	<body class="bg-primary">
		<div class="container">
			<div class="col-md-12">
				<div class="row">
					<div class="card p-0 col-md-6 offset-md-3 mt-2">
						<div class="card-header bg-info">
							<h1 class="text-center">Client Registration Panel</h1>
						</div>
						<div class="card-body bg-white">
							<form method="post" action="">
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="fullName" class="form-control" placeholder="Enter your Full Name" required>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" placeholder="Enter your Email " required>
								</div>

								<div class="form-group">
									<label>Address</label>
									<input type="text" name="address" class="form-control" placeholder="Enter your Address " required>
								</div>
								<div class="form-group">
									<label>Contact</label>
									<input type="text" name="contact" class="form-control" placeholder="Enter your Contact No" required>
								</div>
								<div class="form-group">
									<label>User Name</label>
									<input type="text" name="username" class="form-control" placeholder="Enter Your Login userName " required>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control" placeholder="Enter Password" required>
								</div>

								<div class="form-group">
									<button name="registration" class="btn btn-primary btn-block">Register</button>

								</div>

							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<style media="screen">
.card{
	border: 5px solid green;
	border-radius: 10px;
}
h1{

	color: white;
	font-size: revert;
	font-style: initial;
	font-family: ui-monospace;
	font-weight: 900;
}
label {
	color: black;
	font-family: -webkit-body;
}
.form-control{
	color: black;
	font-family: -webkit-body;
}

</style>
