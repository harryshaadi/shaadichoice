<?php 
	include('head.php');
	$count ='';
	$query = '';
	$whr = '';
	
	$accountProfileDetails = $db->getRecord(0, array('fname,profile_complete'), 'tbl_profiles', array('profile_code' => $_SESSION['userDetail']['profile_code']));
	unset($_SESSION['img_success']);
	if($accountProfileDetails[0]['fname'] == '')
	{
		header('Location:basic-details.php');
	}
	
	$profileCompletion = $db->getRecord(0, array('basic_info_field_all','basic_info_field_filled','education_all','education_filled','family_details_all','family_details_filled','life_style_all','life_style_filled', 'location_all', 'location_filled', 'uploaded_images', 'partner_profile_filled'), 'tbl_dashboard_status', array('profile_code' => $_SESSION['userDetail']['profile_code']));
	
	$countProfileCompleton = count($profileCompletion);
	
	$totalPercentage =0; $basicInfoPercent =''; $educationPercent = ''; $familyPercent = ''; $lifePercent = ''; $locationPercent = ''; $imagePercent = ''; $partnerPercent='';
	if($countProfileCompleton >0)
	{
		$basicInfoPercent = ($profileCompletion[0]['basic_info_field_filled'] / $profileCompletion[0]['basic_info_field_all'])*100;
		$basicInfoRatio = (30*$basicInfoPercent)/100; 
		
		$educationPercent = ($profileCompletion[0]['education_filled'] / $profileCompletion[0]['education_all'])*100;
		$educationRatio = (10*$educationPercent)/100;
		
		$familyPercent = ($profileCompletion[0]['family_details_filled'] / $profileCompletion[0]['family_details_all'])*100;
		$familyRatio = (10*$familyPercent)/100;
		
		$lifePercent = ($profileCompletion[0]['life_style_filled'] / $profileCompletion[0]['life_style_all'])*100;
		$lifeRatio = (10*$lifePercent)/100;
		
		$locationPercent = ($profileCompletion[0]['location_filled'] / $profileCompletion[0]['location_all'])*100;
		$locationRatio = (10*$locationPercent)/100;
		
		$imagePercent = ($profileCompletion[0]['uploaded_images']==1?10:0);
		
		$partnerPercent = ($profileCompletion[0]['partner_profile_filled']/24)*100;
		$partnerRatio = (20*$partnerPercent)/100; 
		
		$totalPercentage = floor(@$basicInfoRatio+@$educationRatio+@$familyRatio+@$lifeRatio+@$locationRatio+@$imagePercent+@$partnerRatio);
	}
