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
	}
?>
	
	<div class="modal fade" id="popUpWindow1">
		<div class="modal-dialog">
			<div class="modal-content">
							
		<!-- header -->
	
	<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h3 class="modal-title">Sign Up</h3>
		</div>
							
		<!-- body(form) -->
		
		<div class="modal-body">
			<form role="form" method="post" action="customer_registration.php">
				<div class="form-group">
				<input type="text" class="form-control" name="c_name" placeholder="Enter Name" value = "<?php if(isset($c_name)){ echo $c_name;} ?>" />
				</div>
				<div class="form-group">
				<input type="email" class="form-control" name="c_email" placeholder="Enter Email" value = "<?php if(isset($c_email)){ echo $c_email;} ?>"/>
				</div>
				<div class="form-group">
				<input type="password" class="form-control" name="c_pass" placeholder="Enter Password" />
				</div>
				<div class="form-group">
				<input type="password" class="form-control" name="cc_pass" placeholder="Enter Password again" />
				</div>
				<div class="form-group">
				<input type = "file" class="form-control" name="c_image"  value = "<?php if(isset($c_image)){ echo $c_image;} ?>" />
				</div>
				<div class="form-group">
				<table>
				<tr>
            	<td align="right" style="padding:5px;"><b>Country:</b></td>
				<td align="left">
                <select name="c_country" class="form-control" value = "<?php if(isset($c_country)){ echo $c_country;} ?>" >
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
				</table>
				</div>
				<div class="form-group">
				<input type="text" class="form-control" name="c_city" placeholder="Enter City" value = "<?php if(isset($c_city)){ echo $c_city;} ?>" />
				</div>
				<div class="form-group">
				<input type="text" class="form-control" name="c_contact" placeholder="Enter Contact Details" value = "<?php if(isset($c_contact)){ echo $c_contact;} ?>" />
				</div>
				<div class="form-group">
				<textarea cols = "50" rows = "4" name="c_address" placeholder="Enter Your Address" value = "<?php if(isset($c_address)){ echo $c_address;} ?>" ></textarea>
				</div>
				
				<!-- button -->
							
			<div class="modal-footer">
				<input type="submit" name="signup" class="btn btn-primary btn-block"  value = "Sign Up" ></input>
			</div>			
				</form>				
			</div>				
		</div>
	</div>
</div>
	
	 </div>
	
	

<?php
	
}
else if(loggedin())
{
	echo "<script>alert('You are already registerd and logged in.')</script>";
}
?>