<div id="container" class="clearfix tos_wrap">
	<div class="ui_main_title mt20">
    	<span class="line"></span>
    	<h2 class="title fb">
    		侵權檢舉    	</h2>
    </div>
    
    <div class="ui_blockbg mt20 p15">
    	<p>本站嚴禁使用者發表侵害版權或智慧財產之內容，由於本站是受到「即時發表」運作方式所規限，故不能完全監察所有即時文章。若有任何文章侵犯到您的權益，請通過填寫下方表單通知我們，本站將會在24小時內處理。</p>
		<form id="tort-form" action="/help/tortreport.html" method="post">			<div class="ui_text_block">
				<label for="name" class="fcEm3 title">*著作權/著作權人之代理人之姓名/公司：</label>
				<input class="ui_text_input" name="TortReport[name]" id="TortReport_name" type="text" maxlength="50" />    			<div class="ui_text_tips error_msg fcEm6" id="TortReport_name_em_" style="display:none"></div>			</div>
			<div class="ui_text_block">
				<label for="email" class="fcEm3 title vt">*聯絡信箱：</label>
				<input class="ui_text_input" name="TortReport[email]" id="TortReport_email" type="text" />    			<div class="ui_text_tips error_msg fcEm6" id="TortReport_email_em_" style="display:none"></div>			</div>
			<div class="ui_text_block">
				<label for="pubGrade" class="fcEm3 title">聯絡電話：</label>
				<input class="ui_text_input" name="TortReport[phone]" id="TortReport_phone" type="text" />			</div>
			<div class="ui_text_block">
				<label for="title " class="fcEm3 title">聯絡地址：</label>
				<input class="ui_text_input" name="TortReport[address]" id="TortReport_address" type="text" maxlength="50" />    			<div class="ui_text_tips error_msg fcEm6" id="TortReport_address_em_" style="display:none"></div>			</div>
			<div class="ui_text_block">
				<label for="content" class="fcEm3 title">*侵害著作權之網址 ：</label>
				<input class="ui_text_input" name="TortReport[url]" id="TortReport_url" type="text" />    			<div class="ui_text_tips error_msg fcEm6" id="TortReport_url_em_" style="display:none"></div>			</div>
			<div class="ui_text_block">
				<label for="content" class="fcEm3 title">補充說明：</label>
				<textarea class="ui_text_textarea" name="TortReport[content]" id="TortReport_content"></textarea>    			<div class="ui_text_tips error_msg fcEm6" id="TortReport_content_em_" style="display:none"></div>				
				<p class="fcEm4 ui_text_tips">
					<input id="ytTortReport_statement" type="hidden" value="0" name="TortReport[statement]" /><input class="mr5" name="TortReport[statement]" id="TortReport_statement" value="1" checked="checked" type="checkbox" />					本人聲明以上通知書所載相關資料均為真實，且本人是著作權人或著作權人之代理人。本人相信以上侵權內容的使用是未經過合法授權或違反著作權法。 如以上資訊有不實致BuzzHand或他人受損害者，著作權人願負法律責任。
    				<div class="ui_text_tips error_msg fcEm6" id="TortReport_statement_em_" style="display:none"></div>				</p>
			</div>
			<div class="ui_text_block">
				<label for="title " class="fcEm3 title">*電子簽名(請輸入您的全名)：</label>
				<input class="ui_text_input" name="TortReport[sign]" id="TortReport_sign" type="text" />    			<div class="ui_text_tips error_msg fcEm6" id="TortReport_sign_em_" style="display:none"></div>			</div>
			<div class="ui_text_block">
				<label for="email" class="fcEm3 title">*驗證碼：</label>
				<input class="ui_text_input short" placeholder="驗證碼" name="TortReport[verifyCode]" id="TortReport_verifyCode" type="text" />                <img id="yw0" src="/help/captcha.html?v=54584d8f05b0c" alt="" />				<div class="ui_text_tips error_msg fcEm6" id="TortReport_verifyCode_em_" style="display:none"></div>			</div>
			<div class="ui_text_block">
				<input type="submit" class="ui_btn ui_btn_green2 ui_text_tips f16 fb" name="submit" value="發送">
			</div>
		</form>	</div>
</div>
