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
</head>

<body>
<?php 
	include("includes/wheader.inc.php");
?>
<div id="wrapper">
		<!--Sidebar-->
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<?php getWCats(); ?>
			</ul>
		</div>

		<!--Page Content-->
		<div id="page-content-wrapper">
		<div class="container">
		<div class="row">
					<!--<div class="col-lg-12">
					<div>
					<a href="#" class="btn btn-primary btn-sm" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger "></span></a>
					</div>
					-->
					<div class="col-md-12">
					<?php getWPro(); ?>
					<?php getWCatPro(); ?>
					<?php getWBrandPro(); ?>
					</div>
					</div>
				</div>
			</div>
		</div>
</div>
	
		<!--Menu toggle script-->
		<!--<script>
		$("#menu-toggle").click( function (e){
			e.preventDefault();
			$("#wrapper").toggleClass("menuDisplayed");
		});
		</script>-->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>		 
<?php 
	include("includes/footer.inc.php");
?>

</body>
</html>