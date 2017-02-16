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
<link rel="stylesheet" href="styles/stylee.css" media="all" />
<link rel="stylesheet" href="styles/newstyle.css" media="all" />
<link rel="stylesheet" href="styles/sidebar.css" media="all">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="styles/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<link rel="stylesheet" href="styles/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="js/jquery.js"></script>
</head>

<body>
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a href="index.php" class="navbar-brand">TheLeatherCity</a>
		</div>
		<img style='margin: 5px 0 0px 935px;' src='includes/alac.png'></img>
		<ul class="nav navbar-nav navbar-right">
				
				
				<?php
				
				if(!isset($_SESSION['customer_email']))
				{
					echo"
					<li><a style='margin:  0 0 0 200;'href='header.inc.php' data-toggle='modal' data-target='#popUpWindow'><span class='glyphicon glyphicon-log-in'></span> Sign In</a></li>";
					
				}
				else
				{
					echo "
					<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Sign Out</a></li>";
				}
				?>
				<!--<li><a href="#"><span class="glyphicon glyphicon-modal-window"></span> contact Us</a></li>-->
			</ul>
</div>	
</div>	
<!--<img src='includes/alca33.png'></img>
<a href = "././customer_registration.php" ><img style = "margin-left:350px;" src="includes/buyer_signup.png"></img></a>
<a href = "#" ><img style = "margin-left:440px;" src="includes/seller_signup.png"></img></a>-->
<br><br><br><br><br>
<center><h2 style =  "color: #7c795d; font-family: 'Trocchi', serif; font-size: 35px; font-weight: normal; line-height: 48px; margin: 0;" > Lets Get Started To Sell Your Raw Products On TheLeatherCity  </h2></center>

<h2 style = 'color: #d54d7b; font-family: "Great Vibes", cursive; font-size: 35px; line-height: 160px; font-weight: normal;  margin-left: 0px; margin-bottom: 0px; margin-top: 10px; text-align: center; text-shadow: 0 1px 1px #fff;'>Register and Start Selling</h2>

<center><img src="includes/admin.png"></img></center>

	<form style = 'text-align: center'; action="" method="post" style="padding:80px;">
		<h4 >Enter below details to continue Register</h4>
		<h5>Legal Name : <input type="text" name="legal_name" required="required"></h5>
		<input style="margin-left:195px;"type="submit" name="add_legal_name" value="Register">
		
	</form>

<?php

if(isset($_POST['add_legal_name']))
{
	if(!isset($_SESSION['customer_email']))
	{
		echo "<script>alert('Please Signin Or Signup To Purchase!')</script>";
	}
	else{
	$user = $_SESSION['customer_email'];
	
	$c_merchant = $_POST['legal_name'];
	
	$insert_merchant = "update customers set customer_merchant='$c_merchant' where customer_email='$user'";
	
	$run_merchant = mysqli_query($con, $insert_merchant);
	
	if($run_merchant)
	{
		echo"<script>alert('Congratulations! Now You are a Merchant of The Leather City')</script>";
		echo"<script>window.open('index.php','_self')</script>";
	}
	}
}
?>
	
<!-- LogIn Starts Here -->
	
	<div class="modal fade" id="popUpWindow">
		<div class="modal-dialog">
			<div class="modal-content">
							
		<!-- header -->
							
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h3 class="modal-title">Sign In</h3>
		</div>
							
		<!-- body(form) -->
							
		<div class="modal-body">
			<form role="form" method="post" action="">
			<div class="form-group">
				<div class="input-group input-group-sm">
					<input type="email" class="form-control" name="c_email" placeholder="Email" />
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-envelope"></span>
					</span>
				</div>
			</div>
				
			<div class="form-group">
				<div class="input-group input-group-sm">
					<input type="password" class="form-control" name="c_pass" placeholder="Password">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-lock"></span>
					</span>
				</div> 
			</div>
								
		<!-- button -->
							
		<div class="modal-footer">
			<a href="#" style="text-decoration:none; float:left;">Forget Password ?</a>
			<!--<a style = "text-decoration:none;" href="header.inc.php" data-toggle='modal' data-target='#popUpWindow1'>New Register Here</a>-->
			<a style = "text-decoration:none;" href="customer_registration.php" >New Register Here</a>
			<input type="submit" name="login" class="btn btn-primary btn-block" value = "Sign In" ></input>
			
		</div>
								
			</form>
								
		</div>
							
		</div>
	</div>
</div>
	
  <?php

if(isset($_POST['c_email'])&&isset($_POST['c_pass']))
{
	$c_email = mysql_real_escape_string($_POST['c_email']);
	$c_pass = mysql_real_escape_string($_POST['c_pass']);
	
	if(!empty($c_email)&&!empty($c_pass))
	{
	$c_chk = "SELECT * FROM customers WHERE customer_email = '".mysql_real_escape_string($c_email)."' AND customer_pass = '".mysql_real_escape_string($c_pass)."' "; /*to protect user frm sql injection using dis in "NOTE: username = '' OR ''=' :ETON"  in dis line*/
	    if($query_run = mysqli_query($con, $c_chk))
		{
			$query_num_rows = mysqli_num_rows($query_run);
		}
		if($query_num_rows==1)
		{
			//session_start();
			//$c_email = mysqli_result($con, $query_run, 0, 'customer_email');
			$_SESSION['customer_email']=$c_email;
			//header('Location: index.php');
			echo "<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";
			//$run_c = mysqli_query($con, $c_chk);
	
	//$sel_cart = "select * from cart where ip_add = '$ip'";  1vKGpiguEo
	
	$sel_cart = "select * from cart where customer_email = '$c_email'";
	
	$run_cart = mysqli_query($con, $sel_cart);
	
	$check_cart = mysqli_query($run_cart);

	if($check_cart==0)
	{
		$_SESSION['customer_email']=$c_email;
		
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
	}
	else
	{
		$_SESSION['customer_email']=$c_email;
		
		echo "<script>window.open('checkout.php','_self')</script>";
	}
			
			
		}
		else if($query_num_rows==0)
		{
			echo "<script>alert('Invalid Email_id or password!')</script>";
			echo "<script>window.open('index.php','_self')</script>";  
		}
	}
	else
	{
		echo 'Please fill all fields';
	}	
}
?>
	<!-- End of Login -->
</body>
</html>