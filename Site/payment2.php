<div>

<?php

		include("includes/db.php");
		
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
				
				$product_name = $pp_price['product_title'];
				
				$values = array_sum($product_price);
				
				$total +=$values;
			}
		}

		//getting Quantity of the product
		$get_qty = "SELECT * FROM cart2 WHERE p_id = '$pro_id'";
		
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
			//$total = $total*$qty;
		}
		
?>



<h2 align="center">Pay now with Paypal:</h2>

<!--<p style="text-align:center;"><img src="images/paypal.png" width="200" height="100"/></p>-->

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

<!-- Identify your business so that you can collect the payments. -->
<!-- <input type="hidden" name="business" value="fuzail-owner@hackranet.com">-->
<input type="hidden" name="business" value="sriniv_1293527277_biz@inbox.com">

<!-- Specify a Buy Now button. -->
<input type="hidden" name="cmd" value="_xclick">

<!-- Specify details about the item that buyers will purchase. -->
<input type="hidden" name="item_name" value="<?php echo $product_name; ?>">
<input type="hidden" name="item_number" value="<?php echo $pro_id; ?>">
<input type="hidden" name="amount" value="<?php echo $total; ?>">
<input type="hidden" name="quantity" value="<?php echo $qty; ?>">
<input type="hidden" name="currency_code" value="USD">

<!--<input type="hidden" name="return" value="http://www..com/my_shop/paypal_success.php" />
<input type="hidden" name="cancel_return" value="http://www..com/my_shop/paypal_cancel.php" />-->

<input type="hidden" name="return" value="http://localhost/mysitee/w_paypal_success.php" />
<input type="hidden" name="cancel_return" value="http://localhost/mysitee/paypal_cancel.php" />


<!-- Display the payment button. -->
<center><input type="image" name="submit" border="0"
src="paypal_button.png"
alt="PayPal - The safer, easier way to pay online">
<img alt="" border="0" width="1" height="1"
src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" ></center>

</form>

</div>