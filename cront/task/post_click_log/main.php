<?php

/**
执行周期 30min  或者合适的时间
*/

$ROOTPATH = dirname(__FILE__).'/';

require_once $ROOTPATH.'../config.php';

$keys = $redis->keys("post_click_uv:*");
//var_dump($keys);exit;
foreach($keys as $v){
 $hits = $redis->get($v);
 $arr = explode(':',$v);
 $type = $arr[1];
 $cop_uid = $arr[2];
 $gid = $arr[3];
 $wid = $arr[4];
 $cop = $arr[5];
 $aid = $arr[6];
 $uid = $arr[7];
 $pcid = $arr[8];
 $cid = $arr[9];
 $Ym  = $arr[10];
 $Ymd = $arr[11];
 $flag = 1;
 if(1 == $type){
  // 统计UV
  $param = compact('gid','wid','aid','uid','pcid','cid','Ym','Ymd','hits','flag');
  $m->setPostLog($param);
 }elseif(2 == $type){
  //共推收益
  $param = compact('cop','gid','wid','cop_uid','aid','uid','pcid','cid','Ym','Ymd','hits','flag');
  $m->setUKPostLog($param);
 }
 $redis->delete($v);
}

