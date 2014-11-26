<?php
defined('P_W') || define('P_W', '1');

require_once BASEPATH.'../config_ucenter.php';
require_once BASEPATH.'../uc_client/client.php';

if ( ! function_exists('strcode')){
 function strcode($string, $encode = true, $apikey = '') {
    $uc_key = getKeyBydomain();
    $apikey = $apikey ? $apikey: $uc_key;
    !$encode && $string = base64_decode($string);
    $code = '';
    $key  = substr(md5($_SERVER['HTTP_USER_AGENT'] . $apikey),8,18);
    $keylen = strlen($key);
    $strlen = strlen($string);
    for ($i = 0; $i < $strlen; $i++) {
      $k    = $i % $keylen;
      $code  .= $string[$i] ^ $key[$k];
    }
    return ($encode ? base64_encode($code) : $code);
  } 
}

if ( ! function_exists('getcode')){
  function getcode($len = 6){
    $str = 'qwertyuioplkjhgfdsazxcvbnm1234567890,.?;:!@#$%^&*()-=+';
    $length = strlen($str) - 1;
    $tmp = '';
    for($i=0;$i<$len;$i++){
      $tmp .= $str[mt_rand(0,$length)];
    }
    return $tmp;
  }
}

if ( ! function_exists('get_client_ip')){
  function get_client_ip(){
    $ip = $_SERVER['REMOTE_ADDR'];
    return $ip;
  }
}

if ( ! function_exists('getSynuserUid')){
 function getSynuserUid($cookie_key = 'hk8_auth'){
  if(isset($_COOKIE[$cookie_key])){
   $code = $_COOKIE[$cookie_key];
   $uinfo = uc_authcode($code, $operation = 'DECODE');
   $info = array();
   list($info['uname'],$info['uid']) = explode("\t", $uinfo);
   $info['uname'] = mb_convert_encoding($info['uname'],'UTF-8','GBK');
   return $info;
  }
  return false;
 }
}

if ( ! function_exists('getSynuserInfo')){
  function getSynuserInfo($uid){
    if( !$uid){
       return false;
    }
    $status = array();
    $uinfo = array('isvip' => 0,'isAdmin'=>0);
    $status = uc_user_info($uid);
    $userInfo =  uc_get_user($uid, 1);
    list($uinfo['uid'],$groupid) = $status;
    list(,,$uinfo['email']) = $userInfo;
    if(in_array($groupid , array(25) )){
     $uinfo['isvip'] = 1;
    }elseif( in_array($groupid , array(33) )){
     $uinfo['isvip'] = 2;
    }
    if( in_array($groupid, array(1))){
     $uinfo['isAdmin'] = 1;
     $uinfo['isvip'] = 2;
    }
    return $uinfo;
  }
}

if ( ! function_exists('strtrip')){
  function strtrip($request,$uckey){
    ksort($request);
    reset($request);
    $arg = '';
    foreach ($request as $key => $value) {
      if ($value) {
        $value = stripslashes($value);
        $arg .= "$key=$value&";
      }
    }
    $sig = md5($arg.$uckey);
    $return = $arg."sig=$sig";

    return $return;
  }
}

?>
