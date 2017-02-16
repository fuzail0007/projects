<?php
$con = mysqli_connect("localhost","root","","ecommerce");


if(!isset($_SESSION['customer_email']))
			{
				echo"";
			}
			else
			{
				$user = $_SESSION['customer_email'];
			
			$get_mail = "SELECT * FROM customers where customer_email = '$user'";
			$run_mail = mysqli_query($con, $get_mail);
			$row_mail = mysqli_fetch_array($run_mail);
			$c_email = $row_mail['customer_email'];
			}
			
?>
<?php

/*function get_review()
{
	//$query = "SELECT 'Sender', 'Message' FROM 'chat' . 'chat'";
	$query = "SELECT u_email,feedback FROM product_reviews ORDER BY p_name DESC";
	
	$run = mysql_query($query);
	
	$feedbacks = array();
	
	while($feedback = mysql_fetch_assoc($run))
	{
		$feedbacks[] = array('u_email'=>$feedback['u_Email'],
		                    'feedback'=>$feedback['Feedback']);
	}
	return $feedbacks;
}

function send_review($user, $feedback)
{
	if(!empty($feedback))
	{
	$user = mysql_real_escape_string($user);
	$feedback = mysql_real_escape_string($feedback);
	
	//$query = "INSRT INTO 'chat' . 'chat' VALUES (null, '{$sender}', '$message')";
	$query = "INSERT INTO product_reviews VALUES ('$user', '', '$feedback')";
	if($run = mysql_query($query)){
		return true;
	}else{
		return false;
	}
}else{
	return false;
	}
}
*/

function loggedin()
{
	if(isset($_SESSION['customer_email'])&&!empty($_SESSION['customer_email']))
	{
		return true;
}
else
{
	return false;
}
}


if(mysqli_connect_errno())
{
	echo "The Connection was not established " . mysqli_connect_error();
}
//Getting the users IP ADD
function getIp()
{
	$ip = $_SERVER['REMOTE_ADDR'];
	
	if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	
	return $ip;
}
// Creating the shopping cart
function cart()
{
		
	if(isset($_GET['add_cart']))
	{	
	if(!isset($_SESSION['customer_email']))
	{
		//header("location:customer_login.php");
		echo "<script>alert('Please Signin Or Signup To Purchase!')</script>";
		//echo "<script>window.open('customer_login.php')</script>";
	}
	else
	{
		global $con;
		
		$ip = getIp();
		
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
			$insert_pro = "INSERT INTO cart (p_id,customer_email,ip_add) values ('$pro_id','$c_email','$ip')";
			
			$run_pro = mysqli_query($con, $insert_pro);
			
			echo "<script>window.open('index.php','_self')</script>";
		}

		}
	}
	}


function cart2()
{
		
	if(isset($_GET['add2_cart']))
	{	
	if(!isset($_SESSION['customer_email']))
	{
		//header("location:customer_login.php");
		echo "<script>alert('Please Signin Or Signup To Purchase!')</script>";
		//echo "<script>window.open('customer_login.php')</script>";
	}
	else
	{
		global $con;
		
		$ip = getIp();
		
			$user = $_SESSION['customer_email'];
			
			$get_mail = "SELECT * FROM customers where customer_email = '$user'";
			$run_mail = mysqli_query($con, $get_mail);
			$row_mail = mysqli_fetch_array($run_mail);
			$c_email = $row_mail['customer_email'];
		
		$pro_id = $_GET['add2_cart'];
		
		$check_pro = "SELECT * FROM cart2 WHERE customer_email = '$c_email' AND p_id = '$pro_id'";
		
		$run_check = mysqli_query($con, $check_pro);
		
		if(mysqli_num_rows($run_mail&&$run_check)>0)
		//if(mysqli_num_rows($run_mail&&$run_check))
		{
			echo "";
			
		}
		else
		{
			$insert_pro = "INSERT INTO cart2 (p_id,customer_email,ip_add) values ('$pro_id','$c_email','$ip')";
			
			$run_pro = mysqli_query($con, $insert_pro);
			
			echo "<script>window.open('index2.php','_self')</script>";
		}

		}
	}
	}
	
	
	/* Creating the shopping cart
function cart()
{
		
	if(isset($_GET['add_cart']))
	{	
	if(!isset($_SESSION['customer_email']))
	{
		header("location:customer_login.php");
	}
	else
	{
		global $con;
		
		$ip = getIp();
		
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
			$insert_pro = "INSERT INTO cart (p_id,customer_email,ip_add) values ('$pro_id','$c_email','$ip')";
			
			$run_pro = mysqli_query($con, $insert_pro);
			
			echo "<script>window.open('index.php','_self')</script>";
		}

		}
	}
	}*/
	 


