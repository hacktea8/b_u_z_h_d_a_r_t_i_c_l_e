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
  if($query->num_rows()){
   $list = $query->result_array();
   foreach($list as &$v){
    $v['url'] = $this->get_url('cate',$v['cid']);
   }
  }
  return $list;
 }
}
