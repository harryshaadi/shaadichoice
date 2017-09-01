<?php 
	include('header.php');
	
	$community  =  ucwords(str_replace('-', ' ',trim($_REQUEST['id'])));
	$communityName =  preg_replace('/\W\w+\s*(\W*)$/', '$1', $community);
	//print $communityName;
	$tbl = '';
	$key ='';
	$fldname ='';
	
	$relgn = $db->getRecordCount(0, 'tbl_religions', array('religion_name' =>$communityName));
	if($relgn > 0)
	{
		$tbl = 'tbl_religions';
		$key = 'religion_code';
		$fldname = 'religion_name';
	}
	else 
	{
		$community = $db->getRecordCount(0, 'tbl_community', array('community_name' =>$communityName));
		if($community > 0)
		{
			$tbl = 'tbl_community';
			$key = 'community_code';
			$fldname = 'community_name';
		}
		else
		{
			$lang = $db->getRecordCount(0, 'tbl_mother_tongue', array('mother_tongue' =>$communityName));
			if($lang > 0)
			{
				$tbl = 'tbl_mother_tongue';
				$key = 'mother_tongue_code';
				$fldname = 'mother_tongue';
			}
		}
	}
	
	
	$communityCodeArr = $db->getRecord(0, array($key), $tbl, array($fldname => $communityName), '', '', '', '');
	
	


$community = '';
$qryStr = "";
if (!empty($communityCodeArr))
{
	$alias = '';
	if($tbl == 'tbl_religions') $alias ='b';
	if($tbl == 'tbl_community') $alias ='k';
	if($tbl == 'tbl_mother_tongue') $alias ='m';
	$community .= " AND $alias.$key = '".$communityCodeArr[0][$key]."'"; 
}

$gender ='';
$whr ='';
$colFilds = "a.profile_code,a.user_code,a.maritial_status,a.gender,k.community_name,b.religion_name,c.more_detail,c.height,d.education_code,d.profession_area,d.annual_income,d.currency,l.name,(ROUND(DATEDIFF(CURDATE(), c.birth_date) / 365.25)) AS agea, (SELECT image FROM tbl_profile_images f WHERE a.profile_code = f.profile_code AND default_image = 'Y' LIMIT 1) AS image, (SELECT city_name FROM tbl_cities g WHERE e.city_id_fk = g.city_id_pk LIMIT 1) AS city_name";
$tableStr = 'tbl_profiles a, tbl_religions b, tbl_profile_detail c, tbl_education_career d, tbl_member_contact_info e, tbl_community k, tbl_education l';
if($tbl == 'tbl_mother_tongue')
{
	$tableStr .= ', tbl_mother_tongue m';
}
?>

