<?php

$APPPATH = dirname(__FILE__).'/';
include_once($APPPATH.'../db.class.php');
include_once($APPPATH.'config.php');

$pattern = '/buzhd/grab.php';
require_once $APPPATH.'singleProcess.php';

$db=new DB_MYSQL();

$data = array('url' => 'http://img.hacktea8.com/buzhdapi/uploadurl?seq=', 'imgurl'=>'');
$file_data = array('url' => 'http://img.hacktea8.com/buzhdapi/uploadurl?seq='
, 'imgurl'=>'','filename'=>'');

$task = 5;
while($task){
 $list = getnocoverlist();
 if(empty($list)){
  echo "grab list empty!\n";
  sleep(600);
  break;
 }
 foreach($list as $val){
  if('http://' != substr($val['thum'],0,7)){
   $val['thum'] = $_root.$val['thum'];
  }
  echo "== $val[thum] ==\n";
  //exit;
  $data['imgurl'] = $val['thum'];
  $cover = getHtml($data);
  //去除字符串前3个字节
  $cover = substr($cover,3);
  echo $val['id'],' , ',$cover,"\n";
  #exit;
  //echo strlen($cover);exit;
  $status = preg_replace('#[^\d]+#','',$cover);
  //echo $status;exit;
  if( in_array($status,array(44,404))){
   die('Token 失效!');
  }
  if(0 == $status){
   echo "$val[id] cover is down!\n";
   seterrcoverByid(4,$val['id']);
   sleep(1);
   continue;
  }
  //upload intro images
  $info = getvideobyid($val['id']);
  preg_match_all('#src\s*=\s*[\'|"](.+)[\'|"]#Uis', $info['intro'], $match);
  $imgs = $match[1];
  foreach($imgs as $v){
   if('IMG_API_URL=' == substr($v,0,12)){
    continue;
   }
   $data['imgurl'] = $v;
   $covers = getHtml($data);
   //去除字符串前3个字节
   $covers = substr($covers,3);
   $status = preg_replace('#[^\d]+#','',$covers);
   //echo $status;exit;
   if( in_array($status,array(44,404))){
    die('Token 失效!');
   }
   if(0 == $status){
    echo "$val[id] cover is down!\n";
    seterrcoverByid(4,$val['id']);
    break;
   }
   if(false == stripos($covers,'.')){
    die("\nid: $val[id] down contents images error!\n");
   }
   //echo $covers,"\n";
   $img_str = 'IMG_API_URL='.$covers;
   $info['intro'] = str_replace($v,$img_str,$info['intro']);
  }// end foreach imgs

  $set_data = array('intro'=>$info['intro']);
  //var_dump($set_data);exit;
  setcontentdata($set_data,$val['id']);
  //
  setcoverByid($cover,$val['id']);
  //echo $val['id'],"\n",exit;

  sleep(15);
 }
 //var_dump($list);exit;
 $task --;
 //2min
 sleep(18);
}
file_put_contents('imgres.txt',$val['id']);


function getnocoverlist($limit = 20){
 global $db;
 $sql = sprintf('SELECT `id`,`sitetype`,`thum`,`ourl` FROM %s WHERE `iscover`=0 LIMIT %d',$db->getTable('article_title'),$limit);
 $res = $db->result_array($sql);
 return $res;
}
function getcontenttable(){
 return sprintf("article_content");
}
function getvideobyid($id){
 global $db;
 $table = getcontenttable($id);
 $sql = sprintf('SELECT `intro` FROM %s WHERE `id`=%d LIMIT 1',$db->getTable($table),$id);
 $row = $db->row_array($sql);
 return $row;
}
function setcontentdata($data,$id){
 global $db;
 $table = getcontenttable($id);
 $sql = $db->update_string($db->getTable($table),$data,array('id'=>$id));
 $db->query($sql);
 return true;
}
function seterrcoverByid($cover = '',$id = 0){
  if(!$id){
     return false;
  }
  global $db;
  $sql = sprintf('UPDATE %s SET `iscover`=%d WHERE `id`=%d LIMIT 1',$db->getTable('article_title')
  ,$cover,$id);
  $db->query($sql);
}
function setcoverByid($cover = '',$id = 0){
  $pos = stripos($cover,'.');
  if(!$id || !$pos){
     return false;
  }
  global $db;
  $sql = sprintf('UPDATE %s SET `cover`=\'%s\',flag=1,`iscover`=1 WHERE `id`=%d LIMIT 1',$db->getTable('article_title'),mysql_real_escape_string($cover),$id);
  $db->query($sql);
}
function getHtml(&$data){
  $curl = curl_init();
  $url = $data['url'];
  unset($data['url']);
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.3 (Windows; U; Windows NT 5.3; zh-TW; rv:1.9.3.25) Gecko/20110419 Firefox/3.7.12');
  // curl_setopt($curl, CURLOPT_PROXY ,"http://189.89.170.182:8080");
  curl_setopt($curl, CURLOPT_POST, count($data));
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
  curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
  curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
  curl_setopt($curl, CURLOPT_HEADER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $tmpInfo = curl_exec($curl);
  if(curl_errno($curl)){
    echo 'error',curl_error($curl),"\r\n";
    return false;
  }
  curl_close($curl);
  $data['url'] = $url;
  return $tmpInfo;
}
function droptags($html){
global $_root;
$str_replace = array(
array('from'=>'</a>','to'=>'')
,array('from'=>'<img </td>','to'=>'<img ')
,array('from'=>substr($_root,0,-1),'to'=>'')
);
$preg_replace = array(
array('from'=>'#<a[^>]+>#Uis','to'=>'')
);
foreach($str_replace as $v){
  $html = str_replace($v['from'],$v['to'],$html);
}
foreach($preg_replace as $v){
  $html = preg_replace($v['from'],$v['to'],$html);
}
return $html;
}
