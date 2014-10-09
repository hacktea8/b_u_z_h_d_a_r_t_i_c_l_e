<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Channel extends Viewbase {
  public function __construct(){
    parent::__construct();
  }
  public function index($order = 'hot', $show = 'list', $page = 1){
    $page = intval($page);
    $page = $page > 0 ? $page: 1;
    $limit = 40;
    $data = array();
    $this->model('userModel');
    $atotal = $this->userModel->getChanneCount();
    $pageTotal = ceil($atotal/$limit);
    if($page <= $pageTotal){
     $data = $this->userModel->getChannelList($order,array($page,$limit));
    }
    $data = is_array($data) ? $data : array();
    $hotArticle = $this->getHotArticle();
    $this->load->library('pagination');
    $config['base_url'] = sprintf('/channel/index/%s/%s/',$order,$show);
    $config['total_rows'] = $atotal;
    $config['cur_page'] = $page;
    $config['per_page'] = $limit;
    $this->pagination->initialize($config); 
    $page_string = $this->pagination->create_links();
// seo setting
    $title = "頻道第{$page}页";
    $kw = '';
    $keywords = $kw.$this->seo_keywords;
    $this->assign(array('seo_title'=>$title,'seo_keywords'=>$keywords
    ,'lists'=>$data,'pageTotal'=>$pageTotal,'order'=>$order
    ,'list_url_tpl'=>$config['base_url'],'show'=>$show,'page'=>$page
    ,'page_string'=>$page_string,'cid'=>$cid,'hotArticle'=>$hotArticle
    ));
//var_dump($this->viewData);exit;
    $this->view('channel_index');
  }
  public function user($uid,$sort = 'new', $cid = 0,$page = 1){
    $uid = intval($uid);
    if($uid <1){
      header('HTTP/1.1 301 Moved Permanently');
      header('Location: /');
      exit;
    }
    $pLimit = 20;
    $this->model('userModel');
    $channel = $this->userModel->getUserChannelInfo($uid);
    
    if(empty($channel)){
     $this->oops('频道不存在');
    }
    $lists = $this->articleModel->getArticleListByUid($uid,$cid,$sort,array($page,$pLimit));
// seo setting
    $kw = '';
    $title = $channel['title'];
    $keywords = sprintf('%s',$title);
    $seo_description = strip_tags($channel['intro']);
    $seo_description = preg_replace('#\s+#Uis','',$seo_description);
    $seo_description = mb_substr($seo_description,0,250);
    $this->assign(array('seo_title'=>$title
    ,'seo_keywords'=>$keywords,'cid'=>$cid,'cpid'=>$cpid,'info'=>$data['info']
    ,'aid'=>$aid,'seo_description'=>$seo_description
    ,'channel'=>$channel,'lists'=>$lists
    )); 
#echo "<pre>";var_dump($this->viewData);exit;
    $this->view('channel_user');
  }
  
}
?>
