<?php

session_start();

if(!isset($_SESSION['admin_email']))
{
	echo "<script>window.open('../login.php?not_admin=You are not an Admin!','_self')</script>";
}
else
{
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<link rel="stylesheet" href="./../styles/style.css" media="all" />
</head>

<body>

	<div class="main_wrapper">
    
    	<div id="header">
		
		</div>
         <div class = "topmenubar">
        	<ul id = "topmenu">
            	<li><a href = "../index.php">Finshed Products</a></li>
                <li><a href = "index2.php">Raw Products</a></li>
            </ul>
        </div>
        <div id="right">
        
        <h2 style="text-align:center;">Manage content</h2>
        
        <a href="index2.php?insert_product">Insert New Product</a>
        <a href="index2.php?view_products">View All Products</a>
        <a href="index2.php?insert_cat">Insert New Category</a>
        <a href="index2.php?view_cats">View All Categories</a>
        <a href="index2.php?insert_brand">Insert New Brand</a>
        <a href="index2.php?view_brands">View All Brands</a>
        <!--<a href="index2.php?view_customers">View Customers</a>-->
        <a href="index2.php?view_orders">View Orders</a>
        <a href="index2.php?view_payments">View Payements</a>
        <a href="../logout.php">Admin Logout</a>
        
        </div>
        
		<div id="left">       
        <h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
        
        <?php
        if(isset($_GET['insert_product']))
		{
			include("insert_product.php");
		}
		if(isset($_GET['view_payments']))
		{
			include("view_payments.php");
		}
		if(isset($_GET['view_orders']))
		{
			include("view_orders.php");
		}
		
		if(isset($_GET['view_products']))
		{
			include("view_products.php");
		}
		if(isset($_GET['edit_pro']))
		{
			include("edit_pro.php");
		}
		if(isset($_GET['insert_cat']))
		{
			include("insert_cat.php");
		}
		if(isset($_GET['view_cats']))
		{
			include("view_cats.php");
		}
		if(isset($_GET['edit_cat']))
		{
			include("edit_cat.php");
		}
		if(isset($_GET['insert_brand']))
		{
			include("insert_brand.php");
		}
		if(isset($_GET['view_brands']))
		{
			include("view_brands.php");
		}
		if(isset($_GET['edit_brand']))
		{
			include("edit_brand.php");
		}
		if(isset($_GET['view_customers']))
		{
			include("view_customers.php");
		}
		?>
    </div> 
    </div>

</body>
</html>
<?php }?>
<?php
include("../includes/db.php");
if(isset($_GET['confirm_order']))
{
	$get_id = $_GET['confirm_order'];
	$status = 'Completed';
	$update_order = "update worders set status='$status' where order_id = '$get_id'";
	$run_update = mysqli_query($con, $update_order);
	if($run_update)
	{
		echo "<script>alert('Order Was Updated')</script>";
		echo "<script>window.open('index2.php?view_orders','_self')</script>";
	}
}

?>