?> 
<section>
	<div class="container">
	
		<?php 
		if($accountProfileDetails[0]['profile_complete'] > 0){
		if(isset($_SESSION['congrats'])) { ?>
		<div class="col-sm-6 col-sm-offset-4">
			<div class="welcome-message" id="welcome-message-div">
				<div class="row">
					<div class="col-sm-12 text-center">
						<img src="<?=USER_PATH?>img/right.png">
						<h4><b>Welcome ! </b><?= ucwords($_SESSION['userDetail']['fname'].' '.$_SESSION['userDetail']['lname']) ?> </h4>
						<p>We are glad to have you as a member of <b>Shaadi Choice</b> where lakhs of people connect with each other to discover their perfect match! </p>
					</div>
					
				</div>
			</div>
		</div>
		 

		<?php }
		 else if($totalPercentage < 100) { ?>
		<h3 class="text-center" style="padding-top: 15px;">Completing all sections of the profile will help you get noticed.</h3>
		<div class="row">
		
			<div class="board1">
				<div class="board-inner">
					<ul class="nav nav-tabs" id="myTab">	
						<div class="liner"></div>
						 <li>
							<input type="checkbox" id="option1"  <?php if($basicInfoPercent == 100) echo 'checked';?> onclick="return false;"/>
							<label for="option1"><span></span></label>
							<p class="tb1" <?php if($basicInfoPercent == 100) { echo "style=color:#504e4e;"; } else { echo "style=color:#9a2729;"; }?>><a href="<?=USER_PATH?>edit-basic-info.php">Basic Info</a></p>
						</li>
						<li>
							 <input type="checkbox" id="option2" <?php if($educationPercent == 100) echo 'checked';?> onclick="return false;"/>
							 <label for="option2"><span></span></label>
							 <p class="tb2" <?php if($educationPercent == 100) { echo "style=color:#504e4e;"; } else { echo "style=color:#9a2729;"; }?>><a href="<?=USER_PATH?>edit-education.php">Education</a></p>
						</li>
						 <li>
							  <input type="checkbox" id="option3" <?php if($familyPercent == 100) echo 'checked';?> onclick="return false;"/>
							 <label for="option3"><span></span></label>
							 <p class="tb3" <?php if($familyPercent == 100) { echo "style=color:#504e4e;"; } else { echo "style=color:#9a2729;"; }?>><a href="<?=USER_PATH?>edit-family-details.php">Family Details</a></p>
						</li>
						<li>
							<input type="checkbox" id="option4" <?php if($lifePercent == 100) echo 'checked';?> onclick="return false;"/>
							<label for="option4"><span></span></label>
							<p class="tb4" <?php if($lifePercent == 100) { echo "style=color:#504e4e;"; } else { echo "style=color:#9a2729;"; }?>><a href="<?=USER_PATH?>edit-lifestyle.php">Life Style</a></p>
					   </li>
					   <li>
							<input type="checkbox" id="option5" <?php if($locationPercent == 100) echo 'checked';?> onclick="return false;"/>
							<label for="option5"><span></span></label>
							<p class="tb5" <?php if($locationPercent == 100) { echo "style=color:#504e4e;"; } else { echo "style=color:#9a2729;"; }?>><a href="<?=USER_PATH?>edit-location.php">Location</a></p>
					   </li>
					   <li>
							<input type="checkbox" id="option6" <?php if($imagePercent == 10) echo 'checked';?> onclick="return false;"/>
							<label for="option6"><span></span></label>
							<p class="tb6" <?php if($imagePercent == 10) { echo "style=color:#504e4e;"; } else { echo "style=color:#9a2729;"; }?>><a href="<?=USER_PATH?>add-profileImage.php">Photos</a></p>
					   </li>
					   <li>
							<input type="checkbox" id="option7" <?php if($partnerPercent == 100) echo 'checked';?> onclick="return false;"/>
							<label for="option7"><span></span></label>
							<p class="tb7" <?php if($partnerPercent == 100) { echo "style=color:#504e4e;"; } else { echo "style=color:#9a2729;"; }?>><a href="<?=USER_PATH?>edit-partner.php">Partner Preference</a></p>
					   </li>
					 </ul>
				 </div>
			</div>
		</div>
		<?php } }?>

		<div class="row">
				
<?php
			// HERE handle Partner Prefrence, Newest Members and Diamond Members active class
			
			$tabActivePP = "";
			$tabActiveNM = "";
			$tabActiveDM = "";

			$tabActive = "pp";
			if (!empty($_GET['active'])) $tabActive = $_GET['active'];	


			if ($tabActive == "nm") $tabActiveNM = "active";
			else if ($tabActive == "dm") $tabActiveDM = "active";
			else if ($tabActive == "pp") $tabActivePP = "active";
			
			
			
			
			else  $tabActivePP = "active";
			$divView = "l";
			if (!empty($_GET['divView'])) $divView = $_GET['divView'];	
		
			$divViews = "";
			if ($divView == "g") $divViews = "list-group-item";
		
