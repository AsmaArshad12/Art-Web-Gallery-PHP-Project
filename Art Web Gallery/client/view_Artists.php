<?php
include "../database.php";
if(isset($_POST['search']))
{
$valueToSearch = $_POST['name'];

$query = "SELECT * FROM artist WHERE CONCAT(FullName) LIKE '%".$valueToSearch."%' || CONCAT(Username) LIKE '%".$valueToSearch."%' || CONCAT(Address) LIKE '%".$valueToSearch."%'";
$search_result = filterTable($query);


}
else {
$query = "SELECT * FROM artist";
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
  <title>View Artists </title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="style/style.css">

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
  <?php
   include "../database.php";
   include "../header/client-header.php";
   ?> 


<br><br><br>
<center>
        <div class="container">

          <h1>View Artists</h1> 
         <br>
<form method="post">


<div class="row">
<div class="col-md-8">


<input type="text" name="name" placeholder="Search Artist" required class="form-control" style="width:40%">


<input type="submit" class="btn btn-primary" value="search" name="search" style="margin-left:55%; margin-top: -69px;">
</div></div>




</form>

<br><br>

<div class="table-responsive">

<table class=" table table-striped table-bordered w-75">
	<thead>
     <tr>
       <th>Artist Name</th>
       <th>Email</th>
       <th>Contact No.</th>
       <th>Address</th>
     </tr>
</thead>


<?php while($row = mysqli_fetch_array($search_result)):?>
 
 <tbody>
    <tr>
       <td><?php echo $row['FullName'];?></td>
       <td><?php echo $row['Email'];?></td>
       <td><?php echo $row['Contact_no'];?>  </td>
       <td><?php echo $row['Address'];?></td>    
    </tr>
</tbody>

<?php endwhile;?>

              </table>
            </div>
        </div>
    </center>
</body>
</html>  