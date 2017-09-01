<?php 
	include('head.php');
	if(isset($_GET['id']))
	{
		$code = $_GET['id'];
		$query ="tbl_profiles.user_code,tbl_profiles.fname,tbl_profiles.lname,ROUND((DATEDIFF(CURDATE(), tbl_profile_detail.birth_date) / 365.25)) age,tbl_profiles.maritial_status,tbl_profiles.gender,tbl_profiles.show_hide_profile,tbl_profile_detail.rashi,tbl_profile_detail.nakshtra,tbl_profile_detail.gotra_code,tbl_profile_detail.more_detail,tbl_profile_detail.looking_for,tbl_religions.religion_name,tbl_community.community_name,tbl_cities.city_name,tbl_education_career.profession_area,tbl_education_career.education_code,tbl_countries.country_name,tbl_profile_images.image,tbl_profiles.created_on from tbl_profiles LEFT JOIN tbl_profile_detail ON tbl_profile_detail.profile_code_fk = tbl_profiles.profile_code LEFT JOIN tbl_member_contact_info ON tbl_member_contact_info.profile_code = tbl_profiles.profile_code LEFT JOIN tbl_community ON tbl_community.community_code = tbl_profiles.community_code LEFT JOIN tbl_cities ON tbl_cities.city_id_pk = tbl_member_contact_info.city_id_fk LEFT JOIN tbl_education_career ON tbl_education_career.profile_code = tbl_profiles.profile_code LEFT JOIN tbl_profile_images ON tbl_profile_images.profile_code = tbl_profiles.profile_code AND tbl_profile_images.default_image ='Y' LEFT JOIN tbl_religions ON tbl_religions.religion_code = tbl_profiles.religion_code LEFT JOIN tbl_countries ON tbl_countries.country_id_pk = tbl_member_contact_info.country_id_fk";
		$whr = "tbl_profiles.profile_status = 'A' AND tbl_profiles.profile_code = '$code'";
		$profileDetailArr = $db->getRecord(0, $query, '', $whr, '', '', 'tbl_profiles.fname', 'ASC');
		
	}
	
	$viewedThis = viewedProfile($code);
	
	$checkForFavorite = $db->getRecordCount(0, 'tbl_match_request', array('request_from' => $_SESSION['userDetail']['profile_code'], 'request_to' => $code)); 
