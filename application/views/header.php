<!DOCTYPE html>
<html>
  <head>
<?php if('article' == $_a){?>
 <?php foreach($intro_img as $v){?>
    <meta property="og:image" content="<?php echo $v;?>"
    />
 <?php }?>
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo $site_url;$info['url'];?>" />
    <meta property="article:publisher" content="https://www.facebook.com/<?php echo $fans_page;?>"
    />
<?php }?>
    <meta property="og:site_name" content="<?php echo $site_name?>" />
    <meta property="og:title" content="<?php echo $info['title'];?>" />
    <meta property="article:section" content="<?php echo $cate_info[$info['cid']]['title'];?>" />
    <meta property="og:description" content="<?php echo $info['summary'];?>"
    />
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
    <link rel="icon shortcut" href="<?php echo $cdn_url;?>/images/favicon.ico" type="image/x-icon">
    <script type="text/javascript">
      window.jQuery || document.write("<script src='http://libs.baidu.com/jquery/1.7.2/jquery.min.js'><\/script>");
    </script>
    <script src="<?php echo $cdn_url;?>/js/waypoints.min.js">
    </script>
    <script src="<?php echo $cdn_url;?>/js/lib/VK.js">
    </script>
    <!--[if lt IE 9]>
      <script src="<?php echo $cdn_url;?>/js/lib/html5.js">
      </script>
      <script src="<?php echo $cdn_url;?>/js/lib/css3-mediaqueries.js">
      </script>
    <![endif]-->
    <script type="text/javascript">
      var fb_page = 'https://www.facebook.com/BuzzHandCom';
      var fb_name = 'BuzzHand';
      window.isMobile = false;
      window.isDesktop = false; (function(a) {
        if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) {
          isMobile = true;
        } else {
          isDesktop = true;
        }
      })(navigator.userAgent || navigator.vendor || window.opera);
    </script>
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
            <a title="首頁" href="http://www.buzzhand.com">
              首頁
            </a>
          </li>
          <li>
            <a title="熱門文章" href="/post/hots.html?date=daily">
              熱門
            </a>
          </li>
          <li>
            <a title="原創文章" href="/post/original.html">
              原創
            </a>
          </li>
          <li>
            <a title="最新文章" href="/post/news.html">
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
              <li class="vertical nav_r submenu small user">
                <a class="center" href="http://my.buzzhand.com/index.html">
                  <img alt="1187247901" title="1187247901" src="<?php echo $cdn_url;?>/images/user_img_def.png"
                  width="30px" height="30px" />
                  <span class="ui_point ui_point_down">
                  </span>
                </a>
                <div class="submenu_content">
                  <ul>
                    <li>
                      <a class="fcEm7" href="http://my.buzzhand.com/message/index.html">
                        <span class="ui_icon ui_icon20 ui_icon20_msg">
                        </span>
                        個人訊息
                      </a>
                    </li>
                    <li>
                      <a class="fcEm7" href="http://my.buzzhand.com/index.html">
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
                    <li>
                      <a class="fcEm7" href="http://my.buzzhand.com/follow/index.html">
                        <span class="ui_icon ui_icon20 ui_icon20_file">
                        </span>
                        我的訂閱
                      </a>
                    </li>
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
                <a class="center" href="/post/hots.html?date=daily">
                  熱門
                </a>
              </li>
              <li class="vertical">
                <a class="center" href="/post/news.html">
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
                      <a href="http://my.buzzhand.com/forum/cate_1.html">
                        常見問題
                      </a>
                    </li>
                    <li>
                      <a href="http://my.buzzhand.com/forum/cate_10.html">
                        經驗分享
                      </a>
                    </li>
                    <li>
                      <a href="http://my.buzzhand.com/forum/cate_11.html">
                        曬收入
                      </a>
                    </li>
                    <li>
                      <a href="http://my.buzzhand.com/forum/cate_12.html">
                        提問題
                      </a>
                    </li>
                    <li>
                      <a href="http://my.buzzhand.com/forum/cate_13.html">
                        文章共推
                      </a>
                    </li>
                    <li>
                      <a href="http://my.buzzhand.com/forum/cate_14.html">
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
