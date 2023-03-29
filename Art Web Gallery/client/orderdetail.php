<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="style/style.css">
	<title>Client Panel</title>
	<script src="https://www.paypal.com/sdk/js?client-id=AZ4G3a9aLVBMGnhaviEdJVLtlK8KqkAUb77KaZWJPF4_g-v4ZrT5zsVTiLW36lesAw3FZP-6kpGGwePC"></script>

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
	
	<?php
	include "../header/client-header.php";
	?>

	<center>
		<br><br>
	<h1>Order Details</h1>
	<br>

	<div class="table-responsive">
		<table class=" table table-striped table-bordered w-75">
		<thead>
		<tr>		
		       <th>Client</th>	
		       	<th>Address</th>
				<th>Contact</th>	
				<th>Ordered Item</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Sub Total</th>
				<th>Payment Method</th>
				

				</tr>
			</thead>
				<?php
				include('../database.php');
				session_start();			
				$msg= null;
				$totalamoun=0;
				$i=1;
				
				$orderid=$_GET['orderid'];
				$query="SELECT * FROM orderdetails inner join artproduct on artproduct.Product_id=orderDetail_Product
				inner join orders on orders.order_id=orderdetails.orderDetail_OrderNo inner join payment on payment.orders_id= orders.order_id WHERE orderDetail_OrderNo='$orderid'";
				$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
						while($row = mysqli_fetch_object($results))
						{
						    $name = $row->Name;
							$price = $row->Price;
							$qty =$row->orderDetail_quentity;
							$totalamoun+=($qty*$price);
							$payment = $row->payment_method;
						    $address = $row->delivery_address;
							$contact = $row->order_contact;
							$client = $_SESSION['client_name'];

				?>
				<tr>

				<td><?php echo $client; ?></td>	
				<td><?php echo ($address); ?></td>
				<td><?php echo ($contact); ?></td>
				<td><?php echo $name; ?></td>
				<td><?php echo $price; ?></td>
				<td><?php echo $qty; ?></td>
				<td><?php echo ($totalamoun); ?></td>
				<td><?php echo ($payment); ?></td>
			
								
				</tr>
				<?php }}}else{ echo mysqli_error($connection);} ?>
				
				</table>
			</div>
				
				</div>
			</div>
					
		</div>
</center>
		
