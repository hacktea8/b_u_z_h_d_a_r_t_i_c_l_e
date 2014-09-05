<?php
/**
执行周期 每天早上 7:00
作家组更新
*/

$ROOTPATH = dirname(__FILE__).'/';
require_once $ROOTPATH.'../config.php';


$resetFlag = $ROOTPATH.'resetWriterLock.php';

if(file_exists($resetFlag)){
 require_once $resetFlag;
 // 重置标志位
 if(date('Ymd') != $lastResetDate){
   $m->resetUpdateUserGroupFlag($update = array('isupwritergroup' => 0);
 }
}
$lockText = "<?php\r\n\$lastResetDate=".date('Ymd').";";
file_put_contents($resetFlag,$lockText);

$allWriterGroup = $m->getAllWriterGroup();

$where_dateline = array('Ymd>='=>date('Ymd',strtotime('-1 month')));
$new_where = $where_dateline;
$new_where['flag'] = 1;

while(1){
 $list = $m->getNoUpdateGroupUserList(3000, $where = array('isupwritergroup'=>0));
 if(empty($list)){
   echo "current no_update_user_group is Empty!\n";
   break;
 }
 foreach($list as $uinfo){
  $new_where['uid'] = $uinfo['uid'];
  $post_click = $m->getUserPostClick($where_dateline);
  $first = 0;
  $new_wid = 0;
  foreach($allWriterGroup as $wid => $groupInfo){
   $first ++;
   if(1 == $first){
    continue;
   }
   if($post_click >= $groupInfo['click_count']){
    $new_wid = $wid;
   }else{
    // 不符合当前条件 结束循环
    break;
   }
  }
  if($new_wid && $new_wid != $uinfo['writerid']){
   //更新作家组
   $m->updateUserGroup($fields = array('writerid'=>$gid), $uinfo['uid']);
  }
  $m->resetUpdateUserGroupFlag($update = array('isupwritergroup' => 1),$where = array('uid'=>$uinfo['uid']));
 }
 
}
echo "Update User Writers Group Is OK!\n";

