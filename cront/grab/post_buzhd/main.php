<?php

$root = dirname(__FILE__).'/';
define('ROOTPATH', $root.'../');

require_once $root.'post.php';
require_once ROOTPATH.'phpCurl.php';

$curl = new phpCurl();
$curl->config['cookie'] = 'buzhd_1187';
$post = new Post();

// test IP
$ipArr = $post->getIP(35);
//print_r($ipArr);
foreach($ipArr as $ip){
 $post->moreHits($url = '56020', $ip);
 sleep(10);
}
/*
$post->login();
*/

