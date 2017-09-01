<?php 
	include('header.php');

if(isset($_POST['email']) && $_POST['email'] !='')
{
session_start();
	if($_POST['captcha'] == $_SESSION['digit']){
$to= 'info@logixwebs.com';


    $subject = 'Shaadichoice Wedding- Registration Request -'.date('ymd');

// MESSAGE

$registration = '
<div style="width:620px;margin:auto;color:#FFFFFF;background:#784a32;font-size:14px;font-weight:bold;padding:7px 0px 7px 15px;">Matrimony Services- www.shaadichoice.com</div>
<div style="width:608px;margin:auto;height:auto;font-size:11px;padding:7px 10px 7px 15px;border:solid #7E0109 1px ;">
<B>Quick Enquiry Details are as follows:</B><br/><br/>
<B>Full Name :</B> '.$_POST['fname'].' <br/><br/>
<B>Email :</B> '.$_POST['email'].' <br/><br/>
<B>Mobile :</B> '.$_POST['mobile'].' <br/><br/>
<B>Subject :</B> '.$_POST['subject'].' <br/><br/>
<B>Message :</B> '.$_POST['message'].'  <br/><br/>
<B>Ip Address :</B> '.$_SERVER['REMOTE_ADDR'].' <br/><br/>
<br>
</div>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'From:  '.$_REQUEST['fname'].' <'.$_REQUEST['email'].'>'. "\r\n";
$headers .= 'Bcc:  rupali@logixwebs.com'. "\r\n";
//$headers .= 'Cc:  admin@logixwebs.com'. "\r\n";
// Mail it
 $mail1 = mail($to, $subject, $registration, $headers);
	
/*MAIL END HERE*/

if($mail1){
		$jai = "<a style='color:green'>Your registraion has been completed. Pending for verification.</a>";
		}else{
		$jai = "<a style='color:green'>Error occured ! Please try again.</a>";
		}
	} else {
		
		 $jai = "<a style='color:green'>Sorry, the CAPTCHA code entered was incorrect!</a>";
	}
}

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

<section class="content">
	<div class="container">
		<div class="row">
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
				<form id="contact" method="post" class="form" role="form">
					<div class="row">
						<div class="col-xs-6 col-md-6 form-group">
							<input class="form-control" id="fname" name="fname" placeholder="Name" type="text" required autofocus />
						</div>
						<div class="col-xs-6 col-md-6 form-group">
							<input class="form-control" id="email" name="email" placeholder="Email" type="email" required />
						</div>
						<div class="col-xs-6 col-md-6 form-group">
							<input class="form-control" id="subject" name="subject" placeholder="Subject" type="text" required />
						</div>
						<div class="col-xs-6 col-md-6 form-group">
							<input class="form-control" id="mobile" name="mobile" placeholder="Mobile No" type="text" required />
						</div>
					</div>
					<textarea class="form-control" id="message" name="message" placeholder="Message" rows="5"></textarea>
					<br />
						<div class="col-xs-6 col-md-6 form-group">
				<p><img src="/captcha.php" width="120" height="30" border="1" alt="CAPTCHA"></p>
				<p style="width:224px;"><input type="text" size="6" maxlength="5" name="captcha" value=""><br>
				<small style="color:red;">copy the digits from the image into this box</small></p>
				
			</div>
			<br />
					<div class="row">
					<div class="col-xs-12 col-md-12 form-group">
						<button class="btn btn-danger pull-right" type="submit">Submit</button>
					</div>	
				</form>
			</div>
			
		</div>
</section>
	
<!---Section--->

<?php 
	include('footer.php');
?> 

<script>
$(document.body).on('hide.bs.modal', function () {
    $('body').css('padding-right','0');
});
$(document.body).on('hidden.bs.modal', function () {
    $('body').css('padding-right','0');
	
});
</script>