?> 
<link href="<?=USER_PATH?>/css/bootslider.css" rel="stylesheet" type="text/css">
<!--  end navbar -->
<section>
	<div class="container">
	<?php  if($profileDetailArr[0]['image'] != NULL)
			{
				$profilePic = USER_PATH."uploads/profile_pic/".$profileDetailArr[0]['image'];
			}
			else if($profileDetailArr[0]['gender'] == 'M') $profilePic = USER_PATH."/img/male-default.png";
			else $profilePic = USER_PATH."/img/female-default.png";
			
			$userImages = $db->getRecord(0,array('image'),'tbl_profile_images', array('profile_code' => $code, 'approved' => 'Y', 'visibility_status' => 'A'));
	?>
		<div class="row">
			<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 self profile-column profile-img1">
				<div class="row">
					<div class="col-sm-12">
						<a href="#" data-toggle="modal" data-target="#myModal" data-local="#myCarousel"><img src="<?=$profilePic?>" class="user_image"></a>
						<?php $countImage = count($userImages); ?>
						  <!-- Wrapper for slides -->
						  <div class="modal fade modal-fullscreen force-fullscreen" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-lg">
								 <div class="modal-content">
									   <div class="modal-header">
										  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										  <h4 class="modal-title"><img src="<?=USER_PATH?>img/logo.png" style="height: 49px; width:149px;"></h4>
									   </div>
									   <div class="modal-body">
										   <div id="myCarousel" class="carousel slide carousel-fit" data-ride="carousel">
											<div class="carousel-inner">
												<div class="item active">
												  <img src="<?=USER_PATH.'uploads/profile_pic/'.$userImages[0]['image']?>" style="height: 400px; width: 400px;">
												</div>
												<?php for($i =1; $i<$countImage; $i++){ ?>
												<div class="item">
												  <img src="<?=USER_PATH.'uploads/profile_pic/'.$userImages[$i]['image']?>" style="height: 400px; width: 400px;">
												</div>
												<?php } ?>
											</div>
										   </div>
										   <div class="">
											<a class="left carousel-control" href="#myCarousel" data-slide="prev">
												<span class="fa fa-arrow-left"></span>
											</a>
											<a class="right carousel-control" href="#myCarousel" data-slide="next">
												<span class="fa fa-arrow-right"></span>
											</a>
									   </div>
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal --> 
						<div class="user_details">
							<h6><?=ucwords($profileDetailArr[0]['fname'].' '.$profileDetailArr[0]['lname'])?></h6>
							<h5><?=$profileDetailArr[0]['user_code']?></h5>
						</div>
					</div>
					
					<div class="col-sm-12 text-left">
						<br>
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-xs-12">
										<h4>Want to Marry Me?</h4>
									</div>
									<div class="col-lg-12 col-sm-12  col-xs-12">
										<form>
											<button type="button" class="btn btn-danger">Yes</button>
											<button type="button" class="btn btn-default" style="background-color:#ccc;">May Be</button>
											<button type="button" class="btn btn-default">No</button>
											
										</form>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
					<div class="col-sm-12 text-left">
						<br>
						<div class="panel panel-default">
							<div class="panel-heading">
								Member Status
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-9 col-sm-9 col-xs-8">
										This member is varified by Shaadi Choice.
									</div>
									<div class="col-lg-3 col-sm-3  col-xs-4">
										<img src="<?=USER_PATH?>img/verified.png" class="img-responsive">
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<?php 
					$gndr = $_SESSION['userDetail']['gender'];
					$whereClause = "a.profile_status = 'A' AND a.profile_code <> '$code' AND a.gender <> '$gndr'";
					$blockedUser = $db->getRecord(0, array('blocked_user'), 'tbl_blocked_users', array('blocked_by' => $code));
					$blockstr = '';
					$countBlockedUser = count($blockedUser);
						if($countBlockedUser > 0)
						{
							for($i =0; $i<$countBlockedUser; $i++)
							{
								$blockstr .= "'".$blockedUser[$i]['blocked_user']."',";
							}
							$blockstr = substr($blockstr,0,-1);
							$whereClause .= " AND a.profile_code NOT IN($blockstr)";
						}
						$tbls = "tbl_profiles a LEFT JOIN tbl_profile_detail c ON(a.profile_code = c.profile_code_fk)
							LEFT JOIN tbl_education_career d ON (a.profile_code = d.profile_code)
							LEFT JOIN tbl_member_contact_info e ON(a.profile_code = e.profile_code)
							LEFT JOIN tbl_community g ON(a.community_code = g.community_code)
							LEFT JOIN tbl_memberships i ON(a.membership_code = i.membership_code)
							LEFT JOIN tbl_cities h ON(h.city_id_pk = e.city_id_fk)
							LEFT JOIN tbl_religions m ON(a.religion_code = m.religion_code)
							LEFT JOIN tbl_mother_tongue n ON(a.mother_tongue_code = a.mother_tongue_code)
							LEFT JOIN tbl_countries o ON(e.country_id_fk = o.country_id_pk)";
						$selectedCols = "a.profile_code,a.fname,a.gender,a.lname,c.height,c.more_detail,d.working_as,m.religion_name,n.mother_tongue,o.country_name,g.community_name,h.city_name, ROUND((DATEDIFF(CURDATE(), c.birth_date) / 365.25)) mage";
						$whereClausenm = " $whereClause GROUP BY a.profile_code";
						$usePrtnrPrefArr = $db->getRecord(0, $selectedCols, $tbls, $whereClausenm, '', '', "a.created_on", 'DESC');
					?>
					<div class="col-sm-12 text-left">
						<div class="panel panel-default">
							<div class="panel-heading">
								New Profile
							</div>
							<div class="panel-body panel-body-scroll" >
							<?php 
							if(is_array($usePrtnrPrefArr))
							{ 
								$countNew = count($usePrtnrPrefArr);
								if($countNew > 10) $countNew = 10;
								for ($i = 0; $i < $countNew; $i++)
								{
									
									$profileCode = $usePrtnrPrefArr[$i]['profile_code'];
									$height = $ARR_HEIGHT[$usePrtnrPrefArr[$i]['height']];
									$height= explode('-',$height);
									$height = $height[0];
									if($usePrtnrPrefArr[$i]['show_hide_profile'] != 'H'){
							?>
								<div class="row invite invite_1">
									<div class="col-lg-5 col-sm-12 col-xs-12">
									<?php 
									$userprofileImage = $db->getRecord(0, array('image'), 'tbl_profile_images', array('profile_code' => $profileCode, 'default_image' => 'Y'));
										$count = count($userprofileImage);
										  $userPic='';
										  if($count > 0)
											  $userPic = USER_PATH."uploads/profile_pic/".$userprofileImage[0]['image'];
										 
											  else{
											  if($useMatchedArr[$i]['gender'] == 'M')
												$userPic = USER_PATH."img/male-default.png.jpg";
												else
												$userPic = USER_PATH."img/female-default.png";
										  }
										?>
										<a href="<?=USER_PATH?>profile-details/<?=$profileCode?>"><img src="<?=$userPic?>" class="img-responsive img-thumbnail img-circle" style="height:70px; width:70px"></a>
									</div>
									<div class="col-lg-7 col-sm-12 col-xs-12">
										<a href="<?=USER_PATH?>profile-details/<?=$profileCode?>/0/pp/l"><h1><?=ucwords($usePrtnrPrefArr[$i]['fname']." ".$usePrtnrPrefArr[$i]['lname'])?></h1></a>
										<div class="inv-detail"><?=$usePrtnrPrefArr[$i]['mage'].', '.$height.', '. $usePrtnrPrefArr[$i]['religion_name'].', '.$usePrtnrPrefArr[$i]['community_name'].', '.$usePrtnrPrefArr[$i]['mother_tongue'].', '.$usePrtnrPrefArr[$i]['working_as'].', '.$usePrtnrPrefArr[$i]['city_name'].', '.$usePrtnrPrefArr[$i]['country_name']?></div>
									</div>
								</div>
							<?php } } } ?>
								
							</div>
						</div>
					</div>
					
					<div class="col-sm-12 text-left">
						<div class="panel panel-default">
						<?php
						$matchedForCode = $_SESSION['userDetail']['profile_code'];						
						$gndr1 = $_SESSION['userDetail']['gender'];
						$whereClause = "a.profile_status = 'A' AND a.profile_code <> '$matchedForCode' AND a.gender <> '$gndr1'";
						$blockedUser = $db->getRecord(0, array('blocked_user'), 'tbl_blocked_users', array('blocked_by' => $matchedForCode));
						$blockstr ='';
						$countBlockedUser = count($blockedUser);
						if($countBlockedUser > 0)
						{
							for($i =0; $i<$countBlockedUser; $i++)
							{
								@$blockstr .= "'".$blockedUser[$i]['blocked_user']."',";
							}
							$blockstr = substr($blockstr,0,-1);
							$whereClause .= " AND a.profile_code NOT IN($blockstr)";
						}
						
						$usePrtnrPrefArr = $db->getRecord(0, array('*'), 'tbl_partner_preference', array('profile_code_fk' => $matchedForCode)); 
						$heightRange = '';
									$ageRange = " AND ((DATEDIFF(CURDATE(), c.birth_date) / 365.25) >= ".$usePrtnrPrefArr[0]['age_from']." AND (DATEDIFF(CURDATE(), c.birth_date) / 365.25) <= ".$usePrtnrPrefArr[0]['age_to'].")";
									$heightRange = " AND( (c.height >= ".$usePrtnrPrefArr[0]['height_from']." AND c.height <= ".$usePrtnrPrefArr[0]['height_to'].")";									
									$whereClause .= " $ageRange $heightRange OR a.maritial_status = '".$usePrtnrPrefArr[0]['martial_status']."' OR a.religion_code = '".$usePrtnrPrefArr[0]['religion']."' OR a.community_code = '".$usePrtnrPrefArr[0]['community']."'";									
									
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['hobbies'], 'p.hobbies'); 
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['interests'], 'p.interests'); 
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['music'], 'p.music');
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['user_reads'], 'p.user_reads');
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['movies'], 'p.movies');
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['sports'], 'p.sports ');
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['languages'], 'p.languages');
									$whereClause .= ')';
									
									$tbls = "tbl_profiles a JOIN tbl_profile_detail c ON(a.profile_code = c.profile_code_fk)
									JOIN tbl_education_career d ON (a.profile_code = d.profile_code)
									JOIN tbl_member_contact_info e ON(a.profile_code = e.profile_code)
									JOIN tbl_community g ON(a.community_code = g.community_code)
									JOIN tbl_memberships i ON(a.membership_code = i.membership_code)
									JOIN tbl_cities h ON(h.city_id_pk = e.city_id_fk)
									JOIN tbl_religions m ON(a.religion_code = m.religion_code)
									JOIN tbl_mother_tongue n ON(a.mother_tongue_code = a.mother_tongue_code)
									JOIN tbl_countries o ON(e.country_id_fk = o.country_id_pk)
									JOIN tbl_user_hobby p ON(p.profile_code = a.profile_code)";			
						$selectedCols = "a.profile_code,a.fname,a.lname,a.gender,a.show_hide_profile,c.height,c.more_detail,d.working_as,m.religion_name,n.mother_tongue,o.country_name,g.community_name,h.city_name, ROUND((DATEDIFF(CURDATE(), c.birth_date) / 365.25)) mage";
						$whereClausenm = " $whereClause GROUP BY a.profile_code";
						$useMatchedArr = $db->getRecord(0, $selectedCols, $tbls, $whereClausenm, '', '', "a.created_on", 'DESC');
						?>
							<div class="panel-heading">
								Matches Profile
							</div>
							<div class="panel-body panel-body-scroll">
							<?php 
							if(is_array($useMatchedArr))
							{ 
								$countMatched = count($useMatchedArr);
								if($countMatched > 10){ $countMatched=10; }
								for ($i = 0; $i < $countMatched; $i++)
								{
									$profileCode = $useMatchedArr[$i]['profile_code'];
									$height = $ARR_HEIGHT[$useMatchedArr[$i]['height']];
									$height= explode('-',$height);
									$height = $height[0];
									if($useMatchedArr[$i]['show_hide_profile'] != 'H')
									{
							?>
								<div class="row invite invite_1">
									<div class="col-lg-5 col-sm-12 col-xs-12">
									<?php 
									$userprofileImage = $db->getRecord(0, array('image'), 'tbl_profile_images', array('profile_code' => $profileCode, 'default_image' => 'Y'));
										$count = count($userprofileImage);
										  $userPic='';
										  if($count > 0)
											  $userPic = USER_PATH."uploads/profile_pic/".$userprofileImage[0]['image'];
										  else{
											  if($useMatchedArr[$i]['gender'] == 'M')
												$userPic = USER_PATH."img/male-default.png.jpg";
												else
												$userPic = USER_PATH."img/female-default.png";
										  }
										?>
										<a href="<?=USER_PATH?>profile-details/<?=$profileCode?>"><img src="<?=$userPic?>" class="img-responsive img-thumbnail img-circle" style="height:80px; width:80px"></a>
									</div>
									<div class="col-lg-7 col-sm-12 col-xs-12">
										<a href="<?=USER_PATH?>profile-details/<?=$profileCode?>/0/pp/l"><h1><?=ucwords($useMatchedArr[$i]['fname']." ".$useMatchedArr[$i]['lname'])?></h1></a>
										<div class="inv-detail"><?=$useMatchedArr[$i]['mage'].', '.$height.', '. $useMatchedArr[$i]['religion_name'].', '.$useMatchedArr[$i]['community_name'].', '.$useMatchedArr[$i]['mother_tongue'].', '.$useMatchedArr[$i]['working_as'].', '.$useMatchedArr[$i]['city_name'].', '.$useMatchedArr[$i]['country_name']?></div>
									</div>
								</div>
							<?php } } } ?>
							</div>
						</div>
					</div>
					
					
				</div>
				
			</div>
			
			<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
			
			<?php $msg ='';
				if(isset($_GET['resp'])) {
				$class= "style='diaplay:block'";
				$response = $_GET['resp']; 
				if($response == 'Y')
				{
				if($db->updateRecord(0,array('request_status' => 'A'),'tbl_match_request',array('request_to' => $_SESSION['userDetail']['profile_code'], 'request_from' => $code )))
					{
						$addNewAlert = $db->addRecord(0, array('alert_type' => 'INVITATION_ACCEPTED', 'alert_from' =>$_SESSION['userDetail']['profile_code'], 'alert_to' =>$code, 'alert_message' => 'Your Invitation Request has been Accepted by '. $_SESSION['userDetail']['user_code'], 'read_status' => 'N' , 'date' => date('Y-m-d')), 'tbl_alerts');
						
						$addrec = $db->addRecord(0, array('request_status' => 'A', 'request_from' =>$_SESSION['userDetail']['profile_code'], 'request_to' =>$code, 'request_date' => date('Y-m-d')), 'tbl_match_request');
						
						if($addNewAlert > 0)
						{
							$msg= 'Invitation Accepted.';
						}
					}
					//print $msg; exit();
				}
				
				else if($response == 'N')
				{
					if($db->updateRecord(0,array('request_status' => 'D'),'tbl_match_request',array('request_to' => $_SESSION['userDetail']['profile_code'], 'request_from' => $code )))
					{
						$addNewAlert = $db->addRecord(0, array('alert_type' => 'INVITATION_DECLINED', 'alert_from' =>$_SESSION['userDetail']['profile_code'], 'alert_to' =>$code, 'alert_message' => 'Your Invitation Request has been Declined by '. $_SESSION['userDetail']['user_code'], 'read_status' => 'N' , 'date' => date('Y-m-d')), 'tbl_alerts');
						if($addNewAlert > 0)
						{
							$msg= 'Invitation Declined.';
						}
						
						$addrec = $db->addRecord(0, array('request_status' => 'D', 'request_to' =>$code, 'request_from' =>$_SESSION['userDetail']['profile_code'], 'request_date' => date('Y-m-d')), 'tbl_match_request');
					}
				}
			?>
			<div class="col-lg-12 col-md-10 col-sm-10 col-xs-10" <?=$class?>>
				<div class="row">
				<div class="tabbable-panel1">
					<div class="para">
						<div class="row">
							<?php $formVldMsgParm = "text:msg_description:Message";?>
							<div style="margin-left:20px">
							<p><span class="prof_username" title="<?=$profileDetailArr[0]['fname'].' '.$profileDetailArr[0]['lname']?>"><?=$profileDetailArr[0]['fname'].' '.$profileDetailArr[0]['lname']?>&nbsp;</span><span class="">(<?=$profileDetailArr[0]['user_code']?> )</span></p>
							</div>
							<div style="clear:both"></div>
							<div style="margin-left:20px; margin-top:10px">
							<?=$msg?>	
							</div>
						</div>
					</div>		
				</div>
					
				</div>
				</div>
				<?php } ?>
				<div class="tabbable-panel1"> 
					<div class="">
						<div class="tab-content">
							<div class="tab-pane active" id="tab_default_1">
								<div class="row"> 
									<div class="col-lg-12 col-md-10 col-sm-10 col-xs-12">
										<div class="row">
											<div class="col-xs-12 col-sm-6 col-lg-6">
												<div class="table-list1">
													<table class="table">
														<tr>
															<td><b>Age</b></td>
															<td><?=($profileDetailArr[0]['age']!=''?$profileDetailArr[0]['age'].' Years':'NA')?></td>
														</tr>
														<tr>
														<?php if($profileDetailArr[0]['religion_name'] == '' && $profileDetailArr[0]['community_name']=='')
																$str = 'NA';
															else if($profileDetailArr[0]['religion_name'] != '' && $profileDetailArr[0]['community_name']=='')
																$str = $profileDetailArr[0]['religion_name'];
															else if($profileDetailArr[0]['religion_name'] == '' && $profileDetailArr[0]['community_name']!='')
																$str = $profileDetailArr[0]['community_name'];
															else
																$str = $profileDetailArr[0]['religion_name'].', '.$profileDetailArr[0]['community_name'];
															?>
															<td><b>Religion</b></td>
															<td><?=ucwords($str)?></td>
														</tr>
														<tr>
															<td><b>Marital Status</b></td>
															<?php 
															$maritialStatus = $profileDetailArr[0]['maritial_status'];
															switch($maritialStatus)
															{
																case  'M' :  $val = 'Married';   break;
																case  'D' :  $val = 'Divorced';   break;
																case  'W' :  $val = 'Widow';   break;
																case  'S' :  $val = 'Saparated';   break;
																case  'U' :  $val = 'Unmarried';   break;
																case  'N' :  $val = 'Never Married';   break;
																default :  $val = 'NA'; //M: Married, U: Unmarried, N: Never M: Married, U: Unmarried, N: Never Married, D: Divorced, W: Widow, S: Saparated
															}
															?>
															<td><?= $val?></td>
														</tr>
														<tr>
															<td><b>Gender</b></td>
															<td><?=($profileDetailArr[0]['gender']!=''?($profileDetailArr[0]['gender']=='M'?'Male':'Female'):'NA')?></td>
														</tr>
														<tr>
														<?php $Education = $db->getRecord(0,array('name'),'tbl_education',array('education_code'=>$profileDetailArr[0]['education_code']));?>
															<td><b>Education</b></td>
															<td><?=($Education[0]['name']!=''?ucwords($Education[0]['name']):'NA')?></td>
														</tr>
														<tr>
															<td><b>Profession</b></td>
															<td><?=($profileDetailArr[0]['profession_area']!=''?ucwords($profileDetailArr[0]['profession_area']):'NA')?></td>
														</tr>
														<tr>
															<td><b>Location</b></td>
															<?php if($profileDetailArr[0]['city_name'] == '' && $profileDetailArr[0]['country_name']=='')
																$str = 'NA';
															else if($profileDetailArr[0]['city_name'] != '' && $profileDetailArr[0]['country_name']=='')
																$str = $profileDetailArr[0]['city_name'];
															else if($profileDetailArr[0]['city_name'] == '' && $profileDetailArr[0]['country_name']!='')
																$str = $profileDetailArr[0]['country_name'];
															else
																$str = $profileDetailArr[0]['city_name'].', '.$profileDetailArr[0]['country_name'];
															?>
															<td><?=ucwords($str)?></td>
														</tr>
														<tr>
															<td><b>Horoscope (Rashi)</b></td>
															<td><?=($profileDetailArr[0]['rashi']!=''?ucwords($profileDetailArr[0]['rashi']):'NA')?></td>
														</tr>
														<tr>
															<td><b>Nakshtra</b></td>
															<td><?=($profileDetailArr[0]['nakshtra']!=''?ucwords($profileDetailArr[0]['nakshtra']):'NA')?></td>
														</tr>
														<tr>
															<td><b>Gotra</b></td>
															<?php $gotraArr = $db->getRecord(0, array('gotra_name'), 'tbl_gotra', array('gotra_code' => $profileDetailArr[0]['gotra_code'])); ?>
															<td><?=($gotraArr[0]['gotra_name']!=''?ucwords($gotraArr[0]['gotra_name']):'NA')?></td>
														</tr>
													</table> 
												</div>
											</div>
											<?php if(!isset($_GET['resp'])) { ?>
											<div class="col-xs-12 col-sm-6 col-lg-6 view-profile">
											<?php 
											$whr = "request_from IN('".$_SESSION['userDetail']['profile_code']."','".$_SESSION['userDetail']['profile_code']."')";
											$alreadySent = $db->getRecordCount(0,'tbl_match_request',$whr);
											if($alreadySent<=0){
											?>
											<!--<form method="POST" action="<?=USER_PATH?>user-controller.php" style="display:inline">
												<button type="submit" data-toggle="modal" data-target="<?=(isset($_SESSION['messageSession'])?'#demo-5':'')?>" class="btn btn-danger button">Invite <?=ucwords($profileDetailArr[0]['fname'])?></button>
												<input type="hidden" name="postAction" value="invitationRequest">	
												<input type="hidden" name="postActionCode" value="<?=$code ?>">
											</form>-->&nbsp;
											<?php } ?>
											<a href="javascript:void(0)" class="btn btn-danger button">Share Photos</a>&nbsp;&nbsp;
											<a href="#message" class="btn btn-danger button page-scroll">Message</a>&nbsp;&nbsp;
												<form action="<?=(($checkForFavorite >0)?'':USER_PATH.'user-controller.php')?>" method="POST" style="display:inline">
													<button type="submit" class="btn btn-setting button click-fav" <?php if($checkForFavorite >0){ ?> onclick = "return removeRequest();"<?php } ?>><i class="fa fa-heart-o" aria-hidden="true"></i> Favorite</button>
													<input type="hidden" name="postAction" value="setProfileAsFavorite">
													<input type="hidden" name="postActionCode" value="<?=$code?>">
												</form>&nbsp;
												<div class="modal fade" id="demo-1" tabindex="-1" role="dialog" aria-hidden="true">
												  <div class="modal-dialog" role="document">
													<div class="modal-content">
													  <div class="modal-body text-center">
															<img src="<?=USER_PATH?>img/like.png">
															<h6 class="modal-title">Congratulation !!</h6>
															<p><?=(isset($_SESSION['favorite'])?$_SESSION['favorite']:'')?></p>
															<a href="<?=USER_PATH?>interest.php" class="btn btn-setting button click-fav">View All Invitations</a>
													  </div>
													</div>
												  </div>
												</div>
												
												<div class="dropdown pull-right">
												  <button class="btn btn-setting dropdown-toggle" type="button" data-toggle="dropdown" data-target="drop"><i class="fa fa-cog" aria-hidden="true"></i></button>
												  <ul class="dropdown-menu drop_down" id="drop">
													<li><a href="" data-toggle="modal" data-target="#demo-3">Report  User</a></li>
													<li><a href="" data-toggle="modal" data-target="#demo-4">Block User</a></li>
												  </ul>
												</div>
												<br><br>
												<?php
													if (!empty($_SESSION['messageSession']))
													{
													?>
													<div class="row">
														<div class="col-lg-8 pull-right">                    
															<ol class="alert alert-danger text-left"><?=@$_SESSION['messageSession'];?></ol>
														</div>
													</div>
													<?php
													unset($_SESSION['messageSession']);
													}
												?>
											</div>
											<?php } ?>
										</div>
									</div>
									<div class="modal fade" id="demo-3" tabindex="-1" role="dialog" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-body text-center report">
												<img src="<?=USER_PATH?>img/clipboard.png">
												<h6 class="modal-title">Welcome</h6>
												<p>Are you sure you want to report this user ?</p>
												<button type="button" class="btn btn-danger"><i class="fa fa-check" aria-hidden="true"></i> Ok</button>
												<button type="button" class="btn btn-setting" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>
										  </div>
										</div>
									  </div>
									</div>
									
									<div class="modal fade" id="demo-6" tabindex="-1" role="dialog" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-body text-center report">
												<img src="<?=USER_PATH?>img/user.png">
												<h6 class="modal-title">Welcome</h6>
												<p>Are you sure to remove invitation request to this user</p>
												<form method="POST" action='<?=USER_PATH?>user-controller.php' style="display:inline">
													<button type="submit" class="btn btn-danger"><i class="fa fa-check" aria-hidden="true"></i> Ok</button>
													<input type="hidden" name="postAction" value="setProfileAsFavorite">
													<input type="hidden" name="postActionCode" value="<?=$code?>">
												</form>
												<button type="button" class="btn btn-setting" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>
										  </div>
										</div>
									  </div>
									</div>
									
									<div class="modal fade" id="demo-4" tabindex="-1" role="dialog" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-body text-center report">
												<img src="<?=USER_PATH?>img/user.png">
												<h6 class="modal-title">Welcome</h6>
												<p>Are you sure you want to block this user ?</p>
												<form method="POST" action='<?=USER_PATH?>user-controller.php' style="display:inline">
													<button type="submit" class="btn btn-danger"><i class="fa fa-check" aria-hidden="true"></i> Ok</button>
													<input type="hidden" name="postAction" value="blockUser">
													<input type="hidden" name="postActionCode" value="<?=$code?>">
												</form>
												<button type="button" class="btn btn-setting" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>
										  </div>
										</div>
									  </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<?php 
					$uploadesImagesArr = $db->getRecord(0,array('image'),'tbl_profile_images',array('profile_code' => $code, 'approved' => 'Y', 'visibility_status' => 'A'));
					$count = count($uploadesImagesArr);
				?>
				<div class="tabbable-panel1">
					<div class="profile-heading">Public Photos</div>
					<hr>
					<div class="para">
						<div class="row text-center">
							<div class="col-sm-12">
								<div class="row gallery">
								<?php if($count > 0) { 
									foreach($uploadesImagesArr as $publicKey => $publicVal)
									{
								?>
									<div class="col-xs-6 col-sm-4 col-lg-2 panel-body">
									<a href="<?=USER_PATH?>uploads/profile_pic/<?=$publicVal['image']?>"><img src="<?=USER_PATH?>uploads/profile_pic/<?=$publicVal['image']?>" class="img-thumbnail" /></a>
									</div>
								<?php } } else {?>
								<div class="col-xs-12 col-sm-12 col-lg-12 panel-body">
									<?=ucwords($profileDetailArr[0]['fname'].' '.$profileDetailArr[0]['lname'])?> have no public photo(s),
								</div>
								<?php } ?>
								</div>
							</div>
						</div>
					</div>		
				</div>
				
				
				<div class="tabbable-panel1">
					<div class="profile-heading">Private Photos</div>
					<?php 
						$uploadesPrivateImagesArr = $db->getRecord(0,array('image'),'tbl_profile_images',array('profile_code' => $code, 'approved' => 'Y', 'visibility_status' => 'P'));
						$countPrivate = count($uploadesPrivateImagesArr);
					?>
					<div class="para">
						<hr>
						<p><?=ucwords($profileDetailArr[0]['fname'].' '.$profileDetailArr[0]['lname'])?> have <?=($countPrivate>0?$countPrivate:'no')?> private photo(s), <?php if($countPrivate>0) { ?><a href="javascript:void(0)">You can send a private photo request</a> to view them. </p> &nbsp;&nbsp;&nbsp;<form name="privatePhoto" id="privatePhoto" action="<?=USER_PATH?>user-controller.php" method="POST" style="display: inline-block;"><button class="btn btn-danger" type="submit" data-toggle="modal" data-target="<?php if(isset($_SESSION['requestSentPopup'])) echo '#demo-2'; ?>">Request to View</button><input type="hidden" name="postAction" value="privatePhotoRequest"><input type="hidden" name="postActionCode" value="<?=$code?>"></form> <?php } ?>
						<?php if(isset($_SESSION['requestSentPopup'])) {?>
						<div class="modal fade" id="demo-2" tabindex="-1" role="dialog" aria-hidden="true">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-body text-center">
									<img src="<?=USER_PATH?>img/email.png">
									<h6 class="modal-title">Congratulations !!</h6>
									<p>Your request has been sent successfully.</p>
							  </div>
							</div>
						  </div>
						</div>
						<?php } ?>
						<div class="row text-center">
							<div class="col-sm-12">
								<div class="row gallery">
									<?php 
									$privatePhotoRequestAccepted = $db->getRecord(0,array('notification_status'),'tbl_notifications',array('from_code' => $_SESSION['userDetail']['profile_code'], 'to_code' => $code, 'notification_type' => 'photo notification'));
									
									if($countPrivate > 0) { 
									foreach($uploadesPrivateImagesArr as $privateKey => $privateVal)
									{
										if($privatePhotoRequestAccepted[0]['notification_status'] != 'A')
										{
									?>
									<div class="col-xs-6 col-sm-4 col-lg-2 panel-body">
										<a href="<?=USER_PATH?>/img/lock_images.jpg"><img src="<?=USER_PATH?>/img/lock_images.jpg" class="img-thumbnail" /></a>
									</div>
									<?php } else { ?>
									<div class="col-xs-6 col-sm-4 col-lg-2 panel-body">
										<a href="<?=USER_PATH?>uploads/profile_pic/<?=$privateVal['image']?>"><img src="<?=USER_PATH?>uploads/profile_pic/<?=$privateVal['image']?>" class="img-thumbnail" /></a>
									</div>
										
									<?php } } }?>
								</div>
							</div>
						</div>	
					</div>
				</div>
				
				<div class="tabbable-panel1">
					<div class="profile-heading">About Me</div>
					<hr>
					<div class="para">
						<p><?=($profileDetailArr[0]['more_detail']!=''?ucfirst($profileDetailArr[0]['more_detail']):'NA')?></p>
					</div>		
				</div>
				
				<div class="tabbable-panel1">
					<div class="profile-heading">What I'm Looking For</div>
					<hr>
					<div class="para">
						<p><?=($profileDetailArr[0]['looking_for']!=''?ucfirst($profileDetailArr[0]['looking_for']):'NA')?></p>
					</div>		
				</div>
				
					
				<div class="tabbable-panel1" id="message">
					<div class="profile-heading">Send a Quick Message</div>
					<div class="para">
						<div class="row">
						<?php $formVldMsgParm = "text:msg_description:Message";?>
							<form method="POST" action="<?=USER_PATH?>user-controller.php" name="userQuickMsg" id = "userQuickMsg" onSubmit="return validation('userQuickMsg', '<?=$formVldMsgParm?>');">
								<div class="col-sm-12">
									<div class="form-group">
										<textarea name="msg_description" required="" id="msg_description" cols="54" rows="5" class="form-control" placeholder="Write Your Message.." value=""></textarea>
										<!--<textarea name="message" id="message"  class="form-control" rows="6"  value=""> </textarea>-->
										 <span class="errorcls" id="span_message"></span>
									</div>
								</div>
								<div class="col-sm-2 pull-right">
									<button type="submit" class="btn btn-danger btn-block">SEND</button>
									<input type ="hidden" name="postAction" value="quickMsg">
									<input type ="hidden" name="postActionCode" value="<?=$code?>">
								</div>
							</form>
						</div>
					</div>		
				</div>
				
				<div class="tabbable-panel1">
					<div class="profile-heading profile-style">Family Details</div>
					<hr>
					<div class="row">
						<div class="col-sm-3">
							<h5> Father Detail :</h5>
						</div>
						<div class="col-sm-2">
							<h5>Businessman</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<h5>Mother Detail :</h5>
						</div>
						<div class="col-sm-2">
							<h5>Teacher</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<h5>No. of Siblings :</h5>
						</div>
						<div class="col-sm-2">
							<h5>1</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<h5>Family Location :</h5>
						</div>
						<div class="col-sm-2">
							<h5>Noida</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<h5>Family Type :</h5>
						</div>
						<div class="col-sm-2">
							<h5>Joint</h5>
						</div>
					</div>
				</div>
				
				<?php 
					$lifestyleArr = $db->getRecord(0,array('diet,drink,smoke'),'tbl_lifestyle',array('profile_code' => $code));
					
					$count = count($lifestyleArr);
				?>
				<div class="tabbable-panel1">
					<div class="profile-heading profile-style">Life Style</div>
					<hr>
					<div class="row">
						<div class="col-sm-3">
							<h5> Drink :</h5>
						</div>
						<div class="col-sm-2">
							<h5><?=($lifestyleArr[0]['drink']=='Y'?'Drink':($lifestyleArr[0]['drink']=='O'?'Ocassionally':'Do Not Drink'))?></h5>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<h5>Smoke :</h5>
						</div>
						<div class="col-sm-2">
							<h5><?=($lifestyleArr[0]['smoke']=='Y'?'Smoke':($lifestyleArr[0]['smoke']=='O'?'Ocassionally':'Do Not Smoke'))?></h5>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<h5>Food Preference :</h5>
						</div>
						<div class="col-sm-2">
							<h5><?=($lifestyleArr[0]['diet']==''?'NA':$lifestyleArr[0]['diet'])?></h5>
						</div>
					</div>
				</div>
					
				<div class="tabbable-panel1">
					<?php 
						$InterestArr = $db->getRecord(0,array('*'),'tbl_user_hobby',array('profile_code' => $code));
						$count = count($InterestArr);
					?>
					<div class="profile-heading profile-style">Interest</div>
					<hr>
					<?php
					 $interest = $InterestArr[0]['sports'].','.$InterestArr[0]['movies'].','.$InterestArr[0]['user_reads'].','.$InterestArr[0]['music'].','.$InterestArr[0]['hobbies'].','.$InterestArr[0]['interests'];
					?>
					<div class="row">
						<?php
							$interestStr = explode(",",$interest);
							
							 $langDataInterest = count($interestStr); 
							 if($langDataInterest > 0){
							foreach($interestStr as $intKey => $intVal){
							?>
								<div class="col-sm-3">
									<h5>
									<?php 
									echo $intVal;
									?>
									</h5>
								</div>
							 <?php } }?>
					</div>
				</div>
				
				<div class="tabbable-panel1">
					<div class="profile-heading profile-style">Spoken Language</div>
					<hr>
					<div class="row">
					<?php
							$str = explode(",",$InterestArr[0]['languages']);
							
							 $langData = count($str);
							 if($langData > 0){
							foreach($str as $strKey => $strVal){
							?>
								<div class="col-sm-3">
									<h5>
									<?php 
									echo $strVal;
									?>
									</h5>
								</div>
							 <?php } }?>
					</div>
				</div>
				
				<?php $yourPicArr = $db->getRecord(0, array('image','image_code'), ' tbl_profile_images', array('profile_code' => $_SESSION['userDetail']['profile_code'], 'approved' => 'Y', 'default_image' => 'Y'));
				  $count = count($yourPicArr);
				  $yourPic='';
				  if($count>0)
					  $yourPic = USER_PATH."uploads/profile_pic/".$yourPicArr[0]['image'];
				  else
					  $yourPic = USER_PATH."img/default-profile.jpg";
				  
				
				 $HerPartnerPrefrence = $db->getRecord(0, array('age_from,age_to,height_from,height_to,tbl_religions.religion_name,mother_tongue, martial_status,tbl_community.community_name,education,p.working_with,p.professional_area,p.annual_income,p.currency,p.hobbies,country_name,smoke,drink,diet,body_type,skin_tone from tbl_partner_preference p LEFT JOIN tbl_education_career ON tbl_education_career.profile_code = p.profile_code_fk LEFT JOIN tbl_mother_tongue ON tbl_mother_tongue.mother_tongue_code = p.mother_tongue_code LEFT JOIN tbl_countries ON tbl_countries.country_id_pk = p.country_living LEFT JOIN tbl_religions ON tbl_religions.religion_code =p.religion LEFT JOIN tbl_community ON tbl_community.community_code = p.community'), '', array('profile_code_fk' => $code));
				 //print_r($HerPartnerPrefrence);
				 echo "<hr>";
				$count = count($HerPartnerPrefrence);
				 $newdata = array();
				 if($count > 0)
				  {
					 foreach($HerPartnerPrefrence[0] as $key => $val)
					  {
						  if($val != '' || $val != 0)
						  {
							 array_push($newdata, $key); 
						  }
					  }
				 }
				 $countPartner = count($newdata);
				 $str = implode(',',$newdata);
				 $tables = "tbl_partner_preference p
				 LEFT JOIN tbl_mother_tongue ON(tbl_mother_tongue.mother_tongue_code = p.mother_tongue_code)
				 LEFT JOIN tbl_countries ON(tbl_countries.country_id_pk = p.country_living)
				 LEFT JOIN tbl_religions ON(tbl_religions.religion_code =p.religion)
				 LEFT JOIN tbl_community ON tbl_community.community_code = p.community"; 
				 $yourPartnerPrefrence = $db->getRecord(0, $str, $tables, array('profile_code_fk' => $_SESSION['userDetail']['profile_code']));
				 $total = count($yourPartnerPrefrence[0]);
				 @$matchedArr = array_intersect_assoc($HerPartnerPrefrence[0],$yourPartnerPrefrence[0]);
				$matched = count($matchedArr);
				
				 ?>
				<div class="tabbable-panel1 compatibility">
					<div class="profile-heading profile-style">CHEMISTRY TEST RESULTS</div>
					<div class="row">
						<div class="col-sm-3 text-center">
							<img src="<?=$profilePic?>" class="img-responsive img-circle img-thumbnail">
							<h4><?=($gndr1 == 'M'?'her':'his')?> Perefrence</h4>
						</div>
						<div class="col-sm-6">	
							<div class="perefrence">
								<div class="match">You Match <?=$matched?>/<?=$countPartner?> of <?=($gndr1 == 'M'?'her':'his')?> Preference <div class="line"></div></div>
								
							</div>
						</div>
						<div class="col-sm-3 text-center">
							<img src="<?=$yourPic?>" class="img-responsive img-circle img-thumbnail">
							<h4>You Match</h4>
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-12">
							<?php if(@array_key_exists('age_from',$matchedArr) && @array_key_exists('age_to',$matchedArr)) { ?>
							<div class="row compatibility-list">
								<div class="col-sm-6">
									<h4 class="profile-heading profile-style">Age</h4>
									<h6><?=$HerPartnerPrefrence[0]['age_from'].' - '.$HerPartnerPrefrence[0]['age_to']?></h6>	
								</div>
								<div class="col-sm-3 pull-right">
								<?php if(@array_key_exists('age_from',$matchedArr) && @array_key_exists('age_to',$matchedArr)) { $class= "fa fa-check-circle-o"; $color= '';} else { $class= "fa fa-times-circle-o"; $color ="#b92a2e";}?>
									<h3 class="pull-right icon" style="color:<?=$color?>"><i class="<?=$class ?>" aria-hidden="true"></i></h3>	
								</div>
							</div> <?php } 
							if(@array_key_exists('height_from',$matchedArr) && @array_key_exists('height_to',$matchedArr)) {
							?>
							<div class="row compatibility-list">
								<div class="col-sm-6">
									<h4 class="profile-heading profile-style">Height</h4>
									<h6><?=$HerPartnerPrefrence[0]['height_from'].' - '.$HerPartnerPrefrence[0]['height_to']?></h6>	
								</div>
								<div class="col-sm-3 pull-right">
								<?php if(@array_key_exists('height_from',$matchedArr) && @array_key_exists('height_to',$matchedArr)) { $class= "fa fa-check-circle-o"; $color= '';} else { $class= "fa fa-times-circle-o"; $color ="#b92a2e";}?>
									<h3 class="pull-right icon" style="color:<?=$color?>"><i class="<?=$class ?>" aria-hidden="true"></i></h3>	
								</div>
							</div>
							<?php } if(@array_key_exists('religion_name',$matchedArr)) {?>
							<div class="row compatibility-list">
								<div class="col-sm-6">
									<h4 class="profile-heading profile-style">Religion</h4>
									<h6><?=$HerPartnerPrefrence[0]['religion_name']?></h6>	
								</div>
								<div class="col-sm-3 pull-right">
								<?php if(@array_key_exists('religion_name',$matchedArr)) { $class= "fa fa-check-circle-o"; $color= '';} else { $class= "fa fa-times-circle-o"; $color ="#b92a2e";}?>
									<h3 class="pull-right icon" style="color:<?=$color?>"><i class="<?=$class ?>" aria-hidden="true"></i></h3>	
								</div>
							</div>
							<?php } if(@array_key_exists('mother_tongue',$matchedArr)) {?>
							<div class="row compatibility-list">
								<div class="col-sm-6">
									<h4 class="profile-heading profile-style">Mother Tongue</h4>
									<h6><?=$HerPartnerPrefrence[0]['mother_tongue']?></h6>	
								</div>
								<div class="col-sm-3 pull-right">
								<?php if(@array_key_exists('mother_tongue',$matchedArr)) { $class= "fa fa-check-circle-o"; $color= '';} else { $class= "fa fa-times-circle-o"; $color ="#b92a2e";}?>
									<h3 class="pull-right icon" style="color:<?=$color?>"><i class="<?=$class ?>" aria-hidden="true"></i></h3>	
								</div>
							</div>
							<?php } if(@array_key_exists('martial_status',$matchedArr)) {?>
							<div class="row compatibility-list">
								<div class="col-sm-6">
									<h4 class="profile-heading profile-style">Martial Status</h4>
									<?php 
									$martial ='';
									switch($HerPartnerPrefrence[0]['martial_status'])
										{
											case 'U':$martial ='Unmarried'; break;
											case 'M':$martial ='Married'; break; 
											case 'N':$martial ="Never Married"; break; 
											case 'D':$martial ="Divorced"; break;
											case 'S':$martial ="Seprated"; break;
											case 'W':$martial ="Widow"; break;
											default :$martial = '--'; 
										}
										?>
									<h6><?=$martial?></h6>	
								</div>
								<div class="col-sm-3 pull-right">
								<?php if(@array_key_exists('martial_status',$matchedArr)) { $class= "fa fa-check-circle-o"; $color= '';} else { $class= "fa fa-times-circle-o"; $color ="#b92a2e";}?>
									<h3 class="pull-right icon" style="color:<?=$color?>"><i class="<?=$class ?>" aria-hidden="true"></i></h3>	
								</div>
							</div>
							<?php } if(@array_key_exists('community_name',$matchedArr)) {?>
							<div class="row compatibility-list">
								<div class="col-sm-6">
									<h4 class="profile-heading profile-style">Community</h4>
									<h6><?=$HerPartnerPrefrence[0]['community_name']?></h6>	
								</div>
								<div class="col-sm-3 pull-right">
								<?php if(@array_key_exists('community_name',$matchedArr)) { $class= "fa fa-check-circle-o"; $color= '';} else { $class= "fa fa-times-circle-o"; $color ="#b92a2e";}?>
									<h3 class="pull-right icon" style="color:<?=$color?>"><i class="<?=$class ?>" aria-hidden="true"></i></h3>	
								</div>
							</div>
							<?php } if(@array_key_exists('education',$matchedArr)) {?>
							<div class="row compatibility-list">
								<div class="col-sm-6">
									<h4 class="profile-heading profile-style">Education</h4>
									<?php $educationName = $db->getRecord(0,array('name'),'tbl_education',array('education_code' =>$HerPartnerPrefrence[0]['education']))?>
									<h6><?=$educationName[0]['name']?></h6>	
								</div>
								<div class="col-sm-3 pull-right">
								<?php if(@array_key_exists('education',$matchedArr)) { $class= "fa fa-check-circle-o"; $color= '';} else { $class= "fa fa-times-circle-o"; $color ="#b92a2e";}?>
									<h3 class="pull-right icon" style="color:<?=$color?>"><i class="<?=$class ?>" aria-hidden="true"></i></h3>	
								</div>
							</div>
							<?php } if(@array_key_exists('working_with',$matchedArr)) {?>
							<div class="row compatibility-list">
								<div class="col-sm-6">
									<h4 class="profile-heading profile-style">Working With</h4>
									<h6><?=$HerPartnerPrefrence[0]['working_with']?></h6>	
								</div>
								<div class="col-sm-3 pull-right">
								<?php if(@array_key_exists('working_with',$matchedArr)) { $class= "fa fa-check-circle-o"; $color= '';} else { $class= "fa fa-times-circle-o"; $color ="#b92a2e";}?>
									<h3 class="pull-right icon" style="color:<?=$color?>"><i class="<?=$class ?>" aria-hidden="true"></i></h3>	
								</div>
							</div>
							<?php } if(@array_key_exists('annual_income',$matchedArr)) {?>
							<div class="row compatibility-list">
								<div class="col-sm-6">
									<h4 class="profile-heading profile-style">Annual Income</h4>
									<h6><?=$HerPartnerPrefrence[0]['annual_income'].' '.$HerPartnerPrefrence[0]['currency']?></h6>	
								</div>
								<div class="col-sm-3 pull-right">
								<?php if(@array_key_exists('annual_income',$matchedArr)) { $class= "fa fa-check-circle-o"; $color= '';} else { $class= "fa fa-times-circle-o"; $color ="#b92a2e";}?>
									<h3 class="pull-right icon" style="color:<?=$color?>"><i class="<?=$class ?>" aria-hidden="true"></i></h3>	
								</div>
							</div>
							<?php } if(@array_key_exists('hobbies',$matchedArr)) {?>
							<div class="row compatibility-list">
								<div class="col-sm-6"> 
									<h4 class="profile-heading profile-style">Hobbies</h4>
									<h6><?=$HerPartnerPrefrence[0]['hobbies']?></h6>	
								</div>
								<div class="col-sm-3 pull-right">
								<?php if(@array_key_exists('hobbies',$matchedArr)) { $class= "fa fa-check-circle-o"; $color= '';} else { $class= "fa fa-times-circle-o"; $color ="#b92a2e";}?>
									<h3 class="pull-right icon" style="color:<?=$color?>"><i class="<?=$class ?>" aria-hidden="true"></i></h3>	
								</div>
							</div>
							<?php } if(@array_key_exists('country_name',$matchedArr)) {?>
							<div class="row compatibility-list">
								<div class="col-sm-6"> 
									<h4 class="profile-heading profile-style">Country</h4>
									<h6><?=$HerPartnerPrefrence[0]['country_name']?></h6>	
								</div>
								<div class="col-sm-3 pull-right">
								<?php if(@array_key_exists('country_name',$matchedArr)) { $class= "fa fa-check-circle-o"; $color= '';} else { $class= "fa fa-times-circle-o"; $color ="#b92a2e";}?>
									<h3 class="pull-right icon" style="color:<?=$color?>"><i class="<?=$class ?>" aria-hidden="true"></i></h3>	
								</div>
							</div>
							<?php } if(@array_key_exists('smoke',$matchedArr)) {?>
							<div class="row compatibility-list">
								<div class="col-sm-6"> 
									<h4 class="profile-heading profile-style">Smoke</h4>
									<h6><?=($HerPartnerPrefrence[0]['smoke']==''?'--':($HerPartnerPrefrence[0]['smoke']=='O'?'Occasionally':($HerPartnerPrefrence[0]['smoke']=='Y'?'Yes':'No')))?></h6>	
								</div>
								<div class="col-sm-3 pull-right">
								<?php if(@array_key_exists('smoke',$matchedArr)) { $class= "fa fa-check-circle-o"; $color= '';} else { $class= "fa fa-times-circle-o"; $color ="#b92a2e";}?>
									<h3 class="pull-right icon" style="color:<?=$color?>"><i class="<?=$class ?>" aria-hidden="true"></i></h3>	
								</div>
							</div>
							<?php } if(@array_key_exists('drink',$matchedArr)) {?>
							<div class="row compatibility-list">
								<div class="col-sm-6"> 
									<h4 class="profile-heading profile-style">Drink</h4>
									<h6><?=($HerPartnerPrefrence[0]['drink']==''?'--':($HerPartnerPrefrence[0]['drink']=='O'?'Occasionally':($HerPartnerPrefrence[0]['drink']=='Y'?'Yes':'No')))?></h6>	
								</div>
								<div class="col-sm-3 pull-right">
								<?php if(@array_key_exists('drink',$matchedArr)) { $class= "fa fa-check-circle-o"; $color= '';} else { $class= "fa fa-times-circle-o"; $color ="#b92a2e";}?>
									<h3 class="pull-right icon" style="color:<?=$color?>"><i class="<?=$class ?>" aria-hidden="true"></i></h3>	
								</div>
							</div>
							<?php } if(@array_key_exists('diet',$matchedArr)) {?>
							<div class="row compatibility-list">
								<div class="col-sm-6"> 
									<h4 class="profile-heading profile-style">Diet</h4>
									<h6><?=$HerPartnerPrefrence[0]['diet']?></h6>	
								</div>
								<div class="col-sm-3 pull-right">
								<?php if(@array_key_exists('diet',$matchedArr)) { $class= "fa fa-check-circle-o"; $color= '';} else { $class= "fa fa-times-circle-o"; $color ="#b92a2e";}?>
									<h3 class="pull-right icon" style="color:<?=$color?>"><i class="<?=$class ?>" aria-hidden="true"></i></h3>	
								</div>
							</div>
							<?php } if(@array_key_exists('body_type',$matchedArr)) {?>
							<div class="row compatibility-list">
								<div class="col-sm-6"> 
									<h4 class="profile-heading profile-style">Body Type</h4>
									<h6><?=$HerPartnerPrefrence[0]['body_type']?></h6>	
								</div>
								<div class="col-sm-3 pull-right">
								<?php if(@array_key_exists('body_type',$matchedArr)) { $class= "fa fa-check-circle-o"; $color= '';} else { $class= "fa fa-times-circle-o"; $color ="#b92a2e";}?>
									<h3 class="pull-right icon" style="color:<?=$color?>"><i class="<?=$class ?>" aria-hidden="true"></i></h3>	
								</div>
							</div>
							<?php } if(@array_key_exists('skin_tone',$matchedArr)) {?>
							<div class="row compatibility-list">
							<?= $skinTone='';
										switch($HerPartnerPrefrence[0]['skin_tone']) // 'VF' => 'Very Fair', 'F' => 'Fair', 'W' => 'Wheatish', 'D' => 'Dark', 'B' => 'Brown', 'M' => 'Medium', 'WD' => 'Wheatish Dark'
										{								
											case 'B':$skinTone ="Brown"; break;
											case 'VF':$skinTone = 'Very Fair'; break; 
											case 'F':$skinTone ='Fair'; break; 
											case 'W':$skinTone = 'Wheatish'; break;
											case 'D':$skinTone = 'Dark'; break;
											case 'M':$skinTone = 'Medium'; break;
											case 'WD':$skinTone = 'Wheatish Dark'; break;
											default :$skinTone = '--';
										}
										?>
								<div class="col-sm-6"> 
									<h4 class="profile-heading profile-style">Complexion</h4>
									<h6><?=$skinTone?></h6>	
								</div>
								<div class="col-sm-3 pull-right">
								<?php if(@array_key_exists('skin_tone',$matchedArr)) { $class= "fa fa-check-circle-o"; $color= '';} else { $class= "fa fa-times-circle-o"; $color ="#b92a2e";}?>
									<h3 class="pull-right icon" style="color:<?=$color?>"><i class="<?=$class ?>" aria-hidden="true"></i></h3>	
								</div>
							</div>
							<?php }?>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</section>


