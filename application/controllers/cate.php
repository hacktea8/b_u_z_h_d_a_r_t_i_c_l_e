<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Cate extends Viewbase {
  public function __construct(){
    parent::__construct();
  }
  public function index($cid,$page = 1){
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
  
}
?>
