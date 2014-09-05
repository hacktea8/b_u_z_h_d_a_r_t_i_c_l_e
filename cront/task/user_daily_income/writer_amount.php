<?php

/**
执行顺序在{ main.php }之后
*/

$ROOTPATH = dirname(__FILE__).'/';

define('BASEPATH',dirname(dirname($ROOTPATH)).'/');

require_once $ROOTPATH.'../Dbmysql.php';
require_once BASEPATH.'application/config/database.php';
require_once $ROOTPATH.'../model.php';

$m = new M();

$allWriterGroup = $m->getAllWriterGroup();

while(1){
 $list = $m->getUserNoWriterCountList(3000);
 if(empty($list)){
  echo "Get User No Writer Amount Count List Is Empty! \n";
  break;
 }
 foreach($list as $v){
  $amount = $v['post_amount'] + $v['deduct_amount'] + $v['click_amount'] + $v['devote_amount'];
  $ginfo = $allWriterGroup[$v['wid']];
  $writer_amount = $ginfo['price'] * $amount;
  $update = array('isupamount'=>1);
  if($writer_amount){
   $amount += $writer_amount;
   $update['writer_amount'] = $writer_amount;
  }
  $update['amount'] = $amount;
  $where = array('id'=>$v['id']);
  $m->updateUserDayliyIncome($update, $where);
 } // end foreach list
echo "Sleep 3s\n";
sleep(3);
} //end while 1

echo "Update User Amount Is OK!\n";

