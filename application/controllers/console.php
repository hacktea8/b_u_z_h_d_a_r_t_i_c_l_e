<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Console extends Viewbase {
 static public $low_money = 5;
 
 public function __construct(){
  parent::__construct();
  if( !$this->uid){
   redirect();
  }
  $this->model('consoleModel');
  $checkSetting = $this->checkUserSetTips();
  $userProfit = $this->getUserProfitReport();
  $this->assign(array(
  'checkSetting'=>$checkSetting,'userProfit'=>$userProfit
  ,'low_money'=>self::$low_money
  ));
 }
 public function index(){
  $list = $this->consoleModel->getArticleProfitList($this->uid,array($p,10));
  $this->assign(array('list'=>$list));
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
  $list = $this->consoleModel->getArticleProfitList($this->uid,array($page, $pLimit));
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
  $list = $this->consoleModel->getUserDailyProfitList($this->uid,array(1, 7));
  $this->assign(array('list'=>$list));
  $this->view('my_earnings');
 }
 public function coopearnings(){
  $list = $this->consoleModel->getUserDailyCoopProfitList($this->uid,array(1, 30));
  $this->assign(array('list'=>$list));
  $this->view('my_coopearnings');
 }
 public function recruit(){
  $rinfo = $this->consoleModel->getUserOnlineAndOffline($this->uid);
  $list = $this->consoleModel->getUserDailyProfitList($this->uid,array(1, 30));
  $this->assign(array('list'=>$list,'rinfo'=>$rinfo));
  $this->view('my_recruit');
 }
 public function ranking(){
  $this->view('my_ranking');
 }
 public function payrecords(){
  $rinfo = $this->consoleModel->getUserMoneyLog($this->uid);
  $list = $this->consoleModel->getUserRemitLogList($this->uid,array(1, 7));
  $this->assign(array('list'=>$list,'rinfo'=>$rinfo));
  $this->view('my_payrecords');
 }
 protected function getUserProfitReport(){
  $k = 'site_urser_profit_report_uid'.$this->uid;
  $checkSetting = $this->mem->get($k);
  if(empty($checkSetting)){
   $checkSetting = $this->consoleModel->getUserProfitReport($this->uid);
   $this->mem->set($k,$checkSetting,self::$ttl['1h']);
  }
  return $checkSetting;
 }
 protected function checkUserSetTips(){
  $k = 'site_urser_setnote_uid'.$this->uid;
  $checkSetting = $this->mem->get($k);
  if(empty($checkSetting)){
   $checkSetting = $this->consoleModel->checkUserIsSetting($this->uid);
   $this->mem->set($k,$checkSetting,self::$ttl['1h']);
  }
  return $checkSetting;
 }
}
