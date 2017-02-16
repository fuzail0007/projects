<?php

if(!isset($_SESSION['admin_email']))
{
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else
{
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php

include("includes/db.php");

if(isset($_GET['edit_pro']))
{
	$get_id = $_GET['edit_pro'];
	$get_pro = "SELECT * FROM products where product_id='$get_id'";
	$run_pro = mysqli_query($con, $get_pro);
	
	$row_pro=mysqli_fetch_array($run_pro);
	
		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_title'];
		$pro_image = $row_pro['product_image'];
		$pro_quantity = $row_pro['product_quantity'];
		$pro_price = $row_pro['product_price'];
		$pro_cat = $row_pro['product_cat'];
		$pro_brand = $row_pro['product_brand'];
		$product_desc = $row_pro['product_desc'];
		$pro_keywords = $row_pro['product_keywords'];
		
		$get_cat = "select * from categories where cat_id='$pro_cat'";
		$run_cats=mysqli_query($con, $get_cat);
		$row_cats=mysqli_fetch_array($run_cats);
		$cat_title=$row_cats['cat_title'];
		
		$get_brand = "select * from brands where brand_id='$pro_brand'";
		$run_brands=mysqli_query($con, $get_brand);
		$row_brands=mysqli_fetch_array($run_brands);
		$brand_title=$row_brands['brand_title'];
		
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Product</title>
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'textarea' });</script> 

</head>

<body bgcolor="#FF99CC">

	<form action = "" method="post" enctype="multipart/form-data">
    
    <table align="center" width="795" border="2" bgcolor="#187eae">
    
    	<tr align="center">
        	<td colspan="7" style="padding:5px;"><h2>Edit & Update Product</h2></td>
        </tr>
        
        <tr>
        	<td align="right" style="padding:5px;"><b>Product_Title:</b></td>
        	<td style="padding:5px;"><input type = "text" name="product_title" size = "60" value="<?php echo $pro_title; ?>" required="required"/></td>
        </tr>
        
        <tr>
        	<td align="right" style="padding:5px;"><b>Product_Category:</b></td>
        	<td style="padding:5px;">
            <select name="product_cat" />
            	<option required="required"><?php echo $cat_title; ?></option>
            	<?php
                $get_cats = "select * from categories";
	
				$run_cats = mysqli_query($con, $get_cats);
	
				while($row_cats = mysqli_fetch_array($run_cats)){
		
				$cat_id = $row_cats['cat_id'];
				$cat_title = $row_cats['cat_title'];
	
				echo "<option value='$cat_id'>$cat_title</option>";
				}
				?>
            </td>
        </tr>
        
        <tr>
        	<td align="right" style="padding:5px;"><b>Product_Brand:</b></td>
        	<td style="padding:5px;">
            <select name="product_brand" />
            	<option required="required"><?php echo $brand_title; ?></option>
            	<?php
				$get_brands = "SELECT * FROM brands";
	
				$run_brands = mysqli_query($con, $get_brands);
	
				while($row_brands = mysqli_fetch_array($run_brands))
				{
				$brand_id = $row_brands['brand_id'];
				$brand_title = $row_brands['brand_title'];
	
				echo "<option value='$brand_id'>$brand_title</option>";
				}
				?>
            </td>
        </tr>
        
        <tr>
        	<td align="right" style="padding:5px;"><b>Product_Image:</b></td>
        	<td style="padding:5px;"><input type = "file" name="product_image" required="required" /><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60" /></td>
        </tr>
        
		<tr>
        	<td align="right" style="padding:5px;"><b>Product_Quantity:</b></td>
        	<td style="padding:5px;"><input type = "text" name="product_quantity" value="<?php echo $pro_quantity; ?>" required="required" /></td>
        </tr>
		
        <tr>
        	<td align="right" style="padding:5px;"><b>Product_Price:</b></td>
        	<td style="padding:5px;"><input type = "text" name="product_price" value="<?php echo $pro_price; ?>" required="required" /></td>
        </tr>
        
        <tr>
        	<td align="right" style="padding:5px;"><b>Product_Description:</b></td>
        	<td style="padding:5px;"><textarea name="product_desc" cols="20" rows="10" required="required" ><?php echo $product_desc; ?></textarea></td>
        </tr>
        
        <tr>
        	<td align="right" style="padding:5px;"><b>Product_Keywords:</b></td>
        	<td style="padding:5px;"><input type = "text" name="product_keywords" value="<?php echo $pro_keywords; ?>" size = "50" required="required" /></td>
        </tr>
        
        <tr align="center">
        	<td colspan="7" style="padding:5px;"><input type = "submit" name="update_product" value="Update product" /></td>
        </tr>
    
    </table>
    
    </form>

</body>
</html>

<?php



	//getting the text data from fields
	if(isset($_POST['update_product'])){
		
		$update_id = $pro_id;
		
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		$product_brand = $_POST['product_brand'];
		$product_quantity = $_POST['product_quantity'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];
	
	//getting the image from the field
	$product_image = $_FILES['product_image']['name'];
	$product_image_tmp = $_FILES['product_image']['tmp_name'];
	
	move_uploaded_file($product_image_tmp,"product_images/$product_image");
	
	 $update_product = "update products set product_cat='$product_cat',product_brand='$product_brand',product_quantity='$product_quantity',product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords' where product_id = '$update_id'";
	
	$run_update = mysqli_query($con, $update_product);
	
	if($run_update)
	{
		echo "<script>alert('Product has been Updated Successfully!')</script>";
		echo "<script>window.open('index.php?view_products','_self')</script>";
	}
	
	}
?>

<?php } ?>