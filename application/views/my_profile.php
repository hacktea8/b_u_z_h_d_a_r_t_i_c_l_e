<div id="container" class="clearfix member_wrap">
    <!-- main -->
    <div class="main fl">
    <!-- main_wrap -->
    <div class="main_wrap">
<?php require_once 'my_rightbar.php';?>
      <!-- member_block -->
      <div class="mt20 ui_blockbg member_block p20">
        <form enctype="multipart/form-data" id="User-form" action="/profile.html"
        method="post">
          <fieldset>
            <legend>
              個人資料
            </legend>
            <div class="ui_text_block">
              <label for="User_email" class="fcEm3 title">
                Email：
              </label>
              <?php echo $uinfo['email'];?>
            </div>
            <div class="ui_text_block">
              <label class="fcEm3 title" for="User_nickname">
                *暱稱：
              </label>
              <input class="ui_text_input" name="User[nickname]" id="User_nickname"
              type="text" maxlength="50" value="<?php echo $channel['nickname'];?>" />
            </div>
            <div class="ui_text_block">
              <label for="User_lastname" class="fcEm3 title">
                姓：
              </label>
              <input class="ui_text_input" name="User[lastname]" id="User_lastname"
              type="text" maxlength="50" value="<?php echo $channel['lastname'];?>" />
            </div>
            <div class="ui_text_block">
              <label for="User_firstname" class="fcEm3 title">
                名：
              </label>
              <input class="ui_text_input" name="User[firstname]" id="User_firstname"
              type="text" maxlength="50" value="<?php echo $channel['firstname'];?>" />
            </div>
            <div class="ui_text_block">
              <label class="fcEm3 title vt">
                *目前使用大頭照：
              </label>
              <div class="ib tc">
                <div class="block img ui_imgbg mb5 avatar">
                  <a>
                    <img id="user_logo" src="<?php echo $channel['avatar'];?>" />
                  </a>
                </div>
                <a class="ui_btn ui_btn_white" href="#" id="yt0">
                  清除圖示
                </a>
              </div>
            </div>
            <div class="ui_text_block">
              <label class="fcEm3 title vt" for="pubTag">
                *更新大頭照：
              </label>
              <!-- <input type="file" name="Userlogo"> -->
              <div class="ib ui_uploadimg" id="uploadImgWrap">
                <div id="uploadImg">
                </div>
                <div class="mt10 mb10">
                  <div id="curImg" class="cur_img ui_imgbg">
                  </div>
                  <div id="previewImg" class="preview_img ui_imgbg avatar" data-width="144"
                  data-height="144">
                  </div>
                </div>
                <a class="ui_btn ui_btn_upload" data-wrap="user_logo">
                  保存頭像
                </a>
              </div>
            </div>
            <div class="ui_text_block">
              <label for="User_years" class="fcEm3 title">
                生日：
              </label>
              <span class="ui_text_input">
                <input readonly="readonly" style="width:90px;" id="User_birthday" name="User[birthday]"
                type="text" value="<?php echo $channel['birthday'];?>"/>
              </span>
            </div>
            <div class="ui_text_block">
              <label for="User_address" class="fcEm3 title">
                地址：
              </label>
              <input class="ui_text_input" name="User[address]" id="User_address" type="text"
              maxlength="100" value="<?php echo $channel['address'];?>" />
            </div>
            <div class="ui_text_block">
              <label for="User_country" class="fcEm3 title">
                *國家：
              </label>
              <select class="ui_text_select" name="User[country_id]" id="User_country_id">
                <option value="">
                  == 請選擇 ==
                </option>
                <option value="0">
                  台灣
                </option>
                <option value="1">
                  香港
                </option>
                <option value="2" selected="selected">
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
            </div>
            <div class="ui_text_block">
              <label for="User_phone" class="fcEm3 title">
                聯絡電話：
              </label>
              <input class="ui_text_input" name="User[telephone]" id="User_telephone"
              type="text" maxlength="20" value="<?php echo $channel['telephone'];?>" />
            </div>
            <div class="ui_text_block">
              <label for="User_phone2" class="fcEm3 title">
                行動電話：
              </label>
              <input class="ui_text_input" name="User[mobile]" id="User_mobile" type="text"
              value="<?php echo $channel['mobile'];?>" />
            </div>
          </fieldset>
          <fieldset>
            <legend>
              匯款資料
            </legend>
