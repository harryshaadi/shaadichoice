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


<?php
					//$ChatUSersList = array();
					//SELECT m.request_to as to_id, p.login_status as login_status FROM `tbl_profiles` as `p`, `tbl_match_request` as `m` WHERE m.request_from='827ccb0eea8a706c4c34a16891f84e7b' AND m.request_from=p.profile_code AND m.request_status='A' AND p.profile_status='A' 
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
					
					//SELECT count(0) as tot FROM tbl_match_request as m WHERE m.request_to IN (SELECT profile_code from tbl_profiles WHERE login_status='Y')
					$selectedCols1 = "count(0) as totalusers";
					$tbls1 = "`tbl_match_request` as `m` ";
					$where1 ='';
					$where1.=" m.request_to IN (SELECT profile_code from tbl_profiles WHERE login_status='Y') ";
					$ChatUSersList1 = $db->getRecord(0, $selectedCols1, $tbls1, $where1, '', '', "", '');
					$tot_logedin_usr = count($ChatUSersList1);
					//print_r($ChatUSersList);
					$i=0;
					//print_r($ChatUSersList);
					echo $tot_matched = count($ChatUSersList);
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
					}
					?>
				

<div class="d">
	<center>
		<?php 
		$data = getUserDtl($_SESSION['userDetail']['profile_code']);  
		if($data[0]['fname']){ $fname = $data[0]['fname'] .' '; }else{ $fname = "Dummy User"; }
		if($data[0]['mname']){ $mname = $data[0]['mname'] .' '; }else{ $mname = $data[0]['mname']; }
		if($data[0]['lname']){ $lname = $data[0]['lname'] .' '; }else{ $lname = $data[0]['lname']; }
		$username = $fname.$mname.$lname;
		?>
        <strong>Welcome <?php echo $username; ?>  <a href="logout.php">logout</a></strong>
    </center>
     
    <div class="message-body">
        <div class="message-left">
            <ul>
                <?php
                    //show all the users expect me
                   // print_r($ChatUSersList);
					//if($tot_matched>0){
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
						echo "<a href='dashboard-sk2.php?id={$cul['to_id']}'><li><img src='{$profilePic}' style='width:80px;'> {$username}</li></a>";
						}
					
                ?>
            </ul>
        </div>
 
        <div class="message-right">
            <!-- display message -->
            <div class="display-message">
			<?php
			
                //check $_GET['id'] is set
                if(isset($_GET['id'])){
                    $user_two = trim($_GET['id']);
                    $where ='';
					$where.=" profile_code='".$user_two."' AND profile_code<>'".$_SESSION['userDetail']['profile_code']."' ";
					$prof = $db->getRecord(0, array('profile_code'), 'tbl_profiles', $where);
					//print_r($prof);
					$q = count($prof);	
					//valid $user_two
                    if($q==1){
                        echo "I am getting problem in getting msg<br/>";
						$user_two = trim($_GET['id']);
						$where ='';
						//$where.=" profile_code='".$user_two."' AND profile_code<>'".$_SESSION['userDetail']['profile_code']."' ";
						$where.=" (user_one='".$_SESSION['userDetail']['profile_code']."' AND user_two='$user_two') OR (user_one='$user_two' AND user_two='".$_SESSION['userDetail']['profile_code']."') ";
						$conversation = $db->getRecord(0, array('*'), 'tbl_conversation', $where);
						$conver = count($conversation);
						
						if($conver>0){
                            echo 'test';
                            $conversation_id = $conversation[0]['id'];
                        }else{
							echo'non test';
							$arrProfileDetailsFields = array('user_one'=>$_SESSION['userDetail']['profile_code'],'user_two'=>$user_two);
							$conversation_id = $db->addRecord(0, $arrProfileDetailsFields, 'tbl_conversation');
                        }
                    }else{
                        die("Invalid ID.");
                    }
                }else {
                    die("Click On the Person to start Chating.");
                }
            ?>
            </div>
            <!-- /display message -->
 
            <!-- send message -->
			<div class="send-message">
                <!-- store conversation_id, user_from, user_to so that we can send send this values to post_message_ajax.php -->
				
                <input type="hidden" id="conversation_id" name="conversation_id" value="<?php echo base64_encode($conversation_id); ?>">
                <input type="hidden" id="user_form" name="user_form" value="<?php echo base64_encode($_SESSION['userDetail']['profile_code']); ?>">
                <input type="hidden" id="user_to" name="user_to" value="<?php echo base64_encode($user_two); ?>">
                <div class="form-group">
					<div id="showim"><strong>Show Icons</strong></div>
					<div id="emotion" style="display:;">
					
						<input type="image" src="chatimages/alien1.png" alt="alien" title="alien" value='<img src="chatimages/alien1.png" alt="alien" title="alien">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/annoyed.png" alt="annoyed" title="annoyed" value='<img src="chatimages/annoyed.png" alt="annoyed" title="annoyed">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/angel.png" alt="angel" title="angel" value='<img src="chatimages/angel.png" alt="angel" title="angel">' onclick="moveValue(this.value)">
						
						<input type="image" src="chatimages/zzz.png" alt="zzz" title="sleep" value='<img src="chatimages/zzz.png" alt="zzz" title="zzz">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/blanco.png" alt="blanco" title="blank face" value='<img src="chatimages/blanco.png" alt="blanco" title="blanco">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/zip_it.png" alt="zip_it" title="Keep Secret" value='<img src="chatimages/zip_it.png" alt="zip_it" title="zip_it">' onclick="moveValue(this.value)">
						
						<input type="image" src="chatimages/boring.png" alt="boring" title="boring" value='<img src="chatimages/boring.png" alt="boring" title="boring">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/brb.png" alt="brb" title="be right back" value='<img src="chatimages/brb.png" alt="brb" title="brb">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/busy.png" alt="busy" title="busy" value='<img src="chatimages/busy.png" alt="busy" title="busy">' onclick="moveValue(this.value)">
						
						<input type="image" src="chatimages/cellphone.png" alt="cellphone" title="On Call" value='<img src="chatimages/cellphone.png" alt="cellphone" title="cellphone">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/clock.png" alt="clock" title="Time Please" value='<img src="chatimages/clock.png" alt="clock" title="clock">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/cool.png" alt="cool" title="cool" value='<img src="chatimages/cool.png" alt="cool" title="cool">' onclick="moveValue(this.value)">
						                         
						<input type="image" src="chatimages/crazy.png" alt="crazy" title="crazy" value='<img src="chatimages/crazy.png" alt="crazy" title="crazy">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/cry.png" alt="cry" title="cry" value='<img src="chatimages/cry.png" alt="cry" title="cry">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/devil.png" alt="devil" title="devil" value='<img src="chatimages/devil.png" alt="devil" title="devil">' onclick="moveValue(this.value)">
						                         
						<input type="image" src="chatimages/blush.png" alt="blush" title="blush" value='<img src="chatimages/blush.png" alt="blush" title="blush">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/dnd.png" alt="dnd" title="Stop" value='<img src="chatimages/dnd.png" alt="dnd" title="dnd">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/flower.png" alt="flower" title="flower" value='<img src="chatimages/flower.png" alt="flower" title="flower">' onclick="moveValue(this.value)">						  
						                         
						<input type="image" src="chatimages/heart.png" alt="heart" title="heart" value='<img src="chatimages/heart.png" alt="heart" title="heart">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/geek.png" alt="geek" title="geek" value='<img src="chatimages/geek.png" alt="geek" title="geek">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/gift.png" alt="gift" title="gift" value='<img src="chatimages/gift.png" alt="gift" title="gift">' onclick="moveValue(this.value)">			  
						                         
						<input type="image" src="chatimages/ill.png" alt="ill" title="ill" value='<img src="chatimages/ill.png" alt="ill" title="ill">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/in_love.png" alt="in_love" title="in love" value='<img src="chatimages/in_love.png" alt="in_love" title="in_love">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/text_file.png" alt="text_file" title="text_file" value='<img src="chatimages/text_file.png" alt="text_file" title="text_file">' onclick="moveValue(this.value)">			  
						                         
						<input type="image" src="chatimages/kissy.png" alt="kissy" title="kissy" value='<img src="chatimages/kissy.png" alt="kissy" title="kissy">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/laugh.png" alt="laugh" title="laugh" value='<img src="chatimages/laugh.png" alt="laugh" title="laugh">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/mail.png" alt="mail" title="mail" value='<img src="chatimages/mail.png" alt="mail" title="mail">' onclick="moveValue(this.value)">
						                         
						<input type="image" src="chatimages/music2.png" alt="music2" title="music2" value='<img src="chatimages/music2.png" alt="music2" title="music2">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/not_guilty.png" alt="not_guilty" title="not_guilty" value='<img src="chatimages/not_guilty.png" alt="not_guilty" title="not_guilty">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/please.png" alt="please" title="please" value='<img src="chatimages/please.png" alt="please" title="please">' onclick="moveValue(this.value)">	  
						                         
						<input type="image" src="chatimages/info.png" alt="info" title="info" value='<img src="chatimages/info.png" alt="info" title="info">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/sad.png" alt="sad" title="sad" value='<img src="chatimages/sad.png" alt="sad" title="sad" value=":sad">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/silly.png" alt="silly" title="silly" value='<img src="chatimages/silly.png" alt="silly" title="silly">' onclick="moveValue(this.value)">						  
						                         
						<input type="image" src="chatimages/oh.png" alt="oh" title="Laugh Out Loud" value='<img src="chatimages/oh.png" alt="Laugh Out Loud" title="Laugh Out Loud">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/speechless.png" alt="speechless" title="speechless" value='<img src="chatimages/speechless.png" alt="speechless" title="speechless">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/surprised.png" alt="surprised" title="surprised" value='<img src="chatimages/tease.png" alt="surprised" title="surprised">' onclick="moveValue(this.value)"> 
						                         
						<input type="image" src="chatimages/tease.png" alt="tease" title="tease" value='<img src="chatimages/tease.png" alt="tease" title="tease">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/wink.png" alt="wink" title="wink" value='<img src="chatimages/wink.png" alt="wink" title="wink">' onclick="moveValue(this.value)"> 
						<input type="image" src="chatimages/xd.png" alt="Big Grin" title="Big Grin" value='<img src="chatimages/xd.png" alt="Big Grin" title="Big Grin">' onclick="moveValue(this.value)">  
                    </div>
					<!--<input type="text" name="t" id="t" value="" class="textbox" autocomplete="off" placeholder="Enter message" />-->
					<div class="form-control" id="message" name="message" placeholder="Enter Your Message" contenteditable="true" style="overflow: auto; height:200px;" value=""></div>
                </div>
                <button class="btn btn-primary" id="reply">Send</button>  
                <span id="error"></span>
				
			</div>
            <!-- / send message -->
        </div>
    </div>
	<?php
    echo "You have not requested yet for chat or no one requested you for chat.";
	}
    ?>
