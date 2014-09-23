<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Maindex extends Viewbase {
  public function __construct(){
    parent::__construct();
  }
  public function index()
  {
    $view = BASEPATH.'../';
    if(!is_writeable($view)){
       die($view.' is not write!');
    }
    $view .= 'index.html';
    $lock = $view . '.lock';
    if( !file_exists($view) || (time() - filemtime($view)) > 1*3600 ){
      if(!file_exists($lock)){
        //$indexData = $this->emulemodel->getIndexData();
        $indexData = array();
        $this->assign(array('_a'=>'index','indexData'=>$indexData));
        $this->view('maindex_index');
        $output = $this->output->get_output();
/*
        file_put_contents($lock, '');
        file_put_contents($view, $output);
        @unlink($lock);
        @chmod($view, 0777);
*/
        echo $output;
exit;
        return true;
      }
    }
    exit();
  }
  public function show404($goto = ''){
    $goto = '/';
    $this->assign(array('goto'=>$goto,'seo_title' =>'找不到您需要的页面..现在为您返回首页..'));
    $this->view('index_show404');
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
