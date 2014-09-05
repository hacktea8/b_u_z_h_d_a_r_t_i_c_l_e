<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'webbase.php';
class Ajax extends Webbase {


  public function __construct(){
    parent::__construct();
    //判断请求是否Ajax
    if( !$this->input->is_ajax_request()){
       die(0);
    }
    //判断referer是否合法
    $allow_referer = $this->config->item('allow_referer');
    $domain_arr = explode('|', $allow_referer);
    $referer = false;
    foreach($domain_arr as $v){
      if(false !== strpos($_SERVER['HTTP_REFERER'], $v)){
        $referer = true;
        break;
      }
    }
    if(!$referer){
      die(0);
    }
    $this->load->model('emulemodel');
  }
  public function clicklog($aid,$uid,$cid){
    $ip = $this->input->ip_address();
    // 检查当前IP是否已使用
    $check_key = sprintf('post_uv_key_%d_%s',$aid,$ip);
    if($this->redis->exists($check_key)){
      return 0;
    }
    //redis file_storge
    $this->redis->set($check_key,1,$this->ttl['1d']);
    $log_key = sprintf('post_uv:1:%d:%d:%d:%d:%d',$aid,$uid,$cid,date('Ym'),date('Ymd'));
    $this->redis->incr($log_key);
  } 
  public function clearcache($type = 'mem',$key = 'all'){
    if($type == 'mem'){
      $key_map = array('top_youMayLike','channel','');
    }
    echo '1';
  }
}
