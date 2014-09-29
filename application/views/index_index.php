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
              <li class="entry" share_count="493" s-facebook="481" s-google="12" s-linkin="0"
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
                      493
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
          <li class="entry" share_count="0" s-facebook="0">
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
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  剛剛
                </span>
              </p>
            </div>
          </li>
<?php }?>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
          </li>
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
            <a href="http://my.buzzhand.com/earnings.html" class="fcEm7 ul mr5">
              收益報告
            </a>
            <a href="http://my.buzzhand.com/recruit.html" class="fcEm7 ul mr5">
              下线會員
            </a>
            <a href="http://my.buzzhand.com/index.html" class="fcEm7 ul mr5">
              會員中心
            </a>
            <a href="/vb_code" class="fcEm7 ul mr5">
              我的频道
            </a>
          </p>
        </div>
        <div class="index_login_bottom">
          <p class="user">
            <span class="ui_icon ui_icon_level ui_icon_level0">
            </span>
            <span class="vm">
              書童
            </span>
          </p>
          <div class="exp">
            <p class="tc f12">
              100個點閱後升級
            </p>
            <div class="ui_progress_bar mt10">
              <div style="width:0%;" class="bar_bg">
              </div>
              <div class="bar_text rc5">
                0%
              </div>
            </div>
          </div>
        </div>
        <a class="btn mt5 ml20 mr20 rc5" href="http://my.buzzhand.com/postcreate.html">
          現在去發文
        </a>
      </div>
