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
<?php if(!$checkSetting['pic']){?>
        <p class="mt10 member_remind">
          您尚未設置您的頻道圖示
          <a href="/console/channel.html">
            馬上設置
          </a>
        </p>
<?php }if( !$checkSetting['account']){?>
        <p class="mt10 member_remind">
          請至
          <a href="/console/profile.html">
            帳號設定
          </a>
          輸入您的收款資訊
        </p>
        <p class="mt10 member_warning">
          聯絡資訊未齊全，您必須輸入您的聯絡資訊才能收到本站匯款，
          <a href="/console/profile.html">
            更新聯絡資訊
          </a>
        </p>
<?php }?>
      </div>
