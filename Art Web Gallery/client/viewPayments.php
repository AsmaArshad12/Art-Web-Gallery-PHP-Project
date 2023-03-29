<?php
require '../database.php';
include_once('clientheader.php');
?>


<h1>View Payment Record</h1>
<table class=" table table-striped table-bordered">
	<thead>
<tr>
<th>Payment ID</th>
<th>Artist Name</th>
<th>Product Name</th>
<th>Photo</th>
<th>Total Amount</th>
</tr>
</thead>
<?PHP

$error = null;
$msg= null;
	$Sno=1;
		$client=$_SESSION["client_id"];
		$query = "SELECT * FROM payment Inner Join artist ON artist.ArtistID=payment.artists_id
				Inner Join artproduct ON artproduct.Product_id=payment.products_id where client_id ='$client'";
			$results=mysqli_query($connection,$query);
				if($results){
				if(mysqli_num_rows($results)){
					while($row = mysqli_fetch_object($results))
					{
						$Payment_ID = $row->Payment_ID;
						$productname = $row->Name;
						$clientname = $row->clientName;
						$amount = $row->amount;
						$image = $row->picture;


						?>
						<tbody>
					<tr>
						<td><?php echo ($Payment_ID); ?> </td>
						<td><?php echo ($clientname); ?> </td>
						<td><?php echo ($productname); ?></td>
						<td><?php echo ($amount); ?></td>
						<td><img src="../images/<?php echo $image; ?>" alt="item photo" height="50" width="60"></td>
						
						</form>
					</tr>
				</tbody>
						<?php
					}

			}else{ echo 'No Record available';}
		}else{ echo 'database error';}
?>

</table>
</div>
</div>
</body>
</html>

<style media="screen">
	h1{
text-align: center;
	 text-transform: uppercase;
	 color: cornflowerblue;
	 margin-top: 8px;
	 font-family: ui-sans-serif;
	}
</style>
