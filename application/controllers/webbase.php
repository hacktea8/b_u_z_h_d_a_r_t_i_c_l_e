<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webbase extends CI_Controller {
 static public $ttl = array('5m'=>300,'15m'=>900,'30m'=>1800,'1h'=>3600,'2h'=>7200,'3h'=>10800,'6h'=>21600,'9h'=>32400,'12h'=>43200,'1d'=>86400,'3d'=>253200,'5d'=>432000,'7d'=>604800);
 static public $seo = array('title'=>'發文賺錢','keyword'=>'giga circle,創作,分享,文章,圖片,短片,影片,網路賺錢,發文賺錢'
 ,'description'=>'新聞巴士 創作分享平台提供讀者百萬篇精采文章，有多位駐站長期作者分享創作，馬上加入作者行列並透過文章分享賺取現金收益。'); 
 protected $mem = '';
 protected $redis = '';
 public $viewData = array();
 protected $userInfo = array('uid'=>0,'uname'=>'','isvip'=>0,'isAdmin'=>0);
 public $uid = 0;
 protected $_c = 'index'; 
 protected $_a = 'index'; 
 protected $_isrobot = 0;

 public function __construct(){
  parent::__construct();
  $this->load->library('memcached');
  $this->mem = &$this->memcached;
  $this->load->library('rediscache');
  $this->redis = &$this->rediscache;
  $session_uinfo = $this->session->userdata('user_logindata');
  //var_dump($session_uinfo);exit;
  if(empty($session_uinfo)){
   //解析UID
   $uinfo = getSynuserUid();
   if($uinfo){
    $this->userInfo['uname'] = $uinfo['uname'];
    $uinfo = getSynuserInfo($uinfo['uid']);
    $isAdmin = $uinfo['isAdmin'];
    $uinfo['uname'] = $this->userInfo['uname'];
    $uinfo = $this->usermodel->getUserInfo($uinfo);
    if($uinfo){
     $this->userInfo = array_merge($this->userInfo,$uinfo);
     $this->userInfo['isadmin'] = $isAdmin;
     $this->session->set_userdata(array('user_logindata'=>$this->userInfo));
    }
   }
  }else{
   $this->userInfo = $session_uinfo;
  }
  if($this->userInfo['uid']){
   $this->uid = $this->userInfo['uid'];
  }
//$this->debug($this->userInfo);
  $this->_c = $this->segment(1,'maindex');
  $this->_a = $this->segment(2,'index');
  $c = isset($_GET['c'])?$_GET['c']:'';
  if($c){
   $this->_a = 'list' == $c ? 'lists' : 'topic';
  }
  $current_url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $this->checkIsrobot();
  $site_url = $this->config->item('base_url');
  $GLOBALS['site_url'] = $site_url;
  $cate_info = $this->getAllCate();
  $this->assign(array('domain'=>$this->config->item('domain'),
  'site_url'=>$site_url,
  'admin_email'=>$this->config->item('admin_email'),'errorimg'=>'/public/images/show404.jpg'
  ,'cate_info'=>$cate_info
       
  ,'toptips'=>$this->config->item('toptips'),'site_name'=>$this->config->item('web_title')
  ,'version'=>10120140109,'login_url'=>$this->config->item('login_url'),'uinfo'=>$this->userInfo
  ,'_c'=>$this->_c,'_a'=>$this->_a,'current_url'=>$current_url
  ));
  $GLOBALS['cinfo'] = &$this->viewData['cate_info'];
 }
 protected function model($m){
  if( !is_object($this->$m)){
   $this->load->model($m);
  }
  return $this->$m;
 }
 protected function getAllCate(){
  $_key = 'cate_info';
  $cate_info = $this->mem->get($_key);
  if( empty($cate_info)){
   $this->load->model('cateModel');
   $this->cateModel->getCateArticleTotals();
   $cate_info = $this->cateModel->getAllCateInfo();
   $this->mem->set($_key,$cate_info,self::$ttl['5m']);
  }
  return $cate_info;
 }
 protected function checkLogin(){
  if(isset($this->userInfo['uid']) &&$this->userInfo['uid']>0){
   return true;
  }else{
   return false;
  }
 }
 protected function checkIsadmin($return = 0){
  if( !($return || $this->checkLogin())){
   redirect($this->config->item('login_url').$this->config->item('base_url'));
  }
  if(in_array($this->userInfo['groupid'],$this->adminList)){
   return true;
  }
  foreach($this->userInfo['groups'] as $gid){
   if(in_array($gid,$this->adminList)){
    return true;
   }
  }
  return false;
 }
 protected function assign($data){
  foreach($data as $key => $val){
   $this->viewData[$key] = $val;
  }
 }
 protected function checkIsrobot(){
  if(false !== stripos($_SERVER['HTTP_USER_AGENT'],'spider')){
   $this->_isrobot = 1;
  }
 }
 protected function segment($i, $default = 'maindex'){
  $q = $this->uri->segment($i, $default);
  $q = str_replace('.','',$q);
  return $q ? $q: $default;
 }
 protected function debug($data){
  echo "<pre>";var_dump($data);exit;
 }
 protected function str_encode($code,$operation = 'DECODE'){
  $key = '1MjGbsweYVz678D4S7L0P8BvXryhd641lCdKp';
  $r = uc_authcode($code, $operation,$key);
  return $r;
 }
 protected function oops($msg){
  $this->assign(array('msg'=>$msg,'refreshtime'=>10));
  $this->view('oops');
  $output = $this->output->get_output();
  die($output);
 }
 protected function view($view_file){
  $this->viewData['seo'] = &self::$seo;
  $this->load->view('header',$this->viewData);
  $this->load->view($view_file);
  $this->load->view('footer');
 }
 protected function cookie($name,$value = '', $ttl = 3600){
  if($value){
   $cookie = array(
   'name'   => $name,
   'value'  => $value,
   'expire' => $ttl,
   'domain' => '',
   'path'   => '/',
   'prefix' => '',
   'secure' => false
   );
   $this->input->set_cookie($cookie);
   return 1;
  }
  $cookie = $this->input->cookie($name);
  return $cookie;
 }
 protected function getUploadTtkToken(){
  $k = 'site_upload_ttk_token';
  $token = $this->mem->get($k);
  if( !$token){
   $this->load->library('tietuku');
   $token = $this->tietuku->uploadFile($album = 0,$filename = 0);
   $this->mem->get($k, $token, 3600);
  }
  return $token;
 }
}
