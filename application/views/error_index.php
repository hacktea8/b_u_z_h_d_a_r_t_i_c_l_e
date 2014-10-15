<div id="container" class="clearfix error_wrap">
  <div class="error_msg mt20 clearfix">
    <span class="ui_icon ui_icon_sorry fl mr10">
    </span>
    <p class="f18 vb">
      您訪問的頁面暫時不能顯示，猜您喜歡以下精彩內容
    </p>
  </div>
  <div class="ui_blockbg ui_list3 mt20 p10">
    <h2 class="fcEm7">
      猜您喜歡
    </h2>
    <ul>
<?php foreach($maybeYouLike as $v){?>
      <li style="width: 255px;">
        <div class="img ui_imgbg">
          <a title="<?php echo $v['title'];?>" href="<?php echo $v['url'];?>">
            <img src="<?php echo $v['pic'];?>">
          </a>
        </div>
        <h3 class="mt5">
          <?php echo $v['title'];?>
        </h3>
      </li>
<?php }?>
    </ul>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
 $.get('/<?php echo $_c;?>/<?php echo $_a;?>');
});
</script>