?>
			<div class="col-sm-12 panel-body">
					
				 	<div class="row">
						<div class="col-md-12" style="padding-right: 30px;">
							<div class="tabbable-panel">
								<div class="tabbable-line">
									<ul class="nav nav-tabs ">
										<li class="<?=$tabActivePP?>">
											<a href="#tab_default_1" data-toggle="tab" id="ptab" onclick="changePageUrl('pp');">
											Partner Prefrence </a>
										</li>
										<li class="<?=$tabActiveNM?>">
											<a href="#tab_default_2" data-toggle="tab" id="ntab" onclick="changePageUrl('nm');">
											Newest Members </a>
										</li>
										<li class="<?=$tabActiveDM?>">
											<a href="#tab_default_3" data-toggle="tab" id="dtab" onclick="changePageUrl('dm');">
											Diamond Members </a>
										</li>
										<div class="btn-group pull-right">
											<a href="javascript:void();" id="list" class="btn list-grid"><span class="glyphicon glyphicon-th-list">
											</span></a> 
											<a href="javascript:void();" id="grid" class="btn list-grid"><span
												class="glyphicon glyphicon-th"></span></a>
										</div>
									</ul>
									<?php	
									$profileCode = $_SESSION['userDetail']['profile_code'];
									$gndr = $_SESSION['userDetail']['gender'];
									//$blockedUser = $db->getRecord(1, array('blocked_by'), 'tbl_blocked_users', array('blocked_user' => $profileCode));
									$blockedUser = $db->getRecord(0, array('blocked_user'), 'tbl_blocked_users', array('blocked_by' => $profileCode));
									$countBlockedUser = count($blockedUser);
									$blockstr ='';
									
									$usePrtnrPrefArr = $db->getRecord(0, array('*'), 'tbl_partner_preference', array('profile_code_fk' => $profileCode));	
									
									$whereClause = "a.profile_status = 'A' AND a.profile_code <> '$profileCode' AND a.gender <> '$gndr' AND a.show_hide_profile <>'H'";
									if($countBlockedUser > 0)
									{
										for($i =0; $i<$countBlockedUser; $i++)
										{
											$blockstr .= "'".$blockedUser[$i]['blocked_user']."',";
										}
										$blockstr = substr($blockstr,0,-1);
										$whereClause .= " AND a.profile_code NOT IN($blockstr)";
									}
									$heightRange = '';
									$ageRange = " AND ((DATEDIFF(CURDATE(), c.birth_date) / 365.25) >= ".$usePrtnrPrefArr[0]['age_from']." AND (DATEDIFF(CURDATE(), c.birth_date) / 365.25) <= ".$usePrtnrPrefArr[0]['age_to'].")";
									$heightRange = " AND ( (c.height >= ".$usePrtnrPrefArr[0]['height_from']." AND c.height <= ".$usePrtnrPrefArr[0]['height_to'].")";									
									$whereClause .= " $ageRange $heightRange OR a.maritial_status = '".$usePrtnrPrefArr[0]['martial_status']."' OR a.religion_code = '".$usePrtnrPrefArr[0]['religion']."' OR a.community_code = '".$usePrtnrPrefArr[0]['community']."' OR c.manglik = '".$usePrtnrPrefArr[0]['manglik']."' OR c.eye_color = '".$usePrtnrPrefArr[0]['eye_color']."' OR c.body_type = '".$usePrtnrPrefArr[0]['body_type']."' OR c.skin_tone = '".$usePrtnrPrefArr[0]['skin_tone']."' OR e.city_id_fk = '".$usePrtnrPrefArr[0]['city_district']."' OR e.state_id_fk = '".$usePrtnrPrefArr[0]['state_living']."' OR e.country_id_fk = '".$usePrtnrPrefArr[0]['country_living']."' OR d.education_code = '".$usePrtnrPrefArr[0]['education']."' OR d.annual_income = '".$usePrtnrPrefArr[0]['annual_income']."' OR d.annual_income = '".$usePrtnrPrefArr[0]['annual_income']."' OR l.diet = '".$usePrtnrPrefArr[0]['diet']."' OR l.drink = '".$usePrtnrPrefArr[0]['drink']."' OR l.smoke = '".$usePrtnrPrefArr[0]['smoke']."'";									
									
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['hobbies'], 'f.hobbies'); 
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['interests'], 'f.interests'); 
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['music'], 'f.music');
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['user_reads'], 'f.user_reads');
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['movies'], 'f.movies');
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['sports'], 'f.sports ');
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['languages'], 'f.languages');
									$whereClause .= ")";
			
									$tbls = "tbl_profiles a JOIN tbl_profile_detail c ON(a.profile_code = c.profile_code_fk)
										JOIN tbl_education_career d ON (a.profile_code = d.profile_code)
										JOIN tbl_member_contact_info e ON(a.profile_code = e.profile_code)
										JOIN tbl_user_hobby f ON(a.profile_code = f.profile_code AND f.profile_code <> '$profileCode')
										JOIN tbl_community g ON(a.community_code = g.community_code)
										JOIN tbl_memberships i ON(a.membership_code = i.membership_code)
										JOIN tbl_lifestyle l ON(a.profile_code = l.profile_code)
										JOIN tbl_cities h ON(h.city_id_pk = e.city_id_fk)
										JOIN tbl_states m ON(m.state_id_pk = e.state_id_fk)
										JOIN tbl_countries n ON(n.country_id_pk = e.country_id_fk)";
									//$tbls = 'tbl_profiles a';
									$stpp = 0;
									$perPage = 8;
									if (!empty($_GET['st'])) $stpp = $_GET['st'];
									
									$selectedCols = "a.profile_code,a.fname,a.lname,a.gender,a.show_hide_profile,c.more_detail,d.working_as,g.community_name,h.city_name, ROUND((DATEDIFF(CURDATE(), c.birth_date) / 365.25)) mage";
									$whereClause4pp = " $whereClause GROUP BY a.profile_code";
									$usePrtnrPrefArr = $db->getRecord(0, $selectedCols, $tbls, $whereClause4pp, $stpp, $perPage, "a.modified_on", 'DESC');
									$usePrtnrPrefArrCount = $db->getRecord(0, $selectedCols, $tbls, $whereClause4pp, '', '', "a.modified_on", 'DESC');

									$totalNoOfRecords = count($usePrtnrPrefArrCount);
									$divPage = generatePagination($totalNoOfRecords, $perPage, $stpp, 'dashboard.php', "active=pp&divView=$divView", "stpp");									
									?>
									<div class="tab-content">
										<div class="tab-pane <?=$tabActivePP?>" id="tab_default_1">
											 <div id="products" class="row list-group">
