<?php

class Post{
 public $uinfo = array('UserForm[rememberMe]'=>1,'UserForm[email]'=>'1187247901@qq.com','UserForm[password]'=>'molong1992');
 public $channel = array();
 public $curl = '';
 public $host = 'http://www.buzzhand.com';
 
 public function __construct(){
  global $curl;
  $this->curl = $curl;
 }
 public function login(){
  $this->curl->config['url'] = $this->host.'/user/login.html';
  $this->curl->postVal = $this->uinfo;
  $html = $this->curl->getHtml();
  if(stripos($html, 'href="/user/logout.html"')){
   echo "\n+++++Login Success!++++\n";
  }else{
   echo "\n+++++ Login Failed! +++++\n";
  }
  return true;
  file_put_contents('debug_login.html', $html);
 }
 public function pcreate($data){
  $this->curl->config['url'] = $this->host.'/user/login.html';
  $html = $this->curl->getHtml();
  if( !stripos($html, 'href="/user/logout.html"')){
   $this->login();
  }
  $this->curl->config['url'] = $this->host.'/user/login.html';
  $postData = array(
  'Post[is_original]'=>1
  ,'Post[original_url]'=>''
  ,'Post[no_infringement]'=>'0'
  ,'Post[title]'=>$data['title']
  ,'Post[summary]'=>$data['summary']
  ,'pubImg'=>''
  ,'uploadImg'=>''
  ,'Post[content]'=>$data['content']
  ,'Post[cid2]'=>$data['cid']
  ,'Post[tags]'=>$data['tags']
  ,'Post[t_ratio]'=>0
  ,'Post[is_adult]'=>''
  ,'ct'=>''
  );
  $this->curl->postVal = $data;
  $this->curl->config['auto'] = 0;
  $this->curl->config['header'] = 1;
  
  $html = $this->curl->getHtml();
  $this->curl->config['auto'] = 1;
  $this->curl->config['header'] = 0;
  if(stripos($html, 'Location:')){
    echo "++++ Post Success! +++\n";
  }else{
    echo "++++ Post Error! +++\n";
    file_put_contents('debug_postError.html', $html);
  }
  return 1;
 }
 public function moreHits($url = '', $ip){
  if(is_numeric($url)){
   $url = '/post_'.$url.'.html';
  }
  if(!preg_match('#https?://#Uis', $url)){
   $url = $this->host.$url;
  }
  $this->curl->http_header += array('X-FORWARDED-FOR:'.$ip, 'CLIENT-IP:'.$ip);
  $this->curl->config['url'] = $url;
  $this->curl->getHtml();
 }
 public function getIP($num = 10){
  $return = array();
  $ipTpl = '101.69.%d.%d';
  for($i = 1;$i<=$num;$i++){
   for($j = 1;$j<=$num;$j++){
    $ip = sprintf($ipTpl, $i,$j);
    $return[] = $ip;
   }
  }
  return $return;
 }
}
