<?php 
include_once('scpanel/web-config.php');
include_once('scpanel/functions/common.php');
include_once('scpanel/classes/class.DBQuery.php');
include_once('functions/common.php');
$userContactDetail = "text:name:Full Name~email:email:Email~text:subject:Subject~numeric:mobile:Mobile No~textarea:message:Message";



?>
<!--<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<img src="img/map.png" class="img-responsive" style="width:100%;">
			</div>
		</div>
	</div>
</section>-->
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<!---Tittle--->
<title>Contact us  - Shaadichoice.com</title>

<meta name="Keywords" content="Contact us, Shaadichoice.com" />

<meta name="Description" content="Contact us to Shaadichoice.com to find out a perfect life partner for marriage. Members also can find marriage vendors to arrangement necessary elements of the marriage." />
<link rel="canonical" href="http://www.shaadichoice.com/contact.php"> 
<!---Bootstrap CSS--->
<link href="http://www.shaadichoice.com/css/bootstrap.css" rel="stylesheet" type="text/css" />
<!---Custom CSS--->
<link href="http://www.shaadichoice.com/css/custom.css" rel="stylesheet" type="text/css" />
<!---Custom CSS--->
<link href="http://www.shaadichoice.com/css/responsive.css" rel="stylesheet" type="text/css" />
<!---Fontawesome--->
<link rel="stylesheet" href="http://www.shaadichoice.com/css/font-awesome.min.css">
<!---Fevicon--->
<link href="http://www.shaadichoice.com/img/fev.png" rel="icon" type="image/png" />
<!---Font-->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
<!---Bootstrap JS--->
<script src="http://www.shaadichoice.com/js/main.js"></script>
<!---Bootstrap JS--->
<script src="http://www.shaadichoice.com/js/bootstrap.min.js"></script>
<script src="http://www.shaadichoice.com/js/common.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-98333566-2', 'auto');
  ga('send', 'pageview');
</script>
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
				<img class="media-object img-circle" src="http://www.shaadichoice.com/uploads/profile_pic/thumb/21b07ef1c0.jpg" width="80" height="80">
			 </a>
			 <h4 class="media-heading">Priya Sharma</h4>
			 <ul class="list-inline list-unstyled">
				<li>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
				</li>
				<li>|</li>
				<li><span><i class="glyphicon glyphicon-calendar"></i> 5 days ago</span></li>
			</ul>
		    <p>All My Siblings Got Married Through Shaadichoice.com And Now I Am Too! Thank You SELECT, Would Like To Wish You A Great Future Ahead.</p>
		</div>
				<h5><a href="javascript:void(0)">See All </a></h5>
	  </div>
    </div>
  </div>
</div>
<!---Start Navigation--->
<nav class="navbar navbar-default" role="navigation" data-spy="affix" data-offset-top="50"	>
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-target="#collapse" data-toggle="collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
            <a href="http://www.shaadichoice.com/" class="navbar-brand"><img src="http://www.shaadichoice.com/img/logo.png" class="img-responsive"></a>
		</div>
        <div class="collapse navbar-collapse" id="collapse">
        	<div class="nav1">
                <ul class="nav navbar-nav">
                    <li><a href="http://www.shaadichoice.com/howitworks.php">How it Works</a></li>
                    <li><a href="http://www.shaadichoice.com/aboutus.php">About Us</a></li>
					 <li><a href="http://www.shaadichoice.com/blog.php" class="text-center">Our Blog</a></li>
                    <li><a href="http://www.shaadichoice.com/contact.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-sm-3 hidden-xs">
            	<ul class="social-header pull-right">
                	<li><a href="https://www.facebook.com/ShaadiChoice/"><i class="fa fa-facebook" target="_blank"></i></a></li>
                    <li><a href="https://twitter.com/ShaadiChoice"><i class="fa fa-twitter" target="_blank"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/ShaadiChoice.com" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                    <li><a href="https://plus.google.com/u/0/101436973909434599842" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCO2bKvYKUslNP-xspXagw7w" target="_blank"><i class="fa fa-youtube"></i></a></li>
                </ul>
            </div>
			<ul class="login navbar-right">
				<li><a href="http://www.shaadichoice.com/vendor/vendor-login.php" style="color: #333;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Vendor Login</a></li>
				<li><a href="#" style="color: #333; cursor: none;">|</a></li>
				<li><a data-toggle="modal" data-target="#myModl">Login</a></li>				
				<li><a  href="http://www.shaadichoice.com/register.php" style="color: #fff;">Join</a></li>
				<!---first popup--->
				 <div class="modal fade" id="myModl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
					  <img src="http://www.shaadichoice.com/img/logo.png" class="text-center">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  </div>

					 <div class="modal-body">
							<h4 class="modal-title text-center" id="myModalLabel">Login with your Email Id </h4><br>
							<form method="POST" name="userLogin" id="userLogin" action="http://www.shaadichoice.com/user-controller.php">
							<span class="errorcls" id="err_msg"></span>
								<div class="form-group">
								  <label for="email">Email:</label>
								  <input type="loginemail" class="form-control" id="loginemail" name="loginemail" value="" placeholder="Enter email" required >
								   
								  <span class="errorcls" id="span_loginemail"></span>
								</div>
								<div class="form-group">
								  <label for="loginpwd">Password:</label>
								  <input type="password" class="form-control" id="loginpassword" name="loginpassword" value="" placeholder="Enter password" required>
								  <span class="errorcls" id="span_loginpassword"></span>
								</div>
								<div class="checkbox">
								  <label><input type="checkbox" name="remember" > Remember me</label>
								  <a href="http://www.shaadichoice.com/forget-password.php" class="pull-right">Forgot Password?</a>
								</div>
								<button type="submit" class="btn btn-danger btn-block" onClick="return validation('userLogin', 'email:loginemail:Email~chkPassword:loginpassword:Password  of minimum 6 characters');">Login</button>
								<input type="hidden" name="postAction" id="postAction" value="checkUserLoginDetail"/>
							</form>
					  </div>
					 
					 <div class="model-footer">
						<h4 class="text-center">New to ShaadiChoice.com? </h4>
						<a href="http://www.shaadichoice.com/register.php" class="text-center" id="sign_popup"><h5>Sign Up Free</h5></a>
						<a href="#" class="text-center"><img src="http://www.shaadichoice.com/img/google-ply.png"></a>
						<a href="#" class="text-center"><img src="http://www.shaadichoice.com/img/iphone-pay.png"></a>
					 </div>

					</div>
				  </div>
				</div>
				
				<!---first popup--->
				
				
				
			</ul>
        </div>
	</div>	
