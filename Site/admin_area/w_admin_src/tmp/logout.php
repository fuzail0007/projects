<?php

session_start();

session_destroy();

echo"<script>window.open('login.php?logged_out=You have Logged Out Successfully!, Come Back Soon!','_self')</script>";

?>
