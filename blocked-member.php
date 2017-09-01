<?php 
	include('head.php');
	$blockedMembers = $db->getRecord(0,array('blocked_user'),'tbl_blocked_users',array('blocked_by'=>$_SESSION['userDetail']['profile_code']));
?> 
<!--  end navbar -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-3 panel-body">
						<?php include_once('setting-left-sidebar.php'); ?>
					</div>
					<div class="col-sm-9 panel-body profile-list">
					<?php include_once('user-session-msg.php');?>
						<div class="panel panel-body">
								<h4>Blocked Member</h4>
						</div>
						<div class="panel panel-body">
						<?php 
							$count = count($blockedMembers);
							if($count > 0)
							{
							for($i = 0; $i < $count; $i++)
							{
								$query = "tbl_profiles.profile_code,tbl_profiles.fname,tbl_profiles.lname,tbl_profiles.gender,ROUND((DATEDIFF(CURDATE(), tbl_profile_detail.birth_date) / 365.25)) age,tbl_profile_detail.more_detail,tbl_states.state_name,tbl_countries.country_name,tbl_cities.city_name,tbl_profile_images.image";
										
								$tables = "tbl_profiles JOIN tbl_profile_detail ON (tbl_profile_detail.profile_code_fk = tbl_profiles.profile_code) 
								LEFT JOIN tbl_member_contact_info ON (tbl_member_contact_info.profile_code = tbl_profiles.profile_code) 
								LEFT JOIN tbl_cities ON (tbl_cities.city_id_pk = tbl_member_contact_info.city_id_fk) 
								LEFT JOIN tbl_states ON (tbl_states.state_id_pk = tbl_member_contact_info.state_id_fk)
								LEFT JOIN tbl_countries ON (tbl_countries.country_id_pk = tbl_member_contact_info.country_id_fk) 
								LEFT JOIN tbl_profile_images ON (tbl_profile_images.profile_code = tbl_profiles.profile_code AND tbl_profile_images.default_image ='Y')";
										
								$whr = "1 AND tbl_profiles.profile_status = 'A' AND tbl_profiles.profile_code ='".$blockedMembers[$i]['blocked_user']."'";
								
								$blockedMemberArr = $db->getRecord(0, $query, $tables, $whr, '', '', 'tbl_profiles.fname', 'ASC');
								$countPending = count($blockedMemberArr);
								if($countPending > 0)
								{
									$profilePic='';
									
									  if($blockedMemberArr[0]['image']!='')
										  $profilePic = USER_PATH."/uploads/profile_pic/".$blockedMemberArr[0]['image'];
									  else if($blockedMemberArr[0]['gender'] == 'M'){ $profilePic = USER_PATH."img/male-default.png"; } 
									  else if($blockedMemberArr[0]['gender'] == 'F') { $profilePic = USER_PATH."img/female-default.png"; }
							?>
							<div class="row hide-column">
								<div class="col-lg-2 col-sm-4 col-xs-12">
									<a href="<?=USER_PATH?>profile-details/<?=$blockedMemberArr[0]['profile_code']?>"><img src="<?=$profilePic?>"></a>
								</div>
								<div class="col-lg-4">
									<a href="<?=USER_PATH?>profile-details/<?=$blockedMemberArr[0]['profile_code']?>" style="color: #333;"><h4><?php echo ucwords($blockedMemberArr[0]['fname'].' '.$blockedMemberArr[0]['lname'])?></h4></a>
									<div class="table-list1">
										<table class="table"  align="center">
											<tr>
												<td><b>Age :</b></td>
												<td><?=($blockedMemberArr[0]['age']!=''?$blockedMemberArr[0]['age'].' Years':'NA')?></td>
											</tr>
											<tr>
												<td><b>City:</b></td>
												<td><?=($blockedMemberArr[0]['city_name']!=''?$blockedMemberArr[0]['city_name']:'NA')?></td>
											</tr>
											<tr>
												<td><b>State :</b></td>
												<td><?=($blockedMemberArr[0]['state_name']!=''?$blockedMemberArr[0]['state_name']:'NA')?></td>
											</tr>
											<tr>
												<td><b>Country :</b></td>
												<td><?=($blockedMemberArr[0]['country_name']!=''?$blockedMemberArr[0]['country_name']:'NA')?></td>
											</tr>
										</table>
									</div>
								</div>
								<div class="col-lg-6 col-md-2 col-sm-6 col-xs-12 text-right">
									<form method="POST" action="<?=USER_PATH?>user-controller.php">
										<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to unblock this user?');">Unblock</button>
										<input type="hidden" name="postAction" value="unblockUser">
										<input type="hidden" name="postActionCode" value="<?=$blockedMemberArr[0]['profile_code']?>">
									</form>										
								</div>
								<div class="col-sm-12 ab_details">
									<p><?=($blockedMemberArr[0]['more_detail']!=''?ucfirst(substr($blockedMemberArr[0]['more_detail'],0,250))."....<a href=".USER_PATH."profile-details/".$blockedMemberArr[0]['profile_code']."><span style='color:#900;'>Read more</span></a>":'NA')?></p>
								</div>
							</div>
							<?php } } } else { ?>
							<div class="row hide-column">
								<div class="col-sm-12">
									No blocked member found.
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</section>

<?php 
	include('footer.php');
?> 
