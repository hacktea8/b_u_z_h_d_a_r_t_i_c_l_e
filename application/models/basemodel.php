<?php
class baseModel extends CI_Model{
 public $db;
 static public $_tArtileHead = 'article_title';
 static public $_fAH = ' summary,id,`pcid`, `cid`,is_original, `uid`, `title`, `cover`,host,ext, `coop`, `hits`, `ptime`, `utime`';
 static public $_tArtileBody = 'article_content';
 static public $_fAB = 'no_infringement,original_url, `intro`, `tags`, `prelink`, `nextlink`';
 static public $_tCate = 'cate';
 static public $_fCate = '`cid`, `pcid`, `title`, `sort`, `adult`, `total`';
 static public $_tTag = '`tags`';
 static public $_fTag = '`tid`, `title`, `total`';
 static public $_tTA = '`article_tag`';
 static public $_tUser = '`user`';
 static public $_fUser = '`uid`, `uname`, `gid`, `invite`,month_hits,amount, `hits`, `click_count`,isAdmin,post_count,wid, `isvip`, `loginip`, `logintime`,email';
 static public $_tUMeta = '`user_meta`';
 static public $_fUMeta = '`uid`, `fname`,urlkey,`lname`,host,ext,intro,title,pic, `mobile`, `county`, `pay_method`, `pay_account`';
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
 public function get_uinfo($uid){
  $r = array();
  $row = $this->check_id(self::$_tUMeta,'urlkey,host,pic,ext,title',array('uid='=>$uid));
  $key = $row['urlkey']?$row['urlkey']:$uid;
  $r['url'] = $this->get_url('uchannel',$key);
  $r['title'] = $row['title'];
  $r['pic'] = $this->get_pic($row['host'],$row['pic'],$row['ext']);
  return $r;
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
    $url = sprintf('%s/channel/index/',$site_url);
  }elseif('uchannel' == $mod){
    $url = sprintf('%s/channel/user/%s',$site_url,$p1);
  }
   return $url;
 }
 public function filter(&$data, $filter = array()){
  $return = array();
  foreach($filter as $k){
   if(isset($data[$k])){
    $return[$k] = trim($data[$k]);
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
 public function get_pic($p1 = 0,$p2 = 0,$p3 = 0){
  $url = 'http://i2.tietuku.com/a931825cefd0efe3.png';
  $url = $cdn_url.'/public/images/user_img_def.png';
  $pic = array('o'=>$url,'s'=>$url,'t'=>$url);
  global $cdn_url;
  $tpl = 'http://%s.tietuku.com/%s.%s';
  if($p1){
   $pic['o'] = sprintf($tpl,$p1,$p2,$p3);
   $pic['s'] = sprintf($tpl,$p1,$p2.'s',$p3);
   $pic['t'] = sprintf($tpl,$p1,$p2.'t',$p3);
  }
  return $pic['o'];
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
   $sql = sprintf("SELECT id FROM %s WHERE id<%d AND uid=%d AND flag=1 ORDER BY id DESC LIMIT 1",$table,$data['id'],$data['uid']);
   $row = $this->db->query($sql)->row_array();
   if( empty($row)){
    return 0;
   }
   $this->db->update(self::$_tArtileBody,array('nextlink'=>$data['id']),array('id'=>$row['id']));
   $this->db->update(self::$_tArtileBody,array('prelink'=>$row['id']),array('id'=>$data['id']));
   return 1;
  }
  // use del article
  public function fixArticlePreNxtLink($data){
   //pre
   $sql = sprintf("SELECT id FROM %s WHERE id<%d AND uid=%d AND flag=1 ORDER BY id DESC LIMIT 1",self::$_tArtileHead,$data['id'],$data['uid']);
   $row = $this->db->query($sql)->row_array();
   $pre_aid = isset($row['id'])?$row['id']:0;
   //next
   $sql = sprintf("SELECT id FROM %s WHERE id>%d AND uid=%d AND flag=1 ORDER BY id ASC LIMIT 1",self::$_tArtileHead,$data['id'],$data['uid']);
   $row = $this->db->query($sql)->row_array();
   $next_aid = isset($row['id'])?$row['id']:0;
   if($pre_aid){
    $this->db->update(self::$_tArtileBody,array('nextlink'=>$next_aid),array('id'=>$pre_aid));
   }
   if($next_aid){
    $this->db->update(self::$_tArtileBody,array('prelink'=>$pre_aid),array('id'=>$next_aid));
   }
   return 1;
  }
}
?>
