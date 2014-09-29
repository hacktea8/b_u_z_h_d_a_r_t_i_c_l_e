<?php

$APPPATH=dirname(__FILE__).'/';
include_once($APPPATH.'../config.php');
include_once($APPPATH.'../function.php');
include_once($APPPATH.'/function.php');
include_once($APPPATH.'config.php');

/*/
/**/

/*============ Get Cate article =================*/

$lastgrab = basename(__FILE__);
$path = $APPPATH.'config/';

$it = count($cate_config);

for($num =0; $num<$it; $num++){
 
 foreach($cate_config as $k => $_cate){
  $i = $k;
  //1,5,9,13,17 isok
  if($i > $num){
    break;
  }
  if($i != $num){
    continue;
  }
  echo "\n+++++++ Curren Task Is $num +++++++\n";
 //var_dump($_cate);exit;
  $cid = $_cate['cid'];
  getinfolist($_cate);
  echo "\n==== 抓取任务结束! =====\n";
 }
 sleep(10);
}


?>
