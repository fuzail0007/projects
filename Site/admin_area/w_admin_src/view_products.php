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
    	<td colspan="6"><h2>View All Products Here</h2></td>
    </tr>
    
    <tr  align="center" bgcolor="skyblue">
    	<th>S.N</th>
        <th>Title</th>
        <th>Image</th>
        <th>Price</th>
		<th>Quantity</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    include("../includes/db.php");
	
	$get_pro = "SELECT * FROM wproducts";
	$run_pro = mysqli_query($con, $get_pro);
	$i = 0;
	while($row_pro=mysqli_fetch_array($run_pro))
	{
		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_title'];
		$pro_image = $row_pro['product_image'];
		$pro_price = $row_pro['product_price'];
		$pro_quantity = $row_pro['product_quantity'];
		$i++;
	
	
	?>
    
    <tr align="center">
    	<td><?php echo $i; ?></td>
        <td><?php echo $pro_title; ?></td>
        <td><img src="w_product_images/<?php echo $pro_image; ?>" width="60" height="60" /></td>
        <td><?php echo $pro_price; ?></td>
		<td><?php echo $pro_quantity; ?></td>
        <td><a href="index2.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
        <td><a href="delete_pro.php?delete_pro=<?php echo $pro_id; ?>">Delete</a></td>
    </tr>
	<?php } ?>
</table>


<?php } ?>