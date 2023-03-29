<?php
require '../database.php';

include_once('artistheader.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Space Allocation Request
	</title>

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
	<br><br>
	<center>


<div class="container">
<h1>View Space Allocation Request</h1>
<br>

<div class="table-responsive">
<table class="table table-hover table-bordered w-100">
	<thead>
<tr>
<th>Request ID</th>
<th>Monday-Thursday</th>
<th>Friday-Sunday</th>
<th>Total Charges</th>
<th>Status</th>
<th>Pay</th>
<th>Add Product</th>
</tr>
</thead>

<?PHP

$error = null;
$msg= null;
	$Sno=1;
	session_start();
	$artist=$_SESSION["artist_id"];
		$query = "SELECT * FROM spaceallocation Inner Join artist ON artist.ArtistID=spaceallocation.product_artist where ArtistID ='$artist'";
			$results=mysqli_query($connection,$query);
				if($results){
				if(mysqli_num_rows($results)){
					while($row = mysqli_fetch_object($results))
					{
						$spaceid = $row->spaceid;
						$working = $row->working;
						$holidays = $row->holidays;
						$status = $row->status;
						$working = $row->working;
						$holidayCharges=$holidays*5000;
						$workingdayCharges=$working*3000;
						$totalCharges=$holidayCharges+$workingdayCharges;
						?>
						<tbody>
					<tr>
						<td><?php echo ($spaceid); ?> </td>
						<td><?php echo ($working); ?> Days</td>
						<td><?php echo ($holidays); ?> Days</td>
						<td><?php echo ($totalCharges); ?></td>

						<td><?php echo ($status); ?></td>
						<form method="post" action="payment.php">
						<input type="hidden" name="spaceid" value="<?php echo $spaceid?>">
						<td><button name="payAmount" class="btn btn-success" style="margin-left:20px;" <?php if($status=="pending"){echo "style='pointer:disabled' disabled";}?>> Pay Price</button></td>
						</form>
						<form method="post" action="addProduct.php">
						<input type="hidden" name="spaceid" value="<?php echo $spaceid?>">
						<input type="hidden" name="totalCharges" value="<?php echo $totalCharges?>">
						<td><button name="productAddition" class="btn btn-success" style="margin-left:20px;" <?php if($status=="pending"){echo "style='pointer:disabled' disabled";}?>> Add Product</button></td>
						</form>
					</tr>
				</tbody>
						<?php
					}

			}else{ echo 'No Record available';}
		}else{ }
?>

</table>
</div>
</div>
</div>
</div>
</center>
</body>
</html>

