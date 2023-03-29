<?php
require '../database.php';
include_once('clientheader.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>

	<style media="screen">
	h1{
text-align: center;
	 text-transform: uppercase;
	 color: cornflowerblue;
	 margin-top: 100px;
	 font-family: ui-sans-serif;
	}
	.products{
     display:flex;
     justify-content: space-between;
     flex-wrap: wrap;
     margin: auto;
    width:60%;
    height: 100%;

}
.img{
    display: inline-block;
    margin: 40px 0 20px;
    width: 250px;
    height: 280px;
    border: 1px solid #34d8eb;
    box-sizing: border-box;
    border-radius: 10px;
}
img{
    width: 150px;
    height: 150px;
    background: contain;
    padding: 5px;
    border-radius: 15px;
}

label{
    text-align: center;
    color: #34d8eb;
    font-size: 18px;
}
.logo-search {
    position: relative;
    display: flex;
    justify-content: space-around;
    width: 100%;
</style>


</head>

<body style="background-color:#DDF1FF;">
<div Class="products">
	<?php
	$query2="SELECT * FROM artproduct ";
	if(isset($_POST['searchBtn'])){
	$searchtermed=$_POST['searcProduct'];
		$query2="SELECT * FROM artproduct WHERE Name LIKE '%$searchtermed%' ";
	}
	$data2=mysqli_query($connection,$query2);
	if(mysqli_num_rows($data2)>0){
	while ($row=mysqli_fetch_array($data2)){
		$product_id = $row['Product_id'];	
		$product_img=$row['picture'];
		$product_name=$row['Name'];
		$product_price=$row['Price'];
		?>
        <div class="img" align="center">
		    <img src="<?php echo '../images/'.$product_img;?>" alt=""><br>
       <b class="text-primary"><?php echo $product_name;?></b><br>
            <b class="text-primary">Rs:  <?php echo $product_price;?></b>
			<br>
			<form method="post" action="">
			<input type="hidden" name="productid" value="<?php echo $product_id; ?>">
			<input class="btn btn-primary" type="submit" name="addtocart" value="Add To Cart"><br>
			</form>
        </div>
    <?php
	}}else{echo "No Product Found";}
    ?>
</div>

</body>
</html>
