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

					<div class="panel-group" id="accordion">
					<?php $count = count($faqInfoArr);
							if($count > 0)
							{
							for($i = 0; $i < $count; $i++)
							{ 
							
						?>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?=$i?>"><?=$faqInfoArr[$i]['question']?></a>
								</h4>
							</div>
							<div id="collapseOne<?=$i?>" class="panel-collapse collapse in">
								<div class="panel-body">
									<?=$faqInfoArr[$i]['answer']?> 
								</div>
							</div>
						</div>
						<script type="text/javascript">
	$(function() {
		$('#collapseOne<?=$i?>').accordion({ multiOpen: false });

		$('#collapseTen').accordion();

		$('#collapseEleven').accordion();
	});
</script>
						<?php } }?>
						
						
						
						
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

<!---Main JS--->
<script src="js/main.js"></script>
<!---Bootstrap JS--->
<script src="js/bootstrap.min.js"></script>
</body>


