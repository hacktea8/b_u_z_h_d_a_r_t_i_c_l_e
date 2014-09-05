<?php

/**
每天下午 15:00 开始执行
记录每日用户的组ID
*/

$ROOTPATH = dirname(__FILE__).'/';

require_once $ROOTPATH.'../config.php';

$resetFlag = $ROOTPATH.'resetRecordLogLock.php';

if(file_exists($resetFlag)){
 require_once $resetFlag;
 // 重置标志位
 if(date('Ymd') != $lastResetDate){
   $m->resetUpdateUserGroupFlag($flag = 0);
 }
}
$lockText = "<?php\r\n\$lastResetDate=".date('Ymd').";";
file_put_contents($resetFlag,$lockText);

while(1){
 $list = $m->getNoUpdateGroupUserList(3000);
 if(empty($list)){
   echo "current no_update_user_group is Empty!\n";
   break;
 }
 foreach($list as $uinfo){
  $param = array('uid'=>$uinfo['uid'],'gid'=>$uinfo['groupid'],'wid'=>$uinfo['writerid']);
  $m->addUserGroupWritersLog($param);
  $m->resetUpdateUserGroupFlag($update = array('isupgroup'=>1),$where = array('uid'=>$uinfo['uid']));
 }
}
echo "Record User Group And Writer To Dayliy Log Is OK!\n";
