<footer id="footer">
  <div class="footer_top">
    <div class="footer_block logo" onclick="window.location.href='/'">
      <h2 class="fb">
        <a href="/">
          <?php echo $site_name;?>
        </a>
      </h2>
      <p class="f18">
        <a>
          汉语的发文分享网络平台！
        </a>
      </p>
    </div>
    <div class="footer_block nav">
      <h2 class="fcEm5 mb5">
        快速导航
      </h2>
      <ul>
        <li>
          <a title="热门文章" href="/post/hots.html">
            热门文章
          </a>
        </li>
        <li>
          <a title="精彩文章" href="/post/wonderfull.html">
            精彩文章
          </a>
        </li>
        <li style="border:0">
          <a title="最新文章" href="/post/news.html">
            最新文章
          </a>
        </li>
        <li>
          <a href="/channel/index.html">
            熱門頻道
          </a>
        </li>
        <li>
          <a href="/forum/index.html?cid=10">
            经验分享
          </a>
        </li>
        <li style="border:0">
          <a href="/forum/index.html?cid=1">
            站内帮助
          </a>
        </li>
      </ul>
    </div>
    <div class="footer_block info">
      <h2 class="fcEm5 mb5">
        关于<?php echo $site_name;?>
      </h2>
      <p>
        <?php echo $site_name;?>一个拥有创新精神多用户部落格网络平台，亲爱的网友您可以尽情免费创建自己的部落格频道!
      </p>
    </div>
    <div class="footer_block info">
      <h2 class="fcEm5 mb5">
        什么是发文赚钱？
      </h2>
      <p class="mb5">
        在本网站(<?php echo $site_name;?>)分享您的创造，包括文章、图片、或影片即可让您轻松赚取现金收益！
      </p>
      <a class="ui_btn ui_btn_green f12" title="发文赚钱" href="/help/bonus.html">
        了解更多
      </a>
    </div>
  </div>
  <div class="footer_main f12 fcEm7">
    <div class="content">
      重要声明：本站所有文章由会员即时发表，本站对所有文章的真实性、完整性及立场等，不负任何法律责任。所有文章内容只代表发文者个人意见，亦非本网站之立场，用户不应信赖内容，亦应自行判断内容之真实性。发文者拥有在<?php echo $site_name;?>张贴的文章。
      由于本站受到「即时发表」运作方式所规限，故不能完全监察所有即时文章，如有不过当或对于文章出处有疑虑，请联络我们告知，我们将在最短时间内进行撤除。本站有权删除任何留言及拒绝任何人士发文，同时亦有不删除文章的权利。
    </div>
  </div>
  <div class="tc f12 footer_bottom">
    <span class="mr5">
      ©<?php echo date('Y'),' ',$site_name;?>. All Rights Reserved.
    </span>
    <a rel="nofollow" href="/help/service.html">
      使用条款
    </a>
    <span class="ml5 mr5">
      |
    </span>
    <a rel="nofollow" href="/help/privacy.html">
      隐私条款
    </a>
    <span class="ml5 mr5">
      |
    </span>
    <a rel="nofollow" href="/help/tortreport.html">
      侵权举报
    </a>
    <span class="ml5 mr5">
      |
    </span>
    <a rel="nofollow" href="/help/contactus.html">
      联络我们
    </a>
    <span class="ml5 mr5">
      |
    </span>
    <a rel="nofollow" href="/help/copyright.html">
      著作权保护
    </a>
  </div>
</footer>
</div>
<div id="fb-root">
</div>
<?php if(0){?>
<img id="fbpic" src="https://graph.facebook.com/712719613/picture" width="0" height="0" style="display:none" />
<?php }?>
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43439571-6', 'auto');
  ga('send', 'pageview');
</script>
<script type="text/javascript" src="<?php echo $cdn_url;?>/js/footer.js?v=<?php echo $version;?>"></script>
</body>
</html>
