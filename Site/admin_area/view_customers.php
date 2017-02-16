<?php

if(!isset($_SESSION['admin_email']))
{
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else
{
	

?>


<table width="795" align="center" bgcolor="pink">
	<tr align="center">
    	<td colspan="6"><h2>View All Customers Here</h2></td>
    </tr>
    
    <tr  align="center" bgcolor="skyblue">
    	<th>S.N</th>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
        <!--<th>Edit</th>-->
        <th>Delete</th>
    </tr>
    <?php
    include("includes/db.php");
	
	$get_cust = "SELECT * FROM customers";
	$run_cust = mysqli_query($con, $get_cust);
	$i = 0;
	while($row_cust=mysqli_fetch_array($run_cust))
	{
		$cust_id = $row_cust['customer_id'];
		$cust_name = $row_cust['customer_name'];
		$cust_email = $row_cust['customer_email'];
		$cust_image = $row_cust['customer_image'];
		$i++;
	
	
	?>
    
    <tr align="center">
    	<td><?php echo $i; ?></td>
        <td><?php echo $cust_name; ?></td>
        <td><?php echo $cust_email; ?></td>
        <td><img src="../customer/customer_images/<?php echo $cust_image; ?>" width="60" height="60" /></td>
        <!--<td><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>-->
        <td><a href="delete_customer.php?delete_cust=<?php echo $cust_id; ?>">Delete</a></td>
    </tr>
	<?php } ?>
</table>

<?php } ?>