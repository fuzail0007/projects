<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<title>Product Complete Details</title>

<link rel="stylesheet" href="styles/newstyle.css" media="all" />

<link rel="stylesheet" href="styles/sidebar.css" media="all">
<!--<link rel="stylesheet" href="styles/cmntrating.css" media="all">-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="styles/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<link rel="stylesheet" href="styles/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="js/jquery.js"></script>
<!--<script src="js/cmntrating.js"></script>-->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
<link href="path/to/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
 <!-- optionally if you need to use a theme, then include the theme file as mentioned below -->
<link href="path/to/css/theme-krajee-svg.css" media="all" rel="stylesheet" type="text/css" />
 
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>

<script src="path/to/js/star-rating.js" type="text/javascript"></script>
 <!-- optionally if you need translation for your language then include locale file as mentioned below -->
<script src="path/to/js/star-rating_locale_{lang}.js"></script>

<input id='input-id' type='number' class='rating' min=1 max=10 step=2 data-size='lg' data-rtl='true'>

</head>

<body>
<?php
include("includes/header.inc.php");
?>	
    <div id="wrapper">
		<!--Sidebar-->
	<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<?php getCats(); ?>
			</ul>
	</div>
	</div> 
         
<?php
include("includes/db.php");
	if(isset($_GET['pro_id']))
	{
		$product_id = $_GET['pro_id'];
		
        $get_pro = "SELECT * FROM products WHERE product_id='$product_id'";
	
		$run_pro = mysqli_query($con, $get_pro);
	
		while($row_pro = mysqli_fetch_array($run_pro))
		{
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		$pro_brand = $row_pro['product_brand'];
		$pro_quantity = $row_pro['product_quantity'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
		$pro_desc = $row_pro['product_desc'];
		
		$cats_name = $pro_cat;
		
		$get_cats_name = "SELECT cat_title FROM categories WHERE cat_id='$cats_name'";
		
		$run_cats_name =  mysqli_query($con, $get_cats_name);
		
		while($row_cats = mysqli_fetch_array($run_cats_name))
		{
			$cat_name = $row_cats['cat_title'];
		}
		
		$brands_name = $pro_brand;
		
		$get_brands_name = "SELECT brand_title FROM brands WHERE brand_id='$brands_name'";
		
		$run_brands_name =  mysqli_query($con, $get_brands_name);
		
		while($row_brands = mysqli_fetch_array($run_brands_name))
		{
			$brand_name = $row_brands['brand_title'];
		}
		
		echo "
				<div class='container'>
				<h3>$pro_title</h3>
				
				<img class='img-thumbnail' src = 'admin_area/product_images/$pro_image' width='400' height='300' /><br/>
				<a style='text-decoration:none; margin-left:130px;' href='admin_area/product_images/$pro_image'>View Full Size Image</a>
				
				<br><br>
				<a class='btn btn-success btn-xm' style='text-decoration:none;' href='index.php'>Go Back</a>
				
				
				<a href='index.php?add_cart=$pro_id'><button class='btn btn-primary btn-xm' style = 'margin-left:220px;'>Add to Cart</button></a>
				<br><br>
				<p style=' text-align:left'><i class='fa fa-inr' style='font-size:16px'></i> : <b> $pro_price </b></p>
				<br>
				";
				
	/*if (isset($_POST['add_cart']))
				
				/*(isset($_POST['L_coats'])OR
					isset($_POST['G_coats'])OR
					isset($_POST['L_shoes'])OR
					isset($_POST['G_shoes']))
	{
		$l_coat = mysql_real_escape_string($_POST['L_coats']);
		$g_coat = mysql_real_escape_string($_POST['G_coats']);
		$l_shoe = mysql_real_escape_string($_POST['L_shoes']);
		$g_shoe = mysql_real_escape_string($_POST['G_shoes']);
					
			$user = $_SESSION['customer_email'];
			
		$get_mail = "SELECT * FROM customers where customer_email = '$user'";
		$run_mail = mysqli_query($con, $get_mail);
		$row_mail = mysqli_fetch_array($run_mail);
		$c_email = $row_mail['customer_email'];
		
		$pro_id = $_GET['add_cart'];
		
		$check_pro = "SELECT * FROM cart WHERE customer_email = '$c_email' AND p_id = '$pro_id'";
		
		$run_check = mysqli_query($con, $check_pro);
		
		if(mysqli_num_rows($run_mail&&$run_check)>0)
		//if(mysqli_num_rows($run_mail&&$run_check))
		{
			echo "";
			
		}
		else
		{
			$insert_pro = "INSERT INTO cart (p_id,customer_email,L_coats,G_coats,L_shoes,G_shoes) values ('$pro_id','$c_email','$l_coat','$g_coat','$l_shoe','g_shoe')";
			
			$run_pro = mysqli_query($con, $insert_pro);
			
			echo "<script>window.open('index.php','_self')</script>";
		}
				}*/
				
				if($cat_name == 'Ladies Coats')
				{
				echo"
		<tr>
			<td align='right' style='padding:5px;'><b>Size :</b></td>
			<td align='right'>
			<select name='L_coats' value = '<?php if(isset($cat_name)){ echo $cat_name;} ?>' >
                <option>Select Size</option>
    			<option>Small</option>
                <option>Medium</option>
                <option>Large</option>
                <option>x-Large</option>
                <option>XX-Large</option>
            </select><br>
            </td>
        </tr>
		
					";
				}
				
				if($cat_name == 'Gents Coats')
				{
				echo"
		<tr>
			<td align='right' style='padding:5px;'><b>Size :</b></td>
			<td align='right'>
			<select name='Gents Coats' value = '<?php if(isset($cat_name)){ echo $cat_name;} ?>' >
                <option>Select Size</option>
    			<option>Small</option>
                <option>Medium</option>
                <option>Large</option>
                <option>x-Large</option>
                <option>XX-Large</option>
            </select><br>
            </td>
        </tr>
		
					";
				}
				
				if($cat_name == 'Gents Shoes')
				{
				echo"
		<tr>
			<td align='right' style='padding:5px;'><b>Size :</b></td>
			<td align='right'>
			<select name='Gents Shoes' value = '<?php if(isset($cat_name)){ echo $cat_name;} ?>' >
                <option>Select Size</option>
    			<option>5</option>
                <option>6</option>
				<option>8</option>
                <option>9</option>
                <option>10</option>
            </select><br>
            </td>
        </tr>
		
					";
				}
				
				if($cat_name == 'Ladies Shoes')
				{
				echo"
		<tr>
			<td align='right' style='padding:5px;'><b>Size :</b></td>
			<td align='right'>
			<select name='Ladies Shoes' value = '<?php if(isset($cat_name)){ echo $cat_name;} ?>' >
                <option>Select Size</option>
    			<option>5</option>
                <option>6</option>
				<option>7</option>
                <option>9</option>
                <option>11</option>
            </select><br>
            </td>
        </tr>
		
					";
				}
		
		
				echo"<p style=' text-align:left'> Category: $cat_name </p>
				<br>
				<p style=' text-align:left'> Brand: $brand_name </p>
				<br>
				<p style=' text-align:left'> Only $pro_quantity Products left.</p>
				<br>
				<p style=' text-align:left'> Description: $pro_desc </p>
				<br>
				<br><br>
				
				</div>
				
				
			
		";
	
		if(isset($_SESSION['customer_email']))
		{
		echo"
				<form style = 'margin-left:100px;'action='' method='POST'>
				<table>
				<tr><td style='text-align:left'>Comment :</td></tr>
				<tr><td><textarea rows='3' cols='55' name='comment'></textarea></td></tr>
				<tr><td style='text-align:right'><input type='submit' name='submit_comment' value='comment'></td></tr>
				</table>
				</form>
				
				<br><br>
				
				
			";
			
			include("includes/db.php");
			$select_cmnt = "SELECT * FROM product_reviews WHERE product_id ='$pro_id'";
			$run_cmnt = mysqli_query($con, $select_cmnt);
			$i = 0;
			while($row_comment=mysqli_fetch_array($run_cmnt))
			{
				$cmnt = $row_comment['comment'];
				$usr = $row_comment['customer_email'];
				$i++;
				
			echo"
					<h5 style='margin-left:100px;'>$usr</h5><br>
					<p style='margin-left:100px;'>$cmnt</p><br><br>
					";
					
			}
		}
		else
		{
			echo "";
		}
	}
		}
		
		if(isset($_POST['comment'])&&isset($_POST['submit_comment']))
		{
			$cmnt = mysql_real_escape_string($_POST['comment']);
			
			$user = $_SESSION['customer_email'];
			
			$get_mail = "SELECT * FROM customers where customer_email = '$user'";
			$run_mail = mysqli_query($con, $get_mail);
			$row_mail = mysqli_fetch_array($run_mail);
			$c_email = $row_mail['customer_email'];
			
			$insert_cmnt = "INSERT INTO product_reviews (product_id, customer_email, comment) VALUES ('$pro_id','$user','$cmnt')";
			//$cmnt = NULL;
			$query_run = mysqli_query($con, $insert_cmnt);
		}	
			
    ?>
	
</table>
	
</body>
</html>