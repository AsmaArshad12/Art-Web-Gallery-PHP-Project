<?php
include "../database.php";
include_once('artistheader.php');
session_start();


    if(isset($_POST['delete']))
    {
			$productid=$_POST['productid'];
			$productname = $_POST['productname'];
			$query= " Delete From artproduct WHERE Product_id='$productid'";
				if ($result=mysqli_query($connection, $query)) 
				{
					if(mysqli_affected_rows($connection))
					{
					 echo "<script>alert('Product deleted Successfully');</script>";
			        }
			        else
			        {
			           echo mysqli_error($connection);
			        }
			    }
    }
	



if(isset($_POST['search']))
{
$valueToSearch = $_POST['name'];
$artist=$_SESSION["artist_id"];
$query = "SELECT * FROM artproduct WHERE (CONCAT(Name) LIKE '%".$valueToSearch."%' || CONCAT(Type) LIKE '%".$valueToSearch."%' || CONCAT(Price) LIKE '%".$valueToSearch."%') && artist= '$artist'";
$search_result = filterTable($query);


}
else {
	$artist=$_SESSION["artist_id"];
	$query = "SELECT * FROM artproduct where artist ='$artist'";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
include "../database.php";

$filter_Result = mysqli_query($connection, $query);
return $filter_Result;
}

?>






<!DOCTYPE html>
<html>
<head>
  <title>View Product</title>

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
        <div class="container-fluid">

               
<h1>View Products</h1>
<br>

<form method="post" style="margin-left:30%;" >

<div class="row">
<div class="mb-2">

<input type="text" name="name" placeholder="Search Product" required class="form-control" style="width:120%">

<input type="submit" class="btn btn-primary" value="search" name="search" style="width:39%;margin-left:130%;margin-top:-69px;";></div></div>
</form>

<div class="table-responsive">

<table class=" table table-striped table-bordered w-75">
<tr>
     
<th>Product ID</th>
<th>Product Name</th>
<th>Product Category</th>
<th>Price</th>
<th>Picture</th>
<th>Edit</th>
<th>Delete</th>


</tr>


<?php while($row = mysqli_fetch_array($search_result)):?>
<tr>
						<td><?php echo $row['Product_id']; ?> </td>
						<td><?php echo $row['Name']; ?></td>
						<td><?php echo $row['Type']; ?></td>
						<td><?php echo $row['Price']; ?></td>
						<td><img src="../images/<?php echo $row['picture']; ?>" alt="item photo" height="150" width="160"></td>
						<form method="post" action="updateProduct.php">
						<input type="hidden" name="productid" Value="<?php echo $row['Product_id'];?>"/>
						<input type="hidden" name="productname" Value="<?php echo $row['Name'];?>"/>
						<td><button name="update" class=" btn btn-warning" >update</button></td>
						</form>

						<form method="post" action="">
						<input type="hidden" name="productid" Value="<?php echo $row['Product_id'] ;?>"/>
						<input type="hidden" name="productname" Value="<?php echo $row['Name'];?>"/>
						<td><button name="delete" class="btn btn-danger" id="sendbtn">Delete</button></td>

						</form>
						<form method="post" action="allocateSPace.php">
						<input type="hidden" name="productid" Value="<?php echo $row['Product_id'];?>"/>

						</form>
					</tr>
			

<?php endwhile;?>

                 
                 </table>
                </div>
               </div>
              </center>
            </body>
         </html>
