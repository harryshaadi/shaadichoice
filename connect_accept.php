<?php
include_once('scpanel/web-config.php');
include_once('scpanel/functions/common.php');
include_once('scpanel/classes/class.DBQuery.php');
include_once('functions/common.php');
$db = new DBQuery();
$accepted_to=$_POST['accepted_to'];
$accepted_from=$_POST['accepted_from'];

if(!empty($accepted_to)) {
	
	if(!empty($accepted_to)){
		 
		$toDetail = $db->getRecord(0,array('fname,mname,lname,email'),'tbl_profiles',array('profile_code' => $accepted_to));
		//print_r($toDetail);
		$tofname = $toDetail[0]['fname'];
		$tomname = $toDetail[0]['mname'];
		$tolname = $toDetail[0]['lname'];
		$toemail = $toDetail[0]['email'];
		
		$fromDetail = $db->getRecord(0,array('fname,mname,lname,email'),'tbl_profiles',array('profile_code' => $accepted_from));
		
		//print_r($fromDetail);
		$fromfname = $fromDetail[0]['fname'];
		$frommname = $fromDetail[0]['mname'];
		$fromlname = $fromDetail[0]['lname'];
		$fromemail = $fromDetail[0]['email'];
		
		$arrRes['arrDbFields']['connect_from'] = $accepted_from;
		$arrRes['arrDbFields']['connect_to'] = $accepted_to;
		$arrRes['arrDbFields']['connect_date'] = date('Y-m-d');
		$arrRes['arrDbFields']['connect_status'] = 'P';
		//exit;
		$msgSubmitted = $db->addRecord(0, $arrRes['arrDbFields'], 'tbl_connect_request');
		//echo $msgSubmitted;exit;
		if($msgSubmitted >0)
		{	
			$created_on = date('Y-m-d H:i:s');
			//$data_accepted_from = array("from_code"=>$accepted_from,"to_code"=>$accepted_to,"notification_message"=>'Hi'.$tofname.'<br/> I want connect with you.',"notification_type"=>"profile update notification","read_status"=>"N","admin_read_status"=>"N","created_on"=>$created_on);
			
			$data_accepted_to = array("from_code"=>$accepted_from,"to_code"=>$accepted_to,"notification_message"=>'Hi '.$tofname.',<br/> '.$fromfname.' wants to connect with you.',"notification_type"=>"profile update notification","read_status"=>"N","admin_read_status"=>"N","created_on"=>$created_on);
			
			//addNotification($data_accepted_from,'tbl_notifications');		
			addNotification($data_accepted_to,'tbl_notifications');
			
			//echo $chatmessage;exit;
			$message ="Hi".$tofname." ".$tomname." ".$tolname.",<br/> ".$fromfname." ".$fromlname." sent you an invitation want to connect with you.<br/>";
			//$message.= $chatmessage;
			//echo $message;	
			
			$data =array('fname' => $tofname." ".$tomname." ".$tolname, 'message' => $message);
				
			//$body = file_get_contents("newsletter/message-template.php");
			$body='';
			$body='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Welcome to Shaadi Choice</title>
	<style type="text/css">

@media screen and (max-width: 600px) {
    table[class="container"] {
        width: 95% !important;
    }
}

	#outlook a {padding:0;}
		body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
		.ExternalClass {width:100%;}
		.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}
		#backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
		img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;}
		a img {border:none;}
		.image_fix {display:block;}
		p {margin: 1em 0;}
		h1, h2, h3, h4, h5, h6 {color: black !important;}

		h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: blue !important;}

		h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {
			color: red !important; 
		 }

		h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
			color: purple !important; 
		}

		table td {border-collapse: collapse;}

		table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }

		a {color: #000;}

		@media only screen and (max-device-width: 480px) {

			a[href^="tel"], a[href^="sms"] {
						text-decoration: none;
						color: black; /* or whatever your want */
						pointer-events: none;
						cursor: default;
					}

			.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
						text-decoration: default;
						color: orange !important; /* or whatever your want */
						pointer-events: auto;
						cursor: default;
					}
		}


		@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
			a[href^="tel"], a[href^="sms"] {
						text-decoration: none;
						color: blue; /* or whatever your want */
						pointer-events: none;
						cursor: default;
					}

			.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
						text-decoration: default;
						color: orange !important;
						pointer-events: auto;
						cursor: default;
					}
		}

		@media only screen and (-webkit-min-device-pixel-ratio: 2) {
			/* Put your iPhone 4g styles in here */
		}

		@media only screen and (-webkit-device-pixel-ratio:.75){
			/* Put CSS for low density (ldpi) Android layouts in here */
		}
		@media only screen and (-webkit-device-pixel-ratio:1){
			/* Put CSS for medium density (mdpi) Android layouts in here */
		}
		@media only screen and (-webkit-device-pixel-ratio:1.5){
			/* Put CSS for high density (hdpi) Android layouts in here */
		}
		/* end Android targeting */
		h2{
			color:#181818;
			font-family:Helvetica, Arial, sans-serif;
			font-size:22px;
			line-height: 22px;
			font-weight: normal;
		}
		a.link1{

		}
		a.link2{
			color:#fff;
			text-decoration:none;
			font-family:Helvetica, Arial, sans-serif;
			font-size:16px;
			color:#fff;border-radius:4px;
		}
		p{
			color:#555;
			font-family:Helvetica, Arial, sans-serif;
			font-size:14px;
			line-height:160%;
		}
	</style>

