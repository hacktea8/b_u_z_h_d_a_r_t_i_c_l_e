<div id="container" class="clearfix">
  <!-- article_wrap -->
  <div class="article_wrap channel ">
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
      <a class="fcEm3" href="/channel/index.html">
        頻道
      </a>
      <span>
        &gt;
      </span>
      <a class="fcEm3">
        <?php echo $channel['title'];?>
      </a>
    </div>
    <!-- end breadcrumbs -->
    <!-- channel_info -->
    <div class="channel_info ui_blockbg clearfix pr">
      <div class="img ui_imgbg mr20 ui_user_img pr vt" id="channelLogo">
        <a>
          <img src="<?php echo $channel['pic'];?>">
        </a>
      </div>
      <div class="content vt">
        <h2 class="fb">
          <?php echo $channel['title'];?>
        </h2>
        <p><?php echo $channel['intro'];?></p>
        <div class="mt20">
          <a class="ui_btn ui_btn_white" href="#" id="yt0">
            <span class="ui_icon ui_icon15 ui_icon15_article">
            </span>
            <span class="vm" id="follow2">
              訂閱
            </span>
          </a>
          <a class="ui_btn ui_btn_white" rel="nofollow" href="/message/sendletter/<?php echo $channel['uid'];?>">
            <span class="ui_icon ui_icon15 ui_icon15_mail">
            </span>
            <span class="vm">
              私信
            </span>
          </a>
          <a class="ui_btn ui_btn_white" rel="nofollow" href="/rss/user/<?php echo $channel['uid'];?>">
            <span class="ui_icon ui_icon15 ui_icon15_rss2">
            </span>
            <span class="vm">
              RSS
            </span>
          </a>
        </div>
      </div>
      <ul class="channel_info_block clearfix m20 vt">
        <li>
          <p>
            <span class="fcEm4 mr5">
              文章
            </span>
            <span class="fcEm3 f24 fb">
              <?php echo $channel['post_count'];?>
            </span>
          </p>
          <p class="mt20">
            <span class="fcEm4 mr5">
              訪客
            </span>
            <span class="fcEm3 f24 fb">
              <?php echo $channel['hits'];?>
            </span>
          </p>
        </li>
        <li>
          <p>
            <span class="fcEm4 mr5">
              點閱
            </span>
            <span class="fcEm3 f24 fb">
              <?php echo $channel['click_count'];?>
            </span>
          </p>
          <p class="mt20">
            <span class="fcEm4 mr5">
              訂閱
            </span>
            <span class="fcEm3 f24 fb">
              <?php echo $channel['subscribe_count'];?>
            </span>
          </p>
        </li>
      </ul>
    </div>
    <!-- end channel_info -->
    <div class="ui_blockbg mt20">
      <!-- channel_sublist -->
      <div class="channel_subnav clearfix">
        <div class="channel_subnav_l fl">
          <div class="channel_subnav_m">
            <a <?php if( !$cid){?>class="on"<?php }?> href="<?php echo $channel['url'];?>">
              全部
            </a>
<?php foreach($userCate as $v){?>
            <a <?php if( $cid == $v['cid']){?>class="on"<?php }?> href="<?php echo $v['url'];?>">
              <?php echo $v['title'];?>
            </a>
<?php }?>
          </div>
        </div>
        <div class="channel_subnav_r fr clearfix">
          <a class="new <?php if('new' == $order){ echo 'cur';?>" href="<?php echo $channel['url'];?>">
            最新發佈
          </a>
          <a rel="nofollow" class="hot <?php if('new' == $order){ echo 'cur';?>" href="<?php echo $channel['url'];?>">
            人氣最旺
          </a>
        </div>
      </div>
      <!-- end channel_sublist -->
      <!-- channel_list -->
      <div class="channel_list ui_list3">
        <ul class="clearfix">
          <!-- loop list -->
<?php foreach($lists as $v){?>
          <li class="entry" share_count="0" s-facebook="0" s-google="0">
            <div class="img ui_imgbg">
              <a href="<?php echo $v['url'];?>">
                <img src="<?php echo $v['pic'];?>">
              </a>
            </div>
            <div class="content">
              <h2 class="mt5 entry-title">
                <a class="fcEm8" href="<?php echo $v['url'];?>">
                  <?php echo $v['title'];?>
                </a>
              </h2>
              <p class="share_stub" style="display: block;">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
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
      <div class="ui_pagination m20 tc">
        <div class="pager">
          <a class="ui_pagination_first hidden" href="/BBOY">
          </a>
          <a class="ui_pagination_pre hidden" href="/BBOY">
            上一頁
          </a>
          <a class="ui_pagination_nums on" href="/BBOY">
            1
          </a>
          <a class="ui_pagination_nums" href="/BBOY?page=2">
            2
          </a>
          <a class="ui_pagination_nums" href="/BBOY?page=3">
            3
          </a>
          <a class="ui_pagination_nums" href="/BBOY?page=4">
            4
          </a>
          <a class="ui_pagination_nums" href="/BBOY?page=5">
            5
          </a>
          <a class="ui_pagination_nums" href="/BBOY?page=6">
            6
          </a>
          <a class="ui_pagination_nums" href="/BBOY?page=7">
            7
          </a>
          <a class="ui_pagination_nums" href="/BBOY?page=8">
            8
          </a>
          <a class="ui_pagination_nums" href="/BBOY?page=9">
            9
          </a>
          <a class="ui_pagination_nums" href="/BBOY?page=10">
            10
          </a>
          <a class="ui_pagination_next" href="/BBOY?page=2">
            下一頁
          </a>
          <a class="ui_pagination_last" href="/BBOY?page=48">
          </a>
        </div>
      </div>
      <!-- end channel_list -->
    </div>
  </div>
  <!-- end article_wrap -->
</div>
