
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
					$selectedCols = "m.request_to as to_id, p.login_status as login_status";
					$tbls = "`tbl_profiles` as `p`, `tbl_match_request` as `m` ";
					$where ='';
					$where.=" p.profile_code='".$profileCode."' AND m.request_from=p.profile_code AND m.request_status='A' AND p.profile_status='A' ";
					$ChatUSersList = $db->getRecord(0, $selectedCols, $tbls, $where, '', '', "", '');
					
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
					
					//SELECT count(0) as tot FROM tbl_match_request as m WHERE m.request_to IN (SELECT profile_code from tbl_profiles WHERE login_status='Y')
					$selectedCols1 = "count(0) as totalusers";
					$tbls1 = "`tbl_match_request` as `m` ";
					$where1 ='';
					$where1.=" m.request_to IN (SELECT profile_code from tbl_profiles WHERE login_status='Y') ";
					$ChatUSersList1 = $db->getRecord(0, $selectedCols1, $tbls1, $where1, '', '', "", '');
					$tot_logedin_usr = count($ChatUSersList1);
					//print_r($ChatUSersList);
					$i=0;
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
					
					?>
				<div class="user">
					<a onClick="register_popup('<?=$i?>', '<?=$username?>', '<?=$profilePic?>');" onmouseover="ShowUserDtl(<?=$i;?>);" id="btnPopover<?=$i;?>" data-content="<img src='<?=$profilePic?>' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5><?=$username?></h5> <h6><?=$age?>, <?=$city_name?>, <?=$state_name?>, <?=$country_name?></h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover"><?=$username?><span class="pull-right" <?php if($data[0]['login_status']=='Y'){ }else {?>style="color:#ccc;"<?php } ?>><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				
				<?php  $i++; }  ?>
			</div>
		</div>
   		
   		<div id="menu2" class="tab-pane fade in">
			<div class="chat_body">
				<?php 
					/* $i=0; 
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
					//echo $data[0]['login_status'];
					$profilePic = getUserPic($cul['to_id']); */
				?>
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
		<!--<li><a data-toggle="tab" href="#menu1"><i class="fa fa-comment" aria-hidden="true"></i> Chat</a></li>-->
	    <li>
			<a data-toggle="tab" class="col-sm-12" href="#menu2"><i class="fa fa-bell-o" aria-hidden="true"></i> Alerts </a>
	   </li>
	</ul>
    </div>
   
</div>


<link href="<?=USER_PATH?>css/paging.css" rel="stylesheet" type="text/css" />



<?php 

	include('footer.php');
?>