<?php }else{?>
<div class="index_reg ui_blockbg mt20">
  <h2 class="f20 title">
    <span class="fcEm2 fb">
      BuzzHand
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
  <a class="btn mt10 mr20 ml20 rc5" href="http://my.buzzhand.com/user/register.html">
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
              本周最受關注
            </li>
            <li onclick="Com.fnSwitchTab({target: this, childId:'#ui_rank_active'});"
            datatype="active" class="">
              本周最活躍
            </li>
          </ul>
          <div class="content">
            <ul id="ui_rank_attention" style="display: block;">
              <!-- loop list -->
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/SexyGirLs">
                    <img src="/uploads/user/1/14085519961943.png">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/SexyGirLs">
                      Sexy & GirL's
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    點閱數：322392
                  </p>
                </div>
              </li>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/channel_1375.html">
                    <img src="/uploads/user/3/14097378057190.jpg">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/channel_1375.html">
                      鳳梨小公主
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    點閱數：238010
                  </p>
                </div>
              </li>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/channel_1859.html">
                    <img src="/uploads/user/4/14104236259725.jpg">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/channel_1859.html">
                      旺旺前輩
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    點閱數：196560
                  </p>
                </div>
              </li>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/channel_1181.html">
                    <img src="/uploads/user/3/14095358485348.jpg">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/channel_1181.html">
                      bestrade_store
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    點閱數：166727
                  </p>
                </div>
              </li>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/BBOY">
                    <img src="/uploads/user/2/14090617572828.jpg">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/BBOY">
                      BBA
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    點閱數：115013
                  </p>
                </div>
              </li>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/channel_656.html">
                    <img src="/uploads/user/2/14112018386133.gif">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/channel_656.html">
                      书生
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    點閱數：92019
                  </p>
                </div>
              </li>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/dayanzi">
                    <img src="/uploads/user/1/1411757628230.jpg">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/dayanzi">
                      大燕子の分享
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    點閱數：86651
                  </p>
                </div>
              </li>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/channel_2293.html">
                    <img src="/uploads/user/5/14104877823737.jpg">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/channel_2293.html">
                      a0931209901
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    點閱數：78258
                  </p>
                </div>
              </li>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/channel_3628.html">
                    <img src="https://graph.facebook.com/1473372842929629/picture?type=large">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/channel_3628.html">
                      蓝色的忧郁
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    點閱數：65268
                  </p>
                </div>
              </li>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/channel_1686.html">
                    <img src="/uploads/user/4/14099906618087.jpg">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/channel_1686.html">
                      八卦女人区
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    點閱數：65148
                  </p>
                </div>
              </li>
              <!-- end loop list -->
            </ul>
            <ul class="none" id="ui_rank_active" style="display: none;">
              <!-- loop list -->
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/yunfan">
                    <img src="/uploads/user/1/14083603047637.jpg">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/yunfan">
                      风高云淡
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    發文數：976
                  </p>
                </div>
              </li>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/caomunianhua">
                    <img src="/themes/default/images/user_img_def.png">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/caomunianhua">
                      827127896
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    發文數：822
                  </p>
                </div>
              </li>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/tai">
                    <img src="/uploads/user/3/141105431334.jpg">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/tai">
                      驅魔大師
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    發文數：698
                  </p>
                </div>
              </li>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/wwwyoukucomi">
                    <img src="/uploads/user/2/14114537265476.jpg">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/wwwyoukucomi">
                      加勒比奶酪
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    發文數：492
                  </p>
                </div>
              </li>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/tianxiazatan">
                    <img src="/uploads/user/2/14107952007920.gif">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/tianxiazatan">
                      天下雜談
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    發文數：366
                  </p>
                </div>
              </li>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/tomhua">
                    <img src="/uploads/user/1/14085954645081.jpg">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/tomhua">
                      tomhua
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    發文數：338
                  </p>
                </div>
              </li>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/channel_2112.html">
                    <img src="/themes/default/images/user_img_def.png">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/channel_2112.html">
                      2414687180
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    發文數：327
                  </p>
                </div>
              </li>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/channel_1537.html">
                    <img src="/uploads/user/4/14100568034021.jpg">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/channel_1537.html">
                      490594982
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    發文數：284
                  </p>
                </div>
              </li>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/channel_45.html">
                    <img src="/uploads/channel/1/14118624397941.jpg">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/channel_45.html">
                      ￣伊人輕笑、嬌嬈的紅顏
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    發文數：278
                  </p>
                </div>
              </li>
              <li class="fcEm2 pr">
                <div class="img ui_imgbg">
                  <a href="/BBOY">
                    <img src="/uploads/user/2/14090617572828.jpg">
                  </a>
                </div>
                <div class="content">
                  <h3>
                    <a class="fcEm" href="/BBOY">
                      BBA
                    </a>
                  </h3>
                  <p class="fcEm4 mt5">
                    發文數：275
                  </p>
                </div>
              </li>
              <!-- end loop list -->
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
          <a class="more f12 fcEm" href="/post/original.html">
            <span class="vm">
              More
            </span>
            <span class="ui_icon ui_icon15 ui_icon15_add">
            </span>
          </a>
        </div>
        <ul>
          <!-- loop list -->
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="全球最好用的護照 新加坡第二名，第一的竟然是...！" href="/post_134912.html">
                <img src="/uploads/86/8/134912/thumb_134912_80x80.jpg" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="全球最好用的護照 新加坡第二名，第一的竟然是...！" href="/post_134912.html">
                  全球最好用的護照 新加坡第二名，第一的竟然是...！...
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  1小時前
                </span>
              </p>
            </div>
          </li>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="萬人瘋傳! 放置一顆沒有剝皮的洋蔥在房間里！我也是剛剛才知道，趕緊轉出去！" href="/post_134861.html">
                <img src="/uploads/28/3/134861/thumb_134861_80x80.jpg" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="萬人瘋傳! 放置一顆沒有剝皮的洋蔥在房間里！我也是剛剛才知道，趕緊轉出去！" href="/post_134861.html">
                  萬人瘋傳! 放置一顆沒有剝皮的洋蔥在房間里！我也是剛剛...
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  1小時前
                </span>
              </p>
            </div>
          </li>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="馬雲送給他兒子的三句話及十三句經典語錄，看到第三句你就明白了" href="/post_134892.html">
                <img src="/uploads/b0/9/134892/thumb_134892_80x80.jpg" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="馬雲送給他兒子的三句話及十三句經典語錄，看到第三句你就明白了" href="/post_134892.html">
                  馬雲送給他兒子的三句話及十三句經典語錄，看到第三句你...
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  1小時前
                </span>
              </p>
            </div>
          </li>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="誰還沒有個損友" href="/post_134615.html">
                <img src="/uploads/08/4/134615/thumb_134615_80x80.jpg" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="誰還沒有個損友" href="/post_134615.html">
                  誰還沒有個損友
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  2小時前
                </span>
              </p>
            </div>
          </li>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="台灣都城隍廟前發生情殺案 恐怖情人砍人後自殘" href="/post_134468.html">
                <img src="/uploads/6a/a/134468/thumb_134468_80x80.jpg" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="台灣都城隍廟前發生情殺案 恐怖情人砍人後自殘" href="/post_134468.html">
                  台灣都城隍廟前發生情殺案 恐怖情人砍人後自殘...
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  4小時前
                </span>
              </p>
            </div>
          </li>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="有了這些被罩，晚上你能睡個好覺嗎？" href="/post_134788.html">
                <img src="/uploads/be/4/134788/thumb_134788_80x80.jpg" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="有了這些被罩，晚上你能睡個好覺嗎？" href="/post_134788.html">
                  有了這些被罩，晚上你能睡個好覺嗎？
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  1小時前
                </span>
              </p>
            </div>
          </li>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="想當老闆的人必看！看完你就開竅了 分享給身邊的朋友吧" href="/post_134845.html">
                <img src="/uploads/e9/9/134845/thumb_134845_80x80.jpg" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="想當老闆的人必看！看完你就開竅了 分享給身邊的朋友吧" href="/post_134845.html">
                  想當老闆的人必看！看完你就開竅了 分享給身邊的朋友吧...
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  1小時前
                </span>
              </p>
            </div>
          </li>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="台灣88歲老伯為愛入贅67年：在一起最重要（圖）" href="/post_134470.html">
                <img src="/uploads/3e/1/134470/thumb_134470_80x80.jpg" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="台灣88歲老伯為愛入贅67年：在一起最重要（圖）" href="/post_134470.html">
                  台灣88歲老伯為愛入贅67年：在一起最重要（圖）...
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  4小時前
                </span>
              </p>
            </div>
          </li>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="柳岩穿小短裙扮少女 小腿紋身曝光" href="/post_134624.html">
                <img src="/uploads/a5/b/134624/thumb_134624_80x80.jpg" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="柳岩穿小短裙扮少女 小腿紋身曝光" href="/post_134624.html">
                  柳岩穿小短裙扮少女 小腿紋身曝光
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  2小時前
                </span>
              </p>
            </div>
          </li>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="女子體型較大林中拾果被誤當動物狩獵 臀部中槍" href="/post_134764.html">
                <img src="/uploads/58/e/134764/thumb_134764_80x80.jpg" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="女子體型較大林中拾果被誤當動物狩獵 臀部中槍" href="/post_134764.html">
                  女子體型較大林中拾果被誤當動物狩獵 臀部中槍...
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  2小時前
                </span>
              </p>
            </div>
          </li>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="Facebook上最讓人看笑話的年輕夫妻 陳*慧 &amp;amp; 張*威" href="/post_134829.html">
                <img src="/uploads/d7/b/134829/thumb_134829_80x80.jpg" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="Facebook上最讓人看笑話的年輕夫妻 陳*慧 &amp;amp; 張*威" href="/post_134829.html">
                  Facebook上最讓人看笑話的年輕夫妻 陳*慧 &amp; 張*威...
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  1小時前
                </span>
              </p>
            </div>
          </li>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="決定命運的八大理念" href="/post_134839.html">
                <img src="/uploads/b4/5/134839/thumb_134839_80x80.jpg" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="決定命運的八大理念" href="/post_134839.html">
                  決定命運的八大理念
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  1小時前
                </span>
              </p>
            </div>
          </li>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="★九皇爺的由來！有六個版本！每一個都來頭不小！長知識瞭！" href="/post_134870.html">
                <img src="/uploads/ca/6/134870/thumb_134870_80x80.jpg" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="★九皇爺的由來！有六個版本！每一個都來頭不小！長知識瞭！" href="/post_134870.html">
                  ★九皇爺的由來！有六個版本！每一個都來頭不小！長知識...
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  1小時前
                </span>
              </p>
            </div>
          </li>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="大陸學生參加台灣島內健保 港媒：遲來的福利" href="/post_134478.html">
                  大陸學生參加台灣島內健保 港媒：遲來的福利...
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  4小時前
                </span>
              </p>
            </div>
          </li>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="獲得年薪百萬之前，他們都做什麼工作？" href="/post_134746.html">
                <img src="/uploads/df/3/134746/thumb_134746_80x80.jpg" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="獲得年薪百萬之前，他們都做什麼工作？" href="/post_134746.html">
                  獲得年薪百萬之前，他們都做什麼工作？...
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  2小時前
                </span>
              </p>
            </div>
          </li>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="又一廈大校草爆紅啦！廈大暖男被贊奶茶哥" href="/post_134625.html">
                <img src="/uploads/15/5/134625/thumb_134625_80x80.jpg" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="又一廈大校草爆紅啦！廈大暖男被贊奶茶哥" href="/post_134625.html">
                  又一廈大校草爆紅啦！廈大暖男被贊奶茶哥...
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  2小時前
                </span>
              </p>
            </div>
          </li>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="難道這就是哮天犬？" href="/post_134798.html">
                <img src="/uploads/53/8/134798/thumb_134798_80x80.jpg" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="難道這就是哮天犬？" href="/post_134798.html">
                  難道這就是哮天犬？
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  1小時前
                </span>
              </p>
            </div>
          </li>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="★ 栢芝哭訴心聲：我的路很苦" href="/post_134849.html">
                <img src="/uploads/98/3/134849/thumb_134849_80x80.jpg" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="★ 栢芝哭訴心聲：我的路很苦" href="/post_134849.html">
                  ★ 栢芝哭訴心聲：我的路很苦
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  1小時前
                </span>
              </p>
            </div>
          </li>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="想當老闆的人請慢慢看...看完你就開竅瞭！覺得有用就分享吧！ 謝謝！~" href="/post_134920.html">
                <img src="/uploads/98/a/134920/thumb_134920_80x80.jpg" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="想當老闆的人請慢慢看...看完你就開竅瞭！覺得有用就分享吧！ 謝謝！~" href="/post_134920.html">
                  想當老闆的人請慢慢看...看完你就開竅瞭！覺得有用就分...
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  1小時前
                </span>
              </p>
            </div>
          </li>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="日本雙馬尾萌妹走紅網路 身高154cm清純可愛" href="/post_134971.html">
                <img src="/uploads/e1/f/134971/thumb_134971_80x80.jpg" />
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" title="日本雙馬尾萌妹走紅網路 身高154cm清純可愛" href="/post_134971.html">
                  日本雙馬尾萌妹走紅網路 身高154cm清純可愛...
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  57分鐘前
                </span>
              </p>
            </div>
          </li>
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
