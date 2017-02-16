<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Payment Successful!</title>
</head>

<body>

<?php
		include("includes/db.php");
		include("functions/functions.php");
		
		//this is for product details
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
				
				$product_id = $pp_price['product_id'];
				
				$product_name = $pp_price['product_title'];
				
				$values = array_sum($product_price);
				
				$total +=$values;
			}
			
		}
		//getting Quantity of the product
		$get_qty = "SELECT * FROM cart WHERE p_id = '$pro_id'";
		
		
		$run_qty = mysqli_query($con, $get_qty);
		
		$row_qty = mysqli_fetch_array($run_qty);
		
		$qty = $row_qty['qty'];
		
		if($qty==0)
		{
			$qty=1;
		}
		else
		{
			$qty=$qty;
			$total = $total*$qty;
		}
		
		//this is for customer details
			$user = $_SESSION['customer_email'];
			
			$get_c = "SELECT * FROM customers where customer_email = '$user'";
			$run_c = mysqli_query($con, $get_c);
			$row_c = mysqli_fetch_array($run_c);
			
			$c_id = $row_c['customer_id'];
			$c_name = $row_c['customer_name'];
			// payment details from paypal
			
			$amount = $_GET['amt'];
			$currency = $_GET['cc'];
			$trx_id = $_GET['tx'];
			$invoice = mt_rand();
			
			//inserting the product into table
			$insert_payment = "insert into payments (amount,customer_id,product_id,trx_id,currency,payment_date) values ('$amount','$c_id','$pro_id','$trx_id','$currency',NOW())";
			
			$run_payments = mysqli_query($con, $insert_payment);
			
			//inserting the order into table
			$insert_order = "insert into orders (p_id, c_id, qty, invoice_no, order_date,status) values ('$pro_id','$c_id','$qty','$invoice',NOW(),'In Progress')";
			$run_order = mysqli_query($con, $insert_order);
			
			//Removing the product from cart after order takes place 
			$empty_cart = "delete from cart";
			$run_cart = mysqli_query($con, $empty_cart);
			
			if($amount==$total)
			{
				echo "<h2>Welcome:" . $_SESSION['customer_email']. "<br>" . "Your payment was Successful!</h2>";
				echo "<a href = 'http://www.theleathercity.site88.net/ecomweb/customer/my_account.php'>Go to Your Account</a>";
			}
			else
			{
				echo "<h2>Sorry Your Transaction was Failed!</h2>";
				echo "<a href = 'http://www.theleathercity.site88.net/ecomweb'>Go Back</a>";
			}
			
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: <mohammaddfuzail95@gmail.com>' . "\r\n";
	
	$subject = "<html>
	<p>
	
	Hello dear <b style='color:blue;'>$c_name</b> you have ordered some products on our website theleathercity.site88.net
	please find your order details, your order will processed shortly. Thank You!</p>
	
	<table width='600' align = 'center' bgcolor='#FFCC99' border='2'>
	
	<tr><td><h2>Your Order Details from www.theleathercity.site88.net</h2></td></tr>
	
	<tr>
		<th><b>S.N</b></th>
		<th><b>Product Name</b></th>
		<th><b>Quantity</b></th>
		<th><b>Paid Amount</b></th>
		<th><b>Invoice No</b></th>
	</tr>
	
	<tr>
		<td>1</td>
		<td>$product_name</td>
		<td>$qty</td>
		<td>$amount</td>
		<td>$invoice</td>
	</tr>
	</table>
	
	<h3>Please go to your account and see your order details!</h3>
	
	<h2> <a href='http://www.theleathercity.site88.net/mysite'>Click here</a> to login to your account.</h2>
	
	<h3> Thank you for your order @ - www.theleathercity.site88.net</h3>
	
	</html>
	
	>";
	
	mail($c_email,$subject,$message,$headers);
        //mail($customer_email,$subject,$message,$from);
			
?>
</body>
</html>	