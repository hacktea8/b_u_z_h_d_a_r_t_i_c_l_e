<?php
require_once 'basemodel.php';
class emuleModel extends baseModel{
  protected $_dataStruct = 'a.`id`, a.`cid`, a.`uid`, a.`name`, a.`collectcount`, a.`ptime`, a.`utime`,a.`onlinedate`, a.`cover`, a.`hits`';
  protected $_datatopicStruct = 'a.`id`, a.`cid`, a.`uid`, a.`name`,a.`collectcount`, ac.`keyword`,ac.`actor`, a.`onlinedate`, a.`ptime`, a.`utime`, ac.`intro`, a.`cover`, a.`hits`';
  protected $_volsStruct = '`id`, `vid`, `sid`, `vol`, `volname`';
  protected $_volsPlayStruct = '`id`, `vid`, `sid`, `vol`, `volname`, `link`';

  public function __construct(){
     parent::__construct();
  }
  public function autoSetVideoOnline($limit = 5){
    $cate = $this->getAllCateInfo();
    foreach($cate as $v){
      $k = $v['cid'];
      $sql = sprintf('UPDATE %s SET `onlinedate`=%d,`flag`=1,`utime`=%d,`ptime`=%d WHERE `onlinedate`=0 AND `cid`=%d LIMIT %d',$this->db->dbprefix('article_title'),date('Ymd'),time(),time(),$k,$limit);
      $this->db->query($sql);
    }
    return 1;
  }
  public function setCateVideoTotal(){
    $cate = $this->getAllCateInfo();
    foreach($cate as $v){
      $k = $v['cid'];
      $sql = sprintf('UPDATE %s SET`atotal`=(SELECT COUNT(*) FROM %s WHERE `flag`=1 AND `onlinedate`<=%d AND `onlinedate`>0 AND `cid`=%d) WHERE `id`=%d LIMIT 1',$this->db->dbprefix('cate'),$this->db->dbprefix('article_title'),date('Ymd'),$k,$k);
      $this->db->query($sql);
    }
    return 1;
  }
  public function getAllCateInfo(){
    $sql = sprintf("SELECT `cid`, `pcid`, `title`, `total` FROM %s WHERE `flag`=1 ORDER BY `sort` ASC",$this->db->dbprefix('cate'));
    $list = $this->db->query($sql)->result_array();
    $return = array();
    foreach($list as &$v){
      $v['url'] = $this->geturl('lists',$v['cid']);
      $return[$v['cid']] = $v;
    }
    return $return;
  }
  public function getIndexData(){
    $return = array();
    $return['topRecomData'] = $this->getArticleListByCid($cid =0,$order=0,$page=5,$limit=15);
    return $return;
  }

  public function getUserCollectList($uid,$order=0,$page=1,$limit=25){
    if( !$uid){
      return false;
    }
    $ordermap = array('new'=>'ct.`atime` DESC ');
    $order = isset($ordermap[$order]) ? $ordermap[$order] : array_shift($ordermap);
    $order = ' ORDER BY '.$order;
    $page = intval($page) - 1;
    $page = $page ? $page : 0;
    $page *= $limit;
    $limit = sprintf(' LIMIT %d,%d ',$page,$limit);
    $sql = sprintf("SELECT ae.`id`, ae.`cid`, ae.`uid`, ae.`name`, ae.`hits`, ae.`cover`,ct.`atime` FROM %s as ae INNER JOIN %s as ct ON(ae.id=ct.aid) WHERE ct.uid=%d AND ct.`flag`=1 %s %s",$this->db->dbprefix('article_title'),$this->db->dbprefix('collect'),$uid,$order,$limit);
    $list = $this->db->query($sql)->result_array();
    foreach($list as &$v){
      $v['atime'] = date('Y-m-d H:i:s', $v['atime']);
      $v['url'] = $this->geturl('views',$v['id']);
    }
    return $list;
  }

  public function renewUserShip($data){
    //collect
    if('collect' === $data['type']){
       $sql = sprintf("UPDATE %s SET `collectcount`=`collectcount` %s WHERE `id`=%d LIMIT 1",$this->db->dbprefix('article_title'),$data['collect'],$data['aid']);
       return $this->db->query($sql);
    }
  }

