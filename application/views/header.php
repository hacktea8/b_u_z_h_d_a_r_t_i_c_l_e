<!DOCTYPE html>
<html>
  <head>
<?php if('article' == $_c){?>
    <meta property="og:image" content="<?php echo $info['pic'];?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo $info['url'];?>" />
    <meta property="article:publisher" content="https://www.facebook.com/news8s" />
    <meta property="og:site_name" content="<?php echo $site_name?>" />
    <meta property="og:title" content="<?php echo $info['title'];?>" />
    <meta property="article:section" content="<?php echo $cate_info[$info['cid']]['title'];?>" />
    <meta property="og:description" content="<?php echo $info['summary'];?>" />
    <meta name=thumbnail" content="<?php echo $info['pic'];?>" />
    <meta itemprop="image" content="<?php echo $info['pic'];?>"/>
<?php }?>
    <meta property="og:locale" content="zh_TW" />
    <title>
     <?php echo $seo['title'];?> - <?php echo $site_name;?>
    </title>
    <meta charset="utf-8">
    <meta name="description" content="<?php echo $seo['description'];?>" />
    <meta name="keywords" content="<?php echo $seo['keyword'];?>" />
    <meta name="robots" content="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="tencent-x5-page-direction" content="landscape">
    <meta name="distribution" content="Taiwan" />
    <meta name="author" content="<?php echo $site_name?>">
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no">
    <link rel="alternate" type="application/rss+xml" title="<?php echo $site_name?> &raquo; Feed"
    href="/rss/index/feed.html">
    <link href="<?php echo $cdn_url;?>/css/buzzhand.css?v=<?php echo $version;?>" rel="stylesheet">
    <link rel="icon shortcut" href="<?php echo $cdn_url;?>/images/favicon.ico?v=<?php echo $version;?>" type="image/x-icon">
    <script type="text/javascript">
<?php if( in_array($_c, array('console'))){?>
var ttk_token = '<?php echo $ttk_token;?>';
<?php }?>
    var cdn_url = '<?php echo $cdn_url;?>';
    var js_version = '<?php echo $version;?>';
    </script>
    <script src="<?php echo $cdn_url;?>/js/global.js?v=<?php echo $version;?>"></script>
    <!--[if lt IE 9]>
      <script src="<?php echo $cdn_url;?>/js/lib/html5.js?v=<?php echo $version;?>"></script>
      <script src="<?php echo $cdn_url;?>/js/lib/css3-mediaqueries.js?v=<?php echo $version;?>"></script>
    <![endif]-->
  </head>
  <body>
    <!-- wrap -->
    <div id="wrap">
      <!-- wrap sidebar -->
      <div id="menuList" class="wrap_sidebar">
        <ul>
          <li class="title">
            導航
          </li>
          <li>
            <a title="首頁" href="/">
              首頁
            </a>
          </li>
          <li>
            <a title="熱門文章" href="/article/hots/daily.html">
              熱門
            </a>
          </li>
          <li>
            <a title="原創文章" href="/article/original.html">
              原創
            </a>
          </li>
          <li>
            <a title="最新文章" href="/article/news.html">
              最新
            </a>
          </li>
<?php $ik=0;foreach($cate_info as $v){
if($ik>6){
 break;
}
if($v['pid']){
 continue;
}
?>
          <li>
            <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>">
              <?php echo $v['title'];?>
            </a>
          </li>
<?php $ik++;}?>
          <li class="title">
            個人中心
          </li>
          <li>
            <a href="<?php echo $uinfo['url'];?>" title="我的頻道">
              我的頻道
            </a>
          </li>
          <li>
            <a title="收益" href="/console/earnings.html">
              收益
            </a>
          </li>
          <li>
            <a href="/user/logout.html" title="退出">
              退出
            </a>
          </li>
        </ul>
      </div>
      <!-- end header -->
      <!-- wrap main -->
      <div id="wrapMain">
        <!-- header -->
        <header id="header" class="">
          <div class="content clearfix">
            <ul class="main_nav clearfix">
              <li id="showMenu" class="vertical menu">
                <span class="ui_icon ui_icon35 ui_icon35_menu">
                  menu
                </span>
              </li>
              <li class="vertical logo">
                <h2 class="center">
                  <a href="/">
                    <?php echo $site_name;?>
                  </a>
                </h2>
              </li>
