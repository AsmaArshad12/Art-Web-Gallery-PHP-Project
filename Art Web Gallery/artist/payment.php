<?php
include('../database.php');
$msg= null;
session_start();
$spaceallocationid=$_POST['spaceid'];
if(isset($_POST['pay'])){
						$artistid=$_SESSION["artist_id"];
			
						$totalcharges = $_POST['totalcharges'];
						$payment = $_POST['payment'];
						$account = $_POST['account'];
					$currentdatetime=date('Y-m-d H:i:s');
					$query="INSERT INTO  artist_payment(artists_id,amount, payment_method, account_no,date) VALUES ('$artistid','$totalcharges','$payment','$account','$currentdatetime')";
						$results=mysqli_query($connection,$query);
							if($results){
								$msg="Payment Done Successfully";
							}else{echo mysqli_error($connection);}

					}
if(isset($msg))
{
	echo("<script>alert('".$msg."');window.location.replace('viewPayments.php');</script>");
}

include_once('artistheader.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Artist Payment
	</title>
	<style media="screen">
  form{
    padding: 5px;
  }
</style>

</head>

<body>
	<br><br>


<div class="container">
	<br>
<div class="col-md-12">
<div class="row">
<div class="card p-0 col-md-5 offset-md-4 mt-4">
<form method="POST" enctype="multipart/form-data">
<h1 style="font-size: 40px;font-family: ui-serif; text-align:center;" class="text-primary">Artist Payment Panel</h1>
<br>
<div class="form-group">
		 <?php		 
		$spaceallocationid=$_POST['spaceid'];
		$query="SELECT * FROM spaceallocation Inner Join artist ON artist.ArtistID=spaceallocation.product_artist where spaceid ='$spaceallocationid'";
		$results=mysqli_query($connection,$query);
		if($results){
		if(mysqli_num_rows($results)>0){
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
<div class="form-group">
<label>Space ID</label>
<input type="text" name="spaceid"  class="form-control" value="<?php echo $spaceid ?>" readonly>
</div>
<div class="form-group">
<label>Total Charges</label>
<input type="text" name="totalcharges"  class="form-control" value="<?php echo $totalCharges?>" readonly>
</div>

<div class="form-group">
<label>Payment Method</label>
      <div class="form-group mb-4">
        <select name="payment" class="form-control" required>
            <option value="">Select Payment Method</option>
            <option value="Debit Card">Debit Card</option>
            <option value="Credit Card">Credit Card</option>
        </select>
   </div>


   <div class="form-group">
<label>Account Number</label>
      <div class="form-group mb-4">
    <input type="text" name="account"  class="form-control" required>
      </div>




<div class="form-group">
<button name="pay" class="btn btn-primary btn-block">Pay Amount</button>
</div>
</form>
<?php }}} ?>
</div>
</div>
</div>
</div>


</body>
</html>