</nav>

<section class="content">
	<div class="container">
		<div class="row">
		<?php include('user-session-msg.php');?>
			<!--<div class="col-sm-4 panel-body">
				<div class="contact-title">
					<span>HEAD QUARTERS</span>
				</div>
				<address>
					<strong>Address:</strong> eNest LLC 4809, E Thistle Landing, Dr. Suit 100 AZ 85044 USA ,<br>
					<strong>Email:</strong> info@shaadichoice.com<br>
					<strong>Phone:</strong> +1-888-414-6658 
				</address>

			</div>
			
			<div class="col-sm-4 panel-body">
				<div class="contact-title">
					<span>USA Office</span>
				</div>
				<address>
					<strong>Address:</strong> eNest LLC 4809, E Thistle Landing, Dr. Suit 100 AZ 85044 USA ,<br>
					<strong>Email:</strong> info@shaadichoice.com<br>
					<strong>Phone:</strong> +1-888-414-6658 
				</address>
			</div>
			
			<div class="col-sm-4 panel-body">
				<div class="contact-title">
					<span>Canada Office</span>
				</div>
				<address>
					<strong>Address:</strong> eNest LLC 4809, E Thistle Landing, Dr. Suit 100 AZ 85044 USA ,<br>
					<strong>Email:</strong> info@shaadichoice.com<br>
					<strong>Phone:</strong> +1-888-414-6658 
				</address>
			</div>
			
			<div class="col-sm-4 panel-body">
				<div class="contact-title">
					<span>India Office</span>
				</div>
				<address>
					<strong>Address:</strong> eNest LLC 4809, E Thistle Landing, Dr. Suit 100 AZ 85044 USA ,<br>
					<strong>Email:</strong> info@shaadichoice.com<br>
					<strong>Phone:</strong> +1-888-414-6658 
				</address>
			</div>
			
			<div class="col-sm-4 panel-body">
				<div class="contact-title">
					<span>UK Office</span>
				</div>
				<address>
					<strong>Address:</strong> eNest LLC 4809, E Thistle Landing, Dr. Suit 100 AZ 85044 USA ,<br>
					<strong>Email:</strong> info@shaadichoice.com<br>
					<strong>Phone:</strong> +1-888-414-6658 
				</address>
			</div>-->
			
			<div class="col-sm-12 contact-form">
				<div class="contact-title">
					<span>Contact Us</span>
				</div>
			
				<form role="form" method="POST" name="userContactDetail" id="userContactDetail" action="user-controller.php" onSubmit="return validation('userLocationDetail', '<?=$userContactDetail?>');" style="display:inline">
					<div class="row">
						<div class="col-xs-6 col-md-6 form-group">
							<input class="form-control" id="name" name="name" placeholder="Full Name" type="text" required autofocus />
							<span class="errorcls" id="span_name"></span>
						</div>
						<div class="col-xs-6 col-md-6 form-group">
							<input class="form-control" id="email" name="email" placeholder="Email" type="email" required />
							<span class="errorcls" id="span_email"></span>
						</div>
						<div class="col-xs-6 col-md-6 form-group">
							<input class="form-control" id="subject" name="subject" placeholder="Subject" type="text" required />
							<span class="errorcls" id="span_subject"></span>
							<input type="hidden" class="form-control" id="sendfrom" name="sendfrom" value="<?=$_SERVER['REMOTE_ADDR']?>">
						</div>
						<div class="col-xs-6 col-md-6 form-group">
							<input class="form-control" id="mobile" name="mobile" placeholder="Mobile No" maxlength="10" type="text" required />
							<span class="errorcls" id="span_mobile"></span>
						</div>
					</div>
					<textarea class="form-control" id="message" name="message" placeholder="Message" rows="5"></textarea>
					<span class="errorcls" id="span_message"></span>
					<br />
						<!--<div class="col-xs-6 col-md-6 form-group">
				<p><img src="/captcha.php" width="120" height="30" border="1" alt="CAPTCHA"></p>
				<p style="width:224px;"><input type="text" size="6" maxlength="5" name="capatcha" value="" required><br>
				<small style="color:red;">copy the digits from the image into this box</small></p>
				
			</div>-->
			<br />
					<div class="row">
					<div class="col-xs-12 col-md-12 form-group">
					<input type="hidden" value="userContactDetail" name="postAction" class="btn btn-danger">
						<button class="btn btn-danger pull-right" name="submitContact" type="submit">Submit</button>
					</div>	
				</form>
			</div>
			
		</div>
</section>
	
<!---Section--->

<?php 
	include('footer-basic.php');
?> 

<script>
$(document.body).on('hide.bs.modal', function () {
    $('body').css('padding-right','0');
});
$(document.body).on('hidden.bs.modal', function () {
    $('body').css('padding-right','0');
	
});
</script>
