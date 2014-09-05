<?php

/**
执行周期 30min  或者合适的时间
*/

$ROOTPATH = dirname(__FILE__).'/';

require_once $ROOTPATH.'../config.php';

$keys = $redis->keys("post_uv:*");
//var_dump($keys);exit;
foreach($keys as $v){
 $click = $redis->get($v);
 $arr = explode(':',$v);
 
 if(1 == $arr[1]){
  // 统计UV
  $aid = $arr[2];
  $uid = $arr[3];
  $cid = $arr[4];
  $Ym  = $arr[5];
  $Ymd = $arr[6];
  $flag = 1;
  $param = compact('aid','uid','cid','Ym','Ymd','click','flag');
  $m->setPostLog($param);
 }
 $redis->delete($v);
}

