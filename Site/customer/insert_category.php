<?php

if(!isset($_SESSION['customer_email']))
{
	echo "<script>window.open('../customer_login.php?not_admin=You are not an Merchant!','_self')</script>";
}
else
{
	

?>

<form action="" method="post" style="padding:80px;">
<b>Insert new Category</b>
	<input type="text" name="new_brand" required="required">
    <input type="submit"  name="add_category" value="Add Category">
</form>

<?php
include("includes/db.php");
if(isset($_POST['add_category']))
{
	$new_category = $_POST['new_category'];
	
	$insert_category = "insert into wcategories (category_title) values ('$new_category')";
	$run_category = mysqli_query($con, $insert_brand);
	
	if($run_category)
	{
		echo"<script>alert('New Category has been inserted!')</script>";
		echo"<script>window.open('../index2.php','_self')</script>";
	}
}
?>

<?php } ?>