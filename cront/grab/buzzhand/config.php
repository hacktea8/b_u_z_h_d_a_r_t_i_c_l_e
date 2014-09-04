<?php

$_root='http://www.buzzhand.com/';
$_devStatus = '_OK';
#$http_proxy = '211.138.121.37:82';
$http_proxy = '';
define('CHARSET', 'UTF-8');
define('LIST_HOT', '0');
//
$strreplace=array(
#array('from'=>'www.buzzhand.com','to'=>'www.buzhd.com')
#,array('from'=>'<p><br /></p>','to'=>'')
);
//
$pregreplace=array(
array('from'=>'#<a[^>]+>#Uis','to'=>'</td>')
,array('from'=>'#</a[^>]*>#Uis','to'=>'')
,array('from'=>'#<!--.*-->#Uis','to'=>'')
,array('from'=>'#<ins[^>]*></ins>#Uis','to'=>'')
,array('from'=>'#<img [^>]*src=[\'|"]\S+\.gif[^>]*[\'|"][^>]*>#Uis','to'=>'')
,array('from'=>'#\s+(id|class|style|alt)\s*=\s*".+"#Uis','to'=>'')
,array('from'=>'#\s+(id|class|style|alt)\s*=\s*\'.+\'#Uis','to'=>'')
,array('from'=>'#<script[^>]*>.*</script[^>]*>#Uis','to'=>'')
,array('from'=>'#(\s*\r\n\s*){2,}#Uis','to'=>'')
,array('from'=>'#(\s*\n\s*){2,}#Uis','to'=>'')
,array('from'=>'#\s{2,}#Uis','to'=>' ')
);

$cate_config = array(
// 1新闻
array('cid'=>7,'ourl'=>'/cate_54/')
,array('cid'=>8,'ourl'=>'/cate_7/')
,array('cid'=>9,'ourl'=>'/cate_8/')
,array('cid'=>10,'ourl'=>'/cate_9/')
,array('cid'=>11,'ourl'=>'/cate_10/')
,array('cid'=>38,'ourl'=>'/cate_11/')
// 奇趣
,array('cid'=>12,'ourl'=>'/cate_12/')
,array('cid'=>13,'ourl'=>'/cate_13/')
,array('cid'=>14,'ourl'=>'/cate_14/')
,array('cid'=>15,'ourl'=>'/cate_15/')
,array('cid'=>16,'ourl'=>'/cate_16/')
,array('cid'=>39,'ourl'=>'/cate_17/')
,array('cid'=>40,'ourl'=>'/cate_18/')
// 生活
,array('cid'=>17,'ourl'=>'/cate_19/')
,array('cid'=>18,'ourl'=>'/cate_20/')
,array('cid'=>19,'ourl'=>'/cate_21/')
,array('cid'=>20,'ourl'=>'/cate_22/')
,array('cid'=>21,'ourl'=>'/cate_23/')
,array('cid'=>41,'ourl'=>'/cate_24/')
,array('cid'=>42,'ourl'=>'/cate_25/')
,array('cid'=>43,'ourl'=>'/cate_26/')
,array('cid'=>44,'ourl'=>'/cate_27/')
,array('cid'=>45,'ourl'=>'/cate_28/')
,array('cid'=>46,'ourl'=>'/cate_29/')
,array('cid'=>47,'ourl'=>'/cate_30/')
,array('cid'=>48,'ourl'=>'/cate_31/')
,array('cid'=>49,'ourl'=>'/cate_32/')
,array('cid'=>50,'ourl'=>'/cate_33/')
,array('cid'=>51,'ourl'=>'/cate_34/')
// 4科技
,array('cid'=>22,'ourl'=>'/cate_35/')
,array('cid'=>23,'ourl'=>'/cate_36/')
,array('cid'=>24,'ourl'=>'/cate_37/')
,array('cid'=>25,'ourl'=>'/cate_38/')
,array('cid'=>26,'ourl'=>'/cate_39/')
,array('cid'=>52,'ourl'=>'/cate_40/')
// 娱乐
,array('cid'=>27,'ourl'=>'/cate_41/')
,array('cid'=>28,'ourl'=>'/cate_42/')
,array('cid'=>29,'ourl'=>'/cate_43/')
,array('cid'=>30,'ourl'=>'/cate_44/')
,array('cid'=>31,'ourl'=>'/cate_45/')
,array('cid'=>53,'ourl'=>'/cate_46/')
,array('cid'=>54,'ourl'=>'/cate_47/')
,array('cid'=>55,'ourl'=>'/cate_48/')
,array('cid'=>56,'ourl'=>'/cate_57/')
// 兴趣
,array('cid'=>32,'ourl'=>'/cate_49/')
,array('cid'=>33,'ourl'=>'/cate_50/')
,array('cid'=>34,'ourl'=>'/cate_51/')
,array('cid'=>35,'ourl'=>'/cate_52/')
,array('cid'=>36,'ourl'=>'/cate_53/')
,array('cid'=>37,'ourl'=>'/cate_55/')

);

$cids = array(1,2,3,4,5,6,7,8,9,11,12,13,14,15,16,17);
//$cids = array(17);

?>
