<?php
require_once 'basemodel.php';
class admapiModel extends baseModel{

 public function __construct(){
  parent::__construct();
 }
 public function getArticleVerifyList($flag = 5,$limit = array(1,30)){
  $where = array('flag='=>$flag);
  $order = '';
  $query = $this->select(self::$_tArtileHead, self::$_fAH, $where, $order, $limit);
//echo $query;exit;
  $list = array();
  if($query->num_rows()){
   $list = $query->result_array();
   global $cinfo;
   foreach($list as &$v){
    $v['url'] = $this->get_url('article',$v['id']);
    $v['pic'] = $this->get_pic($v['host'],$v['cover'],$v['ext']);
    $v['ptime'] = date('Y-m-d H:i:s',$v['ptime']);
    $v['pname'] = $cinfo[$v['pcid']]['title'];
    $v['cname'] = $cinfo[$v['cid']]['title'];
   }
  }
  return $list;
 }
 public function setArticleShowFlag($ids,$opt){
  $optMap = array('del'=>4,'via'=>3);
  if( !isset($optMap[$opt])){
   return 0;
  }
  $aidArr = array();
  foreach($ids as $v){
   $aidArr[] = intval($v);
  }
  $aidStr = implode(',', $aidArr);
  $flag = $optMap[$opt];
  $sql = sprintf('UPDATE %s SET flag = %d WHERE `id` IN (%s)', self::$_tArtileHead, $flag, $aidStr);
  $this->db->query($sql);
  return 1;
 }
 public function getCateList($where,$limit = array(1,30)){
  $whereSql = array();
  foreach($where as $k => $v){
   $whereSql[$k.'='] = $v;
  }
  $query = $this->select(self::$_tCate, self::$_fCate, $whereSql, $order='', $limit);
  if($query->num_rows()){
   $list = $query->result_array();
   global $cinfo;
   foreach($list as &$v){
    $v['url'] = $this->get_url('cate',$v['id']);
   }
  }
  return $list;
 }
}
