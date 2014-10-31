<div id="container" class="clearfix member_wrap">
    <!-- main -->
    <div class="main fl">
    <!-- main_wrap -->
    <div class="main_wrap">
<?php require_once 'my_rightbar.php';?>
    	<!-- member_block -->
    	<div class="mt20 ui_blockbg member_block">
    	<h2 class="title">作者頻道設定</h2>
    	<div class="p20">
         <form enctype="multipart/form-data" id="Channel-form" action="/console/channel.html" method="post">
           <div class="ui_text_block">
    		<label class="fcEm3 title" for="pubTitle">*頻道名稱：</label>
    		<input class="ui_text_input" name="Channel[title]" id="Channel_name" type="text" maxlength="100" value="<?php echo $channel['title'];?>" />    				    			</div>
    		<div class="ui_text_block">
    		<label class="fcEm3 title vt" for="pubContent">頻道介紹：</label>
    		<textarea class="ui_text_textarea" name="Channel[intro]" id="Channel_intro"><?php echo $channel['intro'];?></textarea>    				    			</div>
    		<div class="ui_text_block">
    		<label class="fcEm3 title vt">*當前頻道圖示：</label>
    		<div class="ib tc">
    		<div class="block img ui_imgbg mb5 channel">
    	 <a>
    	<img id="logo" src="<?php echo $channel['pic'];?>" />
    	</a>
    	</div>
    	<a class="ui_btn ui_btn_white hide" href="#" id="yt0">清除圖示</a>
    	 </div>
    	</div>
<?php if(0){?>
    	<div class="ui_text_block">
    	 <label class="fcEm3 title vt" for="pubTag">*頻道圖示：</label>
    	 <!-- <input type="file" name="logo" id="uploadify"> -->
	 <div class="ib ui_uploadimg" id="uploadImgWrap">
	  <div class="mt10 mb10">
	   <div id="curImg" class="cur_img ui_imgbg">
           </div>
	   <div id="previewImg" class="preview_img ui_imgbg channel" data-width="164" data-height="164">
	   </div>
	  </div>
	  <a class="ui_btn ui_btn_upload" data-wrap="logo">保存頻道圖示</a>
	</div>
    	</div>
<?php }else{?>
<?php }?>
<div class="ui_text_block"> 
 <label class="fcEm3 title" for="pubTitle">*頻道封面：</label>
 <input class="ui_text_input" name="Channel[cover]" id="input_cover" type="text" maxlength="100" value="<?php echo $channel['pic'];?>">
	  <div id="uploadImg">
<img src="http://i2.tietuku.com/674a895eaa333a88.png" alt ="tietuku" style ="cursor:pointer" onclick="tietuku_upload()"/>
<script language = "javascript" type = "text/javascript"  src="http://static.tietuku.com/static/open/tietuku.jquery.min.js"></script>
<script language = "javascript" type = "text/javascript"  src="http://static.tietuku.com/static/open/tietuku.dialog.js"></script>
<script type = "text/javascript"  src="<?php echo $cdn_url,'/js/ttk_upload.js?v=',$version;?>"></script>
         </div>
</div>
    	<div class="ui_text_block">
    			
        <label class="fcEm3 title">自定義頻道網址：</label>
            <span class="fcEm3"><?php echo $base_url,$channel['urlkey'];if( !$channel['urlkey']){;?></span>
            <input class="ui_text_input" name="Channel[urlkey]" id="Channel_urlkey"
            type="text" maxlength="25">
<?php }?>
          </span>
<?php if( !$channel['urlkey']){;?>
        <p>
          自訂頻道網址設定後無法更改，請輸入3至25個字元的“英文”、“數字”、"_"，設定後從舊網址進來的訪客也會被>自動轉至新網址。
        </p>
<?php }?>
   </div>
   <div class="ui_text_block">
    <input type="submit" value="更新資料" name="submit" class="ui_btn ui_btn_green2 ui_text_tips f16 fb">
   </div>
    	</form>
    	</div>
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

<link href="<?php echo $cdn_url;?>/js/uploadify/uploadify.css?v=<?php echo $version;?>" rel="stylesheet">
<script src="<?php echo $cdn_url;?>/js/uploadify/jquery.uploadify.min.js?v=<?php echo $version;?>"></script>
<script src="<?php echo $cdn_url;?>/js/console_channel.js?v=<?php echo $version;?>"></script>
