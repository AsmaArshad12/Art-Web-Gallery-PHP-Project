<?php
include('../database.php');
$msg= null;
session_start();
$spaceallocationid=$_POST['spaceid'];
if(isset($_POST['payment'])){
		
						$productname=$_POST['name'];
						$totalcharges = $_POST['totalcharges'];

						$query="INSERT INTO  payment VALUES ('','$artistid','','$productname','$totalcharges')";
						$results=mysqli_query($connection,$query);
							if($results){
								$msg="Payment Done Successfull";
							}else{echo mysqli_error($connection);}

					}
if(isset($msg))
{
	echo("<script>alert('".$msg."');window.location.replace('viewPayments.php');</script>");
}

include_once('artistheader.php');
?>
<div class="container">
<div class="col-md-12">
<div class="row">
<div class="card p-0 col-md-4 offset-md-4 mt-4">
<form method="POST" action="" enctype="multipart/form-data">
<h1 style="font-size: 24px;font-family: ui-serif; text-align:center;">Artist Payment Panel</h1>
<br>
<div class="form-group">
		 <?php		 
		$spaceallocationid=$_POST['spaceid'];
		$query="SELECT * FROM spaceallocation Inner Join artproduct ON artproduct.Product_id=spaceallocation.productid
				Inner Join artist ON artist.ArtistID=spaceallocation.product_artist where spaceid ='$spaceallocationid'";
		$results=mysqli_query($connection,$query);
		if($results){
		if(mysqli_num_rows($results)>0){
		while($row = mysqli_fetch_object($results))
		{
						$spaceid = $row->spaceid;
						$productid = $row->productid;
						$productName = $row->Name;
						$productPicture = $row->picture;
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
<select name="name"  class="form-control" >					
<option value="<?php echo $productid; ?>" readonly><?php echo $productName; ?></option>
		
</select>
</div>
<div class="form-group">
<label>Total Charges</label>
<input type="text" name="totalcharges"  class="form-control" value="<?php echo $totalCharges?>" readonly>
</div>
<div class="form-group">
<button name="payment" class="btn btn-primary btn-block">Pay Amount</button>
</div>
</form>
<?php }}} ?>
</div>
</div>
</div>
</div>
<style media="screen">
  form{
    padding: 5px;
  }
</style>
