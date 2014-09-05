<?php

/**
执行周期 每个月执行一次
用户组更新
*/

$ROOTPATH = dirname(__FILE__).'/';

require_once $ROOTPATH.'../config.php';


$resetFlag = $ROOTPATH.'resetLock.php';

if(file_exists($resetFlag)){
 require_once $resetFlag;
 // 重置标志位
 if(date('Ymd') != $lastResetDate){
   $m->resetUpdateUserGroupFlag($flag = 0);
 }
}
$lockText = "<?php\r\n\$lastResetDate=".date('Ymd').";";
file_put_contents($resetFlag,$lockText);

$allGroup = $m->getAllGroup();


$where_dateline = array('Ymd>='=>date('Ymd',strtotime('-1 month')));
while(1){
 $list = $m->getNoUpdateGroupUserList(3000);
 if(empty($list)){
   echo "current no_update_user_group is Empty!\n";
   break;
 }
 foreach($list as $uinfo){
  $month_post = $m->getUserPostCount($where_dateline);
  // 发帖量
  $term_one = array();
  $first = 0;
  foreach($allGroup as $gid => $groupInfo){
   $first ++;
   if(1 == $first){
     continue;
   }
   if($month_post>= $groupInfo['post_count']){
    $term_one[] = $gid;
   }else{
    //当前用户组不符合 就没必要循环了
    break;
   }
  }
  // 发文符合要求
  if(count($term_one)){
   $term_two = array();
   $first = 0;
   foreach($allGroup as $gid => $groupInfo){
    $first ++;
    if(1 == $first){
     continue;
    }
    $offline_count = $m->checkUserOfflineAmount($groupInfo['offline_amount'], $where_dateline);
    if($offline_count >= $groupInfo['offline_count']){
     $term_two[] = $gid;
    }else{
     //当前用户组不符合 就没必要循环了
     break;
    }
   }
   if(count($term_two)){
    $_groups = array();
    foreach($term_one as $gid){
     if(in_array($gid, $term_two)){
      $_groups_[] = $gid;
     }
    }
    if(count($_groups)){
     sort($_groups);
     $gid = array_pop($_groups);
     if($gid && $gid != $uinfo['groupid']){
      //更新用户组
      $m->updateUserGroup($fields = array('groupid'=>$gid), $uinfo['uid']);
     }
    }
   }
  }
  $m->resetUpdateUserGroupFlag($update = array('isupgroup'=>1),$where = array('uid'=>$uinfo['uid']));
 }
}
echo "Update User Group Is OK!!\n";


 

