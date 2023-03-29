<?php
include('../database.php');
$msg= null;
session_start();
$space='';
$charges='';
if(isset($_POST['productAddition'])){
$space = $_POST['spaceid'];
$charges = $_POST['totalCharges'];
}
if(isset($_POST['addProduct'])){
						$name = $_POST['productname'];
						$category=$_POST['category'];
						$artistid=$_SESSION["artist_id"];
						$qty=$_POST["qty"];
						$space = $_POST['spaceid'];
						$charges = $_POST['totalCharges'];

					$image="";
					$server_folder="../images/";
					$Server_path=$server_folder.basename($_FILES['picture']['name']);
					if (move_uploaded_file($_FILES["picture"]["tmp_name"], $Server_path)) {
						$image=$_FILES['picture']['name'];
				        $query="INSERT INTO  artproduct VALUES ('','$name','$category','$charges','$image','$artistid','$qty','$space')";
						$results=mysqli_query($connection,$query);
							if($results){
								$msg="Product Added Successfully";
							}else{echo mysqli_error($connection);}

					}else{echo "not uploaded";}


}

if(isset($msg))
{
	echo("<script>alert('".$msg."');window.location.replace('manageProduct.php');</script>");
}

include_once('artistheader.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Products
	</title>

	<style media="screen">
	form{
		padding: 10px;
	}
</style>

</head>
<body>

	<center>
		<br><br>

<div class="container">
	<div class="col-md-12">
		<div class="row">
			<div class="card p-0 col-md-4 offset-md-4 mt-4">
<form method="POST" action="" enctype="multipart/form-data">
<input type="hidden" name="spaceid" value="<?php echo $space?>">
<input type="hidden" name="totalCharges" value="<?php echo $charges?>">
<h1 style="font-size: 40px;font-family: ui-serif; text-align:center;" class="text-primary"> Add Products</h1>
<div class="form-group">
<label>Product Name</label>
<input type="text" name="productname" class="form-control" placeholder="Enter Item Name">
</div>
<div class="form-group">
<label>Product Category</label>
<input type="text" name="category" class="form-control" placeholder="Enter Product Category">
</div>
<div class="form-group">
<label>Stock Quantity</label>
<input type="text" name="qty" class="form-control" placeholder="Enter Product Quantity">
</div>
<div class="form-group">
<label>Add Picture</label>
<input type="file" name="picture" class="form-control">
</div>
<div class="form-group">
<button name="addProduct" class="btn btn-primary btn-block">Add Product</button>
</div>
</form>
</div>
</div>
</div>
</body>
</center>
</html>
