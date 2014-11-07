<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Iframe extends Viewbase {
 public function __construct(){
  parent::__construct();
 }
 public function article_manage($aid = 0){
  $this->assign(compact('aid'));
  $this->view('iframe_article_manage');
 }
 public function index(){

 }
 protected function view($view_file){
  $this->viewData['seo'] = &self::$seo;
  $this->load->view('iframe_header',$this->viewData);
  $this->load->view($view_file);
  $this->load->view('iframe_footer');
 }
}
