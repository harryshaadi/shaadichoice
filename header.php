<?php
include_once('scpanel/web-config.php');
include_once('scpanel/functions/common.php');
include_once('scpanel/classes/class.DBQuery.php');
//include_once('head.php');
####################CHECK USER AUTHENTICATION####################
$db = new DBQuery();
if (!empty($_SESSION['userDetail']['email']))
{
	include_once('scpanel/classes/class.DBQuery.php');
	//$db = new DBQuery();
	if ($db->getRecordCount(0,'tbl_profiles', array('email' => $_SESSION['userDetail']['email'], 'profile_status' => 'A'))) header('Location: dashboard.php');
	//unset($db);
}
#####################CHECK USER AUTHENTICATION#####################
//$registerVldParm = "email:email:Email~chkPassword:password:Password  of minimum 6 characters~dropDown:create_for:whose profile is being created.";
$formVldParm = "email:loginemail:Email~chkPassword:loginpassword:Password  of minimum 6 characters";
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<!---Tittle--->
<?php
if(isset($_REQUEST['id'])){
	$Title = explode("-",$_REQUEST['id']);
	$countTitle = count($Title);
	$TitleDesc = '';
	if($countTitle >1)
	{
		for($i = 0;$i<($countTitle-1);$i++)
		{
			$TitleDesc .= " ".$Title[$i];
		}
		$TitleDesc = substr($TitleDesc,1);
	}
	else
	{
		$TitleDesc = $Title['0'];
	}
?>
<title><?=ucwords($TitleDesc)?> Matrimony, <?=ucwords($TitleDesc)?> Matrimonial Site, <?=ucwords($TitleDesc)?> Marriage, Brides, Grooms</title>

<meta name="Keywords" content="<?=ucwords($TitleDesc)?> Matrimony, <?=ucwords($TitleDesc)?> Matrimonial Site, <?=ucwords($TitleDesc)?> Marriage, Brides, Grooms" />

<meta name="Description" content="<?=ucwords($TitleDesc)?> Matrimony, Find perfect match grooms and brides of the <?=ucwords($TitleDesc)?> community. Register your profile FREE!"/>


<?php } else { ?>
<title>Matrimony, Matrimonial Site, Wedding Vendors, Marriage, Match Making</title>

<meta name="Keywords" content="matrimony,  matrimonial site, wedding vendors, marriage, match making" />

<meta name="Description" content="Shaadichoice.com – is a global, most trusted and successful matrimonial site to find perfect match grooms, beautiful brides and wedding vendors. Register Your Profile FREE!" />
<?php }

$actual_link = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

if($actual_link == 'shaadichoice.com/index.php' || $actual_link == 'http://www.shaadichoice.com/index.php'){
 ?>
<link rel="canonical" href="http://www.shaadichoice.com">  
<?php } else { ?>
<link rel="canonical" href="http://www.<?=$actual_link?>"> 
<?php } ?>
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
<!---Bootstrap JS--->
<script src="<?=USER_PATH?>js/main.js"></script>
<!---Bootstrap JS--->
<script src="<?=USER_PATH?>js/bootstrap.min.js"></script>
<script src="<?=USER_PATH?>js/common.js"></script>

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
<?php 
//print_r($db);
$reviewDetails = $db->getRecord(0, array('*'), 'tbl_reviews'); 
	$countReviews = count($reviewDetails);
?>

<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		</div>
		<div class="modal-body">
		<?php if($countReviews > 0){
		foreach($reviewDetails as $rKey => $rVal){ 
			$reviewUserDetail = $db->getRecord(0, array('fname','lname'), 'tbl_profiles', array('profile_code' => $rVal['profile_code'])); 
			$userProfileImage = $db->getRecord(0, array('image'), 'tbl_profile_images', array('profile_code' => $rVal['profile_code'], 'default_image' => 'Y'));
			if($userProfileImage[0]['image'] != '')
				$profileImage = USER_PATH.'uploads/profile_pic/thumb/'.$userProfileImage[0]['image'];
			else
				$profileImage = USER_PATH.'img/default_profile.jpg';
		?>
		  <div class="media">
			<a class="pull-left" href="#">
				<img class="media-object img-circle" src="<?=$profileImage?>" width="80" height="80">
			 </a>
			 <h4 class="media-heading"><?=ucwords($reviewUserDetail[0]['fname'].' '.$reviewUserDetail[0]['lname'])?></h4>
			 <ul class="list-inline list-unstyled">
				<li>
				<?php if($rVal['rating'] != 0){ 
						for($i = 0; $i < $rVal['rating']; $i++){ ?>
							<span class="glyphicon glyphicon-star"></span>
				<?php } } else { ?>
							<span class="glyphicon glyphicon-star-empty"></span>
							<span class="glyphicon glyphicon-star-empty"></span>
							<span class="glyphicon glyphicon-star-empty"></span>
							<span class="glyphicon glyphicon-star-empty"></span>
						<?php } ?>
				</li>
				<li>|</li>
				<li><span><i class="glyphicon glyphicon-calendar"></i> <?=timeAgo(strtotime($rVal['modified_on']))?></span></li>
			</ul>
		    <p><?=limitText(ucwords($rVal['description']),50)?></p>
		</div>
		<?php } } ?>
		<h5><a href="<?=USER_PATH?>review.php">See All </a></h5>
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
            <a href="<?=USER_PATH?>" class="navbar-brand"><img src="<?=USER_PATH?>img/logo.png" class="img-responsive"></a>
		</div>
        <div class="collapse navbar-collapse" id="collapse">
        	<div class="nav1">
                <ul class="nav navbar-nav">
                    <li><a href="<?=USER_PATH?>howitworks.php">Learn More</a></li>
                    <li><a href="<?=USER_PATH?>aboutus.php">About Us</a></li>
					 <li><a href="<?=USER_PATH?>blog.php" class="text-center">Our Blog</a></li>
                    <li><a href="<?=USER_PATH?>contact.php">Contact Us</a></li>
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
				<li><a href="<?=USER_PATH?>vendor/vendor-login.php" style="color: #333;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Vendor Login</a></li>
				<li><a href="#" style="color: #333; cursor: none;">|</a></li>
				<li><a data-toggle="modal" data-target="#myModl">Login</a></li>				
				<li><a  href="<?=USER_PATH?>register.php" style="color: #fff;">Join</a></li>
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
							<form method="POST" name="userLogin" id="userLogin" action="<?=USER_PATH?>user-controller.php">
							<span class="errorcls" id="err_msg"></span>
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
								<button type="submit" class="btn btn-danger btn-block" onClick="return validation('userLogin', '<?=$formVldParm?>');">Login</button>
								<input type="hidden" name="postAction" id="postAction" value="checkUserLoginDetail"/>
							</form>
					  </div>
					 
					 <div class="model-footer">
						<h4 class="text-center">New to ShaadiChoice.com? </h4>
						<a href="<?=USER_PATH.''?>register.php" class="text-center" id="sign_popup"><h5>Sign Up Free</h5></a>
						<a href="#" class="text-center"><img src="<?=USER_PATH?>img/google-ply.png"></a>
						<a href="#" class="text-center"><img src="<?=USER_PATH?>img/iphone-pay.png"></a>
					 </div>

					</div>
				  </div>
				</div>
				
				<!---first popup--->
				
				
				
			</ul>
        </div>
	</div>	
</nav>

<!---End navigation--->
<script>
<?php if(isset($_GET['go'])){ ?>
	$('#myModl').modal('show');
	<?php 
	$_SESSION['go'] = $_GET['go']; 
	?>
<?php } ?>
</script>