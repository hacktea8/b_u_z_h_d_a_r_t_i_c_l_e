<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Error extends Viewbase {
 public function __construct(){
  parent::__construct();
 }
 public function index(){
  $vf = APPPATH.'../404.html';
  if( !file_exists($vf) || (time() - filemtime($vf) > 3600 )){
   $r1 = $this->articleModel->getArticleListByCid($pcid = 0,$cid = 0,'hot',array(2,4));
   $maybeYouLike = $this->articleModel->getArticleListByCid($pcid = 0,$cid = 0,'new',array(2,4));
   $maybeYouLike = array_merge($maybeYouLike, $r1);
   $this->assign(array(
   ,'maybeYouLike'=>$maybeYouLike
   )); 
   //$this->debug($this->viewData);
   $this->view('error_index');
   $output = $this->output->get_output();
  }else{
   $output = file_get_contents($vf);
  }
  die($output);
 }
  
}
?>
