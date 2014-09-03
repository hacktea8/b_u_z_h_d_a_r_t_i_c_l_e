<div id="container" class="clearfix">
  <!-- login_wrap -->
  <div class="login_register mt20 ui_blockbg tc">
    <!-- loginWrap -->
    <div id="registerWrap" class="ib">
      <!-- login_register_menu -->
      <ul class="login_register_menu">
        <li>
          <a href="/user/login.html">
            登入
          </a>
        </li>
        <li class="on">
          <a href="/user/register.html">
            註冊
          </a>
        </li>
      </ul>
      <!-- end login_register_menu -->
      <!-- login_register_content -->
      <div class="login_register_content tl clearfix">
        <!-- login_register_l -->
        <div class="login_register_l fl">
          <form id="User-form" action="/user/register.html" method="post">
            <div class="ui_text_block">
              <label class="fcEm3 title" for="email">
                郵箱：
              </label>
              <input class="ui_text_input" placeholder="郵箱" name="UserForm[email]" id="UserForm_email"
              type="text">
              <div class="ui_text_tips error_msg fcEm6" id="UserForm_email_em_" style="display:none">
              </div>
            </div>
            <div class="ui_text_block">
              <label class="fcEm3 title" for="pwd">
                密碼：
              </label>
              <input class="ui_text_input" placeholder="密碼" name="UserForm[password]"
              id="UserForm_password" type="password">
              <div class="ui_text_tips error_msg fcEm6" id="UserForm_password_em_" style="display:none">
              </div>
            </div>
            <div class="ui_text_block">
              <label class="fcEm3 title" for="pwd2">
                確認密碼：
              </label>
              <input class="ui_text_input" placeholder="確認密碼" name="UserForm[password1]"
              id="UserForm_password1" type="password">
              <div class="ui_text_tips error_msg fcEm6" id="UserForm_password1_em_"
              style="display:none">
              </div>
            </div>
            <div class="ui_text_block">
              <label class="fcEm3 title" for="email">
                驗證碼：
              </label>
              <input class="ui_text_input short" placeholder="驗證碼" name="UserForm[verifyCode]"
              id="UserForm_verifyCode" type="text">
              <img id="yw0" src="/user/captcha.html?v=540686cb2263a" alt="">
              <a class="fcEm7" id="yw0_button" href="/user/captcha.html?refresh=1">
                看不清？換一張
              </a>
              <div class="ui_text_tips error_msg fcEm6" id="UserForm_verifyCode_em_"
              style="display:none">
              </div>
            </div>
            <div class="ui_text_block">
              <p class="ui_text_tips">
                <a class="fcEm7" href="/help/service.html" target="_blank">
                  註冊條款
                </a>
              </p>
            </div>
            <div class="ui_text_block">
              <input type="submit" value="同意並註冊" name="submit" class="ui_btn ui_btn_green2 f16 fb ui_text_tips">
            </div>
          </form>
          <div class="ui_text_block">
            <p class="ui_text_tips">
              已有帳號？
              <a class="ml5 fcEm7" href="/user/login.html">
                登入
              </a>
            </p>
          </div>
        </div>
        <!-- end login_register_l -->
        <!-- login_register_r -->
        <div class="login_register_r fl">
          <h3>
            使用其他方式登入
          </h3>
          <ul class="mt20" id="oauth">
            <li>
              <a class="ui_icon ui_icon_third55 ui_icon_third55_f" provider="facebook">
                Facebook
              </a>
            </li>
            <!-- <li>-->
            <!-- <a class="ui_icon ui_icon_third55 ui_icon_third55_t" provider="twitter">Twitter</a>-->
            <!-- </li>-->
            <li>
              <a class="ui_icon ui_icon_third55 ui_icon_third55_g" provider="google">
                Google+
              </a>
            </li>
          </ul>
        </div>
        <!-- end login_register_r -->
      </div>
      <!-- end login_register_content -->
    </div>
    <!-- end registerWrap -->
  </div>
  <!-- end login_wrap -->
</div>
<!-- end container -->
<script>
  $(function() {
    $('#oauth a').click(function(data) {
      var provider = $(this).attr('provider');
      //var signinWin;
      //var screenX     = window.screenX !== undefined ? window.screenX : window.screenLeft,
      //screenY     = window.screenY !== undefined ? window.screenY : window.screenTop,
      //outerWidth  = window.outerWidth !== undefined ? window.outerWidth : document.body.clientWidth,
      //outerHeight = window.outerHeight !== undefined ? window.outerHeight : (document.body.clientHeight - 22),
      //width       = 800,
      //height      = 550,
      //left        = parseInt(screenX + ((outerWidth - width) / 2), 10),
      //top         = parseInt(screenY + ((outerHeight - height) / 2.5), 10),
      //options    = (
      //'width=' + width +
      //',height=' + height +
      //',left=' + left +
      //',top=' + top
      //);
      signinWin = window.open('/oauth/go.html?provider=' + provider + '&ref=');
      if (window.focus) {
        signinWin.focus()
      }
      return false;
    });
  });
</script>
