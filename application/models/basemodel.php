<?php
class baseModel extends CI_Model{
 public $db;
 static public $_tArtileHead = '';
 static public $_tArtileBody = '';
 

 public function __construct(){
  parent::__construct();
  $this->db  = $this->load->database('default', TRUE);     
 } 
 public function get_url($mod,$p1=0,$p2=0,$p3=0,$p4=0){
  $url = '';
  $suf = '.html';
  $site_url = '';
  if('cate' == $mod){
    $url = sprintf('%s/cate/index/%d/%d/%d%s',$site_url,$p1,$p2,$p3,$suf);
  }elseif('article' == $mod){
    $url = sprintf('%s/article/index/%d%s',$site_url,$p1,$suf);
  }elseif('channel' == $mod){
    $url = sprintf('%s/channel/index/%d/%d/%d%s?%d-%d-%d',$site_url,$p1,$p2,$p3,$suf,$p1,$p2,$p3);
  }elseif('uchannel' == $mod){
    $url = sprintf('%s/channel/user/%d/%d/%d%s?%d-%d-%d',$site_url,$p1,$p2,$p3,$suf,$p1,$p2,$p3);
  }
   return $url;
 }
 public function filter(&$data, $filter = array()){
  $return = array();
  foreach($filter as $k){
   $return[$k] = $data[$k];
  }
  return $return;
 }
 public function check_id($table = '', $fields,$where){
  //$table = $table ? $table : $this->_table;
  $query = $this->select($table, $fields, $where, $order = '', $limit = array(1));
  $row = array();
  if ($query->num_rows() > 0){
   $row = $query->row_array();
  }
  return $row;
 }
 public function get_where($where){
  if(empty($where)){
   return '';
  }
  $sql = '';
  $tmp = array();
  foreach($where as $k => $v){
   $tmp[] = $k.' '.$this->db->escape($v);
  }
  $sql = implode(' AND ', $tmp);
  return $sql;
 }
 public function get_limit($limit = array(1)){
  $limitSql = '';
  if(1 == count($limit)){
   $limitSql = sprintf('LIMIT %d', $limit[0]);
  }
  if(count($limit) > 1){
   $start = ($limit[0] - 1) * $limit[1];
   $start = $start <= 0 ? 0 : $start;
   $limitSql = sprintf('LIMIT %d,%d', $start, $limit[1]);;
  }
  return $limitSql;
 }
 /*
组装SELECT SQL
*/
 public function select($table = '', $fields = '*', $where = array(), $order = '', $limit = array(1)){
  $limitSql = $this->get_limit($limit);
  $whereSql = $this->get_where($where);
  $whereSql = $whereSql ? 'WHERE '.$whereSql: '';
  $orderSql = $order ? sprintf('ORDER BY %s', $order) : '';
  $table = $table ? $table : $this->_table;
  $sql = sprintf('SELECT %s FROM %s %s %s %s', $fields, $table, $whereSql, $orderSql, $limitSql);
//echo $sql;exit;
  $query = $this->db->query($sql);
  return $query;
 }
 public function get_pic(){
  $url = 'http://i2.tietuku.com/a931825cefd0efe3.png';
  return $url;
 }
}
?>
