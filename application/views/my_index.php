<div id="container" class="clearfix member_wrap">
  <!-- main -->
  <div class="main fl">
    <!-- main_wrap -->
    <div class="main_wrap">
      <!-- member_block -->
<?php require_once 'my_rightbar.php';?>
      <!-- end member_block -->
      <!-- member_block -->
      <div class="mt20 ui_blockbg member_block p20">
        <div>
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
                  US $<?php echo $userProfit['total']['cash']['now'];?>
                </td>
                <td width="25%" class="fcEm7">
                  US $<?php echo $userProfit['total']['cash']['pre'];?>
                </td>
                <td width="25%" class="fcEm7">
                  US $<?php echo $userProfit['total']['cash']['month'];?>
                </td>
                <td width="25%" class="fcEm7">
                  US $<?php echo $userProfit['total']['cash']['all'];?>
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
                  未支付
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="25%">
                  <?php echo $userProfit['total']['hit']['now'];?>
                </td>
                <td width="25%">
                  <?php echo $userProfit['total']['hit']['pre'];?>
                </td>
                <td width="25%">
                  <?php echo $userProfit['total']['hit']['month'];?>
                </td>
                <td width="25%">
                  <?php echo $userProfit['total']['hit']['all'];?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- end member_block -->
      <!-- member_block -->
      <div class="mt20 ui_blockbg member_block p20">
        <h2>
          我的主題
        </h2>
        <table class="member_table list mt5">
          <thead>
            <tr>
              <th width="36%">
                標題
              </th>
              <th width="10%">
                共推點閱
              </th>
              <th width="10%">
                點閱
              </th>
              <th width="15%">
                收益
              </th>
              <th width="15%">
                發佈日期
              </th>
              <th width="16%">
                動作
              </th>
            </tr>
          </thead>
          <tbody>
            <!-- loop list -->
<?php foreach($list as $v){?>
<tr>
  <td width="36%">
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
  <td width="15%" class="fcEm6">
    US $<?php echo $v['hits_money'];?>/<?php echo $v['coop_money'];?>
  </td>
  <td width="15%">
    <?php echo $v['ptime'];?>
  </td>
  <td width="16%">
<a class="ui_icon ui_icon20" style="text-indent:0;padding-top:5px">
  <div class="addthis_sharing_toolbox" addthis:url="<?php echo $site_url,$v['url'];?>"
  addthis:title="<?php echo $v['title'];?>">
  </div>
</a>
<a href="/console/postedit/<?php echo $v['id'];?>" class="ui_icon ui_icon20 ui_icon20_edit ml5 mr5">
  編輯
</a>
<a class="ui_icon ui_icon20 ui_icon20_del" onclick='delConfirm( <?php echo $v['id'];?>, "/console/postdelete/<?php echo $v['id'];?>");'>
  刪除
</a>
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
