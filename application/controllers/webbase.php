<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webbase extends CI_Controller {
  static public $ttl = array('5m'=>300,'15m'=>900,'30m'=>1800,'1h'=>3600,'3h'=>10800,'6h'=>21600,'9h'=>32400,'12h'=>43200,'1d'=>86400,'3d'=>253200,'5d'=>432000,'7d'=>604800);
  protected $mem = '';
  protected $redis = '';
  public $viewData = array();
  protected $userInfo = array('uid'=>0,'uname'=>'','isvip'=>0,'isadmin'=>0);
  public $uid = 0;
  public $adminList = array(1);
  protected $_c = 'index'; 
  protected $_a = 'index'; 
  protected $_isrobot = 0;

  public function __construct(){
    parent::__construct();
    $this->load->library('memcached');
    $this->mem = &$this->memcached;
    $this->load->library('rediscache');
    $this->redis = &$this->rediscache;
    $session_uinfo = $this->session->userdata('user_logindata');
    //var_dump($session_uinfo);exit;
    if(empty($session_uinfo)){
      //解析UID
      $uinfo = getSynuserUid();
      if($uinfo){
        $this->userInfo['uname'] = $uinfo['uname'];
        $uinfo = getSynuserInfo($uinfo['uid']);
        $uinfo['uname'] = $this->userInfo['uname'];
        $uinfo = $this->usermodel->getUserInfo($uinfo);
        if($uinfo){
          $this->userInfo = array_merge($this->userInfo,$uinfo);
          $this->userInfo['isadmin'] = $this->checkIsadmin($return = 1);
          $this->session->set_userdata(array('user_logindata'=>$this->userInfo));
        }
      }
    }else{
      $this->userInfo = $session_uinfo;
    }
    //var_dump($this->userInfo);exit;
    if($this->userInfo['uid']){
     $this->uid = $this->userInfo['uid'];
    }
    $this->_c = $this->segment(1,'maindex');
    $this->_a = $this->segment(2,'index');
    $c = isset($_GET['c'])?$_GET['c']:'';
    if($c){
       $this->_a = 'list' == $c ? 'lists' : 'topic';
    }
    $current_url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $this->checkIsrobot();
    $site_url = trim($this->config->item('base_url'),'/');
    $this->assign(array('domain'=>$this->config->item('domain'),
     'site_url'=>$site_url,
     'admin_email'=>$this->config->item('admin_email'),'errorimg'=>'/public/images/show404.jpg',
       
     'toptips'=>$this->config->item('toptips'),'site_name'=>$this->config->item('web_title')
     ,'version'=>20140109,'login_url'=>$this->config->item('login_url'),'uinfo'=>$this->userInfo
     ,'_c'=>$this->_c,'_a'=>$this->_a,'current_url'=>$current_url
    ));
  }
  
  protected function checkLogin(){
    if(isset($this->userInfo['uid']) &&$this->userInfo['uid']>0){
      return true;
    }else{
      return false;
    }
  }
  protected function checkIsadmin($return = 0){
    if( !($return || $this->checkLogin())){
      redirect($this->config->item('login_url').$this->config->item('base_url'));
    }
    if(in_array($this->userInfo['groupid'],$this->adminList)){
      return true;
    }
    foreach($this->userInfo['groups'] as $gid){
      if(in_array($gid,$this->adminList)){
        return true;
      }
    }
      return false;
  }
  protected function assign($data){
    foreach($data as $key => $val){
      $this->viewData[$key] = $val;
    }
  }
  protected function checkIsrobot(){
    if(false !== stripos($_SERVER['HTTP_USER_AGENT'],'spider')){
      $this->_isrobot = 1;
    }
  }
  protected function segment($i, $default = 'maindex'){
    $q = $this->uri->segment($i, $default);
    $q = str_replace('.','',$q);
    return $q ? $q: $default;
  }
  protected function debug($data){
   echo "<pre>";var_dump($data);exit;
  }
}
