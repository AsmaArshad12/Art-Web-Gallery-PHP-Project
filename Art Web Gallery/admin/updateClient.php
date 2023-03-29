<?php
include('../database.php');
session_start();
$msg= null;
$name = null;
$contact = null;
$address = null;
$email = null;
$username = null;
$password = null;

if(isset($_POST['delete']))
{
	$clientid=$_POST['client'];
	$query="DELETE FROM client WHERE client_id='$clientid'";
		$dataresult=mysqli_query($connection,$query);
		if($dataresult){
				$msg="Client Delted Successfully";	
		}
		if(isset($msg))
		{
			echo("<script>alert('".$msg."'); window.location.replace('manageClients.php');</script>");
			
		}
}

if(isset($_POST['clientid'])){
			$clientid = $_POST['clientid'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$contact = $_POST['contact'];
			$username = $_POST['username'];
			$password = $_POST['password'];
							$query="UPDATE Client SET clientName='$name',Contact_no='$contact',Address='$address', Email='$email',
							Username='$username', Password='$password' WHERE client_id='$clientid'";
							$dataresult=mysqli_query($connection,$query);
							if($dataresult){
echo("<script>alert('Client Updated Successfully');window.location.replace('manageClients.php');</script>");
							}	else{
								echo mysqli_query($connection);
							}			
}
if(isset($_POST['update'])){
	$clientid=$_POST['client'];
	$query = "SELECT * FROM client where client_id='$clientid'";
			$results=mysqli_query($connection,$query);
				if($results){
				if(mysqli_num_rows($results)){
					while($row = mysqli_fetch_object($results))
					{	
						$clientid = $row->client_id;
						$name = $row->clientName;
						$contact = $row->Contact_no;
						$address = $row->Address;
						$email = $row->Email;
						$username = $row->Username;
						$password = $row->password;
			
}}}else{echo mysqli_error($connection);}
if(isset($msg))
{
	echo("<script>alert('".$msg."');window.location.replace('manageClients.php');</script>");
}}
include_once('adminheader.php');
?>

<!Doctype html>
	<html>
	<head>
		<title>Update Client</title>
<style media="screen">
	form{
		padding: 10px;
	}
</style>
</head>
<div class="container">
	<div class="col-md-12">
		<div class="row">
<div class="card p-0 col-md-4 offset-md-4 mt-4">
<form method="POST" action="" enctype="multipart/form-data">
<h1 style="font-size: 40px;font-family: ui-serif;" class="text-center text-primary"> Update Client Form</h1>
<div class="form-group">
<label>Client Name</label>
<input type="text" name="name" class="form-control" Value="<?php echo $name?>" required>
</div>
<div class="form-group">
<label>Client Contact</label>
<input type="text" name="contact" class="form-control" Value="<?php echo $contact?>" required>
</div>
<div class="form-group">
<label>Client Address</label>
<input type="text" name="address" class="form-control" Value="<?php echo $address?>">
</div>
<div class="form-group">
<label>Client Email</label>
<input type="text" name="email"  class="form-control" Value="<?php echo $email?>">
</div>
<div class="form-group">
<label>Username</label>
<input type="text" name="username" class="form-control" Value="<?php echo $username?>">
</div>
<div class="form-group">
<label>Password</label>
<input type="text" name="password" class="form-control" Value="<?php echo $password?>">
</div>
<div class="form-group">
<input type="hidden" name="clientid" Value="<?php echo $clientid;?>">			
<button name="updateClient" class="btn btn-primary btn-block">Update Client</button>
</div>
</form>
</div>
</div>
</div>

</body>
</html>

