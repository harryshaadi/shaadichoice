<?php
include_once('scpanel/web-config.php');
include_once('scpanel/functions/common.php');
include_once('scpanel/classes/class.DBQuery.php');

$db = new DBQuery();

$accessCase = getFieldValPostORGet('postAction');
if (!$accessCase) $accessCase = getFieldValPostORGet('getAction','G');

switch ($accessCase)
{		
	case 'checkEmail':
		$key = getFieldValPostORGet('value','G'); 
		
		$result = $db->getRecordCount(0,'tbl_profiles',array('email'=>$key));
		if($result)
		{
			echo '';		
		}
		else { echo  'Email Id not exist in database.'; }	break;

	case 'upgradeMembershipPlan':

		$key = getFieldValPostORGet('value','G'); 
		if($db->updateRecord(0, array('membership_code'=>$key), 'tbl_profiles', array('profile_code' =>$_SESSION['userDetail']['profile_code'])))
		{
			echo true;		
		}
		else { echo  false; }	break;
		
	case 'updateStatus' :
		$key = getFieldValPostORGet('value','G');
		$field = getFieldValPostORGet('field','G');
		$peofileCode = getFieldValPostORGet('profile_code','G');
		if($field == 'show_income')
			$res = $db->updateRecord(0,array($field => $key), 'tbl_education_career' , array('profile_code' => $peofileCode));
		else
			$res = $db->updateRecord(0,array($field => $key), 'tbl_profile_detail' , array('profile_code_fk' => $peofileCode));
		if($res)
		{
			//$_SESSION['messageSession'] = "Record updated successfully.";
		}
		else
		{
			//$_SESSION['messageSession'] = "Record not updated.";
		}		
		break;
		
	case 'updateProfileShowHideStatus' :
		$key = getFieldValPostORGet('value','G');
		$field = getFieldValPostORGet('field','G');
		$peofileCode = getFieldValPostORGet('profile_code','G');
		$res = $db->updateRecord(0,array($field => $key), 'tbl_profiles' , array('profile_code' => $peofileCode));
		if($res)
		{
			//$_SESSION['messageSession'] = "Record updated successfully.";
		}
		else
		{
			//$_SESSION['messageSession'] = "Record not updated.";
		}		
		break;
		
	case 'advanceSearch' :
		
		$key = getFieldValPostORGet('val','G');
		$whr ='';
		$whereStr = '';
		if(is_array($key))
		{
			$whereStr = implode(',', $key);
			$whr .= "city_name IN ( $whereStr ) ";
		}
		else
		{
			$whr .= "city_name = '$key' ";
		}
		$whr .= "AND tbl_profiles.profile_status = 'A' ";
		$whr .= " tbl_profile_images.default_image = 'Y'";
		print searchQuery($whr);
		break;
		
	case 'advanceSearchByReligion' :
		
		$key = getFieldValPostORGet('val','G');
		$count = count($key);
		$queryStr ='';
		if($count>0)
		{
			$countArr = explode(',', $key);
			foreach($countArr as $value)
			{
				$queryStr .= "'$value',";
			}
			
			$queryStr = substr($queryStr,0,-1);
		}
		$whr ='';
		$whr .= "religion_name IN ( $queryStr ) ";
		$whr .= "AND tbl_profiles.profile_status = 'A' ";
		$whr .= " tbl_profile_images.default_image = 'Y'";
		
		print searchQuery($whr);
		break;
		
	case 'advanceSearchByLanguage' :
		
		$key = getFieldValPostORGet('val','G');
		$count = count($key);
		$queryStr ='';
		if($count>0)
		{
			$countArr = explode(',', $key);
			foreach($countArr as $value)
			{
				$queryStr .= "'$value',";
			}
			$queryStr = substr($queryStr,0,-1);
		}
		$whr ='';
		$whr .= "mother_tongue IN ( $queryStr ) ";
		$whr .= "AND tbl_profiles.profile_status = 'A' ";
		$whr .= " tbl_profile_images.default_image = 'Y'";
		print searchQuery($whr);
		break;
		
	
		
	case 'advanceSearchByBodyType' :
		
		$key = getFieldValPostORGet('val','G'); 
		$count = count($key);
		$queryStr ='';
		if($count>0)
		{
			$countArr = explode(',', $key);
			foreach($countArr as $value)
			{
				$queryStr .= "'$value',";
			}
			 $queryStr = substr($queryStr,0,-1); 
		}
		$whr ='';
		$whr .= "body_type IN ( $queryStr ) ";
		$whr .= "AND tbl_profiles.profile_status = 'A' ";
		$whr .= " tbl_profile_images.default_image = 'Y'";
		print searchQuery($whr);
		break;
		
	case 'advanceSearchByComplexion' :
		
		$key = getFieldValPostORGet('val','G'); 
		$count = count($key);
		$queryStr ='';
		if($count>0)
		{
			$countArr = explode(',', $key);
			foreach($countArr as $value)
			{
				$queryStr .= "'$value',";
			}
			 $queryStr = substr($queryStr,0,-1); 
		}
		$whr ='';
		$whr .= "skin_tone IN ( $queryStr ) ";
		$whr .= "AND tbl_profiles.profile_status = 'A' ";
		$whr .= " tbl_profile_images.default_image = 'Y'";
		print searchQuery($whr);
		break;
		
	case 'advanceSearchBySmoking' :
		
		$key = getFieldValPostORGet('val','G'); 
		$count = count($key);
		$queryStr ='';
		if($count>0)
		{
			$countArr = explode(',', $key);
			foreach($countArr as $value)
			{
				$queryStr .= "'$value',";
			}
			 $queryStr = substr($queryStr,0,-1); 
		}
		$whr ='';
		$whr .= "smoke IN ( $queryStr ) ";
		$whr .= "AND tbl_profiles.profile_status = 'A' ";
		$whr .= " tbl_profile_images.default_image = 'Y'";
		print searchQuery($whr);
		break;
		
	case 'advanceSearchByDrinking' :
		
		$key = getFieldValPostORGet('val','G'); 
		$count = count($key);
		$queryStr ='';
		if($count>0)
		{
			$countArr = explode(',', $key);
			foreach($countArr as $value)
			{
				$queryStr .= "'$value',";
			}
			 $queryStr = substr($queryStr,0,-1); 
		}
		$whr ='';
		$whr .= "drink IN ( $queryStr ) ";
		$whr .= "AND tbl_profiles.profile_status = 'A' ";
		$whr .= " tbl_profile_images.default_image = 'Y'";
		print searchQuery($whr);
		break;
		
	case 'advanceSearchByRelationship' :
		$key = getFieldValPostORGet('val','G'); 
		$count = count($key);
		$queryStr ='';
		if($count>0)
		{
			$countArr = explode(',', $key);
			foreach($countArr as $value)
			{
				$queryStr .= "'$value',";
			}
			 $queryStr = substr($queryStr,0,-1); 
		}
		$whr ='';
		$whr .= "maritial_status IN ( $queryStr ) ";
		$whr .= "AND tbl_profiles.profile_status = 'A' ";
		$whr .= " tbl_profile_images.default_image = 'Y'";
		print searchQuery($whr);
		break;
		
	case 'advanceSearchByDiet' :
		$key = getFieldValPostORGet('val','G'); 
		$count = count($key);
		$queryStr ='';
		if($count>0)
		{
			$countArr = explode(',', $key);
			foreach($countArr as $value)
			{
				$queryStr .= "'$value',";
			}
			 $queryStr = substr($queryStr,0,-1); 
		}
		$whr ='';
		$whr .= "diet IN ( $queryStr ) ";
		$whr .= "AND tbl_profiles.profile_status = 'A' ";
		$whr .= " tbl_profile_images.default_image = 'Y'";
		print searchQuery($whr);
		break;
		
	case 'advanceSearchByEducation' :
		$key = getFieldValPostORGet('val','G'); 
		$count = count($key);
		$queryStr ='';
		if($count>0)
		{
			$countArr = explode(',', $key);
			foreach($countArr as $value)
			{
				$queryStr .= "'$value',";
			}
			 $queryStr = substr($queryStr,0,-1); 
		}
		$whr ='';
		$whr .= "education IN ( $queryStr ) ";
		$whr .= "AND tbl_profiles.profile_status = 'A' ";
		$whr .= " tbl_profile_images.default_image = 'Y'";
		print searchQuery($whr);
		break;
		
	case 'advanceSearchByAge' :
		
		$from = getFieldValPostORGet('AgeFrom','G');
		$to = getFieldValPostORGet('AgeTo','G');
		
		$whr .= "age BETWEEN $from AND $to ";
		$whr .= "AND tbl_profiles.profile_status = 'A' ";
		$whr .= " tbl_profile_images.default_image = 'Y'";
		print searchQuery($whr);
		break;
		
	case 'CountryPhoneAutoFill':
		$key = getFieldValPostORGet('country_id','G'); 
		$skey = getFieldValPostORGet('db_country_id','G'); 
		$result = $db->getRecord(0,array('country_phone_code_pk,country_number_code'),'tbl_country_phone_code',array('country_id_fk'=>$key),'','','country_number_code','ASC');
		$count = count($result);
		$codeList = "<option value=''>Select Code</option>";
		if($count>0)
		{
			$i='';
				for($i=0;$i<$count; $i++){
					$c_id = $result[$i]['country_phone_code_pk'];
					$c_code = $result[$i]['country_number_code'];
					$sign='+';
					if($skey==$c_id){
						$selectedval='selected';
					}else{
						$selectedval='';
					}
					
					$codeList .= "<option value='$c_code' $selectedval>$sign$c_code</option>";
					}
		}
		print_r($codeList);
		break;
		
	case 'stateAutoFill':
		$key = getFieldValPostORGet('country_id','G'); 
		$skey = getFieldValPostORGet('state_id','G');  
		$result = $db->getRecord(0,array('state_id_pk,state_name'),'tbl_states',array('country_id_fk'=>$key),'','','state_name','ASC');
		$count = count($result);
		$stateList = "<option value=''>Select State</option>";
		if($count>0)
		{
			$i='';
			$selectedval='';
				for($i=0;$i<$count; $i++){
					$stateId = $result[$i]['state_id_pk'];
					$stateName = $result[$i]['state_name'];
					
					if($skey==$stateId){
						$selectedval='selected';
					}else{
						$selectedval='';
					}
					$stateList .= "<option value='$stateId' $selectedval>$stateName</option>";
					}
		}
		print_r($stateList);
		break; 
		
	
	
	case 'cityAutoFill':
		$key = getFieldValPostORGet('state_id','G');
		$ckey = getFieldValPostORGet('city_id','G'); 
		$result = $db->getRecord(0,array('city_id_pk,city_name'),'tbl_cities',array('state_id_fk'=>$key),'','','city_name','ASC');
		$count = count($result);
		$cityList = "<option value=''>Select City</option>";
		if($count>0)
		{
			$i='';
				for($i=0;$i<$count; $i++){
					$cityId = $result[$i]['city_id_pk'];
					$cityName = $result[$i]['city_name'];
					if($ckey==$cityId){
						$selectedval='selected';
					}else{
						$selectedval='';
					}
					$cityList .= "<option value='$cityId' $selectedval >$cityName</option>";	
					
					}
		}	
		print_r($cityList);
		break;
		
	case 'CommunityAutoFill':
		$key = getFieldValPostORGet('religion_code','G');
		$relgnId = $db->getRecord(0,array('religion_id_pk'),'tbl_religions',array('religion_code'=>$key));
		$result = $db->getRecord(0,array('community_code,community_name'),'tbl_community',array('religion_id_fk'=>$relgnId[0]['religion_id_pk']),'','','community_name','ASC');
		$count = count($result);
		$communityList = "<option value=''>Select Community</option>";
		if($count>0)
		{
			$i='';
				for($i=0;$i<$count; $i++)
				{
					$communityCode = $result[$i]['community_code'];
					$communityName = $result[$i]['community_name'];
					if($ckey==$cityId){
						$selectedval='selected';
					}else{
						$selectedval='';
					}
						$communityList .= "<option value='$communityCode'>$communityName</option>";	
				}
		}
		else{
			$communityList .= "<option value='NA'>Not available</option>";
		}		
		print_r($communityList);
		break;
		
	case 'changeNotiStatus':
		$key = getFieldValPostORGet('type','G');
		
		if($db->updateRecord(0,array('read_status' => 'Y'),'tbl_notifications', array('to_code'=>$_SESSION['userDetail']['profile_code'], 'notification_type' => $key)))
		{
			echo true;
		}
		else
		{
			echo false;
		}
	break;
}

