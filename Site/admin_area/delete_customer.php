


<?php
include("includes/db.php");


/*if (isset($_GET['delete_pro'])) {
	echo"<script>alert('Do you really want to delete product with ID of ' . $_GET['delete_pro'] . '? <a href='inventory_list.php?yesdelete=' . $_GET['delete_pro'] . ''>Yes</a> | <a href='inventory_list.php'>No</a>')</script>";
	exit();
}*/


if(isset($_GET['delete_cust']))
{
	$delete_id = $_GET['delete_cust'];
	
	$delete_cust = "delete from customers where customer_id = '$delete_id'";
	
	$run_delete = mysqli_query($con, $delete_cust);
	
	if($run_delete)
	{
		echo"<script>alert('A customer has been deleted!')</script>";
		echo"<script>window.open('index.php?view_customers','_self')</script>";
	}
}
?>

