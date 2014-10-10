<?php
/**
统计昨日以前的文章UV 执行时间无所谓
*/

$ROOTPATH = dirname(__FILE__).'/';
require_once $ROOTPATH.'../config.php';


$startDate = date('Ymd',strtotime('-1 day'));
//正妹扣量
$specialCate = '8';

$allGroup = $m->getAllGroup();

// 发文收益统计 由发文的时候统计 发文是否超量30 user_daily_income post_count

// 文章点击收益统计 昨天之前
while(1){
 //获取每日还没处理的日期
 $listDate = $m->getPostClickLogDate($startDate);
 if(empty($list)){
  echo "Get Before Post Click Dayliy Log Is Empty!\n";
  break;
 }
 foreach($listDate as $vdate){
  while(1){
   //获取日期的所有文章的点击总量,按Uid分组
   $listUid = $m->getPostClickLogGroupUid($vdate);
   if(empty($listUid)){
     echo "Get Date: $vdate All User Today List Is Empty!\n";
     break;
   }
   foreach($listUid as $vuid){
    //今日组信息
    $groupInfo = $m->getUserTodayGroup('id,gid,wid',array('uid'=>$vuid,'Ymd'=>$vdate));
    //今日收益
    $click_amount = 0;
    // start special
    //正妹分类 0.7 扣量
    $fields = 'SUM(click) AS total';
    $where = array('cid IN('=>$specialCate.')','uid='=>$vuid,'flag='=>1);
    $row = $m->getPostClickLogById($fields,$where);
    $specialCateClick = isset($row['total'])? $row['total']: 0;
    $specialCateClick = ($specialCateClick/1000)*0.7;
    $group = $allGroup[$groupInfo['gid']];
    $click_amount = $specialCateClick * $group['price'];
    // end special
    $fields = 'SUM(click) AS total';
    $where = array('cid NOT IN('=>$specialCate.')','uid='=>$vuid,'flag='=>1);
    $row = $m->getPostClickLogById($fields,$where);
    $postClick = isset($row['total'])? $row['total']: 0;
    $postClick = $postClick/1000;
    $coop_amount = 0;
    /*******共推收益计算*****/
    $coop_list = $m->getUserCoopLogList($vuid,$vdate);
    foreach($coop_list as $copval){
     $copCash = $copval['hits']/1000 * $group['price'];
     $copUcash = $copCash*$copval['cop']/10;
     $coop_amount += ($copCash-$copUcash);
     $m->saveCoopUcashByUid($copval['cop_uid'],$copUcash,$vdate);
     $m->resetCoopULogById($copval['id']);
    }
    /*******/
    $click_amount += ($postClick * $group['price'] + $coop_amount);
    // end General 常规
    if($click_amount){
     $update = array('click_amount'=>$click_amount);
     $where = array('id'=>$groupInfo['id']);
     $m->updateUserDayliyIncome($update,$where);
    }// end update post_click_amount
    $post_amount = $groupInfo['post_amount'];
    // end update post_amount  由发文进行统计
    $amount = $post_amount + $click_amount;
    if( $amount){
     $invite = $m->getUserIntroducer($vuid);
     if($invite){
      //贡献的金额
      $devote_amount = $amount * 0.15;
      $update = array('devote_amount'=>-$devote_amount);
      $where = array('id'=>$groupInfo['id']);
      $m->updateUserDayliyIncome($update,$where);
      //更新上线的提成
      $m->updateIntroducerDayliyIncome($deduct_amount,$invite,$vdate);
     }
     // end update devote_amount 贡献给上线的金额 负的
    }
    // 统计过的UV 失效
    $update = array('flag'=>0);
    $where = array('uid'=>$v['uid'],'Ymd'=>$vdate);
    $m->setPostClickLogFlag($update, $where);
   } //end foreach listUid
echo "Sleep 2s\n";
sleep(2);
  } // end while 1
 } // end foreach listDate
echo "Sleep 5s\n";
sleep(5);
} // end while 1
// 提成贡献统计 

