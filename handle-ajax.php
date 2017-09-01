<?php
session_start();
include_once('scpanel/web-config.php');
include_once('scpanel/functions/common.php');
//include_once('scpanel/classes/class.DBAccess.php');
include_once('scpanel/classes/class.DBQuery.php');
$db = new DBQuery();

$password = md5($_GET['password']);
$checkLoginInfo = $db->getRecordLog(0, array('email', 'password', 'fname', 'profile_code'), 'tbl_profiles', array('email' => $_GET['email'],'password'=>$password));

//print_r($checkLoginInfo);die;
$_SESSION['userDetail'] = $checkLoginInfo[0];

if($password = $checkLoginInfo[0]['password']){
if(!empty($checkLoginInfo) && !empty($checkLoginInfo[0]['fname'])){

echo '1';

}else if($checkLoginInfo == NULL){
echo '2';

}else if(!empty($checkLoginInfo) && empty($checkLoginInfo[0]['fname'])){
echo '3';

}
}else{
  echo '4'; 
}
?>