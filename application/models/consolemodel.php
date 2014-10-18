<?php
require_once 'basemodel.php';
class consoleModel extends baseModel{

 public function __construct(){
  parent::__construct();
 }
 public function getMyArticleList($uid, $limit = array(1,7)){
  $where = array('uid='=>$uid,'flag='=>1);
  $_fAH = 'id,title,hits,coop,coop_hits,ptime';
  $order = 'ptime DESC';
  $q = $this->select(self::$_tArtileHead, $_fAH, $where, $order, $limit);
  $r = $q->result_array();
  foreach($r as &$v){
   $v['ptime'] = date('Y-m-d H:i:s', $v['ptime']);
   
  }
  return $r;
 }
}