<?php										
											 if (is_array($usePrtnrPrefArr))
											 {
												$numOfRows = count($usePrtnrPrefArr);
												for ($i = 0; $i < $numOfRows; $i++)
												{
													$profileCode = $usePrtnrPrefArr[$i]['profile_code'];
													$profileLink = "view-profile.php?pc=$profileCode";
													if($usePrtnrPrefArr[$i]['show_hide_profile'] != 'H')
													{
?>
													<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-3 <?=$divViews?>">
														<div class="thumbnail">
														<?php 
														$userprofileImage = $db->getRecord(0, array('image'), 'tbl_profile_images', array('profile_code' => $profileCode, 'default_image' => 'Y'));
															$count = count($userprofileImage);
															  $userPic='';
															  if($count > 0)
																  $userPic = USER_PATH."uploads/profile_pic/".$userprofileImage[0]['image'];
															  else{
																	  if($usePrtnrPrefArr[$i]['gender'] == 'M')
																		$userPic = USER_PATH."img/male-default.png";
																		else
																		$userPic = USER_PATH."img/female-default.png";
																  }
															?>
															<a href="<?=USER_PATH?>profile-details/<?=$profileCode?>/<?=$stpp?>/<?=$tabActive?>/<?=$divView?>"><img class="group list-group-image img-thumbnail" src="<?=$userPic?>" alt="" /></a>
															<div class="caption">
																<div class="row">
																	<div class="table-list">
																		<h4 class="group inner list-group-item-heading"><a href="<?=USER_PATH?>profile-details/<?=$profileCode?>/<?=$stpp?>/<?=$tabActive?>/<?=$divView?>"><?=($usePrtnrPrefArr[$i]['fname'] !=''?ucwords($usePrtnrPrefArr[$i]['fname']." ".$usePrtnrPrefArr[$i]['lname']):'NA')?></a></h4>
																		<table class="table table-responsive">
																			<tr>
																				<td>Age :</td>
																				<td><?=($usePrtnrPrefArr[$i]['mage']!=''?$usePrtnrPrefArr[$i]['mage'].' Years':'NA')?></td>
																			</tr>
																			<tr>
																				<td>Community :</td>
		<td title="<?=$usePrtnrPrefArr[$i]['community_name']?>"><?=($usePrtnrPrefArr[$i]['community_name']!=''?(strlen($usePrtnrPrefArr[$i]['community_name'])< 10?$usePrtnrPrefArr[$i]['community_name']:substr($usePrtnrPrefArr[$i]['community_name'],0,10)):'NA')?></td>
																			</tr>
																	<tr>
												<td>Profession :</td>
	<td title="<?=$usePrtnrPrefArr[$i]['working_as']?>"><?=($usePrtnrPrefArr[$i]['working_as']!=''?(strlen($usePrtnrPrefArr[$i]['working_as'])< 10?$usePrtnrPrefArr[$i]['working_as']:substr($usePrtnrPrefArr[$i]['working_as'],0,10)):'NA')?></td>
																			</tr>
																			<tr>
																				<td>Location :</td>
			<td title="<?=$usePrtnrPrefArr[$i]['city_name']?>"><?=($usePrtnrPrefArr[$i]['city_name']!=''?(strlen($usePrtnrPrefArr[$i]['city_name'])< 10?$usePrtnrPrefArr[$i]['city_name']:substr($usePrtnrPrefArr[$i]['city_name'],0,10)):'NA')?></td>
																			</tr>
																		</table>
																	</div>
																	<div class="group inner list-group-item-text content">
																		<p><?=($usePrtnrPrefArr[$i]['more_detail']!=''?(strlen($usePrtnrPrefArr[$i]['more_detail'])< 10?nl2br(ucfirst($usePrtnrPrefArr[$i]['more_detail'])):substr(nl2br(ucfirst($usePrtnrPrefArr[$i]['more_detail'])),0,150).'...'):'NA')?></p>
																	</div>
																	<hr>
																	<div class="thumbnail-footer text-center butn">
																		<a href="<?=USER_PATH?>profile-details/<?=$profileCode?>/<?=$stpp?>/<?=$tabActive?>/<?=$divView?>">View Full Profile</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
<?php												}
												}
											 }
											 else
											 {
?>	
												<div class="item  col-sm-12">
													<div class="thumbnail">
														<div class="caption panel-body">
															<b>No Record Found.</b>
														</div>
													</div>
												</div>	
<?php
											 
											 }
