<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Rss extends Viewbase {
  public function __construct(){
    parent::__construct();
  }
  public function index($uid = 0){
   $uid = intval($uid);
   $this->load->model('rssModel');
   $list = $this->rssModel->getRssArticleList($uid,$limit = 10);
   $this->assign(array('list'=>$list));
   header('Content-Type:application/xml');
   $this->load->view('rss',$this->viewData);
  }
}
