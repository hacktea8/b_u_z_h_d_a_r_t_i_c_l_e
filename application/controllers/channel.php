<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Channel extends Viewbase {
  public function __construct(){
    parent::__construct();
  }
  public function index($page = 1){
    $page = intval($page);
    $cid = intval($cid);
    $cid = $cid < 1 ?1:$cid;
    $page = $page > 0 ? $page: 1;
    $limit = 12;
    $channel = &$this->viewData['cate_info'];
    $atotal = isset($channel[$cid])?$channel[$cid]['atotal']:0;
    $subcid = $cid;
    $pcid = 0;
    if( !$channel[$cid]['pcid']){
     $pcid = $cid;
     $subcid = 0;
    }
    $pageTotal = ceil($atotal/$limit);
    $data = array();
    if($page <= $pageTotal){
      
      $data = $this->emulemodel->getArticleList($pcid,$subcid,$page,$limit);
    }
    $data = is_array($data) ? $data : array();
    $this->load->library('pagination');
    $config['base_url'] = sprintf('/maindex/lists/%d/%d/',$cid,$order);
    $config['total_rows'] = $atotal;
    $config['cur_page'] = $page;
    $config['per_page'] = $limit;
    $this->pagination->initialize($config); 
    $page_string = $this->pagination->create_links();
// seo setting
    $title = $channel[$cid]['name']."第{$page}页";
    $kw = '';
    $keywords = $kw.$this->seo_keywords;
    $this->assign(array('seo_title'=>$title,'seo_keywords'=>$keywords
    ,'infolist'=>$data,'pageTotal'=>$pageTotal
    ,'list_url_tpl'=>$config['base_url']
    ,'page_string'=>$page_string,'cid'=>$cid));
#var_dump($this->viewData);exit;
    $this->view('index_lists');
  }
  public function user($uid,$sort,$page = 1){
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
