<?php
require_once 'basemodel.php';
class consoleModel extends baseModel{

 public function __construct(){
  parent::__construct();
 }
 public function getArticleProfitList($uid, $limit = array(1,7)){
  $where = array('uid='=>$uid);
  $_fAH = 'id,title,hits,coop_money,hits_money,coop_hits,ptime';
  $order = 'ptime DESC';
  $q = $this->select(self::$_tArtileHead, $_fAH, $where, $order, $limit);
  $r = $q->result_array();
  foreach($r as &$v){
   $v['ptime'] = date('Y-m-d H:i', $v['ptime']);
   
  }
  return $r;
 }
 public function getUserProfitReport($uid){
  $tmp = array('now'=>0,'pre'=>0,'month'=>0,'all'=>0);
  $r = array(
  'devote'=>array('cash'=>$tmp,'hit'=>$tmp)
  ,'coop'=>array('cash'=>$tmp,'hit'=>$tmp)
  ,'click'=>array('cash'=>$tmp,'hit'=>$tmp)
  ,'total'=>array('cash'=>$tmp,'hit'=>$tmp)
  );
  //devote_amount
  //coop_amount
  //click_amount
  return $r;
 }
 public function getUserMoneyLog($uid){
  $row = $this->check_id(self::$_tUser,'amount,remit',array('uid='=>$uid));
  $r = array('next'=>$row['amount'],'all'=>$row['remit']);
  $sql = sprintf("SELECT `amount` FROM %s WHERE `uid`=%d AND `flag`=1 ORDER BY `dateline` DESC LIMIT 1",self::$_tUPC,$uid);
  $row = $this->db->query($sql)->row_array();
  $r['pre'] = $row?$row['amount']:0;
  return $r;
 }
 public function getUserRemitLogList($uid, $limit = array(1, 7)){
  $where = array('uid='=>$uid,'flag='=>1);
  $order = 'dateline DESC';
  $q = $this->select(self::$_tUPC, self::$_fUPC, $where, $order, $limit);
  $r = $q->result_array();
  foreach($r as &$v){
   $v['dateline'] = date('Y-m-d', $v['dateline']);

  }
  return $r;
 }
 public function getUserOnlineAndOffline($uid){
  $online = $this->check_id(self::$_tUser,'invite',array('uid='=>$uid));
  $online = $this->check_id(self::$_tUser,'uname',array('uid='=>$online['invite']));
  $offline = $this->check_id(self::$_tUser,'COUNT(*) as total',array('invite='=>$uid));
  return array('online'=>$online['uname'],'total'=>$offline['total']);
 }
 public function checkUserIsSetting($uid){
  $r = array('pic'=>0,'account'=>0);
  $row =  $this->check_id(self::$_tUMeta, 'uid',array('uid='=>$uid,'iscover='=>1));
  $r['pic'] = $row?1:0;
  $row =  $this->check_id(self::$_tUMeta, 'uid',array('uid='=>$uid,'pay_method>'=>0));
  $r['account'] = $row?1:0;
  return $r;
 }
 public function getUserDailyCoopProfitList($uid, $limit = array(1,10)){
  $where = array('uid='=>$uid,'Ymd<'=>date('Ymd',strtotime('-1 day')));
  $order = 'Ymd DESC';
  $q = $this->select(self::$_tUDC, self::$_fUDC, $where, $order, $limit);
  $r = $q->result_array();
  $r = $r?$r:array();
  foreach($r as &$v){
   $v['Ymd'] = date('Y-m-d', strtotime($v['Ymd']));

  }
  return $r;
 }
 public function getUserDailyProfitList($uid, $limit = array(1,10)){
  $where = array('uid='=>$uid,'isupamount='=>1,'Ymd<'=>date('Ymd',strtotime('-1 day')));
  $order = 'Ymd DESC';
  $q = $this->select(self::$_tUDI, self::$_fUDI, $where, $order, $limit);
  $r = $q->result_array();
  $r = $r?$r:array();
  foreach($r as &$v){
   $v['Ymd'] = date('Y-m-d', strtotime($v['Ymd']));

  }
  return $r;
 }
}
