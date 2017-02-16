
<?php
include("../includes/db.php");
if(isset($_GET['edit_cat']))
{
	$cat_id = $_GET['edit_cat'];
	
	$get_cat = "SELECT * FROM wcategories WHERE cat_id = '$cat_id'";
	
	$run_cat = mysqli_query($con, $get_cat);
	$row_cat = mysqli_fetch_array($run_cat);
	
	$cat_id = $row_cat['cat_id'];
	$cat_title = $row_cat['cat_title'];

}

?>


<form action="" method="post" style="padding:80px;">
<b>Update Category</b>
	<input type="text" name="new_cat" value="<?php echo $cat_title; ?>" />
    <input type="submit"  name="update_cat" value="Update Category">
</form>

<?php
include("../includes/db.php");
if(isset($_POST['update_cat']))
{
	$update_id = $cat_id;
	$new_cat = $_POST['new_cat'];
	
	$update_cat = "update wcategories set cat_title='$new_cat' where cat_id='$update_id'";
	$run_update_cat = mysqli_query($con, $update_cat);
	
	if($run_update_cat)
	{
		echo"<script>alert('New Catgory has been Updated Successfully!')</script>";
		echo"<script>window.open('index2.php?view_cats','_self')</script>";
	}
}
?>