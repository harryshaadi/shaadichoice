<?php 
	include('head.php');
	$count ='';
	$query = '';
	$whr = '';
	
	$accountProfileDetails = $db->getRecord(0, array('profile_complete'), 'tbl_profile_detail', array('profile_code_fk' => $_SESSION['userDetail']['profile_code']));
	$accountBirthDetails = $db->getRecord(0, array('birth_date'), 'tbl_profile_detail', array('profile_code_fk' => $_SESSION['userDetail']['profile_code']));
	$accountEducationDetails = $db->getRecord(0, array('education'), 'tbl_education_career', array('profile_code' => $_SESSION['userDetail']['profile_code'])); 
	$accountFamilyDetails = $db->getRecord(0, array('father_status'), 'tbl_family_details', array('profile_code' => $_SESSION['userDetail']['profile_code']));
	$accountLifestyleDetails = $db->getRecord(0, array('diet'), 'tbl_lifestyle', array('profile_code' => $_SESSION['userDetail']['profile_code']));
	$accountLocationDetails = $db->getRecord(0, array('city_id_fk'), 'tbl_member_contact_info', array('profile_code' => $_SESSION['userDetail']['profile_code']));
?> 
<section>
	<div class="container">
		<!--<h3 class="text-center" style="padding-top: 15px;">Complete  your profile to get the right to notice you.</h3>
					<div class="row">
						<div class="board1">
							<div class="board-inner">
								<ul class="nav nav-tabs" id="myTab">
									<div class="liner"></div>
									 <li>
										  <input type="checkbox" id="option1" />
										  <label for="option1"><span></span></label>
										  <p class="tb1">Community</p>
									</li>
									<li>
										 <input type="checkbox" id="option2" />
										 <label for="option2"><span></span></label>
										 <p class="tb2">Age</p>
									</li>
									 <li>
										 <input type="checkbox" id="option3" />
										 <label for="option3"><span></span></label>
										 <p class="tb3">Profession</p>
									</li>
								    <li>
								    	<input type="checkbox" id="option4" />
										<label for="option4"><span></span></label>
										<p class="tb4">Matrial status</p>
								   </li>
								   <li>
								   		<input type="checkbox" id="option5" />
										<label for="option5"><span></span></label>
										<p class="tb5">Location</p>
								   </li>
								 </ul>
							 </div>
						</div>
				 	</div>-->
		<div class="row">
				<div class="col-sm-6 col-sm-offset-4">
				
				<?php 
				if($accountProfileDetails == 0){
				if(isset($_SESSION['congrats'])) { ?>
					<div class="welcome-message" id="welcome-message-div">
						<div class="row">
							<div class="col-sm-12 text-center">
								<img src="img/right.png">
								<h4><b>Welcome ! </b><?= ucwords($_SESSION['userDetail']['fname'].' '.$_SESSION['userDetail']['lname']) ?> </h4>
								<p>We are glad to have you as a member of <b>Shaadi Choice</b> where lakhs of people connect with each other to discover their perfect match! </p>
							</div>
						</div>
					</div>
				<?php } } ?>
				</div>
			<div class="col-sm-3">
			<?php $profilePicArr = $db->getRecord(0, array('image','image_code'), ' tbl_profile_images', array('profile_code' => $_SESSION['userDetail']['profile_code'], 'approved' => 'Y', 'default_image' => 'Y'));
				  $count = count($profilePicArr);
				  $profilePic='';
				  if($count > 0)
					  $profilePic = USER_PATH."uploads/profile_pic/".$profilePicArr[0]['image'];
				  else
					  $profilePic = USER_PATH."img/default-profile.jpg";
			?>
				<div class="profile-section">
					<a href="<?=USER_PATH?>manage-photo.php" class="pull-right" title="Edit Photo"><i class="fa fa-pencil pull-right" aria-hidden="true"></i></a>
					<br>
					<img src="<?=$profilePic?>">
					<h3><?= ucwords($_SESSION['userDetail']['fname'].' '.$_SESSION['userDetail']['lname']) ?> <span><?='('.$_SESSION['userDetail']['user_code'].')'?></span></h3>
				</div>
				<div class="profile-section1">
					<ul>
						<li><a href="<?=USER_PATH?>self-profile.php">My Dashboard </a></li>
						<li><a href="<?=USER_PATH?>search.php">Profile Search </a></li>
						<li><a href="<?=USER_PATH?>match.php">Matches Profile</a></li>
						<li><a href="<?=USER_PATH?>interest.php">Interests Profile</a></li>
					</ul>
					<div>
						<h5><b>Your Profile Status</b></h5>
						<div class="progress">
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70"
						  aria-valuemin="0" aria-valuemax="100" style="width:70%">
							70% Complete
						  </div>
						</div>
						<?php $aboutmeArr = $db->getRecord(0, array('more_detail'), ' tbl_profile_detail', array('profile_code_fk' => $_SESSION['userDetail']['profile_code']));
							$count = count($aboutmeArr);
							$detail ='';
							if($count>0)
							$detail = $aboutmeArr[0]['more_detail'];	
						?>
						<h5><b>About Us</b></h5>
						<p class="text-justify"><?= nl2br($detail) ?></p>
					</div>
					
				</div>
				<div class="profile-section2">
				<?php $alertCount = $db->getRecordCount(0, 'tbl_alerts', array('alert_to' => $_SESSION['userDetail']['profile_code'], 'read_status' => 'N')); ?>
					<ul>
						<li><a href="#">Alerts <span class="badge pull-right"><?= $alertCount ?></span></a></li>
						<li><a href="#">SMS Alerts <span class="badge pull-right">5</span></a></li>
						<li><a href="#">Notification <span class="badge pull-right">5</span></a></li>
						<li><a href="#">Message <span class="badge pull-right">5</span></a></li>
						<li class="active"><a href="#">View Full Profile</a></li>
					</ul>
					<div class="text-center">
						<a href="<?=USER_PATH?>upgrade.php" class="btn btn-default2">Upgrade Now</a>
					</div>
				</div>
			</div>
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
			<div class="col-sm-9 panel-body">
					
				 	<div class="row">
						<div class="col-md-12" style="padding-right: 30px;">
							<div class="tabbable-panel">
								<div class="tabbable-line">
									<ul class="nav nav-tabs ">
										<li class="<?=$tabActivePP?>">
											<a href="#tab_default_1" data-toggle="tab">
											Partner Prefrence </a>
										</li>
										<li class="<?=$tabActiveNM?>">
											<a href="#tab_default_2" data-toggle="tab">
											Newest Members </a>
										</li>
										<li class="<?=$tabActiveDM?>">
											<a href="#tab_default_3" data-toggle="tab">
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
									$usePrtnrPrefArr = $db->getRecord(0, array('*'), 'tbl_partner_preference', array('profile_code_fk' => $profileCode));	

									$whereClause = "a.profile_status = 'A' AND a.profile_code != '$profileCode' ";
									$heightRange = '';
									$ageRange = " AND ((DATEDIFF(CURDATE(), c.birth_date) / 365.25) >= ".$usePrtnrPrefArr[0]['age_from']." AND (DATEDIFF(CURDATE(), c.birth_date) / 365.25) <= ".$usePrtnrPrefArr[0]['age_to'].")";
									//$heightRange = " AND (c.height >= ".$usePrtnrPrefArr[0]['height_from']." AND c.height <= ".$usePrtnrPrefArr[0]['height_to'].")";									
									$whereClause .= " $ageRange $heightRange AND a.maritial_status = '".$usePrtnrPrefArr[0]['martial_status']."' AND a.religion_code = '".$usePrtnrPrefArr[0]['religion']."' OR a.community_code = '".$usePrtnrPrefArr[0]['community']."'";									
									
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['hobbies'], 'f.hobbies'); 
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['interests'], 'f.interests'); 
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['music'], 'f.music');
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['user_reads'], 'f.user_reads');
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['movies'], 'f.movies');
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['sports'], 'f.sports ');
									$whereClause .= makeQry4MultipleKey(0, $usePrtnrPrefArr[0]['languages'], 'f.languages');
			
									
									$tbls = "tbl_profiles a LEFT JOIN tbl_profile_detail c ON(a.profile_code = c.profile_code_fk)
										LEFT JOIN tbl_education_career d ON (a.profile_code = d.profile_code)
										LEFT JOIN tbl_member_contact_info e ON(a.profile_code = e.profile_code)
										LEFT JOIN tbl_user_hobby f ON(a.profile_code = f.profile_code AND f.profile_code != '$profileCode')";
									//$tbls = 'tbl_profiles a';
									$stpp = 0;
									$perPage = 6;
									if (!empty($_GET['stpp'])) $stpp = $_GET['stpp'];
									
									$selectedCols = "*, ROUND((DATEDIFF(CURDATE(), c.birth_date) / 365.25)) mage";
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
													//print_r($usePrtnrPrefArr[$i]['profile_code']);
													$profileCode = $usePrtnrPrefArr[$i]['profile_code'];
													$profileLink = "view-profile.php?pc=$profileCode";
