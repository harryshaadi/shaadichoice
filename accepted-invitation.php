<?php 
	include('head.php');
?> 
<link href="css/jquery.css" rel="stylesheet" type="text/css" />
<!--  end navbar -->
<section>
	<div class="container bootstrap snippets edit-profile">
		<div class="row">
	  		<div class="col-sm-3 search-panel">
			<form>
				<h2>Search Profile</h2>

				<div class="panel-group" id="accordion">
			  		<div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse0">
						Location
						<span class="fa fa-minus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse0" class="panel-collapse collapse in">
						<div class="panel-body1">
								<div class="check">
									<div class="radio">
									  <label><input type="radio" name="optradio">Noida</label>
									</div>
									<div class="radio">
									  <label><input type="radio" name="optradio">Other location</label>
									</div>
									
									<p>
										<h3 class="dis">Distance</h3>
										<input type="text" id="km" readonly class="input-filter">
									</p>
									<div id="slider-range"></div>
								</div>
						</div>
					</div>
				  </div>
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse1">
						Photos
						<span class="fa fa-plus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse">
					  <div class="panel-body1">
								<div class="row check">
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Unviewed
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Viewed
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Vewed Me 
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Favorited
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Favorited Me 
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Diamond
										</label>
									  </div>
								</div>
					  </div>
					</div>
				  </div>
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse2">
						Religion
						<span class="fa fa-minus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse2" class="panel-collapse collapse in">
					  <div class="panel-body1">
								<div class="row check">
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Hindu
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Sikh
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Christian
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Jain
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Christian 
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Catholic
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Jewish
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Marathi
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Marathi
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Punjabi
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Kannada
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Bengali
										</label>
									  </div>
								</div>
					  </div>
					</div>
				  </div>
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse3">
						Language
						<span class="fa fa-plus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse3" class="panel-collapse collapse">
					  <div class="panel-body1">
								<div class="row check">
									  <div class="col-sm-6">
										<label class="checkbox-inline" title="Hindi">
										  <input type="checkbox"> Hindi
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline" title="English">
										  <input type="checkbox"> English
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline" title="Urdu">
										  <input type="checkbox"> Urdu 
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline" title="Malyalam">
										  <input type="checkbox"> Malyalam
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline" title="Gujarati">
										  <input type="checkbox"> Gujarati 
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline" title="Bangli">
										  <input type="checkbox"> Bangali
										</label>
									  </div>
									  
								</div>
					  </div>
					</div>
				  </div>
				  
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse4">
						Body Type
						<span class="fa fa-minus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse4" class="panel-collapse collapse in">
					  <div class="panel-body1">
								<div class="row check">
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Slim
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Athletic
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Athletic
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Curvy
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox">Extra Pounds 
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox">Overweight
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox">Other
										</label>
									  </div>
									  
								</div>
					  </div>
					</div>
				  </div>
				  
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse5">
						Age
						<span class="fa fa-minus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse5" class="panel-collapse collapse in">
					  <div class="panel-body1">
								<p>
									<input type="text" id="age" readonly class="input-filter">
								</p>
								<div id="slider-range1"></div>
					  </div>
					</div>
				  </div>
				  
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse6">
						Height
						<span class="fa fa-minus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse6" class="panel-collapse collapse in">
					  <div class="panel-body1">
							<p>
								<input type="text" id="height" readonly class="input-filter">
							</p>
							<div id="slider-range2"></div>
					  </div>
					</div>
				  </div>
				  
				  
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse7">
						Hair Color
						<span class="fa fa-plus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse7" class="panel-collapse collapse">
					  <div class="panel-body1">
							<div class="row check">
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> Black
									</label>
								  </div>
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> White
									</label>
								  </div>
								   <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> Brown
									</label>
								  </div>
								   <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> Grey
									</label>
								  </div>
								   <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox">Black Ginger
									</label>
								  </div>
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox">Dark Brown
									</label>
								  </div>
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox">Praline
									</label>
								  </div>
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox">Plum
									</label>
								  </div>
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox">Mahgony
									</label>
								  </div>
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox">Black Cherry
									</label>
								  </div>
							</div>
					  </div>
					</div>
				  </div>
				  
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse8">
						Complexion
						<span class="fa fa-plus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse8" class="panel-collapse collapse">
					  <div class="panel-body1">
							<div class="row check">
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox">  Fair
									</label>
								  </div>
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> Dark
									</label>
								  </div>
								   <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> Brown
									</label>
								  </div>
								   <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> Very Fair
									</label>
								  </div>
								   <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> Wheatish
									</label>
								  </div>
								   <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> Medium
									</label>
								  </div>
								   <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> Wheatish Dark
									</label>
								  </div>
							</div>
					  </div>
					</div>
				  </div>
				  
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse9">
						Smoking
						<span class="fa fa-plus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse9" class="panel-collapse collapse">
					  <div class="panel-body1">
					  		<div class="row check">
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox">  Yes 
									</label>
								  </div>
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> No
									</label>
								  </div>
								   <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> Occasionally
									</label>
								  </div>
							</div>
					  </div>
					</div>
				  </div>
				  
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse14">
						Drinking
						<span class="fa fa-plus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse14" class="panel-collapse collapse">
					  <div class="panel-body1">
					  		<div class="row check">
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox">  Yes 
									</label>
								  </div>
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> No
									</label>
								  </div>
								   <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> Occasionally
									</label>
								  </div>
							</div>
					  </div>
					</div>
				  </div>
				  
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse10">
						Relationship
						<span class="fa fa-plus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse10" class="panel-collapse collapse">
						<div class="panel-body1">
								<div class="row check">
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Single
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Divorced
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Separated 
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Widowed
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Annulled 
										</label>
									  </div>
								</div>
						</div>
					</div>
				  </div>
				  
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse13">
						Diet
						<span class="fa fa-plus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse13" class="panel-collapse collapse">
					  <div class="panel-body1">
								<div class="row check">
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Veg
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Non Veg
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> vegan
										</label>
									  </div>
								</div>
						</div>
					</div>
				  </div>
				  
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse11">
						Education
						<span class="fa fa-plus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse11" class="panel-collapse collapse">
					  <div class="panel-body1">
								<div class="row check">
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> High School
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Intermediate
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Graduate
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Master Degree 
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox">PhD 
										</label>
									  </div>
								</div>
						</div>
					</div>
				  </div>
				  
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse12">
						Children
						<span class="fa fa-plus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse12" class="panel-collapse collapse">
					  <div class="panel-body1">
					  		
					  </div>
					</div>
				  </div>
				  
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse15">
						Profile Text
						<span class="fa fa-minus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse15" class="panel-collapse collapse in">
					  <div class="panel-body1">
						<div class="input-group stylish-input-group">
							<input type="text" class="form-control"  placeholder="e.g. drinking, spanish" >
							<span class="input-group-addon">
								<button type="submit">
									<span class="glyphicon glyphicon-search"></span>
								</button>  
							</span>
						</div>
						<input class="btn btn-danger search-result" type="button" value="Search">
					<input class="btn btn-danger reset-result pull-right" type="reset" value="Reset all">
					  </div>
					</div>
				  </div>
				
				</div>
				</form>
			</div>
			
		  <div class="col-xs-12 col-sm-9">
	  			<div class="row">
	  				<div class="col-sm-4">
	  					<br>
	  					<h4>Accepted Members</h4>
	  				</div>
	  				<div class="col-sm-4 pull-right">
	  					<div class="dropdown pull-right">
						  <a class="dropdown-toggle" type="button" data-toggle="dropdown" data-target="drop">All Accepted</a>
						  <ul class="dropdown-menu" id="drop">
							<li><a href="#">All Accepted</a></li>
							<li><a href="#">Accepted By Her</a></li>
							<li><a href="#">Accepted By Me</a></li>
						  </ul>
						</div>
	  				</div>
	  			</div>
				
				<?php 
				/*$where = "request_to= '".$_SESSION['userDetail']['profile_code']."' OR request_from = '".$_SESSION['userDetail']['profile_code']."' AND request_status = 'A'";
				$acceptedInvitation = $db->getRecord(1,array('*'),'tbl_match_request',$where);
				
				$count = count($acceptedInvitation);
				if($count > 0)
				{
					for($i = 0; $i < $count; $i++)	
					{
						$query = "tbl_profiles.profile_code,tbl_profiles.modified_on,tbl_profiles.fname,tbl_profiles.lname,ROUND((DATEDIFF(CURDATE(), tbl_profile_detail.birth_date) / 365.25)) age,tbl_profiles.gender,tbl_profile_detail.height,tbl_profile_detail.more_detail,tbl_community.community_name,tbl_religions.religion_name,tbl_memberships.membership_name,tbl_states.state_name,tbl_countries.country_name,tbl_mother_tongue.mother_tongue,tbl_cities.city_name,tbl_education_career.working_as ,tbl_profile_images.image from tbl_profiles LEFT JOIN tbl_profile_detail ON tbl_profile_detail.profile_code_fk = tbl_profiles.profile_code left JOIN tbl_member_contact_info ON tbl_member_contact_info.profile_code = tbl_profiles.profile_code LEFT JOIN tbl_community ON tbl_community.community_code = tbl_profiles.community_code LEFT JOIN tbl_religions ON tbl_religions.religion_code = tbl_profiles.religion_code LEFT JOIN tbl_cities ON tbl_cities.city_id_pk = tbl_member_contact_info.city_id_fk LEFT JOIN tbl_memberships ON tbl_memberships.membership_code = tbl_profiles.membership_code LEFT JOIN tbl_mother_tongue ON tbl_mother_tongue.mother_tongue_code = tbl_profiles.mother_tongue_code LEFT JOIN tbl_states ON tbl_states.state_id_pk = tbl_member_contact_info.state_id_fk LEFT JOIN tbl_countries ON tbl_countries.country_id_pk = tbl_member_contact_info.country_id_fk LEFT JOIN tbl_education_career ON tbl_education_career.profile_code = tbl_profiles.profile_code LEFT JOIN tbl_profile_images ON tbl_profile_images.profile_code = tbl_profiles.profile_code AND tbl_profile_images.default_image ='Y'";
						$whr = "1 AND tbl_profiles.profile_status = 'A' AND (tbl_profiles.profile_code ='".$acceptedInvitation[0]['request_from']."' OR tbl_profiles.profile_code ='".$acceptedInvitation[0]['request_to']."')";
						
						$acceptedMemberArr = $db->getRecord(1, $query, '', $whr, '', '', 'tbl_profiles.fname', 'ASC');
						$countPending = count($acceptedMemberArr);
						if($countPending > 0)
						{
							$profilePic='';
							
							  if($acceptedMemberArr[$i]['image']!='')
								  $profilePic = USER_PATH."/uploads/profile_pic/".$acceptedMemberArr[$i]['image'];
							  else
								  $profilePic = USER_PATH."img/default-profile.jpg";*/
					?>	
					
				<!--<div class="panel panel-body">
					<div class="row invite">
						<div class="col-sm-2">
							<a href="<?=USER_PATH.'profile-details/'.$acceptedMemberArr[$i]['profile_code']?>"><img src="<?=$profilePic ?>" class="img-responsive img-thumbnail img-circle"></a>
						</div>
						<div class="col-sm-7">
							<a href="<?=USER_PATH.'profile-details/'.$acceptedMemberArr[$i]['profile_code']?>"><h1><?php echo ucwords($acceptedMemberArr[$i]['fname'].' '.$acceptedMemberArr[$i]['lname']);  if($acceptedMemberArr[$i]['membership_name']!='' && $acceptedMemberArr[$i]['membership_name'] != 'Free') { echo " <span class='label label-danger'>".$acceptedMemberArr[$i]['membership_name']."</span>"; } ?></h1></a>
							<div class="inv-detail"><?=$acceptedMemberArr[$i]['age'].', '. $ARR_HEIGHT[$acceptedMemberArr[$i]['height']].', '. $acceptedMemberArr[$i]['religion_name'].', '. $acceptedMemberArr[$i]['community_name'].', '. $acceptedMemberArr[$i]['mother_tongue'].', '. $acceptedMemberArr[$i]['working_as'].', '. $acceptedMemberArr[$i]['city_name'].', '.$acceptedMemberArr[$i]['country_name'] ?></div>
							<a class="btn-default" href="#">Invitation accepted by you</a><br><br>
							<a class="btn-danger" href="<?=USER_PATH?>upgrade.php">Send Email</a>
						</div>
						<div class="col-sm-3">
						<?php 	$to_time = strtotime(date('Y-m-d H:i:s'));
								$from_time = strtotime($acceptedMemberArr[0]['modified_on']);
								$tot_time = $to_time - $from_time;
								$tot_time = abs($tot_time);
								$pendingTime = $tot_time/(60*60*24); 
								$pendingTime = floor($pendingTime); 
								?>
							<div class="inv-detail text-right"><?=$pendingTime?> Days Ago</div>
						</div>
					</div>
				</div>-->
				<?php //}	} } else{ ?>
				<div class="panel panel-body">
					<div class="row invite">
						<div class="col-sm-12">
							No Accepted Members found.
						</div>
					</div>
				</div>
				<?php //} ?>
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
		</div>
   	
   		<div id="menu2" class="tab-pane fade in">
			<div class="chat_body">
				<div class="user1">
					<a href="#" id="btnPopover_1" data-content="<img src='img/partner/1.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Anjali Singh</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">
						<div class="row">
							<div class="col-sm-2"><img src="img/partner/1.jpg" width="30" height="30" class="img-circle"></div>
							<div class="col-sm-10"> <b>Anjali Singh</b>  has sent you an Invitation to Connect <br><i>12 May</i> <button type="button" class="btn btn-danger btn-small">Accept</button> <button type="button" class="btn btn-danger btn-small">Cancel</button></div>
						</div>
					</a>
				</div>
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
<script src="js/jquery.js"></script>
<script>
$(document).ready(function(){
	$('.collapse').on('shown.bs.collapse',function(){
		$(this).parent().find('.fa-plus-circle').removeClass('fa-plus-circle').addClass('fa-minus-circle');
	}).on('hidden.bs.collapse',function(){
		$(this).parent().find('.fa-minus-circle').removeClass('fa-minus-circle').addClass('fa-plus-circle');	
	})
});
</script>

