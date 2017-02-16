
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>My Account</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="styles/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="styles/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<script src="js/jquery.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<!--<link rel="stylesheet" href="styles/style.css" media="all" />-->
<link rel="stylesheet" href="styles/sidebar.css">
</head>

<body>
<?php 
	include(".././includes/tmp_nav1.php");
	include("includes/db.php");
	include("../functions/functions.php");

            $user = $_SESSION['customer_email'];
			
			$get_img = "SELECT * FROM customers where customer_email = '$user'";
			$run_img = mysqli_query($con, $get_img);
			$row_img = mysqli_fetch_array($run_img);
			$c_image = $row_img['customer_image'];
			$c_name = $row_img['customer_name'];
			$c_merchant = $row_img['customer_merchant'];
			echo "<p style='text-align:center;'><img class='img-rounded' class='img-thumbnail' src='customer_images/$c_image' width='300' height='250'></p>";
			?>
		<div id="wrapper">
		<!--Sidebar-->
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
			<?php
			if($c_merchant == NULL)
			{
				
				echo "<li><a href = 'my_account.php?my_orders'>My Orders</a></li>";
				echo "<li><a href = 'my_account.php?my_raw_orders'>My Raw Orders</a></li>";
				echo "<li><a href = 'my_account.php?edit_account'>Edit Account</a></li>";
				echo "<li><a href = 'my_account.php?change_pass'>Change Password</a></li>";
				echo "<li><a href = 'my_account.php?delete_account'>Delete Account</a></li>";
				
			}
			else
			{
				echo "<li><a href = 'my_account.php?insert_product'>Insert Product</a></li>";
				echo "<li><a href = 'my_account.php?insert_brand'>Insert Brand</a></li>";
				echo "<li><a href = 'my_account.php?insert_category'>Insert Category</a></li>";
				echo "<li><a href = 'my_account.php?my_orders'>My Orders</a></li>";
				echo "<li><a href = 'my_account.php?my_raw_orders'>My Raw Orders</a></li>";
				echo "<li><a href = 'my_account.php?edit_account'>Edit Account</a></li>";
				echo "<li><a href = 'my_account.php?change_pass'>Change Password</a></li>";
				echo "<li><a href = 'my_account.php?delete_account'>Delete Account</a></li>";
			}
			?>
			</ul>
		</div>
		<!--Page Content-->
		
		<div id="page-content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
					<?php
					if($c_merchant == NULL)
					{
					echo"<a href='#' class='btn btn-success' id='menu-toggle'>My Account</a>";
					}
					else
					{
					echo"<a href='#' class='btn btn-success' id='menu-toggle'>My Dashboard</a>";	
					}
					?>
			<?php cart(); ?>

			<?php
		
		if(!isset($_GET['insert_product'])){
			if(!isset($_GET['insert_brand'])){
				if(!isset($_GET['insert_category'])){	
					if(!isset($_GET['my_orders'])){
						if(!isset($_GET['my_raw_orders'])){
							if(!isset($_GET['edit_account'])){
								if(!isset($_GET['change_pass'])){
									if(!isset($_GET['delete_account'])){
         echo "
		 <h2 style='padding:20px; color:#63C;'> Welcome: $c_name  $c_merchant</h2>
		 <b>You can see your Order's Progress by clicking this <a href='my_account.php?my_orders'>link</a></b>";
									}
								}
							}
						}
					 }
				 }
			 }
		 }
		 
			?>
         
		<?php
		if(isset($_GET['insert_product']))
		 {
			 include("insert_product.php");
		 }
		 if(isset($_GET['insert_brand']))
		 {
			 include("insert_brand.php");
		 }
		 if(isset($_GET['insert_category']))
		 {
			 include("insert_category.php");
		 }
		if(isset($_GET['my_orders']))
		 {
			 include("my_orders.php");
		 }
		 if(isset($_GET['my_raw_orders']))
		 {
			 include("my_raw_orders.php");
		 }
		 if(isset($_GET['edit_account']))
		 {
			 include("edit_account.php");
		 }
		 if(isset($_GET['change_pass']))
		 {
			 include("change_pass.php");
		 }
		 if(isset($_GET['delete_account']))
		 {
			 include("delete_account.php");
		 }
         ?>
					
					</div>
				</div>
			</div>
		</div>
	</div>
	
		<!--Menu toggle script-->
		<script>
		$("#menu-toggle").click( function (e){
			e.preventDefault();
			$("#wrapper").toggleClass("menuDisplayed");
		});
		</script>
		
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br>		 
<?php 
	include("includes/footer.inc.php");
?>
		
</body>
</html>