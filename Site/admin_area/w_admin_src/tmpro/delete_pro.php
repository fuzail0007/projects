<?php

if(!isset($_SESSION['admin_email']))
{
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else
{
	

?>

<?php
include("includes/db.php");


/*if (isset($_GET['delete_pro'])) {
	echo"<script>alert('Do you really want to delete product with ID of ' . $_GET['delete_pro'] . '? <a href='inventory_list.php?yesdelete=' . $_GET['delete_pro'] . ''>Yes</a> | <a href='inventory_list.php'>No</a>')</script>";
	exit();
}*/


if(isset($_GET['delete_pro']))
{
	$delete_id = $_GET['delete_pro'];
	
	$delete_pro = "delete from products where product_id = '$delete_id'";
	
	$run_delete = mysqli_query($con, $delete_pro);
	
	if($run_delete)
	{
		echo"<script>alert('A Product has been deleted!')</script>";
		echo"<script>window.open('index.php?view_products','_self')</script>";
	}
}
?>

<?php } ?>