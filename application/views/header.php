<!DOCTYPE html>
<html>
  <head>
    <title>
      <?php echo $seo_title,'-',$web_title;?> - 文章创作分享的网络平台
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="tencent-x5-page-direction" content="landscape">
    <meta name="distribution" content="Zhongguo" />
    <meta name="author" content="<?php echo $web_title;?>">
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no">
    <link rel="alternate" type="application/rss+xml" title="<?php echo $web_title;?> &raquo; Feed"
    href="/site/feed.html">
    <link href="<?php echo $cdn_url;?>/css/base.css" rel="stylesheet">
    <link href="<?php echo $cdn_url;?>/css/style.css" rel="stylesheet">
    <link href="<?php echo $cdn_url;?>/css/share.css" rel="stylesheet">
    <link rel="icon shortcut" href="<?php echo $cdn_url;?>/images/favicon.ico" type="image/x-icon">
    <script type="text/javascript">
      window.jQuery || document.write("<script src='http://libs.baidu.com/jquery/1.7.2/jquery.min.js'><\/script>");
    </script>
    <script src="<?php echo $cdn_url;?>/js/lib/VK.js"></script>
    <script src="<?php echo $cdn_url;?>/js/lanage.js?v=<?php echo $version;?>"></script>
    <script src="<?php echo $cdn_url;?>/js/function.js?v=<?php echo $version;?>"></script>
    <?php if(in_array($_a,array('index','lists','views','play','fav','search'))){ ?>
     <script type="text/javascript" src="<?php echo $cdn_url;?>/js/jquery.lazyload.min.js?v=<?php echo $version;?>"></script>
    <?php } ?>
    <!--[if lt IE 9]>
      <script src="<?php echo $cdn_url;?>/js/lib/html5.js">
      </script>
      <script src="<?php echo $cdn_url;?>/js/lib/css3-mediaqueries.js">
      </script>
    <![endif]-->
    <script type="text/javascript">
      var fb_page = 'https://www.facebook.com/<?php echo $web_title;?>';
      var fb_name = '<?php echo $web_title;?>';
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
    <div id="wrap">
      <div id="menuList" class="wrap_sidebar">
        <ul>
          <li class="title">
            导航
          </li>
          <li>
            <a title="首页" href="/">
              首页
            </a>
          </li>
          <li>
            <a title="热门文章" href="/post/hots.html?date=daily">
              热门
            </a>
          </li>
          <li>
            <a title="精彩文章" href="/post/wonderfull.html">
              精彩
            </a>
          </li>
          <li>
            <a title="最新文章" href="/post/news.html">
              最新
            </a>
          </li>
          <li>
<!-- 6 -->
         <?php foreach($cateInfo as &$v){
          if($v['pid']){
            continue;
          }
         ?>
            <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>">
              <?php echo $v['title'];?> <span class="ui_point ui_point_down"></span>
            </a>
          </li>
         <?php }?>
          <li>
            <a title="频道" href="/channel/index.html">
              频道
            </a>
          </li>
        </ul>
      </div>
      <div id="wrapMain">
        <header id="header" class="">
          <div class="content clearfix">
            <ul class="main_nav clearfix">
              <li id="showMenu" class="vertical menu">
                <span class="ui_icon ui_icon35 ui_icon35_menu">
                  menu
                </span>
              </li>
              <li class="vertical logo">
                <h1 class="center">
                  <a href="/">
                    <?php echo $web_title;?>
                  </a>
                </h1>
              </li>
              <?php if($uinfo['uid']){ ?>
              <li class="vertical nav_r submenu small user">
                <a class="center" href="/my/index">
                  <img alt="1187247901" title="1187247901" src="/themes/default/images/user_img_def.png"
                  width="30px" height="30px" />
                  <span class="ui_point ui_point_down">
                  </span>
                </a>
                <div class="submenu_content">
                  <ul>
                    <li>
                      <a class="fcEm7" href="/message/index.html">
                        <span class="ui_icon ui_icon20 ui_icon20_msg">
                        </span>
                        個人訊息
                      </a>
                    </li>
                    <li>
                      <a class="fcEm7" href="/my/index.html">
                        <span class="ui_icon ui_icon20 ui_icon20_user2">
                        </span>
                        會員中心
                      </a>
                    </li>
                    <li>
                      <a class="fcEm7" href="/channel_1182.html">
                        <span class="ui_icon ui_icon20 ui_icon20_mac">
                        </span>
                        我的頻道
                      </a>
                    </li>
                    <li>
                      <a class="fcEm7" href="/follow/index.html">
                        <span class="ui_icon ui_icon20 ui_icon20_file">
                        </span>
                        我的訂閱
                      </a>
                    </li>
                    <li>
                      <a class="fcEm7" href="/user/logout">
                        <span class="ui_icon ui_icon20 ui_icon20_power">
                        </span>
                        登出
                      </a>
                    </li>
                  </ul>
                </div>
                <?php }else{ ?>
<li class="vertical nav_r small user">
  <a href="/user/login/?goto=<?php echo $current_url;?>" class="center ui_icon ui_icon20 ui_icon20_user">
    用户
  </a>
                <?php } ?>
                <!-- login -->
              </li>
              <li class="vertical nav_r submenu small search">
                <a id="showSearch" class="center ui_icon ui_icon20 ui_icon20_search">
                  搜寻
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
                  热门
                </a>
              </li>
              <li class="vertical">
                <a class="center" href="/post/news.html">
                  最新
                </a>
              </li>
              <?php foreach($cate_info as $k => $v){
                if($v['pid']){
                 continue;
                }
              ?>
              <li class="vertical submenu" list-id="<?php echo $k;?>">
                <a class="center" href="<?php echo $v['url'];?>">
                  <?php echo $v['title'];?>
                  <span class="ui_point ui_point_down">
                  </span>
                </a>
              </li>
              <?php } ?>
              <li class="vertical submenu small">
                <a class="center">
                  帮助
                </a>
                <div class="submenu_content">
                  <ul>
                    <li>
                      <a href="/forum/cate_1.html">
                        常见问题
                      </a>
                    </li>
                    <li>
                      <a href="/forum/cate_10.html">
                        经验分享
                      </a>
                    </li>
                    <li>
                      <a href="/forum/cate_11.html">
                        晒收入
                      </a>
                    </li>
                    <li>
                      <a href="/forum/cate_12.html">
                        提问题
                      </a>
                    </li>
                    <li>
                      <a href="/forum/cate_13.html">
                        文章共推
                      </a>
                    </li>
                    <li>
                      <a href="/forum/cate_14.html">
                        网站公告
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
                    频道
                  </span>
                </a>
              </li>
              <li class="vertical pub">
              <?php $tmp = array('url'=>'/help/bonus.html','title'=>'发文赚钱');
              if($uinfo['uid']){
               $tmp['url'] = '/my/postcreate.html';$tmp['title'] = '发表文章';
              }?>
                <a class="center ui_btn ui_btn_green f12" href="<?php echo $tmp['url'];?>">
                  <span class="ui_icon ui_icon15 ui_icon15_edit mr5">
                  </span>
                  <span class="vm">
                    <?php echo $tmp['title'];?>
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </header>
