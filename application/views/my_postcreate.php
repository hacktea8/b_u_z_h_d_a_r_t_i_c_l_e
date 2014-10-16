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
            <a href="/forum/post_286.html">
              buzzhand開始嚴厲打擊作弊行為
            </a>
          </li>
          <li>
            <a href="/forum/post_245.html">
              9月佣金發放中
            </a>
          </li>
          <li>
            <a href="/forum/post_237.html">
              統計暫停公告
            </a>
          </li>
          <!-- end loop list -->
        </ul>
        <p class="mt10 member_remind">
          您尚未設置您的頻道圖示
          <a href="/channel.html">
            馬上設置
          </a>
        </p>
      </div>
      <!-- member_block -->
      <div class="mt20 ui_blockbg member_block">
        <div class="title clearfix">
          <a style="color: #357fc6; font-size: 11px; margin-top: 7px;" class="fn ul fr fcEm7 mt5"
          href="http://www.buzzhand.com/forum/post_198.html">
            (了解什麼是免審核作者？)
          </a>
          <a class="fn ul fr fcEm7 mt5" href="/freeaudits.html?id=1182">
            申請免審核 &nbsp;&nbsp;
          </a>
          <h2 class="title">
            發表文章
          </h2>
        </div>
        <div class="p20">
          <form enctype="multipart/form-data" id="Post-form" action="/postcreate.html"
          method="post">
            <div class="ui_warning">
              發文章前請確認您已經仔細閱讀過
              <a target="_blank" class="fcEm7" href="/forum/post_1.html">
                發文規範
              </a>
              ，嚴重違反發文規範者，可能會被封號處理。
            </div>
            <div class="ui_text_block">
              <label class="fcEm3 title vt" for="pubSource">
                *內容來源：
              </label>
              <span class="ib">
                <input id="ytPost_is_original" type="hidden" value="" name="Post[is_original]"
                />
                <span id="Post_is_original">
                  <input id="Post_is_original_0" value="0" checked="checked" type="radio"
                  name="Post[is_original]" />
                  <label for="Post_is_original_0">
                    轉載
                  </label>
                  <br/>
                  <input id="Post_is_original_1" value="1" type="radio" name="Post[is_original]"
                  />
                  <label for="Post_is_original_1">
                    親自撰寫、拍攝
                  </label>
                </span>
              </span>
              <div class="ui_text_tips error_msg fcEm6" id="Post_is_original_em_" style="display:none">
              </div>
            </div>
            <div class="ui_text_block" id="original_url_">
              <label class="fcEm3 title" for="Post_original_url">
                *原文網址：
              </label>
              <input class="ui_text_input" name="Post[original_url]" id="Post_original_url"
              type="text" />
              <div class="ui_text_tips error_msg fcEm6" id="Post_original_url_em_" style="display:none">
              </div>
              <div class="ui_text_tips" id="no_infringement_">
                <label class="fcEm3 title none" for="pubGrade">
                </label>
                <label>
                  <input id="ytPost_no_infringement" type="hidden" value="0" name="Post[no_infringement]"
                  />
                  <input name="Post[no_infringement]" id="Post_no_infringement" value="1"
                  type="checkbox" />
                  轉載以上文章不會侵犯到原作權益或相關法律
                  <div class="error_msg fcEm6" id="Post_no_infringement_em_" style="display:none">
                  </div>
                </label>
              </div>
            </div>
            <div class="ui_text_block">
              <label class="fcEm3 title" for="Post_title">
                *標題：
              </label>
              <input class="ui_text_input" onblur="Members.ckList({target: this, url:&#039;/chkTitle.html&#039;, post_id:0})"
              name="Post[title]" id="Post_title" type="text" maxlength="65" />
              <div class="ui_text_tips error_msg fcEm6" id="Post_title_em_" style="display:none">
              </div>
              <p class="fcEm4 ui_text_tips">
                文章成功的關鍵在於精準聳動之標題
              </p>
              <div id="chkTitle">
              </div>
            </div>
            <div class="ui_text_block">
              <label class="fcEm3 title vt" for="pubSubTitle">
                摘要：
              </label>
              <textarea class="ui_text_textarea" name="Post[summary]" id="Post_summary">
              </textarea>
              <div class="ui_text_tips error_msg fcEm6" id="Post_summary_em_" style="display:none">
              </div>
              <p class="fcEm3 ui_text_tips">
                好的文章摘要會增加文章被分享的機會。
                <a target="_blank" style="color: #357fc6" href="/forum/post_47.html">
                  瞭解更多...
                </a>
              </p>
            </div>
            <div class="ui_text_block">
              <label class="fcEm3 title" for="pubImg">
                封面：
              </label>
              <input placeholder="網路圖片可以直接輸入網絡地址" type="text" class="ui_text_input"
              id="pubImg" name="pubImg" style="width: 50%;">
              <label class="ui_btn ui_btn_upload" for="uploadImg">
                上傳封面圖
              </label>
              <input class="none" type="file" placeholder="封面圖" id="uploadImg" name="uploadImg">
              <p class="fcEm4 ui_text_tips">
                一個好的文章封面會更加吸引人的注意，如果文章內文中無圖片最好上傳一張圖片作為封面；如果文章內文中有圖片可以不用專門上傳封面，系統會自動將內文中的第一張圖片設為文章封面。建議大小：500X290px，
                封面會做居中裁剪處理，所以請選擇合適比例的圖片才能獲得更好的效果。
              </p>
            </div>
            <div class="ui_text_block">
              <label class="fcEm3 title vt" for="pubContent">
                *內文：
              </label>
              <textarea name="Post[content]" id="Post_content" tabindex="3">
              </textarea>
              <div class="ui_text_tips error_msg fcEm6" id="Post_content_em_" style="display:none">
              </div>
              <p class="fcEm4 ui_text_tips">
                請詳細閱讀文章內容規範，未經作者同意請勿張貼他人編寫之內容，以免觸法。
              </p>
            </div>
            <div class="ui_text_block">
              <label class="fcEm3 title">
                *分類：
              </label>
              <select class="ui_text_select" name="Post[cid2]" id="Post_cid2">
                <option value="" selected="selected">
                  == 請選擇 ==
                </option>
