<div class="sidebar fl">
  <ul id="memberSidebar" class="member_sidebar mt20 ui_blockbg">
    <li class="user">
      <h3>
        <span class="fcEm6">
          HI，
        </span>
        <?php echo $uinfo['uname'];?>
      </h3>
      <div class="img mt5 ui_imgbg ui_user_img pr">
        <a>
          <img src="<?php echo $cdn_url;?>/images/user_def.jpg">
        </a>
        <a href="/<?php echo $_c;?>/profile" class="ui_btn ui_btn_white">
          修改頭像
        </a>
      </div>
      <p class="mt5">
        <span class="ui_icon ui_icon_level ui_icon_level<?php echo $writerGroup[$uinfo['wid']]['wid'] - 1;?>">
        </span>
        <span class="vm">
          <?php echo $writerGroup[$uinfo['wid']]['title'];?>
        </span>
      </p>
    </li>
    <li class="home">
      <a class="f16 icon_nav" href="/<?php echo $_c;?>/index.html">
        我的帳戶
      </a>
    </li>
    <li class="article on">
      <a class="f16 icon_nav showSubNav">
        文章
      </a>
      <ul class="sub">
        <li id="c_post">
          <a class="f16" href="/<?php echo $_c;?>/post">
            我的文章
          </a>
        </li>
        <li id="c_cdult">
          <a class="f16" href="/<?php echo $_c;?>/adult">
            未確認成人文章
          </a>
        </li>
        <li id="c_postcreate">
          <a class="f16" href="/<?php echo $_c;?>/postcreate">
            發表文章
          </a>
        </li>
      </ul>
    </li>
    <li class="earnings on">
      <a class="f16 icon_nav showSubNav">
        收益
      </a>
      <ul class="sub">
        <li id="c_earnings">
          <a class="f16" href="/<?php echo $_c;?>/earnings">
            收益報告
          </a>
        </li>
        <li id="c_coopearnings">
          <a class="f16" href="/<?php echo $_c;?>/coopearnings">
            共推收益
          </a>
        </li>
        <li id="c_recruit">
          <a class="f16" href="/<?php echo $_c;?>/recruit">
            下線會員
          </a>
        </li>
        <li id="c_ranking">
          <a href="/<?php echo $_c;?>/ranking.html" class="f16">
            會員等级
          </a>
        </li>
        <li id="c_payrecords">
          <a href="/<?php echo $_c;?>/payrecords" class="f16">
            匯款記錄
          </a>
        </li>
      </ul>
    </li>
    <li class="spread on">
      <a class="f16 icon_nav">
        推廣
      </a>
      <ul class="sub">
        <li id="c_adcode">
          <a class="f16" href="/<?php echo $_c;?>/adcode">
            廣告代碼
          </a>
        </li>
      </ul>
    </li>
    <li class="setting on">
      <a class="f16 icon_nav">
        設定
      </a>
      <ul class="sub">
        <li id="c_channel">
          <a class="f16" href="/<?php echo $_c;?>/channel">
            頻道設定
          </a>
        </li>
        <li id="c_profile">
          <a class="f16" href="/<?php echo $_c;?>/profile">
            個人資料
          </a>
        </li>
<?php if(0){?>
        <li>
          <a class="f16" href="/<?php echo $_c;?>/password">
            修改密碼
          </a>
        </li>
<?php }?>
      </ul>
    </li>
    <li class="help on">
      <a class="f16 icon_nav">
        幫助
      </a>
      <ul class="sub">
        <li>
          <a class="f16" href="/forum/cate_1.html">
            常見問題
          </a>
        </li>
        <li>
          <a class="f16" href="/forum/cate_10.html">
            經驗分享
          </a>
        </li>
        <li>
          <a class="f16" href="/forum/cate_11.html">
            曬收入
          </a>
        </li>
        <li>
          <a class="f16" href="/forum/cate_12.html">
            提問題
          </a>
        </li>
        <li>
          <a class="f16" href="/forum/cate_13.html">
            文章共推
          </a>
        </li>
        <li>
          <a class="f16" href="/forum/cate_14.html">
            網站公告
          </a>
        </li>
      </ul>
    </li>
  </ul>
</div>
<script type="text/javascript">
$(document).ready(function(){
 $('#c_'+_method).addClass('on');
});
</script>
