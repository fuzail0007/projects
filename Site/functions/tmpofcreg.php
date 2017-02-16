<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include("functions/functions.php");
include("includes/db.php");

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Online Shop</title>

<link rel="stylesheet" href="styles/style.css" media="all" />

</head>

<body>

	<!--Main Container Starts here-->
    <div class="main_wrapper">
    
    	<!--Hearder starts here-->
        <div class = "header_wrapper">
       	<a href = "index.php"><img id = "logo" src = "images/logo1.png" /></a>
        <img id = "banner" src = "images/adb5.png" />
        </div>
		
		<!--Tri Web Categories Menu Start-->
       <div class = "topmenubar">
        	<ul id = "topmenu">
            	<li><a href = "index.php">Finshed Products</a></li>
                <li><a href = "index2.php">Raw Products</a></li>
                 <li><a href = "index3.php">Component Products</a></li>
            </ul>
        </div>
        
        <!--Tri Web Categories Ends-->
		
        <!--Navigation Bar Starts here-->
        <div class = "menubar">
        
        	<ul id = "menu">
            	<li><a href = "index.php">Home</a></li>
                <li><a href = "all_products.php">All Products</a></li>
                 <?php
            
				if(!isset($_SESSION['customer_email']))
				{
				echo"";
				}
				else
				{
				echo "<li><a href = 'customer/my_account.php'>My Account</a></li>";
				echo "<li><a href = 'cart.php'>Shopping cart</a></li>";
				}
			
				?>
                <li><a href = "customer_registration.php">Register</a></li>
                
                <li><a href = "#">Contact Us</a></li>
                
            </ul>
            
            <div id = "form">
            	<form method = "get" action = "results.php" enctype="multipart/form-data">
                	<input type="text" name="user_query" placeholder="Search a Product" />
                	<input type = "submit" name = "search" value = "Search" />
                </form>
            </div>
            
</div>
         <!--Navigation Bar Ends here-->
        
        <!--Header Ends Here -->
        
        
        
         
         <!--Content wrapper starts-->
         <div class = "content_wrapper">
         
         	<div id = "sidebar">
            
            <div id = "sidebar_title">Categories</div>
            
            <ul id = "cats">
            
            <?php getCats(); ?>
            
            <ul>
            
            <div id = "sidebar_title">Brands</div>
            
            <ul id = "cats">
            
            <?php getBrands(); ?>
            	
            </ul>
            
            
         </div>
         
         <div id = "content_area">
         
         <?php cart(); ?>
         
         <div id = "shopping_cart">
         
         	<span style = "float:right; font-size:16px; padding:5px; line-height:40px;">
            
            <?php
            if(isset($_SESSION['customer_email']))
			{
				echo"<b>Welcome : </b>" . $_SESSION['customer_email'] . "<b style='color:yellow;'>Your</b>";
			?>
				 <b style="color:#99C">shopping cart -</b> Total Items: <?php total_items();?> Total Price: <?php total_price(); ?><a href="cart.php" style="color:#99C; text-decoration:none;">Go to Cart</a>
                 
            <?php
			}
			else
			{
				echo "<b>Welcome guest</b>";
			}
			
			?>
            
           
            
            <?php
            
			if(!isset($_SESSION['customer_email']))
			{
				echo"<a href = 'customer_login.php' style ='color:orange;'>Login</a>";
			}
			else
			{
				echo "<a href='logout.php' style='color:orange;'>Logout</a>";
			}
			
			?>
            
            </span>
            
         </div>
        
          <?php /*echo $ip=getIp();*/ ?>
        
         <div id = "products_box">
         
         