<?php foreach($cate_info as $k => $v){
if($v['pcid']){
 continue;
}
?>
                <optgroup label="<?php echo $v['title'];?>">
<?php foreach($cate_info as $sk => $sv){
if($sv['pcid'] != $k){
 continue;
}
?>
                  <option value="<?php echo $k,'-',$sk;?>">
                    <?php echo $sv['title'];?>
                  </option>
<?php } ?>
</optgroup>
<?php 
  }
?>
              </select>
              <div class="ui_text_tips error_msg fcEm6" id="Post_cid2_em_" style="display:none">
              </div>
            </div>
            <div class="ui_text_block">
              <label class="fcEm3 title" for="pubTag">
                標籤：
              </label>
              <input class="ui_text_input" name="Post[tags]" id="Post_tags" type="text"
              maxlength="100" />
              <div class="ui_text_tips error_msg fcEm6" id="Post_tags_em_" style="display:none">
              </div>
              <p class="fcEm4 ui_text_tips">
                請使用逗號分隔標籤。 例: 爆笑, 貼圖,惡搞。標籤可幫助使用者找到您的文章
              </p>
            </div>
            <div class="ui_text_block" id="original_url_">
              <label class="fcEm3 title" for="Post_t_ratio">
                共推申請：
              </label>
              <select class="ui_text_select" name="Post[t_ratio]" id="Post_t_ratio">
                <option value="0" selected="selected">
                  我不願意讓其他會員推廣此文章
                </option>
                <optgroup label="申請讓其他會員推廣此文章，並讓其他會員抽取:">
                  <option value="0.9">
                    90%傭金
                  </option>
                  <option value="0.8">
                    80%傭金
                  </option>
                  <option value="0.7">
                    70%傭金
                  </option>
                  <option value="0.6">
                    60%傭金
                  </option>
                  <option value="0.5">
                    50%傭金
                  </option>
                  <option value="0.4">
                    40%傭金
                  </option>
                </optgroup>
              </select>
            </div>
            <div class="ui_text_block">
              <label class="fcEm3 title" for="pubGrade">
                <font style="color:red">
                  *文章分級：
                </font>
              </label>
              <label for="g1">
                <input id="ytPost_is_adult" type="hidden" value="0" name="Post[is_adult]"
                />
                <input name="Post[is_adult]" id="Post_is_adult" value="1" type="checkbox"
                />
                <div class="ui_text_tips error_msg fcEm6" id="Post_is_adult_em_" style="display:none">
                </div>
                此文章含有不適合孩童的內容。如有不適合小朋友的內容，請務必點選。
                <a target="_blank" class="fcEm7" href="/forum/post_4.html">
                  文章分級規範
                </a>
                。
                <a target="_blank" class="fcEm7" href="/forum/post_130.html">
                  忘記勾選會怎樣？
                </a>
              </label>
            </div>
            <p class="ui_text_block">
              <input id="postSubmit" type="submit" value="發表" name="submit" class="ui_btn ui_btn_green2 ui_text_tips f16 fb">
              <input type="hidden" id="ct" name="ct" value="">
            </p>
          </form>
        </div>
        <script>
          $(document).ready(function() {
            //$("#original_url_").hide();
            Members.init();

            if ($("#Post_is_original input:radio:checked").attr("id") == "Post_is_original_1") {
              $("#original_url_").hide();
            }
            $("#Post_is_original input:radio").click(function() {
              if ($(this).attr("id") == "Post_is_original_1" && ($(this).attr("checked") == true || $(this).attr("checked") == "checked")) {
                $("#original_url_").hide();
                $("#Post_original_url").val('');
                $("#no_infringement_").hide();

              } else {
                $("#original_url_").show();
                $("#no_infringement_").show();
              }
            });

            var checkSubmitFlg = false;
            function checkSubmit() {
              if (!checkSubmitFlg) {
                checkSubmitFlg = true;
                $("#postSubmit").addClass("disabled");
                $("#postSubmit").attr("disabled", "disabled");
                return true;
              } else {
                alert("Submit again!");
                return false;
              }
            }
            $("#Post-form").submit(function() {
              return checkSubmit();
            });

            $("#uploadImg").change(function() {
              console.log($(this).val());
              $("#pubImg").val($(this).val());
            });

          });
        </script>
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
<script type="text/javascript" src="<?php echo $cdn_url,'/js/jquery.yiiactiveform.js';?>"></script>
<script type="text/javascript" src="<?php echo $cdn_url,'/js/ueditor/ueditor.config.js';?>"></script>
<script type="text/javascript" src="<?php echo $cdn_url,'/js/ueditor/ueditor.all.min.js';?>"></script>
<script type="text/javascript" src="<?php echo $cdn_url,'/js/ueditor/uesite.config.js';?>"></script>
<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
jQuery('#Post-form').yiiactiveform({'attributes':[{'id':'Post_is_original','inputID':'Post_is_original','errorID':'Post_is_original_em_','model':'Post','name':'is_original','enableAjaxValidation':true},{'id':'Post_original_url','inputID':'Post_original_url','errorID':'Post_original_url_em_','model':'Post','name':'original_url','enableAjaxValidation':true},{'id':'Post_no_infringement','inputID':'Post_no_infringement','errorID':'Post_no_infringement_em_','model':'Post','name':'no_infringement','enableAjaxValidation':true},{'id':'Post_title','inputID':'Post_title','errorID':'Post_title_em_','model':'Post','name':'title','enableAjaxValidation':true},{'id':'Post_summary','inputID':'Post_summary','errorID':'Post_summary_em_','model':'Post','name':'summary','enableAjaxValidation':true},{'id':'Post_content','inputID':'Post_content','errorID':'Post_content_em_','model':'Post','name':'content','enableAjaxValidation':true},{'id':'Post_cid2','inputID':'Post_cid2','errorID':'Post_cid2_em_','model':'Post','name':'cid2','enableAjaxValidation':true},{'id':'Post_tags','inputID':'Post_tags','errorID':'Post_tags_em_','model':'Post','name':'tags','enableAjaxValidation':true},{'id':'Post_is_adult','inputID':'Post_is_adult','errorID':'Post_is_adult_em_','model':'Post','name':'is_adult','enableAjaxValidation':true}],'errorCss':'error'});
});
/*]]>*/
</script>
