<div id="container" class="clearfix">
  <!-- article_wrap -->
  <div class="article_wrap">
    <!-- breadcrumbs -->
    <div class="ui_breadcrumbs">
      <a class="fcEm3" href="/">
        <span class="ui_icon ui_icon15 ui_icon15_home">
        </span>
        <span class="vm">
          首頁
        </span>
      </a>
      <span>
        &gt;
      </span>
      <a class="fcEm3">
        熱門文章
      </a>
    </div>
    <!-- end breadcrumbs -->
    <!-- main -->
    <div class="main fl">
      <!-- main_wrap -->
      <div class="main_wrap ui_blockbg">
        <!-- article_list_top -->
        <div class="article_list_top">
          <ul class="nav clearfix">
            <li class="nav_l on">
              <a rel="nofollow" href="/article/hots/daily">今天</a>
            </li>
            <li class="nav_l">
              <a rel="nofollow" href="/article/hots/weekly">本周</a>
            </li>
            <li class="nav_l">
              <a rel="nofollow" href="/article/hots/monthly">本月</a>
            </li>
            <li class="nav_l">
              <a href="/article/hots.html">全部</a>
            </li>
            <li class="nav_r grids">
              <a rel="nofollow" href="/article/hots/<?php echo $date;?>/box">
                宮格顯示
              </a>
            </li>
            <li class="nav_r list cur">
              <a href="/article/hots/<?php echo $date;?>">
                列表顯示
              </a>
            </li>
          </ul>
        </div>
        <!-- end article_list_top -->
        <!-- article_list list -->
        <div class="article_list ui_list list" id="article_list">
          <!-- ui_list -->
          <ul>
            <!-- loop list -->
<?php foreach($hotList as $v){?>
            <li class="clearfix entry" share_count="<?php echo $v['share_count'];?>" s-facebook="21" s-google="14"
            s-linkin="0" s-twitter="0">
              <div class="img ui_imgbg">
                <a href="<?php echo $v['url'];?>">
                  <img src="<?php echo $v['pic'];?>" />
                </a>
              </div>
              <div class="content">
                <h2 class="entry-title">
                  <a class="fcEm8" href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>">
                    <?php echo $v['title'];?>
                  </a>
                </h2>
                <p class="mt5 fcEm4">
                  <a class="fcEm4" href="<?php echo $cate_info[$v['cid']]['url'];?>">
                   <?php echo $cate_info[$v['cid']]['title'];?>
                  </a>
                  /
                  <a class="fcEm7" href="<?php echo $v['uinfo']['url'];?>">
                    <?php echo $v['uinfo']['title'];?>
                  </a>
                  / 11小時前
                </p>
                <p class="mt5">
                  <?php echo $v['summary'];?>
                </p>
                <p class="share_stub">
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
          <!-- end ui_list -->
          <!-- <div class="tc m20">-->
          <!-- <a class="f22">-->
          <!-- <span class="ui_icon ui_icon35 ui_icon35_more"></span>-->
          <!-- 查看更多»-->
          <!-- </a>-->
          <!-- </div>-->
        </div>
        <!-- end article_list list -->
      </div>
      <!-- end main_wrap -->
      <div class="ajaxLoad">
      </div>
    </div>
    <!-- end main -->
    <!-- sidebar -->
    <div class="sidebar fl ui_blockbg">
      <!-- ui_list -->
      <!-- end ui_list -->
      <div class="ui_list ui_blockbg mb20">
        <div class="ui_list_title">
          <h2>
            原創文章
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
<?php foreach($originList as $v){?>
          <li class="entry" share_count="<?php echo $v['share_count'];?>" s-facebook="286">
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
                  20小時前
                </span>
              </p>
            </div>
          </li>
<?php }?>
          <!-- end loop list -->
        </ul>
      </div>
      <!-- ui_sidebar -->
      <!-- end ui_sidebar -->
    </div>
    <!-- end sidebar -->
  </div>
  <!-- end article_wrap -->
</div>
<!-- end container -->
<script>
  curPage = 1;
  ajaxLoad = true;
  Com.fnOnScroll(function() {
    if (Com.fnIsNearBottom({
      target: "#container"
    })) {
      Com.fnGetMore({
        wrapId: $("#article_list").find("ul"),
        pageType: "list",
        loadId: $(".ajaxLoad"),
        display: "list",
        moreUrl: "/article/hots/<?php echo $date;?>/<?php echo $display;?>"
      });
    }
  });
</script>