<div class="chat_box">
	<div class="chat_header">
    	Online <i class="fa fa-minus-circle pull-right" aria-hidden="true"></i>
    </div>
    <div class="tab-content">
		<div id="menu" class="tab-pane fade in active">
			<div class="chat_body">
				<div class="user">
					<a href="#" id="btnPopover1" data-content="<img src='<?=USER_PATH?>img/partner/1.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Anjali Singh</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Anjali Singh<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover2" data-content="<img src='<?=USER_PATH?>img/partner/2.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Aditi Sharma</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Aditi Sharma<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover3" data-content="<img src='<?=USER_PATH?>img/partner/3.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Harshita Varma</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Harshita Varma<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover4" data-content="<img src='<?=USER_PATH?>img/partner/4.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Priya Kashyap</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Priya Kashyap<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover5" data-content="<img src='<?=USER_PATH?>img/partner/5.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Khushi Jain</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Khushi Jain<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover6" data-content="<img src='<?=USER_PATH?>img/partner/6.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Deepika Patel</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Deepika Patel<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover7" data-content="<img src='<?=USER_PATH?>img/partner/7.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Bhumika Rawat</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Bhumika Rawat<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover8" data-content="<img src='<?=USER_PATH?>img/partner/8.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Apurva Arora</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Apurva Arora<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
			</div>
		</div>
   		<!--<div id="menu1" class="tab-pane fade in">
			<div class="chat_body">
				<div class="user">
					<a href="#" id="btnPopover1" data-content="<img src='img/partner/1.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Anjali Singh</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Anjali Singh<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover2" data-content="<img src='img/partner/2.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Aditi Sharma</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Aditi Sharma<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover3" data-content="<img src='img/partner/3.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Harshita Varma</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Harshita Varma<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover4" data-content="<img src='img/partner/4.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Priya Kashyap</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Priya Kashyap<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover5" data-content="<img src='img/partner/5.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Khushi Jain</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Khushi Jain<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover6" data-content="<img src='img/partner/6.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Deepika Patel</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Deepika Patel<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover7" data-content="<img src='img/partner/7.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Bhumika Rawat</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Bhumika Rawat<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover8" data-content="<img src='img/partner/8.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Apurva Arora</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Apurva Arora<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
			</div>
		</div>-->
   		<div id="menu2" class="tab-pane fade in">
			<div class="chat_body">
				<div class="user1">
					<a href="#" id="btnPopover_1" data-content="<img src='<?=USER_PATH?>img/partner/1.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Anjali Singh</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">
						<div class="row">
							<div class="col-sm-2"><img src="<?=USER_PATH?>img/partner/1.jpg" width="30" height="30" class="img-circle"></div>
							<div class="col-sm-10"> <b>Anjali Singh</b>  has sent you an Invitation to Connect <br><i>12 May</i> <button type="button" class="btn btn-danger btn-small">Accept</button> <button type="button" class="btn btn-danger btn-small">Cancel</button></div>
						</div>
					</a>
				</div>
				<div class="user1">
					<a href="#" id="btnPopover_2" data-content="<img src='<?=USER_PATH?>img/partner/2.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Aditi Sharma</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">
						<div class="row">
							<div class="col-sm-2"><img src="<?=USER_PATH?>img/partner/2.jpg" width="30" height="30" class="img-circle"></div>
							<div class="col-sm-10"><b> Aditi Sharma</b> has sent you an Invitation to Conne <br><i>13 May</i> <button type="button" class="btn btn-danger btn-small">Accept</button> <button type="button" class="btn btn-danger btn-small">Cancel</button></div>
						</div>
				  </a>
				</div>
				<div class="user1">
					<a href="#" id="btnPopover_3" data-content="<img src='<?=USER_PATH?>img/partner/3.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Harshita Varma</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">
						<div class="row">
							<div class="col-sm-2"><img src="<?=USER_PATH?>img/partner/3.jpg" width="30" height="30" class="img-circle"></div>
							<div class="col-sm-10"> <b>Harshita Varma </b> has sent you an Invitation to Connect <br><i>14 May</i> <button type="button" class="btn btn-danger btn-small"><i class="fa fa-check" aria-hidden="true"></i> Accepted</button></div>
						</div>
					</a>	
				</div>
				<div class="user1">
					<a href="#" id="btnPopover_4" data-content="<img src='<?=USER_PATH?>img/partner/4.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Priya Kashyap</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">
						<div class="row">
							<div class="col-sm-2"><img src="<?=USER_PATH?>img/partner/4.jpg" width="30" height="30" class="img-circle"></div>
							<div class="col-sm-10"> <b>Priya Kashyap</b> has sent you an Invitation to Connect <br><i>17 May</i> <button type="button" class="btn btn-danger btn-small"><i class="fa fa-check" aria-hidden="true"></i> Accepted</button></div>
						</div>
					</a>	
				</div>
				<div class="user1">
					<a href="#" id="btnPopover_5" data-content="<img src='<?=USER_PATH?>img/partner/5.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Khushi Jain</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">
						<div class="row">
							<div class="col-sm-2"><img src="<?=USER_PATH?>img/partner/5.jpg" width="30" height="30" class="img-circle"></div>
							<div class="col-sm-10"> <b>Khushi Jain</b> has sent you an Invitation to Connect <br><i>12 May</i> <button type="button" class="btn btn-danger btn-small"><i class="fa fa-check" aria-hidden="true"></i> Accepted</button></div>
						</div>
					</a>
				</div>
				<div class="user1">
					<a href="#" id="btnPopover_6" data-content="<img src='<?=USER_PATH?>img/partner/6.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Deepika Patel</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">
						<div class="row">
							<div class="col-sm-2"><img src="<?=USER_PATH?>img/partner/6.jpg" width="30" height="30" class="img-circle"></div>
							<div class="col-sm-10"> <b>Deepika Patel</b> has sent you an Invitation to Connec <br><i>12 May</i> <button type="button" class="btn btn-danger btn-small"><i class="fa fa-check" aria-hidden="true"></i> Accepted</button></div>
						</div> 
					</a>
				</div>
			</div>
		</div>
    </div>
    <ul class="nav nav-tabs chat">
		<li class="active">
			<a data-toggle="tab" class="col-sm-12" href="#menu">Online (20)</a>
		</li>
		<!--<li><a data-toggle="tab" href="#menu1"><i class="fa fa-comment" aria-hidden="true"></i> Chat</a></li>-->
	    <li>
			<a data-toggle="tab" class="col-sm-12" href="#menu2"><i class="fa fa-bell-o" aria-hidden="true"></i> Alerts </a>
	   </li>
	</ul>