?>
											
											</div>
											<div class="pagination_list"><?=$divPage;?>&nbsp;<strong><?=$totalNoOfRecords?>&nbsp;result(s)</strong></div>	
										</div>
  										
										<div class="tab-pane <?=$tabActiveNM?>" id="tab_default_2">
											 <div id="products" class="row list-group">
<?php										
											$whereClause = "a.profile_status = 'A' AND a.profile_code <> '$profileCode' AND a.gender <> '$gndr' AND a.show_hide_profile <>'H'";
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
												LEFT JOIN tbl_cities h ON(h.city_id_pk = e.city_id_fk)";
											$stpm = 0;
											$perPage = 8;
											if (!empty($_GET['st'])) $stpm = $_GET['st'];
											$selectedCols = "a.profile_code,a.gender,a.fname,a.lname,a.show_hide_profile,c.more_detail,d.working_as,g.community_name,h.city_name, ROUND((DATEDIFF(CURDATE(), c.birth_date) / 365.25)) mage";
											$whereClausenm = " $whereClause GROUP BY a.profile_code";
											$usePrtnrPrefArr = $db->getRecord(0, $selectedCols, $tbls, $whereClausenm, $stpm, $perPage, "a.created_on", 'DESC');
											$usePrtnrPrefArrCount = $db->getRecord(0, $selectedCols, $tbls, $whereClausenm, '', '', "a.created_on", 'DESC');

											$totalNoOfRecords = count($usePrtnrPrefArrCount);
											$divPage = generatePagination($totalNoOfRecords, $perPage, $stpm, 'dashboard.php', "active=nm&divView=$divView", "stpm");	
											 if (is_array($usePrtnrPrefArr))
											 {
												$numOfRows = count($usePrtnrPrefArr);
												for ($i = 0; $i < $numOfRows; $i++)
												{
													$profileCode = $usePrtnrPrefArr[$i]['profile_code'];
													$profileLink = "view-profile.php?pc=$profileCode";
													if($usePrtnrPrefArr[$i]['show_hide_profile'] != 'H') {
?>													
													<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-3 <?=$divViews?>">
														<div class="thumbnail">
														<?php 
														$userprofileImage = $db->getRecord(0, array('image'), 'tbl_profile_images', array('profile_code' => $profileCode, 'default_image' => 'Y'));
															$count = count($userprofileImage);
															  $userPic='';
															  if($count > 0)
																  $userPic = USER_PATH."uploads/profile_pic/".$userprofileImage[0]['image'];
															  else{
																	  if($usePrtnrPrefArr[$i]['gender'] == 'M')
																		$userPic = USER_PATH."img/male-default.png";
																		else
																		$userPic = USER_PATH."img/female-default.png";
																  }
															?>
															<a href="<?=USER_PATH?>profile-details/<?=$profileCode?>/<?=$stpp?>/nm/<?=$divView?>"><img class="group list-group-image img-thumbnail" src="<?=$userPic?>" alt="" /></a>
															<div class="caption">
																<div class="row">
																	<div class="table-list">
																		<h4 class="group inner list-group-item-heading"><a href="<?=USER_PATH?>profile-details/<?=$profileCode?>/<?=$stpp?>/<?=$tabActive?>/<?=$divView?>"><?=($usePrtnrPrefArr[$i]['fname'] !=''?(ucwords($usePrtnrPrefArr[$i]['fname']." ".$usePrtnrPrefArr[$i]['lname'])):'NA')?></a></h4>
																		<table class="table table-responsive">
																			<tr>
																				<td>Age :</td>
																				<td><?=($usePrtnrPrefArr[$i]['mage']!=''?$usePrtnrPrefArr[$i]['mage'].' Years':'NA')?></td>
																			</tr>
																			<tr>
																				<td>Community :</td>
																				<td title="<?=$usePrtnrPrefArr[$i]['community_name']?>"><?=($usePrtnrPrefArr[$i]['community_name']!=''?(strlen($usePrtnrPrefArr[$i]['community_name'])< 10?$usePrtnrPrefArr[$i]['community_name']:substr($usePrtnrPrefArr[$i]['community_name'],0,10)):'NA')?></td>
																			</tr>
																			<tr>
																				<td>Profession :</td>
																				<td title="<?=$usePrtnrPrefArr[$i]['working_as']?>"><?=($usePrtnrPrefArr[$i]['working_as']!=''?(strlen($usePrtnrPrefArr[$i]['working_as'])< 10?$usePrtnrPrefArr[$i]['working_as']:substr($usePrtnrPrefArr[$i]['working_as'],0,10)):'NA')?></td>
																			</tr>
																			<tr>
																				<td>Location :</td>
																				<td title="<?=$usePrtnrPrefArr[$i]['city_name']?>"><?=($usePrtnrPrefArr[$i]['city_name']!=''?(strlen($usePrtnrPrefArr[$i]['city_name'])< 10?$usePrtnrPrefArr[$i]['city_name']:substr($usePrtnrPrefArr[$i]['city_name'],0,10)):'NA')?></td>
																			</tr>
																		</table>
																	</div>
																	<div class="group inner list-group-item-text content">
																		<p><?=($usePrtnrPrefArr[$i]['more_detail']!=''?(strlen($usePrtnrPrefArr[$i]['more_detail'])< 10?nl2br(ucfirst($usePrtnrPrefArr[$i]['more_detail'])):substr(nl2br(ucfirst($usePrtnrPrefArr[$i]['more_detail'])),0,150).'...'):'NA')?></p>
																	</div>
																	<hr>
																	<div class="thumbnail-footer text-center butn">
																		<a href="<?=USER_PATH?>profile-details/<?=$profileCode?>/<?=$stpp?>/<?=$tabActive ?>/<?=$divView?>">View Full Profile</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
<?php												}
												}
											 }
											 else
											 {
?>	
												<div class="item  col-sm-12">
													<div class="thumbnail">
														<div class="caption panel-body">
															<b>No Record Found.</b>
														</div>
													</div>
												</div>	
<?php
											 
											 }
