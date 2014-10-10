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
  public function clicklog(){
    $key = $this->input->get_post('key');
    $str = $this->str_encode($key,'DECODE');
    list($t,$uk,$gid,$wid,$coop,$aid,$uid,$pcid,$cid) = explode('|',$str);
    $aid = intval($aid);$uid = intval($uid);
    $cid = intval($cid);
    if( !($aid || $uid || $cid )){
     return 0;
    }
    $ip = $this->input->ip_address();
    // 检查当前IP是否已使用
    $check_key = sprintf('post_uv_key_%d_%s',$aid,$ip);
    if($this->redis->exists($check_key)){
      return 0;
    }
    //redis file_storge
    $this->redis->set($check_key,1,$this->ttl['1d']);
    $log_key = sprintf('post_click_uv:%d:%d:%d:%d:%d:%d:%d:%d',$t,$uk,$gid,$wid,$coop,$aid,$uid,$pcid,$cid,date('Ym'),date('Ymd'));
    $this->redis->incr($log_key);
  } 
  public function clearcache($type = 'mem',$key = 'all'){
    if($type == 'mem'){
      $key_map = array('top_youMayLike','channel','');
    }
    echo '1';
  }
  public function topList_data(){
    $ttl = 3600;
    $file = APPPATH.'../public/js/toplist_data.js';
    if( file_exists($file) && (time() - filemtime($file)) > $ttl{
      $cate_list = $this->mem->get('cate_info');
      $return = array();
      if(empty($return)){
       return 1;
      }
      foreach($cate_list as $k => $pc){
       if($pc['pcid']){
        continue;
       }
       $tmp = array();
       $subList = $this->emulemodel->getArticleListByCid($pcid = $k,$cid='',$order=0,$page=1,$limit=4);
       $tmp[] = array('title' => '全部','url' => $pc['url'],'subList'=>$subList);
       foreach($cate_list as $v){
        if($k != $v['pcid']){
         continue;
        }
        $subList = $this->emulemodel->getArticleListByCid($cid=$v['cid'],$order=0,$page=1,$limit=4);
        $tmp[] = array('title' => $v['title'],'url' => $v['url'],'subList'=>$subList);
       }
       $return[] = array('list'=>$tmp,'more'=>$pc['url']);
      }
      $json = 'var jsonList = '.json_encode($return);
      file_put_contents($file, $json);
    }
    die('OK');
  }
  public function crontab(){
    $lock = BASEPATH.'/../crontab_loc.txt';
    if(file_exists($lock) && time()-filemtime($lock)<6*3600){
       return false;
    }
    $this->emulemodel->autoSetVideoOnline(5);
    $this->emulemodel->setCateVideoTotal();
    //clear channel cache
    $this->mem->set('channel','',$this->expirettl['3h']);
    file_put_contents($lock,'');
    chmod($lock,0777);
    echo 1;exit;
  }
}
