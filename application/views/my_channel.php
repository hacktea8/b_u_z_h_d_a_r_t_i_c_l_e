<div id="container" class="clearfix member_wrap">
  <!-- main -->
  <div class="main fl">
    <!-- main_wrap -->
<div class="main_wrap">
  <div class="mt20 ui_blockbg member_block p20">
    <h2>
      最新公告
    </h2>
    <ul class="newlist mt5">
      <!-- loop list -->
      <li>
        <a href="/forum/post_79.html">
          第一月結算公告
        </a>
      </li>
      <li>
        <a href="/forum/post_75.html">
          有關發文時是否需要勾取“文章分級”的通知
        </a>
      </li>
      <!-- end loop list -->
    </ul>
    <p class="mt10 member_remind">
      您尚未設置您的頻道圖示
      <a href="/my/channel.html">
        馬上設置
      </a>
    </p>
    <p class="mt10 member_remind">
      請至
      <a href="/my/profile.html">
        帳號設定
      </a>
      輸入您的收款資訊
    </p>
    <p class="mt10 member_warning">
      聯絡資訊未齊全(聯絡電話/行動電話必須填寫一個)，您必須輸入您的聯絡資訊才能收到本站匯款，
      <a href="/my/profile.html">
        更新聯絡資訊
      </a>
    </p>
  </div>
  <!-- member_block -->
  <div class="mt20 ui_blockbg member_block">
    <h2 class="title">
      作者頻道設定
    </h2>
    <div class="p20">
      <form enctype="multipart/form-data" id="Channel-form" action="/my/channel.html"
      method="post">
        <p class="ui_text_block">
          <label class="fcEm3 title" for="pubTitle">
            *頻道名稱：
          </label>
          <input class="ui_text_input" name="Channel[name]" id="Channel_name" type="text"
          maxlength="100" value="1187247901">
        </p>
        <p class="ui_text_block">
          <label class="fcEm3 title vt" for="pubContent">
            頻道介紹：
          </label>
          <textarea class="ui_text_textarea" name="Channel[intro]" id="Channel_intro">
          </textarea>
        </p>
        <p class="ui_text_block">
          <label class="fcEm3 title vt">
            *當前頻道圖示：
          </label>
          <span class="ib tc">
            <span class="block img ui_imgbg mb5">
              <a>
                <img id="logo" src="/themes/default/images/channel_img_def.jpg">
              </a>
            </span>
            <a class="ui_btn ui_btn_white" href="#" id="yt0">
              清除圖示
            </a>
          </span>
        </p>
        <p class="ui_text_block">
          <label class="fcEm3 title" for="pubTag">
            *頻道圖示：
          </label>
          <input type="file" name="logo" id="uploadify">
        </p>
        <p class="ui_text_block">
          <label class="fcEm3 title">
            自定義頻道網址：
          </label>
          <span class="fcEm3">
            http://www.buzzhand.com/
            <input class="ui_text_input" name="Channel[urlkey]" id="Channel_urlkey"
            type="text" maxlength="25">
          </span>
        </p>
        <p>
          自訂頻道網址設定後無法更改，請輸入3至25個字元的“英文”、“數字”、"_"，設定後從舊網址進來的訪客也會被自動轉至新網址。
        </p>
        <p>
        </p>
        <p class="ui_text_block">
          <input type="submit" value="更新資料" name="submit" class="ui_btn ui_btn_green2 ui_text_tips f16 fb">
        </p>
      </form>
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