<script>
	//this function can remove a array element.
	Array.remove = function(array, from, to) {
		var rest = array.slice((to || from) + 1 || array.length);
		array.length = from < 0 ? array.length + from : from;
		return array.push.apply(array, rest);
	};

	//this variable represents the total number of popups can be displayed according to the viewport width
	var total_popups = 0;
	
	//arrays of popups ids
	var popups = [];

	//this is used to close a popup
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

	//displays the popups. Displays based on the maximum number of popups that can be displayed on the current viewport width
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
	
	//creates markup for a new popup. Adds the id to popups array.
	function register_popup(id, name,img)
	{
		
		for(var iii = 0; iii < popups.length; iii++)
		{   
			//already registered. Bring it to front.
			if(id == popups[iii])
			{
				Array.remove(popups, iii);
			
				//popups.unshift(id);
				popups.push(id);
				
				calculate_popups();
				
				
				return;
			}
		}               
		
		var data;
		data='';
		data+='<img src="http://shaadichoice.com/uploads/profile_pic/84931b69dc.png">';
		data+='<span>hi hello how r u what r u doing? will u meet me on saturday or monday</span><br>';
		data+='<img src="http://shaadichoice.com/uploads/profile_pic/e5ca97e21f.jpg">';
		data+='<span>hello who r u?</span><br>';
		data+='<img src="http://shaadichoice.com/uploads/profile_pic/84931b69dc.png">';
		data+='<span>hello who r u?</span><br>';
		data+='<img src="http://shaadichoice.com/uploads/profile_pic/e5ca97e21f.jpg">';
		data+='<span>hello who r u?</span><br>';
		var myicons='';
		myicons+='<div class="icondata"><a href=""><img src="" alt="icon1" title="icon1"></a></div>';
	/*
		data+='<div class="msg_a">';
		data+='hi, how r u doing?';
		data+='</div>';
		data+='<div class="msg_b">';
		data+='second user data';
		data+='</div>';
		/* 
		var fudata;
		fudata='';
		fudata+='<div class="msg_a">';
		fudata+='hi, how r u doing?';
		fudata+='</div>';
		var sudata;
		sudata='';
		sudata+='<div class="msg_b">';
		sudata+='second user data';
		sudata+='</div>';
		
		
		fudata+='<div class="msg_a">';
		fudata+='hi, how r u doing?';
		fudata+='</div>'; 
		*/
				
		var element = '<div class="msg_box" id="'+ id +'">';
		element = element + '<div class="msg_head">'+ name +' <div class="pull-right close1"><a href="javascript:close_popup(\''+ id +'\');">X</a></div></div>';
		element = element + '<div class="popup-head-right"></div>';
		element = element + '<div class="msg_wrap"><div class="msg_body"><a href="http" class="nav_chat">View Profile</a><a href="http" class="nav_chat">Chat History</a><div class="chat_user_profile"><img src='+img+'><div class="details"><h4>Dummy</h4><p>28, Chaman, Delhi, India</p></div></div><div class="tst">'+data+'</div> <div class="msg_insert"></div></div>';
		element = element + '<div class="msg_footer"><div class="iconsd">click</div>'+myicons+'<form><textarea style=" resize: none; width:160px; display:inline-block;" class="form-control" rows="1"></textarea><button type="button" data-toggle="collapse" data-target="#demo" class="btn btn-danger" style="display:inline-block;margin-top:-29px;"><i class="fa fa-smile-o" aria-hidden="true"></i></button><button type="button" data-toggle="collapse" data-target="#demo" class="btn btn-danger" style="display:inline-block;margin-top:-29px;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button> <div id="demo" class="collapse">hggggg</div></form></div></div>';
		element = element + '</div>';
		
		document.getElementsByTagName("body")[0].innerHTML = document.getElementsByTagName("body")[0].innerHTML + element;  

		//popups.unshift(id);
		popups.push(id);
				
		calculate_popups();
		
	}
	
	//calculate the total number of popups suitable and then populate the toatal_popups variable.
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
	
	//recalculate when window is loaded and also when window is resized.
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
	//alert('I am ready');
	
	 function() {
        $(".iconsd").click(function() {
            $(".icondata").slideToggle();
        });
    });
	
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
	
/*	
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
$('input#option1').click(function () {
     if ($(this).is(":checked")) {
         $('.tb1').css('color', '#504e4e')
     } else {
         $('.tb1').css('color', '#9a2729')
     }
});
$('input#option2').click(function () {
     if ($(this).is(":checked")) {
         $('.tb2').css('color', '#504e4e')
     } else {
         $('.tb2').css('color', '#9a2729')
     }
});
$('input#option3').click(function () {
     if ($(this).is(":checked")) {
         $('.tb3').css('color', '#504e4e')
     } else {
         $('.tb3').css('color', '#9a2729')
     }
});
$('input#option4').click(function () {
     if ($(this).is(":checked")) {
         $('.tb4').css('color', '#504e4e')
     } else {
         $('.tb4').css('color', '#9a2729')
     }
});
$('input#option5').click(function () {
     if ($(this).is(":checked")) {
         $('.tb5').css('color', '#504e4e')
     } else {
         $('.tb5').css('color', '#9a2729')
     }
});
</script>

<script>

	function ShowUserDtl(ID){
		//alert(ID)
		$('#btnPopover'+ID).popover();
		$('#btnPopover_'+ID).popover();
		$('#btnPopover_2').popover();
	}
/*	
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
*/
$(document).ready(function(){
	<?php if(isset($_SESSION['congrats']) && !empty($_SESSION['congrats'])){ ?>
	$('#welcome-message-div').css('display','block');
	
	setTimeout(function () {
      $('#welcome-message-div').hide();
	  <?php unset($_SESSION['congrats']); ?>
  }, 30000);
	<?php } ?>
})



</script>
