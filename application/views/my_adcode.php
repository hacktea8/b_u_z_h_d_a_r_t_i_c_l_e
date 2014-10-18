<div id="container" class="clearfix member_wrap">
  <!-- main -->
  <div class="main fl">
    <!-- main_wrap -->
<div class="main_wrap">
<?php require_once 'my_rightbar.php';?>
  <!-- member_block -->
  <div class="mt20 ui_blockbg member_block p20">
    <div>
      <h2 class="fb">
        HTML廣告代碼
      </h2>
      <p>
        您可以將以下代碼
      </p>
      <div class="member_block_blockbg ui_blockbg p20 mt15">
        <span class="ib">
          廣告尺寸：
        </span>
        <ul class="mb10 sizelist ib">
          <li class="size cur" onclick="Com.fnSwitchTab({target: this, childId:'#preview_a'});inputInnerHtml('728x90')">
            728x90
          </li>
          <li class="size" onclick="Com.fnSwitchTab({target: this, childId:'#preview_b'});inputInnerHtml('336x280')">
            336x280
          </li>
          <li class="size" onclick="Com.fnSwitchTab({target: this, childId:'#preview_c'});inputInnerHtml('300x600')">
            300x600
          </li>
          <li class="size" onclick="Com.fnSwitchTab({target: this, childId:'#preview_d'});inputInnerHtml('320x50')">
            320x50
          </li>
          <li class="size" onclick="Com.fnSwitchTab({target: this, childId:'#preview_e'});inputInnerHtml('300x250')">
            300x250
          </li>
          <li class="size" onclick="Com.fnSwitchTab({target: this, childId:'#preview_f'});inputInnerHtml('200x250')">
            200x250
          </li>
          <li class="size" onclick="Com.fnSwitchTab({target: this, childId:'#preview_g'});inputInnerHtml('200x600');">
            200x600
          </li>
        </ul>
        <p class="f16">
          HTML程式碼:
        </p>
        <div class="member_block_text mt10">
          <div class="input rc5">
            <input id="copyLink" type="text" class="ui_text_input fb fcEm3 f18" value="<script src='<?php echo $base_url;?>ads/show.html?u=<?php echo $uinfo['uid'];?>&amp;size=728x90'></script>">
          </div>
          <input type="submit" value="複製連結" name="submit" class="ui_btn ui_btn_green2 ui_text_tips f16 fb"
          onclick="copyToClipboard($('#copyLink').val());alert('成功複製啦!');">
        </div>
      </div>
    </div>
    <div class="mt20">
      <h3>
        預覽
      </h3>
      <div id="preview_a">
        <iframe src="/ads/index.html?u=<?php echo $uinfo['uid'];?>&amp;size=728x90" width="728" height="90"
        marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true"
        scrolling="no" frameborder="0">
        </iframe>
      </div>
      <div id="preview_b" class="none">
        <iframe src="/ads/index.html?u=<?php echo $uinfo['uid'];?>&amp;size=336x280" width="336" height="280"
        marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true"
        scrolling="no" frameborder="0">
        </iframe>
      </div>
      <div id="preview_c" class="none">
        <iframe src="/ads/index.html?u=<?php echo $uinfo['uid'];?>&amp;size=300x600" width="300" height="600"
        marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true"
        scrolling="no" frameborder="0">
        </iframe>
      </div>
      <div id="preview_d" class="none">
        <iframe src="/ads/index.html?u=<?php echo $uinfo['uid'];?>&amp;size=320x50" width="320" height="50"
        marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true"
        scrolling="no" frameborder="0">
        </iframe>
      </div>
      <div id="preview_e" class="none">
        <iframe src="/ads/index.html?u=<?php echo $uinfo['uid'];?>&amp;size=300x250" width="300" height="250"
        marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true"
        scrolling="no" frameborder="0">
        </iframe>
      </div>
      <div id="preview_f" class="none">
        <iframe src="/ads/index.html?u=<?php echo $uinfo['uid'];?>&amp;size=200x250" width="200" height="250"
        marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true"
        scrolling="no" frameborder="0">
        </iframe>
      </div>
      <div id="preview_g" class="none">
        <iframe src="/ads/index.html?u=<?php echo $uinfo['uid'];?>&amp;size=200x600" width="200" height="600"
        marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true"
        scrolling="no" frameborder="0">
        </iframe>
      </div>
    </div>
  </div>
  <!-- end member_block -->
</div>
    <!-- end main_wrap -->
  </div>
  <!-- end main -->
  <!-- sidebar -->
  <?php require_once 'my_leftbar.php';?>
  <!-- end sidebar -->
</div>
