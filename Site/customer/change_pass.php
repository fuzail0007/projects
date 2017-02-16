<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

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
<div class="container">

<h2 style="text-align:center;">Change Your Password</h2>

<form role="form" action = "" method = "POST">
<div class="table-responsive">
<table class="table table-bordered" align="center">
<tbody>
<tr>
<td>Enter your Current Password:</td><td><input class="form-control" type = "password" name = "current_pass"   ></td>
</tr>
<tr>
<td>Enter your New Password:</td><td><input class="form-control" type = "password" name = "new_pass"   ></td>
</tr>
<tr>
<td>Confirm New Password:</td><td><input class="form-control" type = "password" name = "new_pass_again" ></td>
</tr>
<tr align="center">
<td colspan="5"><input type = "submit" class="btn btn-default" name = "change_pass" value = "Change Password" ></td>
</tr>
</tbody>
</table>
</form>
</div>
</body>
</html>
<?php

include("includes/db.php");

if(isset($_POST['change_pass']))
{
	$current_pass = $_POST['current_pass'];
	$new_pass = $_POST['new_pass'];
	$new_pass_again = $_POST['new_pass_again'];
	
			$user = $_SESSION['customer_email'];
	
	$sel_pass = "SELECT * FROM customers WHERE customer_pass = '$current_pass' AND customer_email = '$user'";
	
	$run_pass = mysqli_query($con, $sel_pass);
	
	$check_pass = mysqli_num_rows($run_pass);
	
	if($check_pass == 0)
	{
		echo "<script>alert('Your Current Password is Wrong! Try again.')</script>";
		exit();
	}
	if($new_pass!=$new_pass_again)
	{
		echo "<script>alert('New Password do not Match! Try again.')</script>";
		exit();
	}
	else
	{
		$update_pass = "update customers set customer_pass = '$new_pass' where customer_email = '$user'";
		
		$run_update = mysqli_query($con, $update_pass);
		
		echo "<script>alert('Your Password Updated Successfully!')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
	}
}

?>