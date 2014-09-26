<?php
require_once 'basemodel.php';
class articleModel extends baseModel{

 public function __construct(){
  parent::__construct();
 }
 public function getArticleListByCid($pcid = 0,$cid = 0, $sort, $limit = array(1,7)){
  $where = array('flag='=>1);
  $where = array();
  if($pcid){
   $where['pcid='] = $pcid;
  }elseif($cid){
   $where['cid='] = $cid;
  }
  $orderMap = array('new'=>' utime DESC ','hot'=>' hits DESC','cold'=>' hits ASC','rand'=>' utime ASC');
  $order = isset($orderMap[$sort])? $orderMap[$sort]: $orderMap['hot'];
  $query = $this->select(self::$_tArtileHead, self::$_fAH, $where, $order, $limit);
  $list = array();
  if($query->num_rows()){
   $list = $query->result_array();
   foreach($list as &$v){
    $v['url'] = $this->get_url('article',$v['id']);
    $v['cover'] = '';
   }
  }
  return $list;
 }
 public function getArticleInfoByAid($aid, $uid = 0, $isadmin = false, $edite = 1, $view = 1){
   $where = '';
   if($uid && !$isadmin && $edite)
    $where = sprintf(' AND `uid`=%d',$uid);

   $sql = sprintf('SELECT %s,%s FROM %s as a LEFT JOIN %s as ac ON (a.id=ac.id) WHERE a.id =%d  %s LIMIT 1',self::$_fAH, self::$_fAB, self::$_tArtileHead,self::$_tArtileBody ,$aid,$where);
//echo $sql;exit;
   $data = array();
   $query = $this->db->query($sql);
   if($query->num_rows()){
    $data = $query->row_array();
    $data['id'] = $aid;
    $data['url'] = $this->get_url('article', $aid);
   }
   return $data;
 }
}
