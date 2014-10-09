<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'webbase.php';
class Viewbase extends Webbase {
  public $url404 = '/maindex/show404'; 
  public $seo_title = '首页'; 
  public $seo_keywords = '';
  public $seo_description = '';
  public $imguploadapiurl = 'http://img.hacktea8.com/imgapi/upload/?seq=';
  public $showimgapi = 'http://img.hacktea8.com/showfile.php?key=';

  public function __construct(){
    parent::__construct();
    
    $cate_info = $this->getAllCate();
    $this->assign(array(
    'seo_keywords'=>$this->seo_keywords,'seo_description'=>$this->seo_description
    ,'seo_title'=>$this->seo_title,'cdn_url'=>$this->config->item('cdn_url')
    ,'showimgapi'=>$this->showimgapi,'error_img'=>'/public/images/show404.jpg'
    ,'youMayLike'=>$youMayLike,'cate_info'=>$cate_info
    ,'pcid'=>0,'cid'=>0
    ,'editeUrl' => '/edite/index/emuleTopicAdd'
    ));
    //$this->_get_postion();
    //$this->_get_ads_link();
//var_dump($this->viewData);exit;
  }
  protected function oops($msg){
   $this->assign(array('msg'=>$msg,'refreshtime'=>10));
   $this->view('oops');
   $output = $this->output->get_output();
   die($output);
  }
  protected function getAllCate(){
   $_key = 'cate_info';
   $cate_info = $this->mem->get($_key);
   if( empty($cate_info)){
    $this->load->model('cateModel');
    $this->cateModel->getCateArticleTotals();
    $cate_info = $this->cateModel->getAllCateInfo();
    $this->mem->set($_key,$cate_info,self::$ttl['3d']);
   }
   return $cate_info;
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
  protected function _get_postion($postion = array()){
    $this->assign(array('postion'=>$postion));
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
  public function view($view_file){
    $this->load->view('header',$this->viewData);
    $this->load->view($view_file);
    $this->load->view('footer');
  }
  public function isrobots(){
    $robots = array('baidu','360','google');
    $return = 0;
    foreach($robots as $v){
     if(FALSE !== stripos($_SERVER['HTTP_USER_AGENT'],$v)){
      $return = 1;
      break;
      
     }
    }
    return $return;
  }
}
