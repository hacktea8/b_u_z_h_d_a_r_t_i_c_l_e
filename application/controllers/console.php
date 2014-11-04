<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Console extends Viewbase {
 static public $low_money = 5;
 
 public function __construct(){
  parent::__construct();
  if( !$this->uid){
   redirect();
  }
  $this->model('consoleModel');
  $checkSetting = $this->checkUserSetTips();
  $userProfit = $this->getUserProfitReport();
  $ttk_token = $this->getUploadTtkToken();
  $this->assign(array(
  'checkSetting'=>$checkSetting,'userProfit'=>$userProfit
  ,'low_money'=>self::$low_money,'ttk_token'=>$ttk_token
  ));
 }
 public function index(){
  $list = $this->consoleModel->getArticleProfitList($this->uid,array($p,10));
  $this->assign(array('list'=>$list));
  $this->view('my_index');
 }
 public function profile(){
  $post = $this->input->post('User');
  if($post){
   $this->consoleModel->setUserChannelInfo($post);
   redirect('/console/profile');
  }
  $channel = $this->consoleModel->getUserChannelInfo($this->uid);
  $this->assign(array('channel'=>$channel));
  $this->view('my_profile');
 }
 public function channel(){
  $post = $this->input->post('Channel');
  if($post){
   $post['uid'] = $this->uid;
   if($post['pic']){
    $pinfo = parse_cover($post['pic']);
    unset($post['pic']);
    if($pinfo){
     $post['host'] = $pinfo['host'];
     $post['pic'] = $pinfo['key'];
     $post['ext'] = $pinfo['ext'];
    }
   }else{
    unset($post['host']);
    unset($post['pic']);
    unset($post['ext']);
   }
   if($post['urlkey']){
    $len = strlen($post['urlkey']);
    if( $len<3 || $len>36){
     $post['urlkey'] = '';
    }else{
     $check = preg_replace('#[\dA-Za-z_]+#is','',$post['urlkey']);
     if($check){
      $post['urlkey'] = '';
     }else{
      $check = preg_replace('#[\d]+#is','',$post['urlkey']);
      if( !$check){
       $post['urlkey'] = '';
      }
     }
    }
    
   }
   $this->consoleModel->setUserChannelInfo($post);
   if($this->input->is_ajax_request()){
    die('1');
   }
   redirect('/console/channel');
  }
  $rinfo = $this->consoleModel->getUserChannelInfo($this->uid);
  $this->assign(array('channel'=>$rinfo));
  $this->view('my_channel');
 }
 public function adcode(){
  $this->view('my_adcode');
 }
 public function post(){
  $pLimit = 8;
  $list = $this->consoleModel->getArticleProfitList($this->uid,array($page, $pLimit));
  $this->assign(array('list'=>$list));
  $this->view('my_post');
 }
 public function adult(){
  $this->view('my_adult');
 }
 public function postdelete($aid = 0){
  
  $this->view('my_postcreate');
 }
 public function postedit($aid = 0){
  $this->postcreate($aid);
  //$this->view('my_postcreate');
 }
 public function postcreate($aid = 0){
  $post = $this->input->post('Post');
  if($post){
   $post['uid'] = $this->uid;
   $pinfo = '';
   if($post['pic']){
    $pinfo = parse_cover($post['pic']);
    unset($post['pic']);
   }
   if($pinfo){
    $post['host'] = $pinfo['host'];
    $post['cover'] = $pinfo['key'];
    $post['ext'] = $pinfo['ext'];
   }else{
    unset($post['host']);
    unset($post['cover']);
    unset($post['ext']);
   }
   $cate = explode('-',$post['cid2']);
   if(isset($cate[1])){
    $post['cid'] = $cate[1];
    $post['pcid'] = $cate[0];
   }
//$this->debug($post);
   $aid = $this->consoleModel->setArticleInfoByData($post);
   $aurl = $this->consoleModel->get_url('article', $aid);
   $rinfo = array('flag'=>1,'url'=>$aurl);
   if($this->input->is_ajax_request()){
    die(json_encode($rinfo));
   }
//echo $aid;exit;
//$this->debug($aid);
   redirect('/console/post');
  }
  $rinfo = array();
  if($aid){
   $this->consoleModel->getArticleInfoById($aid,$this->uid);
  }
  $this->assign(array('rinfo'=>$rinfo));
  $this->view('my_postcreate');
 }
 public function earnings(){
  $list = $this->consoleModel->getUserDailyProfitList($this->uid,array(1, 7));
  $this->assign(array('list'=>$list));
  $this->view('my_earnings');
 }
 public function coopearnings(){
  $list = $this->consoleModel->getUserDailyCoopProfitList($this->uid,array(1, 30));
  $this->assign(array('list'=>$list));
  $this->view('my_coopearnings');
 }
 public function recruit(){
  $rinfo = $this->consoleModel->getUserOnlineAndOffline($this->uid);
  $list = $this->consoleModel->getUserDailyProfitList($this->uid,array(1, 30));
  $this->assign(array('list'=>$list,'rinfo'=>$rinfo));
  $this->view('my_recruit');
 }
 public function ranking(){
  $this->view('my_ranking');
 }
 public function payrecords(){
  $rinfo = $this->consoleModel->getUserMoneyLog($this->uid);
  $list = $this->consoleModel->getUserRemitLogList($this->uid,array(1, 7));
  $this->assign(array('list'=>$list,'rinfo'=>$rinfo));
  $this->view('my_payrecords');
 }
 protected function getUserProfitReport(){
  $k = 'site_urser_profit_report_uid'.$this->uid;
  $checkSetting = $this->mem->get($k);
  if(empty($checkSetting)){
   $checkSetting = $this->consoleModel->getUserProfitReport($this->uid);
   $this->mem->set($k,$checkSetting,self::$ttl['1h']);
  }
  return $checkSetting;
 }
 protected function checkUserSetTips(){
  $k = 'site_urser_setnote_uid'.$this->uid;
  $checkSetting = $this->mem->get($k);
  if(empty($checkSetting)){
   $checkSetting = $this->consoleModel->checkUserIsSetting($this->uid);
   $this->mem->set($k,$checkSetting,self::$ttl['1h']);
  }
  return $checkSetting;
 }
}
