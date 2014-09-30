<?php
class baseModel extends CI_Model{
 public $db;
 static public $_tArtileHead = 'article_title';
 static public $_fAH = ' id,`pcid`, `cid`, `uid`, `title`, `cover`, `ourl`, `coop`, `hits`, `iscover`, `ptime`, `utime`';
 static public $_tArtileBody = 'article_content';
 static public $_fAB = '`source_site`, `source_link`, `intro`, `tags`, `prelink`, `nextlink`';
 static public $_tCate = 'cate';
 static public $_fCate = '`cid`, `pcid`, `title`, `sort`, `adult`, `total`';
 static public $_tTag = '`tags`';
 static public $_fTag = '`tid`, `title`, `total`';
 static public $_tTA = '`article_tag`';
 static public $_tUser = '`user`';
 static public $_fUser = '`uid`, `uname`, `gid`, `introducer`, `visitors`, `prevgains`, `prev_visitors`, `isvip`, `loginip`, `logintime`';
 static public $_tUMeta = '`user_meta`';
 static public $_fUMeta = '`uid`, `fname`, `lname`, `cover`, `mobile`, `county`, `pay_method`, `pay_account`';
 static public $_tUGroup = '`user_group`';
 static public $_fUGroup = '`gid`, `title`, `price`, `note`, `post_count`, `offline_count`, `offline_amount`';
 static public $_tUPC = '`user_pay_records`';
 static public $_fUPC = '`id`, `uid`, `dateline`, `code`, `account`, `amount`';
 static public $_tUDI = '`user_daily_income`';
 static public $_fUDI = '`id`, `uid`, `gid`, `wid`, `amount`, `post_amount`, `deduct_amount`, `click_amount`, `writer_amount`, `devote_amount`, `post_count`, `Ym`, `Ymd`';
 static public $_tWGroup = 'writer_group';
 static public $_fWG = '`id`, `title`, `hits`, `award`';
 static public $_tADR = '`article_dayily_read`';
 static public $_fADR = '`id`, `aid`, `uid`, `cid`, `Ym`, `Ymd`, `click`';
 static public $_tACR = '`article_coop_read`';
 static public $_fACR = '`id`, `aid`, `uid`,`cop_uid`, `referer`, `total`';
 
 public function __construct(){
  parent::__construct();
  $this->db  = $this->load->database('default', TRUE);     
 } 
 public function get_url($mod,$p1=0,$p2=0,$p3=0,$p4=0){
  $url = '';
  $suf = '.html';
  $site_url = '';
  if('cate' == $mod){
    $url = sprintf('%s/cate/index/%d%s',$site_url,$p1,$suf);
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
  $table = $table ? $table : $this->_table;
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
