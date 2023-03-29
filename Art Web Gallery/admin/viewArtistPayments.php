<?php
require '../database.php';
include_once('adminheader.php');
?>

<!Doctype html>
	<html>
	<head>
		<title>View Artist Payments</title>

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
<h1>View Artist Payments</h1>
<br>

<div class="table-responsive">
<table class=" table table-striped table-bordered w-75">
	<thead>
<tr>
<th>Payment ID</th>
<th>Artist Name</th>
<th>Amount</th>
<th>Payment Method</th>
<th>Account No.</th>
<th>Date</th>
</tr>
</thead>
<?PHP

$error = null;
$msg= null;
	$Sno=1;
	session_start();
	$query = "SELECT * FROM artist_payment Inner Join artist ON artist.ArtistID=artist_payment.artists_id ";
			$results=mysqli_query($connection,$query);
				if($results){
				if(mysqli_num_rows($results)){
					while($row = mysqli_fetch_object($results))
					{
						$Payment_ID = $row->Payment_ID;
						
						$amount = $row->amount;
						$artistname = $row->FullName;
						$payment_method = $row->payment_method;
						$account_no = $row->account_no;
                        $date = $row->date;

						?>
						<tbody>
					<tr>
						<td><?php echo ($Payment_ID); ?> </td>
						<td><?php echo ($artistname); ?> </td>
						<td><?php echo ($amount); ?> </td>
						<td><?php echo ($payment_method); ?> </td>
						<td><?php echo ($account_no); ?></td>
						<td><?php echo ($date); ?></td>
						</form>
					</tr>
				</tbody>
						<?php
					}

			}else{ echo 'No Record available';}
		}
?>

</table>
</div>
</div>
</div>
</center>
</body>
</html>

