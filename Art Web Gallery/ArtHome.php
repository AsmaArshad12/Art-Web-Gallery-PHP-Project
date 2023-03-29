<?php
require './database.php';
include_once('header.php');
session_start();
$msg= null;
if(isset($_POST['RequestBook'])){
			$bookid = $_POST['bookid'];
			echo $user=$_SESSION["student_id"];

				$query="INSERT INTO requested VALUES ('','$user','$bookid')";
				$results=mysqli_query($connection,$query);
					if($results){
					$msg="book Requested Successfull";
					echo('<script>alert("'.$msg.'");</script>');
					}
					else{echo mysqli_error($connection);
}}

?>

<div class="container">
	<h2 style="text-align:center;">Available Books</h2>
	<div class="col-md-12">
		<div class="row">

		<?php
		$msg= null;
		$query="SELECT * FROM spaceallocation Inner Join artproduct ON artproduct.Product_id=spaceallocation.productid WHERE status='Accepted'";
		$results=mysqli_query($connection,$query);
		if($results){
		if(mysqli_num_rows($results)>0){
		while($row = mysqli_fetch_object($results))
		{
		$spaceid = $row->spaceid;
						$productid = $row->productid;
						$artName = $row->Name;
						$Type = $row->Type;
						$price = $row->Price;
						$working = $row->working;
						$holidays = $row->holidays;
						$status = $row->status;
						$image = $row->picture;
		?>
		 <div class="col-md-4">
		<div class="card">
		  <img class="card-img-top" src="./images/<?php echo $image; ?>" style="height: 200px;">
		  <div class="card-body">
		    <h5 class="card-title"><?php echo $artName; ?></h5>
		    <p class="card-text"><?php echo $Type; ?></p>
		  </div>
			<div class="card-footer">
				<p class="card-text">Price: <?php echo $price; ?>$</p>
			</div>
		</div>
		</div>
		<?php }}}else{ echo mysqli_error($connection);} ?>


			</div>
</div>
</div>

<style media="screen">
	h2{
  text-align: center;
	 text-transform: uppercase;
	 color: cornflowerblue;
	 margin-top: 2px;
	 font-family: ui-sans-serif;
	}
</style>