<script type="colorScheme" class="swatch active">
  {
    "name":"Default",
    "bgBody":"ffffff",
    "link":"fff",
    "color":"555555",
    "bgItem":"ffffff",
    "title":"181818"
  }
</script>

</head>
<body>
	<!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
	<table cellpadding="0" width="100%" cellspacing="0" border="0" id="backgroundTable" class="bgBody" >
	<tr>
		<td>
	<table cellpadding="0" width="620" class="container" align="center" cellspacing="0" border="0">
	<tr>
		<td>
		<!-- Tables are the most common way to format your email consistently. Set your table widths inside cells and in most cases reset cellpadding, cellspacing, and border to zero. Use nested tables as a way to space effectively in your message. -->
		

		<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container" style="border:1px solid #ccc; padding: 20px;">
			<tr>
				<td class="movableContentContainer bgItem">

					<div class="movableContent">
						<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
							<tr >
								<td width="200">&nbsp;</td>
								<td width="200">&nbsp;</td>
								<td width="200">&nbsp;</td>
							</tr>
							<tr>
								<td width="200" valign="top">&nbsp;</td>
								<td width="200" valign="top" align="center">
									<div class="contentEditableContainer contentImageEditable">
					                	<div class="contentEditable" align="center">
					                  		<img src="http://shaadichoice.com/newsletter/images/logo.png"   alt="Logo"  data-default="placeholder" />
					                	</div>
					              	</div>
								</td>
								<td width="200" valign="top">&nbsp;</td>
							</tr>
							<tr height="5" style="border-bottom: 2px solid #cf0404;;">
								<td width="200">&nbsp;</td>
								<td width="200">&nbsp;</td>
								<td width="200">&nbsp;</td>
							</tr>
						</table>
					</div>

					<div class="movableContent">
						<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">

							<div class="contentEditableContainer contentTextEditable">
								<div class="contentEditable" align="left" style="padding-left: 10px; padding-right: 10px;"  >
									<h3>Hello! "'.$tofname.'",</h3>
									<p>"'.$message.'"<p>
								</div>
							</div>
									



						</table>
					
						<div class="contentEditableContainer contentTextEditable">
								<div class="contentEditable" align="left" style="padding-left: 10px; padding-right: 10px;"  >
									<h4>Thank You</h4>
									<p>Shaadi Choice Team</p>
								</div>
							</div>
					</div>


					<div class="movableContent">
						<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
							<tr>
								<td width="100%" colspan="2" style="padding-top:10px;">
									<hr style="height:1px;border:none;color:#333;background-color:#ddd; margin-bottom: 0px;" />
								</td>
							</tr>
							<tr style="background: #ccc;">
								<td width="60%" height="70" valign="middle" style="padding-bottom:20px;">
									<div class="contentEditableContainer contentTextEditable">
					                	<div class="contentEditable" align="center">
					                  		<span style="font-size:13px;color:#181818;font-family:Helvetica, Arial, sans-serif;    line-height: 20px;">ShaadiChoice.com is committed to protecting your privacy and the confidentiality of your personal information.To ensure your privacy, do not share your personal information (e.g., credit card information, address, phone number, account email or password , etc.) with anyone.</span>
					                	</div>
					              	</div>
								</td>

							</tr>
						</table>
					</div>


				</td>
			</tr>
		</table>

		
		

	</td></tr></table>
	
		</td>
	</tr>
	</table>
	

</body>
</html>';
			/*
			foreach($data as $key => $value)
			{
				$body = str_replace('{ '.$key.' }', $value, $body);
			}
			*/
			$to = $toemail;
			$from = $fromemail;		
			$fromName = $fromfname." ".$frommname." ".$fromlname;
			
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers.= "Content-type: text/html; charset=iso-8859-1\n";
			$headers.= "From: $fromName <$from>" . "\n"; 
			
			//$msent = mail($to,'Shaadi Choice - New Message',$chatmessage,$headers);
			//$msent = mail($to,'Shaadi Choice - New Message',$body,$headers);
			$msent = mail($to,'Shaadi Choice - New Message','SDFSDFSFSDFDSF');
			//echo $body;
			//echo "<br/>"; 
			//echo $msent;
			if($msent){
			echo 1;	
			}else{
			echo 0;	
			} 
			//echo $msg= "Message sent successfully";
			
		}	
	} 
} 
?>