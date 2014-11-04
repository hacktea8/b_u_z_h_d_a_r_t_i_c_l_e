<div id="container" class="clearfix tos_wrap">
	<div class="ui_main_title mt20">
    	<span class="line"></span>
    	<h2 class="title fb">
    		聯絡我們    	</h2>
    </div>
    
    <div class="ui_blockbg mt20 p15">
		<form id="contact-form" action="/help/contactus.html" method="post">			<div class="ui_text_block">
				<label for="name" class="fcEm3 title">*你的大名：</label>
				<input class="ui_text_input" name="ContactUs[name]" id="ContactUs_name" type="text" />    			<div class="ui_text_tips error_msg fcEm6" id="ContactUs_name_em_" style="display:none"></div>			</div>
			<div class="ui_text_block">
				<label for="email" class="fcEm3 title vt">*你的Email：</label>
				<input class="ui_text_input" name="ContactUs[email]" id="ContactUs_email" type="text" />    			<div class="ui_text_tips error_msg fcEm6" id="ContactUs_email_em_" style="display:none"></div>			</div>
			<div class="ui_text_block">
				<label for="pubGrade" class="fcEm3 title">*主旨：</label>
				<select class="ui_text_select" name="ContactUs[type]" id="ContactUs_type">
<option value="" selected="selected">請選擇</option>
<option value="會員服務">會員服務</option>
<option value="廣告諮詢">廣告諮詢</option>
<option value="合作提案">合作提案</option>
<option value="其他">其他</option>
</select>				<div class="ui_text_tips error_msg fcEm6" id="ContactUs_type_em_" style="display:none"></div>			</div>
			<div class="ui_text_block">
				<label for="title " class="fcEm3 title">*訊息標題：</label>
				<input class="ui_text_input" name="ContactUs[title]" id="ContactUs_title" type="text" maxlength="50" />    			<div class="ui_text_tips error_msg fcEm6" id="ContactUs_title_em_" style="display:none"></div>			</div>
			<div class="ui_text_block">
				<label for="content" class="fcEm3 title">*訊息內容：</label>
				<textarea class="ui_text_textarea" name="ContactUs[content]" id="ContactUs_content"></textarea>    			<div class="ui_text_tips error_msg fcEm6" id="ContactUs_content_em_" style="display:none"></div>			</div>
			<div class="ui_text_block">
				<label for="email" class="fcEm3 title">*驗證碼：</label>
				<input class="ui_text_input short" placeholder="驗證碼" name="ContactUs[verifyCode]" id="ContactUs_verifyCode" type="text" />                <img id="yw0" src="/help/captcha.html?v=54584e14af555" alt="" />				<div class="ui_text_tips error_msg fcEm6" id="ContactUs_verifyCode_em_" style="display:none"></div>			</div>
			<div class="ui_text_block">
				<input type="submit" class="ui_btn ui_btn_green2 ui_text_tips f16 fb" name="input" value="發送">
			</div>
		</form>	</div>
</div>
