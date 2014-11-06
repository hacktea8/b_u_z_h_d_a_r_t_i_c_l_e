<div id="container" class="clearfix about_wrap">
  <div class="container">
    <!-- top -->
    <div class="top">
      <h1 class="title">
        <?php echo $site_name;?>發文賺錢平台
      </h1>
      <div class="content">
        <p class="f20 fsI mt5  fcEm5">
          分享好文章，輕鬆賺現金
        </p>
        <p class="f16 mt20 pb15" style="color:#ddd">
          <?php echo $site_name;?>讓您發表文章並創造收入
          <br>
          多種付款方式, PayPal、支付寶和西聯Western Union
        </p>
        <div class="pt10 mt20">
          <a class="ui_btn ui_btn_green2 ui_text_tips f20 fb" href="/user/register.html">
            <!-- <span class="ui_icon ui_icon35 ui_icon35_edit mr5"></span>-->
            <!-- <span class="vm"> -->
            馬上加入
            <!-- </span> -->
          </a>
        </div>
      </div>
      <!-- top_r -->
      <div class="top_r">
        <div class="top_r_block vertical2">
          <div class="hack">
            <div class="centered">
              <div class="content vertical rc5">
                <div>
                  發表有趣的文章，原創或轉載均可
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="top_r_block vertical2">
          <div class="hack">
            <div class="centered">
              <div class="content vertical rc5">
                <div>
                  透過粉絲團、論壇、朋友與網友，推廣宣傳您的文章
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="top_r_block vertical2">
          <div class="hack">
            <div class="centered">
              <div class="content vertical rc5">
                <div>
                  文章被點閱瀏覽，就可賺取現金
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end top_r -->
    </div>
    <!-- end top -->
    <!-- about_block -->
    <div class="about_block">
      <div class="main fl">
        <div class="main_wrap about_icon about_icon1">
          <h2 class="title">
            <?php echo $site_name;?>特色
          </h2>
          <div class="content">
            <p class="f18 mt10 fcEm3">
              <strong style="color:#2d7ad0">
                發文賺錢 - 原創文章或轉載，依照文章點閱數計算收益
              </strong>
              <br>
              <a href="/forum/detail.html?id=18&faq=1" target="_blank">
                <strong style="color:#2d7ad0">
                  共推文章
                </strong>
              </a>
              - 推廣站內作者的文章，您也可獲得收入
              <br>
              大方把文章設成共推文章。就會有其他會員幫你推廣，就可以坐享收益。
              <br>
              會推廣的會員，可以選效果不錯的共推文章，推廣出去，輕鬆賺取收益。
              <br>
              <strong style="color:#2d7ad0">
                發展下線 - 邀請朋友共推文章，賺取高額獎勵(下線總收益的15%)
              </strong>
              <br>
            </p>
            <a class="ui_btn ui_btn_green3 f16 mt20" href="/user/register.html">
              馬上加入
            </a>
          </div>
        </div>
      </div>
      <div class="sidebar fl">
        <h2 class="f20">
          會員種類收益
        </h2>
        <table class="mt5">
          <thead>
            <tr>
              <th width="50%" class="f16 fcEm8">
                會員種類
              </th>
              <th width="50%" class="f16 fcEm8">
                收益/點閱
              </th>
            </tr>
          </thead>
          <tbody>
<?php foreach($userGroup as $v){?>
            <tr>
              <td width="50%">
                <?php echo $v['title'];?>
              </td>
              <td width="50%">
                US $<?php echo $v['price'];?>
              </td>
            </tr>
<?php }?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- end about_block -->
    <!-- about_block -->
    <div class="about_block">
      <div class="main fl">
        <div class="main_wrap">
          <div class="about_icon about_icon2">
            <h2 class="subtitle f20">
              如何加入<?php echo $site_name;?>
            </h2>
            <div class="content">
              <p class="f18 mt10 fcEm3">
                文章發表不限於原創作者，如為轉載則不可侵犯他人權益。
              </p>
            </div>
          </div>
          <div class="about_icon about_icon3">
            <h2 class="subtitle f20">
              可以分享什麼類型的文章
            </h2>
            <p class="f18 mt10 fcEm3">
              除了情色、血腥、廣告、暴力、賭博以及侵犯他人智慧財產權及權利外任何的文章，我們都歡迎您分享！
            </p>
          </div>
          <div class="about_icon about_icon4">
            <h2 class="subtitle f20">
              關於計算收益
            </h2>
            <div class="content">
              <p class="f18 mt10 fcEm3">
                依照文章被點閱次數，不同類型會員有不同的收益
              </p>
              <p class="f18 mt10 mb10 fcEm6">
                一千次點閱 US $2.00 ~ US $4.00。
              </p>
              <p class="f18 mt10 fcEm3">
                請參閱右上方會員類型收益表
              </p>
            </div>
          </div>
          <div class="about_text clearfix">
            <div class="about_text_r fl">
              <p class="rc5 f20">
                FB等社群網站
              </p>
              <p class="rc5 f20">
                論壇或部落格
              </p>
              <p class="rc5 f20">
                搜尋引擎
              </p>
            </div>
            <div class="about_text_m fl f20">
              您分享的文章
            </div>
          </div>
        </div>
      </div>
      <div class="sidebar fl">
        <h2 class="f20">
          發文等級獎金
        </h2>
        <table class="mt5">
          <thead>
            <tr>
              <th width="34%" class="f16 fcEm8">
                等級
              </th>
              <th width="33%" class="f16 fcEm8">
                月點閱數
              </th>
              <th width="32%" class="f16 fcEm8">
                額外獎金
              </th>
            </tr>
          </thead>
          <tbody>
            <!-- loop list -->
<?php foreach($writerGroup as $k => $v){?>
            <tr>
              <td width="34%">
                <span class="ui_icon ui_icon_level ui_icon_level<?php echo $k-1;?>">
                </span>
                <span class="vm">
                 <?php echo $v['title'];?>
                </span>
              </td>
              <td width="33%">
                <?php echo $v['hits'];?>
              </td>
              <td width="32%">
                +<?php echo $v['award'];?>%
              </td>
            </tr>
<?php }?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- end about_block -->
    <div class="mt20 pt10">
      <div class="about_icon about_icon5">
        <h2 class="subtitle f20">
          匯款說明
        </h2>
        <div class="content">
          <p class="f18 mt10 fcEm3">
            多種付款方式, PayPal、支付寶和西聯Western Union
            <br>
            當每月累計達到
            <font color="green">
              最低付款額度（5美元）
            </font>
            ，在隔一個月的月底前匯款
            <br>
            若收益未達到支付金額，會累計到下個月。
          </p>
        </div>
      </div>
      <div class="about_icon about_icon6">
        <h2 class="subtitle f20">
          合作邀請
        </h2>
        <div class="content">
          <p class="f18 mt10 fcEm3">
            歡迎作家、原創部落格主、翻譯高手、行業專家等分享文章，請於註冊後
            <a href="/help/contactus.html" target="_blank" style="color:#00f">
              與我們聯絡
            </a>
            ，我們將提供特別認證(首頁特約作者專區、原創文章標示……等），以及更高的收益(1,000次點閱$2.25~$4.00美金)。
          </p>
        </div>
      </div>
      <a class="ui_btn ui_btn_yellow" href="/user/register.html">
        立即註冊
      </a>
    </div>
  </div>
</div>
