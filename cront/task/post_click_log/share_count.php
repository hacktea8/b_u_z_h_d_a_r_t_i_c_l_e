<?php

/**
执行周期 30min  或者合适的时间 统计文章被分享的次数
*/

$ROOTPATH = dirname(__FILE__).'/';

require_once $ROOTPATH.'../config.php';

$keys = $redis->keys("share_post_click_uv:*");
//var_dump($keys);exit;
foreach($keys as $v){
 $count = $redis->get($v);
 $arr = explode(':',$v);
 $stype = $arr[1];
 $aid = $arr[2];
 // 统计UV
 $param = compact('stype','aid','count');
 $m->setPostShareCountLog($param);
 echo "\n==== Key $v Value $hits ======\n";
 $redis->delete($v);
}

