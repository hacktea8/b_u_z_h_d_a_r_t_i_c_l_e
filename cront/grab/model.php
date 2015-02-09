<?php


class Model{
 static public $_tAH = 'article_title';
 static public $_tAC = 'article_content';
 protected $db;
  
 function __construct(){
  $this->db = new DB_MYSQL();
 }

 function getCateBycid($cid){
  if(!$cid){
   return false;
  }
  $sql = sprintf('SELECT * FROM %s WHERE `flag`=1 AND `id`=%d LIMIT 1',$this->db->getTable('emule_cate'),$cid);
  $res = $this->db->row_array($sql);
  return $res;
 }
 function getArticleViaList($flag = 5, $limit = 30){
  $sql = sprintf('SELECT at.id,ac.intro FROM %s as at INNER JOIN %s as ac WHERE at.id=ac.id AND at.flag=%d LIMIT %d',self::$_tAH,self::$_tAC,$flag,$limit);
  $list = $this->db->result_array($sql);
  $list = $list?$list:array();
  return $list;
 }
 function getArticleNoCoverList($flag = 5, $limit = 30){
  $sql = sprintf('SELECT id,thum FROM %s WHERE flag=1 AND iscover=%d LIMIT %d',self::$_tAH,$flag,$limit);
  $list = $this->db->result_array($sql);
  $list = $list?$list:array();
  return $list;
 }
 function updateArticleParam($param){
  $head = $this->filter($param, array('flag','iscover','cover','host','ext'));
  $body = $this->filter($param, array('intro'));
  $where = array('id'=>$param['id']);
  if($head){
   $sql = $this->db->update_string(self::$_tAH,$head,$where);
   $this->db->query($sql);
  }
  if($body){
   $sql = $this->db->update_string(self::$_tAC,$body,$where);
   $this->db->query($sql);
  }
  return 1;
 }
 function filter($data,$key){
  $r = array();
  foreach($key as $k){
   if( isset($data[$k])){
    $r[$k] = $data[$k];
   }
  }
  return $r;
 }
 function addArticleOaid($oaid){
  if( !$oaid){
   return 0;
  }
  $sql = $this->db->insert_string('crawmap',array('oaid'=>$oaid));
  $this->db->query($sql);
  return $this->db->insert_id();
 }
 function checkArticleByOaid($oaid){
  $sql = sprintf("SELECT id FROM crawmap where oaid=%d LIMIT 1",$oaid);
  $res = $this->db->row_array($sql);
  return $res['id'];
 }
 function getsubcatelist(){
  $sql = sprintf('SELECT `id`, `pid`, `name`,`url` FROM %s WHERE `flag`=1 AND `pid`>0',$this->db->getTable('emule_cate'));
  $res = $this->db->result_array($sql);
  return $res;
 }

 function geticiliemusubcate(){
    $sql=sprintf('SELECT * FROM %s WHERE `flag`=1 AND `iciliemu` IS NOT NULL AND `pid`>0',$this->db->getTable('emule_cate'));
    $res=$this->db->result_array($sql);
     return $res;
  }

  function geticiliParcate(){
     $sql='SELECT `id`, `pid`, `iciliemu` FROM '.$this->db->getTable('emule_cate').' WHERE  `iciliemu` is not null AND pid=0';
     return $this->db->result_array($sql);
  }

  function updateCateUrlByname($data=array()){
    if(!$data){
        return false;
    }
    $where=isset($data['pid'])?' AND pid='.$data['pid']:'';
    $sql=sprintf('SELECT `id`,`pid` FROM '.$this->db->getTable('emule_cate').' WHERE `name`=\'%s\' %s LIMIT 1',mysql_real_escape_string($data['name']),$where);
    $row=$this->db->row_array($sql);
    if($row['id']){
       unset($data['name']);
       $vals='';
       foreach($data as $k=>$v){
          $vals.=','."`$k`='".mysql_real_escape_string($v)."'";
       }
       $vals=trim($vals,',');
       $sql=sprintf('UPDATE '.$this->db->getTable('emule_cate').' SET %s WHERE `id`=%d LIMIT 1',$vals,$row['id']);
       $this->db->query($sql);
       return $row['id'];
    }
    $keys=$vals='';
    foreach($data as $k=>$v){
       $keys.=','."`$k`";
       $vals.=','."'".mysql_real_escape_string($v)."'";
    }
    $keys=trim($keys,',');
    $vals=trim($vals,',');
    $sql=sprintf('INSERT INTO '.$this->db->getTable('emule_cate').'(%s) VALUES (%s)',$keys,$vals);
    $this->db->query($sql);
    
  }
  
