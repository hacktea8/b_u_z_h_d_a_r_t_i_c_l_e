<!-- container -->
<div id="container" class="clearfix">
  <!-- index_main -->
  <div class="index_main clearfix">
    <!-- main -->
    <div class="main fl">
      <!-- main_wrap -->
      <div class="main_wrap">
        <!-- hot_stories -->
        <div class="hot_stories mt20" id="column_hot">
          <div class="title">
            <h2 class="fcEm5 fb">
              熱門文章
            </h2>
          </div>
          <div class="content">
            <ul class="ui_list3">
<?php foreach($indexData['hot'] as $v){?>
              <li class="entry" share_count="<?php echo $v['share_count'];?>" s-facebook="<?php echo $v['share_fb_count'];?>" s-google="<?php echo $v['share_google_count'];?>" s-linkin="0"
              s-twitter="0">
                <div class="img ui_imgbg">
                  <a title="<?php echo $v['title'];?>" href="<?php echo $v['url'];?>">
                    <img src="<?php echo $v['pic'];?>" />
                  </a>
                  <a class="tips triangle" href="<?php echo $cate_info[$v['cid']]['url'];?>">
                    <?php echo $cate_info[$v['cid']]['title'];?>
                  </a>
                </div>
                <div class="content">
                  <h2 class="mt5 entry-title">
                    <a class="fcEm8" title="<?php echo $v['title'];?>" href="<?php echo $v['url'];?>">
                      <?php echo $v['title'];?>
                    </a>
                  </h2>
                  <p class="mt5 share_stub">
                    <span class="ui_icon ui_icon20 ui_icon20_share">
                    </span>
                    <span class="fb vm">
                     <?php echo $v['share_count'];?>
                    </span>
                    <span class="vm">
                      次分享
                    </span>
                  </p>
                </div>
              </li>
<?php }?>
            </ul>
          </div>
        </div>
        <!-- end hot_stories -->
      </div>
      <!-- end main_wrap -->
    </div>
    <!-- end main -->
    <!-- sidebar -->
    <div class="sidebar_l fl">
      <!-- ui_list -->
      <div class="ui_list ui_blockbg mt20" id="column_new">
        <div class="ui_list_title">
          <h2>
            最新文章
          </h2>
        </div>
        <ul>
          <!-- loop list -->
<?php foreach($indexData['new'] as $v){?>
          <li class="entry" share_count="<?php echo $v['share_count'];?>" s-facebook="<?php echo $v['share_fb_count'];?>">
            <div class="img ui_imgbg">
              <a title="<?php echo $v['title'];?>" href="<?php echo $v['url'];?>">
                <img src="<?php echo $v['pic'];?>" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="<?php echo $v['title'];?>" href="<?php echo $v['url'];?>">
                  <?php echo $v['title'];?>
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                <?php echo $v['share_count'];?>
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                <?php echo $v['time_ago'];?>
                </span>
              </p>
            </div>
          </li>
<?php }?>
          <!-- end loop list -->
        </ul>
      </div>
      <!-- end ui_list -->
    </div>
    <!-- end sidebar -->
    <!-- sidebar -->
    <div class="sidebar_r fl">
      <!-- index_reg -->