  public function addUserCollect($uid,$aid){
    if( !$uid || !$aid){
      return false;
    }
    $table = $this->db->dbprefix('collect');
    $sql = sprintf("SELECT `flag` FROM %s WHERE `aid`=%d AND `uid`=%d LIMIT 1",$table,$aid,$uid);
    $row = $this->db->query($sql)->row_array();
    if(isset($row['flag'])){
      $flag = $row['flag'];
      $flag = $flag ? 0:1;
      $sql = $this->db->update_string($table,array('flag'=>$flag),array('aid'=>$aid,'uid'=>$uid));
      $this->db->query($sql);
      return $flag;
    }
    $data = array('aid'=>$aid,'uid'=>$uid,'flag'=>1,'atime'=>time());
    $sql = $this->db->insert_string($table,$data);
    $this->db->query($sql);
    return 1;
  }

  public function getUserIscollect($uid,$aid){
    if( !$uid || !$aid){
      return false;
    }
    $sql = sprintf("SELECT `flag` FROM %s WHERE `aid`=%d AND `uid`=%d LIMIT 1",$this->db->dbprefix('collect'),$aid,$uid);
    $row = $this->db->query($sql)->row_array();
    return isset($row['flag']) ? $row['flag']:0;
  }

  public function getUserCollectTotal($uid){
    if( !$uid){
      return false;
    }
    $sql = sprintf("SELECT count(*) as total FROM %s WHERE `uid`=%d",$this->db->dbprefix('collect'),$uid);
    $row = $this->db->query($sql)->row_array();
    return isset($row['total']) ? $row['total']: 0;
  }
  public function getArticleList($pcid = 0,$cid='',$page=1,$limit=25){
    $return = array('new'=>array(),'hot'=>array(),'wonderful'=>array());
    $list = $this->getArticleListByCid($pcid,$cid,$order = 0,$page,$limit);
    if($list){
     $return['new']=>$list;
    }
    $list = $this->getArticleListByCid($pcid,$cid,$order = 2,$page,$limit);
    if($list){
     $return['hot']=>$list;
    }
    $list = $this->getArticleListByCid($pcid,$cid,$order = 1,$page,$limit);
    if($list){
     $return['wonderful']=>$list;
    }
    return $return;
  }
  public function getArticleListByCid($pcid = 0,$cid='',$order=0,$page=1,$limit=25){
     switch($order){
       case 1:
       $order=' ORDER BY a.hits ASC '; break;
       case 2:
       $order=' ORDER BY a.hits DESC '; break;
       default:
       $order=' ORDER BY a.ptime DESC ';
     }
     $page = intval($page) - 1;
     $page = $page ? $page : 0;
     $page *= $limit;
     $where = '';
     if($cid){
       $where = ' a.`cid` ='.$cid.' AND ';
     }elseif($pcid){
       $where = ' a.`pcid` ='.$pcid.' AND ';
     }
     $sql = sprintf('SELECT %s FROM %s as a WHERE %s a.`onlinedate`<=%d AND a.`onlinedate`>0 AND a.`flag`=1 %s LIMIT %d,%d',$this->_dataStruct,$this->db->dbprefix('article_title'),$where,date('Ymd'),$order,$page,$limit);
//echo $sql;exit;
     $data = array();
     $data = $this->db->query($sql)->result_array();
     foreach($data as &$val){
       $val['url'] = $this->geturl('views',$val['id']);
       $val['ptime'] = date('Y-m-d', $val['ptime']);
       $val['utime'] = date('Y/m/d', $val['utime']);
       $val['onlinedate'] = $val['ptime'];
     }
     return $data;
  }

