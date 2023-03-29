<?php
include_once('artistheader.php');
require '../database.php';
$msg= null;
if(isset($_POST['save'])){
	if(isset($_POST['changestatus'])){
	$status=$_POST['changestatus'];
	$orderid=$_POST['orderid'];
$query = "UPDATE orders SET order_status='$status' WHERE order_id='$orderid'";
	$results=mysqli_query($connection,$query);
					if($results){
						echo('<script>alert("Status Changed Succesfully" );</script>');
					}
					else{echo('<script>alert("Erorr in Database" );</script>');
            }
		}
}
	
	?>

	<!DOCTYPE html>
<html>
<head>
	<title>Orders
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
	<center>
		<br><br>
		<table class=" table table-striped table-bordered w-75">
					
				<h1>Manage Orders</h2>	
				<br>	
				<thead>
				<th>Order Id</th>				
				<th>Date</th>
				<th>Order Status</th>
				<th>Update Status</th>
				<th>Action</th>
				<th>View Details</th>
				</tr>
			</thead>
				
				<?php
				
				$msg= null;
				$totalamoun=0;
				$i=1; 
				 $query="SELECT * FROM Orders" ;
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
				<tr>
				<td><?php echo $orderid; ?></td>
				<td><?php echo $orderdate; ?></td>
				<td><?php echo $orderStatus; ?></td>
				<form method="post" action="" >
				<input type="hidden" name="orderid" Value="<?php echo $orderid;?>"/>
				<td><select id="" name="changestatus" class="form-control">							
					<option selected disabled>Order Status</option>
					<option>Pending</option>
					 <option>Delivered</option>
					 <option>Canceled</option>
				</select>
				</td>
				<td><a href="orderdetail.php?orderid=<?php echo  $orderid;?>"><input type="submit" name="save" value="Save" class="btn btn-primary"></a></td>
				</form>
				<td><a href="orderdetail.php?orderid=<?php echo  $orderid;?>"><input type="submit" name="" value="Detail" class="btn btn-success"></a></td>
				</tr>
				<?php }}else{ echo "No order found";}
				}else{ echo mysqli_error($connection);} ?>
				</table>
				</div>
			</div>			
		</div>

</table>
</center>
</body>
</html>
	