<!--  end navbar -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-sm-4 col-xs-12 search-panel">
			<form>
				<h2>Matrimony</h2>
				<div class="panel-group" id="accordion">
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
						<span class="fa fa-minus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse3" class="panel-collapse collapse in">
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
						Community
						<span class="fa fa-minus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse4" class="panel-collapse collapse in">
					  <div class="panel-body1">
								<div class="row check">
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Brahmin
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Rajput
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Maratha
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Yadav
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox">khatri 
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox">Arora
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
						<a data-toggle="collapse"  href="#collapse7">
						Country
						<span class="fa fa-minus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse7" class="panel-collapse collapse in">
					  <div class="panel-body1">
							<div class="row check">
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> India
									</label>
								  </div>
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> USA
									</label>
								  </div>
								   <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> Brazil
									</label>
								  </div>
								   <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> Canada
									</label>
								  </div>
								   <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox">UK
									</label>
								  </div>
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox">France
									</label>
								  </div>
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox">Italy
									</label>
								  </div>
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox">UAE
									</label>
								  </div>
							</div>
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
			
			<div class="col-lg-9 col-sm-8 col-xs-12 panel-body">
				 	<div class="row">
						<div class="col-md-12">
							<div class="tabbable-panel">
								<div class="tabbable-line">
									<ul class="nav nav-tabs">
										<li class="active">
											<a href="#tab_default_1" data-toggle="tab">
											<?=$communityName?> Male </a>
										</li>
										<li>
											<a href="#tab_default_2" data-toggle="tab">
											<?=$communityName?> Female </a>
										</li>
									</ul>
								<div class="tab-content">
									<div class="tab-pane fade in active" id="tab_default_1">
											<?php
											$gender = 'M';
											if($gender == 'M')
											{	
												$whr = " AND a.gender ='M'";
												
											}
											
											$whereClause = "a.religion_code = b.religion_code AND a.profile_code = c.profile_code_fk AND d.profile_code = a.profile_code AND e.profile_code = a.profile_code AND k.community_code = a.community_code AND l.education_code = d.education_code";
											
											if($tbl == 'tbl_mother_tongue') { $whereClause .= " AND a.mother_tongue_code = m.mother_tongue_code $community $whr"; }
											else { $whereClause .= " $community $whr"; }
											$profileSrchInfoArrCont = $db->getRecord(0, $colFilds, $tableStr, $whereClause);
											$profileSrchInfoArr = $db->getRecord(0, $colFilds, $tableStr, $whereClause, '', '', 'a.created_on', 'DESC');
											$numOfProfile = count($profileSrchInfoArr);
											$totalNoOfRecords = count($profileSrchInfoArrCont);
											
											$countRecord = count($profileSrchInfoArr);
											if($countRecord > 0){ 
											foreach($profileSrchInfoArr as $key => $val)
											{
												$profilePic='';
											    if($val['image']!='')
													$profilePic = USER_PATH."/uploads/profile_pic/".$val['image'];
												else
													$profilePic = USER_PATH."img/default-profile.jpg";
											?>
											 <div class="row">
											 	<div class="col-sm-12">
												   <div class=" metrimonial">
														<div class="row">
													  		<div class="col-lg-3">
																<div class="">
														  			<a data-toggle="modal" data-target="#myModl" title="Image" style="cursor:pointer;"><img src="<?=$profilePic?>" class="img-responsive img-thumbnail profile_s"/></a>
																</div>
													  		</div>
														 	<div class="col-lg-9">
															<div class="row">
																<div class="col-sm-6">
																	<a data-toggle="modal" data-target="#myModl" title="User Code" style="cursor:pointer;"><h4><?=$val['user_code']?></h4></a>
																</div>
																<div class="col-sm-6 matrimony_link">
																	<a data-toggle="modal" data-target="#myModl" title="Message" style="cursor:pointer;"><i class="fa fa-envelope-o" aria-hidden="true"></i> Message</a>&nbsp;&nbsp;&nbsp;
																	<a data-toggle="modal" data-target="#myModl" title="Favourite" style="cursor:pointer;"><i class="fa fa-heart-o" aria-hidden="true"></i>  Favorite</a> &nbsp;&nbsp;&nbsp;
																	<a data-toggle="modal" data-target="#myModl" title="View Profile" style="cursor:pointer;"><i class="fa fa-eye" aria-hidden="true"></i> Profile View</a>
																</div>
															 </div>	
															 <hr/>
															 <div class="row">
																<div class="col-md-4 col-sm-6 col-xs-6 panel-body">
																<?php $height = explode('-',$ARR_HEIGHT[$val['height']]);
																	$height1 = $height[0];
																	$height1 = str_replace("ft","'",$height1);
																	$height1 = str_replace("in",'"',$height1);
																?>
																
																	<p><span><?=$val['agea']?>,</span> <span><?=$height1?> </span></p>
																	<p><?=$val['city_name']?></p>
																	<p><?=$val['religion_name']?></p>
																	<p><?=$val['community_name']?></p>
																</div>
																 <div class="col-md-4 col-sm-6 col-xs-6 panel-body">	
																	<p><?=$val['name']?></p>
																	<p><?=$val['profession_area']?></p>
																	<p><?=$val['currency'].' '.$val['annual_income']?></p>
																	<p><?=$MARITAL_STATUS[$val['maritial_status']]?></p>
																 </div>
															 </div>
														</div>
														<div class="col-sm-12 matrimony_detail">
															<p><?=nl2br(limitText($val['more_detail'],30))?></a></p>
														</div>
													</div>
												</div><!--profile-head close-->
											</div>
										</div>
											<?php }} else { ?>
												
											<div class="row">
											 	<div class="col-sm-12">
												   <div class=" metrimonial">
														<div class="row">
															<div class="col-lg-9">
																No Record Found.
															</div>
														</div>
													</div>
												</div>
											</div>
												
										<?php } ?>
									</div>
									
									<div class="tab-pane fade in" id="tab_default_2">
										 <?php
											$gender = 'F';
											if($gender == 'F')
											{
												$whr = " AND a.gender ='F'";
											}
											
											$whereClause = "a.religion_code = b.religion_code AND a.profile_code = c.profile_code_fk AND d.profile_code = a.profile_code AND e.profile_code = a.profile_code AND k.community_code = a.community_code AND l.education_code = d.education_code".$community.$whr;
											
											$profileSrchInfoArrCont = $db->getRecord(0, $colFilds, $tableStr, $whereClause);
											$profileSrchInfoArr = $db->getRecord(0, $colFilds, $tableStr, $whereClause, '', '', 'a.created_on', 'DESC');
											$numOfProfile = count($profileSrchInfoArr);
											$totalNoOfRecords = count($profileSrchInfoArrCont);
											
											$countRecord = count($profileSrchInfoArr);
											if($countRecord > 0){ 
											foreach($profileSrchInfoArr as $key => $val)
											{
												$profilePic='';
											    if($val['image']!='')
													$profilePic = USER_PATH."/uploads/profile_pic/".$val['image'];
												else
													$profilePic = USER_PATH."img/default-profile.jpg";
											?>
											 <div class="row">
											 	<div class="col-sm-12">
												   <div class=" metrimonial">
														<div class="row">
													  		<div class="col-lg-3">
																<div class="">
														  			<a data-toggle="modal" data-target="#myModl" title="Image" style="cursor:pointer;"><img src="<?=$profilePic?>" class="img-responsive img-thumbnail profile_s"/></a>
																</div>
													  		</div>
														 	<div class="col-lg-9">
															<div class="row">
																<div class="col-sm-6">
																	<a data-toggle="modal" data-target="#myModl" title="User Code" style="cursor:pointer;"><h4><?=$val['user_code']?></h4></a>
																</div>
																<div class="col-sm-6 matrimony_link">
																	<a data-toggle="modal" data-target="#myModl" title="Message" style="cursor:pointer;"><i class="fa fa-envelope-o" aria-hidden="true"></i> Message</a>&nbsp;&nbsp;&nbsp;
																	<a data-toggle="modal" data-target="#myModl" title="Favourite" style="cursor:pointer;"><i class="fa fa-heart-o" aria-hidden="true"></i>  Favorite</a> &nbsp;&nbsp;&nbsp;
																	<a data-toggle="modal" data-target="#myModl" title="View Profile" style="cursor:pointer;"><i class="fa fa-eye" aria-hidden="true"></i> Profile View</a>
																</div>
															 </div>	
															 <hr/>
															 <div class="row">
															 <?php $height = explode('-',$ARR_HEIGHT[$val['height']]);
																	$height1 = $height[0];
																	$height1 = str_replace("ft","'",$height1);
																	$height1 = str_replace("in",'"',$height1);
																?>
																<div class="col-md-4 col-sm-6 col-xs-6 panel-body">
																	<p><span><?=$val['agea']?>,</span> <span><?=$height1?> </span></p>
																	<p><?=$val['city_name']?></p>
																	<p><?=$val['religion_name']?></p>
																	<p><?=$val['community_name']?></p>
																</div>
																 <div class="col-md-4 col-sm-6 col-xs-6 panel-body">	
																	<p><?=$val['name']?></p>
																	<p><?=$val['profession_area']?></p>
																	<p><?=$val['currency'].' '.$val['annual_income']?></p>
																	<p><?=$MARITAL_STATUS[$val['maritial_status']]?></p>
																 </div>
															 </div>
														</div>
														<div class="col-sm-12 matrimony_detail">
															<p><?=nl2br(limitText($val['more_detail'],30))?></a></p>
														</div>
													</div>
												</div><!--profile-head close-->
											</div>
										</div>
											<?php }} else { ?>
												
											<div class="row">
											 	<div class="col-sm-12">
												   <div class=" metrimonial">
														<div class="row">
															<div class="col-lg-9">
																No Record Found.
															</div>
														</div>
													</div>
												</div>
											</div>
												
										<?php } ?>
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
	include('footer.php');
?>

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
	$(document).ready(function() {
		$('#list').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
		$('#grid').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
	});
</script>