?>
											
											</div>
											<div class="pagination_list"><?=$divPage;?>&nbsp;<strong><?=$totalNoOfRecords?>&nbsp;result(s)</strong></div>	
										</div>
										
										<div class="tab-pane <?=$tabActiveDM?>" id="tab_default_3">
											 <div id="products" class="row list-group">
											<?php
											$stdm = 0;
											$perPage = 8;
											if (!empty($_GET['st'])) $stdm = $_GET['st'];
											$membership = " AND i.membership_name LIKE '%Dimond%'";
											$whereClausenm = " $whereClause $membership GROUP BY a.profile_code";
											$usePrtnrPrefArr = $db->getRecord(0, $selectedCols, $tbls, $whereClausenm, $stdm, $perPage, "a.fname", 'ASC');
											$usePrtnrPrefArrCount = $db->getRecord(0, $selectedCols, $tbls, $whereClausenm, '', '', "a.fname", 'ASC');

											$totalNoOfRecords = count($usePrtnrPrefArrCount);
											$divPage = generatePagination($totalNoOfRecords, $perPage, $stdm, 'dashboard.php', "active=dm&divView=$divView", "stdm");	
											 if (is_array($usePrtnrPrefArr))
											 {
												$numOfRows = count($usePrtnrPrefArr);
												for ($i = 0; $i < $numOfRows; $i++)
												{
													$profileCode = $usePrtnrPrefArr[$i]['profile_code'];
													$profileLink = "view-profile.php?pc=$profileCode";
													if($usePrtnrPrefArr[$i]['show_hide_profile'] != 'H') {
											?>												
													<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-3 <?=$divViews?>">
														<div class="thumbnail">
														<?php 
														$userprofileImage = $db->getRecord(0, array('image'), 'tbl_profile_images', array('profile_code' => $profileCode, 'default_image' => 'Y'));
															$count = count($userprofileImage);
															  $userPic='';
															  if($count > 0)
																  $userPic = USER_PATH."uploads/profile_pic/".$userprofileImage[0]['image'];
															  else{
																	  if($usePrtnrPrefArr[$i]['gender'] == 'M')
																		$userPic = USER_PATH."img/male-default.png";
																		else
																		$userPic = USER_PATH."img/female-default.png";
																  }
															?>
															<a href="<?=USER_PATH?>profile-details/<?=$profileCode?>/<?=$stpp?>/<?=$tabActive?>/<?=$divView?>"><img class="group list-group-image img-thumbnail" src="<?=$userPic?>" alt="" /></a>
															<div class="caption">
																<div class="row">
																	<div class="table-list">
																		<h4 class="group inner list-group-item-heading"><a href="<?=USER_PATH?>profile-details/<?=$profileCode?>/<?=$stpp?>/<?=$tabActive?>/<?=$divView?>"><?=($usePrtnrPrefArr[$i]['fname'] !=''?(ucwords($usePrtnrPrefArr[$i]['fname']." ".$usePrtnrPrefArr[$i]['lname'])):'NA')?></a></h4>
																		<table class="table table-responsive">
																			<tr>
																				<td>Age :</td>
																				<td><?=($usePrtnrPrefArr[$i]['mage']!=''?$usePrtnrPrefArr[$i]['mage'].' Years':'NA')?></td>
																			</tr>
																			<tr>
																				<td>Community :</td>
																				<td title="<?=$usePrtnrPrefArr[$i]['community_name']?>"><?=($usePrtnrPrefArr[$i]['community_name']!=''?(strlen($usePrtnrPrefArr[$i]['community_name'])< 10?$usePrtnrPrefArr[$i]['community_name']:substr($usePrtnrPrefArr[$i]['community_name'],0,10)):'NA')?></td>
																			</tr>
																			<tr>
																				<td>Profession :</td>
																				<td title="<?=$usePrtnrPrefArr[$i]['working_as']?>"><?=($usePrtnrPrefArr[$i]['working_as']!=''?(strlen($usePrtnrPrefArr[$i]['working_as'])< 10?$usePrtnrPrefArr[$i]['working_as']:substr($usePrtnrPrefArr[$i]['working_as'],0,10)):'NA')?></td>
																			</tr>
																			<tr>
																				<td>Location :</td>
																				<td title="<?=$usePrtnrPrefArr[$i]['city_name']?>"><?=($usePrtnrPrefArr[$i]['city_name']!=''?(strlen($usePrtnrPrefArr[$i]['city_name'])< 10?$usePrtnrPrefArr[$i]['city_name']:substr($usePrtnrPrefArr[$i]['city_name'],0,10)):'NA')?></td>
																			</tr>
																		</table>
																	</div>
																	<div class="group inner list-group-item-text content">
																		<p><?=($usePrtnrPrefArr[$i]['more_detail']!=''?(strlen($usePrtnrPrefArr[$i]['more_detail'])< 100?nl2br(ucfirst($usePrtnrPrefArr[$i]['more_detail'])):substr(nl2br(ucfirst($usePrtnrPrefArr[$i]['more_detail'])),0,150).'...'):'NA')?></p>
																	</div>
																	<hr>
																	<div class="thumbnail-footer text-center butn">
																	<?php $tabActive=''; $tabActive='dm';?>
																		<a href="<?=USER_PATH?>profile-details/<?=$profileCode?>/<?=$stpp?>/<?=$tabActive?>/<?=$divView?>">View Full Profile</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
<?php												}
												}
											 }
											 else
											 {
?>	
												<div class="item  col-sm-12">
													<div class="thumbnail">
														<div class="caption panel-body">
															<b>No Record Found.</b>
														</div>
													</div>
												</div>	
<?php
											 
											 }
