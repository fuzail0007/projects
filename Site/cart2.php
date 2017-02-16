<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<link rel="stylesheet" href="styles/newstyle.css" media="all" />
<link rel="stylesheet" href="styles/sidebar.css" media="all">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="styles/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


<link rel="stylesheet" href="styles/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">


<script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="js/jquery.js"></script>
<title>My Cart</title>

<!--<link rel="stylesheet" href="styles/style.css" media="all" />-->

</head>

<body>
<?php
include("includes/wheader.inc.php");
?>


<div class="container">
	<form role="form" action = "" method="post" enctype="multipart/form-data">
         <table class="table table-bordered" align="center" width="700" bgcolor="#3333FF">
		 <thead>
            <tr class="info">
                <th>Remove</th>
                <th>Product(s)</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
         </thead>
<?php
                
	$total = 0;
		
	global $con;
		
	$ip = getIp();
		
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
				
				$product_title = $pp_price['product_title'];
				
				$product_image = $pp_price['product_image'];
				
				$single_price = $pp_price['product_price'];
				
				$values = array_sum($product_price);
				
				$total +=$values;
				
?>
        <tbody>       
        <tr align="center">
            <td><input type="checkbox" name="remove[]" value = "<?php echo $pro_id; ?>"/></td>
            <td><?php echo $product_title; ?><br/>
                <img src="admin_area/w_admin_src/w_product_images/<?php echo $product_image; ?>" width="60" height="60" />
            </td>
            <td><input type="text" size="3" name="qty" value="<?php echo $_SESSION['qty']; ?>" /></td>
                    
<?php
                    	if(isset($_POST['update_cart']))
						{
							$qty = $_POST['qty'];
							
							$update_qty = "update cart2 set qty = '$qty'";
							$run_qty = mysqli_query($con, $update_qty);
							
							$_SESSION['qty'] = $qty;
							
							$total = $total * $qty;
						}
?>
                    
            <td><?php echo " <b><i class='fa fa-inr' style='font-size:14px'></i></b> :  " .$single_price; ?></td>
        </tr>
                
<?php } } ?>
                
                <tr>
                	<td colspan="3"><b>Sub Total: </b></td>
                    <td><?php  echo " <b><i class='fa fa-inr' style='font-size:16px'></i></b> : " . $total; ?></td>
                </tr>
                
                <tr align="center">
                	<td><input  class="btn btn-warning" type="submit" name="modify_cart" value="Modify Cart" /></td>
                    <td><input class="btn btn-primary" type="submit" name="continue" value="Continue Shopping" /></td>
                    <td colspan="1"><input class="btn btn-info" type="submit" name="update_cart" value="Update Cart" /></td>
                    <td><button class="btn btn-success" ><a style="text-decoration:none; color:#000;" href = "wcheckout.php">CheckOut</a></button></td>
                </tr>
				</tbody>
                
    </table>
            
    </form>
         	
<?php
			
			if(isset($_POST['modify_cart']))
			{
				foreach($_POST['remove'] as $remove_id)
				{
					$delete_product = "delete from cart2 where p_id = '$remove_id' AND customer_email = '$c_email'";
					$run_delete = mysqli_query($con, $delete_product);
					
					if($run_delete)
					{
						echo "<script>window.open('cart2.php','_self')</script>";
					}
				}
			}
			
			if(isset($_POST['continue']))
			{
				echo "<script>window.open('index2.php','_self')</script>";
			}
				
?>
        
</body>
</html>
