<?php
session_start();
require '../database.php';
include "../header/client-header.php";
$msg= null;

if(isset($_POST['pay'])){
		
			$userid=$_SESSION["client_id"];
			$orderid=$_POST["orderid"];
			$totalamount=$_POST["totalamount"];
			$payment = $_POST['payment'];
			$currentdatetime=date('Y-m-d H:i:s');
				$query="INSERT INTO  payment VALUES ('','$userid','$orderid','$totalamount','$payment','$currentdatetime','')";
				$results=mysqli_query($connection,$query);
					
				if($results){
						$msg="Your Payment submitted Successfull";
				}
				else{
					$msg=mysqli_error($connection);
				}
				
}
if(isset($msg))
{
	echo("<script>alert('".$msg."');window.location.replace('manageorder.php');</script>");
}


?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="style/style.css">
	<title>Order Payments</title>
	<script src="https://www.paypal.com/sdk/js?client-id=AZ4G3a9aLVBMGnhaviEdJVLtlK8KqkAUb77KaZWJPF4_g-v4ZrT5zsVTiLW36lesAw3FZP-6kpGGwePC"></script>
	
</head>
<body>
	
	<center>
	<table class=" table table-striped table-bordered w-75">
			<thead>
				<tr>

					<br><br>
				<h2 style="text-align:center">Order No: <?php echo $_GET['orderno']; ?></h2>	
				
				<tr>
				<th>S.No</th>				
				<th>Ordered Item</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Sub Total</th>
				</tr>
			<thead>
				<?php
				
				$msg= null;
				$totalamoun=0;
				$i=1;
				
				$orderid=$_GET['orderno'];
				$query="SELECT * FROM orderdetails inner join artproduct on artproduct.Product_id=orderDetail_Product  WHERE orderDetail_OrderNo='$orderid'";
				$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
						while($row = mysqli_fetch_object($results))
						{
						    $name = $row->Name;
							$price = $row->Price;
							$qty =$row->orderDetail_quentity;
							$totalamoun+=($qty*$price);
				?>
				<tbody>
				<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $name; ?></td>
				<td><?php echo $price; ?></td>
				<td><?php echo $qty; ?></td>
				<td><?php echo ($qty*$price); ?></td>				
				</tr>
				<tbody>
				<?php }}}else{ echo mysqli_error($connection);} ?>
				
				</table>
				<table class=" table table-striped table-bordered w-75" >
			<thead>
				<tr>
				<td ><h4>Total Price</h4></td>
				<td ><?php echo $totalamoun; ?> </td>
				</tr>
			<thead>
			<tbody>
				<tr style="border:none;">
				<td style="border:none;"><h4>Discount</h4></td>
				<td style="border:none;">0%</td>
				</tr>
				<tr style="border:none;">
				<td style="border:none;"><h4>Total Payable</h4></td>
				<td id="price" style="border:none;"><?php echo $totalamoun; ?></td>
				</tr>
				</tbody>
				</table>
							<?php 
			$orderid=$_GET['orderno'];
				$query="SELECT * FROM orders  WHERE order_id='$orderid'";
				$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
						$row = mysqli_fetch_object($results);
						
						    $user = $row->order_user;
						    $orderid = $row->order_id;
						    $address = $row->delivery_address;
							$contact = $row->order_contact;
							?>
							<div class="registrationfirstdivision" style="width:50%;margin:20px auto">
						<lable>Delivery Address</lable><input type="text" id="" name="address" value ="<?php echo $address; ?>" placeholder="address" class="form-control w-50" readonly>
					</div>	
						
					<div class="registrationfirstdivision" style="width:50%;margin:20px auto">
						<lable>Delivery Contact</lable><input class="form-control w-50" type="text" id="" name="contact" value ="<?php echo $contact; ?>" placeholder="contact" readonly>
					</div>

                <form method="post" action="">
                    <div class="registrationfirstdivision" style="width:50%;margin:20px auto">
                    	<lable>Payment Method</lable>
					  <select name="payment" class="form-control w-50" required>
                           <option value="">Select Payment </option>
                           <option value="Cash On Delivery">Cash On Delivery</option>
                           <option value="Debit Card">Debit Card</option>
                           <option value="Credit Card">Credit Card</option>
                       </select>
                   </div>
                        
					<div>
					 <div>
					
					 <input type="hidden" name="orderid" value="<?php echo $orderid; ?>" />
					 <input type="hidden" name="user" value="<?php echo $user; ?>" />
					 <input type="hidden" name="totalamount" value="<?php echo $totalamoun; ?>" />
					 <button class="btn btn-primary" name="pay">Pay Amount</button>
					 </form>
					 </div>		
					</div>
					<?php	
					}
				}
			
			?>
			
			
			
		</div>
		
	</div>
	</div>
	</center>
</body>
</html> 