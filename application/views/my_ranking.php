<div id="container" class="clearfix member_wrap">
  <!-- main -->
  <div class="main fl">
    <!-- main_wrap -->
<div class="main_wrap">
<?php require_once 'my_rightbar.php';?>
    	<!-- member_block -->
	    <div class="mt20 ui_blockbg member_block p20">
	    	<div class="member_remind">
	    		<h3>
	    			會員等級如何運作？
	    		</h3>
	    		<p>
	    			等級為您從今天往前推30天的總點閱數(包括您所發表的所有文章)，每個級別都有不同額外獎金，額外獎金將會在換算您收益時自動列入計算。
	    		</p>
	    	</div>
	    	<div class="mt20">
	    		<h2>
	    			您的等級
	    		</h2>
	    		<table class="member_table level mt5">
	    			<tbody>
	    				<tr>
	    					<th width="15%">
	    						會員種類
	    					</th>
	    					<td width="85%">
								<?php echo $userGroup[$uinfo['gid']]['title'];?>
                            </td>
	    				</tr>
	    				<tr>
	    					<th width="15%">
	    						點閱收益
	    					</th>
	    					<td width="85%">
	    						$<?php echo $userGroup[$uinfo['gid']]['price'];?> / 千點閱
	    					</td>
	    				</tr>
	    				<tr>
	    						
	  					<th width="15%">
	  						您的等級
	    		  		</th>
	    					<td width="85%">
	    						<span class="ui_icon ui_icon_level ui_icon_level<?php echo $uinfo['wid']-1;?>"></span>
	    						<span class="vm"><?php echo $writerGroup[$uinfo['wid']]['title'];?></span>
	    					</td>
	    				</tr>
	    				<tr>
	    					<th width="15%">
	    						30天點閱數
	    					</th>
	    					<td width="85%">
	<?php echo $uinfo['month_hits'];?>
                            </td>
	    				</tr>
	    				<tr>
	    					<th width="15%">
	    						下一個等級
	    					</th>
	    					<td width="85%">
	    						100個點閱數後升級
	    						<div class="ui_progress_bar mt10">
	    							<div class="bar_bg" style="width:0%;"> </div>
	    							<div class="bar_text rc5">
	    								0%
	    							</div>
	    						</div>
	    					</td>
	    				</tr>
	    			</tbody>
	    		</table>
	    	</div>
	    	
	    	<div class="mt20">
	    		<h2>
	    			會員種類
	    		</h2>
	    		<table class="member_table list mt5">
	    			<thead>
	    				<tr>
	    					<th width="15%">
	    						會員種類
	    					</th>
	    					<th width="15%">
	    						收益/千點閱
	    					</th>
	    					<th width="70%">
	    						條件
	    					</th>
	    				</tr>
	    			</thead>
	    			<tbody>
<?php foreach($userGroup as $v){?>
	    				<tr>
	    					<td width="15%">
	    					<?php echo $v['title'];?>
                            </td>
	    					<td width="15%">
	    						US $<?php echo $v['price'];?></td>
	    					<td width="70%">
	    						<?php echo $v['note'];?></td>
	    				</tr>
<?php }?>
	    			</tbody>
	    		</table>
	    	</div>
	    	
	    	<div class="mt20">
	    		<h2>
	    			等级奖金表
	    		</h2>
	    		<table class="member_table list mt5">
	    			<thead>
	    				<tr>
	    					<th width="15%">
	    						等级
	    					</th>
	    					<th width="15%">
	    						30天點閱數
	    					</th>
	    					<th width="70%">
	    						額外獎金
	    					</th>
	    				</tr>
	    			</thead>
	    			<tbody>
<?php foreach($writerGroup as $k =>$v){?>
	    				<tr>
	    					<td width="33%">
	    						<span class="ui_icon ui_icon_level ui_icon_level<?php echo $k-1;?>"></span>
	    						<span class="vm"><?php echo $v['title'];?></span>
	    					</td>
	    					<td width="33%">
	    						<?php echo $v['hits'];?></td>
	    					<td width="33%">
	    						<?php echo $v['award'];?>%
	    					</td>
	    				</tr>
<?php }?>
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
