<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
session_start();
//include("/functions/functions.php");
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


</head>

<body>

<div class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid" >
		<div class="navbar-header" >
			<a href="../index.php" class="navbar-brand">TheLeatherCity</a>
		</div>
			<ul class="nav navbar-nav">
				
				
				<?php
            
				if(!isset($_SESSION['customer_email']))
				{
				echo"";
				}
				else
				{
				echo "<li><a href = 'my_account.php'>My Account</a></li>";
				}
			
				?>
				
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
				<li><a href="register_referer.php" ><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
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
					<li><a href='../logout.php'><span class='glyphicon glyphicon-log-out'></span> Sign Out</a></li>";
				}
				?>
			</ul>
			
			<div class="nav navbar-nav form-inline navbar-right" style="padding:10px;">
				<div class="input-group">
				<form method = "get" action = "results.php" enctype="multipart/form-data" >
				<input type="text" class="form-control" name="user_query" placeholder="Search a Product..." style="height:28px; width:250px;"></input>
					<div class="input-group-btn">
					<button class="btn btn-default " name = "search" ><i class="glyphicon glyphicon-search " ></i></button>
					</div>
				</form>
				</div>
			</div>
			
	</div>
	<div class="container-fluid">
		<div class= "navbar-header " style="padding:5px;">
            <?php
            if(isset($_SESSION['customer_email']))
			{
				echo"<b>Welcome : </b>" . $_SESSION['customer_email'] ;
			?>
			<!--<a href="cart.php" style="text-decoration:none;">Go To Your <span class="glyphicon glyphicon-shopping-cart"></span>: <span class="badge"><?php //total_items();?></span></a> <b><span class="glyphicon glyphicon-gbp" ></span></b>: <span class="badge"><?php //total_price(); ?></span>-->
			<?php
			}
			else
			{
				echo "";
			}
			?>
		</div>	
	</div>
	</div>
	<br><br><br><br>
	

	
</body>
</html>

 	


