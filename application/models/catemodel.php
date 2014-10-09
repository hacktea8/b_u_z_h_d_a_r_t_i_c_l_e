<?php
require_once 'basemodel.php';
class cateModel extends baseModel{

 public function __construct(){
  parent::__construct();
 }
 public function getAllCateInfo(){
  $where = array('flag='=>1);
  $order = '';
  $query = $this->select(self::$_tCate, self::$_fCate, $where, $order, $limit = array());
  $list = array();
  $r = array();
  if($query->num_rows()){
   $list = $query->result_array();
   foreach($list as $v){
    $v['url'] = $this->get_url('cate',$v['cid']);
    $r[$v['cid']] = $v;
   }
  }
  return $r;
 }
 public function getCateArticleTotals(){
  $sql = sprintf("UPDATE %s AS c SET total = (
   SELECT COUNT(*) FROM %s AS v WHERE c.cid = v.cid AND flag = 1
   ) WHERE c.pcid > 0 ",self::$_tCate, self::$_tArtileHead);
  $this->db->query($sql);

  $sql = sprintf("UPDATE %s AS c SET total = (
   SELECT COUNT(*) FROM %s AS v WHERE c.cid = v.pcid AND flag = 1
   ) WHERE c.pcid = 0",self::$_tCate, self::$_tArtileHead);
  $this->db->query($sql);
  return 1;
 }
}
