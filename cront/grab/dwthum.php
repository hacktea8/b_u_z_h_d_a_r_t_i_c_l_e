<?php

$APPPATH =  dirname(__FILE__).'/www.life.com.tw/';

include_once $APPPATH.'../function.php';
require_once $APPPATH.'../db.class.php';
require_once $APPPATH.'../model.php';
require_once ROOTPATH.'../../application/libraries/Tietuku.php';
require_once ROOTPATH.'../../application/libraries/gickimg.php';


$ttk = new Tietuku();
$gick = new Gickimg();
$m = new Model();
$water_img = ROOTPATH.'../../public/images/watermark/news8s_white_water.png';
$white_list = array('.hacktea8.com','.emubt.com','.news8s.com','.tietuku.com');

$list = $m->getArticleNoCoverList();
//var_dump($list);exit;
foreach($list as $row){
 $imgArr = array($row['thum']);
 $pCount = 0;
 foreach($imgArr as $v){
  $isFlag = 0;
  foreach($white_list as $wl){
   if(false !== stripos($v, $wl)){
    $isFlag = 1;
    break;
   }
  }
  if($isFlag){
   continue;
  }
  $vf = ROOTPATH.'cache/ttk_'.basename($v);
  $cmd = sprintf('wget %s -O %s',$v,$vf);
  exec($cmd);
  if( !file_exists($vf) || filesize($vf) < 1000){
   continue;
  }
  $ovf = $vf.'.jpg';
  $gick->convert($vf, $ovf);
  if( !file_exists($ovf)){
   continue;
  }
  $gick->waterMark($ovf,$water_img);
  for($i=0;$i<3;$i++){
   $r = $ttk->uploadFile(0,$ovf);
   $src = @$r['linkurl'];
   if($src){
    break;
   }
var_dump($r);
   sleep(10);
  }
  @unlink($vf);
  @unlink($ovf);
  if( !$src){
   continue;
  }
  $pCount++;
echo $v," \n",$src,"\n";
  $row['cover'] = $src;
  sleep(6);
 }
 $up_data = array('iscover'=>4,'id'=>$row['id']);
 if($pCount){
  $pinfo = parse_cover($row['cover']);
  if($pinfo['key']){
   $up_data['cover'] = $pinfo['key'];
   $up_data['host'] = $pinfo['host'];
   $up_data['ext'] = $pinfo['ext'];
   $up_data['iscover'] = 1;
  }
 }
var_dump($up_data);
exit;
 $m->updateArticleParam($up_data);
 sleep(6);
}
echo "==== dowload intro pic to ttk OK! =====\n";
