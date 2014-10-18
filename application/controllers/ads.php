<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Ads extends Viewbase {
 static public $size = array('728x90'=>2,'336x280'=>4,'300x600'=>7,'320x50'=>1,'300x250'=>3,'200x250'=>3,'200x600'=>7);
 public function __construct(){
  parent::__construct();
  $this->model('adsModel');
 }
 public function index(){
  $uid = $this->input->get('u');
  $uid = intval($uid);
  $size = $this->input->get('size');
  $list = array();
  if($uid && isset(self::$size[$size])){
   // 需要优化

   $cinfo = &$this->viewData['cates'];
   $key = 'site_user_ads_uid_'.$uid;
   $list = $this->mem->get($key);
   if( empty($list) ){
    $list = $this->adsModel->getUserAds($uid);
    $ttl = $this->_mem->ttls('5m');
    $this->_mem->set($key, $list, $ttl);
   }
   $num = self::$size[$size];
   $list = self::rand_array($list, $num);
  }
  $this->assign(array('list' => $list));
  $this->smarty->render('adcode/ad_'.$size.'.html',$this->viewData);
 }
 public function show(){
  $uid = $this->input->get('u');
  $uid = intval($uid);
  $size = $this->input->get('size');
  $list = array();
  if($uid && isset(self::$size[$size])){
   list($width,$height) = explode('x', $size);
   $url = base_url();
   $html = sprintf('document.writeln(\'<iframe src="%s/ads/index.html?u=%d&size=%s" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" frameborder="0" height="%d" width="%d"></iframe>\');', $url, $uid, $size, $height, $width);
   header('Content-type: text/javascript');
   echo $html;exit;
  }
 }
 static protected function rand_array(&$data, $num){
  $return = array();
  if(empty($data)){
   return $return;
  }
  $len = count($data);
  if($len <= $num){
   return $data;
  }
  $key = array_rand($data, $num);
  $key = !is_array($key)?array($key):$key;
  foreach($key as $k){
   $return[] = $data[$k];
  }
  return $return;
 }
}