<?php
if(!loggedin())
{
if(isset($_POST['c_name'])&&
isset($_POST['c_email'])&&
isset($_POST['c_pass'])&&
isset($_POST['cc_pass'])&&
isset($_FILES['c_image']['name'])&&
isset($_POST['c_country'])&&
isset($_POST['c_city'])&&
isset($_POST['c_contact'])&&
isset($_POST['c_address']))
	{
	
		$ip = getIp();
		
		$c_name = mysql_real_escape_string($_POST['c_name']);
		$c_email = mysql_real_escape_string($_POST['c_email']);
		$c_pass = mysql_real_escape_string($_POST['c_pass']);
		$cc_pass = mysql_real_escape_string($_POST['cc_pass']);
		
		$c_country = mysql_real_escape_string($_POST['c_country']);
		$c_city = mysql_real_escape_string($_POST['c_city']);
		$c_contact = mysql_real_escape_string($_POST['c_contact']);
		$c_address = mysql_real_escape_string($_POST['c_address']);
		
	$c_image = $_FILES['c_image']['name'];
	$c_image_tmp = $_FILES['c_image']['tmp_name'];
	move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
	
	$c_email_code = md5($_POST['customer_name'] + microtime());
	
	if(!empty($c_name)&&!empty($c_email)&&!empty($c_pass)&&!empty($cc_pass)&&!empty($c_country)&&!empty($c_city)&&!empty($c_contact)&&!empty($c_address))
		{
			
	if($c_pass!=$cc_pass)
			{
				echo 'Password do not Match';
			}
	else
			{
				//Here we are starting registeration process
				
			$get_email = "SELECT * FROM customers WHERE customer_email = '$c_email'";
			$run_email = mysqli_query($con, $get_email);
			$check = mysqli_num_rows($run_email);
			
			if($check == 1)
			{
				echo "<script>alert('This email address is already in use!')</script>";
				
			}
				
			/*$query = "SELECT * FROM customers WHERE customer_email = '$c_email'";
			$query_run = mysql_query($query);
			
			if(mysql_num_rows($query_run)==1)
			{
				echo 'The Email '.$c_email. ' already exists Please try some other!.'; 
			}*/
			else
			{
				$insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_address,customer_contact,customer_image,email_code) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_address','$c_contact','$c_image','$c_email_code') ";
				
				email($c_email['customer_email'], 'Activate your account', "Hello " . $c_name['customer_name'] . ",\n\n You need to activate your account, so use the link below:\n\n http://localhost/ecomweb/activate.php?customer_email=" . $c_email['customer_email'] . "&email_code=" . $c_email_code['email_code'] . "\n\n - theleathercity.site88.net/ecomweb");
				
				/*$insert_c = "insert into customers VALUES('".mysql_real_escape_string($ip)."','".mysql_real_escape_string($c_name)."','".mysql_real_escape_string($c_email)."','".mysql_real_escape_string($c_pass)."','".mysql_real_escape_string($c_country)."','".mysql_real_escape_string($c_city)."','".mysql_real_escape_string($c_address)."','".mysql_real_escape_string($c_contact)."','".mysql_real_escape_string($c_image)."')";*/
			
			if($query_run = mysqli_query($con, $insert_c))
				{
					echo "<script>alert('Congratulation Your Account has been created Successfully!')</script>";
					header('Location:customer_login.php','_self');
				}
				else{
					echo "<script>alert('Sorry WE Unable to Register @ this Time.')</script>";
				}
			}
			}
			
		}
		else
		{
			echo "<script>alert('Plaese Fill All Fields!')</script>";
			
		}
	/*$insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_address,customer_contact,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_address','$c_contact','$c_image') ";*/
	
	/*$run_c = mysqli_query($con, $insert_c);
	
	$sel_cart = "select * from cart where ip_add = '$ip'";
	
	$run_cart = mysqli_query($con, $sel_cart);
	
	$check_cart = mysqli_query($run_cart);

	if($check_cart==0)
	{
		$_SESSION['customer_email']=$c_email;
		
		echo "<script>alert('congratulations! Your account has been created Succesfully!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
	
	}
	else
	{
		$_SESSION['customer_email']=$c_email;
		
		echo "<script>alert('congratulations! Your account has been created Succesfully!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}*/
	}
