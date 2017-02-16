<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<link rel="stylesheet" href="styles/newstyle.css" media="all" />

<link rel="stylesheet" href="styles/stylee.css" media="all" />

<link rel="stylesheet" href="styles/sidebar.css" media="all">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="styles/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


<link rel="stylesheet" href="styles/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">


<script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="js/jquery.js"></script>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
     For smooth animatin  
    <script src="js/wow.min.js"></script>  
    <!-- Bootstrap js 
    <script src="js/bootstrap1.min.js"></script>
    <!-- slick slider 
    <script src="js/slick.min.js"></script>
    <!-- superslides slider 
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.animate-enhanced.min.js"></script>
    <script src="js/jquery.superslides.min.js" type="text/javascript" charset="utf-8"></script>   
    <!-- for circle counter 
    <script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
    <!-- Gallery slider 
    <script type="text/javascript" language="javascript" src="js/jquery.tosrus.min.all.js"></script>   
   
    <!-- Custom js
    <script src="js/custom.js"></script>-->


</head>
<body>
<?php 
	include("includes/header.inc.php");
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/pslr5.jpg">
    </div>

    <div class="item">
      <img src="images/prsl2.PNG">
    </div>

    <div class="item">
      <img src="images/prsl3.PNG">
    </div>

    <div class="item">
      <img src="images/pslr4.jpg">
    </div>

     <div class="item">
      <img src="images/prsl1.PNG">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div id="wrapper">
		<!--Sidebar-->
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<?php getCats(); ?>
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
					<?php getPro(); ?>
					<?php getCatPro(); ?>
					<?php getBrandPro(); ?>
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>	 
<?php 
	include("includes/footer.inc.php");
?>

</body>
</html>