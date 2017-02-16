<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="styles/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="styles/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<script src="js/jquery.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!--<link rel="stylesheet" href="styles/style.css" media="all" />-->

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
<?php

include("includes/db.php");
			$user = $_SESSION['customer_email'];
			
			$get_customer = "SELECT * FROM customers where customer_email = '$user'";
			$run_customer = mysqli_query($con, $get_customer);
			$row_customer = mysqli_fetch_array($run_customer);
			
			$c_id = $row_customer['customer_id'];
			$cname = $row_customer['customer_name'];
			$cemail = $row_customer['customer_email'];
			$cpass = $row_customer['customer_pass'];
			$ccountry = $row_customer['customer_country'];
			$ccity = $row_customer['customer_city'];
			$ccontact = $row_customer['customer_contact'];
			$caddress = $row_customer['customer_address'];
			$cimage = $row_customer['customer_image'];

?>

	<form role="form" method="post" action="" enctype="multipart/form-data">
    
   	<div class="table-responsive">
	<table class="table table-bordered" >
			<thead>
        	<tr align="center">
            	<td colspan="3" style="padding:5px;"><h2>Update Your Account</h2></td>
            </tr>
            </thead>
			<tbody>
            <tr>
				<div class="form-group">
            	<td style="padding:5px;"><b>Name:</b></td>
                <td style="padding:5px;"><input class="form-control"  type="text" name="c_name" placeholder="Enter Name" value = "<?php echo $cname; ?>" required="required" /></td>
				</div>
			</tr>
            
        	<tr>
            	<td style="padding:5px;"><b>Email:</b></td>
                <td style="padding:5px;"><input class="form-control" type="email" name="c_email" placeholder="Enter Email" value = "<?php echo $cemail; ?>" required="required"/></td>
            </tr>
            
            <tr>
            	<td style="padding:5px;"><b>Password:</b></td>
                <td style="padding:5px;"><input class="form-control" type="password" name="c_pass" placeholder="Enter Password" value = "<?php echo $cpass; ?>" required="required"/></td>
            </tr>
            
            <tr>
            	<td style="padding:5px;"><b>Confirm Password:</b></td>
                <td style="padding:5px;"><input class="form-control" type="password" name="cc_pass" placeholder="Enter Password again" value = "<?php echo $cpass; ?>"required="required"/></td>
            </tr>
            
            <tr>
        	<td style="padding:5px;"><b>Your Image:</b></td>
        	<td ><input type = "file" name="c_image" /><img src="customer_images/<?php echo $c_image;?>" width = "50" height="50"></td>
        	</tr>
            
            <tr>
            	<td style="padding:5px;"><b>Country:</b></td>
              <td >
                <select class="form-control" name="c_country" disabled>
                	<option><?php echo $ccountry; ?></option>
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
            	<td style="padding:5px;"><b>City:</b></td>
                <td style="padding:5px;"><input class="form-control" type="text" name="c_city" placeholder="Enter City"  value = "<?php echo $ccity; ?>" /></td>
            </tr>
            
            <tr>
            	<td style="padding:5px;"><b>contact:</b></td>
                <td style="padding:5px;"><input class="form-control" type="text" name="c_contact" placeholder="Enter Contact Details" value = "<?php echo $ccontact; ?>"/></td>
            </tr>
            
            <tr>
            	<td style="padding:5px;"><b>Address:</b></td>
                <td style="padding:5px;"><input class="form-control" type="text" name="c_address"  value = "<?php echo $caddress; ?>" placeholder="Enter Your Address" ></input></td>
            </tr>
            
            
            
        <tr align="center">
            	<td colspan="3" style="padding:5px;"><input class="btn btn-default" type="submit" name="update" value = "Update Account" /></td>
        </tr>
        </tbody>    
      </table>
        
    </form>
	</div>
</body>
</html>

<?php

	if(isset($_POST['update']))
	{
		$ip = getIp();
		
		$customer_id = $c_id;
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$confirm_pass = $_POST['cc_pass'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
		
	
	move_uploaded_file($c_image_tmp,"customer_images/$c_image");
	
	$update_c = "update customers set customer_name='$c_name',customer_email='$c_email',customer_pass='$c_pass',customer_country='$c_country',customer_city='$c_city',customer_address='$c_address',customer_contact='$c_contact',customer_image='$c_image' where customer_id = '$customer_id'";
	
	
	$run_update = mysqli_query($con, $update_c);
	if($run_update)
				{
					//header('Location:customer_login.php','_self');
					echo "<script>alert('congratulations! Your account has been Updated Succesfully!')</script>";
					echo "<script>window.open('my_account.php','_self')</script>";
				}
				else{
					echo 'Sorry WE Unable to Register @ this Time';
				}
	
	}
	
	/*if($c_pass!=$confirm_pass)
			{
				echo 'Password do not Match';
			}
	else
			{
				//Here we are starting registeration process
			$query = "SELECT customer_email FROM customers WHERE customer_email = '$c_email'";
			$query_run = mysql_query($query);
			
			if(mysql_num_rows($query_run)==1)
			{
				echo 'The Email '.$c_email. ' already exists Please try some other!.'; 
			}
			else
			{
				$insert_c = "insert into customers VALUES('','".mysql_real_escape_string($ip)."','".mysql_real_escape_string($c_name)."','".mysql_real_escape_string($c_email)."','".mysql_real_escape_string($c_pass)."','".mysql_real_escape_string($c_country)."','".mysql_real_escape_string($c_city)."','".mysql_real_escape_string($c_address)."','".mysql_real_escape_string($c_contact)."','".mysql_real_escape_string($c_image)."')";
			
			if($query_run = mysql_query($insert_c))
				{
					echo "<script>alert('congratulations! Your account has been created Succesfully!')</script>";
					echo "<script>window.open('customer_login.php','_self')</script>";
					//header('Location:customer_login.php','_self');
				}
				else{
					echo 'Sorry WE Unable to Register @ this Time';
				}
			}
			}
			
		}
		else
		{
			echo 'Plaese Fill All Fields!';
		}*/
	/*$insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_address,customer_contact,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_address','$c_contact','$c_image') ";
	
	$run_c = mysqli_query($con, $insert_c);
	
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
	
