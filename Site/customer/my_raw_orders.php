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
<div class="table-responsive">
<table class="table table-hover" class="table table-bordered" >
<thead>
	<tr align="center">
    	<td colspan="6"><h2>Your Orders Details: </h2></td>
    </tr>
</thead>
 
	<thead>
      <tr class="info" >
        <th>S.N</th>
		<th>Product(S)</th>
		<th>Quantity</th>
        <th>Invoice No</th>
        <th>Order Date</th>
		<th>Status</th>
      </tr>
    </thead>
    <?php
    include("includes/db.php");
	
	//this is for customer details
		$user = $_SESSION['customer_email'];
			
		$get_c = "SELECT * FROM customers where customer_email = '$user'";
		$run_c = mysqli_query($con, $get_c);
		$row_c = mysqli_fetch_array($run_c);
			
		$c_id = $row_c['customer_id'];
	
	$get_order = "SELECT * FROM worders where c_id= '$c_id'";
	$run_order = mysqli_query($con, $get_order);
	$i = 0;
	while($row_ord=mysqli_fetch_array($run_order))
	{
		$order_id = $row_ord['order_id'];
		$qty = $row_ord['qty'];
		$pro_id = $row_ord['p_id'];
		$invoice_no = $row_ord['invoice_no'];
		$order_date = $row_ord['order_date'];
		$status = $row_ord['status'];
		$i++;
	
	$get_pro = "SELECT * FROM wproducts WHERE product_id = '$pro_id'";
	
	$run_pro = mysqli_query($con, $get_pro);
	
	$row_pro=mysqli_fetch_array($run_pro);
	
	$pro_image = $row_pro['product_image'];
	$pro_title = $row_pro['product_title'];
	
	?> 
<tbody>
    <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $pro_title; ?><br>
	<img src=".././admin_area/w_admin_src/w_product_images/<?php echo $pro_image;?>" width="50" height="50" />
	
	</td>
    <td><?php echo $qty;?></td>
    <td><?php echo $invoice_no; ?></td>
	<td><?php echo $order_date; ?></td>
    <td><?php echo $status; ?></td>
    </tr>
</tbody>
	<?php } ?>
</table>
</div>
</body>
</html>