<?php 
session_start();
include "../header/client-header.php";
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="style/style.css">
	<title>View Feeback</title>
	<script src="https://www.paypal.com/sdk/js?client-id=AZ4G3a9aLVBMGnhaviEdJVLtlK8KqkAUb77KaZWJPF4_g-v4ZrT5zsVTiLW36lesAw3FZP-6kpGGwePC"></script>

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
	
	<br><br><br>
	<center>
	<h1>Feedback About All Order</h1>	
	<br>	
				<table class=" table table-striped table-bordered w-75">
					<thead>
				<tr>
		
				<th>Order No</th>
				<th>Title</th>
				<th>Feedback</th>
				<th>Date</th>
				
				</tr>
				</thead>
				<?php
				include('../database.php');
		
				$msg= null;
				$totalamoun=0;
				$i=1;
				
				$userid=$_SESSION['client_id'];
				$query="SELECT * FROM feedback WHERE feedback_user='$userid'";
				$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
						while($row = mysqli_fetch_object($results))
						{
							$fbid = $row->feedback_id;
							$order   = $row->buyer_order;
							$title   = $row->title;
							$comment   = $row->feedback_comment;
							$commentdate   = $row->feedback_date;	
				?>
				<tbody>
				<tr>
			
				<td><?php echo $order; ?></td>
				<td><?php echo $title; ?></td>
				<td><?php echo $comment; ?></td>
				<td><?php echo $commentdate; ?></td>
				</tr>
				</tbody>
				<?php }}}else{ echo mysqli_error($connection);} ?>
				</table>
				</div>
			</div>			
		</div>

		</center>
			
