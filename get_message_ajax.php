<?php 
	session_start();
	error_reporting(-1);
	include_once('scpanel/web-config.php');
	include_once('scpanel/functions/common.php');
	include_once('scpanel/classes/class.DBQuery.php');
	include_once('functions/common.php');
	$db = new DBQuery();
	
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
	
	//$_GET['c_id'] = "MQ==";;
    if(isset($_GET['c_id'])){
        $conversation_id = base64_decode($_GET['c_id']);
		$where ='';
		$where.=" conversation_id='$conversation_id' ";
		$prof = $db->getRecord(0, array('*'), 'tbl_chatmessages', $where);
		$q = count($prof);	
        if($q > 0){
			//print_r($prof);
            foreach($prof as $m) {
                //format the message and display it to the user
                $user_form = $m['user_from'];
                $user_to = $m['user_to'];
                $message = $m['message'];
				$data = getUserDtl($user_form); 
                //get name and image of $user_form from `user` table
                //$user = mysqli_query($con, "SELECT username,img FROM `user` WHERE id='$user_form'");
				
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
				$profilePic = getUserPic($user_form);					
				/* 
				$where ='';
				$where.=" profile_code='".$user_form."' ";
				$proff = $db->getRecord(0, array('*'), 'tbl_profiles', $where);
				
                $user_fetch = mysqli_fetch_assoc($user);
                 */
				$user_form_username = $username;
                $user_form_img = $profilePic;
				$chat_date = $m['chat_date']; 
 
                //display the message
				//
				
				//$message = stripslashes($message);
				//$message = stripslashes($message);
				//$message = parseString($message);
                echo "
                            <div class='message'>
                                <div class='img-con'>
                                    <img src='{$user_form_img}'>
                                </div>
                                <div class='text-con'>
                                    <a href='#''>{$user_form_username}</a>
                                    <p>{$message}</p>
									<p>{$chat_date}</p>                                </div>
                            </div>
                            <hr>";
 
            }
        }else{
            echo "No Messages";
        }
    }
 
?>