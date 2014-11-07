<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Index extends Viewbase {
  public function __construct(){
    parent::__construct();
  }
  public function index(){
   if($this->uid){
    $output = $this->getIndexData();
   }else{
    $view = BASEPATH.'../';
    if(!is_writeable($view)){
     die($view.' is not write!');
    }
    $view .= 'index_index.html';
    $lock = $view . '.lock';
    if( !file_exists($view) || (time() - filemtime($view)) > 1*3600 ){
     if(!file_exists($lock)){
      $output = $this->getIndexData();
      file_put_contents($lock, '');
      file_put_contents($view, $output);
      @unlink($lock);
      @chmod($view, 0777);
     }
    }
    $output = file_get_contents($view);
   }
   die($output);
  }
  protected function getIndexData(){
   $this->load->model('articleModel');
   $indexData = $this->articleModel->getIndexData();
   $this->assign(array('_a'=>'index','indexData'=>$indexData));
   $this->view('index_index');
   $output = $this->output->get_output();
   return $output;
  }
  public function isUserInfo(){
    $data = array('status'=>0);
    if( isset($this->userInfo['uid']) && $this->userInfo['uid']){
       $data['status'] = 1;
    }
    die(json_encode($data));
  }
  public function clearMemcache($key = 0){
   $memKey = array('cate_info','writer_groups','site_cates','hot_tags','user_groups');
   if($key){
    $memKey = isset($memKey[$key])?array($memKey[$key]):array();
   }
   if( !$this->userInfo['isAdmin']){
     //return 0;
   }
   foreach($memKey as $k){
    $this->mem->set($k, '', 100);
   }
   echo 'OK';exit;
  }
}
?>
