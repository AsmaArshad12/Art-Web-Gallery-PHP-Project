<?php
include '../database.php';
session_start();
$msg=null;
if(isset($_POST['submitUpdate'])){
			$productid=$_POST['product_id'];
			$productname = $_POST['name'];
			$type 	  = $_POST['type'];
			$price = $_POST['price'];

					$image="";
					$server_folder="../images/";
					$Server_path=$server_folder.basename($_FILES['picture']['name']);
					if (move_uploaded_file($_FILES["picture"]["tmp_name"], $Server_path)) {
						$image=$_FILES['picture']['name'];
			$query= "UPDATE  artproduct SET Name='$productname', Type='$type',Price='$price', picture='$image' WHERE product_id='$productid'";
			$data=mysqli_query($connection,$query);
				if ($data) {
					
					$msg="Product Informatin Updated Successfully";
					echo('<script>alert("'.$msg.'");window.location.replace("manageProduct.php");</script>');
			}
}}
if(isset($_POST['update'])){
	$productid=$_POST['productid'];

	 $query = "SELECT * FROM artproduct WHERE Product_id='$productid'";
				$data=mysqli_query($connection,$query);
				if ($data) {
					if(mysqli_num_rows($data)>0){
					$row=mysqli_fetch_object($data);
					$productid 	= $row->Product_id;
                    $productname = $row->Name;
                    $type = $row->Type;
					$price = $row->Price;
}}}

include_once('artistheader.php');
	?>


	<!DOCTYPE html>
<html>
<head>
	<title>Update Products
	</title>

	<style media="screen">
	form{
		padding: 5px;
	}
</style>
</head>

<body>
	<br><br>
	<center>

	
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<div class="card p-0 col-md-4 offset-md-4 mt-4">
			<form method="post" action="" enctype="multipart/form-data">
			<h2 style="font-size: 40px;font-family: ui-serif; text-align:center;" class="text-primary">Update Product</h2>
			<div class="form-group">
			<label>Product ID</label>
				<input id="id"  type="text" class="form-control" name="product_id" value="<?php echo $productid; ?>" readonly>
			</div>
			<div class="form-group">
			<label>Product Name</label>

			<input type="text" name="name" class="form-control"  value="<?php echo $productname; ?>">
			</div>
			<div class="form-group">
			<label>Category</label>

			<input type="text" name="type" class="form-control" value="<?php echo $type; ?>">
			</div>
			<div class="form-group">
			<label>Price</label>

			<input type="text" name="price" class="form-control"  value="<?php echo $price; ?>">
			</div>
			<div class="form-group">
<label>Add Picture</label>
<input type="file" name="picture" class="form-control">
</div>
            <div class="form-group">
					<button name="submitUpdate" name="sendbtn" class="btn btn-block btn-primary">Update</button>
			</div>

		</div>

	</div>
</div>
</div>
</form>

</div>
</center>
</body>
</html>


