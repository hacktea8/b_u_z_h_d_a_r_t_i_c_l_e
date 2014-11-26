<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Article extends Viewbase {
 public function __construct(){
  parent::__construct();
  $this->model('articleModel');
 }
 public function index($aid = 0){
  $aid = intval($aid);
  if($aid <1){
   header('HTTP/1.1 301 Moved Permanently');
   header('Location: /');
   exit;
  }
  $data = $this->articleModel->getArticleInfoByAid($aid,0,$this->userInfo['uid'], $this->userInfo['isadmin'],0);
//$this->debug($data);
  if(empty($data)){
    header('Location: '.self::$url404);
    exit;
  }
  $cid = $data['cid'] ? $data['cid'] : 0;
  $top_channel = array($data['pcid'],$data['cid']);
  $_key = 'view_rightHot'.$cid;
  $viewHot = $this->mem->get($_key);
  if(empty($viewHot)){
   $viewHot = $this->articleModel->getArticleListByCid($pcid = 0,$cid,'hot',array(2,18));
   $this->mem->set($_key,$viewHot,self::$ttl['12h']);
  }
  $_key = 'article_also_like_cid_'.$cid;
  $also_like = $this->mem->get($_key);
  if( empty($also_like)){
   $tmp = $this->articleModel->getArticleListByCid($pcid = 0,$cid,'hot',array(10,3));
   $also_like = $this->articleModel->getArticleListByCid($pcid = 0,$cid,'new',array(10,3));
   $also_like = array_merge($also_like ,$tmp);
   $this->mem->set($_key, $also_like, self::$ttl['2h']);
  }
  
  $_key = 'author_other_article_uid_'.$info['uid'];
  $author_other_article = $this->mem->get($_key);
  if( empty($author_other_article)){
   $tmp = $this->articleModel->getArticleListByCid($pcid = 0,$cid,'hot',array(2,2),$info['uid']);
   $author_other_article = $this->articleModel->getArticleListByCid($pcid = 0,$cid,'new',array(2,2),$info['uid']);
   $author_other_article = array_merge($author_other_article ,$tmp);
   $this->mem->set($_key, $author_other_article, self::$ttl['2h']);
  }
//  $data['intro'] = preg_replace(array('#[a-z]+://[a-z0-9]+\.[a-z0-9-_/\.]+#is','#[a-z0-9]+\.[a-z0-9-_/\.]+#is'),array('',''),$data['intro']);
  $tags = explode(',',$data['tags']);
  //$uk = $this->input->get('uk',0);
  $uk = 0;//intval($uk);
  $t = 1;//$uk?2:1;
  $this->model('userModel');
  $postUinfo = $this->userModel->getUinfoByUid('wid,gid', $data['uid']);
  $str = sprintf('%d|%d|%d|%d|%d|%d|%d|%d|%d',
  $t,$uk,$postUinfo['gid'],$postUinfo['wid'],$data['coop'],
  $data['id'],$data['uid'],$data['pcid'],$data['cid']);
  $click_key = $this->str_encode($str,'ENCODE');
  $isCollect = 0;//$this->emulemodel->getUserIscollect($this->userInfo['uid'],$data['id']);
  $writerGroup = $this->getUserWriterGroup();
  $this->assign(array('isCollect'=>$isCollect,'click_key'=>$click_key
  ,'cid'=>$cid,'pcid'=>$cpid,'info'=>$data,'tags'=>$tags
  ,'aid'=>$aid,'top_channel'=>$top_channel
  ,'also_like'=>$also_like,'viewHot'=>$viewHot,'writerGroup'=>$writerGroup
  ,'postUinfo'=>$postUinfo,'author_other_article'=>$author_other_article
  )); 
  $this->setseo($data['title'],$data['tags'],$data['summary']);
  $this->view('article_index');
  }
 public function hots($date = '0',$display = 'list'){
  $hotList = $this->articleModel->getArticleListByDate($date,$sort = 'hot',array(1,20));
  $originList = $this->articleModel->getArticleListByDate($date,$sort = 'original_hot',array(1,20));
  $this->assign(compact('originList','hotList','date','display'));
  $display = !in_array($display,array('list','box'))?'list':$display;
  $this->view('article_hots_'.$display);
 }
 public function news(){
  $newList = $this->articleModel->getArticleListByDate($date = '',$sort = 'new',array(1,20));
  $originList = $this->articleModel->getArticleListByDate($date = '',$sort = 'original_new',array(1,20));
  $this->assign(compact('newList','originList'));
  $this->view('article_news');
 }
 public function original(){
  $originList = $this->articleModel->getArticleListByDate($date = '',$sort = 'original_hot',array(1,20));
  $hotList = $this->articleModel->getArticleListByDate($date = '',$sort = 'hot',array(1,20));
  $this->assign(compact('originList','hotList'));
  $this->view('article_original');
 }
 
}
?>
