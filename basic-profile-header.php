<?php include_once('scpanel/web-config.php'); ?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<!---Tittle--->
<title>Shaadi Choice</title>
<!---Bootstrap CSS--->
<link href="<?=USER_PATH?>css/bootstrap.css" rel="stylesheet" type="text/css" />
<!---Custom CSS--->
<link href="<?=USER_PATH?>css/custom.css" rel="stylesheet" type="text/css" />
<!---Custom CSS--->
<link href="<?=USER_PATH?>css/responsive.css" rel="stylesheet" type="text/css" />
<!---Fontawesome--->
<link rel="stylesheet" href="<?=USER_PATH?>css/font-awesome.min.css">
<!---Fevicon--->
<link href="<?=USER_PATH?>img/fev.png" rel="icon" type="image/png" />
<!---Font-->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
</head>
<body>
<div  id="feedback"><a href="#" data-toggle="modal" data-target="#basicModal">★&nbsp;Reviews</a></div>


<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		</div>
		<div class="modal-body">
		  <div class="media">
			<a class="pull-left" href="#">
				<img class="media-object img-circle" src="http://placekitten.com/150/150" width="80" height="80">
			 </a>
			 <h4 class="media-heading">Ankit Sharma</h4>
			 <ul class="list-inline list-unstyled">
				<li>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star-empty"></span>
				</li>
				<li>|</li>
				<li><span><i class="glyphicon glyphicon-calendar"></i> 2 days, 8 hours </span></li>
			</ul>
		    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue.Duis pharetra varius quam sit amet vulputate. Quisque mauris augue</p>
		</div>
		
		<div class="media">
			<a class="pull-left" href="#">
				<img class="media-object img-circle" src="http://placekitten.com/150/150" width="80" height="80">
			 </a>
			 <h4 class="media-heading">Ankit Sharma</h4>
			 <ul class="list-inline list-unstyled">
				<li>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star-empty"></span>
					<span class="glyphicon glyphicon-star-empty"></span>
				</li>
				<li>|</li>
				<li><span><i class="glyphicon glyphicon-calendar"></i> 2 days, 8 hours </span></li>
			</ul>
		    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue.Duis pharetra varius quam sit amet vulputate. Quisque mauris augue</p>
		</div>
		
		<div class="media">
			<a class="pull-left" href="#">
				<img class="media-object img-circle" src="http://placekitten.com/150/150" width="80" height="80">
			 </a>
			 <h4 class="media-heading">Ankit Sharma</h4>
			 <ul class="list-inline list-unstyled">
				<li>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star-empty"></span>
				</li>
				<li>|</li>
				<li><span><i class="glyphicon glyphicon-calendar"></i> 2 days, 8 hours </span></li>
			</ul>
		    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue.Duis pharetra varius quam sit amet vulputate. Quisque mauris augue</p>
		</div>
		
		<h5><a href="#">See All </a></h5>
	  </div>
    </div>
  </div>
</div>
<!---Start Navigation--->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-target="#collapse" data-toggle="collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
            <a href="#" class="navbar-brand"><img src="<?=USER_PATH?>img/logo.png" class="img-responsive"></a>
		</div>
        <div class="collapse navbar-collapse" id="collapse">
        	<div class="">
                <ul class="nav navbar-nav pull-right">
                    <li><a href="#">How it Works</a></li>
                    <li><a href="<?=USER_PATH?>aboutus.php">About Us</a></li>
                    <li><a href="<?=USER_PATH?>contact.php">Contact Us</a></li>
				</ul>
			</ul>
        </div>
	</div>	
</nav>
<br>
<br>
<br>
<!---End navigation--->