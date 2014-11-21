<?php
require_once 'basemodel.php';
class consoleModel extends baseModel{

 public function __construct(){
  parent::__construct();
 }
 public function getArticleInfoById($aid,$uinfo){
  if( !$aid || !$uinfo['uid']){
   return 0;
  }
  $check = $this->check_id(self::$_tArtileHead,'*',array('id='=>$aid));
  if(empty($check) || ($uinfo['uid'] != $check['uid'] && !$uinfo['isAdmin'])){
   return -1;
  }
  $check['pic'] = $this->get_pic($check['host'],$check['cover'],$check['ext']);
  $body = $this->check_id(self::$_tArtileBody,'*',array('id='=>$aid));
  return array_merge($check,$body);
 }
 static public function mstrip_tags( &$str){
  // replace js code
  $str = preg_replace('#<\s*(script|iframe)[^>]*>.*<\s*/\s*(script|iframe)[^>]*>#Uis','',$str);
  return $str;
 }
 static public function filter_code($str){
  $str = str_replace(array('&lt;','&gt;'),array('<','>'),$str);
  $str = trim(strip_tags($str));
  $str = preg_replace('#[a-z0-9_\.:/-]+\.[a-z0-9_\.:/-]+#is','',$str);
  $str = preg_replace('#\s(?=\s)#', '', $str);
  $str = preg_replace("#(\r\n|\r|\n|\t)#", '', $str);
  $str = mb_substr($str, 0, 180, 'UTF-8');
  return $str;
 }
 public function setArticleInfoByData($row, $uinfo){
  $aid = isset($row['id'])?$row['id']:0;
  $aid = intval($aid);
  $row['title'] = self::filter_code($row['title']);
  if( strlen($row['title'])<10 || empty(@$row['cid']) || empty(@$row['pcid'])){
   return 0;
  }
  
  $summary = $row['summary'];
  if( empty($summary )){
   $summary = $row['intro'];
  }
  $row['summary'] = self::filter_code($summary);
  self::mstrip_tags( $row['intro']);
  if( empty($row['intro'])){
   return 0;
  }
//echo '<pre>';var_dump($row);exit;
  $head = $this->filter($row,array('ext','is_original','coop','cid','pcid','title','summary','host','cover','is_adult'));
  $head['flag'] = 1;
  $head['coop'] = intval($head['coop']);
  $body = $this->filter($row,array('original_url','intro','no_infringement'));
  $body['no_infringement'] = intval($body['no_infringement']);
  $_tags = &$row['tags'];
  if($aid){
   $uid = $row['uid'];
   $check = $this->check_id(self::$_tArtileHead,'id,uid',array('id='=>$aid));
   if(empty($check) || ($uinfo['uid'] != $check['uid'] && !$uinfo['isAdmin'])){
    return -1;
   }
   $head['utime'] = time();
   $this->db->update(self::$_tArtileHead,$head,array('id'=>$aid));
   $this->db->update(self::$_tArtileBody,$body,array('id'=>$aid));
   $this->addTags($_tags, $aid);
   $update = array('id'=>$aid,'uid'=>$uid,'flag'=>$head['flag']);
   $this->updateArticlePreNxtLink($update);
   return $aid;
  }
  $check = $this->check_id(self::$_tArtileHead,'id',array('title='=>$head['title']));
  if( !empty($check)){
   return $check['id'];
  }
  $head['uid'] = $row['uid'];
  $head['utime'] = $head['ptime'] = time();
  $head['flag'] = @$row['verify']?5:1;
  $sql = $this->db->insert_string(self::$_tArtileHead, $head);
  //echo $sql;exit;
  $this->db->query($sql);
  $aid = $this->db->insert_id();
  if( !$aid){
   return 0;
  }
  $body['id'] = $aid;
  $sql = $this->db->insert_string(self::$_tArtileBody,$body);
  //echo $sql;exit;
  $this->db->query($sql);
  $this->addTags($_tags, $aid);
  $update = array('id'=>$aid,'flag'=>$head['flag'],'uid'=>$head['uid']);
  $this->updateArticlePreNxtLink($update);
  $this->updateUserArticleCount($head['uid']);
  $this->updateCateArticleCount($head['cid'],$head['pcid']);
  return $aid;
 }
 public function updateCateArticleCount($cid,$pcid){
  $sql = sprintf('UPDATE %s SET total=(SELECT COUNT(*) FROM %s WHERE cid=%d AND flag=1) WHERE cid=%d LIMIT 1'
  ,self::$_tCate,self::$_tArtileHead,$cid,$cid);
  $this->db->query($sql);
  $sql = sprintf('SELECT SUM(total) as totals FROM %s WHERE pcid=%d',self::$_tCate,$pcid);
  $row = $this->db->query($sql)->row_array();
  $sql = sprintf('UPDATE %s SET total=%d WHERE cid=%d LIMIT 1'
  ,self::$_tCate,$row['totals'],$pcid);
  $this->db->query($sql);
 }
 public function updateUserArticleCount($uid = 0){
  if( !$uid){
   return 0;
  }
  $sql = sprintf('UPDATE %s SET post_count=(SELECT COUNT(*) FROM %s WHERE uid=%d AND flag=1) WHERE uid=%d LIMIT 1'
  ,self::$_tUser,self::$_tArtileHead,$uid,$uid);
  $this->db->query($sql);
  return 1;
 }
 public function unbindTagMap($aid){
  $where = array('aid='=>$aid);
  $query = $this->select(self::$_tTA,'tid', $where, $order = '', $limit = array());
  $list = $query->result_array();
  $list = $list?$list:array();
  foreach($list as $tid){
   $sql = sprintf('UPDATE %s SET total=total -1 WHERE tid=%d LIMIT 1',self::$_tTag,$tid);
   $this->db->query($sql);
  }
  $this->db->delete(self::$_tTA, array('aid'=>$aid));
  return true;
 }
 public function addTags($tags, $aid){
  if( empty($tags)){
   return 0;
  }
  //$this->unbindTagMap($aid);
  $tags = str_replace('，', ',', $tags);
  $tagArr = explode(',',$tags);
  $inArr = array();
  $i = 0;
  foreach($tagArr as $v){
   $v = trim($v);
   if( empty($v)){
    continue;
   }
   $inArr[] = $v;
   if($i > 6){
    break;
   }
   //$this->addArticleMap($v,$aid);
  }
  $tagStr = implode(',',$inArr);
  if( !$tagStr){
   return 0;
  }
  $this->db->update(self::$_tArtileBody,array('tags'=>$tagStr),array('id'=>$aid));
  return 1;
 }
 public function addArticleMap($tag,$aid){
  if( !$tag || !$aid){
   return 0;
  }
  $tinfo = $this->check_id(self::$_tTag,'tid',array('title='=>$tag));
  if(empty($tinfo)){
   $this->db->insert(self::$_tTag,array('title'=>$tag,'total'=>1));
   $tid = $this->db->insert_id();
  }else{
   $tid = $tinfo['tid'];
  }
  $this->db->insert(self::$_tTA,array('tid'=>$tid,'aid'=>$aid));
  $sql = sprintf("UPDATE %s SET total=(SELECT COUNT(*) FROM %s WHERE tid=%d) WHERE tid=%d LIMIT 1"
  ,self::$_tTag,self::$_tTA,$tid,$tid);
  $this->db->query($sql);
  return $tid;
 }
 public function getUserChannelInfo($uid){
  $r = $this->check_id(self::$_tUMeta,self::$_fUMeta,array('uid='=>$uid));
  if($r['iscover'] == 1){
   $r['pic'] = '';
  }else{
   $r['pic'] = '';
  }
  return $r;
 }
 public function checkUserChannelUrlkey($urlkey){
  if( empty($urlkey)){
   return 0;
  }
  $r = $this->check_id(self::$_tUMeta,'uid',array('urlkey='=>$urlkey));
  return $r;
 }
 public function setUserChannelInfo($info){
  $uid = $info['uid'];
  $meta = $this->filter($info, array('fname', 'lname', 'iscover', 'mobile', 'county', 'title', 'intro', 'pic', 'host'));
  $flag1 = $flag2 = 0;
  if( isset($info['pay_account']) && $info['pay_account']){
   $flag1 = 1;
  }
  if(isset($info['urlkey']) && $info['urlkey']){
   $flag2 = 2;
  }
  if($flag1 || $flag2){
   $check = $this->check_id(self::$_tUMeta,'pay_account,urlkey',array('uid='=>$uid));
  }
  if( empty($check['pay_account']) && $flag1){
   $meta['pay_account'] = $info['pay_account'];
   $meta['pay_method'] = $info['pay_method'];
  }
  if( empty($check['urlkey']) && $flag2){
   $exist = $this->checkUserChannelUrlkey($info['urlkey']);
   if( empty($exist['urlkey'])){
    $meta['urlkey'] = $info['urlkey'];
   }
  }
  $this->db->update(self::$_tUMeta,$meta,array('uid'=>$uid));
  return $uid;
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
  $row =  $this->check_id(self::$_tUMeta, 'pic',array('uid='=>$uid));
  $r['pic'] = $row['pic']?1:0;
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
