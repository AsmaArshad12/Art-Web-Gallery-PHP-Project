<?php
include_once('clientheader.php');
$msg= null;

if(isset($_POST['submitfeedback'])){
		
			$userid=$_SESSION["client_id"];
			$orderid=$_POST["orderid"];
			$title=$_POST["title"];
			$comments = $_POST['comments'];
			$currentdatetime=date('Y-m-d H:i:s');
				$query="INSERT INTO  feedback VALUES ('','$userid','$orderid','$title','$comments','$currentdatetime')";
				$results=mysqli_query($connection,$query);
					if($results){
						$msg="Your Feedback submited Successfull";
					}else{$msg=mysqli_error($connection);}
				
}
if(isset($msg))
{
	echo("<script>alert('".$msg."');window.location.replace('myfeedback.php');</script>");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
	<style media="screen">
.form-group{
	margin:10px;
}
h1{

	color: white;
	font-size: revert;
	font-style: initial;
	font-family: ui-monospace;
	font-weight: 900;
}
</style>
</head>
		
			<body class="bg-primary">
		<div class="container">
			<div class="col-md-12">
				<div class="row">
					<div class="card p-0 col-md-6 offset-md-3 mt-2">
						<div class="card-header bg-info">
							<h1 class="text-center">Client Feedback Panel</h1>
						</div>
						<div class="card-body bg-white">
							<form method="post" action="">
								<div class="form-group">
									<label>Order ID</label>
						<input type="Text" class="form-control" value="<?php echo $_GET['orderid'] ?>" name="orderid" readonly>
					</div>
					</div>
					<div class="form-group">
					<label>Title</label>
					<input type="Text" value="" name="title" class="form-control" required>
					</div>
					<div class="form-group">
					<label>Feedback</label>
					<textarea name="comments" id=""  rows="5" class="form-control" required placeholder="Please Write about Us"></textarea>
					<br>
					</div>
					
					<input type="submit" value="Send Feedback" class="btn btn-primary" name="submitfeedback" style="width:30%;margin-left:30%;">

					<br><br>
					</form></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
	