?>
											
											</div>
											<div class="pagination_list"><?=$divPage;?>&nbsp;<strong><?=$totalNoOfRecords?>&nbsp;result(s)</strong></div>	
										</div>
	
										
										
											</div>
										</div>
										<!--<ul class="pagination pull-right">
										  <li class="disabled"><a href="#">«</a></li>
										  <li class="active"><a href="#"><span class="sr-only">(current)</span></a></li>
										  <li><a href="#">»</a></li>
										</ul>--> 
   									</div>
								</div>
								
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>				
</section>


<?php include_once('chat_process.php'); ?>
<link href="<?=USER_PATH?>css/paging.css" rel="stylesheet" type="text/css" />
<?php include('footer.php');?> 
<?php include_once('shaadichoice_chat.php'); ?>
<script>

$(document).ready(function() {
    $('#list').click(function(event){
		event.preventDefault();
		$('#products .item').addClass('list-group-item');
		$(".pagination_list a").each(function( index )
		{			
			var herfVal = $(this).attr('href');
			if (herfVal.includes("divView=l"))
			{
				herfVal = herfVal.replace("divView=l", "divView=g");
			}			
			$(this).attr('href', herfVal);
			
		});
	});

    $('#grid').click(function(event){
		event.preventDefault();
		$('#products .item').removeClass('list-group-item');
		$('#products .item').addClass('grid-group-item');
		$(".pagination_list a").each(function( index )
		{			
			var herfVal = $(this).attr('href');
			if (herfVal.includes("divView=g"))
			{
				herfVal = herfVal.replace("divView=g", "divView=l");
			}			
			$(this).attr('href', herfVal);
			
		});
	});
	
	// $('#ptab').click(function(event){
		// event.preventDefault();
		
		// $(".pagination_list a").each(function( index )
		// {			
			// var herfVal = $(this).attr('href');
			// if (herfVal.includes("divView=g"))
			// {
				// herfVal = herfVal.replace("divView=g", "divView=l");
			// }			
			// $(this).attr('href', herfVal);
			
		// });
	// });
});

function changePageUrl(a)
{
	var url ='<?=USER_PATH?>dashboard.php?';
	var view = '<?php if(isset($_GET['divView'])) { echo $_GET['divView'];} else { echo 'l'; }?>';
	if(a != undefined)
	{
		url += 'active='+a+'&divView='+view;	
	}
	window.location.href = url;
}

<?php if(isset($_SESSION['congrats']) && !empty($_SESSION['congrats'])){ ?>
$('#welcome-message-div').css('display','block');
	
setTimeout(function ()
 {
     $('#welcome-message-div').hide();
	  <?php unset($_SESSION['congrats']); ?>
  }, 30000);
<?php } ?>

</script>

