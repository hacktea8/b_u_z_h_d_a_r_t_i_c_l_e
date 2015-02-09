<?php

$_root='http://www.life.com.tw';
$_devStatus = 'OK';
#$http_proxy = '211.138.121.37:82';
$http_proxy = '';
//
$strreplace=array(
array('from'=>'www.life.com.tw','to'=>'www.news8s.com')
,array('from'=>'\"','to'=>'"')
,array('from'=>'\r\n','to'=>'')
,array('from'=>'\n','to'=>'')
);
//
$pregreplace=array(
array('from'=>'#<br>引用.+</td>#Us','to'=>'</td>')
,array('from'=>'#<script [^>]+>.*</script>#','to'=>'')
);

$cate_config = array(
//时事新闻
array('cid'=>'1-7','ourl'=>'54','name'=>'國際','page'=>1)
//社会万象
#,array('cid'=>'1-8','ourl'=>'44','name'=>'社会新聞')
//娱乐新闻
,array('cid'=>'1-9','ourl'=>'45','name'=>'娛樂新聞','page'=>1)
//体育新闻
//,array('cid'=>'1-10','ourl'=>'','name'=>'')
//科技新闻
,array('cid'=>'1-11','ourl'=>'26','name'=>'電腦諮詢','page'=>1)
//财经新闻
,array('cid'=>'1-38','ourl'=>'15','name'=>'財經','page'=>1)
//奇趣资讯
,array('cid'=>'2-12','ourl'=>'13','name'=>'搞笑趣聞','page'=>3)
//奇趣贴图
//,array('cid'=>'2-13','ourl'=>'','name'=>'')
//恶搞图集
//,array('cid'=>'2-14','ourl'=>'','name'=>'')
//奇闻怪事
,array('cid'=>'2-15','ourl'=>'51','name'=>'奇聞異事','page'=>2)
//惊悚恐怖
//,array('cid'=>'2-16','ourl'=>'','name'=>'')
//笑话大全
,array('cid'=>'2-39','ourl'=>'62','name'=>'搞笑大全','page'=>30)
//奇趣短片
//,array('cid'=>'2-40','ourl'=>'','name'=>'')
//生活百科
,array('cid'=>'3-17','ourl'=>'19','name'=>'生活知識','page'=>30)
//心理测验
//,array('cid'=>'3-18','ourl'=>'','name'=>'')
//创意生活
,array('cid'=>'3-19','ourl'=>'24','name'=>'設計空間','page'=>30)
//健康养生
,array('cid'=>'3-20','ourl'=>'38','name'=>'健康醫療','page'=>30)
,array('cid'=>'3-20','ourl'=>'20','name'=>'運動體育','page'=>1)
,array('cid'=>'3-20','ourl'=>'36','name'=>'減重塑身','page'=>1)
,array('cid'=>'3-20','ourl'=>'57','name'=>'養生食譜','page'=>30)
,array('cid'=>'3-20','ourl'=>'39','name'=>'紓壓良方','page'=>30)
//美食天下
,array('cid'=>'3-21','ourl'=>'4','name'=>'美食特搜','page'=>30)
//亲子妇幼
,array('cid'=>'3-41','ourl'=>'16','name'=>'親子話題','page'=>3)
//旅游资讯
,array('cid'=>'3-42','ourl'=>'11','name'=>'旅遊資訊','page'=>10)
//汽车频道
,array('cid'=>'3-43','ourl'=>'60','name'=>'玩車情報','page'=>5)
//房产频道
,array('cid'=>'3-44','ourl'=>'61','name'=>'房市快報','page'=>5)
//投资理财
,array('cid'=>'3-45','ourl'=>'22','name'=>'行銷創業','page'=>3)
//命理星座
,array('cid'=>'3-46','ourl'=>'23','name'=>'星座命理','page'=>30)
//心情日记
,array('cid'=>'3-47','ourl'=>'40','name'=>'達人分享','page'=>3)
//两性话题
,array('cid'=>'3-48','ourl'=>'17','name'=>'兩性關係','page'=>30,'adult'=>1)
//女性专区
,array('cid'=>'3-49','ourl'=>'12','name'=>'女人魅心事','page'=>5)
,array('cid'=>'3-49','ourl'=>'14','name'=>'美妝保養','page'=>5)
,array('cid'=>'3-49','ourl'=>'42','name'=>'髮妝指彩','page'=>5)
,array('cid'=>'3-49','ourl'=>'43','name'=>'服飾配件','page'=>5)
//男性话题
,array('cid'=>'3-50','ourl'=>'35','name'=>'男人品味','page'=>5)
,array('cid'=>'3-50','ourl'=>'48','name'=>'18禁不禁','page'=>5)
//生活短片
,array('cid'=>'3-51','ourl'=>'63','name'=>'勵志感人','page'=>5)
//社媒资讯
#,array('cid'=>'4-22','ourl'=>'','name'=>'')
//数码科技
,array('cid'=>'4-23','ourl'=>'5','name'=>'手機 & APP','page'=>5)
//硬件资讯
,array('cid'=>'4-24','ourl'=>'47','name'=>'3C配件','page'=>5)
//软件资讯
#,array('cid'=>'4-25','ourl'=>'','name'=>'')
//电玩资讯
,array('cid'=>'4-26','ourl'=>'25','name'=>'電玩遊戲','page'=>3)
//前沿探索
#,array('cid'=>'4-52','ourl'=>'','name'=>'')
//正妹贴图
#,array('cid'=>'5-27','ourl'=>'','name'=>'')
//八卦图文
#,array('cid'=>'5-28','ourl'=>'','name'=>'')
//明星动态
#,array('cid'=>'5-29','ourl'=>'','name'=>'')
//影视资讯
,array('cid'=>'5-30','ourl'=>'27','name'=>'電影資訊','page'=>15)
,array('cid'=>'5-30','ourl'=>'30','name'=>'音樂戲劇','page'=>15)
// 时尚情报
#,array('cid'=>'5-31','ourl'=>'','name'=>'')
//综艺资讯
#,array('cid'=>'5-53','ourl'=>'','name'=>'')
//游戏动漫
#,array('cid'=>'5-54','ourl'=>'','name'=>'')
// 娱乐短片
#,array('cid'=>'5-55','ourl'=>'','name'=>'')
//正妹短片
#,array('cid'=>'5-56','ourl'=>'','name'=>'')
//诗歌文学
,array('cid'=>'6-32','ourl'=>'7','name'=>'藝文創作','page'=>15)
//摄影技术
#,array('cid'=>'6-33','ourl'=>'','name'=>'')
//宠物专区
,array('cid'=>'6-34','ourl'=>'1','name'=>'寵物資訊','page'=>15)
//军事资讯
#,array('cid'=>'6-35','ourl'=>'','name'=>'')
//模型资讯
#,array('cid'=>'6-36','ourl'=>'','name'=>'')
//兴趣短片
#,array('cid'=>'6-37','ourl'=>'','name'=>'')

);


?>
