<?php
include("includes/db.php");
	if(isset($_POST['insert_post'])){
	/*if(isset($_POST['product_title'])&&
	    isset($_POST['product_cat'])&&
		isset($_POST['product_brand'])&&
		isset($_POST['product_quantity'])&&
		isset($_FILES['product_price'])&&
		isset($_POST['product_desc'])&&
		isset($_POST['product_keywords']))
		{*/
		//getting the text data from fields
		$product_title = mysql_real_escape_string($_POST['product_title']);
		$product_cat = mysql_real_escape_string($_POST['product_cat']);
		$product_brand = mysql_real_escape_string($_POST['product_brand']);
		$product_quantity = mysql_real_escape_string($_POST['product_quantity']);
		$product_price = mysql_real_escape_string($_POST['product_price']);
		$product_desc = mysql_real_escape_string($_POST['product_desc']);
		$product_keywords = mysql_real_escape_string($_POST['product_keywords']);
	
	//getting the image from the field
	$product_image = $_FILES['product_image']['name'];
	$product_image_tmp = $_FILES['product_image']['tmp_name'];
	
	move_uploaded_file($product_image_tmp,"product_images/$product_image");
	
	//$insert_product = mysql_query("insert into products (product_cat,product_brand,product_title,product_quantity,product_price,product_desc,product_image,product_keywords) values ('$product_cat','$product_brand','$product_title','$product_quantity','$product_price','$product_desc','$product_image','$product_keywords')") or die(mysql_error());
	
	$insert_pros = mysql_query("SELECT product_id FROM products WHERE product_title = '$product_title' LIMIT 1");
	$productMatch = mysql_num_rows($insert_pros);
	if($productMatch > 0){
		echo 'Sorry you tried to place a duplicate "Product Name" into the system, <a href="insert_product.php">Click_here</a>';
		exit();
	}
	
	
	$insert_pros = "insert into products (product_cat,product_brand,product_title,product_quantity,product_price,product_desc,product_image,product_keywords) values ('$product_cat','$product_brand','$product_title','$product_quantity','$product_price','$product_desc','$product_image','$product_keywords') ";
				
				
				/*$insert_c = "insert into customers VALUES('".mysql_real_escape_string($ip)."','".mysql_real_escape_string($c_name)."','".mysql_real_escape_string($c_email)."','".mysql_real_escape_string($c_pass)."','".mysql_real_escape_string($c_country)."','".mysql_real_escape_string($c_city)."','".mysql_real_escape_string($c_address)."','".mysql_real_escape_string($c_contact)."','".mysql_real_escape_string($c_image)."')";*/
			
			if($query_run = mysqli_query($con, $insert_pros))
				{
					echo "<script>alert('A product has been inserted Successfully!')</script>";
					echo "<script>window.open('index.php?insert_product','_self')</script>";
				}
	
	//$insert_pro = mysqli_query($con, $insert_product);
	
	//if($query_run = mysql_query($con, $insert_product))
	
	//if($insert_pro)
	//{
		//echo "<script>alert('Product has been inserted!')</script>";
		//echo "<script>window.open('index.php?insert_product','_self')</script>";
	//}
	
	}

?>
	
	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inserting Product</title>
	<!--<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'textarea' });</script> -->

</head>

<body bgcolor="#FF99CC">

	<form action="insert_product.php" method="POST" enctype="multipart/form-data">
    
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
            	<option required="required">Select a Brand</option>
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
        	<td align="right" style="padding:5px;"><b>Product_Quantity:</b></td>
        	<td style="padding:5px;"><input type = "text" name="product_quantity" required="required" /></td>
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