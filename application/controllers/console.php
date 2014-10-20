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
  $this->assign(array(
  'checkSetting'=>$checkSetting,'userProfit'=>$userProfit
  ,'low_money'=>self::$low_money
  ));
 }
 public function index(){
  $list = $this->consoleModel->getArticleProfitList($this->uid,array($p,10));
  $this->assign(array('list'=>$list));
  $this->view('my_index');
 }
 public function profile(){
  $this->view('my_profile');
 }
 public function cropPic(){
  $x1 = $this->input->post('x1');
  die("$x1");
 }
 public function upAvatar(){
  $config['upload_path'] = APPPATH.'../public/uploads/images/';
  $config['allowed_types'] = 'gif|jpg|png|jpeg';
  $config['max_size'] = '1000';
  $config['max_width']  = '2048';
  $config['max_height']  = '2048';
  $this->load->library('upload', $config);
  if ( ! $this->upload->do_upload('avatar')){
   $error = array('error' => $this->upload->display_errors());
   die(json_encode(array('status'=>0,'msg'=>$error)));
  }
/*
Array
(
    [file_name]    => mypic.jpg
    [file_type]    => image/jpeg
    [file_path]    => /path/to/your/upload/
    [full_path]    => /path/to/your/upload/jpg.jpg
    [raw_name]     => mypic
    [orig_name]    => mypic.jpg
    [client_name]    => mypic.jpg
    [file_ext]     => .jpg
    [file_size]    => 22.2
    [is_image]     => 1
    [image_width]  => 800
    [image_height] => 600
    [image_type]   => jpeg
    [image_size_str] => width="800" height="200"
)
*/
  $upload_data = $this->upload->data();
  @chmod($upload_data['full_path'], 0777);
  for($i = 0;$i<3;$i++){
   $return = ($upload_data['full_path']);
   if($return){
    break;
   }
  }
  @unlink($upload_data['full_path']);
  die(json_encode(array('status'=>0,'msg'=>'111')));
 }
 public function channel(){
  $post = $this->input->post('Channel');
  if($post){
   $post['uid'] = $this->uid;
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
  
  $this->view('my_postcreate');
 }
 public function postcreate(){
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
