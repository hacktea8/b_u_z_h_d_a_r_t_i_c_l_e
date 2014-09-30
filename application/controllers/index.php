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
    $view .= 'index.html';
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
   $indexData = array();
   $this->assign(array('_a'=>'index','indexData'=>$indexData));
   $this->view('index_index');
   $output = $this->output->get_output();
   return $output;
  }
  public function login(){
//var_dump($_SERVER);exit;
    $url = $this->viewData['login_url'].urlencode($_SERVER['HTTP_REFERER']);
//echo $url;exit;
    header('Location: '.$url);
    exit;
  }
  public function isUserInfo(){
    $data = array('status'=>0);
    if( isset($this->userInfo['uid']) && $this->userInfo['uid']){
       $data['status'] = 1;
    }
    die(json_encode($data));
  }
  
}
?>
