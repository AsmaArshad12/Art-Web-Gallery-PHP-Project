<?php
require '../database.php';
include_once('adminheader.php');
?>
<!Doctype html>
	<html>
	<head>
		<title>View Artists</title>

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
<h1>View Artists</h1>
<br>

<div class="table-responsive">
<table class=" table table-striped table-bordered w-75">
	<thead>
<tr>
<th>Artist ID</th>
<th>Artist Name</th>
<th>Contact</th>
<th>Address</th>
<th>Email</th>
<th>Username</th>
<th>Password</th>
<th>Update</th>
<th>Delete</th>
</tr>
</thead>
<?PHP  

$error = null;
$msg= null;         
            $Sno=1;
				$query = "SELECT * FROM artist";
			$results=mysqli_query($connection,$query);
				if($results){
				if(mysqli_num_rows($results)){
					while($row = mysqli_fetch_object($results))
					{	
						$artistid = $row->ArtistID;
						$FullName = $row->FullName;
						$Contact_no = $row->Contact_no;
						$Address = $row->Address;
						$Email = $row->Email;
						$Username = $row->Username;
						$password = $row->password;
												
								?>
						<tbody>
						<tr>
						<td><?php echo ($artistid); ?> </td>
						<td><?php echo ($FullName); ?> </td>
						<td><?php echo ($Contact_no); ?></td>
						<td><?php echo ($Address); ?> </td>
						<td><?php echo ($Email); ?></td>
						<td><?php echo ($Username); ?></td>
						<td><?php echo ($password); ?></td>
						<td>
						<form method="post" action="updateArtist.php">
						<input type="hidden" name="artist" Value="<?php echo($artistid);?>"/>
						<button class="btn btn-success" name="update">Update</button>
						</td>
						<td>
						<button class="btn btn-danger" name="delete">Delete</button>
					</td>
				</form>
			</td>
		</tr>
    </tbody>
						<?php
							}	
						
					}else{ echo 'No Record available';}
				}else{ echo 'database error';}				
?>	
            </table>
           </div>
         </center>
      </body>
</html>