</div>

<link href="<?=USER_PATH?>css/paging.css" rel="stylesheet" type="text/css" />
<?php 

	include('footer.php');
?>
<script type="text/javascript">	
		$("#showim").click(function(){
			$("#emotion").toggle();
		});
	</script>
	<script> 
		function moveValue(val) { 
			/* var txt=document.getElementById("message").value; 
			txt=txt + val; 
			document.getElementById("message").value=txt
			 */
			//var txt=$("#message").text(); 
			var txt=$("#message").val(); 
			txt=txt + val; 
			//alert(txt); 
			//$("#message").html(txt); 
			$("#message").append(txt);
		} 
	</script>
	
<script type="text/javascript">
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
		
		/* var data;
		alert(img);
		data='';
		data+='<img src='+img+'>';
		data+='<span>hi hello how r u what r u doing? will u meet me on saturday or monday</span><br>';
		data+='<img src='+img+'>';
		data+='<span>hello who r u?</span><br>';
		data+='<img src='+img+'>';
		data+='<span>hello who r u?</span><br>';
		data+='<img src='+img+'>';
		data+='<span>hello who r u?</span><br>';
		var myicons='';
		myicons+='<div id="icon_imgs"><img src="" alt="icon1" title="icon1"></div>';
		 */
		var data;
		data = '';
		data = data + '<img src="http://shaadichoice.com/uploads/profile_pic/84931b69dc.png">';
		data = data + '<span>hi hello how r u what r u doing? will u meet me on saturday or monday</span><br>';
		data = data + '<img src="http://shaadichoice.com/uploads/profile_pic/e5ca97e21f.jpg">';
		data = data + '<span>hello who r u?</span><br>';
		data = data + '<img src="http://shaadichoice.com/uploads/profile_pic/84931b69dc.png">';
		data = data + '<span>hello who r u?</span><br>';
		data = data + '<img src="http://shaadichoice.com/uploads/profile_pic/e5ca97e21f.jpg">';
		data = data + '<span>hello who r u?</span><br>';
		var myicons = '';
		myicons = myicons + '<div id="icon_imgs"><img src="" alt="icon1" title="icon1"></div>';
	
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
		element = element + '<div class="msg_wrap"><div class="msg_body"><a href="http" class="nav_chat">View Profile</a><a href="http" class="nav_chat">Chat History</a><div><img src='+img+' style="width:50%"></div><div class="tst">'+data+'</div> <div class="msg_insert"></div></div>';
		element = element + '<div class="msg_footer"><div id="icon_img">click</div>'+myicons+'<form method="post"><textarea style=" resize: none;" class="form-control" rows="1"></textarea></form></div></div>';
		element = element + '</div>';
		
		document.getElementsByTagName("div")[0].innerHTML = document.getElementsByTagName("div")[0].innerHTML + element;  

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
		function moveValue(val) { 
			/* var txt=document.getElementById("message").value; 
			txt=txt + val; 
			document.getElementById("message").value=txt
			 */
			//var txt=$("#message").text(); 
			var txt=$("#message").val(); 
			txt=txt + val; 
			//alert(txt); 
			//$("#message").html(txt); 
			$("#message").append(txt);
		} 
	</script>
<script>	
$(document).ready(function() {
	//alert('I am ready');
	$("#icon_img").click(function(){
		$("#icon_imgs").toggle();
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
<script type="text/javascript" src="js/chatscript.js"></script> 
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
