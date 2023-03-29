<?php 
session_start();
include "../header/client-header.php";
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="style/style.css">
	<title>View Orders</title>
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
<center>
	<br><br><br>
	<table class=" table table-striped table-bordered w-75">
					
				
				<h1>View Orders</h1>	
				<br>	
				<thead>
				<tr>
				<th>Order-Id</th>				
				<th>Date</th>
				<th>Status</th>						
				<th>Order Details</th>						
				<th>Feedback</th>
				</tr>
			</thead>
				
				<?php
				require '../database.php';
				$msg= null;
				$totalamoun=0;
				$i=1;
				
				$userid=$_SESSION['client_id'];
				$query="SELECT * FROM Orders WHERE order_user='$userid'";
				$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
						while($row = mysqli_fetch_object($results))
						{
							$orderid = $row->order_id;
							$useroder   = $row->order_user;
							$orderdate =$row->order_date;
							$orderStatus = $row->order_status;
						
				?>
				<tbody>
				<tr>
				<td><?php echo $orderid; ?></td>
				<td><?php echo $orderdate; ?></td>
				<td><?php echo $orderStatus; ?></td>
				<td><a href="orderdetail.php?orderid=<?php echo  $orderid;?>"><input type="submit" name="" value="Details" class="btn btn-primary"></a></td>
				<td><a href="providefeedback.php?orderid=<?php echo  $orderid;?>"><input type="submit" name="" value="Send Feedback" class="btn btn-success" <?php if($orderStatus!="Delivered"){echo "style='pointer:disabled' disabled";}?>></a></td>
				</tr>
				</tbody>
				<?php }}}else{ echo mysqli_error($connection);} ?>
				</table>
				</div>
					
			</div>
					
			</div>		
</div>			

</center>
