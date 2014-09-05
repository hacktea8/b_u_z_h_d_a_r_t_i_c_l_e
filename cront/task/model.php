<?php

class M{
 public $db = '';
 public $dbpre = '';
 public $_table = 'article_dayily_read';
 public $_t_user = 'user';
 public $_t_day_post = 'user_dayily_post';
 public $_t_user_group = 'user_group';
 public $_t_writer_group = 'writer_group';
 public $_t_user_day_income = 'user_daily_income';

 public function __construct(){
  global $active_group,$db;
  $config = $db[$active_group];
  $this->db = new Dbmysql($config['hostname'],$config['username'],$config['password'],$config['database']);
  
 }
 public function check_id($aid,$date){
  $where = array('aid'=>$aid,'Ymd'=>$date);
  $sql = $this->db->select_string($this->_table, $fieldsStr = 'id', $limit = array(1), $where)
  $row = $this->db->row_array($sql);
  return isset($row['id'])? $row['id']: 0;
 }
 public function addUserGroupWritersLog($param){
  if( !isset($param['uid'])){
   return false;
  }
  $table = $this->_t_user_day_income;
  $where = array('uid'=>$param['uid'],'Ymd'=>date('Ymd'));
  $sql = $this->db->select_string($table, $fieldsStr = 'id,gid,wid', $limit = array(1), $where)
  $row = $this->db->row_array($sql);
  if( isset($row['id'])){
    if( !($row['gid'] || $row['wid']) ){
      $fields = array('gid'=>$param['gid'],'wid'=>$param['wid']);
      $this->db->update($table,$fields,$where = array('id'=>$row['id']));
    }
    return $row['id'];
  }
  $param['Ymd'] = date('Ymd');
  $param['Ym'] = date('Ym');
  return $this->db->insert($table,$fields = $param);
 }
 public function setPostLog($param = array()){
  $id = $this->check_id($param['aid'], $param['Ymd']);
  if($id){
    $sql = sprintf('UPDATE %s SET `click`=`click`+%d WHERE `id`=%d LIMIT 1',$this->_table, $param['click'], $id);
    $this->db->query($sql);
    return $id;
  }
  return $this->db->insert($this->_table,$fields = $param);
 }
 public function resetUpdateUserGroupFlag($fields, $where = array()){
  $this->db->update($this->_t_user,$fields, $where);
 }
 public function getNoUpdateGroupUserList($limit = 100, $where = array('isupgroup'=>0)){
  $fieldsStr = 'uid,groupid,writerid';
  $sql = $this->db->select_string($this->_t_user, $fieldsStr, $limit = array($limit), $where)
  $list = $this->db->result_array($sql);
  return $list;
 }
 public function getUserPostCount($where){
  $sql = $this->db->select_string($this->_t_day_post, $fieldsStr = 'SUM(`post`) as total', $limit = array(), $where);
  $row = $this->db->row_array($sql);
  return isset($row['total'])? $row['total']: 0;
 }
 public function getAllGroup(){
  $sql = $this->db->select_string($this->_t_user_group, $fieldsStr = '*',array(),array(),array('sort'=>'ASC'));
  $list = $this->db->result_array($sql);
  $return = array();
  $list = empty($list)?array():$list;
  foreach($list as $v){
   $return[$v['gid']] = $v;
  }
  return $return;
 }
 public function checkUserOfflineAmount($amount, $where = array()){
  $whereStr = array();
  foreach($where as $k => $v){
   $whereStr .= ' AND '.$k.' '.$v
  }
  $sql = sprintf("SELECT COUNT(*) as total FROM %s WHERE SUM(amount) > %s %s", $this->_t_user_day_income, $amount, $whereStr);
  $row = $this->db->row_array($sql);
  return isset($row['total'])? $row['total']: 0;
 }
 public function updateUserGroup($fields, $uid){
  if(!is_array($fields) || $uid){
   return false;
  }
  $this->db->update($this->_t_user,$fields, $where = array('uid'=>$uid));
  return 1;
 }
 public function getAllWriterGroup(){
  $sql = $this->db->select_string($this->_t_writer_group, $fieldsStr = '*',array(),array(),array('sort'=>'ASC'));
  $list = $this->db->result_array($sql);
  $return = array();
  $list = empty($list)?array():$list;
  foreach($list as $v){
   $return[$v['wid']] = $v;
  }
  return $return;
 }
 public function getUserPostClick($where){
  $sql = $this->db->select_string($this->_table, $fieldsStr = 'SUM(click) as total',array(),$where);
  $row = $this->db->row_array($sql);
  return isset($row['total'])? $row['total']: 0;
 }
 //获取文章点阅的日志还没处理的日期
 public function getPostClickLogDate($date){
  if( !$date){
   return array();
  }
  $sql = sprintf("SELECT Ymd FROM %s GROUP BY Ymd WHERE flag = 1 AND Ymd <= %d",$this->_table, $date);
  $list = $this->db->result_array($sql);
  return empty($list)? array(): $list;
 }
 //获取用户具体日期的组信息
 public function getUserTodayGroup($fieldsStr, $where){
  $sql = $this->db->select_string($this->_table, $fieldsStr, array(1), $where);
  $row = $this->db->row_array($sql);
  return $row;
 }
 //获取条件SQL语句
 public function getWhereStr($where){
  if( !is_array($where)){
   return '';
  }
  $whereStr = array();
  foreach($where as $k => $v){
   $whereStr[] = $k.$v;
  }
  $whereStr = implode(' AND ', $whereStr);
  return $whereStr;
 }
 public function select_sql($table,$fields){
  $sql = sprintf("SELECT %s FROM %s", $fields, $table);
  return $sql;
 }
 //获取文章总点阅量 按用户、日期
 public function getPostClickLogById($fields,$where){
  $sql = $this->select_sql($this->_table,$fields).$this->getWhereStr($where);
  $row = $this->db->row_array($sql);
  return $row;
 }
 //更新用户每日收益
 public function updateUserDayliyIncome($update, $where){
  $this->db->update($this->_t_user_day_income, $update, $where);
  return 1;
 }
 // 获取介绍人ID
 public function getUserIntroducer($uid){
  if( !$uid){
   return 0;
  }
  $sql = $this->db->select_string($this->_t_user, 'introducer', array(1), array('uid'=>$uid));
  $row = $this->db->row_array($sql);
  return $row['introducer'];
 }
 //更新上线的提成
 public function updateIntroducerDayliyIncome($deduct_amount, $introducer, $vdate){
  $sql = sprintf("UPDATE %s SET `deduct_amount`=`deduct_amount`+%d WHERE `uid`=%d AND `Ymd`=%d LIMIT 1", $this->_t_user_day_income, $deduct_amount, $introducer, $vdate);
  $this->db->query($sql);
  return 1;
 }
 //
 public function getUserNoWriterCountList($limit = 100, $where = array('isupamount'=>0)){
  $sql = $this->db->select_string($this->_t_user_day_income, '*', array($limit), $where);
  $list = $this->db->result_array($sql);
  return empty($list)? array(): $list;
 }
}


