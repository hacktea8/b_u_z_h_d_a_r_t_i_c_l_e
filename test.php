<?php

$root = dirname(__FILE__).'/';
//require_once $root.'application/libraries/Img_imagick.php';
require_once $root.'application/libraries/Imagick_bin.php';
require_once $root.'application/libraries/Tietuku.php';

$imick = new Imagick_bin();

$water = $root.'public/images/watermark/emuwater.png';
$pic = $root.'imick.jpg';
$pic = $root.'imick.png';

$savef = $root.'save_1.jpg';
$savef = $root.'water_save_1.png';

$w = 100;
$h = 100;
//$imick->cropThumbImage($pic,$w,$h,$savef);
//exit;
//var_dump($imick);exit;
//15右中 13上中 12下中 14左中 右下
//$saveF = dirname($imgfile).'/water_'.$upload_data['orig_name'];
$imick->waterMark($pic,$water, $savef, $wmpos = 0);


