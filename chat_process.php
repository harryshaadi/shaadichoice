<?php //print_r($_SESSION); ?>
<div class="chat_box">
	<div class="chat_header">
    	Online Members<i class="fa fa-plus-circle pull-right" aria-hidden="true"></i>
    </div>
<div class="tab_content">	
    <div class="tab-content">
		<div id="menu" class="tab-pane fade in active">
			<div class="chat_body">
				<?php
					$profileCode = $_SESSION['userDetail']['profile_code'];
					$selectedCols = "m.request_to as to_id";
					$tbls = "`tbl_match_request` as `m` ";
					$where =''; 
					$where.=" m.request_to<>'".$profileCode."' AND m.request_from='".$profileCode."' AND m.request_status='A' ";
					$ChatUSersList = $db->getRecord(0, $selectedCols, $tbls, $where, '', '', "", '');
					//print_r($ChatUSersList);
					//echo count($ChatUSersList);
					//echo "<hr>";
					//echo "data<hr>";
					//exit;
					function getUserDtl($profileCode){
						global $db;
						$selectedCols1 = "p.fname,p.mname,p.lname, ROUND((DATEDIFF(CURDATE(), pd.birth_date) / 365.25)) age, m.address_one,m.address_two,m.city_id_fk,m.state_id_fk,m.country_id_fk";
						$tbls1 = "`tbl_profiles` as p,`tbl_profile_detail` as pd,`tbl_member_contact_info` as m ";
						$where1 ='';
						$where1.=" p.profile_code=pd.profile_code_fk AND p.profile_code=m.profile_code AND p.profile_code='".$profileCode."' ";
						$getUserDtlList = $db->getRecord(0, $selectedCols1, $tbls1, $where1, '', '', "", '');
						return $getUserDtlList;
						//print_r($getUserDtlList);
					}
					
					function getUserDtlOnlineStatus($profileCode){
						global $db;
						$selectedCols1 = "login_status";
						$tbls1 = "`tbl_login_session` ";
						$where1 ='';
						$where1.=" profile_code='".$profileCode."' ";
						$getUserDtlList = $db->getRecord(0, $selectedCols1, $tbls1, $where1, '', '', "", '');
						return $getUserDtlList;
					}
					
					function getUserPic($profileCode){
						global $db;						
						$profilePicArr = $db->getRecord(0, array('image','image_code'), ' tbl_profile_images', array('profile_code' => $profileCode, 'approved' => 'Y', 'default_image' => 'Y'));
						  $count = count($profilePicArr);
						  $profilePic='';
						  if($count > 0)
							  return $profilePic = USER_PATH."uploads/profile_pic/".$profilePicArr[0]['image'];
						  else
							  return $profilePic = USER_PATH."img/default-profile.jpg";
					}
					
					function getCity($city_id){
						global $db;						
						$cityArr = $db->getRecord(0, array('city_name','status'), ' tbl_cities', array('city_id_pk' => $city_id));
						  $count = count($cityArr);
						  $city_name='';
						  if($count > 0)
							  return $city_name = $cityArr[0]['city_name'];
						  else
							  return $city_name = "Delhi";
					}
					
					function getState($state_id){
						global $db;						
						$cityArr = $db->getRecord(0, array('tbl_states','status'), ' tbl_states', array('state_id_pk' => $state_id));
						  $count = count($cityArr);
						  $city_name='';
						  if($count > 0)
							  return $city_name = $cityArr[0]['state_name'];
						  else
							  return $city_name = "Delhi";
					}
					
					function getCountry($country_id){
						global $db;						
						$cityArr = $db->getRecord(0, array('country_name','status'), ' tbl_countries', array('country_id_pk' => $country_id));
						  $count = count($cityArr);
						  $city_name='';
						  if($count > 0)
							  return $city_name = $cityArr[0]['country_name'];
						  else
							  return $city_name = "India";
					}
					
					function getConversationID($user_to_id){
						global $db;			
						$user_two = trim($user_to_id);
						$where ='';
						$where.=" profile_code='".$user_two."' AND profile_code<>'".$_SESSION['userDetail']['profile_code']."' ";
						$prof = $db->getRecord(0, array('profile_code'), 'tbl_profiles', $where);
						//print_r($prof);
						$q = count($prof);	
						//valid $user_two
						if($q==1){
							//echo "I am getting problem in getting msg<br/>";
							//$user_two = trim($_GET['id']);
							$where ='';
							//$where.=" profile_code='".$user_two."' AND profile_code<>'".$_SESSION['userDetail']['profile_code']."' ";
							$where.=" (user_one='".$_SESSION['userDetail']['profile_code']."' AND user_two='$user_two') OR (user_one='$user_two' AND user_two='".$_SESSION['userDetail']['profile_code']."') ";
							$conversation = $db->getRecord(0, array('*'), 'tbl_conversation', $where);
							$conver = count($conversation);
							//print_r($conversation);
							
							if($conver>0){
								//echo 'test';
								return $conversation_id = $conversation[0]['id'];
								//getUserChatDtl($conversation_id);
								
							}else{
								//echo'non test';
								$arrProfileDetailsFields = array('user_one'=>$_SESSION['userDetail']['profile_code'],'user_two'=>$user_two);
								return $conversation_id = $db->addRecord(0, $arrProfileDetailsFields, 'tbl_conversation');
								//getUserChatDtl($conversation_id);
							}
						}else{
							die("Invalid ID.");
							//echo '0';
						}
					}
					
					$blockedUser = $db->getRecord(0, array('blocked_user'), 'tbl_blocked_users', array('blocked_by' => $profileCode));        
					$countBlockedUser = count($blockedUser);
										
					
					$selectedCols1 = "COUNT(m.request_to) AS totalusers";
					$tbls1 = "`tbl_match_request` as `m` ";
					$where1 ='';
					$where1.=" m.request_status = 'A' AND m.request_from = '".$profileCode."' AND m.request_to IN (SELECT profile_code from tbl_login_session WHERE login_status='Y' AND profile_code <> '".$profileCode."') ";
				
					$ChatUSersList1 = $db->getRecord(0, $selectedCols1, $tbls1, $where1, '', '', "", '');
					//print_r($ChatUSersList1);
					$tot_logedin_usrs = $ChatUSersList1;
					$tot_logedin_usr = count($ChatUSersList1); 
					//print_r($ChatUSersList);
					$i=0;
					//print_r($ChatUSersList);
					$tot_matched = count($ChatUSersList);
					if($tot_matched>0){
					foreach($ChatUSersList as $cul){
					//print_r($cul); 
					//echo $cul['to_id']."<br>";
					//echo $cul['login_status']; 
					$data = getUserDtl($cul['to_id']); 
					$getUserDtlOnlineStatus = getUserDtlOnlineStatus($cul['to_id']); 
					//echo $getUserDtlOnlineStatus[0]['login_status'];
					//echo $data[0]['fname'];
					//exit;
					if($data[0]['fname']){ $fname = $data[0]['fname'] .' '; }else{ $fname = "Dummy User"; }
					if($data[0]['mname']){ $mname = $data[0]['mname'] .' '; }else{ $mname = $data[0]['mname']; }
					if($data[0]['lname']){ $lname = $data[0]['lname'] .' '; }else{ $lname = $data[0]['lname']; }
					$username = $fname.$mname.$lname;
					if($data[0]['age']){ $age = $data[0]['age']; }else{ $age = "1"; }
					if($data[0]['address_one']){ $address_one = $data[0]['address_one'] .' '; }else{ $address_one = "n/a"; }
					if($data[0]['address_two']){ $address_two = $data[0]['address_two'] .' '; }else{ $address_two = "n/a"; }
					if($data[0]['city_id_fk']){ $city_id = $data[0]['city_id_fk'] .' '; }else{ $city_id = "1"; }
					if($data[0]['state_id_fk']){ $state_id = $data[0]['state_id_fk'] .' '; }else{ $state_id = "1"; }
					if($data[0]['country_id_fk']){ $country_id = $data[0]['country_id_fk'] .' '; }else{ $country_id = "1"; }
					$fulladdress = $address_one.$address_two;
					$profilePic = getUserPic($cul['to_id']);
					$city_name = getCity($city_id);
					$state_name = getState($state_id);
					$country_name = getCountry($country_id);
					$conv_id = getConversationID($cul['to_id']);
					?>
				<div class="user">
					<a data-target='<?=$cul['to_id']?>' onClick="register_popup('<?=$cul['to_id']?>','<?=$conv_id?>','<?=$i?>', '<?=$username?>', '<?=$profilePic?>','<?=$age?>', '<?=$city_name?>', '<?=$state_name?>', '<?=$country_name?>');" onmouseenter="ShowUserDtl(<?=$i;?>);" id="btnPopover<?=$i;?>" data-content="<img src='<?=$profilePic?>' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5><?=$username?></h5> <h6><?=$age?>, <?=$city_name?>, <?=$state_name?>, <?=$country_name?></h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover"><?=$username?><span class="pull-right" <?php if($getUserDtlOnlineStatus[0]['login_status']=='Y'){ }else {?>style="color:#ccc;"<?php } ?>><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				<?php //print_r($blockedUser); ?>
				</div>
				
					<?php  $i++; }}   ?>
			</div>
		</div>
   		
   		<div id="menu2" class="tab-pane fade in">
			<div class="chat_body">
				
				<div class="user1">
					
					<a href="#" id="btnPopover_<?=$i;?>" data-content="<img src='img/partner/1.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>ARPIT</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">
						<div class="row">
							<div class="col-sm-2"><img src="<?=$profilePic?>" width="30" height="30" class="img-circle"></div>
							<div class="col-sm-10"> <b><?=$username?></b>  has sent you an Invitation to Connect <br><i>12 May</i> <button type="button" class="btn btn-danger btn-small">Accept</button> <button type="button" class="btn btn-danger btn-small">Cancel</button></div>
						</div>
					</a>
					
				</div>
				<?php //$i++; } ?>
				
				<div class="user1">
					<a href="#" id="btnPopover_2" data-content="<img src='img/partner/2.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Aditi Sharma</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">
						<div class="row">
							<div class="col-sm-2"><img src="img/partner/2.jpg" width="30" height="30" class="img-circle"></div>
							<div class="col-sm-10"><b> Aditi Sharma</b> has sent you an Invitation to Conne <br><i>13 May</i> <button type="button" class="btn btn-danger btn-small">Accept</button> <button type="button" class="btn btn-danger btn-small">Cancel</button></div>
						</div>
				  </a>
				</div>

				
			</div>
		</div>
   		 <ul class="nav nav-tabs chat">
		 <?php ?>
			<li class="active">
				<a data-toggle="tab" class="col-sm-12" href="#menu">Online (<?php echo $tot_logedin_usrs[0]['totalusers'];?>)</a>
			</li>
			<li>
				<a data-toggle="tab" class="col-sm-12" href="#menu2"><i class="fa fa-bell-o" aria-hidden="true"></i> Alerts </a>
		   </li>
		</ul>
		<ul class="nav nav-tabs chat">
			<form>
				<div class="form-group">
                <div class="input-group input-group-sm">
                    <div class="icon-addon addon-sm">
                        <input type="text" placeholder="Search" class="form-control form-control1">
                    </div>
					<span class="input-group-btn">
                        <button class="btn btn-default" id="addClass" type="button"><i class="fa fa-envelope-o" aria-hidden="true"></i></button>
                    </span>
					<div class="popup-box chat-popup" id="qnimate">
					  <div class="popup-head">
						<div class="popup-head-left pull-left">New Message :</div>
						<div class="popup-head-right pull-right">
							<button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
						</div>
					  </div>
						<div class="popup-messages">
							<div class="row">
								<div class="col-sm-12">
									<form action="" method="POST">
										<!--<div class="form-group">
											<select class="combobox  form-control" name="normal" style="-webkit-appearance: none; appearance: none; margin-bottom: 12px; display:block; text-align:left;">
												  <option value="" selected="selected">Email</option>
												  <option value="AL">Alabama</option>
												  <option value="AK">Alaska</option>
												  <option value="AZ">Arizona</option>
												  <option value="AR">Arkansas</option>
											</select>	  
										</div>-->
										<div id="chatformshow" style="display:block;">
											<div class="frmSearch form-group">
												<input type="text" id="search-box" name="email" class="form-control" autocomplete="off" placeholder="Name" value="" style="-webkit-appearance: none; appearance: none; margin-bottom: 12px; display:block; text-align:left;"/>
												<input type="hidden" id="to_email" name="to_email" class="form-control" autocomplete="off" placeholder="Email" value="" style="-webkit-appearance: none; appearance: none; margin-bottom: 12px; display:block; text-align:left;"/>
												<input type="hidden" id="to_profile_code" name="to_profile_code" class="form-control" autocomplete="off" placeholder="Profile Code" value="" style="-webkit-appearance: none; appearance: none; margin-bottom: 12px; display:block; text-align:left;"/>
												<div id="suggesstion-box"></div>
											</div>
											<div class="form-group">
												<textarea class="form-control" type="textarea" id="message" placeholder="Message" rows="5" style="margin-bottom: 12px;"></textarea>                   
											</div>
											<div class="form-group">
												<input type="button" name="SendChatMessage" id="SendChatMessage" class="btn btn-danger pull-right" value="Send Message">                  
											</div>
										</div>
										
										<div class="alert alert-success" id="chatsentsucc" style="display:none;">
											Your message sent Successfully.
										</div>
									</form>
								</div>
							</div>
							
						</div>
					 </div>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" data-toggle="popover" data-placement="top" data-html="true"  data-content="<a href='#' style='color:#333;    font-size: 12px;'>Turn Of Chats</a>"><i class="fa fa-cog" aria-hidden="true"></i></button>
                    </span>
                </div>
            </div>
			</form>	
		</ul>
    </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript"> 
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "readName.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(images/LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});
//To select country name
function selectName(val) {
	$("#search-box").val(val);
	$("#suggesstion-box").hide();
}
function selectEmail(val) {	
	$("#to_email").val(val);
}
function selectToprofilecode(val) {	
	$("#to_profile_code").val(val);
}

