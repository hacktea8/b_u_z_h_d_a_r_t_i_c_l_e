<div id="container" class="clearfix member_wrap">
  <!-- main -->
  <div class="main fl">
    <!-- main_wrap -->
<div class="main_wrap">
<?php require_once 'my_rightbar.php';?>
  <!-- member_block -->
  <div class="mt20 ui_blockbg member_block p20">
    <form enctype="multipart/form-data" id="User-form" action="/my/profile.html"
    method="post">
      <fieldset>
        <legend>
          個人資料
        </legend>
        <p class="ui_text_block">
          <label for="User_email" class="fcEm3 title">
            Email：
          </label>
          1187247901@qq.com
        </p>
        <p class="ui_text_block">
          <label class="fcEm3 title" for="User_nickname">
            *暱稱：
          </label>
          <input class="ui_text_input" name="User[nickname]" id="User_nickname"
          type="text" maxlength="50" value="1187247901">
        </p>
        <p class="ui_text_block">
          <label for="User_lastname" class="fcEm3 title">
            姓：
          </label>
          <input class="ui_text_input" name="User[lastname]" id="User_lastname"
          type="text" maxlength="50">
        </p>
        <p class="ui_text_block">
          <label for="User_firstname" class="fcEm3 title">
            名：
          </label>
          <input class="ui_text_input" name="User[firstname]" id="User_firstname"
          type="text" maxlength="50">
        </p>
        <p class="ui_text_block">
          <label class="fcEm3 title vt">
            *目前使用大頭照：
          </label>
          <span class="ib tc">
            <span class="block img ui_imgbg mb5">
              <a>
                <img id="user_logo" src="/themes/default/images/user_img_def.png">
              </a>
            </span>
            <a class="ui_btn ui_btn_white" href="#" id="yt0">
              清除圖示
            </a>
          </span>
        </p>
        <p class="ui_text_block">
          <label class="fcEm3 title" for="pubTag">
            *更新大頭照：
          </label>
          <input type="file" name="Userlogo">
        </p>
        <p class="ui_text_block">
          <label for="User_years" class="fcEm3 title">
            生日：
          </label>
          <span class="ui_text_input">
            <input readonly="readonly" style="width:90px;" id="User_birthday" name="User[birthday]"
            type="text" class="hasDatepicker">
          </span>
        </p>
        <p class="ui_text_block">
          <label for="User_address" class="fcEm3 title">
            地址：
          </label>
          <input class="ui_text_input" name="User[address]" id="User_address" type="text"
          maxlength="100">
        </p>
        <p class="ui_text_block">
          <label for="User_country" class="fcEm3 title">
            *國家：
          </label>
          <select class="ui_text_select" name="User[country_id]" id="User_country_id">
            <option value="">
              == 請選擇 ==
            </option>
            <option value="0" selected="selected">
              台灣
            </option>
            <option value="1">
              香港
            </option>
            <option value="2">
              中國（大陸）
            </option>
            <option value="3">
              馬來西亞
            </option>
            <option value="4">
              新加坡
            </option>
            <option value="5">
              其他
            </option>
          </select>
        </p>
        <p class="ui_text_block">
          <label for="User_phone" class="fcEm3 title">
            聯絡電話：
          </label>
          <input class="ui_text_input" name="User[telephone]" id="User_telephone"
          type="text" maxlength="20">
        </p>
        <p class="ui_text_block">
          <label for="User_phone2" class="fcEm3 title">
            行動電話：
          </label>
          <input class="ui_text_input" name="User[mobile]" id="User_mobile" type="text"
          value="">
        </p>
      </fieldset>
      <fieldset>
        <legend>
          匯款資料
        </legend>
        <p class="ui_text_block">
          <label for="User_pay_method" class="fcEm3 title">
            收款方式：
          </label>
          <select class="ui_text_select" name="User[pay_method]" id="User_pay_method">
            <option value="0" selected="selected">
              無
            </option>
            <option value="1">
              PayPal
            </option>
            <option value="2">
              西聯
            </option>
            <option value="3">
              支付寶
            </option>
            <option value="4">
              捐慈善機構
            </option>
            <option value="5">
              捐為本站營運資金
            </option>
          </select>
        </p>
        <p class="ui_text_block hiddenoption" style="display: none;" id="payoption1">
          <label for="paypal" class="fcEm3 title">
            PayPal信箱：
          </label>
          <input type="text" maxlength="100" size="40" value="" id="paypal" class="ui_text_select"
          name="paypal">
        </p>
        <p class="ui_text_block hiddenoption" style="display: none;" id="payoption2">
          <span class="block fcEm4 ui_text_tips">
            選擇西聯請務必閱讀:
            <a href="/forum/post_37.html" target="_blank">
              西聯匯款注意事項
            </a>
          </span>
        </p>
        <p class="ui_text_block hiddenoption" style="display: none;" id="payoption3">
          <label for="paypal" class="fcEm3 title">
            支付寶帳號：
          </label>
          <input type="text" maxlength="100" value="" id="alipay" class="ui_text_select"
          name="alipay">
        </p>
        <p class="ui_text_block hiddenoption" style="display: none;" id="payoption4">
          <label for="User_paypal" class="fcEm3 title">
            慈善機構：
          </label>
          <select class="ui_text_select" name="donateins" id="donateins">
            <option value="不限定">
              不限定
            </option>
            <option value="慈濟">
              慈濟
            </option>
            <option value="紅十字會">
              紅十字會
            </option>
            <option value="世界展望會">
              世界展望會
            </option>
          </select>
          <span class="block fcEm4 ui_text_tips">
            每個月網站會公布捐款證明
          </span>
        </p>
      </fieldset>
      <fieldset>
        <legend>
          郵件通知
        </legend>
        <p class="ui_text_block">
          <label class="block fcEm3">
            <input id="ytUser_accept_email" type="hidden" value="0" name="User[accept_email]">
            <input class="mr5" name="User[accept_email]" id="User_accept_email" value="1"
            checked="checked" type="checkbox">
            當我收到站內訊息時，發電子郵件通知我。
          </label>
        </p>
      </fieldset>
      <p class="ui_text_block">
        <input onclick="return confirm(&quot;請確認匯款資料填寫是否准確，一旦提交不能修改，是否現在提交？&quot;)"
        type="submit" class="ui_btn ui_btn_green2 ui_text_tips f16 fb" name="submit"
        value="更新資料">
      </p>
    </form>
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
