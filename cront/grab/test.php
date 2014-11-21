<?php

define('ROOTPATH', dirname(__FILE__).'/');
require_once ROOTPATH.'post.class.php';
require_once ROOTPATH.'../../application/libraries/Tietuku.php';
require_once ROOTPATH.'../../application/libraries/gickimg.php';

$post = new Post();
$ttk = new Tietuku();

$config = array('ttk'=>$ttk);
$post->init($config);

$data = array(
'title'=>'机器发文'
,'cover'=>'http://pic.nipic.com/2008-05-23/2008523131945106_2.jpg'
,'intro'=>'这是一篇，机器测试发文<img src="http://pic.nipic.com/2008-05-23/2008523131945106_2.jpg">'
,'cid'=>'1-10'
,'tags'=>'机器,发文，自动'
);
$aid = $post->create($data);

echo "\n++++ Add Article Aid: {$aid} ++++\n";

