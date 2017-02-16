<br>
<h2 style="text-align:center; color:#3FC;" class="alert alert-warning" >Do You Really Want to DELETE your Account?</h2>
<form action="" method="post">
<br>
<input type = "submit" class="btn btn-danger" name = "yes" value = "YES" />

<input type = "submit" class="btn btn-success" name = "no" value = "NO" />

</form>

<?php
include("includes/db.php");
	$user = $_SESSION['customer_email'];
if(isset($_POST['yes']))
{
	$delete_customer = "delete from customers where customer_email = '$user'";
	
	$run_customer = mysqli_query($con, $delete_customer);
	
	$filter_customers = mysqli_num_rows($run_customer);
	
	echo "<script>alert('We are really Sorry! Your account has been deleted!')</script>";
	echo "<script>window.open('../index.php','_self')</script>";
}

if(isset($_POST['no']))
{
	echo "<script>alert('Thank You For Co Operating With Us.')</script>";
	echo "<script>window.open('my_account.php','_self')</script>";
}

?>