<div id="container" class="clearfix member_wrap">
  <!-- main -->
  <div class="main fl">
    <!-- main_wrap -->
<div class="main_wrap">
<?php require_once 'my_rightbar.php';?>
  <!-- member_block -->
  <div class="mt20 ui_blockbg member_block p20">
    <div class="mt20">
      <h2>
        收益
      </h2>
      <table class="member_table remind mt5">
        <thead>
          <tr>
            <th width="25%">
              本日
            </th>
            <th width="25%">
              昨日
            </th>
            <th width="25%">
              本月
            </th>
            <th width="25%">
              未支付
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td width="25%" class="fcEm7">
              US $<?php echo $userProfit['click']['cash']['now'];?>
            </td>
            <td width="25%" class="fcEm7">
              US $<?php echo $userProfit['click']['cash']['pre'];?>
            </td>
            <td width="25%" class="fcEm7">
              US $<?php echo $userProfit['click']['cash']['month'];?>
            </td>
            <td width="25%" class="fcEm7">
              US $<?php echo $userProfit['click']['cash']['all'];?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="mt20">
      <h2>
        點閱數
      </h2>
      <table class="member_table tips mt5">
        <thead>
          <tr>
            <th width="25%">
              本日
            </th>
            <th width="25%">
              昨日
            </th>
            <th width="25%">
              本月
            </th>
            <th width="25%">
              點閱數
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td width="25%">
              <?php echo $userProfit['click']['hit']['now'];?>
            </td>
            <td width="25%">
              <?php echo $userProfit['click']['hit']['pre'];?>
            </td>
            <td width="25%">
              <?php echo $userProfit['click']['hit']['month'];?>
            </td>
            <td width="25%">
              <?php echo $userProfit['click']['hit']['all'];?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!-- end member_block -->
  <div class="mt20 ui_blockbg member_block p20">
    <h2>
      收益記錄
    </h2>
    <table class="member_table list mt5">
      <thead>
        <tr>
          <th width="25%">
            日期
          </th>
          <th width="25%">
            點閱數
          </th>
          <th width="25%">
            收益
          </th>
          <th width="25%">
            狀態
          </th>
        </tr>
      </thead>
      <tbody>
        <!-- loop list -->
<?php foreach($list as $v){?>
<tr>
  <td width="25%">
   <?php echo $v['Ymd'];?> 
  </td>
  <td width="25%">
    <?php echo $v['click_count'];?>
  </td>
  <td width="25%">
    <?php echo $v['click_amount'];?>
  </td>
  <td width="25%">
    
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
    <!-- end main_wrap -->
  </div>
  <!-- end main -->
  <!-- sidebar -->
  <?php require_once 'my_leftbar.php';?>
  <!-- end sidebar -->
</div>