<script>
	$( function() {
		$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 0, 300 ],
			slide: function( event, ui ) {
				$( "#km" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] + " km"  );
			}
		});
		$( "#km" ).val($( "#slider-range" ).slider( "values", 0 ) +
			"-" + $( "#slider-range" ).slider( "values", 1 )+ " km " );
	} );
</script>

<script>
	$( function() {
		$( "#slider-range1" ).slider({
			range: true,
			min: 20,
			max: 60,
			values: [ 20, 60 ],
			slide: function( event, ui ) {
				$( "#age" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ]);
			}
		});
		$( "#age" ).val($( "#slider-range1" ).slider( "values", 0 ) +
			" - " + $( "#slider-range1" ).slider( "values", 1 ) );
	} );
</script>

<script>
	$( function() {
		$( "#slider-range2" ).slider({
			range: true,
			min: 0,
			max: 200,
			values: [ 0, 200 ],
			slide: function( event, ui ) {
				$( "#height" ).val(ui.values[ 0 ] + " cm " + " - " + ui.values[ 1 ] + " cm"  );
			}
		});
		$( "#height" ).val($( "#slider-range2" ).slider( "values", 0 ) + " cm " +
			" - " + $( "#slider-range2" ).slider( "values", 1 )+ " cm " );
	} );
</script>


<script>
	$(document).ready(function(e) {
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