</div>


<div class="msg_box" style="right:260px;">
	<div class="msg_head">
    	Arpit Shukla <div class="pull-right close1">x</div>
    </div>
    <div class="msg_wrap">
        <div class="msg_body">
            <div class="msg_a">Hi</div>
            <div class="msg_b">Hello</div>
            <div class="msg_insert"></div>
        </div>
        <div class="msg_footer">
            <form>
                <textarea style=" resize: none;" class="form-control" rows="1"></textarea>
            </form>
        </div>
    </div>
</div>

<?php 
	include('footer.php');
?> 
<script src="<?=USER_PATH?>js/bootslider.js"></script>
<script src="<?=USER_PATH?>js/zoom.min.js"></script>
<script src="<?=USER_PATH?>js/scroll.js"></script>
<script>
	$(function() {
		$(document).on('click', 'a.page-scroll', function(event) {
			var $anchor = $(this);
			$('php, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 1500, 'easeInOutExpo');
			event.preventDefault();
		});
	});
</script>

<script type="text/javascript">
    
    $(document).ready(function()
	{
	<?php if($checkForFavorite > 0) { ?>
		$('.click-fav').css('background-color', '#fff');
		$('.click-fav').css('color', '#cf0404');
		$('.click-fav').css('border', '1px solid #cf0404');
	<?php } else { ?>
		$(this).css('background-color', '#fff');
		$(this).css('color', '#928f90');
		$(this).css('border', '1px solid #928f90');
	<?php } ?>
		
	<?php if(isset($_SESSION['favorite'])) { ?>
		$('#demo-1').modal('show');
	<?php unset($_SESSION['favorite']);}  ?>
	
	<?php if(isset($_SESSION['requestSentPopup'])) { ?>
		$('#demo-2').modal('show');
	<?php unset($_SESSION['requestSentPopup']);}  ?>
	});
	
function removeRequest()
{
	$('#demo-6').modal('show');
	return false;
}	
</script>

<script>
	$(document).ready(function(e) {
		$('.chat_body').hide();
		$('.chat').hide();
        $('.chat_header').click(function(e) {
         $('.chat_body').slideToggle(500);
		$('.chat').slideToggle(500);
		 $(this).find('i').toggleClass('fa-plus-circle fa-minus-circle')
        });
    });
	
	$(document).ready(function(e) {
        $('.msg_head').click(function(e) {
            $('.msg_wrap').slideToggle(500);
        });
    });
	
	$(document).ready(function(e) {
        $('.close1').click(function(e) {
            $('.msg_box').hide(500);
        });
    });
	$(document).ready(function(e) {
        $('.user').click(function(e) {
			$('.msg_wrap').show();
            $('.msg_box').show();
        });
    });
	
	$(document).ready(function() {
        $('textarea').keypress(function(e) {
			if(e.keyCode==13){
				var msg = $(this).val();
				$("<div class='msg_b'>"+msg+"</div>").insertBefore('.msg_insert');
				$(this).val('');
				$('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
			}
        });
    });
</script>
<script>
$(document).ready(function() {
	$('#btnPopover1').popover();
	$('#btnPopover2').popover();
	$('#btnPopover3').popover();
	$('#btnPopover4').popover();
	$('#btnPopover5').popover();
	$('#btnPopover6').popover();
	$('#btnPopover7').popover();
	$('#btnPopover8').popover();
	
	$('#btnPopover_1').popover();
	$('#btnPopover_2').popover();
	$('#btnPopover_3').popover();
	$('#btnPopover_4').popover();
	$('#btnPopover_5').popover();
	$('#btnPopover_6').popover();
	$('#btnPopover_7').popover();
	$('#btnPopover_8').popover();
});
</script>
<script>
$('.chat_body').css('overflow-y','scroll');
</script>