<?php
if(!isset($_SESSION['admin_email']))
{
	echo "<script>window.open('../login.php?not_admin=You are not an Admin!','_self')</script>";
}
else
{
	

?>


<table width="795" align="center" bgcolor="pink">
	<tr align="center">
    	<td colspan="6"><h2>View All Categories Here</h2></td>
    </tr>
    
    <tr  align="center" bgcolor="skyblue">
    	<th>Category ID</th>
        <th>Category Title</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    include("../includes/db.php");
	
	$get_cat = "SELECT * FROM wcategories";
	$run_cat = mysqli_query($con, $get_cat);
	$i = 0;
	while($row_cat=mysqli_fetch_array($run_cat))
	{
		$cat_id = $row_cat['cat_id'];
		$cat_title = $row_cat['cat_title'];
		$i++;
	?>
    
    <tr align="center">
    	<td><?php echo $i; ?></td>
        <td><?php echo $cat_title; ?></td>
        <td><a href="index2.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
        <td><a href="delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>
    </tr>
	<?php } ?>
</table>

<?php } ?>