function total_items()
	{
	if(isset($_GET['add_cart']))
	{
	global $con,$user,$c_email;
	
	$ip = getIp();
	
	
	$get_items = "SELECT * FROM cart WHERE customer_email = '$c_email'";
	
	$run_items = mysqli_query($con, $get_items);
	
	$count_items = mysqli_num_rows($run_items);
	}
	else
	{
	global $con,$user,$c_email;
	
	$ip = getIp();
	
	$get_items = "SELECT * FROM cart WHERE customer_email = '$c_email'";
	
	$run_items = mysqli_query($con, $get_items);
	
	$count_items = mysqli_num_rows($run_items);
	
	}
	
	echo $count_items;
	
	}
	
	//getting the total price
	function total_price()
	{
		$total = 0;
		
		global $con,$user,$c_email;
		
		$ip = getIp();
		
		$sel_price = "SELECT * FROM cart WHERE customer_email = '$c_email'";
		
		$run_price = mysqli_query($con, $sel_price);
		
		while($p_price=mysqli_fetch_array($run_price))
		{
			$pro_id = $p_price['p_id'];
			
			$pro_price = "SELECT * FROM products WHERE product_id = '$pro_id'";
			
			$run_pro_price = mysqli_query($con, $pro_price);
			
			while($pp_price = mysqli_fetch_array($run_pro_price))
			{
				$product_price = array($pp_price['product_price']);
				
				$values = array_sum($product_price);
				
				$total +=$values;
			}
			
		}
		
		//echo "<img src='images/Indian_Rupee.jpg' alt = 'Rupee' width = '15' height = '10' ></img> : " . $total;
		echo  $total;
		
	}

function total_items2()
	{
	if(isset($_GET['add2_cart']))
	{
	global $con,$user,$c_email;
	
	$ip = getIp();
	
	
	$get_items = "SELECT * FROM cart2 WHERE customer_email = '$c_email'";
	
	$run_items = mysqli_query($con, $get_items);
	
	$count_items = mysqli_num_rows($run_items);
	}
	else
	{
	global $con,$user,$c_email;
	
	$ip = getIp();
	
	$get_items = "SELECT * FROM cart2 WHERE customer_email = '$c_email'";
	
	$run_items = mysqli_query($con, $get_items);
	
	$count_items = mysqli_num_rows($run_items);
	
	}
	
	echo $count_items;
	
	}
	
	//getting the total price
	function total_price2()
	{
		$total = 0;
		
		global $con,$user,$c_email;
		
		$ip = getIp();
		
		$sel_price = "SELECT * FROM cart2 WHERE customer_email = '$c_email'";
		
		$run_price = mysqli_query($con, $sel_price);
		
		while($p_price=mysqli_fetch_array($run_price))
		{
			$pro_id = $p_price['p_id'];
			
			$pro_price = "SELECT * FROM wproducts WHERE product_id = '$pro_id'";
			
			$run_pro_price = mysqli_query($con, $pro_price);
			
			while($pp_price = mysqli_fetch_array($run_pro_price))
			{
				$product_price = array($pp_price['product_price']);
				
				$values = array_sum($product_price);
				
				$total +=$values;
			}
			
		}
		
		//echo "<img src='images/Indian_Rupee.jpg' alt = 'Rupee' width = '15' height = '10' ></img> : " . $total;
		echo  $total;
		
	}
	

	
