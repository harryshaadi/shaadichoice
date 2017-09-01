<?php 
include_once('head.php');

$profileCode = $_SESSION['userDetail']['profile_code'];
$gndr = $_SESSION['userDetail']['gender'];
$blockedUser = $db->getRecord(0, array('blocked_by'), 'tbl_blocked_users', array('blocked_user' => $profileCode));
$countBlockedUser = count($blockedUser);
$blockstr ='';

$usePrtnrPrefArr = $db->getRecord(0, array('*'), 'tbl_partner_preference', array('profile_code_fk' => $profileCode));	

$whereClause = "a.profile_status = 'A' AND a.profile_code <> '$profileCode' AND a.gender <> '$gndr'";
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

$selectedCols = "a.profile_code,a.user_code,a.fname,a.lname,a.gender,a.show_hide_profile,c.more_detail,c.body_type,c.height,d.working_with,d.education_category,g.community_name,h.city_name,l.diet,l.smoke,l.drink, ROUND((DATEDIFF(CURDATE(), c.birth_date) / 365.25)) mage";
$whereClause4pp = " $whereClause GROUP BY a.profile_code";

//$usePrtnrPrefArr = $db->getRecord(0, $selectedCols, $tbls, $whereClause4pp, $stpp, $perPage, "a.modified_on", 'DESC');
$useMeetmeArrCount = $db->getRecord(0, $selectedCols, $tbls, $whereClause4pp, '', '', "a.modified_on", 'DESC');

$totalNoOfRecords = count($useMeetmeArrCount);
//$divPage = generatePagination($totalNoOfRecords, $perPage, $stpp, 'dashboard.php', "active=pp&divView=$divView", "stpp");									
?>


<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-10 panel-body profile-list">
						<!-- start -->
						<div id="results"></div>
						<div class="loader panel panel-body"></div>
						
						<!-- end -->
					</div>	
				</div>
				


					</div>
				</div>
			</div>	
</section>

<?php 
	include('footer.php');
?> 
<script type="text/javascript">
	function AddtoYesList(accepted_id) {
		//alert(accepted_id);
		//return false; 
		$.ajax({
			type: "POST",
			url: "connect_accept.php",
			data: "accepted_to=" + accepted_id + "&accepted_from=" + '<?=$_SESSION['userDetail']['profile_code']?>',
			cache: false,
			beforeSend: function() {
				$('.loader').html('<img src="<?=USER_PATH?>images/loader.gif" alt="" width="24" height="24" style="z-index:999;background:rgba(0, 0, 0, 0.38); margin:20% 50%;" >');
			},
			success: function(html) {
				//$("#results").html(html);
				//$('#results').load('#results');
				alert('Request has been sent successfully.');
				$('.loader').html('');
				$('.loader').removeClass("panel panel-body");
				window.location.reload();
				//$('.loader').html('');
			}
		});
	}
	
	function AddtoNoList(accepted_id) {
		$.ajax({
			type: "POST",
			url: "connect_deny.php",
			data: "accepted_to=" + accepted_id + "&accepted_from=" + '<?=$_SESSION['userDetail']['profile_code']?>',
			cache: false,
			beforeSend: function() {
				$('.loader').html('<img src="<?=USER_PATH?>images/loader.gif" alt="" width="24" height="24" style="z-index:999;background:rgba(0, 0, 0, 0.38); margin:20% 50%;" >');
			},
			success: function(html) {
				//alert(html);
				//$("#results").html(html);
				//$('#results').load('#results');
				alert('Remove successfully.');
				$('.loader').html('');
				$('.loader').removeClass("panel panel-body");
				window.location.reload();
				//$('.loader').html('');
			}
		}); 
	}	
	
	function AddtoMaybeList(accepted_id) {
		$.ajax({
			type: "POST",
			url: "connect_maybe.php",
			data: "accepted_to=" + accepted_id + "&accepted_from=" + '<?=$_SESSION['userDetail']['profile_code']?>',
			cache: false,
			beforeSend: function() {
				$('.loader').html('<img src="<?=USER_PATH?>images/loader.gif" alt="" width="24" height="24" style="z-index:999;background:rgba(0, 0, 0, 0.38); margin:20% 50%;" >');
			},
			success: function(html) {
				//alert(html);
				//$("#results").html(html);
				//$('#results').load('#results');
				if(html==1){
				alert('Request has been saved successfully.');
				$('.loader').html('');
				$('.loader').removeClass("panel panel-body");
				window.location.reload();
				//$('.loader').html('');
				}else{
					alert('Problem');
				}
			}
		}); 
	}

</script>
	<script type="text/javascript">
	// fetching records
	//alert('sdfsalkdfhslkdfhdslk sdhflkdsfhl');
	function displayRecords(numRecords, pageNum) {
	//$(document).ready(function() {
		$.ajax({
			type: "GET",
			url: "meet-me-staticd.php",
			data: "show=" + numRecords + "&pagenum=" + pageNum,
			cache: false,
			beforeSend: function() {
				$('.loader').html('<img src="<?=USER_PATH?>images/loader.gif" alt="" width="24" height="24" style="z-index:999;background:rgba(0, 0, 0, 0.38); margin:20% 50%;" >');
			},
			success: function(html) {
				$("#results").html(html);
				$('.loader').html('');
				$('.loader').removeClass("panel panel-body");
			}
		});
	//});
	}
 
	// used when user change row limit
	/*
	function changeDisplayRowCount(numRecords) {
		displayRecords(numRecords, 1);
	}
	*/
	$(document).ready(function() {
		displayRecords(1, 1);
	});
	</script>