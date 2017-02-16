<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include("includes/db.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<link rel="stylesheet" href="styles/newstyle.css" media="all" />
<link rel="stylesheet" href="styles/sidebar.css" media="all">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="styles/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


<link rel="stylesheet" href="styles/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">


<script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="js/jquery.js"></script>
<title>signIn</title>

<!--<link rel="stylesheet" href="styles/style.css" media="all" />-->

</head>

<body>
<?php 
	include("includes/header.inc.php");
?>
<div>
<br><br>
	<form method="post" action="customer_login.php" enctype="multipart/form-data">
    
    	<table width="500" align="center">
        
        	<tr align="center">
            	<td colspan="3" style="padding:5px;"><h2>Login or Register to Buy!</h2></td>
            </tr>
            
        	<tr>
            	<td align="left" style="padding:5px;"><b>Email:</b></td>
                <td align="left" style="padding:5px;"><input type="email" name="c_email" placeholder="Enter Email" /></td>
            </tr>
            
            <tr>
            	<td align="left" style="padding:5px;"><b>Password:</b></td>
                <td align="left" style="padding:5px;"><input type="password" name="c_pass" placeholder="Enter Password" /></td>
            </tr>
            
            <tr align="left">
            	<td colspan="3" style="padding:5px;"><a style = "text-decoration:none;" href="checkout.php?forget_pass">Forget Password ?</a></td>
				<td><h5 style="float:right; padding-right:20px;"><a style = "text-decoration:none;"href = "customer_registration.php">New Register Here</a></h5></td>
            </tr>
            
            <tr align="center">
            	<td colspan="3" style="padding:5px;"><input class="btn btn-primary" type="submit" name="login" value = "Login" /></td>
            </tr>
            
        </table>
        
        	
        
    </form>
		
</div>
<br><br><br><br><br><br>
<?php 
	include("includes/footer.inc.php");
?>

</body>
</html>
  
<?php

if(isset($_POST['c_email'])&&isset($_POST['c_pass']))
{
	$c_email = mysqli_real_escape_string($con, $_POST['c_email']);
	$c_pass = mysqli_real_escape_string($con, $_POST['c_pass']);
	
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
			echo "<script>window.open('customer_login.php','_self')</script>";  
		}
	}
	else
	{
		echo 'Please fill all fields';
	}
	
	
	
}

?>