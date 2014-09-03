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
          聯絡資訊未齊全，您必須輸入您的聯絡資訊才能收到本站匯款，
          <a href="/my/profile.html">
            更新聯絡資訊
          </a>
        </p>
      </div>
      <!-- member_block -->
      <div class="mt20 ui_blockbg member_block">
        <h2 class="title">
          發表文章
        </h2>
        <div class="p20">
          <form enctype="multipart/form-data" id="Post-form" action="/my/postcreate.html"
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
                <input id="ytPost_is_original" type="hidden" value="" name="Post[is_original]">
                <span id="Post_is_original">
                  <input id="Post_is_original_0" value="0" checked="checked" type="radio"
                  name="Post[is_original]">
                  <label for="Post_is_original_0">
                    轉載
                  </label>
                  <br>
                  <input id="Post_is_original_1" value="1" type="radio" name="Post[is_original]">
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
              type="text">
              <div class="ui_text_tips error_msg fcEm6" id="Post_original_url_em_" style="display:none">
              </div>
              <div class="ui_text_tips" id="no_infringement_">
                <label class="fcEm3 title none" for="pubGrade">
                </label>
                <label>
                  <input id="ytPost_no_infringement" type="hidden" value="0" name="Post[no_infringement]">
                  <input name="Post[no_infringement]" id="Post_no_infringement" value="1"
                  type="checkbox">
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
              <input class="ui_text_input" onblur="Members.ckList({target: this, url:'/my/chkTitle.html', post_id:0})"
              name="Post[title]" id="Post_title" type="text" maxlength="65">
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
              <div id="Post_content" class="edui-default">
                <div id="edui1" class="edui-editor  edui-default" style="width: 100%; z-index: 999;">
                  <div id="edui1_toolbarbox" class="edui-editor-toolbarbox edui-default">
                    <div id="edui1_toolbarboxouter" class="edui-editor-toolbarboxouter edui-default">
                      <div class="edui-editor-toolbarboxinner edui-default">
                        <div id="edui2" class="edui-toolbar   edui-default" onselectstart="return false;"
                        onmousedown="return $EDITORUI[&quot;edui2&quot;]._onMouseDown(event, this);"
                        style="-webkit-user-select: none;">
                          <div id="edui91" class="edui-box edui-button edui-for-fullscreen edui-default">
                            <div id="edui91_state" onmousedown="$EDITORUI[&quot;edui91&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui91&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui91&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui91&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui91_body" unselectable="on" title="全屏" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui91&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui91&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                  <div class="edui-box edui-label edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui3" class="edui-box edui-button edui-for-source edui-default">
                            <div id="edui3_state" onmousedown="$EDITORUI[&quot;edui3&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui3&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui3&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui3&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui3_body" unselectable="on" title="源代碼" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui3&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui3&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui4" class="edui-box edui-separator  edui-default">
                          </div>
                          <div id="edui5" class="edui-box edui-button edui-for-undo edui-default">
                            <div id="edui5_state" onmousedown="$EDITORUI[&quot;edui5&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui5&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui5&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui5&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui5_body" unselectable="on" title="撤銷" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui5&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui5&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui6" class="edui-box edui-button edui-for-redo edui-default">
                            <div id="edui6_state" onmousedown="$EDITORUI[&quot;edui6&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui6&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui6&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui6&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui6_body" unselectable="on" title="重做" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui6&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui6&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui7" class="edui-box edui-separator  edui-default">
                          </div>
                          <div id="edui8" class="edui-box edui-button edui-for-bold edui-default">
                            <div id="edui8_state" onmousedown="$EDITORUI[&quot;edui8&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui8&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui8&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui8&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui8_body" unselectable="on" title="加粗" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui8&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui8&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui9" class="edui-box edui-button edui-for-italic edui-default">
                            <div id="edui9_state" onmousedown="$EDITORUI[&quot;edui9&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui9&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui9&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui9&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui9_body" unselectable="on" title="斜體" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui9&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui9&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui10" class="edui-box edui-button edui-for-underline edui-default">
                            <div id="edui10_state" onmousedown="$EDITORUI[&quot;edui10&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui10&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui10&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui10&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui10_body" unselectable="on" title="下劃線" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui10&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui10&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui11" class="edui-box edui-button edui-for-strikethrough edui-default">
                            <div id="edui11_state" onmousedown="$EDITORUI[&quot;edui11&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui11&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui11&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui11&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui11_body" unselectable="on" title="刪除線" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui11&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui11&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui12" class="edui-box edui-separator  edui-default">
                          </div>
                          <div id="edui13" class="edui-box edui-button edui-for-superscript edui-default">
                            <div id="edui13_state" onmousedown="$EDITORUI[&quot;edui13&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui13&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui13&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui13&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui13_body" unselectable="on" title="上標" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui13&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui13&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui14" class="edui-box edui-button edui-for-subscript edui-default">
                            <div id="edui14_state" onmousedown="$EDITORUI[&quot;edui14&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui14&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui14&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui14&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui14_body" unselectable="on" title="下標" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui14&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui14&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui15" class="edui-box edui-separator  edui-default">
                          </div>
                          <div id="edui16" class="edui-box edui-splitbutton edui-for-forecolor edui-default edui-colorbutton">
                            <div title="字體顏色" id="edui16_state" onmousedown="$EDITORUI[&quot;edui16&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui16&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui16&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui16&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-splitbutton-body edui-default">
                                <div id="edui16_button_body" class="edui-box edui-button-body edui-default"
                                onclick="$EDITORUI[&quot;edui16&quot;]._onButtonClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                  <div id="edui16_colorlump" class="edui-colorlump">
                                  </div>
                                </div>
                                <div class="edui-box edui-splitborder edui-default">
                                </div>
                                <div class="edui-box edui-arrow edui-default" onclick="$EDITORUI[&quot;edui16&quot;]._onArrowClick();">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui19" class="edui-box edui-separator  edui-default">
                          </div>
                          <div id="edui20" class="edui-box edui-button edui-for-removeformat edui-default">
                            <div id="edui20_state" onmousedown="$EDITORUI[&quot;edui20&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui20&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui20&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui20&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui20_body" unselectable="on" title="清除格式" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui20&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui20&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui21" class="edui-box edui-separator  edui-default">
                          </div>
                          <div id="edui22" class="edui-box edui-button edui-for-selectall edui-default">
                            <div id="edui22_state" onmousedown="$EDITORUI[&quot;edui22&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui22&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui22&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui22&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui22_body" unselectable="on" title="全選" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui22&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui22&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui23" class="edui-box edui-button edui-for-cleardoc edui-default">
                            <div id="edui23_state" onmousedown="$EDITORUI[&quot;edui23&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui23&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui23&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui23&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui23_body" unselectable="on" title="清空文檔" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui23&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui23&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                  <div class="edui-box edui-label edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui24" class="edui-box edui-combox edui-for-paragraph edui-default">
                            <div title="段落格式" id="edui24_state" onmousedown="$EDITORUI[&quot;edui24&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui24&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui24&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui24&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-combox-body edui-default">
                                <div id="edui24_button_body" class="edui-box edui-button-body edui-default"
                                onclick="$EDITORUI[&quot;edui24&quot;]._onButtonClick(event, this);">
                                  段落格式
                                </div>
                                <div class="edui-box edui-splitborder edui-default">
                                </div>
                                <div class="edui-box edui-arrow edui-default" onclick="$EDITORUI[&quot;edui24&quot;]._onArrowClick();">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui33" class="edui-box edui-separator  edui-default">
                          </div>
                          <div id="edui34" class="edui-box edui-combox edui-for-fontfamily edui-default">
                            <div title="字體" id="edui34_state" onmousedown="$EDITORUI[&quot;edui34&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui34&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui34&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui34&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-combox-body edui-default">
                                <div id="edui34_button_body" class="edui-box edui-button-body edui-default"
                                onclick="$EDITORUI[&quot;edui34&quot;]._onButtonClick(event, this);">
                                  字體
                                </div>
                                <div class="edui-box edui-splitborder edui-default">
                                </div>
                                <div class="edui-box edui-arrow edui-default" onclick="$EDITORUI[&quot;edui34&quot;]._onArrowClick();">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui47" class="edui-box edui-combox edui-for-fontsize edui-default">
                            <div title="字號" id="edui47_state" onmousedown="$EDITORUI[&quot;edui47&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui47&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui47&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui47&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-combox-body edui-default">
                                <div id="edui47_button_body" class="edui-box edui-button-body edui-default"
                                onclick="$EDITORUI[&quot;edui47&quot;]._onButtonClick(event, this);">
                                  字號
                                </div>
                                <div class="edui-box edui-splitborder edui-default">
                                </div>
                                <div class="edui-box edui-arrow edui-default" onclick="$EDITORUI[&quot;edui47&quot;]._onArrowClick();">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui58" class="edui-box edui-separator  edui-default">
                          </div>
                          <div id="edui59" class="edui-box edui-button edui-for-justifyleft edui-default">
                            <div id="edui59_state" onmousedown="$EDITORUI[&quot;edui59&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui59&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui59&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui59&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui59_body" unselectable="on" title="居左對齊" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui59&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui59&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                  <div class="edui-box edui-label edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui60" class="edui-box edui-button edui-for-justifycenter edui-default">
                            <div id="edui60_state" onmousedown="$EDITORUI[&quot;edui60&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui60&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui60&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui60&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui60_body" unselectable="on" title="居中對齊" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui60&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui60&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                  <div class="edui-box edui-label edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui61" class="edui-box edui-button edui-for-justifyright edui-default">
                            <div id="edui61_state" onmousedown="$EDITORUI[&quot;edui61&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui61&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui61&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui61&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui61_body" unselectable="on" title="居右對齊" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui61&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui61&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                  <div class="edui-box edui-label edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui62" class="edui-box edui-button edui-for-justifyjustify edui-default">
                            <div id="edui62_state" onmousedown="$EDITORUI[&quot;edui62&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui62&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui62&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui62&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui62_body" unselectable="on" title="兩端對齊" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui62&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui62&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                  <div class="edui-box edui-label edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="edui63" class="edui-toolbar   edui-default" onselectstart="return false;"
                        onmousedown="return $EDITORUI[&quot;edui63&quot;]._onMouseDown(event, this);"
                        style="-webkit-user-select: none;">
                          <div id="edui70" class="edui-box edui-button edui-for-link edui-default">
                            <div id="edui70_state" onmousedown="$EDITORUI[&quot;edui70&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui70&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui70&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui70&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui70_body" unselectable="on" title="超鏈接" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui70&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui70&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                  <div class="edui-box edui-label edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui71" class="edui-box edui-button edui-for-unlink edui-default">
                            <div id="edui71_state" onmousedown="$EDITORUI[&quot;edui71&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui71&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui71&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui71&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui71_body" unselectable="on" title="取消鏈接" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui71&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui71&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui72" class="edui-box edui-separator  edui-default">
                          </div>
                          <div id="edui77" class="edui-box edui-button edui-for-insertimage edui-default">
                            <div id="edui77_state" onmousedown="$EDITORUI[&quot;edui77&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui77&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui77&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui77&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui77_body" unselectable="on" title="多圖上傳" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui77&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui77&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                  <div class="edui-box edui-label edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui82" class="edui-box edui-button edui-for-insertvideo edui-default">
                            <div id="edui82_state" onmousedown="$EDITORUI[&quot;edui82&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui82&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui82&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui82&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui82_body" unselectable="on" title="視頻" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui82&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui82&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                  <div class="edui-box edui-label edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui83" class="edui-box edui-separator  edui-default">
                          </div>
                          <div id="edui84" class="edui-box edui-button edui-for-horizontal edui-default">
                            <div id="edui84_state" onmousedown="$EDITORUI[&quot;edui84&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui84&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui84&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui84&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui84_body" unselectable="on" title="分隔線" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui84&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui84&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui87" class="edui-box edui-button edui-for-searchreplace edui-default">
                            <div id="edui87_state" onmousedown="$EDITORUI[&quot;edui87&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui87&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui87&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui87&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui87_body" unselectable="on" title="查詢替換" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui87&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui87&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                  <div class="edui-box edui-label edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="edui90" class="edui-box edui-button edui-for-preview edui-default">
                            <div id="edui90_state" onmousedown="$EDITORUI[&quot;edui90&quot;].Stateful_onMouseDown(event, this);"
                            onmouseup="$EDITORUI[&quot;edui90&quot;].Stateful_onMouseUp(event, this);"
                            onmouseover="$EDITORUI[&quot;edui90&quot;].Stateful_onMouseOver(event, this);"
                            onmouseout="$EDITORUI[&quot;edui90&quot;].Stateful_onMouseOut(event, this);"
                            class="edui-default">
                              <div class="edui-button-wrap edui-default">
                                <div id="edui90_body" unselectable="on" title="預覽" class="edui-button-body edui-default"
                                onmousedown="return $EDITORUI[&quot;edui90&quot;]._onMouseDown(event, this);"
                                onclick="return $EDITORUI[&quot;edui90&quot;]._onClick(event, this);">
                                  <div class="edui-box edui-icon edui-default">
                                  </div>
                                  <div class="edui-box edui-label edui-default">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="edui1_toolbarmsg" class="edui-editor-toolbarmsg edui-default"
                    style="display:none;">
                      <div id="edui1_upload_dialog" class="edui-editor-toolbarmsg-upload edui-default"
                      onclick="$EDITORUI[&quot;edui1&quot;].showWordImageDialog();">
                        點擊上傳
                      </div>
                      <div class="edui-editor-toolbarmsg-close edui-default" onclick="$EDITORUI[&quot;edui1&quot;].hideToolbarMsg();">
                        x
                      </div>
                      <div id="edui1_toolbarmsg_label" class="edui-editor-toolbarmsg-label edui-default">
                      </div>
                      <div style="height:0;overflow:hidden;clear:both;" class="edui-default">
                      </div>
                    </div>
                    <div id="edui1_message_holder" class="edui-editor-messageholder edui-default"
                    style="top: 62px; z-index: 1000;">
                    </div>
                  </div>
                  <div id="edui1_iframeholder" class="edui-editor-iframeholder edui-default"
                  style="width: 100%; height: 600px; z-index: 999; overflow: hidden;">
                    <iframe id="ueditor_0" width="100%" height="100%" frameborder="0" src="javascript:void(function(){document.open();document.write(&quot;<!DOCTYPE html><html xmlns='http://www.w3.org/1999/xhtml' class='view' ><head><style type='text/css'>.view{padding:0;word-wrap:break-word;cursor:text;height:90%;}
                    body{margin:8px;font-family:sans-serif;font-size:16px;}p{margin:5px 0;}</style><link rel='stylesheet' type='text/css' href='/assets/ed82431f/themes/iframe.css'/></head><body class='view' ></body><script type='text/javascript'  id='_initialScript'>setTimeout(function(){editor = window.parent.UE.instants['ueditorInstant0'];editor._setup(document);},0);var _tmpScript = document.getElementById('_initialScript');_tmpScript.parentNode.removeChild(_tmpScript);</script></html>&quot;);document.close();}())">
                    </iframe>
                  </div>
                  <div id="edui1_bottombar" class="edui-editor-bottomContainer edui-default">
                    <table class="edui-default">
                      <tbody class="edui-default">
                        <tr class="edui-default">
                          <td id="edui1_elementpath" class="edui-editor-bottombar edui-default">
                          </td>
                          <td id="edui1_wordcount" class="edui-editor-wordcount edui-default">
                            字數統計
                          </td>
                          <td id="edui1_scale" class="edui-editor-scale edui-default" style="display: none;">
                            <div class="edui-editor-icon edui-default">
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div id="edui1_scalelayer" class="edui-default">
                  </div>
                </div>
              </div>
              <textarea name="Post[content]" tabindex="3" style="display: none;">
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
                <optgroup label="新聞">
                  <option value="54">
                    時事新聞
                  </option>
                  <option value="7">
                    社會萬象
                  </option>
                  <option value="8">
                    娛樂新聞
                  </option>
                  <option value="9">
                    體育新聞
                  </option>
                  <option value="10">
                    科技新聞
                  </option>
                  <option value="11">
                    財經新聞
                  </option>
                </optgroup>
                <optgroup label="奇趣">
                  <option value="12">
                    奇趣資訊
                  </option>
                  <option value="13">
                    奇趣貼圖
                  </option>
                  <option value="14">
                    惡搞圖集
                  </option>
                  <option value="15">
                    奇聞怪事
                  </option>
                  <option value="16">
                    驚悚恐怖
                  </option>
                  <option value="17">
                    笑話大全
                  </option>
                  <option value="18">
                    奇趣短片
                  </option>
                </optgroup>
                <optgroup label="生活">
                  <option value="19">
                    生活百科
                  </option>
                  <option value="20">
                    心理測驗
                  </option>
                  <option value="21">
                    創意生活
                  </option>
                  <option value="22">
                    健康養生
                  </option>
                  <option value="23">
                    美食天下
                  </option>
                  <option value="24">
                    親子婦幼
                  </option>
                  <option value="25">
                    旅遊資訊
                  </option>
                  <option value="26">
                    汽車頻道
                  </option>
                  <option value="27">
                    房產頻道
                  </option>
                  <option value="28">
                    投資理財
                  </option>
                  <option value="29">
                    命理星座
                  </option>
                  <option value="30">
                    心情日記
                  </option>
                  <option value="31">
                    兩性話題
                  </option>
                  <option value="32">
                    女性專區
                  </option>
                  <option value="33">
                    男性話題
                  </option>
                  <option value="34">
                    生活短片
                  </option>
                </optgroup>
                <optgroup label="科技">
                  <option value="35">
                    社媒資訊
                  </option>
                  <option value="36">
                    數位科技
                  </option>
                  <option value="37">
                    硬體資訊
                  </option>
                  <option value="38">
                    軟體資訊
                  </option>
                  <option value="39">
                    電玩資訊
                  </option>
                  <option value="40">
                    前沿探索
                  </option>
                </optgroup>
                <optgroup label="娛樂">
                  <option value="41">
                    正妹貼圖
                  </option>
                  <option value="42">
                    八卦圖文
                  </option>
                  <option value="43">
                    明星動態
                  </option>
                  <option value="44">
                    影視資訊
                  </option>
                  <option value="45">
                    時尚情報
                  </option>
                  <option value="46">
                    綜藝資訊
                  </option>
                  <option value="47">
                    遊戲動漫
                  </option>
                  <option value="48">
                    娛樂短片
                  </option>
                  <option value="57">
                    正妹短片
                  </option>
                </optgroup>
                <optgroup label="興趣">
                  <option value="49">
                    詩歌文學
                  </option>
                  <option value="50">
                    攝影技術
                  </option>
                  <option value="51">
                    寵物專區
                  </option>
                  <option value="52">
                    軍事資訊
                  </option>
                  <option value="53">
                    模型資訊
                  </option>
                  <option value="55">
                    興趣短片
                  </option>
                </optgroup>
              </select>
              <div class="ui_text_tips error_msg fcEm6" id="Post_cid2_em_" style="display:none">
              </div>
            </div>
            <div class="ui_text_block">
              <label class="fcEm3 title" for="pubTag">
                標籤：
              </label>
              <input class="ui_text_input" name="Post[tags]" id="Post_tags" type="text"
              maxlength="100">
              <div class="ui_text_tips error_msg fcEm6" id="Post_tags_em_" style="display:none">
              </div>
              <p class="fcEm4 ui_text_tips">
                請使用逗號分隔標籤。 例: 爆笑, 貼圖, 惡搞。 標籤可幫助使用者找到您的文章
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
                    90% 傭金
                  </option>
                  <option value="0.8">
                    80% 傭金
                  </option>
                  <option value="0.7">
                    70% 傭金
                  </option>
                  <option value="0.6">
                    60% 傭金
                  </option>
                  <option value="0.5">
                    50% 傭金
                  </option>
                  <option value="0.4">
                    40% 傭金
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
                <input id="ytPost_is_adult" type="hidden" value="0" name="Post[is_adult]">
                <input name="Post[is_adult]" id="Post_is_adult" value="1" type="checkbox">
                <div class="ui_text_tips error_msg fcEm6" id="Post_is_adult_em_" style="display:none">
                </div>
                此文章含有不適合孩童的內容。如有不適合小朋友的內容，請務必點選。
                <a target="_blank" class="fcEm7" href="/forum/post_4.html">
                  文章分級規範
                </a>
              </label>
              <input type="hidden" id="ct" name="ct" value="0">
            </div>
            <p class="ui_text_block">
              <input id="postSubmit" type="submit" value="發表" name="submit" class="ui_btn ui_btn_green2 ui_text_tips f16 fb">
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
  <div class="sidebar fl">
    <ul id="memberSidebar" class="member_sidebar mt20 ui_blockbg">
      <li class="user">
        <h3>
          <span class="fcEm6">
            HI，
          </span>
          1187247901
        </h3>
        <div class="img mt5 ui_imgbg ui_user_img pr">
          <a>
            <img src="/themes/default/images/user_def.jpg">
          </a>
          <a href="/my/profile.html" class="ui_btn ui_btn_white">
            修改頭像
          </a>
        </div>
        <p class="mt5">
          <span class="ui_icon ui_icon_level ui_icon_level0">
          </span>
          <span class="vm">
            書童
          </span>
        </p>
      </li>
      <li class="home">
        <a class="f16 icon_nav" href="/my/index.html">
          我的帳戶
        </a>
      </li>
      <li class="article on">
        <a class="f16 icon_nav showSubNav">
          文章
        </a>
        <ul class="sub">
          <li>
            <a class="f16" href="/my/post.html">
              我的文章
            </a>
          </li>
          <li>
            <a class="f16" href="/my/adult.html">
              未確認成人文章
            </a>
          </li>
          <li class="on">
            <a class="f16" href="/my/postcreate.html">
              發表文章
            </a>
          </li>
        </ul>
      </li>
      <li class="earnings on">
        <a class="f16 icon_nav showSubNav">
          收益
        </a>
        <ul class="sub">
          <li>
            <a class="f16" href="/my/earnings.html">
              收益報告
            </a>
          </li>
          <li>
            <a class="f16" href="/my/coopearnings.html">
              共推收益
            </a>
          </li>
          <li>
            <a class="f16" href="/my/recruit.html">
              下線會員
            </a>
          </li>
          <li>
            <a href="/my/ranking.html" class="f16">
              會員等级
            </a>
          </li>
          <li>
            <a href="/my/payrecords.html" class="f16">
              匯款記錄
            </a>
          </li>
        </ul>
      </li>
      <li class="spread on">
        <a class="f16 icon_nav">
          推廣
        </a>
        <ul class="sub">
          <li>
            <a class="f16" href="/my/adcode.html">
              廣告代碼
            </a>
          </li>
        </ul>
      </li>
      <li class="setting on">
        <a class="f16 icon_nav">
          設定
        </a>
        <ul class="sub">
          <li>
            <a class="f16" href="/my/channel.html">
              頻道設定
            </a>
          </li>
          <li>
            <a class="f16" href="/my/profile.html">
              個人資料
            </a>
          </li>
          <li>
            <a class="f16" href="/my/password.html">
              修改密碼
            </a>
          </li>
        </ul>
      </li>
      <li class="help on">
        <a class="f16 icon_nav">
          幫助
        </a>
        <ul class="sub">
          <li>
            <a class="f16" href="/forum/cate_1.html">
              常見問題
            </a>
          </li>
          <li>
            <a class="f16" href="/forum/cate_10.html">
              經驗分享
            </a>
          </li>
          <li>
            <a class="f16" href="/forum/cate_11.html">
              曬收入
            </a>
          </li>
          <li>
            <a class="f16" href="/forum/cate_12.html">
              提問題
            </a>
          </li>
          <li>
            <a class="f16" href="/forum/cate_13.html">
              文章共推
            </a>
          </li>
          <li>
            <a class="f16" href="/forum/cate_14.html">
              網站公告
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
  <!-- end sidebar -->
</div>
