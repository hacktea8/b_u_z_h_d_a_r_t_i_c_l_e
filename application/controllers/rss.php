<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Rss extends Viewbase {
  public function __construct(){
    parent::__construct();
    header('Content-Type:application/xml');
  }
  public function index($uid = 0){
   $uid = intval($uid);
   $this->load->model('rssModel');
   $where = $uid?array('uid='=>$uid):array();
   $list = $this->rssModel->getRssArticleList($where,$limit = 10);
   $this->assign(array('list'=>$list));
   $this->load->view('rss',$this->viewData);
  }
  public function cate($cid = 0){
   $cid = intval($cid);
   $this->load->model('rssModel');
   $where = $cid?array('cid='=>$cid):array();
   $list = $this->rssModel->getRssArticleList($where,$limit = 10);
   $this->assign(array('list'=>$list));
   $this->load->view('rss',$this->viewData);
  }
}
