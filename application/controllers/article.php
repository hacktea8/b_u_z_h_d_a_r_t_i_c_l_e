<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Article extends Viewbase {
  public function __construct(){
    parent::__construct();
  }
  public function index($aid = 0){
    $aid = intval($aid);
    if($aid <1){
      header('HTTP/1.1 301 Moved Permanently');
      header('Location: /');
      exit;
    }
    $this->load->model('articleModel');
    $data = $this->articleModel->getArticleInfoByAid($aid,0,$this->userInfo['uid'], $this->userInfo['isadmin'],0);
    if(empty($data)){
       header('Location: '.$this->url404);
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
    $also_like = array();
    $data['intro'] = preg_replace(array('#[a-z]+://[a-z0-9]+\.[a-z0-9-_/\.]+#is','#[a-z0-9]+\.[a-z0-9-_/\.]+#is'),array('',''),$data['intro']);
// seo setting
    $kw = $this->viewData['cate_info'][$cid]['title'];
    $title = $data['title'];
    $keywords = sprintf('%s,%s在线观看,%s全集,%s%s,%s下载,%s主题曲,%s剧情,%s演员表',$title,$title,$title,$kw,$title,$title,$title,$title,$title);
    $seo_description = strip_tags($data['intro']);
    $seo_description = preg_replace('#\s+#Uis','',$seo_description);
    $seo_description = mb_substr($seo_description,0,250);
    $isCollect = 0;//$this->emulemodel->getUserIscollect($this->userInfo['uid'],$data['id']);
    $this->assign(array('isCollect'=>$isCollect,'verifycode'=>$verifycode,'seo_title'=>$title
    ,'seo_keywords'=>$keywords,'cid'=>$cid,'pcid'=>$cpid,'info'=>$data
    ,'aid'=>$aid,'seo_description'=>$seo_description,'top_channel'=>$top_channel
    ,'also_like'=>$also_like,'viewHot'=>$viewHot
    )); 
//$this->debug($this->viewData);
    $this->view('index_post');
  }
  
}
?>
