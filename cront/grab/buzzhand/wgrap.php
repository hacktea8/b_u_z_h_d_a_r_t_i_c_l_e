<?php

$APPPATH=dirname(__FILE__).'/';
include_once($APPPATH.'../config.php');
include_once($APPPATH.'../function.php');
include_once($APPPATH.'/function.php');
include_once($APPPATH.'config.php');


/*============ Get Cate article =================*/


$num = 2;
foreach($cate_config as $k => $_cate){
  $i = $_cate['cid'];
  //2, isok
  if($num > $k){
    break;
  }
  if($num != $k){
    continue;
  }
  $cid = $i;
  getinfolist($_cate);
  echo "\n==== 抓取任务结束! =====\n";
  sleep(10);
}



?>
