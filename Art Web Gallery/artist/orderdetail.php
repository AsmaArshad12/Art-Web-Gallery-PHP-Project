<?php
	include_once('artistheader.php');
	session_start();
	require '../database.php';
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Order Details
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
	<h1>Order Details</h1>
	<br>

	<div class="table-responsive">
		<table class=" table table-striped table-bordered w-75">
		<thead>
		<tr>				
				<th>Ordered Item</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Sub Total</th>
				<th>Address</th>
				<th>Contact</th>
				<th>Status</th>
				</tr>
			</thead>
				<?php
				
				$msg= null;
				$totalamoun=0;
				$i=1;
				
				$orderid=$_GET['orderid'];
				$query="SELECT * FROM orderdetails inner join artproduct on artproduct.Product_id=orderDetail_Product
				inner join orders on orders.order_id=orderdetails.orderDetail_OrderNo WHERE orderDetail_OrderNo='$orderid'";
				$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
						while($row = mysqli_fetch_object($results))
						{
						    $name = $row->Name;
							$price = $row->Price;
							$qty =$row->orderDetail_quentity;
							$totalamoun+=($qty*$price);
						    $address = $row->delivery_address;
							$contact = $row->order_contact;
							$status = $row->order_status;
				?>
				<tbody>
				<tr>
				<td><?php echo $name; ?></td>
				<td><?php echo $price; ?></td>
				<td><?php echo $qty; ?></td>
				<td><?php echo ($totalamoun); ?></td>
				<td><?php echo ($address); ?></td>
				<td><?php echo ($contact); ?></td>
				<td><?php echo ($status); ?></td>
				</tr>
					<?php }}}?>
				</tbody>
			</div>
					
		</div>
	</table>
</div>
	</center>
</body>
</html>

		
