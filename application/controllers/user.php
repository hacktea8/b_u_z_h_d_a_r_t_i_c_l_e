<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class User extends Viewbase {
 public function __construct(){
  parent::__construct();
  $goto = $this->input->get_post('goto');
  $goto = $goto? $goto: isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']: '/';
  $this->assign(array(
  'goto'=>$goto

  ));
 }
 public function index(){
  redirect('/?index');
 }
 public function login(){
  if($this->userInfo['uid']){
   header('Location: /?login');
   exit;
  }
  $url = $this->viewData['login_url'].urlencode($this->viewData['goto']);
  header('Location: '.$url);
  exit;
  //$this->view('user_index');
 }
 public function logout(){
  if( !$this->userInfo['uid']){
   header('Location: /?logout');
   exit;
  }
  $this->session->unset_userdata('user_logindata');
  setcookie('hk8_auth','',time()-3600,'/');
  header('Location: /?c=logout');
  exit;
  //$this->view('user_index');
 }
 public function register(){
  $this->login();
  $this->view('user_index');
 }
}
