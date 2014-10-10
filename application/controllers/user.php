<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'usrbase.php';
class User extends Usrbase {
 public function __construct(){
  parent::__construct();
  if($this->userInfo['uid']){
   redirect();
   exit;
  }
  $url = $this->viewData['login_url'].urlencode($_SERVER['HTTP_REFERER']);
  header('Location: '.$url);
  exit;
  $goto = $this->input->get_post('goto');
  $goto = $goto? $goto: isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']: '/';
  $this->assign(array(
  'goto'=>$goto

  ));
 }
 public function index(){
  
 }
 public function login(){
  if($this->userInfo['uid']){
   redirect();
   exit;
  }
  $this->view('user_index');
 }
 public function logout(){
  if( !$this->userInfo['uid']){
   redirect();
   exit;
  }
  $this->session->unset_userdata('user_logindata');
  setcookie('hk8_auth','',time()-3600,'/');
  $this->view('user_index');
 }
 public function register(){
  $online = $this->input->get_post('ol');
  $online = intval($online);
  if($online){
   $cookie = array(
    'name'   => 'online',
    'value'  => $online,
    'expire' => '86500',
    'domain' => '',
    'path'   => '/',
    'prefix' => '',
    'secure' => 0
   );
   $this->input->set_cookie($cookie);
 }
 $this->view('user_index');
 }
}
