<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<title>Search Results</title>

<link rel="stylesheet" href="styles/newstyle.css" media="all" />
<link rel="stylesheet" href="styles/sidebar.css" media="all">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="styles/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


<link rel="stylesheet" href="styles/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">


<script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="js/jquery.js"></script>

</head>

<body>
<?php 
	include("includes/header.inc.php");
?>
<div id="wrapper">
		<!--Sidebar-->
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<?php getCats(); ?>
			</ul>
		</div>
</div>
	
        
         <div id = "products_box">
         <?php
		 if(isset($_GET['search']))
		 {
			 $search_query = $_GET['user_query'];
		
        $get_pro = "SELECT * FROM products WHERE product_keywords like '%$search_query%'";
	
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
			
			<div class='col-md-3'>
			
				<div class='thumbnail' >
				<h4 class='text-center' ><a style='text-decoration:none;' href='details.php?pro_id=$pro_id' style='float:left;'>$pro_title</a></h4>
				<img class='img-responsive' src = 'admin_area/product_images/$pro_image' style='width:100%; height:170px;' />
				
				<h4 class='text-center';><i class='fa fa-inr' style='font-size:18px'></i> <b> : $pro_price </b></h4>
				
				<h4 class='pull-left'><a style='text-decoration:none;' href='details.php?pro_id=$pro_id' style='float:left;'>Details</a></h4>
				
				<h4 class='pull-right'><a href='index.php?add_cart=$pro_id'><button class='btn btn-primary btn-xs'>Add to Cart</button></a></h4>
				
				</div>
				</div>
			
		";
			}
		 }
         ?>
         </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>		 
<?php 
	include("includes/footer.inc.php");
?>

</body>
</html>