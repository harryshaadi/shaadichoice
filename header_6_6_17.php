<?php
include_once('scpanel/web-config.php');
include_once('scpanel/functions/common.php');
####################CHECK USER AUTHENTICATION####################
if (!empty($_SESSION['userAccountDetail']['email']))
{
	include_once('scpanel/classes/class.DBQuery.php');
	$db = new DBQuery();
	if ($db->getRecordCount(0,'tbl_profiles', array('email' => $_SESSION['userAccountDetail']['email'], 'account_status' => 'A'))) header('Location: dashboard.php');
	unset($db);
}
#####################CHECK USER AUTHENTICATION#####################
$registerVldParm = "email:email:Email~chkPassword:password:Password  of minimum 6 characters~dropDown:create_for:whose profile is being created.";
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<!---Tittle--->
<title>Shaadi Choice</title>
<!---Bootstrap CSS--->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<!---Custom CSS--->
<link href="css/custom.css" rel="stylesheet" type="text/css" />
<!---Custom CSS--->
<link href="css/responsive.css" rel="stylesheet" type="text/css" />
<!---Fontawesome--->
<link rel="stylesheet" href="css/font-awesome.min.css">
<!---Fevicon--->
<link href="img/fev.png" rel="icon" type="image/png" />
<!---Font-->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
<!---Bootstrap JS--->
<script src="js/main.js"></script>
<!---Bootstrap JS--->
<script src="js/bootstrap.min.js"></script>
<script src="js/common.js"></script>
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
<nav class="navbar navbar-default" role="navigation" data-spy="affix" data-offset-top="50"	>
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-target="#collapse" data-toggle="collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
            <a href="#" class="navbar-brand"><img src="img/logo.png" class="img-responsive"></a>
		</div>
        <div class="collapse navbar-collapse" id="collapse">
        	<div class="nav1">
                <ul class="nav navbar-nav">
                    <li><a href="#">How it Works</a></li>
                    <li><a href="dashboard.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-sm-3 hidden-xs">
            	<ul class="social-header pull-right">
                	<li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>
            </div>
			<ul class="login navbar-right">
				<li><a href="vendor/vendor-login.php" style="color: #333;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Vendor Login</a></li>
				<li><a href="#" style="color: #333; cursor: none;">|</a></li>
				<li><a data-toggle="modal" data-target="#myModl">Login</a></li>
				<li><a href="register.php" style="color: #fff;">Join</a></li>
				<!---first popup--->
				 <div class="modal fade" id="myModl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
					  	<img src="img/logo.png" class="text-center">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  </div>

					 <div class="modal-body">
							<h4 class="modal-title text-center" id="myModalLabel">SIGN IN </h4><br>
							<?php if(isset($_SESSION['sessionFor'])) 
									include_once('user-session-msg.php');
							?> 
							<form method="POST" name="userLogin" action="user-controller.php">
								<div class="form-group">
								  <label for="email">Email:</label>
								  <input type="loginemail" class="form-control" id="loginemail" name="loginemail" value="<?php if(isset($_COOKIE["login_userid"])) { echo $_COOKIE["login_userid"]; }?>" placeholder="Enter email" required >
								  <span class="errorcls" id="span_loginemail"></span>
								</div>
								<div class="form-group">
								  <label for="loginpwd">Password:</label>
								  <input type="password" class="form-control" id="loginpassword" name="loginpassword" value="<?php if(isset($_COOKIE["login_userpass"])) { echo $_COOKIE["login_userpass"]; }?>" placeholder="Enter password" required>
								  <span class="errorcls" id="span_loginpassword"></span>
								</div>
								<div class="checkbox">
								  <label><input type="checkbox" name="remember" <?php if(isset($_COOKIE["login_userid"])) { ?> checked <?php } ?>> Remember me</label>
								  <a href="forget-password.php" class="pull-right">Forgot Password?</a>
								</div>
								<button type="submit" class="btn btn-danger btn-block">Login</button>
								<input type="hidden" name="postAction" id="postAction" value="checkUserLoginDetail"/>
							</form>
					  </div>

					 <div class="model-footer">
						<h5 class="text-center">Don't Have an account?  <a href="register.php"	 class="text-center">Sign Up Free</a></h5>
						<a href="#" class="text-center"><img src="img/google-ply.png"></a>
						<a href="#" class="text-center"><img src="img/iphone-pay.png"></a>
					 </div>

					</div>
				  </div>
				</div>
				
				<!---first popup--->
				
				<!---second popup--->
				<!---<div class="modal fade" id="myModl1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  </div>
					  <div class="modal-body">
							<h4 class="modal-title text-center" id="myModalLabel">Let's set up your account, while we find Matches for you! </h4><br>
							<?php
							// HERE SHOW ERROR MSG
							 include_once('user-session-msg.php');
							?>
							<form method="post" action="user-controller.php" name="userRegistration" id="userRegistration" onSubmit="return validation('userRegistration', '<?=$registerVldParm?>');">
								<div class="form-group">
									<label for="email"><span class="star">*</span>Email:</label>
								  <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email id"/>
								  <span class="errorcls" id="span_email"></span>
								</div>
								<div class="form-group">
								  <label for="pass"><span class="star">*</span>Password:</label>
									<input type="password" class="form-control" name="password" id="password" value="" maxlength ="20" placeholder="Enter password">
									<span class="errorcls" id="span_password"></span>	
								</div>
								<div class="form-group">
								  <label for="create_for"><span class="star">*</span>Create Profile for</label>
									<?= makeDropDown('create_for', array_keys($ARR_CREAT_FOR), array_values($ARR_CREAT_FOR), '', "class='form-control'") ?>
									<span class="errorcls" id="span_create_for"></span>
								</div>
								<button type="submit" class="btn btn-danger btn-block" name="submitUser">Submit</button>
								<input type="hidden" name="postAction" id="postAction" value="resisterUser"/>
						   </form>
					  </div>
					  <div class="model-footer">
						<h4 class="text-center">Already a Member?? </h4>
						<a href="#" class="text-center" id="loginpopup"><h5>Login</h5></a>
					  </div>
					</div>
				  </div>
				</div>--->
				<!---second popup--->
				
			</ul>
        </div>
	</div>	
</nav>

<!---End navigation--->
<script>
    $(document).ready(function(){
		<?php
		if(isset($_SESSION['messageSession']))
		{
			if(isset($_SESSION['sessionFor']))
			{ ?>
				$('#myModl').modal('show');
				<?php unset($_SESSION['sessionFor']); 
			} else { ?>
				$('#myModl1').modal('show');
		<?php } 
		unset($_SESSION['messageSession']);
		}?>
    });
</script>