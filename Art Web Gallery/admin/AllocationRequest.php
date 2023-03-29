<?php
require '../database.php';
$error2 = null;
$msg2= null; 
if(isset($_POST['changestatus'])){
	if(isset($_POST['status'])){		
	$spaceid=$_POST['spaceid'];
    $user_status=$_POST['status'];
	$query = "UPDATE spaceallocation set status='$user_status' WHERE spaceid='$spaceid'";
		$results=mysqli_query($connection,$query);
			if($results){
			
			echo('<script>alert("Request Status changed succesfully" );</script>');
			
		}
		else{
	echo('<script>alert("Please select the status first" );</script>');
}
}
}
include_once('adminheader.php');
?>

<!Doctype html>
	<html>
	<head>
		<title>Allocation Requests</title>
		<style media="screen">
	h1{
text-align: center;
	 text-transform: uppercase;
	 color: cornflowerblue;
	 margin-top: 8px;
	 font-family: ui-sans-serif;
	}
</style>
	</head>

<body>
<center>
	<br><br>
<h1>Allocation Requests</h1>
<br>

<div class="table-responsive">
<table class=" table table-striped table-bordered w-75">
	<thead>
<tr>
<th>Request ID</th>
<th>Working Days</th>
<th>Holidays</th>
<th>Status</th>
<th>Change Status</th>
<th>Action</th>
</tr>
</thead>
<?PHP  

$error = null;
$msg= null;         
            $Sno=1;
			 $query = "SELECT * FROM spaceallocation Inner Join artist ON artist.ArtistID=spaceallocation.product_artist";
			$results=mysqli_query($connection,$query);
				if($results){
				if(mysqli_num_rows($results)){
					while($row = mysqli_fetch_object($results))
					{	
						$spaceid = $row->spaceid;
						$working = $row->working;
						$holidays = $row->holidays;
						$status = $row->status;
												
								?>
						<tbody>
						<tr>
						<td><?php echo ($spaceid); ?> </td>
						<td><?php echo ($working); ?> Days</td>
						<td><?php echo ($holidays); ?> Days</td>
						<td><?php echo ($status); ?>  </td>
						<td><form method="post" action="">
									<select name="status" class="form-control" id="statusoption">
									<option disabled Selected>Change Status</option>
										<option value="Accepted">Accecpt</option>
										<option value="Rejected">Reject</option>
									</select>
								</td>
								<td><input type="hidden" name="spaceid" Value="<?php echo($spaceid);?>"/>
								<button class="btn btn-success" name="changestatus">Allocate</button>
						</td>
					</form>
				</td>
			</tr>
		</tbody>
						
								<?php
							}	
						
					}else{ echo 'No Record available';}
				}else{ echo 'database error';}				
?>	

                </table>
            </div>
        </center>
    </body>
</html>