function searchQuery($whereCond)
{
	$db = new DBQuery();
	$query ="tbl_profiles.fname,tbl_profiles.profile_code,tbl_profiles.user_code,tbl_profiles.mname,tbl_profiles.lname,tbl_profiles.gender,tbl_profiles.created_by,tbl_profile_detail.height,tbl_profile_detail.age,tbl_member_contact_info.address_one,tbl_religions.religion_name,tbl_community.community_name,tbl_mother_tongue.mother_tongue,tbl_cities.city_name, tbl_states.state_name, tbl_countries.country_name,tbl_profile_images.image,tbl_education_career.education,tbl_education_career.working_with,tbl_education_career.profession_area from tbl_profiles Inner Join tbl_profile_detail ON tbl_profile_detail.profile_code_fk = tbl_profiles.profile_code inner Join tbl_member_contact_info ON tbl_member_contact_info.profile_code = tbl_profiles.profile_code INNER JOIN tbl_religions ON tbl_religions.religion_code = tbl_profiles.religion_code INNER JOIN tbl_community ON tbl_community.community_code = tbl_member_contact_info.community_code INNER JOIN tbl_mother_tongue ON tbl_mother_tongue.mother_tongue_code = tbl_profiles.mother_tongue_code INNER JOIN tbl_cities ON tbl_cities.city_id_pk = tbl_member_contact_info.city_id_fk INNER JOIN tbl_states ON tbl_states.state_id_pk = tbl_member_contact_info.state_id_fk INNER JOIN tbl_countries ON tbl_countries.country_id_pk = tbl_member_contact_info.country_id_fk INNER JOIN tbl_profile_images ON tbl_profile_images.profile_code = tbl_profiles.profile_code INNER JOIN tbl_education_career ON tbl_education_career.profile_code = tbl_profiles.profile_code INNER JOIN tbl_lifestyle ON tbl_lifestyle.profile_code = tbl_profiles.profile_code";

		$searchResultArr = $db->getRecord(0, $query , '', $whereCond, "", "", "tbl_profiles.fname", "ASC");
		
		$count = count($searchResultArr);
		if($count>0)
		{
			for($i = 0; $i < $count; $i++)
			{
			@$result1 .= "	<div class='row search-column'>
					<div class='col-sm-4'>
						<img src='".USER_PATH."uploads/profile_pic/".$searchResultArr[$i]['image']."' class='pull-left'>
							<h4><a href='view-profile.php'>".$searchResultArr[$i]['fname'].' '.$searchResultArr[$i]['lname']."</a></h4>
							<p>".$searchResultArr[$i]['age'].", ".$searchResultArr[$i]['city_name'].", ".$searchResultArr[$i]['state_name'].", ".$searchResultArr[$i]['country_name']."</p>
					</div>
					<div class='col-sm-6'>
						<div class='table-list1'>
							<table class='table'  align='center'>
								<tr>
									<td><b>Height :</b></td>
									<td>".$ARR_HEIGHT[$searchResultArr[$i]['height']]."</td>
									<td><b>Religion :</b></td>
									<td>".$searchResultArr[$i]['religion_name']."</td>
								</tr>
								<tr>
									<td><b>Education :</b></td>
									<td>".$searchResultArr[$i]['education']."</td>
									<td><b>Profession:</b></td>
									<td>".$searchResultArr[$i]['profession_area']."</td>
								</tr>
							</table>
						</div>
					</div>
					<div class='col-sm-2 text-right'>
						<p> 1 day Ago</p>
					</div>
				</div>";
			}
				 
		}
		else
		{
			$result1  = 'No result found.';
		}
		return @$result1;
}


unset($db);
unset($sc);