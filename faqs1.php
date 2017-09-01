<?php
include_once('scpanel/web-config.php');
include_once('scpanel/functions/common.php');
include_once('scpanel/classes/class.DBQuery.php');
include_once('functions/common.php');
$db = new DBQuery();
$faqInfoArr = $db->getRecord(0, array('*'), 'tbl_faq', '', '', '', 'faq_id_pk', 'ASC');


?>
<!doctype>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/php; charset=utf-8" /> 
<meta charset="utf-8">
<!---Tittle--->
<title>FAQ - HELPS - Shaadichoice.com</title>

<meta name="Keywords" content="faq, helps, shaadichoice.com" />

<meta name="Description" content="FAQ (Frequently Asked Questions) helps to know about profile registration, payment process, privacy, contact details, login details and memberships plan." />
<!---Bootstrap CSS--->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<!---Custom CSS--->
<link href="css/custom.css" rel="stylesheet" type="text/css" />
<!---Responsive CSS--->
<link href="css/responsive.css" rel="stylesheet" type="text/css" />
<!---Fontawesome--->
<link rel="stylesheet" href="css/font-awesome.min.css">
<!---Fevicon--->
<link href="img/fev.png" rel="icon" type="image/png" />
<!---Font-->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
</head>
<body>

	 <nav class="navbar navbar-default menu" role="navigation">
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
					  <a class="navbar-brand navbar-brand-logo" href="index.php" style="padding-top: 3px; height: 55px;">
						<img src="img/logo.png" class="img-responsive">
					  </a>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						  <ul class="nav navbar-nav	navbar-nav1 navbar-right">
							<li>
								<a href="index.php" class="text-center">
									<i style="color: #b63233;" class="fa fa-arrow-left" aria-hidden="true"></i>
									<p style="color: #b63233;">Back To Shaadi Choice</p>
								</a>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->	
		  		</div>
		  	</div>
		  </div><!-- /.container-fluid -->
		</nav>

