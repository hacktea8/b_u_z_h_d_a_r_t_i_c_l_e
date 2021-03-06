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
  public function user($urlkey,$sort = 'new', $cid = 0,$page = 1){
    $page = intval($page);
    $page = $page<1?1:$page;
    $pLimit = 20;
    $this->model('userModel');
    $channel = $this->userModel->getUserChannelInfo($urlkey);
    $uid = $channel['uid'];
    if(empty($channel)){
     $this->oops('频道不存在');
    }
    $this->model('articleModel');
    $atotal = $this->articleModel->getArticleCountByUid($uid, $cid);
    $userCate = $this->articleModel->getArticleCateByUid($uid);
    $lists = $this->articleModel->getArticleListByUid($uid, $pcid = 0,$cid,$sort,array($page,$pLimit));
    $lastP = ceil($atotal/$pLimit);
    $page_string = '';
    if( $lastP > 1){
     $this->load->library('pagination');
     $config['base_url'] = sprintf('/channel/user/%d/%s/%d/', $uid, $order,$cid);
     $config['total_rows'] = $atotal;
     $config['cur_page'] = $page;
     $config['per_page'] = $pLimit;
     $this->pagination->initialize($config);
     $page_string = $this->pagination->create_links();
    }
// seo setting
    $kw = '';
    $this->assign(array('page'=>$page
    ,'cid'=>$cid,'order'=>$sort
    ,'uid'=>$uid,'page_str'=>$page_string
    ,'channel'=>$channel,'lists'=>$lists,'userCate'=>$userCate
    )); 
//echo "<pre>";var_dump($this->viewData);exit;
    $this->view('channel_user');
  }
  public function ip(){
   $ip = $this->input->ip_address();
   echo "<pre>",$ip,"<br />";
   echo $_SERVER['REMOTE_ADDR'],"<br />";
   echo $_SERVER["HTTP_CF_IPCOUNTRY"];
var_dump($_SERVER);exit;
   exit;
  }
}
?>
