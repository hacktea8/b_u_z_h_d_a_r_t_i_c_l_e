<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'webbase.php';
class Viewbase extends Webbase {
 static public $url404 = '/404.html';
 
 public function __construct(){
  parent::__construct();
  $writerGroup = $this->getUserWriterGroup();  
  $userGroup = $this->getUserGroup();  
  $this->assign(array(
  'cdn_url'=>$this->config->item('cdn_url'),'writerGroup'=>$writerGroup
  ,'error_img'=>'/public/images/show404.jpg','userGroup'=>$userGroup
  ,'pcid'=>0,'cid'=>0
  ));
/** user level **/
  if( $this->uid && !isset($this->userInfo['level_point'])){
   $nxtLevel = array();
   foreach($writerGroup as $v){
    if($v['hits'] > $this->userInfo['month_hits']){
     $nxtLevel = $v;
     break;
    }
   }
   $this->userInfo['level_point'] = $nxtLevel['hits'] - $this->userInfo['month_hits'];
   $this->userInfo['level_per'] = ( $this->userInfo['month_hits'] / $nxtLevel['hits'])*100;
   $this->session->set_userdata(array('user_logindata'=>$this->userInfo));
  }
  $invate = $this->input->get('invite',0);
  if($invate){
   $this->cookie('invite', $invate, 86400);
  }
  //$this->_get_ads_link();
//var_dump($this->viewData);exit;
 }
  protected function getHotArticle($pcid = 0, $cid = 0){
    $_key = sprintf('site_hotArticle_%d_%d',$pcid,$cid);
    $hotArticle = $this->mem->get($_key);
//var_dump($hotArticle);exit;
    if(empty($hotArticle)){
      $this->load->model('articleModel');
      $hotArticle = $this->articleModel->getArticleListByCid($pcid ,$cid, $sort = 'hot', array(1,10));;
      $this->mem->set($_key,$hotArticle,self::$ttl['2h']);
    }
    return $hotArticle;
  }
  protected function _get_ads_link(){
   $click_ad_link = '';
   if(0&& !isset($_COOKIE['ahref_click']) && in_array($this->_a,array('lists','topic'))){
    $host = $_SERVER['HTTP_HOST'];
    $url = sprintf("http://c.3808010.com/code1/cpc_0_1_1.asp?w=960&h=130&s_h=1&s_l=6&c1=CCCCCC&c2=c90000&c3=ffffff&pid=264232&u=204756&top=%s&err=&ref=%s/",$this->viewData['current_url'],$host);
    $referer = 'http://'.$this->viewData['current_url'];
    $default_opts = array(
    'http'=>array(
    'method'=>"GET",
    'header'=>"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.66 Safari/537.36\r\n".
    "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8\r\n".
    "Accept-Language: zh-cn,zh;q=0.8,en-us;q=0.5,en;q=0.3\r\n".
    "Cache-Control: max-age=0\r\n".
    $referer

    )
    );
    $default = stream_context_get_default($default_opts);
    $context = stream_context_create($default_opts);
    $html =  file_get_contents($url, false, $context);
    preg_match_all('#<a .*href="([^"]+)"#Uis',$html,$match);
    $links = $match[1];
    $k = array_rand($links);
    $click_ad_link = $links[$k];
   }
    $this->assign(array('click_ad_link'=>$click_ad_link));
    //echo $links[$k];exit;
  }
  protected function isrobots(){
   $return = 0;
   if(FALSE !== stripos($_SERVER['HTTP_USER_AGENT'], 'spider')){
    $return = 1;
   }
   return $return;
  }
  protected function getUserGroup(){
   $k = 'site_urser_group';
   $writerGroup = $this->mem->get($k);
   if(empty($writerGroup)){
    $this->model('userModel');
    $writerGroup = $this->userModel->getUserGroup();
    $this->mem->set($k,$writerGroup,self::$ttl['3d']);
   }
   return $writerGroup;
  }
  protected function getUserWriterGroup(){
   $k = 'site_urser_writer_group';
   $writerGroup = $this->mem->get($k);
   if(empty($writerGroup)){
    $this->model('userModel');
    $writerGroup = $this->userModel->getUserWriterGroup();
    $this->mem->set($k,$writerGroup,self::$ttl['3d']);
   }
   return $writerGroup;
  }
  protected function setseo($title = '',$keyword = '',$description = ''){
   self::$seo['title'] = $title;
   if($keyword){
    self::$seo['keyword'] = $keyword;
   }
   if($description){
    self::$seo['description'] = $description;
   }
  }
}