<!--  end navbar -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1 faqs">
				<div class="row">
					<div class="panel panel-body privacy">
						<h2>FAQs</h2>
					</div>
					
					<div class="panel-group">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" href="#collapse1">How to register?</a>
							</h4>
						  </div>
						  <div id="collapse1" class="panel-collapse collapse">
							<div class="panel-body">You can choose to register as a free member or as a paid member during the registration process.   Fill out the basic information including your partner preference details. Click on submit your information, your profile will be automatically created and we will send you an email containing your user ID for future references and login purposes.</div>
						  </div>
						</div>
					</div>
					
					<div class="panel-group">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" href="#collapse2">How long does it take for my profile to get approved?</a>
							</h4>
						  </div>
						  <div id="collapse2" class="panel-collapse collapse">
							<div class="panel-body">All profiles are processed in the order they were received. The process involves approval of photos and profiles which takes time. Hence we urge you to please be patient with us. It usually happens in 24 hours timeframe, but this might take up to 48 hours in case there is a high volume of submissions on the site. In case your profile or photos are taking longer than the stipulated time, we request you to please visit your Account Profile and ensure that every section is 100% complete.   NOTE: To check the completeness of any section, look for a green check mark next to it.</div>
						  </div>
						</div>
					</div>
					
					<div class="panel-group">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" href="#collapse3">How does Mobile Number Verification works?</a>
							</h4>
						  </div>
						  <div id="collapse3" class="panel-collapse collapse">
							<div class="panel-body">As part of added security enhancements to Shaadi Choice, It's mandatory to verify phone number verification for all accounts. The verification process is done free of cost.</div>
						  </div>
						</div>
					</div>
					
					<div class="panel-group">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" href="#collapse4">How can I search for a member by username?</a>
							</h4>
						  </div>
						  <div id="collapse4" class="panel-collapse collapse">
							<div class="panel-body">Click “Search” option. In the top menu, you will see ‘Enter Keywords’ option. After you enter the username in this text box, click the red Search button. You’ll be able to reach user’s profile.</div>
						  </div>
						</div>
					</div>
					
					<div class="panel-group">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" href="#collapse5">How do I restore my deactivated account?</a>
							</h4>
						  </div>
						  <div id="collapse5" class="panel-collapse collapse">
							<div class="panel-body">It’s simple. You just have to log into your deactivated account to reactivate it. You will then receive a reactivation email in your inbox. Once you click on the activation link provided in the email, your account will be restored automatically.</div>
						  </div>
						</div>
					</div>
					
					<div class="panel-group">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" href="#collapse6">Where can I find ‘My Favorites’ and information on those who have ‘favorited’ or viewed my profile?</a>
							</h4>
						  </div>
						  <div id="collapse6" class="panel-collapse collapse">
							<div class="panel-body">Look for “Activity” at the top of the site. In this ‘Activity’ section, you can see all the information about who viewed your profile, who has favorited your profile, My Favorites, Accepted members, Ignored members and Members who wants to connect with you.</div>
						  </div>
						</div>
					</div>
					
					<div class="panel-group">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" href="#collapse7">How do I block someone that is rude or harassing me?</a>
							</h4>
						  </div>
						  <div id="collapse7" class="panel-collapse collapse">
							<div class="panel-body">Block a Member: Look for the gear icon on your user’s profile. You will find it placed next to the Favorite button. Now click on ‘Block (username)’. Blocking prevents that particular member from communicating with you and blocks the access to view your profile.   IMPORTANT: You are strongly advised to please contact your local law enforcement agency in case you have threat from any user or the user has committed an act of violence or theft. We also recommend reporting the member through their profile or conversation.</div>
						  </div>
						</div>
					</div>
					
					<div class="panel-group">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" href="#collapse8">What's the difference between hiding and blocking another member?</a>
							</h4>
						  </div>
						  <div id="collapse8" class="panel-collapse collapse">
							<div class="panel-body">*Hiding – By hiding your profile will not be visible to anyone in your search, member dashboard, activity, and email notifications.  To hide your profile you can directly visit my profile and select “Hide / Delete Profile”.   *Blocking - Blocking prevents them from viewing your profile as well as sending messages to you. To block a member, you can directly visit there profile and select “Block User”. Alternately, you can go to My Account and view the complete list of blocked members.  </div>
						  </div>
						</div>
					</div>
					
					<div class="panel-group">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" href="#collapse9">Why was my account suspended?</a>
							</h4>
						  </div>
						  <div id="collapse9" class="panel-collapse collapse">
							<div class="panel-body">In case your account has been suspended, it could be due to some suspicious activity on your account. In such a situation, although your profile and photos will be saved, you will not be able to use the site. Simultaneously, other members will not be able to view your profile. Your account will continue to receive messages, but you will not be allowed to access and view them until and unless the suspension has been reviewed and granted by Customer Support. Following are the reasons for account suspension: •   If other members reported against your profile or conduct •   Use of sexually explicit, derogatory, or vulgar language •  If someone asks for money up front or in advance of your date •   If you are spotted as promoting or advertising a business •  Any illegal act of soliciting bank information, passwords, or information related to personal identity, obtaining info from other users and utilizing it for commercial or unlawful purposes •  Any false, misleading, or inaccurate content written on your profile will invoke account suspension •   If you are operating through multiple accounts •  If you are not an adult i.e. above the age of 18, your profile is liable for suspension •   In case of a disputed payment on your credit card statement that appears as Global Wedding Zone</div>
						  </div>
						</div>
					</div>
					
					<div class="panel-group">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" href="#collapse10">How do I delete my account?</a>
							</h4>
						  </div>
						  <div id="collapse10" class="panel-collapse collapse">
							<div class="panel-body">You would need to visit our website for account deletion. Follow these instructions to deactivate your account: • Login to your account using user id and password • Click on your username/thumbnail at the top right corner of the page • Click on the drop-down menu and select Manage Account  • On the bottom of the Manage Your Profile, click the link “Hide / Delete Profile” • Choose appropriate option NOTE: Mmemberships are non-refundable. In case of permanent deletion of your account, you would not be able to avail any unused time left on your Platinumaccount. ** In case you are using our mobile app, deactivation of your account can be done through the app.  Following the above given instructions:</div>
						  </div>
						</div>
					</div>
					
					<div class="panel-group">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" href="#collapse11">What are the payment options for ShaadiChoice.com</a>
							</h4>
						  </div>
						  <div id="collapse11" class="panel-collapse collapse">
							<div class="panel-body">We accepts the following payment options: Visa, MasterCards, American Express, Debit Card, PayPal & Paytm</div>
						  </div>
						</div>
					</div>
					
					<div class="panel-group">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" href="#collapse12">What should I do when my payment is not being processed?</a>
							</h4>
						  </div>
						  <div id="collapse12" class="panel-collapse collapse">
							<div class="panel-body">Firstly, verify your credit/debit card information like card number, expiration date, and CVV code for its correctness. If the information is correct, then you are advised to wait for 15 minutes and try making payment again. If the transaction is still declined, then you should first contact your card issuer and ask them to permit your next attempt to go through successfully.</div>
						  </div>
						</div>
					</div>
					
					<div class="panel-group">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" href="#collapse13">Do you offer refunds on memberships?</a>
							</h4>
						  </div>
						  <div id="collapse13" class="panel-collapse collapse">
							<div class="panel-body">We suggest that you please contact us directly for more information at support@shaadichoice.com</div>
						  </div>
						</div>
					</div>
					
					<div class="panel-group">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" href="#collapse14">What are the benefits of the Diamond Membership offered by you?</a>
							</h4>
						  </div>
						  <div id="collapse14" class="panel-collapse collapse">
							<div class="panel-body">The Diamond Membership is automatically offered to those who fulfill certain criteria on our website. The ‘Diamond Membership’ benefits include:         •  Up to 100X more responses Show up first on Connect with me •  Your profile is prominently featured on Brides & Grooms diamond members •  Your profile stands out across all the site in all searches •  All Platinum membership benefits are included</div>
						  </div>
						</div>
					</div>
					  
					

						
				</div>
			</div>	
		</div>
	</div>
</section>





<!--- Start footer--->
<?php 
	include('footer-basic.php');
?> 
<!---End footer--->


</body>