//getting the categories

function getCats()
{
	global $con;
	
	$get_cats = "select * from categories";
	
	$run_cats = mysqli_query($con, $get_cats);
	
	while($row_cats = mysqli_fetch_array($run_cats)){
		
	$cat_id = $row_cats['cat_id'];
	$cat_title = $row_cats['cat_title'];
	
	echo "<li><a href = 'index.php?cat=$cat_id'>$cat_title</a></li>";
	//echo "<option><a href = 'index.php?cat=$cat_id'>$cat_title</a></option>";
	}
}

//getting the brands

function getBrands()
{
	global $con;
	
	$get_brands = "SELECT * FROM brands";
	
	$run_brands = mysqli_query($con, $get_brands);
	
	while($row_brands = mysqli_fetch_array($run_brands))
	{
		$brand_id = $row_brands['brand_id'];
		$brand_title = $row_brands['brand_title'];
	
	echo "<li><a href = 'index.php?brand=$brand_id'>$brand_title</a></li>";
	}
	
}

function getPro()
{
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
			
	global $con;
	
	$get_pro = "SELECT * FROM products ORDER BY RAND() LIMIT 0,8";
	
	$run_pro = mysqli_query($con, $get_pro);
	
	while($row_pro = mysqli_fetch_array($run_pro))
	{
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		$pro_brand = $row_pro['product_brand'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
	
		echo "
		
		<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
		<html xmlns='http://www.w3.org/1999/xhtml'>
		<head>

		<link rel='stylesheet' href='../styles/newstyle.css' media='all' />
<link rel='stylesheet' href='../styles/bootstrap.min.css' integrity='sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7' crossorigin='anonymous'>


<link rel='stylesheet' href='../styles/bootstrap-theme.min.css' integrity='sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r' crossorigin='anonymous'>

<script src='../js/jquery.js'></script>


<script src='../js/bootstrap.min.js' integrity='sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS' crossorigin='anonymous'></script>
		
		<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css'>
		
		</head>
				
			<div class='col-md-3'>
			
				<div class='thumbnail' >
				<h4 class='text-center' ><a style='text-decoration:none;' href='details.php?pro_id=$pro_id' style='float:left;'>$pro_title</a></h4>
				<img class='img-responsive' src = 'admin_area/product_images/$pro_image' style='width:100%; height:170px;' />
				
				<h4 class='text-center';><i class='fa fa-inr' style='font-size:18px'></i> <b> : $pro_price </b></h4>
				
				<h4 class='pull-left'><a style='text-decoration:none;' href='details.php?pro_id=$pro_id' style='float:left;'>Details</a></h4>
				
				<h4 class='pull-right'><a href='index.php?add_cart=$pro_id'><button class='btn btn-primary btn-xs'>Add to Cart</button></a></h4>
				
				</div>
				</div>
				
		";
			}
		}
	}
}

function getCatPro()
{
	if(isset($_GET['cat'])){
		
		$cat_id = $_GET['cat'];
			
	global $con;
	
	$get_cat_pro = "SELECT * FROM products where product_cat = '$cat_id'";
	
	$run_cat_pro = mysqli_query($con, $get_cat_pro);
	
	$count_cats = mysqli_num_rows($run_cat_pro);
	
	if($count_cats==0)
	{
		echo "<h2>Sorry This Product from the selected Categories is unavailable now!</h2>";
		exit();
	}
	
	while($row_cat_pro = mysqli_fetch_array($run_cat_pro))
	{
		$pro_id = $row_cat_pro['product_id'];
		$pro_cat = $row_cat_pro['product_cat'];
		$pro_brand = $row_cat_pro['product_brand'];
		$pro_title = $row_cat_pro['product_title'];
		$pro_price = $row_cat_pro['product_price'];
		$pro_image = $row_cat_pro['product_image'];
	
	
		echo "
			<div class='col-md-3'>
			
				<div class='thumbnail' >
				<h4 class='text-center' ><a style='text-decoration:none;' href='details.php?pro_id=$pro_id' style='float:left;'>$pro_title</a></h4>
				<img class='img-responsive' src = 'admin_area/product_images/$pro_image' style='width:100%; height:170px;' />
				
				<h4 class='text-center';><i class='fa fa-inr' style='font-size:18px'></i> <b> $pro_price </b></h4>
				
				<h4 class='pull-left'><a style='text-decoration:none;' href='details.php?pro_id=$pro_id' style='float:left;'>Details</a></h4>
				
				<h4 class='pull-right'><a href='index.php?add_cart=$pro_id'><button class='btn btn-primary btn-xs'>Add to Cart</button></a></h4>
				
				</div>
				</div>
				
				
		";
		
		
	}
	
	}
}

