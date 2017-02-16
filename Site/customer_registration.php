<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include("includes/db.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!--stylesheets-->

<link rel="stylesheet" href="styles/newstyle.css" media="all" />

<link rel="stylesheet" href="styles/sidebar.css" media="all">

<link rel="stylesheet" href="styles/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<link rel="stylesheet" href="styles/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!--End Of CSS stylesheets-->

<!--Javascript-->
<script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="js/jquery.js"></script>

<!--Javascript-->

<title>SignUp Now</title>

<!--<link rel="stylesheet" href="styles/style.css" media="all" />-->

</head>

<body>
<?php 
	include("includes/header.inc.php");
	
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
				$insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_address,customer_contact,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_address','$c_contact','$c_image') ";
				
				
				/*$insert_c = "insert into customers VALUES('".mysql_real_escape_string($ip)."','".mysql_real_escape_string($c_name)."','".mysql_real_escape_string($c_email)."','".mysql_real_escape_string($c_pass)."','".mysql_real_escape_string($c_country)."','".mysql_real_escape_string($c_city)."','".mysql_real_escape_string($c_address)."','".mysql_real_escape_string($c_contact)."','".mysql_real_escape_string($c_image)."')";*/
			
			if($query_run = mysqli_query($con, $insert_c))
				{
					echo "<script>alert('Congratulation Your Account has been created Successfully! A verfication link has been sended to your Email Please verify.')</script>";
                    echo "<script>window.open('customer_login.php','_self')</script>";
					//header('Location:customer_login.php','_self');
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

	/*$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: <mohammaddfuzail@gmail.com>' . "\r\n";
	
	$subject ="Congrats! Verify your account.";
	
	$message ="<html>
	<p>
	
	Hello dear <b style='color:blue;'>$c_name</b> your account has been created successfully! Please verify your account by clicking on to the link given below. Thank You!</p>
	
	<h3>Please verify your account by clicking the below link.</h3>
	
        <h2> <a href='http://www.theleathercity.site88.net/mysitee/customer_login.php'>Click here to verify and</a> login to your account.</h2>
	
        <h3> Thank you for connecting with us @ - www.theleathercity.site88.net</h3>
	
	</html>
	
	";
	
	mail($c_email,$subject,$message,$headers);*/
        //mail($customer_email,$subject,$message,$from);

	
?>
       
         

    
<div id="wrapper">
    <!--Sidebar-->
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<?php getCats(); ?>
		</ul>
	</div>

	<!--Page Content-->
	<div id="page-content-wrapper">
		<div class="container">
			<div class="row">
	<form method="post" action="customer_registration.php" enctype="multipart/form-data">
    
   	  <table width="700" align="center" >
        	<tr align="center">
            	<th colspan="3" ><h2 style="padding:5px; color:#6B78B4; font-family:'Titillium Web', sans-serif;position:relative;font-size:30px;" >Create a Free And Secure Purchasing Account</h2></th>
            </tr>
            
            <tr>
            	<td align="left" style="padding:5px;"><b>Name:</b></td>
                <td align="left" style="padding:5px;"><input type="text" name="c_name" placeholder="Enter Name" value = "<?php if(isset($c_name)){ echo $c_name;} ?>" /></td>
            </tr>
            
        	<tr>
            	<td align="left" style="padding:5px;"><b>Email:</b></td>
                <td align="left" style="padding:5px;"><input type="email" name="c_email" placeholder="Enter Email" value = "<?php if(isset($c_email)){ echo $c_email;} ?>"/></td>
            </tr>
            
            <tr>
            	<td align="left" style="padding:5px;"><b>Password:</b></td>
                <td align="left" style="padding:5px;"><input type="password" name="c_pass" placeholder="Enter Password" /></td>
            </tr>
            
            <tr>
            	<td align="left" style="padding:5px;"><b>Confirm Password:</b></td>
                <td align="left" style="padding:5px;"><input type="password" name="cc_pass" placeholder="Enter Password again" /></td>
            </tr>
            
            <tr>
        	<td align="left" style="padding:5px;"><b>Your Image:</b></td>
        	<td align="left"><input type = "file" name="c_image"  value = "<?php if(isset($c_image)){ echo $c_image;} ?>" /></td>
        	</tr>
            
            <tr>
            	<td align="left" style="padding:5px;"><b>Country:</b></td>
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
            	<td align="left" style="padding:5px;"><b>City:</b></td>
                <td align="left" style="padding:5px;"><input type="text" name="c_city" placeholder="Enter City" value = "<?php if(isset($c_city)){ echo $c_city;} ?>" /></td>
            </tr>
            
            <tr>
            	<td align="left" style="padding:5px;"><b>contact:</b></td>
                <td align="left" style="padding:5px;"><input type="text" name="c_contact" placeholder="Enter Contact Details" value = "<?php if(isset($c_contact)){ echo $c_contact;} ?>" /></td>
            </tr>
            
            <tr>
            	<td align="left" style="padding:5px;"><b>Address:</b></td>
                <td align="left" style="padding:5px;"><textarea cols = "22" rows = "6" name="c_address" placeholder="Enter Your Address" value = "<?php if(isset($c_address)){ echo $c_address;} ?>" ></textarea></td>
            </tr>
            
            
            
        <tr align="center">
            	<td colspan="6" style="padding:5px; padding-left:85px;"><input type="submit" name="signup" value = "SignUp" /></td>
        </tr>
            
      </table>
        
    </form>
			</div>
		</div>
	</div>
</div>   
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php 
	include("includes/footer.inc.php");
?>
        
</body>
</html>
	
<?php
	
}
else if(loggedin())
{
	echo "<script>alert('You are already registerd and logged in.')</script>";
}


?>