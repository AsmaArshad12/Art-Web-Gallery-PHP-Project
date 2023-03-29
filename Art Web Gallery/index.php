<?php
include('database.php');
$msg= null;
if(isset($_POST['login'])){
	if(isset($_POST['username']) && isset($_POST['password'])){
		if(!empty($_POST['username']) && !empty($_POST['password'])){

			$username = $_POST['username'];
			$password = $_POST['password'];
			$usertype= $_POST['usertype'];
			if($usertype=='admin')
			{
				$query="SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
				{$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
							$row = mysqli_fetch_object($results);
							session_start();
							$_SESSION["admin_id"] = $row->Admin_ID;
							$_SESSION["admin_name"] = $row->name;

							header('Location:admin/AdminHome.php');
						}else{$msg = "Incorect Username Or Password";}
					}// db error code
				}
			}
			elseif($usertype=='artist'){
				$query="SELECT * FROM artist WHERE username = '$username' AND password = '$password'";{
					$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
							$row = mysqli_fetch_object($results);

							session_start();
							$_SESSION["artist_id"] = $row->ArtistID;
							$_SESSION["name"] = $row->Fullname;


							header('Location: artist/artistHome.php');

						}
					}else{$msg = "Incorect Username Or Password";}
				}// db error code
			}
			elseif($usertype=='client'){
				$query="SELECT * FROM client WHERE username = '$username' AND password = '$password'";{
					$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
							$row = mysqli_fetch_object($results);

							session_start();
							$_SESSION["client_id"] = $row->client_id;
							$_SESSION["client_name"] = $row->clientName;


							header('Location: client/clientHome.php');

						}
					}else{$msg = "Incorect Username Or Password";}
				}// db error code
			}
		}
	}else{$msg = "Fill all input fields";}
}

if(isset($msg))
{
	echo("<script>alert('".$msg."');</script>");
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Art Gallery</title>
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
			 <a href="registration.php" class="btn btn-danger mr-3">Artist Register</a>
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
				<div class="card p-0 col-md-4 offset-md-4 mt-4">
					<div class="card-header bg-info">
						<h1 class="text-center"> Login Panel</h1>
					</div>
					<div class="card-body bg-white">
						<form method="post" action="">
							<div class="form-group">
								<label>User Name</label>
								<input type="text" class="form-control" name="username" placeholder="Enter Your Name">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password" placeholder="Enter Password"><br>
							</div>
							<div class="form-group">
								<select name="usertype"  class="form-control" id="" placeholder="User Type">
									<option value="" disabled selected>Select Type</option>
									<option value="admin">Admin</option>
									<option value="artist">Artist</option>
									<option value="client">Client</option>
								</select>
							</div>
							<div class="form-group">
								<button name="login" type="submit" class=" btn btn-primary btn-block">Click Login </button>

							</div>

						</form>

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