  public function get_content_table($id){
    return 'article_content';
  }
  public function getEmuleTopicByAid($aid,$sid=0,$uid=0,$isadmin=false,$edite=1,$view=1){
     $where = '';
     if($uid && !$isadmin && $edite)
       $where = sprintf(' AND `uid`=%d LIMIT 1',$uid);

     $table = $this->get_content_table($aid);
     $sql = sprintf('SELECT %s FROM %s as a LEFT JOIN %s as ac ON (a.id=ac.id) WHERE a.id =%d  %s LIMIT 1',$this->_datatopicStruct,$this->db->dbprefix('article_title'),$this->db->dbprefix($table),$aid,$where);
     $data = array();
     $data['info'] = $this->db->query($sql)->row_array();
     return $data;
  }
  public function setEmuleTopicByAid($uid=0,$data,$isadmin=false){
     //过滤字段
     $header = $this->filter($data['header'], $filter = array('id','cid','pcid','name','cover','thum','flag');
     $header['utime'] = time();
     $body = $this->filter($data['header'], $filter = array('tags','intro'));
     if(isset($header['id']) && $header['id']){
        $this->_datatopicStruct = ' a.`id` ';
        $check = $this->getEmuleTopicByAid($header['id'],$uid,$isadmin);
        if( !isset($check['info']['id'])){
           return false;
        }
        $where = array('id'=>$header['id']);
        unset($header['id']);
        $sql = $this->db->update_string($this->db->dbprefix('article_title'),$header,$where);
        $this->db->query($sql);
        $table = $this->get_content_table($where['id']);
        $cinfo = $this->checkArticleContent($where['id']);
        if($cinfo){
          $sql = $this->db->update_string($this->db->dbprefix($table),$body,$where);
        }else{
          $body['id'] = $where['id'];
          $sql = $this->db->insert_string($this->db->dbprefix($table),$body);
        }
        $this->db->query($sql);
        return $data['id'];
     }
     $header['uid'] = $uid;
     unset($header['id']);
     $header['ptime'] = $header['ptime']?$header['ptime']:time();
     $sql = $this->db->insert_string($this->db->dbprefix('article_title'),$header);
     $this->db->query($sql);
     $id = $this->db->insert_id();
     $body['id'] = $id;
     $table = $this->get_content_table($id);
     $sql = $this->db->insert_string($this->db->dbprefix($table),$body);
     $this->db->query($sql);
     return $id;
  }
  public function checkArticleContent($aid){
     if(!$aid){
       return 0;
     }
     $table = $this->get_content_table($aid);
     $sql = sprintf("SELECT `id` FROM %s WHERE `id`=%d LIMIT 1",$table,$aid);
     $row = $this->db->query($sql)->row_array();
     return $row;
  }
  public function delEmuleTopicByAid($aid = 0,$uid=0,$isadmin=false){
     if( !$aid){
        return false;
     }
     $this->_datatopicStruct = ' `id` ';
     $check = $this->getEmuleTopicByAid($aid,$uid,$isadmin);
     if( !isset($check['id'])){
        return false;
     }
     $where = array('id'=>$aid);
     $sql = $this->db->delete($this->db->dbprefix('article_title'),$where);
     $this->db->query($sql);
     $table = $this->get_content_table($aid);
     $sql = $this->db->delete($this->db->dbprefix($table),$where);
     $this->db->query($sql);
     return $aid;
  }

  public function getCateAtotal($cid){
     if( !$cid){
        return false;
     }
     $sql = sprintf('SELECT `pid`, `atotal` FROM %s WHERE `id`=%d AND `flag`=1 LIMIT 1',$this->db->dbprefix('emule_cate'),$cid);
     $subinfo = $this->db->query($sql)->row_array();

     if( !$subinfo['pid']){
        $sql = sprintf('SELECT sum(`atotal`) as atotal FROM %s WHERE `pid`=%d AND `flag`=1',$this->db->dbprefix('emule_cate'),$cid);
        $subinfo = $this->db->query($sql)->row_array();
     }
     return $subinfo['atotal'];

  }

  public function getAllCateidsByCid($cid = 0){
     if( !$cid){
        return false;
     }
     $sql = sprintf('SELECT `id` FROM %s WHERE `pid`=%d AND `flag`=1',$this->db->dbprefix('emule_cate'),$cid);
     $cate = $this->db->query($sql)->result_array();
     $res = array();
     foreach($cate as $val){
       $res[] = $val['id'];
     }
     $res = count($res) ? $res : array($cid);
     return $res;
  }

  public function getHotTopic($order = 'hits',$limit=15){
     $order = $order ? ' `ptime` DESC ': ' `hits` DESC ';
     $sql   = sprintf('SELECT `id`, `name`,`cover` FROM %s WHERE `flag`=1 ORDER BY %s LIMIT %d', $this->db->dbprefix('article_title'), $order, $limit); 
     $hot = $this->db->query($sql)->result_array();
     foreach($hot as &$v){
       $v['url'] = $this->geturl('views',$v['id']);
     }
     return $hot;
  }

  public function getSubCateByCid(){
     $sql = sprintf('SELECT `id`, `pid`, `name`, `atotal` FROM %s WHERE `pid` > 0 AND `flag` = 1',$this->db->dbprefix('emule_cate'));
     return $this->db->query($sql)->result_array();
  }
}
?>