<?php if($channel['pay_account']){?>
            <div class="ui_text_block">
              <label for="User_pay_method" class="fcEm3 title">
                收款方式：
              </label>
              支付寶
            </div>
            <div class="ui_text_block">
              <label class="fcEm3 title">
                帳號：
              </label>
              <label class="fcEm3">
                <?php echo $channel['pay_account'];?>
              </label>
              <label class="fcEm3" style="margin-right: 140px;float: right;">
                <a onclick='delConfirm(1182,"/changepaymethod.html?id=1182");' style="background-color: #159881; width:100px; padding: 5px 15px; color:#b4fff2">
                  申請修改匯款資料
                </a>
              </label>
            </div>
<?php }else{?>
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

<?php }?>
            <div class="ui_text_block">
              <input onclick="return confirm(&quot;請確認匯款資料填寫是否准確，一旦提交不能修改，是否現在提交？&quot;)" type="submit" class="ui_btn ui_btn_green2 ui_text_tips f16 fb"
              name="submit" value="更新資料">
            </div>
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
<!-- end container -->
<script src="<?php echo $cdn_url;?>/js/jquery.Huploadify.js">
</script>
<script src="<?php echo $cdn_url;?>/js/jquery.imgareaselect.min.js">
</script>
<link href="<?php echo $cdn_url;?>/css/Huploadify.css" rel="stylesheet">
<script>
  $(document).ready(function() {

    Com.fnUploadImg.init();

    $('#User_pay_method').on('change',
    function() {
      $('.hiddenoption').hide();
      $('#payoption' + this.value).fadeIn();
    });
    $('.hiddenoption').hide();
    $('#payoption' + $('#User_pay_method').val()).fadeIn();

    function check() {
      var txt = $('#alipay').val(),
      txt1 = $('#paypal').val(),
      isNull = txt == "" && txt1 == "";
      if (!isNull) {
        if (txt != '' || txt1 != '') {
          if (confirm("請確認匯款資料填寫是否准確，一旦提交不能修改，是否現在提交？")) {
            return true;
          } else {
            return false;
          }
        }
      } else {
        return true;
      }
    }
    $("#User-form").submit(function() {
      return check();
    });
  });
</script>
<script type="text/javascript">
  function delConfirm(user_id, url) {
    var pop_html = '<div class="pt10"><p class="f16">已經將修改匯款資料鏈接地址發送到您的註冊郵箱，</p><p class="f16">請登錄您的郵箱進行修改匯款資料的操作。</p><p class="f16"><a style="float:right;margin-top: 20px;" href="' + url + '" class="ui_btn ui_btn_green2 ml10 mr10">Close</a></p></div>'Com.fnPopupWin({
      id: "win_delTips_" + user_id,
      content: pop_html,
      expiry: 15000,
      showCloseIcon: false,
    });
  }
</script>
<script type="text/javascript" src="<?php echo $cdn_url;?>/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $cdn_url;?>/js/jquery-ui-i18n.min.js"></script>
<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
jQuery('body').on('click','#yt0',function(){jQuery.ajax({'success':function(res){
 if (res.status="success"){
  $("#user_logo").attr("src", res.src );
 }
},'type':'POST','dataType':'json','url':'/clearlogo.html?type=user','cache':false,'data':jQuery(this).parents("form").serialize()});return false;});
jQuery('#User_birthday').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['zh_tw'],{'dateFormat':'yy-mm-dd','showAnim':'slideDown','changeMonth':true,'changeYear':true,'maxDate':'-1D','yearRange':'1940:2014','defaultDate':'-1D'}));
});
/*]]>*/
</script>
