<?php
session_start();
include "../header/client-header.php";
require '../database.php';
$userid=$_SESSION['client_id'];
$msg= null;
$orderid=null;

if(isset($_POST['confirmorder'])){
	
$userid=$_SESSION['client_id'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$province = $_POST['province'];
	$city = $_POST['city'];
	$orderdate=date('Y-m-d H:i:s');
	 $query1="SELECT * FROM cart Where cart_user_id='$userid'";
				$results1=mysqli_query($connection,$query1);
					if($results1){
						if(mysqli_num_rows($results1)>0){
									$query2="INSERT INTO  orders VALUES ('','$userid','$address','$contact','$province','$city','$orderdate','Pending')";
									$results2=mysqli_query($connection,$query2);
									if($results2){
									$orderid=mysqli_insert_id($connection);
									}else{$msg=mysqli_error($connection);}	
								
							while($row = mysqli_fetch_object($results1))
							{
								
								$productid = $row->cart_product_id;
								$qty   = $row->quantity;
								$remain_qty=0;
								$query2="SELECT stock_quantity FROM artproduct Where Product_id='$productid'";
								$results2=mysqli_query($connection,$query2);
									if($results2){
										if(mysqli_num_rows($results2)>0){
											$row2 = mysqli_fetch_object($results2);
											$stock_qty =$row2->stock_quantity;
											$remain_qty=$stock_qty-$qty;
										}
										$query3="Update artproduct SET stock_quantity=$remain_qty Where Product_id='$productid'";
											$results3=mysqli_query($connection,$query3);
											if($results3){
												$msg="Stock updated";
											}else{$msg=mysqli_error($connection);}
										$query3="INSERT INTO  orderdetails VALUES ('','$orderid','$productid','$qty')";
										$results3=mysqli_query($connection,$query3);
										if($results3){
										$msg="product inserted orderdetails";
										}else{$msg=mysqli_error($connection);}
									}
								$query4="DELETE FROM cart Where cart_user_id='$userid'";
									$results4=mysqli_query($connection,$query4);
									if($results4){
										$msg="Your Order is set. Plaease Pay your amount";
									}else{$msg=mysqli_error($connection);}
							}
						
					}
}
}
if(isset($msg))
{
	echo("<script>alert('".$msg."');window.location.replace('orderpayments.php?orderno=".$orderid."')</script>");
}

	?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="style/style.css">
	<title>Order Confirmation</title>
</head>
<body>
	<center>
		<br><br>
		<div class="container">
	
	<h2 style="text-align:center;margin:5px">Order Confirmation Page</h2>
	<br><br>
		<table class=" table table-striped table-bordered" style="margin:10px">
			<thead>
				<tr>
				<th>S.No</th>				
				<th>Ordered Food</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Sub Total</th>
				</tr>
			</thead>
				<?php
				
				$msg= null;
				$totalamoun=0;
				$i=1;
				
				$clientid=$_SESSION['client_id'];
				$query="SELECT * FROM cart inner join artproduct on artproduct.Product_id=cart_product_id WHERE cart_user_id='$clientid'";
				$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
						while($row = mysqli_fetch_object($results))
						{
						    $name = $row->Name;
							$price = $row->Price;
							$qty =$row->quantity;
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
				</tbody>
				<?php }}}else{ echo mysqli_error($connection);} ?>
				
				</table>
			</center>
		</div>


				<table style="float:right; border:none;margin-right:190px; margin-top: 80px;">
				<tr style="border:none;">
				<td style="border:none;"><h4>Total Price</h4></td>
				<td style="border:none;"><?php echo $totalamoun; ?> </td>
				</tr>
				<tr style="border:none;">
				<td style="border:none;"><h4>Discount</h4></td>
				<td style="border:none;">0%</td>
				</tr>
				<tr style="border:none;">
				<td style="border:none;"><h4>Total Payable</h4></td>
				<td style="border:none;"><?php echo $totalamoun; ?></td>
				</tr>
				</table>
				</div>

				<br><br>
				<form method="post" style="margin-left:240px">
				<div class="form-group col-lg-8">
				<label>Enter Address</label>
				<input type="text" class="form-control" name="address" placeholder="address" required>
				</div>	
					<div class="form-group col-lg-8">
				<label>Enter Contact Number</label>
				<input type="text" class="form-control" name="contact" placeholder="contact" required>
				</div>

				<div class="form-group col-lg-8">
				<label>Enter Province</label>
				<select name="province" class="form-control" required>
					<option value="">Select Province</option>
					<option value="Punjab">Punjab</option>
				</select>
				</div>


                <div class="form-group col-lg-8">
				<label>Enter City</label>
				<select name="city" class="form-control mb-4" required>
					<option value="">Select City</option>
					<option value="Lahore">Lahore</option>
					<option value="Faisalabad">Faisalabad</option>
					<option value="Rawalpindi">Rawalpindi</option>
					<option value="Multan">Multan</option>
                    <option value="Gujranwala">Gujranwala</option>
				<br><br>
			</div>
				

				<input type="submit" name="confirmorder" value="Confirm Order" class="btn btn-danger">
				</form>
			</div>
					
		</div>
		
