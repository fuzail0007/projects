<?php

session_start();

session_destroy();

//unset($_session['customer_email']);

echo "<script>window.open('index.php','_self')</script>";

?>