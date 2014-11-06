<div id="container" class="clearfix">
  <!-- adsense_ad_place1 -->
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
<?php foreach($top_channel as $k){?>
      <span>
        &gt;
      </span>
      <a class="fcEm3" href="<?php echo $cate_info[$k]['url'];?>">
        <?php echo $cate_info[$k]['title'];?>
      </a>
<?php }?>
      <div id="ac_place_grey" style="display:none">
      </div>
    </div>
    <!-- end breadcrumbs -->
    <!-- main -->
    <div class="main fl">
      <!-- main_wrap -->
      <div class="main_wrap ui_blockbg">
        <!-- details -->
        <article class="post">
          <!-- fb_adsense_ad_place2 -->
          <!-- ui_title -->
          <div class="ui_title">
            <!-- fb_ysm_ad_place1 -->
            <div class="clearfix pr">
              <h1 class="f22 fb fcEm8">
                <?php echo $info['title'];?>
              </h1>
            </div>
            <!-- title_tool -->
            <div class="mt5">
              <ul class="post_meta">
                <li>
                  <a class="fr" href="<?php echo $info['uinfo']['url'];?>">
                    <span class="ui_icon ui_icon_level ui_icon_level0">
                    </span>
                    <span class="vm ml5">
                      <?php echo $info['uinfo']['title'];?>
                    </span>
                  </a>
                </li>
                <li class="fcEm4">
                  <span class="mr5">
                    |
                  </span>
                  <?php echo date('Y-m-d',$info['utime']);?>
                </li>
                <li class="fcEm4">
                  <span class="mr5">
                    |
                  </span>
                  <a href="#" id="yt0">
                    檢舉
                  </a>
                </li>
                <li class="fcEm4">
                  <span class="mr5">
                    |
                  </span>
                  <a title="點閱數" target="_blank">
                    <span class="ui_icon ui_icon20 ui_icon20_view">
                    </span>
                    <span class="vm">
                      <?php echo $info['hits']?>
                    </span>
                  </a>
                </li>
                <li class="fcEm4">
                  <a title="被分享次數" target="_blank">
                    <span class="ui_icon ui_icon15 ui_icon15_share2">
                    </span>
                    <span class="vm">
                      <?php echo $info['share_count'];?>
                    </span>
                  </a>
                </li>
                <li class="share_block">
                </li>
              </ul>
            </div>
            <!-- end title_tool -->
          </div>
          <!-- end ui_title -->
          <div id="article-item-box_static" style="height:0px;width:100%;"></div>
          <!-- content -->
          <div id="detailContent" class="content p20" style="border-bottom: none;">
            <!-- ysm_ad_place1 -->
            <!-- adsense_ad_place2 -->
            <div id="articleContent" class="detail f16 fcEm8 lh32">
            <?php echo $info['intro'];?>
            </div>
            <!-- ysm_ad_place4 -->
          </div>
          <!-- end content -->
          <!-- share -->
          <div id="afterContent" class="share p10 pr20">
            <div class="ml5">
              <a class="ui_btn ui_btn_blue ml5 mr5 fb_aftercontent" 
              style="padding:10px 0 5px;font-size:18px;width: 60%">
                <span class="ui_icon ui_icon_third20 ui_icon_third20_f" style="margin-right:4px">
                </span>
                喜歡這篇文章嗎？快分享吧！
              </a>
            </div>
            <div class="ml5">
             <a title="Share on Google+" href="https://plus.google.com/share?url=<?php echo $info['url'];?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');updateArticleShareCount('gs',<?php echo $info['id'];?>);return false;"><img src="<?php echo $cdn_url;?>/images/gplus-64.png" alt="Share on Google+"/></a>
             <a title="Share on Facebook" href="https://www.facebook.com/sharer.php?app_id=113869198637480&display=popup&u=<?php echo $info['url'];?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');updateArticleShareCount('fbs',<?php echo $info['id'];?>);return false;"><img src="<?php echo $cdn_url,'/images/fbshare.jpg';?>" alt="Share on FaceBook"/></a>
            </div>
          </div>
          <!-- end share -->
          <div id="ac_place_red" style="display:none">
          </div>
          <!-- adsense_ad_place3 -->
          <!-- ysm_ad_place3 -->
          <!-- fb-comments -->
          <div id="fb-comments-container">
            <div class="fb-comments" data-href="<?php echo $info['url'];?>"
            data-width="100%" data-num-posts="10">
            </div>
          </div>
          <!-- end fb-comments -->
          <!-- related posts -->
          <div class="related ui_list3">
            <h3 class="ml20 fcEm7">
              你也可能喜歡這些文章
            </h3>
            <ul>
              <!-- 6 loop list -->
