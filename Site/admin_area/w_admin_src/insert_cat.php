<?php

if(!isset($_SESSION['admin_email']))
{
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else
{
	

?>

<form action="" method="post" style="padding:80px;">
<b>Insert new Category</b>
	<input type="text" name="new_cat" required="required">
    <input type="submit"  name="add_cat" value="Add Category">
</form>

<?php
include("../includes/db.php");
if(isset($_POST['add_cat']))
{
	$new_cat = $_POST['new_cat'];
	
	$insert_cat = "insert into wcategories (cat_title) values ('$new_cat')";
	$run_cat = mysqli_query($con, $insert_cat);
	
	if($run_cat)
	{
		echo"<script>alert('New Catgory has been inserted!')</script>";
		echo"<script>window.open('index2.php?view_cats','_self')</script>";
	}
}
?>

<?php } ?>