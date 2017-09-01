<!--- Start footer--->
<?php if(isset($_GET['id']))
	$code = $_GET['id'];
else $code = '';
//print $code;
?>
<footer>
	<div class="container">
    	<div class="row">
        	<div class="col-lg-4 col-sm-12 col-xs-12">  
                <p class="other-service">WEDDING SERVICES </p>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            	<form>
					<div class="form-group">
						 
					</div>
           		</form>
            </div>
            
            <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                <ul class="social">
                	<li class="fb"><a href="https://www.facebook.com/ShaadiChoice/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li class="tw"><a href="https://twitter.com/ShaadiChoice" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li class="lin"><a href="https://www.linkedin.com/company/ShaadiChoice.com" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <li class="tb"><a href="https://shaadichoice.tumblr.com/" target="_blank"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
                    <li class="google-plus"><a href="https://plus.google.com/u/0/101436973909434599842" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                    <li class="youtube"><a href="https://www.youtube.com/channel/UCO2bKvYKUslNP-xspXagw7w" target="_blank"><i class="fa fa-youtube"></i></a></li>
                </ul>
            </div>
            <div class="col-sm-12" style="clear: both;">
            	<p class="other_service">WEDDING SERVICES <i class="fa fa-sort-desc" aria-hidden="true"></i> </p>
            	<ul class="list">
                	<li><a href="vendor/vendor-category.php">Wedding Planners</a></li>
                    <li><a href="vendor/vendor-category.php">Banquet Halls</a></li>
                    <li><a href="vendor/vendor-category.php">Caterers</a></li>
					<li><a href="vendor/vendor-category.php">Wedding Designer</a></li>
					<li><a href="vendor/vendor-category.php">Photographers</a></li>
					<li><a href="vendor/vendor-category.php">Videographers</a></li>
					<li><a href="vendor/vendor-category.php">Wedding Dress & Apparel</a></li>
               		<li><a href="vendor/vendor-category.php">Musicians</a></li>
               		<li><a href="vendor/vendor-category.php">Florists</a></li>
               		<li><a href="vendor/vendor-category.php">Custom Invites</a></li>
               		<li><a href="vendor/vendor-category.php">Cake / Desserts</a></li>
					<li><a href="vendor/vendor-category.php">DJS</a></li>
               		<li><a href="vendor/vendor-category.php">Horse & Carriage</a></li>
					<li><a href="vendor/vendor-category.php">Lighting</a></li>
					<li><a href="vendor/vendor-category.php">Mehndi Henna</a></li>
					<li><a href="vendor/vendor-category.php">Jewelry</a></li>
               		<li><a href="vendor/vendor-category.php">Make-Up / Hair</a></li>
					<li><a href="vendor/vendor-category.php">Transportations</a></li>
					<li><a href="vendor/vendor-category.php">Tailor</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
    	<div class="row">
    		<div class="col-sm-12 text-justify">
    			<?php
			$desc='';			
			if($code !='')
			{
				
				$newComm='';
					$community = explode('-',$code);
					$count = count($community);
					if(count($count) > 0)
					{
						for($i =0; $i<($count-1); $i++)
						{
							$newComm .=" ".$community[$i];
						}
						$newComm = substr($newComm,1);
					}
					else
					{
						$newComm = $community[0];
					}
					
					$newComm1 = ucwords($newComm); $tbl ='';  $fldname='';
					$findDesc = $db->getRecordCount(0, 'tbl_religions', array('religion_name' =>$newComm1));
					if($findDesc > 0)
					{
						$tbl = 'tbl_religions';
						$fldname = 'religion_name';
					}
					else 
					{
						$community = $db->getRecordCount(0, 'tbl_community', array('community_name' =>$newComm1));
						if($community > 0)
						{
							$tbl = 'tbl_community';
							$fldname = 'community_name';
						}
						else
						{
							$lang = $db->getRecordCount(0, 'tbl_mother_tongue', array('mother_tongue' =>$newComm1));
							if($lang > 0)
							{
								$tbl = 'tbl_mother_tongue';
								$fldname = 'mother_tongue';
							}
						}
					}
					
					$desc = $db->getRecord(0, array('description'), $tbl, array($fldname =>$newComm1));
				if($desc !='')
					print_r($desc[0]['description']);
				else { print 'No description found.';}
			}
			else{
				print "<p>Shaadi Choice may be your most trusted brand that your friends and family likes. Our network is global with bases in North America, our services are convenient, simple and easy to follow. Our compatibility analysis and matching interests qualities creates harmony in finding your ideal life partner for happy marriage. Shaadi Choice is your real choice for community, beliefs, qualified matrimonial connections.</p>";
			}
			?>
    		</div>
    		<div class="col-sm-12 col-xs-12">
				<ul class="list">
					<li><a href="privacy.php">Privacy</a></li>
                    <li><a href="terms.php">Terms & Conditions</a></li>
                    <li><a href="faqs.php">FAQ</a></li>
                    <li><a href="javascript:void(0)">Site Map</a></li>
					
				</ul>
			</div>
			<div class="col-sm-12 col-xs-12">
				<p style="display: inline-block;">Shaadi Choice ® and the Shaadi Choice Design are registered trade-marks of Shaadi Choice Corporation, Inc.</p>
				&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" class="pull-right"><img src="<?=USER_PATH?>img/google-ply.png"></a>
				<a href="javascript:void(0)" class="pull-right"><img src="<?=USER_PATH?>img/iphone-pay.png"></a>
			</div>
			<div class="col-ms-12">
				
			</div>
    	</div>
    </div>
    <div class="footer-bottom">
    	<div class="container">
    		<div class="row partner-logo">
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://hinduwedding.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/hindu-wedding.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://muslimwedding.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/muslim-wedding.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://islamicwedding.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/islamic-wedding.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://sikhwedding.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/sikh-wedding.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://punjabiwedding.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/punjabi-wedding.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://teluguwedding.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/telgu-wedding.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://tamilwedding.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/tamil-wedding.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://fijiwedding.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/fiji-wedding.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://gujaratiwedding.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/gujarati-wedding.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="javascript:void(0)"><img src="<?=USER_PATH?>img/11.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://garhwaliwedding.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/garhwali-wedding.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://kannadawedding.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/kannada-wedding.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://malayalamwedding.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/malayalam-wedding.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://nepalweddings.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/nepal-wedding.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://sindhiwedding.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/sindhi-wedding.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://kumauniwedding.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/kumauni-wedding.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="javascript:void(0)"><img src="<?=USER_PATH?>img/17.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://arabwedding.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/arab-wedding.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://jainwedding.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/jain-wedding.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://marwadiwedding.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/marwadi-wedding.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://nriwedding.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/nri-wedding.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="javascript:void(0)"><img src="<?=USER_PATH?>img/8.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://marriagematrimony.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/marriage-matrimony.png"></a></div>
			   <div class="col-lg-2 col-sm-6 col-xs-6"><a href="http://fijimatrimonials.com/" target="_blank"><img src="<?=USER_PATH?>img/satellites/fiji-matrimonial.png"></a></div>
			  </div>
    	</div>
    </div>
</footer>
<!---End footer--->

<!---Main JS--->
<script src="<?=USER_PATH?>js/main.js"></script>
<!---Bootstrap JS--->
<script src="<?=USER_PATH?>js/bootstrap.min.js"></script>
<script src="<?=USER_PATH?>js/common.js"></script>
<script>
	$('ul.nav li.dropdown').hover(function() {
	  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
	}, function() {
	  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
	});

setTimeout(function ()
{
	 $('#userMessage').hide();
}, 10000);



</script>

</body>