$(document).ready(function(){
	$("#SendChatMessage").click(function(){
		var chatname = $('#search-box').val();
		var chatto_email = $('#to_email').val();
		var chatto_profile_code = $('#to_profile_code').val();
		var chatfrom_profile_code = '<?=$_SESSION['userDetail']['profile_code']?>';
		var chatmessage = $('#message').val();
		//alert('chat mail='+chatto_email+'chatmessage='+chatmessage+'chat name='+chatname+'dd='+chatto_profile_code+'aa='+chatfrom_profile_code);
		//return false;
		$.ajax({
		type: "POST",
		url: "sendEmailMessage.php",	
		data: {'chatname': chatname, 'chatto_email': chatto_email, 'chatto_profile_code': chatto_profile_code, 'chatfrom_profile_code': chatfrom_profile_code, 'chatmessage': chatmessage},
		beforeSend: function(){
			//$("#chatsentsucc").css("background","#FFF url(images/LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			//alert(data);
			if(data ==1) {//$("#chatsentsucc").html(data);
			$("#chatsentsucc").show();			
			$("#chatsentsucc").css("display","block");			
			$("#chatformshow").hide();			
			$("#chatformshow").css("display","none");
			$("#qnimate").removeClass("popup-box-on");
			
			
			}else{
			//$("#chatsentsucc").hide();
			//$("#chatsentsucc").css("display","none");	
			}
		}
		});
	});
});

</script>
