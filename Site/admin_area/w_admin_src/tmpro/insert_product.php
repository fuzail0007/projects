<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inserting Product</title>
	<!--<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'textarea' });</script> -->

</head>

<body bgcolor="#FF99CC">

	<form action = "insert_product.php" method="post" enctype="multipart/form-data">
    
    <table align="center" width="795" border="2" bgcolor="#187eae">
    
    	<tr align="center">
        	<td colspan="7" style="padding:5px;"><h2>Insert New Post Here!</h2></td>
        </tr>
        
        <tr>
        	<td align="right" style="padding:5px;"><b>Product_Title:</b></td>
        	<td style="padding:5px;"><input type = "text" name="product_title" size = "60" required="required"/></td>
        </tr>
        
        <tr>
        	<td align="right" style="padding:5px;"><b>Product_Category:</b></td>
        	<td style="padding:5px;">
            <select name="product_cat" />
            	<option required="required">Select a Category</option>
            	<?php
				include("../includes/db.php");
                $get_cats = "select * from wcategories";
	
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
        	<td align="right" style="padding:5px;"><b>Product_Image:</b></td>
        	<td style="padding:5px;"><input type = "file" name="product_image" required="required" /></td>
        </tr>
        
        <tr>
        	<td align="right" style="padding:5px;"><b>Product_Price:</b></td>
        	<td style="padding:5px;"><input type = "text" name="product_price" required="required" /></td>
        </tr>
        
        <tr>
        	<td align="right" style="padding:5px;"><b>Product_Description:</b></td>
        	<td style="padding:5px;"><textarea name="product_desc" cols="20" rows="10" required="required" ></textarea></td>
        </tr>
        
        <tr>
        	<td align="right" style="padding:5px;"><b>Product_Keywords:</b></td>
        	<td style="padding:5px;"><input type = "text" name="product_keywords" size = "50" required="required" /></td>
        </tr>
        
        <tr align="center">
        	<td colspan="7" style="padding:5px;"><input type = "submit" name="insert_post" value="Insert Product Now" /></td>
        </tr>
    
    </table>
    
    </form>

</body>
</html>

<?php
	include("../includes/db.php");
	//getting the text data from fields
	if(isset($_POST['insert_post'])){
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		//$product_brand = $_POST['product_brand'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];
	
	//getting the image from the field
	$product_image = $_FILES['product_image']['name'];
	$product_image_tmp = $_FILES['product_image']['tmp_name'];
	
	move_uploaded_file($product_image_tmp,"w_product_images/$product_image");
	
	 $insert_product = "insert into wproducts(product_cat,product_title,product_price,product_desc,product_image,product_keywords) values('$product_cat','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
	
	$insert_pro = mysqli_query($con, $insert_product);
	
	if($insert_pro)
	{
		echo "<script>alert('Product has been inserted!')</script>";
		echo "<script>window.open('index2.php?insert_product','_self')</script>";
	}
	
	}
?>