?>
    
    
	<form method="post" action="customer_registration.php" enctype="multipart/form-data">
    
   	  <table width="700" align="center" >
        
        	<tr align="center">
            	<td colspan="3" style="padding:5px;"><h2>Create An Account</h2></td>
            </tr>
            
            <tr>
            	<td align="right" style="padding:5px;"><b>Name:</b></td>
                <td align="left" style="padding:5px;"><input type="text" name="c_name" placeholder="Enter Name" value = "<?php if(isset($c_name)){ echo $c_name;} ?>" /></td>
            </tr>
            
        	<tr>
            	<td align="right" style="padding:5px;"><b>Email:</b></td>
                <td align="left" style="padding:5px;"><input type="email" name="c_email" placeholder="Enter Email" value = "<?php if(isset($c_email)){ echo $c_email;} ?>"/></td>
            </tr>
            
            <tr>
            	<td align="right" style="padding:5px;"><b>Password:</b></td>
                <td align="left" style="padding:5px;"><input type="password" name="c_pass" placeholder="Enter Password" /></td>
            </tr>
            
            <tr>
            	<td align="right" style="padding:5px;"><b>Confirm Password:</b></td>
                <td align="left" style="padding:5px;"><input type="password" name="cc_pass" placeholder="Enter Password again" /></td>
            </tr>
            
            <tr>
        	<td align="right" style="padding:5px;"><b>Your Image:</b></td>
        	<td align="left"><input type = "file" name="c_image"  value = "<?php if(isset($c_image)){ echo $c_image;} ?>" /></td>
        	</tr>
            
            <tr>
            	<td align="right" style="padding:5px;"><b>Country:</b></td>
              <td align="left">
                <select name="c_country" value = "<?php if(isset($c_country)){ echo $c_country;} ?>" >
                	<option>Select a Country</option>
                    <option>India</option>
                    <option>United Arab Emirates</option>
                    <option>United states</option>
                    <option>Pakistan</option>
                    <option>Afghanistan</option>
                    <option>Japan</option>
                    <option>china</option>
                    <option>United Kingdom</option>
                </select>
                
              </td>
            </tr>
            
            <tr>
            	<td align="right" style="padding:5px;"><b>City:</b></td>
                <td align="left" style="padding:5px;"><input type="text" name="c_city" placeholder="Enter City" value = "<?php if(isset($c_city)){ echo $c_city;} ?>" /></td>
            </tr>
            
            <tr>
            	<td align="right" style="padding:5px;"><b>contact:</b></td>
                <td align="left" style="padding:5px;"><input type="text" name="c_contact" placeholder="Enter Contact Details" value = "<?php if(isset($c_contact)){ echo $c_contact;} ?>" /></td>
            </tr>
            
            <tr>
            	<td align="right" style="padding:5px;"><b>Address:</b></td>
                <td align="left" style="padding:5px;"><textarea cols = "18" rows = "6" name="c_address" placeholder="Enter Your Address" value = "<?php if(isset($c_address)){ echo $c_address;} ?>" ></textarea></td>
            </tr>
            
            
            
        <tr align="center">
            	<td colspan="3" style="padding:5px;"><input type="submit" name="signup" value = "Create Account" /></td>
        </tr>
            
      </table>
        
    </form>
	 </div>
       </div> 
        <!-- --> 
         <div id="footer">
         	<h2 style = "text-align:center; padding-top:30px;">&copy; 2016 by <a href="https://www.hackranet.wordpress.com">www.hackranet.wordpress.com</a></h2>
         </div>
<!--Main Contianer Ends here !!!-->
</body>
</html>
	
	<?php
	
}
else if(loggedin())
{
	echo "<script>alert('You are already registerd and logged in.')</script>";
}


?>

function email($to, $subject, $body)
{
	mail($to, $subject, $body, 'From: mohammaddfuzail@gmail.com');
}