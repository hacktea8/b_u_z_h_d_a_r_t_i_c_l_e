<?php
require_once 'basemodel.php';
class adsModel extends baseModel {
 static public $sort = array('hot'=>'hits DESC');

 public function __construct(){
  parent::__construct();
 }
 public function getUserAds($uid, $order = 'hot', $limit = 30){
  $return = array();
  if( !$uid){
   return $return;
  }
  $where = array('uid='=>$uid, 'flag='=>1);
  $fields = 'id,title,summary,thumb,cover,host';
  $order = isset(self::$sort[$order])? self::$sort[$order]: self::$sort['hot'];
  $query = $this->select(self::$_tArtileHead, $fields, $where, $order, $limit = array($limit));
  if($query->num_rows()){
   $return = $query->result_array();
   foreach($return as &$v){
    $v['url'] = $this->get_url('article',$v['aid']);
    $v['pic'] = $this->get_pic('article',$v['iscover'],$v['host'],$v['cover']);;
   }
  }
  return $return;
 }
}
