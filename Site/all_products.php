<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include("functions/functions.php");

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>All Products</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<link rel="stylesheet" href="styles/newstyle.css" media="all" />
<link rel="stylesheet" href="styles/sidebar.css" media="all">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="styles/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


<link rel="stylesheet" href="styles/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">


<script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="js/jquery.js"></script>

</head>

<body>
         <div id = "products_box">
         <?php
		 include("includes/header.inc.php");
		 
		 
        $get_pro = "SELECT * FROM products";
	
		$run_pro = mysqli_query($con, $get_pro);
	
		while($row_pro = mysqli_fetch_array($run_pro))
		{
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		$pro_brand = $row_pro['product_brand'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
	
		echo "
			<div id = 'single_product'>
				<h3>$pro_title</h3>
				
				<img src = 'admin_area/product_images/$pro_image' width='180' height='180' />
				
				<p><img src='images/Indian_Rupee.jpg' alt = 'Rupee' width = '15' height = '10' ></img> : <b> $pro_price </b></p>
				
				<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
				
				<a href='index.php?add_cart=$pro_id'><button style = 'float:right'>Add to Cart</button></a>
			</div>
		";
			}
         ?>
		 <div id="wrapper">
		<!--Sidebar-->
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<?php getCats(); ?>
			</ul>
		</div>
		</div>
         </div>
        
        
</body>
</html>