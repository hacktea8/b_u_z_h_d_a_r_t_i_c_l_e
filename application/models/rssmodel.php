<?php
require_once 'basemodel.php';
class rssModel extends baseModel{
 
 public function __construct(){
  parent::__construct();
 }
 public function getRssArticleList($where, $limit = 10){
  $where['flag='] = 1;
  $whereSql = $this->get_where($where);
  $sql = sprintf("SELECT %s,%s FROM %s as ah INNER JOIN %s as ab ON(ah.id=ab.id) %s ORDER BY utime DESC LIMIT %d"
  ,self::$_fAH,self::$_fAB,self::$_tArtileHead,self::$_tArtileBody,$whereSql,$limit);
  echo $sql;exit;
  $list = $this->db->query($sql)->result_array();
  $list = $list?$list:array();
  foreach($list as &$v){
   $v['url'] = $this->get_url('article',$v['id']);
   
  }
  return $list;
 }
}