function getBrandPro()
{
	if(isset($_GET['brand'])){
		
		$brand_id = $_GET['brand'];
			
	global $con;
	
	$get_brand_pro = "SELECT * FROM products where product_brand = '$brand_id'";
	
	$run_brand_pro = mysqli_query($con, $get_brand_pro);
	
	$count_brands = mysqli_num_rows($run_brand_pro);
	
	if($count_brands==0)
	{
		echo "<h2>Sorry The Product from the selected Brand is unavailable now!</h2>";
		exit();
	}
	
	while($row_brand_pro = mysqli_fetch_array($run_brand_pro))
	{
		$pro_id = $row_brand_pro['product_id'];
		$pro_cat = $row_brand_pro['product_cat'];
		$pro_brand = $row_brand_pro['product_brand'];
		$pro_title = $row_brand_pro['product_title'];
		$pro_price = $row_brand_pro['product_price'];
		$pro_image = $row_brand_pro['product_image'];
	
	
		echo "
			<div id = 'single_product'>
				<h3>$pro_title</h3>
				
				<img src = 'admin_area/product_images/$pro_image' width='180' height='180' />
				
				<p><img src='images/Indian_Rupee.jpg' alt = 'Rupee' width = '15' height = '10' ></img> : <b> $pro_price </b></p>
				
				<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
				
				<a href='index.php?add_cart=$pro_id'><button style = 'float:right'>Add to Cart</button></a>
			</div>
		";
	}
	
	}
}




function getWCats()
{
	global $con;
	
	$get_cats = "select * from wcategories";
	
	$run_cats = mysqli_query($con, $get_cats);
	
	while($row_cats = mysqli_fetch_array($run_cats)){
		
	$cat_id = $row_cats['cat_id'];
	$cat_title = $row_cats['cat_title'];
	
	echo "<li><a href = 'index2.php?cat=$cat_id'>$cat_title</a></li>";
	}
}

function getWCatPro()
{
	if(isset($_GET['cat'])){
		
		$cat_id = $_GET['cat'];
			
	global $con;
	
	$get_cat_pro = "SELECT * FROM wproducts where product_cat = '$cat_id'";
	
	$run_cat_pro = mysqli_query($con, $get_cat_pro);
	
	$count_cats = mysqli_num_rows($run_cat_pro);
	
	if($count_cats==0)
	{
		echo "<h2>Sorry This Product from the selected Categories is unavailable now!</h2>";
		exit();
	}
	
	while($row_cat_pro = mysqli_fetch_array($run_cat_pro))
	{
		$pro_id = $row_cat_pro['product_id'];
		$pro_cat = $row_cat_pro['product_cat'];
		
		$pro_title = $row_cat_pro['product_title'];
		$pro_price = $row_cat_pro['product_price'];
		$pro_image = $row_cat_pro['product_image'];
	
	
		echo "
			
			<div class='col-md-3'>
			
				<div class='thumbnail' >
				<h4 class='text-center' ><a style='text-decoration:none;' href='w_details.php?pro_id=$pro_id' style='float:left;'>$pro_title</a></h4>
				<img class='img-responsive' src = 'admin_area/w_admin_src/w_product_images/$pro_image' style='width:100%; height:170px;' />
				
				<h4 class='text-center';><i class='fa fa-inr' style='font-size:18px'></i> <b> $pro_price </b></h4>
				
				<h4 class='pull-left'><a style='text-decoration:none;' href='w_details.php?pro_id=$pro_id' style='float:left;'>Details</a></h4>
				
				<h4 class='pull-right'><a href='index2.php?add2_cart=$pro_id'><button class='btn btn-primary btn-xs'>Add to Cart</button></a></h4>
				
				</div>
				</div>
			
		";
	}
	
	}
}

