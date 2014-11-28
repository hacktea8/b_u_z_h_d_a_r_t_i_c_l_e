<?php

$APPPATH = dirname(__FILE__).'/';
include_once($APPPATH.'../config.php');
include_once($APPPATH.'../function.php');
include_once($APPPATH.'../db.class.php');
include_once($APPPATH.'../model.php');
include_once($APPPATH.'/function.php');
include_once($APPPATH.'config.php');


$model = new Model();

/*============ Get Cate article =================*/


$num = 0;
$pageStart = 1;

foreach($cate_config as $k => $_cate){
 $cid = $_cate['cid'];
 echo "=== Current Index $k Cid $cid ====\n";
 //0, isok
 if($k > $num){
  break;
 }
 if($k != $num){
  continue;
 }
 getinfolist($_cate);
 echo "\n==== 抓取任务结束! =====\n";
}



?>
