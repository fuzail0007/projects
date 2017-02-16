<?php
	$get_cat_id = "SELECT * FROM categories WHERE cat_title = 'Gents Coats'";
	
	echo "<li><a href = 'index.php?cat=$cat_id'>$cat_title</a></li>";
?>