<!-- container -->
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
        熱門頻道
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
              <a href="/channel/index.html">
                熱門頻道
              </a>
            </li>
            <li class="nav_l ">
              <a href="/channel/index/follow_count">
                訂閱最多
              </a>
            </li>
            <li class="nav_l ">
              <a href="/channel/index/post_count">
                文章最多
              </a>
            </li>
            <li class="nav_l ">
              <a href="/channel/index/new">
                最新頻道
              </a>
            </li>
            <li class="nav_r grids cur">
              <a rel="nofollow" href="/channel/index.html?show=grids">
                宮格顯示
              </a>
            </li>
            <li class="nav_r list ">
              <a rel="nofollow" href="/channel/index.html?show=lists">
                列表顯示
              </a>
            </li>
          </ul>
        </div>
        <!-- end article_list_top -->
        <!-- article_list grids -->
        <div class="article_list grids2">
          <!-- ui_list2 -->
          <ul class="ui_list2 clearfix">
            <!-- loop list -->
<?php foreach($lists as $v){?>
            <li class="fcEm2 pr ui_imgbg" onclick="window.location.href='<?php echo $v['url'];?>'">
              <a>
                <img src="<?php echo $v['pic'];?>" height="160" width="160" />
              </a>
              <h3 class="title">
                <?php echo $v['title'];?>
              </h3>
              <div class="content_wrap">
                <div class="content vertical2">
                  <div class="hack">
                    <div class="centered">
                      <a href="<?php echo $v['url'];?>">
                        <h3 class="fcEm5">
                          <?php echo $v['title'];?>
                        </h3>
                        <p class="fcEm4 mt5">
                          <?php echo $v['intro'];?>
                        </p>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </li>
<?php }?>
            <!-- end loop list -->
          </ul>
          <!-- end ui_list2 -->
          <div class="ui_pagination m20 tc">
            <div class="pager">
              <a class="ui_pagination_first hidden" href="/channel/index.html">
              </a>
              <a class="ui_pagination_pre hidden" href="/channel/index.html">
                上一頁
              </a>
              <a class="ui_pagination_nums on" href="/channel/index.html">
                1
              </a>
              <a class="ui_pagination_nums" href="/channel/index.html?page=2">
                2
              </a>
              <a class="ui_pagination_nums" href="/channel/index.html?page=3">
                3
              </a>
              <a class="ui_pagination_nums" href="/channel/index.html?page=4">
                4
              </a>
              <a class="ui_pagination_nums" href="/channel/index.html?page=5">
                5
              </a>
              <a class="ui_pagination_nums" href="/channel/index.html?page=6">
                6
              </a>
              <a class="ui_pagination_nums" href="/channel/index.html?page=7">
                7
              </a>
              <a class="ui_pagination_nums" href="/channel/index.html?page=8">
                8
              </a>
              <a class="ui_pagination_nums" href="/channel/index.html?page=9">
                9
              </a>
              <a class="ui_pagination_nums" href="/channel/index.html?page=10">
                10
              </a>
              <a class="ui_pagination_next" href="/channel/index.html?page=2">
                下一頁
              </a>
              <a class="ui_pagination_last" href="/channel/index.html?page=25">
              </a>
            </div>
          </div>
        </div>
        <!-- end article_list grids -->
      </div>
      <!-- end main_wrap -->
    </div>
    <!-- end main -->
    <!-- sidebar -->
    <div class="sidebar fl ui_blockbg">
      <!-- ui_list3 -->
      <div class="ui_list3 hot_posts">
        <h2 class="title">
          熱門文章
        </h2>
        <ul>
          <!-- loop list -->
<?php foreach($hotArticle as $v){?>
          <li class="entry" share_count="498" s-facebook="486">
            <div class="img ui_imgbg">
              <a title="<?php echo $v['title'];?>" href="<?php echo $v['url'];?>">
                <img src="<?php echo $v['pic'];?>">
              </a>
              <a class="tips" href="<?php echo $cate_info[$v['cid']]['url'];?>">
                <?php echo $cate_info[$v['cid']]['title'];?>
              </a>
            </div>
            <div class="content">
              <h3 class="mt5 entry-title">
                <a class="fcEm8" href="<?php echo $v['url'];?>" target="_blank">
                  <?php echo $v['title'];?>
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  498
                </span>
                <span class="vm">
                  次分享
                </span>
              </p>
            </div>
          </li>
<?php }?>
          <!-- end loop list -->
        </ul>
      </div>
      <!-- end ui_list3 -->
    </div>
    <!-- end sidebar -->
  </div>
</div>
