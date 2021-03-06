<?php

require_once 'basemodel.php';

class userModel extends baseModel{

 public function __construct(){
  parent::__construct();

 }
 public function getUserGroup(){
  $q = $this->select(self::$_tUGroup, self::$_fUGroup,$w = array('flag='=>1),$order = 'sort ASC',$limit = array());
  $l = $q->result_array();
  $r = array();
  $l = $l?$l:array();
  foreach($l as $v){
   $r[$v['gid']] = $v;
  }
  return $r;
 }
 public function getUserWriterGroup(){
  $q = $this->select(self::$_tWGroup, self::$_fWGroup,$w = array('flag='=>1),$order = 'sort ASC',$limit = array());
  $l = $q->result_array();
  $r = array();
  $l = $l?$l:array();
  foreach($l as $v){
   $r[$v['wid']] = $v;
  }
  return $r;
 }
 public function getChanneCount(){
  $f = ' COUNT(*) as total ';
  $check = $this->check_id(self::$_tUser,$f);
  return $check['total'];
 }
 public function getUinfoByUid($f,$uid){
  $check = $this->check_id(self::$_tUser,$f,array('uid='=>$uid));
  return $check;
 }
 public function getUserChannelInfo($urlkey){
  $tmp = intval($urlkey);
  if($urlkey == $tmp && $tmp){
   $where = array('uid='=>$tmp);
  }else{
   $where = array('urlkey='=>$urlkey);
  }
  $m = $this->check_id(self::$_tUMeta, '*', $where);
  $r = $this->getUinfoByUid('*', $m['uid']);
  return array_merge($r,$m);
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
  $row = $this->check_id(self::$_tUser,self::$_fUser,array('uid='=>$uinfo['uid']));
  $ip = get_client_ip();
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
  $pre_cash = $this->getUserPreAmount($row['uid']);
  return array_merge($pre_cash,$row);
  }else{
   $invite = isset($_COOKIE['invite'])? intval($_COOKIE['invite']): 0;
   $insert_data = $uinfo;
   unset($insert_data['groups']);
   $insert_data['loginip'] = $ip;
   $insert_data['logintime'] = date('Ymd');
   $insert_data['invite'] = $invite;
   $insert_data['month_hits'] = 0;
   $insert_data['amount'] = 0;
   $this->db->insert(self::$_tUser,$insert_data);
   $meta = array('uid'=>$insert_data['uid'],'title'=>$uinfo['uname'],'nickname'=>$uinfo['uname']);
   $this->db->insert(self::$_tUMeta, $meta);
   $insert_data['now_hits'] = 0;
   $insert_data['now_amount'] = 0;
   return $insert_data;
  }
 }
 public function getUserPreAmount($uid){
  $r = array('now_hits'=>0,'now_amount'=>0);
  return $r;
 }
}
