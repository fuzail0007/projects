<?php require('includes/core.inc.php');?>
<div id = "input">
<div id = "feedback"></div>
<form action = "reviews.php" method = "POST" id = "form_input">
    <!--<label>Enter Name:<input type = "text" name = "sender" id = "sender"/></label>-->
	
	<?php
	$user = $_SESSION['customer_email'];
	echo "$user <br/>"; ?>
<!--	<label>Enter Message:<input type = "text" name = "message" id = "message" /></label><br>-->
	<br/><label>Submit Your Feedback<br/><textarea  id = "message" cols = "33" rows = "4"></textarea></label><br>
	<input type = "Submit" name = "send" value = "Send" id = "send" >
</form>
</div>

<div id = "messages">


</div><!--Messages-->
<script type = "text/javascript"  src = "js/jquery.js"></script>
<script type = "text/javascript"  src = "js/auto_chat.js"></script>
<script type = "text/javascript"  src = "js/send.js"></script>

<!--javascript-->

<div>

<form action = "reviews.php" method = "GET" enctype="multipart/form-data" >
	<label>Post Your Feedback:<br/><textarea  name = "feeds"id = "message" cols = "33" rows = "4"></textarea></label><br>
		<input type = "Submit" name = "send" value = "Post" id = "send" >
</form>
</div>

<?php
include("includes/db.php");

if(isset($_GET['send']))
{
	$user = $_SESSION['customer_email'];
	
	$p_name = $_GET['$pro_title'];
	
	$feedback = $_GET['feeds'];
	
	$insert_feedback = "insert into product_reviews (u_email,p_name,feedback) values ('$user','$p_name','$feedback')";
	$run_feedback = mysqli_query($con, $insert_feedback);
	
	if($run_feedback)
	{
		echo"";
	}
	else
	{
		$sel_usr_names = "select u_name from "
		echo""
	}
	
}


?>