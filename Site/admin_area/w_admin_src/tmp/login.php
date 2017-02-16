


<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Login</title>
<link rel="stylesheet" href="styles/login_style.css" media="all" />
</head>

<body>

<div class="login">
<h2 style="color:white; text-align:center;"><?php echo @$_GET['not_admin']; ?></h2>
<h2 style="color:white; text-align:center;"><?php echo @$_GET['logged_out']; ?></h2>
	
    <h1>Admin Login</h1>
    <form method="post" action="login.php ">
    	<input type="email" name="email" placeholder="Email" required="required" />
        <input type="password" name="pass" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Login</button>
    </form>
    <center><a href="../index.php">Home</a></center>
</div>

</body>
</html>

<?php

include("includes/db.php");
if(isset($_POST['login']))
{
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$pass = mysqli_real_escape_string($con, $_POST['pass']);
	//If mysql is used means no need $con. otherwise mysqli is used means put $con 
	/*$email = mysql_real_escape_string($_POST['email']);
	$pass = mysql_real_escape_string($_POST['pass']);*/
	
	$sel_admin = "SELECT * FROM admins WHERE admin_email = '$email' AND admin_pass = '$pass'";
	$run_admin = mysqli_query($con, $sel_admin);
	
	$check_admin = mysqli_num_rows($run_admin);
	
	if($check_admin==1)
	{
		$_SESSION['admin_email']=$email;
		
		echo"<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";
		
	}
	else
	{
		echo "<script>alert('Email or Password is Wrong!')</script>";
	}
}
?>