?>												
													<div class="item col-sm-6 col-sm-12 col-lg-4 <?=$divViews?>">
														<div class="thumbnail">
															<a href="<?=$profileLink?>"><img class="group list-group-image img-thumbnail" src="img/partner/1.jpg" alt="" /></a>
															<div class="caption">
																<div class="row">
																	<div class="table-list">
																		<h4 class="group inner list-group-item-heading"><a href="<?=$profileLink?>"><?=ucwords($usePrtnrPrefArr[$i]['fname']." ".$usePrtnrPrefArr[$i]['lname'])?></a></h4>
																		<table class="table table-responsive">
																			<tr>
																				<td>Age :</td>
																				<td><?=$usePrtnrPrefArr[$i]['mage']?> Years</td>
																			</tr>
																			<tr>
																				<td>Community:</td>
																				<td><?=$usePrtnrPrefArr[$i]['mage']?></td>
																			</tr>
																			<tr>
																				<td>Profession :</td>
																				<td>Teacher</td>
																			</tr>
																			<tr>
																				<td>Location :</td>
																				<td>Mumbai</td>
																			</tr>
																		</table>
																	</div>
																	<div class="group inner list-group-item-text content">
																		<h3>Profile</h3>
																		<p>Family oriented person with cultural values, responsible, caring and professionally sound. It is a long established fact that a reader will be distracted by the readable content of a page...</p>
																	</div>
																	<hr>
																	<div class="thumbnail-footer text-center butn">
																		<a href="<?=$profileLink?>">View Full Profile</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
