<?php
require '../database.php';
		include_once('adminheader.php');
?>

<!Doctype html>
	<html>
	<head>
		<title>View Products</title>


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
<h1>View Products</h1>
<br>
<table class=" table table-striped table-bordered w-75">
	<thead>
<tr>

<th>Product Name</th>
<th>Product Category</th>
<th>Price</th>
<th>Picture</th>
<th>Artist Name</th>
</tr>
</thead>
<?PHP

$error = null;
$msg= null;
	$Sno=1;
	session_start();
		 $query = "SELECT * FROM artproduct inner join artist on artist.ArtistID=artproduct.artist";
			$results=mysqli_query($connection,$query);
				if($results){
				if(mysqli_num_rows($results)){
					while($row = mysqli_fetch_object($results))
					{
			
						$productname = $row->Name;
						$type = $row->Type;
						$price = $row->Price;
						$image = $row->picture;
						$FullName = $row->FullName;


						?>
						<tbody>
					<tr>
						
						<td><?php echo ($productname); ?></td>
						<td><?php echo ($type); ?></td>
						<td><?php echo ($price); ?></td>
						<td><img src="../images/<?php echo $image; ?>" alt="item photo" height="150" width="150"></td>
						<td><?php echo ($FullName); ?></td>
						
						</form>
					</tr>
				</tbody>
						<?php
					}

			}else{ echo 'No Record available';}
		}else{ echo 'database error';}
?>

</table>
</div>
</div>
</center>
</body>
</html>

