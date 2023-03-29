<?php
require '../database.php';
include_once('adminheader.php');
?>

<!Doctype html>
	<html>
	<head>
		<title>View Client Payments</title>
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


<h1>View Client Payments</h1>
<br>

<div class="table-responsive">
<table class=" table table-striped table-bordered w-75">
	<thead>
<tr>
<th>Pay_ID</th>
<th>Order ID</th>
<th>Order_Date</th>
<th>Client</th>
<th>Delivery Address </th>
<th>Contact</th>
<th>Amount </th>
<th>Pay_Method</th>
<th>Pay_Date</th>
</tr>
</thead>
<?PHP

$error = null;
$msg= null;
	$Sno=1;
	session_start();
	$query = "SELECT * FROM payment Inner Join client ON client.client_id=payment.clients_id inner join orders on orders.order_id=payment.orders_id";
			$results=mysqli_query($connection,$query);
				if($results){
				if(mysqli_num_rows($results)){
					while($row = mysqli_fetch_object($results))
					{
						$Payment_ID = $row->Payment_ID;
						$orderid = $row->orders_id;
						$order_date = $row->order_date;
						$clientname = $row->clientName;
						$Address = $row->delivery_address;
						$Contact = $row->order_contact;
						$Amount = $row->amount;
						$Payment_Method = $row->payment_method;
						$date = $row->date;


						?>
						<tbody>
					<tr>
						<td><?php echo ($Payment_ID); ?> </td>
						<td><?php echo ($orderid); ?> </td>
						<td><?php echo ($order_date); ?> </td>
						<td><?php echo ($clientname); ?> </td>
						<td><?php echo ($Address); ?></td>
						<td><?php echo ($Contact); ?></td>
						<td><?php echo ($Amount); ?></td>
						<td><?php echo ($Payment_Method); ?></td>
						<td><?php echo ($date); ?></td>
						</form>
					</tr>
				</tbody>
						<?php
					}

			}
		}
?>

</table>
</div>
</div>
</div>
</center>
</body>
</html>