<?php if($uinfo['uid']){?>
      <div class="index_login ui_blockbg mt20">
        <div class="index_login_top">
          <h4 class="p20">
            歡迎你，
            <span class="fcEm7">
              1187247901
            </span>
          </h4>
          <p>
            今天收益：US $
            <span class="fcEm6 fb">
              0
            </span>
          </p>
          <p>
            昨天收益：US $0
          </p>
          <p>
            今日點閱數：
            <span class="fcEm7 fb">
              0
            </span>
          </p>
          <p>
            昨日點閱數：
            <span class="fcEm7 fb">
              0
            </span>
          </p>
          <!-- <p>
          30日點閱數：<span class="fcEm7 fb">0</span>
          </p> -->
          <p>
            <a href="/console/earnings.html" class="fcEm7 ul mr5">
              收益報告
            </a>
            <a href="/console/recruit.html" class="fcEm7 ul mr5">
              下线會員
            </a>
            <a href="/console/index.html" class="fcEm7 ul mr5">
              會員中心
            </a>
            <a href="<?php echo $uinfo['url'];?>" class="fcEm7 ul mr5">
              我的频道
            </a>
          </p>
        </div>
        <div class="index_login_bottom">
          <p class="user">
            <span class="ui_icon ui_icon_level ui_icon_level0">
            </span>
            <span class="vm">
            <?php echo $writerGroup[$uinfo['wid']]['title'];?>
            </span>
          </p>
          <div class="exp">
            <p class="tc f12">
              <?php echo $uinfo['level_point'];?>個點閱後升級
            </p>
            <div class="ui_progress_bar mt10">
              <div style="width:0%;" class="bar_bg">
              </div>
              <div class="bar_text rc5">
                <?php echo $uinfo['level_per'];?>%
              </div>
            </div>
          </div>
        </div>
        <a class="btn mt5 ml20 mr20 rc5" href="/console/postcreate.html">
          現在去發文
        </a>
      </div>
<?php }else{?>
<div class="index_reg ui_blockbg mt20">
  <h2 class="f20 title">
    <span class="fcEm2 fb">
    <?php echo $site_name;?>
    </span>
    讓您擁有自己的線上頻道，給您現金收益。
  </h2>
  <div class="index_reg_main">
    <div class="index_reg_block vertical2">
      <div class="hack">
        <div class="centered">
          <div class="content vertical rc5">
            <div class="center f16">
              發表精彩文章
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="index_reg_block vertical2">
      <div class="hack">
        <div class="centered">
          <div class="content vertical rc5">
            <div class="center f16">
              推廣您的文章
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="index_reg_block vertical2">
      <div class="hack">
        <div class="centered">
          <div class="content vertical rc5">
            <div class="center f16">
              賺取現金
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a class="btn mt10 mr20 ml20 rc5" href="/user/register.html">
    我要成為網站作者
  </a>
</div>
<?php }?>
      <!-- index_reg -->
      <!-- ui_sidebar -->
      <div class="ui_sidebar mt20" id="ui_rank">
        <div class="title">
          <h2>
            作者排行榜
          </h2>
        </div>
        <div class="ui_rank ui_blockbg">
          <ul class="menu">
            <li onclick="Com.fnSwitchTab({target: this, childId:'#ui_rank_attention'});"
            class="cur">
              本月最受關注
            </li>
            <li onclick="Com.fnSwitchTab({target: this, childId:'#ui_rank_active'});"
            datatype="active" class="">
              本月最活躍
            </li>
          </ul>
          <div class="content">
            <ul id="ui_rank_attention" style="display: block;">
              <!-- loop list -->
<?php foreach($indexData['month_attention'] as $v){?>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>">
                    <img src="<?php echo $v['pic'];?>" alt="<?php echo $v['title'];?>">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="<?php echo $v['url'];?>">
                    <?php echo $v['title'];?>
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    點閱數：<?php echo $v['month_click'];?>
                  </p>
                </div>
              </li>
<?php }?>
            </ul>
            <ul class="none" id="ui_rank_active" style="display: none;">
              <!-- loop list -->
<?php foreach($indexData['month_active'] as $v){?>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="<?php echo $v['url'];?>">
                    <img src="<?php echo $v['pic'];?>" alt="<?php echo $v['title'];?>">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="<?php echo $v['url'];?>">
                    <?php echo $v['title'];?>
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    發文數：<?php echo $v['post_count'];?>
                  </p>
                </div>
              </li>
<?php }?>
            </ul>
          </div>
        </div>
      </div>
      <!-- end ui_sidebar -->
      <!-- ui_list -->
      <div class="ui_list ui_blockbg mt20" id="column_original">
        <div class="ui_list_title">
          <h2>
            精彩文章
          </h2>
          <a class="more f12 fcEm" href="/article/original.html">
            <span class="vm">
              More
            </span>
            <span class="ui_icon ui_icon15 ui_icon15_add">
            </span>
          </a>
        </div>
        <ul>
          <!-- loop list -->
<?php foreach($indexData['wonderfull'] as $v){?>
          <li class="entry" share_count="<?php echo $v['share_count'];?>" s-facebook="<?php echo $v['share_fb_count'];?>">
            <div class="img ui_imgbg">
              <a title="<?php echo $v['title'];?>" href="<?php echo $v['url'];?>">
                <img src="<?php echo $v['pic'];?>" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="<?php echo $v['title'];?>" href="<?php echo $v['url'];?>">
                  <?php echo $v['title'];?>
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  <?php echo $v['share_count'];?>
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                 <?php echo $v['time_ago'];?>
                </span>
              </p>
            </div>
          </li>
<?php }?>
          <!-- end loop list -->
        </ul>
      </div>
      <!-- end ui_list -->
    </div>
    <!-- end sidebar -->
  </div>
  <!-- end index_main -->
  <div class="ajaxLoad">
  </div>
</div>
<!-- end container -->
<script type="text/javascript">
  $(document).ready(function() {
    curPage = 1;
    ajaxLoad = true;
    var oldMethod = window.onscroll;
    window.onscroll = function() { (typeof oldMethod === "function") && oldMethod.call(this);
      if (Com.fnIsNearBottom({
        target: "#container"
      })) {
        Com.fnGetMore({
          maxPage: 5,
          pageType: "column",
          loadId: $(".ajaxLoad"),
          moreUrl: "/"
        });
      }
    };
  });
</script>