<?php	
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
											$stpm = 0;
											$perPage = 6;
											if (!empty($_GET['stpm'])) $stpm = $_GET['stpm'];

											$whereClausenm = " $whereClause GROUP BY a.profile_code";
											$usePrtnrPrefArr = $db->getRecord(0, $selectedCols, $tbls, $whereClausenm, $stpm, $perPage, "a.modified_on", 'DESC');
											$usePrtnrPrefArrCount = $db->getRecord(0, $selectedCols, $tbls, $whereClausenm, '', '', "a.modified_on", 'DESC');

											$totalNoOfRecords = count($usePrtnrPrefArrCount);
											$divPage = generatePagination($totalNoOfRecords, $perPage, $stpm, 'dashboard.php', "active=nm&divView=$divView", "stpm");	
											 if (is_array($usePrtnrPrefArr))
											 {
												$numOfRows = count($usePrtnrPrefArr);
												for ($i = 0; $i < $numOfRows; $i++)
												{
													$profileCode = $usePrtnrPrefArr[$i]['profile_code'];
													$profileLink = "view-profile.php?pc=$profileCode";
?>												
													<div class="item col-sm-6 col-sm-12 col-lg-4 <?=$divViews?>">
														<div class="thumbnail">
															<a href="<?=$profileLink?>"><img class="group list-group-image img-thumbnail" src="img/partner/1.jpg" alt="" /></a>
															<div class="caption">
																<div class="row">
																	<div class="table-list">
																		<h4 class="group inner list-group-item-heading"><a href="<?=$profileLink?>"><?=ucwords($usePrtnrPrefArr[$i]['fname']." ".$usePrtnrPrefArr[$i]['lname'])?></a></h4>
																		<table class="table table-responsive">
																			<tr>
																				<td>Age :</td>
																				<td><?=$usePrtnrPrefArr[$i]['mage']?> Years</td>
																			</tr>
																			<tr>
																				<td>Community:</td>
																				<td><?=$usePrtnrPrefArr[$i]['mage']?></td>
																			</tr>
																			<tr>
																				<td>Profession :</td>
																				<td>Teacher</td>
																			</tr>
																			<tr>
																				<td>Location :</td>
																				<td>Mumbai</td>
																			</tr>
																		</table>
																	</div>
																	<div class="group inner list-group-item-text content">
																		<h3>Profile</h3>
																		<p>Family oriented person with cultural values, responsible, caring and professionally sound. It is a long established fact that a reader will be distracted by the readable content of a page...</p>
																	</div>
																	<hr>
																	<div class="thumbnail-footer text-center butn">
																		<a href="<?=$profileLink?>">View Full Profile</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
<?php	
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
											$perPage = 6;
											if (!empty($_GET['stdm'])) $stdm = $_GET['stdm'];

											$whereClausenm = " $whereClause GROUP BY a.profile_code";
											$usePrtnrPrefArr = $db->getRecord(0, $selectedCols, $tbls, $whereClausenm, $stdm, $perPage, "a.modified_on", 'DESC');
											$usePrtnrPrefArrCount = $db->getRecord(0, $selectedCols, $tbls, $whereClausenm, '', '', "a.modified_on", 'DESC');

											$totalNoOfRecords = count($usePrtnrPrefArrCount);
											$divPage = generatePagination($totalNoOfRecords, $perPage, $stdm, 'dashboard.php', "active=dm&divView=$divView", "stdm");	
											 if (is_array($usePrtnrPrefArr))
											 {
												$numOfRows = count($usePrtnrPrefArr);
												for ($i = 0; $i < $numOfRows; $i++)
												{
													$profileCode = $usePrtnrPrefArr[$i]['profile_code'];
													$profileLink = "view-profile.php?pc=$profileCode";
?>												
													<div class="item col-sm-6 col-sm-12 col-lg-4 <?=$divViews?>">
														<div class="thumbnail">
															<a href="<?=$profileLink?>"><img class="group list-group-image img-thumbnail" src="img/partner/1.jpg" alt="" /></a>
															<div class="caption">
																<div class="row">
																	<div class="table-list">
																		<h4 class="group inner list-group-item-heading"><a href="<?=$profileLink?>"><?=ucwords($usePrtnrPrefArr[$i]['fname']." ".$usePrtnrPrefArr[$i]['lname'])?></a></h4>
																		<table class="table table-responsive">
																			<tr>
																				<td>Age :</td>
																				<td><?=$usePrtnrPrefArr[$i]['mage']?> Years</td>
																			</tr>
																			<tr>
																				<td>Community:</td>
																				<td><?=$usePrtnrPrefArr[$i]['mage']?></td>
																			</tr>
																			<tr>
																				<td>Profession :</td>
																				<td>Teacher</td>
																			</tr>
																			<tr>
																				<td>Location :</td>
																				<td>Mumbai</td>
																			</tr>
																		</table>
																	</div>
																	<div class="group inner list-group-item-text content">
																		<h3>Profile</h3>
																		<p>Family oriented person with cultural values, responsible, caring and professionally sound. It is a long established fact that a reader will be distracted by the readable content of a page...</p>
																	</div>
																	<hr>
																	<div class="thumbnail-footer text-center butn">
																		<a href="<?=$profileLink?>">View Full Profile</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
<?php	
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
								
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>				
</section>


<div class="chat_box">
	<div class="chat_header">
    	Online Members<i class="fa fa-plus-circle pull-right" aria-hidden="true"></i>
    </div>
    <div class="tab-content">
		<div id="menu" class="tab-pane fade in active">
			<div class="chat_body">
				<?php
					$profileCode = $_SESSION['userDetail']['profile_code'];
					$selectedCols = "m.request_to as to_id";
					$tbls = "`tbl_match_request` as `m` ";
					$where ='';
					$where.=" m.request_from='".$profileCode."' AND m.request_status='A' ";
					$ChatUSersList = $db->getRecord(0, $selectedCols, $tbls, $where, '', '', "", '');
					//print_r($ChatUSersList);
					//echo count($ChatUSersList);
					//echo "<hr>";
					//echo "data<hr>";
					//exit;
					function getUserDtl($profileCode){
						global $db;
						$selectedCols1 = "p.fname,p.mname,p.lname,p.login_status as login_status, ROUND((DATEDIFF(CURDATE(), pd.birth_date) / 365.25)) age, m.address_one,m.address_two,m.city_id_fk,m.state_id_fk,m.country_id_fk";
						$tbls1 = "`tbl_profiles` as p,`tbl_profile_detail` as pd,`tbl_member_contact_info` as m ";
						$where1 ='';
						$where1.=" p.profile_code=pd.profile_code_fk AND p.profile_code=m.profile_code AND p.profile_code='".$profileCode."' AND p.login_status='Y' ";
						$getUserDtlList = $db->getRecord(0, $selectedCols1, $tbls1, $where1, '', '', "", '');
						return $getUserDtlList;
						//print_r($getUserDtlList);
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
						}
					}
					
					
					
					$selectedCols1 = "count(0) as totalusers";
					$tbls1 = "`tbl_match_request` as `m` ";
					$where1 ='';
					$where1.=" m.request_to IN (SELECT profile_code from tbl_profiles WHERE login_status='Y') ";
					$ChatUSersList1 = $db->getRecord(0, $selectedCols1, $tbls1, $where1, '', '', "", '');
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
					//print_r($data);
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
					<a data-target='<?=$cul['to_id']?>' onClick="register_popup('<?=$cul['to_id']?>','<?=$conv_id?>','<?=$i?>', '<?=$username?>', '<?=$profilePic?>','<?=$age?>', '<?=$city_name?>', '<?=$state_name?>', '<?=$country_name?>');" onmouseenter="ShowUserDtl(<?=$i;?>);" id="btnPopover<?=$i;?>" data-content="<img src='<?=$profilePic?>' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5><?=$username?></h5> <h6><?=$age?>, <?=$city_name?>, <?=$state_name?>, <?=$country_name?></h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover"><?=$username?><span class="pull-right" <?php if($data[0]['login_status']=='Y'){ }else {?>style="color:#ccc;"<?php } ?>><i class="fa fa-comment" aria-hidden="true"></i></span></a>
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
				<div class="user1">
					<a href="#" id="btnPopover_3" data-content="<img src='img/partner/3.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Harshita Varma</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">
						<div class="row">
							<div class="col-sm-2"><img src="img/partner/3.jpg" width="30" height="30" class="img-circle"></div>
							<div class="col-sm-10"> <b>Harshita Varma </b> has sent you an Invitation to Connect <br><i>14 May</i> <button type="button" class="btn btn-danger btn-small"><i class="fa fa-check" aria-hidden="true"></i> Accepted</button></div>
						</div>
					</a>	
				</div>
				<div class="user1">
					<a href="#" id="btnPopover_4" data-content="<img src='img/partner/4.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Priya Kashyap</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">
						<div class="row">
							<div class="col-sm-2"><img src="img/partner/4.jpg" width="30" height="30" class="img-circle"></div>
							<div class="col-sm-10"> <b>Priya Kashyap</b> has sent you an Invitation to Connect <br><i>17 May</i> <button type="button" class="btn btn-danger btn-small"><i class="fa fa-check" aria-hidden="true"></i> Accepted</button></div>
						</div>
					</a>	
				</div>
				<div class="user1">
					<a href="#" id="btnPopover_5" data-content="<img src='img/partner/5.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Khushi Jain</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">
						<div class="row">
							<div class="col-sm-2"><img src="img/partner/5.jpg" width="30" height="30" class="img-circle"></div>
							<div class="col-sm-10"> <b>Khushi Jain</b> has sent you an Invitation to Connect <br><i>12 May</i> <button type="button" class="btn btn-danger btn-small"><i class="fa fa-check" aria-hidden="true"></i> Accepted</button></div>
						</div>
					</a>
				</div>
				<div class="user1">
					<a href="#" id="btnPopover_6" data-content="<img src='img/partner/6.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Deepika Patel</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">
						<div class="row">
							<div class="col-sm-2"><img src="img/partner/6.jpg" width="30" height="30" class="img-circle"></div>
							<div class="col-sm-10"> <b>Deepika Patel</b> has sent you an Invitation to Connec <br><i>12 May</i> <button type="button" class="btn btn-danger btn-small"><i class="fa fa-check" aria-hidden="true"></i> Accepted</button></div>
						</div> 
					</a>
				</div>
				
			</div>
		</div>
   		 <ul class="nav nav-tabs chat">
		<li class="active">
			<a data-toggle="tab" class="col-sm-12" href="#menu">Online (<?=$tot_logedin_usr?>)</a>
		</li>
		<li>
			<a data-toggle="tab" class="col-sm-12" href="#menu2"><i class="fa fa-bell-o" aria-hidden="true"></i> Alerts </a>
	   </li>
	</ul>
    </div>
   
</div>


<link href="<?=USER_PATH?>css/paging.css" rel="stylesheet" type="text/css" />
<?php include('footer.php'); ?>
<script>
	<?php //this function can remove a array element. ?>
	Array.remove = function(array, from, to) {
		var rest = array.slice((to || from) + 1 || array.length);
		array.length = from < 0 ? array.length + from : from;
		return array.push.apply(array, rest);
	};

	<?php //this variable represents the total number of popups can be displayed according to the viewport width ?>
	var total_popups = 0;
	
	<?php //arrays of popups ids ?>
	var popups = [];

	<?php //this is used to close a popup ?>
	function close_popup(id)
	{
		for(var iii = 0; iii < popups.length; iii++)
		{
			if(id == popups[iii])
			{
				Array.remove(popups, iii);
				
				document.getElementById(id).style.display = "none";
				
				calculate_popups();
				
				return;
			}
		}   
	}
	
	function msg_collapse(user_to)
	{
		$('.msg_wrap').hide();						
		var target = "#msg_wrap_" + user_to;
		$(".msg_wrap").not(target).hide();
		$(target).show();
	}
	
	<?php //displays the popups. Displays based on the maximum number of popups that can be displayed on the current viewport width ?>
	function display_popups()
	{
		var right = 250;
		
		var iii = 0;
		for(iii; iii < total_popups; iii++)
		{
			if(popups[iii] != undefined)
			{
				var element = document.getElementById(popups[iii]);
				element.style.right = right + "px";
				right = right + 250;
				element.style.display = "block";
			}
		}
		
		for(var jjj = iii; jjj < popups.length; jjj++)
		{
			var element = document.getElementById(popups[jjj]);
			element.style.display = "none";
		}
	}
	
	
	function calldata(user_to){
		var conversation_id = $("#cid_"+user_to).val();
		var user_form = $("#user_from"+user_to).val();
		var message = $("#message"+user_to).html();
		error = $("#error");
		if((message!='')&&(conversation_id!='')&&(user_form!='')&&(user_to!='')){
			$.post("post_message_ajax.php",{chat_message:message,chat_conversation_id:conversation_id,chat_user_form:user_form,chat_user_to:user_to}, function(data){
				error.text(data);
				$("#show_"+user_to).html(data);
				//$("#show_"+user_to).scrollTop($("#show_"+user_to)[0].scrollHeight);
				$("#message"+user_to).html('')
			}); 
			
		}
		
		$.get("get_chatmessage_ajax.php", {id: user_to} , function(data,status){
			//error.text(data);
			if(status=='success'){
			$("#show_"+user_to).html(data);
			$("#message_old"+user_to).val(data);
			$(".msg_body").scrollTop($(".msg_body").prop("scrollHeight"));
			$("#msg_body_"+user_to).scrollTop($("#msg_body_"+user_to).prop("scrollHeight")); 
			}else{
			$("#show_"+user_to).html('');	
			}
		});
		
	}
	
	function calldataenter(user_to,e){
		if (event.which == 13 || event.keyCode == 13) {
			var conversation_id = $("#cid_"+user_to).val();
			var user_form = $("#user_from"+user_to).val();
			var message = $("#message"+user_to).html();
			error = $("#error");
			if((message!='')&&(conversation_id!='')&&(user_form!='')&&(user_to!='')){
				//error.text("Sending...");
				$.post("post_message_ajax.php",{chat_message:message,chat_conversation_id:conversation_id,chat_user_form:user_form,chat_user_to:user_to}, function(data){
					error.text(data);
					$("#show_"+user_to).html(data);					
					$("#message"+user_to).html('')
				}); 
				
			}
			
			$.get("get_chatmessage_ajax.php", {id: user_to} , function(data,status){
				//error.text(data);
				if(status=='success'){
				$("#show_"+user_to).html(data);
				$("#message_old"+user_to).val(data);
				$("#msg_body_"+user_to).scrollTop($("#msg_body_"+user_to).prop("scrollHeight"));
				}else{
				$("#show_"+user_to).html('');	
				}
			});
		}
		
	}
	
	
	function show_icons(user_to){
		$("#emotions_"+user_to+"").toggle('slow');
	}
	
	function go_profile(user_to){
		<?php /* window.location.href = '<?php echo USER_PATH; ?>'+'view-profile.php?pc='+user_to; */ ?>
		window.open('<?php echo USER_PATH; ?>'+'view-profile.php?pc='+user_to,'_blank');
	}
	
	function go_chathistory(user_to){
		$.get("get_chatid_ajax.php", {id: user_to} , function(data){
			<?php /* window.location.href = '<?php echo USER_PATH; ?>'+'chat-history.php?c_id='+data+user_to; */ ?>
			window.open('<?php echo USER_PATH; ?>'+'chat-history.php?c_id='+data+user_to,'_blank');
		})
	}

	function ShowUserDtl(ID){
		//alert(ID)
		$('#btnPopover'+ID).popover();
	}
	
	function moveValue(val,user_to) { 
		//alert(val+','+user_to);
		var txt=$("#message"+user_to).val(); 
		txt=txt + val; 
		//alert(txt); 
		//$("#message").html(txt);
		$("#message"+user_to).append(txt);
		$("#emotions_"+user_to+"").toggle('slow');
	} 
	
	function showchatdata(user_to){
		setInterval(function(){
        	$.get("get_chatmessage_ajax.php", {id: user_to} , function(data,status){
				//error.text(data);
				if(status=='success'){
				$("#show_"+user_to).html(data);
				$("#message_old"+user_to).val(data);
				$("#msg_body_"+user_to).scrollTop($("#msg_body_"+user_to).prop("scrollHeight"));				
				}else{
				$("#show_"+user_to).html('');	
				}
			});              
		}, 5000);
	}
	<?php //creates markup for a new popup. Adds the id to popups array. ?>
	function register_popup(user_to,convid, id, name, img, age, city_name, state_name, country_name)
	{
		
		for(var iii = 0; iii < popups.length; iii++)
		{   
			
			if(id == popups[iii])
			{
				Array.remove(popups, iii);
			
				<?php //popups.unshift(id); ?>
				popups.push(id);
				
				calculate_popups();
				
				
				return;
			}
		}               
			
		$('.popover').css("display","none");
		

		$('.msg_wrap').hide();						
		var target = "#msg_wrap_" + user_to;
		$(".msg_wrap").not(target).hide();
		$(target).show();
		
		$.get("get_chatmessage_ajax.php", {id: user_to} , function(data,status){
			//error.text(data);
			if(status=='success'){
			$("#show_"+user_to).html(data);
			$("#message_old"+user_to).val(data);
			$("#msg_body_"+user_to).scrollTop($("#msg_body_"+user_to).prop("scrollHeight"));				
			}else{
			$("#show_"+user_to).html('');	
			}
		});  	
		
		showchatdata(user_to);
		
		var myicons='';
		myicons+='<div class="icondata"><a href=""><img src="" alt="icon1" title="icon1"></a></div>';
		
	
		
		var imgdata;
		imgdata ='';
		imgdata+='<div id="emotions_'+user_to+'" style="display:none;">';
		
		imgdata+='<input type="image" src="chatimages/alien1.png" alt="alien" title="alien" value=\'<img src=chatimages/alien1.png alt="alien" title="alien">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/annoyed.png" alt="annoyed" title="annoyed" value=\'<img src=chatimages/annoyed.png alt="annoyed" title="annoyed">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/angel.png" alt="angel" title="angel" value=\'<img src=chatimages/angel.png alt="angel" title="angel">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		
		imgdata+='<input type="image" src="chatimages/zzz.png" alt="zzz" title="zzz" value=\'<img src=chatimages/zzz.png alt="zzz" title="zzz">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/blanco.png" alt="blanco" title="blanco" value=\'<img src=chatimages/blanco.png alt="blanco" title="blanco">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/zip_it.png" alt="zip it" title="zip it" value=\'<img src=chatimages/zip_it.png alt="zip it" title="zip it">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		
		imgdata+='<input type="image" src="chatimages/boring.png" alt="boring" title="boring" value=\'<img src=chatimages/boring.png alt="boring" title="boring">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/brb.png" alt="brb" title="brb" value=\'<img src=chatimages/brb.png alt="brb" title="brb">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/busy.png" alt="busy" title="busy" value=\'<img src=chatimages/busy.png alt="busy" title="busy">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		
		imgdata+='<input type="image" src="chatimages/cellphone.png" alt="cell phone" title="cell phone" value=\'<img src=chatimages/cellphone.png alt="cell phone" title="cell phone">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/clock.png" alt="clock" title="clock" value=\'<img src=chatimages/clock.png alt="clock" title="clock">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/cool.png" alt="cool" title="cool" value=\'<img src=chatimages/cool.png alt="cool" title="cool">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		
		imgdata+='<input type="image" src="chatimages/crazy.png" alt="crazy" title="crazy" value=\'<img src=chatimages/crazy.png alt="crazy" title="crazy">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/cry.png" alt="cry" title="cry" value=\'<img src=chatimages/cry.png alt="cry" title="cry">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/devil.png" alt="devil" title="devil" value=\'<img src=chatimages/devil.png alt="devil" title="devil">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		
		imgdata+='<input type="image" src="chatimages/blush.png" alt="blush" title="blush" value=\'<img src=chatimages/blush.png alt="blush" title="blush">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/dnd.png" alt="dnd" title="dnd" value=\'<img src=chatimages/dnd.png alt="dnd" title="dnd">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/flower.png" alt="flower" title="flower" value=\'<img src=chatimages/flower.png alt="flower" title="flower">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		
		imgdata+='<input type="image" src="chatimages/heart.png" alt="heart" title="heart" value=\'<img src=chatimages/heart.png alt="heart" title="heart">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/geek.png" alt="geek" title="geek" value=\'<img src=chatimages/geek.png alt="geek" title="geek">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/gift.png" alt="gift" title="gift" value=\'<img src=chatimages/gift.png alt="gift" title="gift">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		
		imgdata+='<input type="image" src="chatimages/ill.png" alt="ill" title="ill" value=\'<img src=chatimages/ill.png alt="ill" title="ill">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/in_love.png" alt="in love" title="in love" value=\'<img src=chatimages/in_love.png alt="in love" title="in love">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/text_file.png" alt="text file" title="text file" value=\'<img src=chatimages/text_file.png alt="text file" title="text file">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		
		imgdata+='<input type="image" src="chatimages/kissy.png" alt="kissy" title="kissy" value=\'<img src=chatimages/kissy.png alt="kissy" title="kissy">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/laugh.png" alt="laugh" title="laugh" value=\'<img src=chatimages/laugh.png alt="laugh" title="laugh">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/mail.png" alt="mail" title="mail" value=\'<img src=chatimages/mail.png alt="mail" title="mail">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		
		imgdata+='<input type="image" src="chatimages/music2.png" alt="music" title="music" value=\'<img src=chatimages/music2.png alt="music" title="music">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/not_guilty.png" alt="not guilty" title="not guilty" value=\'<img src=chatimages/not_guilty.png alt="not guilty" title="not guilty">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/please.png" alt="please" title="please" value=\'<img src=chatimages/please.png alt="please" title="please">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		
		imgdata+='<input type="image" src="chatimages/info.png" alt="info" title="info" value=\'<img src=chatimages/info.png alt="info" title="info">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/sad.png" alt="sad" title="sad" value=\'<img src=chatimages/sad.png alt="sad" title="sad">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/silly.png" alt="silly" title="silly" value=\'<img src=chatimages/silly.png alt="silly" title="silly">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		
		imgdata+='<input type="image" src="chatimages/oh.png" alt="Laugh Out Loud" title="Laugh Out Loud" value=\'<img src=chatimages/oh.png alt="Laugh Out Loud" title="Laugh Out Loud">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/speechless.png" alt="speechless" title="speechless" value=\'<img src=chatimages/speechless.png alt="speechless" title="speechless">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/surprised.png" alt="surprised" title="surprised" value=\'<img src=chatimages/surprised.png alt="surprised" title="surprised">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		
		imgdata+='<input type="image" src="chatimages/tease.png" alt="tease" title="tease" value=\'<img src=chatimages/tease.png alt="tease" title="tease">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/wink.png" alt="wink" title="wink" value=\'<img src=chatimages/wink.png alt="wink" title="wink">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		imgdata+='<input type="image" src="chatimages/xd.png" alt="Big Grin" title="Big Grin" value=\'<img src=chatimages/xd.png alt="Big Grin" title="Big Grin">\' onclick="moveValue(this.value,\''+ user_to +'\')">'; 
		
		imgdata+='</div>'; 
		
		user_from = '<?=$_SESSION['userDetail']['profile_code'];?>';	
		var element = '<div class="msg_box" id="'+ id +'">';
		element = element + '<a href="javascript:msg_collapse(\''+ user_to +'\');"><div class="msg_head chat_header">'+ name +' <div class="pull-right close1"><a href="javascript:close_popup(\''+ id +'\');">X</a></div></div>';
		element = element + '<div class="popup-head-right"></div></a>';
		element = element + '<div class="msg_wrap" id="msg_wrap_'+ user_to +'" style="display:block;"><div class="msg_body" id="msg_body_'+user_to+'"><a href="javascript:go_profile(\''+ user_to +'\');" class="nav_chat">View Profile</a><a href="javascript:go_chathistory(\''+ user_to +'\');" class="nav_chat">Chat History</a><div class="chat_user_profile"><img src='+img+'><div class="details"><h4>'+name+'</h4><p>'+age+', '+city_name+', '+state_name+', '+country_name+'</p></div></div><div class="tst"><div id="show_'+user_to+'"></div></div> </div>';
		element = element + '<div class="msg_footer">'+imgdata+'<a class="emotion btn btn-danger collapsed" id="emotion_'+user_to+'" href="javascript:show_icons(\''+ user_to +'\');"><i class="fa fa-smile-o" aria-hidden="true"></i></a><form id="form'+user_to+'" ><input type="hidden" name="c_id" id="cid_'+user_to+'" value="'+convid+'"><input type="hidden" name="user_to" id="user_to'+user_to+'" value="'+user_to+'"><input type="hidden" name="user_from" id="user_from'+user_to+'" value="'+user_from+'"><input type="hidden" name="message_old" id="message_old'+user_to+'" value=""><div style="resize: none; width:180px; display:inline-block; overflow-y:scroll;" class="form-control" rows="1" id="message'+user_to+'" contenteditable="true" style="overflow: auto; min-height:200px;" value="" name="message1" onkeydown="javascript:calldataenter(\''+ user_to +'\',\''+ event +'\');"></div><button type="button" id="send_'+user_to+'" onClick="javascript:calldata(\''+ user_to +'\');" class="btn btn-danger"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button></form></div></div>';
		element = element + '</div>';
		
		document.getElementsByTagName("body")[0].innerHTML = document.getElementsByTagName("body")[0].innerHTML + element;  

		<?php //popups.unshift(id); ?>
		popups.push(id);	
		calculate_popups();
		
	}
	
	<?php //calculate the total number of popups suitable and then populate the toatal_popups variable. ?>
	function calculate_popups()
	{
		var width = window.innerWidth;
		if(width < 540)
		{
			total_popups = 0;
		}
		else
		{
			width = width - 200;
			//320 is width of a single popup box
			total_popups = parseInt(width/320);
		}
		
		display_popups();
		
	}
	
	<?php //recalculate when window is loaded and also when window is resized. ?>
	window.addEventListener("resize", calculate_popups);
	window.addEventListener("load", calculate_popups);
	
</script> 
<script>
$(document).ready(function(){
	$(".slidingDiv").hide();
	$(".show_hide").show();
	$('.show_hide').click(function(){
		$(".slidingDiv").slideToggle();
	});
});
</script>
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
});
</script>
<script>
	
	$(document).ready(function(e) {
		$('.chat_body').hide();
		$('.chat').hide();
        $('.chat_header').click(function(e) {
			$('.chat_body').slideToggle(500);
			$('.chat').slideToggle(500);
			$(this).find('i').toggleClass('fa-minus-circle fa-plus-circle')
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
/*	
	$(document).ready(function(e) {
		$('.user').click(function(e) {
			alert('user is click');
			$('.msg_wrap').show();
			$('#msg_box_'+ID).show();
		});
	});
	
	function ShowUserChatBox(ID){
		$(document).ready(function(e) {
			$('.close1').click(function(e) {
				$('#msg_box_'+ID).hide(500);
			});
		});
		$(document).ready(function(e) {
			$('.user').click(function(e) {
				$('.msg_wrap').show();
				$('#msg_box_'+ID).show();
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
	}
	
	*/
	
</script>