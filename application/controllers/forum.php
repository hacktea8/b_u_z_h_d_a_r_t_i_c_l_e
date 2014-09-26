<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Forum extends Viewbase {
  public function __construct(){
    parent::__construct();
  }
  public function index($cid,$page = 1){
    $this->assign(array('seo_title'=>$title,'seo_keywords'=>$keywords
    ,'infolist'=>$data,'pageTotal'=>$pageTotal
    ,'list_url_tpl'=>$config['base_url']
    ,'page_string'=>$page_string,'cid'=>$cid));
#var_dump($this->viewData);exit;
    $this->view('index_lists');
  }
  
}
?>