<?php if($uinfo['uid']){?>
              <li class="vertical nav_r submenu small user">
                <a class="center" href="/console/index.html">
                  <img alt="<?php echo $uinfo['uname'];?>" title="<?php echo $uinfo['uname'];?>" src="<?php echo $cdn_url;?>/images/user_img_def.png"
                  width="30px" height="30px" />
                  <span class="ui_point ui_point_down">
                  </span>
                </a>
                <div class="submenu_content">
                  <ul>
<?php if(0){?>
                    <li>
                      <a class="fcEm7" href="/message/index.html">
                        <span class="ui_icon ui_icon20 ui_icon20_msg">
                        </span>
                        個人訊息
                      </a>
                    </li>
<?php }?>
                    <li>
                      <a class="fcEm7" href="/console">
                        <span class="ui_icon ui_icon20 ui_icon20_user2">
                        </span>
                        會員中心
                      </a>
                    </li>
                    <li>
                      <a class="fcEm7" href="<?php echo $uinfo['url'];?>">
                        <span class="ui_icon ui_icon20 ui_icon20_mac">
                        </span>
                        我的頻道
                      </a>
                    </li>
<?php if(0){?>
                    <li>
                      <a class="fcEm7" href="/follow/index.html">
                        <span class="ui_icon ui_icon20 ui_icon20_file">
                        </span>
                        我的訂閱
                      </a>
                    </li>
<?php }?>
                    <li>
                      <a class="fcEm7" href="/user/logout.html">
                        <span class="ui_icon ui_icon20 ui_icon20_power">
                        </span>
                        登出
                      </a>
                    </li>
                  </ul>
                </div>
                <!-- login -->
              </li>
<?php }else{?>
<li class="vertical nav_r small user">
 <a href="/user/login.html" class="center ui_icon ui_icon20 ui_icon20_user">用戶</a>
</li>
<?php }?>
              <li class="vertical nav_r submenu small search">
                <a id="showSearch" class="center ui_icon ui_icon20 ui_icon20_search">
                  搜尋
                </a>
              </li>
              <li class="vertical nav_r submenu follow">
                <div class="center">
                  <a class="ui_icon ui_icon_third20 ui_icon_third20_t">
                    Twitter
                  </a>
                  <a class="ui_icon ui_icon_third20 ui_icon_third20_f ml10 mr10">
                    Facebook
                  </a>
                  <a class="ui_icon ui_icon_third20 ui_icon_third20_g">
                    Google+
                  </a>
                </div>
              </li>
              <li class="vertical">
                <a class="center" href="/article/hots/daily.html">
                  熱門
                </a>
              </li>
              <li class="vertical">
                <a class="center" href="/article/news.html">
                  最新
                </a>
              </li>
<?php $ik=0;foreach($cate_info as $v){
if($ik>5){
 break;
}
if($v['pid']){
 continue;
}
?>
              <li class="vertical submenu" list-id="<?php echo $ik;?>">
                <a class="center" href="<?php echo $v['url'];?>">
                  <?php echo $v['title'];?>
                  <span class="ui_point ui_point_down">
                  </span>
                </a>
              </li>
<?php $ik++;}?>
              <li class="vertical submenu small">
                <a class="center">
                  幫助
                </a>
                <div class="submenu_content">
                  <ul>
                    <li>
                      <a href="/forum/cate_1.html">
                        常見問題
                      </a>
                    </li>
                    <li>
                      <a href="/forum/cate_10.html">
                        經驗分享
                      </a>
                    </li>
                    <li>
                      <a href="/forum/cate_11.html">
                        曬收入
                      </a>
                    </li>
                    <li>
                      <a href="/forum/cate_12.html">
                        提問題
                      </a>
                    </li>
                    <li>
                      <a href="/forum/cate_13.html">
                        文章共推
                      </a>
                    </li>
                    <li>
                      <a href="/forum/cate_14.html">
                        網站公告
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="vertical">
                <a href="/channel/index.html">
                  <span class="ui_icon ui_icon15 ui_icon15_cate mr5">
                  </span>
                  <span class="vm">
                    頻道
                  </span>
                </a>
              </li>
              <li class="vertical pub">
                <a class="center ui_btn ui_btn_green f12" href="/console/postcreate.html">
                  <span class="ui_icon ui_icon15 ui_icon15_edit mr5">
                  </span>
                  <span class="vm">
                    發表文章
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </header>
        <!-- end header -->
<script type="text/javascript">
var _action = '<?php echo $_c;?>';
var _method = '<?php echo $_a;?>';
var _cdn_url = '<?php echo $cdn_url;?>';
</script>
