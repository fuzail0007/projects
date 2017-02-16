<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
session_start();
include("functions/functions.php");
include("db.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<title>The Leather City</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="styles/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="styles/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<script src="js/jquery.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!--<link rel="stylesheet" href="styles/style.css" media="all" />-->

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>

<div class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid" >
		<div class="navbar-header" >
			<a href="index.php" class="navbar-brand">TheLeatherCity</a>
		</div>
			<ul class="nav navbar-nav">
				<!--<li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>-->
				
				
					<li><a href="#" id="menu-toggle"><span class='glyphicon glyphicon-menu-hamburger'></span> All Categories </a></li>
				
				<!--Menu toggle script-->
		        <script>
				$("#menu-toggle").click( function (e){
				e.preventDefault();
				$("#wrapper").toggleClass("menuDisplayed");
				});
				</script>
				<!--Menu toggle script Ends-->
				<?php
            
				if(!isset($_SESSION['customer_email']))
				{
				echo"";
				}
				else
				{
				echo "<li><a href = 'customer/my_account.php'>My Account</a></li>";
				}
			
				?>
				
				<!--<li class="dropdown">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle">Mens <span class="caret"></span></a>
					<ul class="dropdown-menu">
					
						<li><a href='#'>Coats</a></li>
					
						<li><a href='#'>shoes</a></li>
					</ul>
				</li>
				
				<li class="dropdown">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle">Womens <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">footWear</a></li>
						<li><a href="#">Jackets</a></li>
					</ul>
				</li>
				
				<li class="dropdown">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle">Boys <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">footWear</a></li>
						<li><a href="#">Jackets</a></li>
					</ul>
				</li>
				
				<li class="dropdown">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle">Girls <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">footWear</a></li>
						<li><a href="#">Jackets</a></li>
					</ul>
				</li>-->
				
			</ul>
						
			<ul class="nav navbar-nav navbar-right">
				<!--<li><a href="#"><span class="glyphicon glyphicon-modal-window"></span> contact Us</a></li>-->
				<?php 
				if(isset($_SESSION['customer_email']))
				{
					
				}
				else{
				?>
				<!--<li><a href="header.inc.php" data-toggle='modal' data-target='#popUpWindow1'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>-->
				<!--<li><a href="register_referer.php" ><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>-->
				<li><a href="././customer_registration.php" ><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
				<?php
				}
				if(!isset($_SESSION['customer_email']))
				{
					echo"
					<li><a href='././customer_login.php'><span class='glyphicon glyphicon-log-in'></span> Sign In</a></li>";
					
				}
				else
				{
					echo "
					<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Sign Out</a></li>";
				}
				?>
			</ul>
			
			<div class="nav navbar-nav form-inline navbar-right" style="padding:10px;">
				<div class="input-group">
				<form method = "get" action = "results.php" enctype="multipart/form-data" >
				<input type="text" class="form-control" name="user_query" placeholder="Search a Product..." style="height:28px; width:300px; "></input>
					<div class="input-group-btn" >
					<button class="btn btn-default" class="input-group-btn" name = "search" ><i class="glyphicon glyphicon-search "  ></i></button>
					</div>
				</form>
				</div>
			</div>
			
	</div>
	<div class="container-fluid">
		
		
	
			<div class= "navbar-header " style="padding:5px;">
			
			<?php cart(); ?>

            <?php
            if(isset($_SESSION['customer_email']))
			{
				echo"<b>Welcome : </b>" . $_SESSION['customer_email'] ;
			?>
			<a href="cart.php" style="text-decoration:none;">Go To Your <span class="glyphicon glyphicon-shopping-cart"></span>: <span class="badge"><?php total_items();?></span></a> <b><i class="fa fa-inr" style="font-size:18px"></i></b>: <span class="badge"><?php total_price(); ?></span>
            
			<?php
			}
			else
			{
				echo "";
			}
			?>
			</div>	
			<ul class="nav nav-tabs nav-tab-default nav-justified nav-responsive">
			<li><a href="index.php" name="finished_pro">Finished Products</a></li>
			<li><a href="index2.php" name="raw_pro">Raw Products</a></li>
		</ul>
			</div>
	</div>
	<br><br><br><br><br>
	

	
</body>
</html>

 	