function getWPro()
{
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
			
	global $con;
	
	$get_pro = "SELECT * FROM wproducts ORDER BY RAND() LIMIT 0,8";
	
	$run_pro = mysqli_query($con, $get_pro);
	
	while($row_pro = mysqli_fetch_array($run_pro))
	{
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
	
		echo "
			
			<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
		<html xmlns='http://www.w3.org/1999/xhtml'>
		<head>

		<link rel='stylesheet' href='../styles/newstyle.css' media='all' />
<link rel='stylesheet' href='../styles/bootstrap.min.css' integrity='sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7' crossorigin='anonymous'>


<link rel='stylesheet' href='../styles/bootstrap-theme.min.css' integrity='sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r' crossorigin='anonymous'>

<script src='../js/jquery.js'></script>


<script src='../js/bootstrap.min.js' integrity='sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS' crossorigin='anonymous'></script>
		
		<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css'>
		
		</head>
				
			<div class='col-md-3'>
			
				<div class='thumbnail' >
				<h4 class='text-center' ><a style='text-decoration:none;' href='w_details.php?pro_id=$pro_id' style='float:left;'>$pro_title</a></h4>
				<img class='img-responsive' src = 'admin_area/w_admin_src/w_product_images/$pro_image' style='width:100%; height:170px;' />
				
				<h4 class='text-center';><i class='fa fa-inr' style='font-size:18px'></i> <b> : $pro_price </b></h4>
				
				<h4 class='pull-left'><a style='text-decoration:none;' href='w_details.php?pro_id=$pro_id' style='float:left;'>Details</a></h4>
				
				<h4 class='pull-right'><a href='index2.php?add2_cart=$pro_id'><button class='btn btn-primary btn-xs'>Add to Cart</button></a></h4>
				
				</div>
				</div>
				
		";
			
			}
		}
	}
}


function getWBrandPro()
{
	if(isset($_GET['brand'])){
		
		$brand_id = $_GET['brand'];
			
	global $con;
	
	$get_brand_pro = "SELECT * FROM wproducts where product_brand = '$brand_id'";
	
	$run_brand_pro = mysqli_query($con, $get_brand_pro);
	
	$count_brands = mysqli_num_rows($run_brand_pro);
	
	if($count_brands==0)
	{
		echo "<h2>Sorry The Product from the selected Brand is unavailable now!</h2>";
		exit();
	}
	
	while($row_brand_pro = mysqli_fetch_array($run_brand_pro))
	{
		$pro_id = $row_brand_pro['product_id'];
		$pro_cat = $row_brand_pro['product_cat'];
		$pro_brand = $row_brand_pro['product_brand'];
		$pro_title = $row_brand_pro['product_title'];
		$pro_price = $row_brand_pro['product_price'];
		$pro_image = $row_brand_pro['product_image'];
	
	
		echo "
			<div id = 'single_product'>
				<h3>$pro_title</h3>
				
				<img src = 'admin_area/product_images/$pro_image' width='180' height='180' />
				
				<p><img src='images/Indian_Rupee.jpg' alt = 'Rupee' width = '15' height = '10' ></img> : <b> $pro_price </b></p>
				
				<a href='w_details.php?pro_id=$pro_id' style='float:left;'>Details</a>
				
				<a href='index.php?add2_cart=$pro_id'><button style = 'float:right'>Add to Cart</button></a>
			</div>
		";
	}
	
	}
}


?>