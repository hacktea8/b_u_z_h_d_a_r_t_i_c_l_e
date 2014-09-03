<div id="container" class="clearfix">
  <!-- login_wrap -->
  <div class="login_register mt20 ui_blockbg tc">
    <!-- loginWrap -->
    <div id="loginWrap" class="ib">
      <!-- login_register_menu -->
      <ul class="login_register_menu">
        <li class="on">
          <a href="/user/login.html">
            登入
          </a>
        </li>
        <li>
          <a href="/user/register.html">
            註冊
          </a>
        </li>
      </ul>
      <!-- end login_register_menu -->
      <!-- login_register_content -->
      <div class="login_register_content tl clearfix">
        <!-- login_l -->
        <div class="login_register_l fl">
          <form id="User-form" action="/user/login.html" method="post">
            <div class="ui_text_block">
              <input class="ui_text_input" placeholder="郵箱" name="UserForm[email]" id="UserForm_email"
              type="text">
              <div class="mt5 error_msg fcEm6" id="UserForm_email_em_" style="display:none">
              </div>
            </div>
            <div class="ui_text_block">
              <input class="ui_text_input" placeholder="密碼" name="UserForm[password]"
              id="UserForm_password" type="password">
              <div class="mt5 error_msg fcEm6" id="UserForm_password_em_" style="display:none">
              </div>
            </div>
            <div class="ui_text_block">
              <input id="ytUserForm_rememberMe" type="hidden" value="0" name="UserForm[rememberMe]">
              <input class="vm" name="UserForm[rememberMe]" id="UserForm_rememberMe"
              value="1" type="checkbox">
              <label for="remember" class="vm">
                記住我
              </label>
              <a class="ml20 vm fcEm7" href="/user/forgetpassword.html">
                找回密碼
              </a>
              <div class="errorMessage" id="UserForm_rememberMe_em_" style="display:none">
              </div>
            </div>
            <div class="ui_text_block">
              <input type="hidden" value="/" name="url">
              <input type="submit" value="登入" name="submit" class="ui_btn ui_btn_green2 f16 fb">
            </div>
          </form>
          <div class="ui_text_block">
            沒有帳號？
            <a class="ml20 vm fcEm7" href="/user/register.html">
              立即註冊
            </a>
          </div>
        </div>
        <!-- end login_l -->
        <!-- login_r -->
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
        <!-- end login_r -->
      </div>
      <!-- end login_register_content -->
    </div>
    <!-- end loginWrap -->
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