<?php foreach($also_like as $v){?>
              <li>
                <div class="img ui_imgbg">
                  <a href="<?php echo $v['url'];?>">
                    <img src="<?php echo $v['pic'];?>">
                  </a>
                </div>
                <div class="content">
                  <h3 class="mt5">
                    <a class="fcEm8" href="<?php echo $v['url'];?>">
                      <?php echo $v['title'];?>
                    </a>
                  </h3>
                </div>
              </li>
<?php }?>
              <!-- end loop list -->
            </ul>
          </div>
          <!-- end related-->
          <!-- author -->
          <div class="author">
            <div class="title">
              <h2>
                作者
              </h2>
            </div>
            <div class="content">
              <ul>
                <li>
                  <div class="img ui_imgbg ui_user_img">
                    <a href="<?php echo $info['uinfo']['url'];?>">
                      <img src="<?php echo $info['uinfo']['pic'];?>" />
                    </a>
                  </div>
<?php if(0){?>
                  <div class="mt10">
                    <a class="ui_btn ui_btn_white" href="#" id="yt1">
                      <span class="ui_icon ui_icon15 ui_icon15_article">
                      </span>
                      <span class="vm" id="follow2">
                        訂閱
                      </span>
                    </a>
                    <a class="ui_btn ui_btn_white" href="/message/sendletter/<?php echo $info['uid'];?>">
                      <span class="ui_icon ui_icon15 ui_icon15_mail">
                      </span>
                      <span class="vm">
                        私信
                      </span>
                    </a>
                  </div>
<?php }?>
                </li>
                <li>
                  <div class="mb10">
                    <span class="vm mr10 fcEm7">
                      <a href="<?php echo $info['uinfo']['url'];?>">
                        <?php echo $info['uinfo']['title'];?>
                      </a>
                    </span>
                    <span class="ui_icon ui_icon_level ui_icon_level0">
                    </span>
                    <span class="vm">
                      <?php echo $writerGroup[$postUinfo['wid']]['title'];?>
                    </span>
                  </div>
                  <div class="post_list">
                    <div class="title clearfix">
                      <h3 class="fl">
                        該作者的文章
                      </h3>
                      <a class="fr" href="<?php echo $info['uinfo']['url'];?>">
                        更多»
                      </a>
                    </div>
                    <ul class="list">
<?php foreach($author_other_article as $v){?>
                      <li>
                        <a title="<?php echo $v['title'];?>" href="<?php echo $v['url'];?>">
                          <?php echo $v['title'];?>
                        </a>
                      </li>
<?php }?>
                    </ul>
                  </div>
                </li>
                <li>
                  <h2 class="fcEm7">
                    也想發表文章？
                  </h2>
                  <p class="mt5 mb5">
                    已經有上千萬人成為作者了
                  </p>
                  <a class="ui_btn ui_btn_green2 mt10" href="/help/bonus.html">
                    馬上瞭解
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- end author -->
          <!-- post_nav -->
          <div class="post_nav clearfix">
<?php if($info['pre']){?>
            <a class="fl prev" href="<?php echo $info['pre']['url'];?>">
              <span class="vm f16">
                <?php echo $info['pre']['title'];?>
              </span>
            </a>
<?php }if($info['nxt']){?>
            <a class="fr next" href="<?php echo $info['nxt']['url'];?>">
              <span class="vm f16">
                <?php echo $info['nxt']['title'];?>
              </span>
            </a>
<?php }?>
          </div>
          <!-- end post_nav -->
          <div id="ac_place_blue" style="display:none">
          </div>
        </article>
        <!-- end post -->
      </div>
      <!-- end main_wrap -->
    </div>
    <!-- end main -->
    <!-- sidebar -->
    <div class="sidebar fl ui_blockbg" id="sbddd_502">
      <!-- adsense_ad_place5 -->
      <!-- ysm_ad_place5 -->
      <!-- ui_list3 -->
      <div class="ui_list3 hot_posts">
        <h2 class="title">
          熱門文章
        </h2>
        <ul>
          <!-- 8 loop list -->
<?php foreach($viewHot as $v){ ?>
          <li class="entry" share_count="0" s-facebook="0">
            <div class="img ui_imgbg">
              <a title="<?php echo $v['title'];?>" href="<?php echo $v['url'];?>">
                <img src="<?php echo $v['pic'];?>">
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
                <?php echo $v['share_count'];?>
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
      <!-- all_ad_place1 -->
      <!-- end ui_list3 -->
    </div>
    <!-- end sidebar -->
  </div>
  <!-- end article_wrap -->
</div>
<!-- end container -->
<!-- adsense_ad_place6 -->
<!-- all_ad_place2 -->
<script type="text/javascript">
document.body.oncopy = function(e) {
 if (window.clipboardData) {
  window.clipboardData.clearData();
 }
 return false;
};
document.oncontextmenu = function() {
 return false;
};
var slog = 0;
$(document).scroll(function(){
 var hMove = document.body.scrollTop;
 hStatic = $('#article-item-box_static').offset().top;
 if(hMove > hStatic){
  if(slog){
   return 0;
  }
  setTimeout(function(){
  $.ajax({
   type: 'POST',
   url: '/ajax/clicklog',
   data: {'key':'<?php echo $click_key;?>'},
   success: function(msg){},
   dataType: 'json'
  });
  },15000);
   slog = 1;
 }

});
</script>
