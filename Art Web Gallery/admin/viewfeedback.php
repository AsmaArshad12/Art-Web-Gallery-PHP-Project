<?php
	include_once('adminheader.php');
	require '../database.php';
?>

	<!Doctype html>
	<html>
	<head>
		<title>View Feedback</title>
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
    	<br><br>
    	<center>
				
               <h1>View Feedback</h1>
				<br>	
				<table class=" table table-striped table-bordered w-75">
					<thead>
				<tr>
				
				<th>Client Name</th>
				<th>Order No.</th>
				<th>Title</th>
				<th>Feedback</th>
				<th>Date</th>
				
				</tr>
				</thead>
				<?php
				
				$msg= null;
				$totalamoun=0;
				$i=1;
				
				$query="SELECT * FROM feedback inner join client on client.client_id=feedback.feedback_user";
				$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
						while($row = mysqli_fetch_object($results))
						{
					
							$clientName = $row->clientName;
							$order   = $row->buyer_order;
							$title   = $row->title;
							$comment   = $row->feedback_comment;
							$commentdate   = $row->feedback_date;	
				?>
				<tbody>
				<tr>
			
				<td><?php echo $clientName; ?></td>
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
</body>
</html>
			
