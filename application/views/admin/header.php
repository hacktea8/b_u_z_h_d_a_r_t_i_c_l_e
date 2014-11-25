<!DOCTYPE HTML>
<html>
 <head>
  <title>  管理系统</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="<?php echo $cdn_url;?>/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo $cdn_url;?>/css/bui-min.css" rel="stylesheet" type="text/css" />
<?php if(in_array($_a,array('index'))){?>
  <link href="<?php echo $cdn_url;?>/css/main-min.css" rel="stylesheet" type="text/css" />
<?php }else if(in_array($_a,array('index_index','cate_list'))){?>
  <link href="<?php echo $cdn_url;?>/css/page-min.css" rel="stylesheet" type="text/css" />
<?php }?>
  <script type="text/javascript" src="<?php echo $cdn_url;?>/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="<?php echo $cdn_url;?>/js/bui.js"></script>
  <script type="text/javascript" src="<?php echo $cdn_url;?>/js/config.js"></script>
 </head>
 <body>
