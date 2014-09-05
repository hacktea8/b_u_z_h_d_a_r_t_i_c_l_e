<?php


define('BASEPATH',dirname(dirname(dirname($ROOTPATH) ) ).'/');

require_once $ROOTPATH.'../Dbmysql.php';
require_once BASEPATH.'application/config/database.php';
require_once $ROOTPATH.'../model.php';
require_once BASEPATH.'application/libraries/Rediscache.php';

$m = new M();
$redis = new Rediscache();
