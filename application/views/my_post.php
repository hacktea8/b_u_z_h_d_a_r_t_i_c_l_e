<div id="container" class="clearfix member_wrap">
  <!-- main -->
  <div class="main fl">
    <!-- main_wrap -->
<div class="main_wrap">
<?php require_once 'my_rightbar.php';?>
  <!-- member_block -->
  <div class="mt20 ui_blockbg member_block">
    <h2 class="title">
      我的文章
    </h2>
    <div class="p20">
      <table class="member_table list mt5">
        <thead>
          <tr>
            <td width="42%">
              標題
            </td>
            <td width="10%">
              點閱
            </td>
            <td width="10%">
              共推點閱
            </td>
            <td width="10%">
              收益
            </td>
            <td width="15%">
              發佈日期
            </td>
            <td width="13%">
              動作
            </td>
          </tr>
        </thead>
        <tbody>
          <!-- loop list -->
<?php foreach($list as $v){?>
<tr>
  <td width="42%">
    <a href="<?php echo $v['url'];?>" target="_blank">
      <?php echo $v['title'];?>
    </a>
  </td>
  <td width="10%">
    <?php echo $v['hits'];?>
  </td>
  <td width="10%">
    <?php echo $v['coop_hits'];?>
  </td>
  <td width="10%" class="fcEm6">
    US $<?php echo $v['hits_money']+$v['coop_money'];?>
  </td>
  <td width="15%">
    <?php echo $v['ptime'];?>
  </td>
  <td width="13%">
    <a href="/console/postedit/<?php echo $v['id'];?>" class="ui_icon ui_icon20 ui_icon20_edit ml5 mr5">
      編輯
    </a>
    <a class="ui_icon ui_icon20 ui_icon20_del" onclick="delConfirm(<?php echo $v['id'];?>, '/console/postdelete/<?php echo $v['id'];?>');">
      刪除
    </a>
  </td>
</tr>
<?php }?>
          <!-- end loop list -->
        </tbody>
      </table>
      <div class="ui_pagination mt10 tr">
      </div>
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
