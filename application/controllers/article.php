<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Article extends Viewbase {
  public function __construct(){
    parent::__construct();
  }
  public function index($catename,$pdate,$aid){
    $aid = intval($aid);
    if($aid <1){
      header('HTTP/1.1 301 Moved Permanently');
      header('Location: /');
      exit;
    }
    $data = $this->emulemodel->getEmuleTopicByAid($aid,0,$this->userInfo['uid'], $this->userInfo['isadmin'],0);
    if(empty($data)){
       header('Location: '.$this->url404);
       exit;
    }
    $cid = $data['info']['cid'] ? $data['info']['cid'] : 0;
    $_key = 'view_rightHot'.$cid;
    $viewHot = $this->mem->get($_key);
    if(!$viewHot){
       $viewHot = $this->emulemodel->getArticleListByCid($cid,2,2,18);
       $this->mem->set($_key,$viewHot,$this->expirettl['12h']);
    }
    $data['info']['intro'] = preg_replace(array('#[a-z]+://[a-z0-9]+\.[a-z0-9-_/\.]+#is','#[a-z0-9]+\.[a-z0-9-_/\.]+#is'),array('',''),$data['info']['intro']);
// seo setting
    $kw = $this->viewData['channel'][$cid]['name'];
    $title = $data['info']['name'];
    $keywords = sprintf('%s,%s在线观看,%s全集,%s%s,%s下载,%s主题曲,%s剧情,%s演员表',$title,$title,$title,$kw,$title,$title,$title,$title,$title);
    $seo_description = strip_tags($data['info']['intro']);
    $seo_description = preg_replace('#\s+#Uis','',$seo_description);
    $seo_description = mb_substr($seo_description,0,250);
    $isCollect = $this->emulemodel->getUserIscollect($this->userInfo['uid'],$data['info']['id']);
    $this->assign(array('isCollect'=>$isCollect,'verifycode'=>$verifycode,'seo_title'=>$title
    ,'seo_keywords'=>$keywords,'cid'=>$cid,'cpid'=>$cpid,'info'=>$data['info']
    ,'aid'=>$aid,'seo_description'=>$seo_description
    ,'videovols'=>$data['vols'],'viewHot'=>$viewHot
    )); 
#echo "<pre>";var_dump($this->viewData);exit;
    $this->view('index_view');
  }
  
}
?>
