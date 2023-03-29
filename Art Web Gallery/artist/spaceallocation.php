<?php
include('../database.php');
$msg= null;
session_start();
 $productname="";
if(isset($_POST['allocateSpace'])){
						$artistid=$_SESSION["artist_id"];
						$working=$_POST['working'];
						$holidays = $_POST['holidays'];

					$query="INSERT INTO  spaceallocation VALUES ('','$working','$holidays','$artistid','pending')";
						$results=mysqli_query($connection,$query);
							if($results){
								$msg="Request Generated Successfull";
							}else{echo mysqli_error($connection);}

					}
if(isset($msg))
{
	echo("<script>alert('".$msg."');window.location.replace('request.php');</script>");
}

include_once('artistheader.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title> Space Allocation Request
	</title>

<style media="screen">
  form{
    padding: 5px;
  }
</style>
</head>
	<body>	
		<br><br>
<div class="container">
	<br>
<div class="col-md-12">
<div class="row">
<div class="card p-0 col-md-5 offset-md-4 mt-4">
<form method="POST" action="" enctype="multipart/form-data">

<h1 style="font-size: 40px;font-family: ui-serif;" class="text-primary text-center"> Space Allocation Request</h1>
<br>
<div class="form-group">
<label>Working Days</label>
<input type="text" name="working"  class="form-control" placeholder="Enter Number Monday to Thursday">
</div>
<div class="form-group">
<label>Holidays</label>
<input type="text" name="holidays"  class="form-control" placeholder="Enter Number Friday to Sunday">
</div>
<br>
<div class="form-group">
<button name="allocateSpace" class="btn btn-primary btn-block">Generate Request</button>
<br>
</div>
</form>
</div>
</div>
</div>
</div>
</body>
</html>
