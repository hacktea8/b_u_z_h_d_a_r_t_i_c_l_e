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
 static public $_fUser = '`uid`, `uname`, `gid`, `invite`,month_hits,amount, `hits`, `click_count`,isAdmin,post_count,wid, `isvip`, `loginip`, `logintime`,email';
 static public $_tUMeta = '`user_meta`';
 static public $_fUMeta = '`uid`, `fname`,urlkey,`lname`,host,iscover,intro,title,pic, `mobile`, `county`, `pay_method`, `pay_account`';
 static public $_tUGroup = '`user_group`';
 static public $_fUGroup = '`gid`, `title`, `price`, `note`, `post_count`, `offline_count`, `offline_amount`';
 static public $_tUPC = '`user_pay_records`';
 static public $_fUPC = '`id`, `uid`, `dateline`, `code`, `account`, `amount`';
 static public $_tUDI = '`user_daily_income`';
 static public $_fUDI = '`id`, `uid`, `amount`, `post_amount`,coop_hits,`coop_amount`, `click_amount`, `writer_amount`, `devote_amount`, `post_count`,click_count, `Ym`, `Ymd`';
 static public $_tWGroup = 'writer_group';
 static public $_fWGroup = '`wid`, `title`, `hits`, `award`';
 static public $_tADR = '`article_dayily_read`';
 static public $_fADR = '`id`, `aid`, `uid`,gid,wid,pcid,`cid`,`Ym`,`Ymd`,`hits`,hits_amount';
 static public $_tACR = '`article_coop_read`';
 static public $_fACR = '`id`, `aid`, `uid`,`cop_uid`, `referer`, `total`';
 static public $_tUDC = '`user_daily_coop`';
 static public $_fUDC = '`id`, `uid`, `hits`, `amount`, `coop`, `Ym`, `Ymd`';
 
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
    $url = sprintf('%s/channel/user/%d/0/%d/%d%s?%d-%d-%d',$site_url,$p1,$p2,$p3,$suf,$p1,$p2,$p3);
  }
   return $url;
 }
 public function filter(&$data, $filter = array()){
  $return = array();
  foreach($filter as $k){
   if(isset($data[$k])){
    $return[$k] = $data[$k];
   }
  }
  return $return;
 }
 public function check_id($table = '', $fields,$where, $return = 0){
  $table = $table ? $table : $this->_table;
  $query = $this->select($table, $fields, $where, $order = '', $limit = array(1), $return);
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
 public function select($table = '', $fields = '*', $where = array(), $order = '', $limit = array(1),$return = 0){
  $limitSql = $this->get_limit($limit);
  $whereSql = $this->get_where($where);
  $whereSql = $whereSql ? 'WHERE '.$whereSql: '';
  $orderSql = $order ? sprintf('ORDER BY %s', $order) : '';
  $table = $table ? $table : $this->_table;
  $sql = sprintf('SELECT %s FROM %s %s %s %s', $fields, $table, $whereSql, $orderSql, $limitSql);
  if($return){
   echo $sql;exit;
  }
  $query = $this->db->query($sql);
  return $query;
 }
 public function get_pic($t = 'article',$p1 = 0,$p2 = 0,$p3 = 0,$p4 = 0){
  $url = 'http://i2.tietuku.com/a931825cefd0efe3.png';
  if('user' == $t){
   $url = '/public/images/user_img_def.png';
  }
  return $url;
 }
  public function checkArticleByOname($name){
     if(!$name){
       return array();
     }
     $sql = sprintf("SELECT `id` FROM `%s` WHERE  `title`='%s' LIMIT 1",self::$_tArtileHead,mysql_real_escape_string($name));
    $row = $this->db->query($sql)->row_array();
    return $row['id']? $row['id']: 0;
  }
  public function addArticle($data){
    if(empty($data['title'])){
      return 0;
    }
    $head = $this->copy_array($data,array('title','pcid','uid','chid','cid','thum'
    ,'ourl','ptime','utime'));
    if( !isset($head['flag'])){
     //图片待处理
     $head['flag'] = 5;
    }
    $contents = $this->copy_array($data,array('intro'));
    $sql = $this->db->insert_string(self::$_tArtileHead,$head);
//echo $sql;exit;
    $this->db->query($sql);
    $id = $this->db->insert_id();
    if(!$id){
       return false;
    }
    $contents['id'] = $id;
    $table = $this->get_content_table($id);
    $sql = $this->db->insert_string($this->db->dbprefix($table),$contents);
    $this->db->query($sql);
    // update pre next link
    $this->updateArticlePreNxtLink($head);
    return $id;
  }
  public function updateArticlePreNxtLink($data){
   if( 1 != $data['flag']){
    return 1;
   }
   $table = $this->get_content_table($data['id']);
   $sql = sprintf("UPDATE %s SET `prelink`=(SELECT id FROM %s WHERE id<%d AND uid=%d AND flag=1 ORDER BY id DESC LIMIT 1),`nextlink`=(SELECT id FROM %s WHERE id>%d AND uid=%d AND flag=1 ORDER BY id ASC LIMIT 1) WHERE id=%d LIMIT 1",
   $table, self::$_tArtileHead,$data['id'],$data['uid'],self::$_tArtileHead,$data['id'],$data['uid'],$data['id']);
   $this->db->query($sql);
  }
  // use del article
  public function fixArticlePreNxtLink($data){
   $table = $this->get_content_table($data['prelink']);
   $this->db->update($table,array('nextlink'=>$data['nextlink']),array('id'=>$data['prelink']));
   $table = $this->get_content_table($data['nextlink']);
   $this->db->update($table,array('prelink'=>$data['prelink']),array('id'=>$data['nextlink']));
   return 1;
  }
}
?>
