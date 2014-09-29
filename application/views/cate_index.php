<div id="container" class="clearfix">
  <div class="column_top ui_blockbg">
    <div class="ui_title clearfix">
      <a class="fr ui_btn ui_btn_green2" target="_blank" href="/rss/cate/<?php echo $cid;?>">
        <span class="ui_icon ui_icon15 ui_icon15_rss">
          rss
        </span>
      </a>
      <h2>
        <a <?php if($subcid){echo ' href="'.$cate_info[$pcid]['url'].'" ';}?> class="fcEm vm">
          <?php echo $cate_info[$pcid]['title'];?>
        </a>
        <?php if($subcid){?>
        <span class="vm">&gt;</span><a class="fcEm vm"><?php echo $cate_info[$subcid]['title'];?></a>
        <?php }?>
      </h2>
    </div>
    <a class="fcEm7 showMore" onclick="Com.fnShowOther({'target': this, 'showDiv': '.nav', 'showText': '更多類別∧', 'hideText': '更多類別∨'});"
    style="position: absolute; top: 15px; right: 10px; z-index: 1;">
      更多類別∨
    </a>
    <ul class="nav">
      <li class="on">
        <a href="<?php echo $cate_info[$pcid]['url'];?>">
          全部
        </a>
      </li>
<?php foreach($cate_info as $v){
if($v['pid'] != $pcid){
 continue;
}
?>
      <li class="<?php echo $v['cid'] == $subcid?'on':'';?>">
        <a href="<?php echo $v['title'];?>">
          <?php echo $v['title'];?>
        </a>
      </li>
<?php }?>
    </ul>
  </div>
  <div class="index_main clearfix">
    <div class="main fl">
      <div class="main_wrap">
        <div class="hot_stories mt20" id="column_hot">
          <div class="title">
            <h2 class="fcEm5">
              熱門文章
            </h2>
          </div>
          <div class="content">
            <ul class="ui_list3">
<?php foreach($lists['hot'] as $v){?>
              <li class="entry" share_count="1374" s-facebook="1157" s-google="215"
              s-linkin="1" s-twitter="1">
                <div class="img ui_imgbg">
                  <a href="<?php echo $v['url'];?>">
                    <img src="<?php echo $v['pic']?>">
                  </a>
                  <a class="tips triangle" href="<?php echo $cate_info[$v['cid']]['url'];?>">
                    <?php echo $cate_info[$v['cid']]['title'];?>
                  </a>
                </div>
                <div class="content">
                  <h2 class="mt5 entry-title">
                    <a class="fcEm8" href="<?php echo $v['url'];?>">
                      <?php echo $v['title'];?>
                    </a>
                  </h2>
                  <p class="mt5 share_stub">
                    <span class="ui_icon ui_icon20 ui_icon20_share">
                    </span>
                    <span class="fb vm">
                      1374
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
      </div>
    </div>
    <div class="sidebar_l fl">
      <div class="ui_list ui_blockbg mt20" id="column_new">
        <div class="ui_list_title">
          <h2>
            最新文章
          </h2>
        </div>
        <ul>
<?php foreach($lists['new'] as $v){?>
          <li class="entry" share_count="0" s-facebook="0" appended="1">
            <div class="img ui_imgbg">
              <a href="<?php echo $v['url'];?>">
                <img src="<?php echo $v['pic'];?>">
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" href="<?php echo $v['url'];?>">
                  <?php echo $v['title'];?>
                </a>
              </h3>
              <p class="share_stub" style="display: block;">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  0
                </span>
                <span class="vm">
                  次分享/
                </span>
                <span class="fcEm4">
                  剛剛
                </span>
              </p>
              <div class="share_links none" style="display: none;">
                <a class="social-stub social-share facebook" onclick="javascript:shareToFb('<?php echo $v['url'];?>');"
                data-shares="0" data-title="<?php echo $v['title'];?>" href="javascript:void(0);">
                  Share
                </a>
              </div>
            </div>
          </li>
<?php }?>
        </ul>
      </div>
    </div>
    <div class="sidebar_r fl">
      <div id="column_wonderfull" class="ui_list ui_blockbg mt20">
        <div class="ui_list_title">
          <h2>
            精彩文章
          </h2>
        </div>
        <ul>
<?php foreach($wonderfull as $v){?>
          <li class="entry" share_count="20" s-facebook="20">
            <div class="img ui_imgbg">
              <a href="<?php echo $v['url'];?>">
                <img src="<?php echo $v['pic'];?>">
              </a>
            </div>
            <div class="content">
              <h3 class="entry-title">
                <a class="fcEm" href="<?php echo $v['url'];?>">
                  <?php echo $v['title'];?>
                </a>
              </h3>
              <p class="mt5 share_stub">
                <span class="ui_icon ui_icon20 ui_icon20_share">
                </span>
                <span class="fb vm">
                  20
                </span>
                <span class="vm">
                  次分享 /
                </span>
                <span class="fcEm4">
                  05月14日
                </span>
              </p>
            </div>
          </li>
<?php }?>
        </ul>
      </div>
    </div>
  </div>
  <div class="ajaxLoad">
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    curPage = <?php echo $page;?>;
    ajaxLoad = true;
    window.onscroll = function() {
      if (Com.fnIsNearBottom({
        target: "#container"
      })) {
        Com.fnGetMore({
          pageType: "column",
          loadId: $(".ajaxLoad"),
          moreUrl: "<?php echo $cate_info[$cid]['url'];?>"
        });
      }
    };
  });
</script>
