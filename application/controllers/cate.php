<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Cate extends Viewbase {
  public function __construct(){
    parent::__construct();
  }
  public function index($cid = 0,$page = 1){
    $page = intval($page);
    $cid = intval($cid);
    $cid = $cid < 1 ?1:$cid;
    $page = $page > 0 ? $page: 1;
    $limit = 20;
    $channel = &$this->viewData['cate_info'];
    $atotal = isset($channel[$cid])?$channel[$cid]['total']:0;
    $subcid = $cid;
    $pcid = $channel[$cid]['pcid'];
    $_pcid = 0;
    if( !$channel[$cid]['pcid']){
     $_pcid = $pcid = $cid;
     $subcid = 0;
    }
    $pageTotal = ceil($atotal/$limit);
    $data = array();
    if($page <= $pageTotal){
     $this->load->model('articleModel');
     $data['new'] = $this->articleModel->getArticleListByCid($_pcid ,$subcid, $sort = 'new', array($page,$limit));
     $data['hot'] = $this->articleModel->getArticleListByCid($_pcid ,$subcid, $sort = 'hot', array($page,8));
     $wonderfull  = $this->articleModel->getArticleListByCid($_pcid ,$subcid, $sort = 'wonderful', array($page,$limit));
    }
    $this->load->library('pagination');
    $config['base_url'] = sprintf('/cate/index/%d/',$cid);
    $config['total_rows'] = $atotal;
    $config['cur_page'] = $page;
    $config['per_page'] = $limit;
    $this->pagination->initialize($config); 
    $page_string = $this->pagination->create_links();
// seo setting
    $title = $channel[$cid]['title']."第{$page}页";
    $kw = '';
    $keywords = $kw.$this->seo_keywords;
    $this->assign(array('seo_title'=>$title,'seo_keywords'=>$keywords
    ,'lists'=>$data,'pageTotal'=>$pageTotal,'wonderful'=>$wonderfull
    ,'list_url_tpl'=>$config['base_url'],'pcid'=>$pcid,'subcid'=>$subcid
    ,'page_string'=>$page_string,'cid'=>$cid,'page'=>$page
    ));
//var_dump($this->viewData);exit;
    $this->view('cate_index');
  }
  
}
?>
