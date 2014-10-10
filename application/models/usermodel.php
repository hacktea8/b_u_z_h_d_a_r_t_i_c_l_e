<?php

require_once 'basemodel.php';

class userModel extends baseModel{

 public function __construct(){
  parent::__construct();

 }
 public function getChanneCount(){
  $f = ' COUNT(*) as total ';
  $check = $this->check_id(self::$_tUser,$f);
  return $check['total'];
 }
 public function getUinfoByUid($f,$uid){
  $check = $this->check_id(self::$_tUser,$f,array('uid'=>$uid));
  return $check;
 }
 public function getChannelList($order = 'new',$limit = array(1,8)){
  $orderMap = array('new'=>'','hot'=>'');
  $fields = '*';
  $order = isset($orderMap[$order])? $orderMap[$order]: $orderMap['new'];
  $query = $this->select(self::$_tUser, $fields, $where = array(), $order, $limit);
  $list = $query->result_array();
  foreach($list as &$v){
   $v['url'] = $this->get_url('uchannel',$v['uid']);
  }
  return $list;
 }
 public function getUserInfo($uinfo){
  if( !isset($uinfo['uid']) || !$uinfo['uid']){
   return false;
  }
    $sql = sprintf("SELECT * FROM `%s` WHERE `uid`=%d LIMIT 1", self::$_tUser, $uinfo['uid']);
    $row = $this->db->query($sql)->row_array();
    $uinfo['isvip'] = 0;
    foreach($uinfo['groups'] as $group){
      if($group == 25){
        $uinfo['isvip'] = 1;
        break;
      }elseif($group == 33){
        $uinfo['isvip'] = 2;
        break;
      }
    }
    $ip = get_client_ip();
    $row['gid'] = $uinfo['groupid'];
    $row['groups'] = $uinfo['groups'];
    $invite = isset($_COOKIE['invite'])? intval($_COOKIE['invite']): 0;
    if(isset($row['uid'])){
      $update = array();
    if($row['loginip'] != $ip){
      $row['loginip'] = $update['loginip'] = $ip;
    }
    // 更新上线
    if($row['logintime'] != date('Ymd')){
      $row['logintime'] = $update['logintime'] = date('Ymd');
    }
    if($row['isvip'] != $uinfo['isvip']){
      $row['isvip'] = $update['isvip'] = $uinfo['isvip'];
    }
    if($row['uname'] != $uinfo['uname']){
      $row['uname'] = $update['uname'] = $uinfo['uname'];
    }
    if(count($update)){
      $where = sprintf(" `uid` =%d LIMIT 1", $uinfo['uid']);
      $sql = $this->db->update_string(self::$_tUser,$update,$where);
      $this->db->query($sql);
    }
    return $row;
    }else{
      $insert_data = $uinfo;
      unset($insert_data['groups']);
      $insert_data['loginip'] = $ip;
      $insert_data['logintime'] = date('Ymd');
      $insert_data['invite'] = $invite;
var_dump($insert_data);exit;
      $this->db->insert(self::$_tUser,$insert_data);
      $this->db->insert(self::$_tUMeta, array('uid'=>$insert_data['uid']));
      return $insert_data;
    }
  }
                
}
