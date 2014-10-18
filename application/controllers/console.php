<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Console extends Viewbase {
 public function __construct(){
  parent::__construct();
  if( !$this->uid){
   redirect();
  }
  $this->model('consoleModel');
 }
 public function index(){
  $this->view('my_index');
 }
 public function profile(){
  $this->view('my_profile');
 }
 public function channel(){
  $this->view('my_channel');
 }
 public function adcode(){
  $this->view('my_adcode');
 }
 public function post(){
  $pLimit = 8;
  $list = $this->consoleModel->getMyArticleList($this->uid,array($page, $pLimit));
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
  $this->view('my_earnings');
 }
 public function coopearnings(){
  $this->view('my_coopearnings');
 }
 public function recruit(){
  $this->view('my_recruit');
 }
 public function ranking(){
  $this->view('my_ranking');
 }
 public function payrecords(){
  $this->view('my_payrecords');
 }
}