  function addCateByname($cname,$pid=0,$ourl=''){
    if(!$cname)
       return false;

    $sql=sprintf("SELECT `id` FROM `%s` WHERE `name`='%s' AND `pid`=%d LIMIT 1",$this->db->getTable('emule_cate'),mysql_real_escape_string($cname),$pid);
    $row=$this->db->row_array($sql);
    if($row['id']){
       return $row['id'];
    }
    $sql=sprintf("INSERT INTO `%s`(`pid`, `name`, `url`) VALUES (%d,'%s','%s')",$this->db->getTable('emule_cate'),$pid,mysql_real_escape_string($cname),mysql_real_escape_string($ourl));
    $this->db->query($sql);
    $sql=sprintf("SELECT `id` FROM `%s` WHERE `name`='%s' AND `pid`=%d LIMIT 1",$this->db->getTable('emule_cate'),mysql_real_escape_string($cname),$pid);
    $row=$this->db->row_array($sql);
    if($row['id']){
       return $row['id'];
    }
    return false;
  }
  function getCateInfoBypid($pid=0){
     $sql=sprintf("SELECT `id`, `oid`, `pid`, `name`, `url` FROM `%s` WHERE `pid`=%d ",$this->db->getTable('emule_cate'),$pid);
     $res=$this->db->result_array($sql);
     return $res;
  }
  function checkArticleByOid($oid,$utime){
    if(!$oid ||!$utime){
       return false;
    }
    $sql=sprintf("SELECT `id` FROM `%s` WHERE  `oid`=%d AND `utime`=%d LIMIT 1",$this->db->getTable('emule_article'),$oid,$utime);
    $row=$this->db->row_array($sql);
    return $row['id'];
  } 
  function checkArticleByOname($oname){
    if(!$oname){
       return false;
    }
    $sql=sprintf("SELECT `id` FROM `%s` WHERE  `name`='%s' LIMIT 1",$this->db->getTable('emule_article'),mysql_real_escape_string($oname));
    $row=$this->db->row_array($sql);
    return $row['id'];
  } 
  function addArticle($data){
    if(!$data){
       return false;
    }
    $contents = array();
    $contents['downurl'] = $data['downurl'];
    unset($data['downurl']);
    $contents['intro'] = $data['intro'];
    $contents['keyword'] = '0';
    unset($data['intro']);
    unset($data['oid']);
    unset($data['keyword']);
    unset($data['description']);
    $sql=$this->db->insert_string($this->db->getTable('emule_article'),$data);
    $this->db->query($sql);
    $id = $this->db->insert_id();
    if(!$id){
       return false;
    }
    $contents['id'] = $id;
    $table = $this->get_content_table($id);
    $sql=$this->db->insert_string($this->db->getTable($table),$contents);
    $this->db->query($sql);
    return $this->checkArticleByOname($data['name']);
  }
  function getArticleList($page = 1, $limit = 100){
    $sql = sprintf('SELECT `id` FROM %s LIMIT %d,%d',$this->db->getTable('emule_article'),($page - 1)*$limit,$limit);
    return $this->db->result_array($sql);
  }
  function getArticleByid($id){
    $table = $this->get_content_table($id);
    $sql = sprintf('SELECT * FROM %s WHERE `id` = %d LIMIT 1',$this->db->getTable($table),$id);
    return $this->db->row_array($sql);
  }
  function update_article_contents($data = array()){
    if( !isset($data['id'])){
       return false;
    }
    $where = array('id'=>$data['id']);
    $table = $this->get_content_table($data['id']);
    unset($data['id']);
    $sql = $this->db->update_string($this->db->getTable($table),$data, $where);
    $this->db->query($sql);
    return true;
  }
  function add_article_contents($data = array()){
    if( !isset($data['id'])){
       return false;
    }
    $table = $this->get_content_table($data['id']);
//echo $table;exit;
    $sql = $this->db->insert_string($this->db->getTable($table),$data);
    $this->db->query($sql);
    return true;
  }
  function get_content_table($id){
    return sprintf('emule_article_content%d',$id%10);
  }
  function updateCateatotal(){
    $sql='SELECT `id` FROM '.$this->db->getTable('emule_cate').' WHERE `pid`!=0';
    $res=$this->db->result_array($sql);
    foreach($res as $val){
       $sql='UPDATE '.$this->db->getTable('emule_cate').' SET `atotal`= (SELECT count(`id`) FROM '.$this->db->getTable('emule_article').' WHERE `cid`='.$val['id'].') WHERE `id`='.$val['id'];
       $this->db->query($sql);
sleep(0.5);
    }
return true;
  }
}

?>
