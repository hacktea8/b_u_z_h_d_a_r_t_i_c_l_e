<div id="container" class="clearfix member_wrap">
  <!-- main -->
  <div class="main fl">
    <!-- main_wrap -->
<div class="main_wrap">
<?php require_once 'my_rightbar.php';?>
  <!-- member_block -->
  <div class="mt20 ui_blockbg member_block p20">
    <div>
      <h2 class="f16">
        匯款資訊
      </h2>
      <p class="mt5 member_warning">
        匯款訊息
        <br>
<?php if($uinfo['amount']<$low_money){?>
        您累積至 <?php echo date('Y/m/d');?> 的收益尚未達到最低匯款金額 US $<?php echo $low_money;?>。本月您不會收到匯款，您的收益將會累積至下個月份。
<?php }?>
      </p>
      <table class="member_table remind mt20">
        <thead>
          <tr>
            <th width="33%">
              下次匯款
            </th>
            <th width="33%">
              前次匯款
            </th>
            <th width="33%">
              總匯款
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td width="33%" class="fcEm7">
              US $<?php echo $rinfo['next'];?>
            </td>
            <td width="33%" class="fcEm7">
              US $<?php echo $rinfo['pre'];?>
            </td>
            <td width="33%" class="fcEm7">
              US $<?php echo $rinfo['all'];?>
            </td>
          </tr>
        </tbody>
      </table>
      <p class="mt5">
        *上個月的收益會在本月結束以前匯出，詳情請參考匯款常見問題。
      </p>
    </div>
    <div class="mt20">
      <h2>
        匯款記錄
      </h2>
      <table class="member_table list mt5">
        <thead>
          <tr>
            <th width="20%">
              日期
            </th>
            <th width="30%">
              交易代碼
            </th>
            <th width="30%">
              帳號
            </th>
            <th width="20%">
              金額
            </th>
          </tr>
        </thead>
        <tbody>
          <!-- loop list -->
<?php foreach($list as $v){?>
<tr>
  <td width="20%">
    <?php echo $v['dateline'];?>
  </td>
  <td width="30%">
    <?php echo $v['code'];?>
  </td>
  <td width="30%">
    <?php echo $v['account'];?>
  </td>
  <td width="20%">
    <?php echo $v['amount'];?>
  </td>
</tr>
<?php }?>
          <!-- end loop list -->
        </tbody>
      </table>
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
