<?php
include_once('scpanel/web-config.php');
include_once('scpanel/functions/common.php');
include_once('scpanel/classes/class.DBQuery.php');
$db = new DBQuery();
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta charset="utf-8">
<!---Tittle--->
<title>Shaadi Choice</title>
<!---Bootstrap CSS--->
<link href="<?=USER_PATH?>css/bootstrap.css" rel="stylesheet" type="text/css" />
<!---Custom CSS--->
<link href="<?=USER_PATH?>css/custom.css" rel="stylesheet" type="text/css" />
<!---Responsive CSS--->
<link href="<?=USER_PATH?>css/responsive.css" rel="stylesheet" type="text/css" />
<!---Fontawesome--->
<link rel="stylesheet" href="<?=USER_PATH?>css/font-awesome.min.css">
<!---Fevicon--->
<link href="<?=USER_PATH?>img/fev.png" rel="icon" type="image/png" />
<link href="<?=USER_PATH?>css/blog.css" rel="stylesheet" type="text/css" />
<!---Font-->
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>

	<nav class="navbar navbar-default menu" role="navigation" role="navigation" data-spy="affix" data-offset-top="50">
		  <div class="container">
		  	<div class="row">
		  		<div class="col-sm-12">
		  			<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand navbar-brand-logo" href="<?=USER_PATH?>dashboard.php" style="padding-top: 3px; height: 55px;">
						<img src="<?=USER_PATH?>img/logo.png" class="img-responsive">
					  </a>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						  <ul class="nav navbar-nav navbar-nav1 col-sm-5 menu1">
						  		<li>
									<a href="<?=USER_PATH?>dashboard.php" class="text-center">
										<i class="fa fa-tachometer" aria-hidden="true"></i>
										<p>My Dashboard</p>
									</a>
								</li>
								<li>
									<a href="<?=USER_PATH?>search.php" class="text-center">
										<i class="fa fa-search"></i>
										<p>Search</p>
									</a>
								</li>
								<li>
									<a href="<?=USER_PATH?>message.php" class="text-center">
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<p>Messages</p>
									</a>
								</li>
								<li>
									<a href="<?=USER_PATH?>interest.php" class="text-center">
										<i class="fa fa-heart-o" aria-hidden="true"></i>
										<p>Interest</p>
									</a>
							  </li>
							  <li>
									<a href="<?=USER_PATH?>blog.php" class="text-center">
										<i class="fa fa-rss" aria-hidden="true"></i>
										<p>Blog</p>
									</a>
							  </li>
						  </ul>
						  <ul class="nav navbar-nav navbar-nav1 menu1">
								<li>
									<a href="" class="text-center">
										<i class="fa fa-line-chart" aria-hidden="true"></i>
										<p>How can we improve?</p>
									</a>
								</li>
						  </ul>
						  <ul class="nav navbar-nav	 navbar-right">
							<li style=" margin-right: 20px; margin-top: 7px; margin-bottom: 7px;"><a href="<?=USER_PATH?>upgrade.php" class="btn-header" style="background: #373535; color: #fff !important; border: 1px solid #fff;  border-radius: 8px; font-size: 12px;">Upgrade Now</a></li>  
							<li><i class="fa" aria-hidden="true"></i><p><?= "Welcome <a href='self-profile.php' class='wel-pro'>".(!empty($_SESSION['userDetail'])?($_SESSION['userDetail']['fname']!=''?ucfirst($_SESSION['userDetail']['fname']):''):'')."</a>"?></p></li>
							<li class="dropdown">
							<?php
							$profileImage='';
							if(!empty($_SESSION['userDetail']))
							{
								 $userProfileImage = $db->getRecord(0,array('image_code', 'image', 'defalut_image'),'tbl_profile_images', array('profile_code' => $_SESSION['userDetail']['profile_code']));
								 $count = count($userProfileImage);
								 if($count>0 && $userProfileImage[0]['image']!='')
								 {
									 $profileImage = USER_PATH.'uploads/profile_pic/thumb/'.$userProfileImage[0]['image'];
								 }
								 else
								 {
									 $profileImage = USER_PATH.'img/default-profile.jpg';
								 }
							}
							?>
							  <a href="#" class="dropdown-toggle profile-header" data-toggle="dropdown" role="button" aria-expanded="false"><img src="<?=$profileImage?>"> <span class="caret"></span></a>
							  <ul class="dropdown-menu">
										<li class="col-sm-6">
											<ul class="dropmenu">
												<li><a href="<?=USER_PATH?>self-profile.php"><i class="fa fa-user-o" aria-hidden="true"></i> My Profile</a></li>
												<li><a href="<?=USER_PATH?>setting.php"><i class="fa fa-cog" aria-hidden="true"></i> Manage A/c</a></li>
												<li><a href="<?=USER_PATH?>self-profile.php#partner"><i class="fa fa-filter" aria-hidden="true"></i>Partner Preference</a></li>
											</ul>
										</li>
										<li class="col-sm-6">
											<ul class="dropmenu">
												<li><a href="<?=USER_PATH?>message.php"><i class="fa fa-envelope-o" aria-hidden="true"></i> SMS Alerts</a></li>
												<li><a href="<?=USER_PATH?>setting.php"><i class="fa fa-lock" aria-hidden="true"></i> Change Password </a></li>
												<li><a href="<?=USER_PATH?>logout.php"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a></li>
											</ul>
										</li>
										<li class="col-sm-12 text-center">
											<hr>
											<ul>
												<li><a href="<?=USER_PATH?>help.php" class="btn btn-danger text-center">Help Center</a></li>
												
											</ul>
										</li>
								  </div>
							  </ul>
							</li> 
						</ul>
						
			<!---first popup--->
				 <div class="modal fade" id="myModl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
					   <img src="<?=USER_PATH?>img/logo.png" class="text-center">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  </div>

					 <div class="modal-body">
							<h4 class="modal-title text-center" id="myModalLabel">Login with your Email Id </h4><br>
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
								  <a href="<?=USER_PATH?>forget-password.php" class="pull-right">Forgot Password?</a>
								</div>
								<button type="submit" class="btn btn-danger btn-block">Login</button>
								<input type="hidden" name="postAction" id="postAction" value="checkUserLoginDetail"/>
								<?php $searchRediectkey = getFieldValPostORGet('profileSearch');  
								if($searchRediectkey!==''){ ?>
								<input type ="hidden" name="searchtoWhome" value="<?=$_POST['toWhome']?>">
								<input type ="hidden" name="searchAgeFrom" value="<?=$_POST['age_from']?>">
								<input type ="hidden" name="searchAgeTo" value="<?=$_POST['age_to']?>">
								<input type ="hidden" name="searchCommunity" value="<?=$_POST['community']?>">
								<input type ="hidden" name="searchCountry" value="<?=$_POST['country']?>">
								<?php } ?>
								<input type ="hidden" name="searchRedirectFlag" value="<?=($searchRediectkey!=''?$searchRediectkey:'')?>">
							</form>
					  </div>

					 <div class="model-footer">
						<h4 class="text-center">New to ShaadiChoice.com? </h4>
						<a href="<?=USER_PATH?>register.php" class="text-center" id="sign_popup"><h5>Sign Up Free</h5></a>
					 </div>

					</div>
				  </div>
				</div>
				
				<!---first popup--->
						
					</div><!-- /.navbar-collapse -->	
		  		</div>
		  	</div>
		  </div><!-- /.container-fluid -->
		</nav>
       

<!--  end navbar -->