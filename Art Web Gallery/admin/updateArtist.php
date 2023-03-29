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
	$artistid=$_POST['artist'];
	$query="DELETE FROM artist WHERE ArtistID='$artistid'";
		$dataresult=mysqli_query($connection,$query);
		if($dataresult){
				$msg="Artist Delted Successfully";	
		}
		if(isset($msg))
		{
			echo("<script>alert('".$msg."'); window.location.replace('manageArtists.php');</script>");
			
		}
}

if(isset($_POST['updateArtist'])){
			$artistid = $_POST['artistid'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$contact = $_POST['contact'];
			$username = $_POST['username'];
			$password = $_POST['password'];
							$query="UPDATE artist SET FullName='$name',Contact_no='$contact',Address='$address', Email='$email',
							Username='$username', Password='$password' WHERE ArtistID='$artistid'";
							$dataresult=mysqli_query($connection,$query);
							if($dataresult){
echo("<script>alert('Artist Updated Successfully');window.location.replace('manageArtists.php');</script>");
							}	else{
								echo mysqli_query($connection);
							}			
}
if(isset($_POST['update'])){
	$artistid=$_POST['artist'];
	$query = "SELECT * FROM artist where ArtistID='$artistid'";
			$results=mysqli_query($connection,$query);
				if($results){
				if(mysqli_num_rows($results)){
					while($row = mysqli_fetch_object($results))
					{	
						$artistid = $row->ArtistID;
						$name = $row->FullName;
						$contact = $row->Contact_no;
						$address = $row->Address;
						$email = $row->Email;
						$username = $row->Username;
						$password = $row->password;
			
}}}else{echo mysqli_error($connection);}
if(isset($msg))
{
	echo("<script>alert('".$msg."');window.location.replace('manageArtists.php');</script>");
}}
include_once('adminheader.php');
?>

<!Doctype html>
	<html>
	<head>
		<title>Update Artist</title>

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
<h1 style="font-size: 40px;font-family: ui-serif;" class="text-primary text-center"> Update Artist Form</h1>
<div class="form-group">
<label>Artist Name</label>
<input type="text" name="name" class="form-control" Value="<?php echo $name?>" required>
</div>
<div class="form-group">
<label>Artist Contact</label>
<input type="text" name="contact" class="form-control" Value="<?php echo $contact?>" required>
</div>
<div class="form-group">
<label>Artist Address</label>
<input type="text" name="address" class="form-control" Value="<?php echo $address?>">
</div>
<div class="form-group">
<label>Artist Email</label>
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
<input type="hidden" name="artistid" Value="<?php echo $artistid;?>">			
<button name="updateArtist" class="btn btn-primary btn-block">Update Artist</button>
</div>
</form>
</div>
</div>
</div>
</body>
</html>
