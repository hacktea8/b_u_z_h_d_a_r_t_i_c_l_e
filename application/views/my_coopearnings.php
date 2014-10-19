<div id="container" class="clearfix member_wrap">
  <!-- main -->
  <div class="main fl">
    <!-- main_wrap -->
<div class="main_wrap">
<?php require_once 'my_rightbar.php';?>

  <div class="mt20 ui_blockbg member_block p20">
    <div class="member_remind">
      <p>
        此頁面會顯示您幫忙推廣其他會員的文章所產生的收益。若您的文章被別人推廣，並不會顯示於此頁，會直接累積至"我的文章"和"收益報告"頁面。 若您想要馬上開始推廣其他人的文章，請至文章共同推廣清單。
      </p>
    </div>
    <div class="mt20">
      <h2>
        幫推收益
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
              US $<?php echo $userProfit['coop']['cash']['now'];?>
            </td>
            <td width="25%" class="fcEm7">
              US $<?php echo $userProfit['coop']['cash']['pre'];?>
            </td>
            <td width="25%" class="fcEm7">
              US $<?php echo $userProfit['coop']['cash']['month'];?>
            </td>
            <td width="25%" class="fcEm7">
              US $<?php echo $userProfit['coop']['cash']['all'];?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="mt20">
      <h2>
        幫推點閱數
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
              未支付
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td width="25%" class="fcEm7">
              <?php echo $userProfit['coop']['hit']['now'];?>
            </td>
            <td width="25%" class="fcEm7">
              <?php echo $userProfit['coop']['hit']['pre'];?>
            </td>
            <td width="25%" class="fcEm7">
              <?php echo $userProfit['coop']['hit']['month'];?>
            </td>
            <td width="25%" class="fcEm7">
              <?php echo $userProfit['coop']['hit']['all'];?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!-- member_block -->
  <div class="mt20 ui_blockbg member_block p20">
    <h2>
      30天幫推記錄
    </h2>
    <table class="member_table list mt5">
      <thead>
        <tr>
          <th width="30%">
            日期
          </th>
          <th width="22%">
            點閱數
          </th>
          <th width="22%">
            抽成
          </th>
          <th width="26%">
            收益
          </th>
        </tr>
      </thead>
      <tbody>
        <!-- loop list -->
<?php foreach($list as $v){?>
<tr>
  <td width="50%">
    <?php echo $v['Ymd'];?>
  </td>
  <td width="20%">
    <?php echo $v['hits'];?>
  </td>
  <td width="20%">
    <?php echo $v['coop'];?>
  </td>
  <td width="10%">
    <?php echo $v['amount'];?>
  </td>
</tr>
<?php }?>
        <!-- end loop list -->
      </tbody>
    </table>
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
