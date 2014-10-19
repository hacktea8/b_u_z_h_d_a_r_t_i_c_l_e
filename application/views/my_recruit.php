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
    				招募系統如何運作？
    			</h2>
    			<p>您下線會員收益的<font style="color:green">15%</font>將會獎勵給您，所有透過您招募連結註冊之會員都會成為您的下層會員</p>
    		</div>

    		<div class="mt20">
    		<h2>
    			您的招募連結
    		</h2>
    		<div class="member_block_blockbg ui_blockbg p20 mt5">
    		 <div class="member_block_text">
    			 <div class="input rc5">
    				<input id="copyLink" type="text" class="ui_text_input fb fcEm3 f18" value="<?php echo $site_url,$uinfo['url'];?>?invite=<?php echo $uinfo['uid'];?>">
    			 </div>
    			 <input type="submit" value="複製連結" name="submit" class="ui_btn ui_btn_green2 ui_text_tips f16 fb" onclick="copyToClipboard($('#copyLink').val());alert('成功複製啦!');">
    		 </div>
    				<p>
    					或在任何頁面網址尾端加上
    					<span class="fcEm7">?invite=<?php echo $uinfo['uid'];?></span>
    				</p>
    				<script type="text/javascript">
    				function copyToClipboard(txt) {
    		            if (window.clipboardData) {
    		                window.clipboardData.clearData();
    		                clipboardData.setData("Text", txt);
    		                alert("複製成功！");

    		            } else if (navigator.userAgent.indexOf("Opera") != -1) {
    		                window.location = txt;
    		            } else if (window.netscape) {
    		                try {
    		                    netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
    		                } catch (e) {
                        alert("被瀏覽器拒絕！\n請在瀏覽器地址欄'about:config'並回車\n然後將 'signed.applets.codebase_principal_support'設置為'true'");
    		                }
    		                var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);
    		                if (!clip)
    		                    return;
    		                var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);
    		                if (!trans)
    		                    return;
    		                trans.addDataFlavor("text/unicode");
    		                var str = new Object();
    		                var len = new Object();
    		                var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);
    		                var copytext = txt;
    		                str.data = copytext;
    		                trans.setTransferData("text/unicode", str, copytext.length * 2);
    		                var clipid = Components.interfaces.nsIClipboard;
    		                if (!clip)
    		                    return false;
    		                clip.setData(trans, null, clipid.kGlobalClipboard);
    		                alert("複製成功！");
    		            }
    		        }
				</script>
    			</div>
    		<p class="mt5">
    		 <span class="mr20">
    		 您的上線：
    		   <?php echo $rinfo['online']?$rinfo['online']:'無';?>
    		 </span>
    		 <span class="ml20">
    		 下線人數：<?php echo $rinfo['total'];?>
                 </span>
    			</p>
    		</div>
    		<div class="mt20">
    			<h2>招募收益</h2>
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
    							US $<?php echo $userProfit['devote']['cash']['now'];?>
  						</td>
    						<td width="25%" class="fcEm7">
    							US $<?php echo $userProfit['devote']['cash']['pre'];?>
    						</td>
    						<td width="25%" class="fcEm7">
    							US $<?php echo $userProfit['devote']['cash']['month'];?>
    						</td>
    						<td width="25%" class="fcEm7">
    							US $<?php echo $userProfit['devote']['cash']['all'];?>
    						</td>
    					</tr>
    				</tbody>
    			</table>
    		</div>

    		<div class="mt20">
    			<h2>
    				30天招募收益紀錄
    			</h2>
    			<table class="member_table list mt5">
    				<thead>
    					<tr>
    						<th width="33%">
    							日期
    						</th>
    						<th width="33%">
    							收益
    						</th>
    						<th width="33%">
    							狀態
    						</th>
    					</tr>
    				</thead>
    				<tbody>
<!-- loop list -->
<?php foreach($list as $v){?>
<tr>
  <td width="33%">
    <?php echo $v['Ymd'];?>
  </td>
  <td width="33%">
    <?php echo $v['devote_amount'];?>
  </td>
  <td width="33%">
    
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
