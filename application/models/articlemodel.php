<?php
require_once 'basemodel.php';
class articleModel extends baseModel{

 public function __construct(){
  parent::__construct();
 }
 public function getIndexData($p = 1){
  $r = array();
  $r['hot'] = $this->getArticleListByCid($pcid = 0,$cid = 0, 'hot', $limit = array($p,9));
  $r['new'] = $this->getArticleListByCid($pcid = 0,$cid = 0, 'new', $limit = array($p,36));
  $r['wonderfull'] = $this->getArticleListByCid($pcid = 0,$cid = 0, 'wonderfull', $limit = array($p,20));
  $r['month_active'] = $this->getMonthUserActive('post', $limit = array($p,10));
  $r['month_attention'] = $this->getMonthUserActive('click', $limit = array($p,10));
  return $r;
 }
 public function getMonthUserActive($sort = 'post', $limit = array(1, 10)){
  $sortMap = array('post'=>'u.post_count DESC','click'=>'u.month_hits DESC');
  $order = $sortMap[$sort];
  $limitSql = $this->get_limit( $limit);
  $sql = sprintf('SELECT u.uid,u.month_hits,u.post_count,m.title,m.urlkey,m.host,m.pic,m.ext FROM %s as u INNER JOIN %s as m ON(u.uid = m.uid) WHERE u.flag=1 ORDER BY %s %s'
  ,self::$_tUser,self::$_tUMeta,$order,$limitSql);
  $list = $this->db->query($sql)->result_array();
  $list = $list ?$list :array();
  foreach($list as &$v){
   $key = $v['urlkey']?$v['urlkey']:$v['uid'];
   $v['url'] = $this->get_url('uchannel',$key);
   $v['pic'] = $this->get_pic($v['host'],$v['pic'],$v['ext']);
   
  }
  return $list;
 }
 public function getArticleListByUid($uid,$pcid = 0,$cid = 0, $sort = 'new', $limit = array(1,7)){
  $r = $this->getArticleListByCid($pcid,$cid, $sort, $limit,$uid);
  return $r;
 }
 public function getArticleCountByUid($uid, $cid = 0){
  $w = array('uid='=>$uid);
  if($cid){
   $w['cid='] = $cid;
  }
  $r = $this->check_id(self::$_tArtileHead,'COUNT(*) as total',$w);
  return $r?$r['total']:0;
 }
 public function getArticleCateByUid($uid){
  $sql = sprintf('SELECT cid FROM %s WHERE uid=%d GROUP BY cid',self::$_tArtileHead, $uid);
  $list = $this->db->query($sql)->result_array();
  $r = array();
  $list = $list?$list:array();
  foreach($list as $v){
   $r[] = $v['cid'];
  }
  return $r;
 }
 public function getArticleListByDate($date = '', $sort = '', $limit = array(1,7)){
  $where = array('flag='=>1);
  if($date){
   $time = time();
   $ptimeMap = array('daily'=>strtotime(date('Y-m-d',$time)),'weekly'=>strtotime(date('Y-m-d',$time - date('w')*86400)),'monthly'=>strtotime(date('Y-m')));
   $ptime = isset($ptimeMap[$date])?$ptimeMap[$date]:$ptimeMap['daily'];
   $where['ptime>='] = $ptime;
  }
  if( in_array($sort, array('original_new','original_hot'))){
   $where['is_original='] = 1;
  }
  $orderMap = array('new'=>' ptime DESC','hot'=>' hits DESC','original_new'=>' ptime DESC'
  ,'original_hot'=>' hits DESC');
  $order = $orderMap[$sort];
  $query = $this->select(self::$_tArtileHead, self::$_fAH, $where, $order, $limit);
//echo $query;exit;
  $list = $query->result_array();
  $list = $list ?$list :array();
  foreach($list as &$v){
   $v['url'] = $this->get_url('article',$v['id']);
   $v['pic'] = $this->get_pic($v['host'],$v['cover'],$v['ext']);
   $v['uinfo'] = $this->get_uinfo($v['uid']);
   $v['time_ago'] = $this->time_ago($v['ptime']);
  }
  return $list;
 }
 public function getArticleListByCid($pcid = 0,$cid = 0, $sort, $limit = array(1,7),$uid = 0){
  $where = array('flag='=>1);
  if($pcid){
   $where['pcid='] = $pcid;
  }elseif($cid){
   $where['cid='] = $cid;
  }
  if($uid){
   $where['uid='] = $uid;
  }
  if('wonderful' == $sort){
   $where['wonderful>='] = 0;
  }
  $orderMap = array('wonderful'=>' wonderful DESC ','new'=>' utime DESC ','hot'=>' hits DESC','cold'=>' hits ASC','rand'=>' utime ASC');
  $order = isset($orderMap[$sort])? $orderMap[$sort]: $orderMap['hot'];
  $query = $this->select(self::$_tArtileHead, self::$_fAH, $where, $order, $limit);
//echo $query;exit;
  $list = array();
  if($query->num_rows()){
   $list = $query->result_array();
   foreach($list as &$v){
    $v['url'] = $this->get_url('article',$v['id']);
    $v['pic'] = $this->get_pic($v['host'],$v['cover'],$v['ext']);
   }
  }
  return $list;
 }
 public function getArticleLink($aid){
  if( !$aid){
   return 0;
  }
  $r = $this->check_id(self::$_tArtileHead,'title',$w=array('id='=>$aid));
  if($r){
   $r['url'] = $this->get_url('article', $aid);
  }
  return $r;
 }
 public function getArticleInfoByAid($aid, $uid = 0, $isadmin = false, $edite = 1, $view = 1){
   $where = '';
   if($uid && !$isadmin && $edite)
    $where = sprintf(' AND `uid`=%d',$uid);

   $sql = sprintf('SELECT a.%s,%s FROM %s as a LEFT JOIN %s as ac ON (a.id=ac.id) WHERE a.id =%d  %s LIMIT 1',self::$_fAH, self::$_fAB, self::$_tArtileHead,self::$_tArtileBody ,$aid,$where);
//echo $sql;exit;
   $data = array();
   $query = $this->db->query($sql);
   if($query->num_rows()){
    global $site_url;
    $data = $query->row_array();
    $data['id'] = $aid;
    $data['url'] = $site_url.$this->get_url('article', $aid);
    $data['pre'] = $this->getArticleLink($data['prelink']);
    $data['nxt'] = $this->getArticleLink($data['nextlink']);
    $data['pic'] = $this->get_pic($data['host'],$data['cover'],$data['ext']);
    $data['uinfo'] = $this->get_uinfo($data['uid']);
   }
   return $data;
 }
}
