/**
 * @author Vickyhuang
 */
var Com = {
	init: function() {


		//初始化导航
		Com.initMenu();

		// 顯示/隱藏 menu
		Com.fnShowMenu();

		// header子菜单显示/隐藏
		Com.fnHeaderMenu();

		// 顯示/隱藏 分享按鈕
		Com.fnBindShare();
	},

/**
*@author tim.yang
*/

	initMenu: function() {


		$("#header .main_nav > li.search").append('<div class="submenu_content"><form class="search_form pr" action="/" method="get"><div class="search_input"><input id="s" type="text" name="keyword" value="" placeholder="搜尋..." autocomplete="off"></div><input type="submit" value="搜尋" class="search_btn" onclick="return searchSubmit();"/></form></div>');



		$("#header .main_nav > li.submenu").each(function(){
			listID = $(this).attr("list-id") || null;
			if(listID!==null && $(this).find(".submenu_content").length == 0){
			var subcontent = '<div class="submenu_content"><div class="cleafix"><ul class="sidebar"></ul><div class="main"></div></div></div>';
			$(this).append(subcontent);
			}
		});
	},


/**
*@author VickyHuang
*@param {Object} options include:
*@description Header Menu
*/
	fnShowMenu: function() {
		$("#showMenu").off().on({
			click: function() {
				if($("#menuList").is(":hidden")){
					$("#menuList").show();
					var menuListW = $("#menuList").outerWidth(true);
				    $("#wrapMain").css({
				    	"-moz-transform": "translateX("+ menuListW +"px)",
						"-webkit-transform": "translateX("+ menuListW +"px)",
						"-o-transform": "translateX("+ menuListW +"px)",
						"-ms-transform": "translateX("+ menuListW +"px)",
					 	"transform": "translateX("+ menuListW +"px)",

				    	"-moz-transition": "-moz-transform 450ms ease",
					    "-webkit-transition": "-webkit-transform 450ms ease",
					    "-o-transition": "-o-transform 450ms ease",
					    "-ms-transition": "-ms-transform 450ms ease",
					    "transition": "transform 450ms ease"
				    });
				    window.setTimeout(function(){
				    	$("#wrapMain").css({
					    	"-moz-transition": "",
						    "-webkit-transition": "",
						    "-o-transition": "",
						    "-ms-transition": "",
						    "transition": ""
					    });
				    }, 450);
				}else{
					$("#wrapMain").css({
				    	"-moz-transform": "translateX(0px)",
						"-webkit-transform": "translateX(0px)",
						"-o-transform": "translateX(0px)",
						"-ms-transform": "translateX(0px)",
					 	"transform": "translateX(0px)",

				    	"-moz-transition": "-moz-transform 450ms ease",
					    "-webkit-transition": "-webkit-transform 450ms ease",
					    "-o-transition": "-o-transform 450ms ease",
					    "-ms-transition": "-ms-transform 450ms ease",
					    "transition": "transform 450ms ease"
				    });
				    window.setTimeout(function(){
				    	$("#menuList").hide();
				    	$("#wrapMain").css({
					    	"-moz-transform": "",
							"-webkit-transform": "",
							"-o-transform": "",
							"-ms-transform": "",
						 	"transform": "",

					    	"-moz-transition": "",
						    "-webkit-transition": "",
						    "-o-transition": "",
						    "-ms-transition": "",
						    "transition": ""
					    });
				    }, 445);
				}
			}
		});
	},

/**
*@author VickyHuang
*@param {Object} options include:
*@description Header Menu
*/
	fnHeaderMenu: function(){
		var submenuLock = false,
			showConTimeOut = null;
		$("#header .main_nav > li.submenu").off().on({
			"mouseenter": function(){
				var target = this,
					listID = $(target).attr("list-id") || null;

					if($(this).hasClass("follow")){
						if($(this).find(".submenu_content").length == 0){
						$(this).append("<div class='submenu_content'><iframe frameborder='0' allowtransparency='true' style='border:none; overflow:hidden; width:88px; height:21px;' scrolling='no' src='//www.facebook.com/plugins/like.php?href=http%3A%2F%2Ffacebook.com%2FBuzzHandCom&amp;send=false&amp;layout=button_count&amp;width=88&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=184373368282608'></iframe><a href='https://twitter.com/buzzhand' class='twitter-follow-button' data-show-count='false' data-lang='zh-tw'>跟隨 @BuzzHand</a><div class='g-follow' data-annotation='bubble' data-height='20' data-href='//plus.google.com/+Mashable' data-rel='author'></div><div class='g-override-container'><div class='g-ytsubscribe' data-channel='buzzhand'></div></div><a href='http://www.buzzhand.com/site/feed' target='_blank' class='fr ui_btn ui_btn_green2'><span class='ui_icon ui_icon15 ui_icon15_rss'>rss</span></a></div>");
						loadScriptAsync('twitter');
						}
					}

				if(!submenuLock){
					submenuLock = true;
					showConTimeOut = setTimeout(function(){
						if($(target).parent().find(".submenu.cur").length == 0){
							var submenuContent = $(target).find(".submenu_content");
							submenuContent.css({
						    	"-moz-transform": "translateY(-500px)",
								"-webkit-transform": "translateY(-500px)",
								"-o-transform": "translateY(-500px)",
								"-ms-transform": "translateY(-500px)",
							 	"transform": "translateY(-500px)"
						    });
							setTimeout(function(){
								submenuContent.css({
							    	"-moz-transform": "translateY(0)",
									"-webkit-transform": "translateY(0)",
									"-o-transform": "translateY(0)",
									"-ms-transform": "translateY(0)",
								 	"transform": "translateY(0)",

							    	"-moz-transition": "-moz-transform 290ms ease",
								    "-webkit-transition": "-webkit-transform 290ms ease",
								    "-o-transition": "-o-transform 290ms ease",
								    "-ms-transition": "-ms-transform 290ms ease",
								    "transition": "transform 290ms ease"
							    });
							    setTimeout(function(){
							    	submenuContent.css({
								    	"-moz-transition": "",
									    "-webkit-transition": "",
									    "-o-transition": "",
									    "-ms-transition": "",
									    "transition": ""
								    });
							    }, 290);
							}, 1);
						}
						$(target).addClass("cur").siblings().removeClass("cur");
						if(listID != null){
							Com.fnLoading({"wrapId": submenuContent});
							TopList.getList({target: $(target), listID: listID});
							Com.fnLoading({"closeLoad": true});
						}
					}, 290);
				}
			},
			"mouseleave": function(){
				clearTimeout(showConTimeOut);
				submenuLock = false;
			}
		});
		$("#header").on("mouseleave", function(){
			$("#header .main_nav > li.submenu").removeClass("cur");
		});
	},






/**
*@author tim.yang
*@param {Object} options include:
*@description 绑定分享事件
*/
	mobile_fnBindShare: function() {
		$(".entry").each(function() {
			var appended = $(this).attr("appended");
			var share_links = $(this);
			if ( typeof (appended) == "undefined") {
					var thisa = $(this).find(".entry-title").find("a");
					var href = thisa.attr('href');
					var title = thisa.html();
					var share_html = '';
					var facebook_num = share_links.attr("s-facebook");
					if ( typeof (facebook_num) != "undefined") {
						share_html += '<a class="social-stub social-share facebook" onclick="javascript:shareToFb(\'' + href + '\');" data-shares="' + facebook_num + '" data-title="' + title + '" href="javascript:void(0);">Share</a>';
					}
					var google_num = share_links.attr("s-google");
					if ( typeof (google_num) != "undefined") {
						share_html += '<a class="social-stub social-share google_plus" onclick="javascript:shareToGoogle(\'' + href + '\');" data-shares="' + google_num + '" data-title="' + title + '" href="javascript:void(0);">Share</a>';
					}

					var share_content = '<div class="share_links none">' + share_html + '</div>';
					if ($(this).find('.content').length > 0) {
						$(this).find('.content').append(share_content);
					} else {
						$(this).append(share_content);
					}
					$(this).attr('appended', '1');
				}

			$(this).find(".share_stub").hide();
			$(this).find(".share_links").show();
        })
	},

/**
*@author VickyHuang
*@param {Object} options include:
*@description 绑定分享事件
*/
	desktop_fnBindShare: function() {
		$(".entry").off().on({
			mouseover : function() {
				var share_links = $(this);
				var appended = $(this).attr("appended");
				if ( typeof (appended) == "undefined") {
					var thisa = $(this).find(".entry-title").find("a");
					var href = thisa.attr('href');
					var title = thisa.html();
					var share_html = '';
					var facebook_num = share_links.attr("s-facebook");
					if ( typeof (facebook_num) != "undefined") {
						share_html += '<a class="social-stub social-share facebook" onclick="javascript:shareToFb(\'' + href + '\');" data-shares="' + facebook_num + '" data-title="' + title + '" href="javascript:void(0);">Share</a>';
					}
					var google_num = share_links.attr("s-google");
					if ( typeof (google_num) != "undefined") {
						share_html += '<a class="social-stub social-share google_plus" onclick="javascript:shareToGoogle(\'' + href + '\');" data-shares="' + google_num + '" data-title="' + title + '" href="javascript:void(0);">Share</a>';
					}

					// only show in desktop
					if(window.isDesktop == true){

					var linkin_num = share_links.attr("s-linkin");
					if ( typeof (linkin_num) != "undefined") {
						share_html += '<a class="social-stub social-share linked_in"  onclick="javascript:shareToLinkin(\'' + href + '\');" data-shares="' + linkin_num + '" data-title="' + title + '" href="javascript:void(0);">Share</a>';
					}
					var twitter_num = share_links.attr("s-twitter");
					if ( typeof (twitter_num) != "undefined") {
						var shorturl = share_links.attr("shorturl");
						share_html += '<a class="social-stub social-share twitter"  onclick="javascript:shareToTwitter(\'' + href + '\',\'' + title + '\');" data-shares="' + twitter_num + '" data-shorturl="' + twitter_num + '" data-title="' + title + '" href="javascript:void(0);">Tweet</a>';
					}
					}


					var share_content = '<div class="share_links none">' + share_html + '</div>';
					if ($(this).find('.content').length > 0) {
						$(this).find('.content').append(share_content);
					} else {
						$(this).append(share_content);
					}
					$(this).attr('appended', '1');
				}
				$(this).find(".share_stub").hide();
				$(this).find(".share_links").show();
			},
			"mouseout" : function() {
				$(this).find(".share_links").hide();
				$(this).find(".share_stub").show();
			}
		});
	},

/**
*@author tim yang
*@param {Object} options include:
*@description 綁定分享按鈕入口
*/

	fnBindShare: function() {
		if(window.isMobile){
			Com.mobile_fnBindShare();
		} else {
			Com.desktop_fnBindShare();
		}
	},

/**
*@author VickyHuang
*@param {Object} options include:
*@description 滾到頂部
*/
	fnGoTop: function(top) {
		$("body, html").animate({
			scrollTop : top || 1
		}, "fast");
	},

/**
*@author VickyHuang
*@param {Object} options include:
*@description 顯示/隱藏搜尋框
*/
	fnShowSearch: function(args) {
		if($("#searchForm").is(":hidden")){
			var docW = $("body").width();
			if(docW < 640){
				$("#searchForm").show().width(docW - 100);
			}else{
				$("#searchForm").show();
			}
			$(this).addClass("ui_icon20_search2");
			$(this).parent("li").addClass("cur");
		}else{
			$("#searchForm").hide();
			$(this).removeClass("ui_icon20_search2");
			$(this).parent("li").removeClass("cur");
		}
	},

/**
*@author VickyHuang
*@param {Object} options include:
*@description 顯示/隱藏 其他分享按鈕
*/
	fnShowOther: function(args) {
		var target = args.target,
			showDiv = args.showDiv,
			otherShare = $(target).parent().find(showDiv),
			showText = args.showText || "-",
			hideText = args.hideText || "+";
		if(otherShare.is(":hidden")){
			$(target).html(showText);
			otherShare.show();
		}else{
			otherShare.hide();
			$(target).html(hideText);
		}
	},

/**
*@author VickyHuang
*@param {Object} options include: target: id, expiry: expiry, html: html
*@description 通用提示弹层
*/
	fnPopupWin: function(args) {
		var opt = $.extend(true, {
			ev: null,
			//弹窗ID name
			id: "uiPopupWin",
			//弹窗内容
			content: "",
			//是否显示关闭图标
			showCloseIcon: true,
			//是否显示遮罩
			mask: true,
			//延时关闭时间
			expiry: 0,
			//偏移值
			offset: {
				left: 0,
				top: 0
			}
		}, args);

		if($("#ui_popup_window").length == 0 ){
			$("body").append('<div id="ui_popup_window" class="none"><div class="ui_popup_window"><div class="win_min"></div><div class="tr mt10"><a class="dialog_close"><span class="vm f16">CLOSE</span><span class="ui_icon ui_icon20 ui_icon20_close"></span></a></div></div></div>');
		}

		$("#ui_popup_window").find(".win_min").html(opt.content);

		if (opt.showCloseIcon == true) {
			$("#ui_popup_window").find(".dialog_close").show();
		} else {
			$("#ui_popup_window").find(".dialog_close").hide();
		}

		var popHtml = $("#ui_popup_window").html();

		VK.dialog({
			id: opt.id,
			html: popHtml,
			mask: opt.mask,
			ev: opt.ev,
			offset: opt.offset,
			timeOut: opt.expiry
		});
	},

/**
*@author VickyHuang
*@param {Object} options include: id, expiry, html
*@description 获取html
*/
	fnGetHtml: function(args) {
		var dialogID = args.id,
			expiry = args.expiry;
		VK.doAjax({
			success: function(html){
				Com.fnPopupWin({"id": dialogID, "content": html, "expiry": expiry});
			},
			options: {dataType: "html", url: args.html}
		});
	},

/**
 * @author VickyHuang
 * @param {Object} options include: "args" : wrapId, closeLoad(若为true，则关闭loading)
 * @description 块级内容加载时loading
 */
	fnLoading: function(args) {
		var mask  = args.mask || false,
			timeOut = args.timeOut || 4000; // 是否显示遮罩层 Boolean

		if ($("#partLoading").length === 0 && args.wrapId) {
			// 显示 loading 态的块级内容父元素 id
			var $wrap = typeof args.wrapId === "object" ? args.wrapId : $("#" + args.wrapId),
				loadHtml = '<div id="partLoading" class="ui_loading"></div>',
                maskHtml = '<div id="mMask" class="ui_loading_mask"></div>';
			$wrap.addClass("loadWrap").append(loadHtml);
			if (mask) {
                $wrap.append(maskHtml);
                $("#mMask").css({height: $wrap.height() + "px"});
            }
            setTimeout(function(){
            	if ($("#mMask")) {
	                $("#mMask").remove();
	            }
				$(".loadWrap").removeClass("loadWrap").find("#partLoading").remove();
            }, timeOut);
		} else if ($(".loadWrap").length === 1 && args.closeLoad === true) {
			if ($("#mMask")) {
                $("#mMask").remove();
            }
			$(".loadWrap").removeClass("loadWrap").find("#partLoading").remove();
		}
	},

/**
 * @author VickyHuang
 * @param {Object} options include: "args" : page：所需加載的頁碼；pageType：頁面類型；maxPage：最大頁面數（默认最多显示20页）
 * @description 是否到元素底部
 */
	fnIsNearBottom: function(args){
		var target = args.target;
		// $(window).scroll(function() {
			// $(window).scrollTop() + $(window).height() == $(document).height()  頁面最底部
			var totalHeight = parseFloat($(window).height()) + parseFloat($(window).scrollTop()),
				objHeight = $(target).outerHeight(true);
		    if(objHeight <= totalHeight){
		        return true;
		    }
		// });

	},

/**
 * @author VickyHuang
 * @param {Object} options include: "args" : page：所需加載的頁碼；pageType：頁面類型；maxPage：最大頁面數（默认最多显示20页）；moreUrl：請求地址；
 * @description 動態加載內容
 */
	fnGetMore: function(args){
		var maxPage = args.maxPage || 20,
			page = curPage + 1,
			moreUrl = args.moreUrl,
			pageType = args.pageType,
			display = args.display;
		if(page < maxPage && ajaxLoad){
			ajaxLoad = false;
			args.loadId && Com.fnLoading({"wrapId": args.loadId});
			VK.doAjax({
				success: function(json){
					if(json.status){
						switch (pageType) {
		                    case "column":
		                    	// 熱門文章
		                    	if(json.hot){
		                    		var list = json.hot,
		                    			listLen = list.length,
		                    			_html = "";
		                    		for(var i = 0; i < listLen; i++){

		                    			var item = list[i];

		                    			var	itemHtml = '<li class="entry"  share_count="'+ item.share_count +'" s-facebook="'+ item.share_facebook +'" s-google="'+ item.share_google +'" s-linkin="'+ item.share_linkin +'" s_twitter="'+ item.share_twitter +'">'
													+ '<div class="img ui_imgbg">'
													+ '<a title="'+ item.title +'" href="'+ item.url +'">'
													+ '<img src="'+ item.img +'" />'
													+ '</a><a class="tips triangle" href="'+ item.curl +'">'+ item.cname +'</a></div>'
													+ '<h3 class="mt5 entry-title"><a class="fcEm8" title="'+ item.title +'" href="'+ item.url +'">'+ item.title +'</h3></a>'
													+ '<p class="mt5 share_stub"><span class="ui_icon ui_icon20 ui_icon20_share"></span>'
													+ '<span class="fb vm ml5 mr5">'+ item.share_count +'</span>'
													+ '<span class="vm">次分享</span></p></li>';
										_html += itemHtml;
		                    		}
		                    		$("#column_hot").find("ul").append(_html);
		                    	}

		                    	// 最新文章
		                    	if(json.news){
		                    		var list = json.news,
		                    			listLen = list.length,
		                    			_html = "";
		                    		for(var i = 0; i < listLen; i++){
		                    			var item = list[i],
		                    				itemHtml = '<li class="entry"  share_count="'+ item.share_count +'" s-facebook="'+ item.share_facebook +'" s-google="'+ item.share_google +'" s-linkin="'+ item.share_linkin +'" s_twitter="'+ item.share_twitter +'">';
										if(item.img){
											itemHtml += '<div class="img ui_imgbg">'
													+ '<a title="'+ item.title +'" href="'+ item.url +'">'
													+ '<img src="'+ item.img +'" />'
													+ '</a></div>';
										}
										itemHtml += '<div class="content" ><h3 class="mt5 entry-title"><a class="fcEm" title="'+ item.title +'" href="'+ item.url +'">'+ item.title +'</h3></a>'
												+ '<p class="mt5 share_stub"><span class="ui_icon ui_icon20 ui_icon20_share"></span>'
												+ '<span class="fb vm ml5 mr5">'+ item.share_count +'</span>'
												+ '<span class="vm">次分享&nbsp;/&nbsp;</span>'
												+ '<span class="fcEm4">'+ item.time +'</span></p></div></li>';
										_html += itemHtml;
		                    		}
		                    		$("#column_new").find("ul").append(_html);
		                    	}

		                    	// 精彩文章
		                    	if(json.wonderfull){
		                    		var list = json.wonderfull,
		                    			listLen = list.length,
		                    			_html = "";
		                    		for(var i = 0; i < listLen; i++){
		                    			var item = list[i],
		                    				itemHtml = '<li class="entry"  share_count="'+ item.share_count +'" s-facebook="'+ item.share_facebook +'" s-google="'+ item.share_google +'" s-linkin="'+ item.share_linkin +'" s_twitter="'+ item.share_twitter +'"><div class="img ui_imgbg">';
													+ '<a title="'+ item.title +'" href="'+ item.url +'">'
													+ '<img src="'+ item.img +'" />'
													+ '</a></div><h3 class="mt5 entry-title">'
													+ '<a class="fcEm" title="'+ item.title +'" href="'+ item.url +'">'+ item.title +'</h3></a>'
													+ '<p class="mt5 fcEm4">'+ item.time +'</p></li>';
										_html += itemHtml;
		                    		}
		                    		$("#column_wonderfull").find("ul").append(_html);
		                    	}
		                    break;
		                    default:
								var list = json.list,
									listLen = list.length,
									_html = "",
									$wrap = typeof args.wrapId === "object" ? args.wrapId : $("#" + args.wrapId);
								for(var i = 0; i < listLen; i++){
									var item = list[i];
									var displayImg;
	                    			if ( display == 'box' )
	                    			{
	                    				displayImg = item.limg;
	                    			}
	                    			else
	                    			{
	                    				displayImg = item.img;
	                    			}
	                    			var	itemHtml = '<li class="clearfix entry"  share_count="'+ item.share_count +'" s-facebook="'+ item.share_facebook +'" s-google="'+ item.share_google +'" s-linkin="'+ item.share_linkin +'" share_twitter="'+ item.share_twitter +'">'
	                    						+ '<div class="img ui_imgbg">'
												+ '<a title="'+ item.title +'" href="'+ item.url +'">'
												+ '<img src="'+ displayImg +'" />'
												+ '</a></div><div class="content"><h2 class="entry-title">'
												+ '<a class="fcEm8" title="'+ item.title +'" href="'+ item.url +'">'+ item.title +'</a></h2>'
												+ '<p class="mt5 fcEm4"><a class="fcEm8" title="'+ item.cname +'" href="'+ item.curl +'">'+ item.cname +'</a>&nbsp;/&nbsp;'
												+ '<a class="fcEm7" href="'+ item.channelUrl +'">'+ item.user +'</a>'
												+ '&nbsp;/&nbsp;'+ item.time +'</p>'
												+ '<p class="mt5">'+ item.content +'</p>'
												+ '<p class="mt5 share_stub"><span class="ui_icon ui_icon20 ui_icon20_share"></span>'
												+ '<span class="fb vm ml5 mr5">'+ item.share_count +'</span>'
												+ '<span class="vm">次分享</span></p></div></li>';
									_html += itemHtml;
	                   			}
	                   			$wrap.append(_html);
	                        break;
	                    }
	                    Com.fnBindShare();
	                    ajaxLoad = true;
						curPage = page;
						args.loadId && Com.fnLoading({"closeLoad": true});
					}else{
						args.loadId && Com.fnLoading({"closeLoad": true});
					}
				},
				options: {
					url: moreUrl,//"js/temp/" + pageType + ".json",
					page: page,
					data: {page:page},
				}
			});
		}
	},

/**
 * @author VickyHuang
 * @param {Object} options include: "args" : target , curClass
 * @description Tab 切换
 */
	fnSwitchTab: function(args){
		var target = args.target,
			curClass = args.curClass || "cur";
		$(target).addClass(curClass).siblings().removeClass(curClass);
		$(args.childId).show().siblings().hide();
	}
};


var Index = {
	init: function(args) {
		//Banner圖片 滾動
		BannerEffect.init();
	}
};



/**
*@author VickyHuang
*@param {Object} options include:
*@description Banner圖片效果
*/
var BannerEffect = {
	reset: function(){
		clearInterval(BannerEffectAutoScroll);
		$("li", "#indexBanner").width($("#indexBanner").outerWidth(true));
		$("ul", "#indexBanner").css({
			"width":$("#indexBanner").outerWidth(true) * $("li", "#indexBanner").length + "px",
            "margin-left": -$("#indexBanner").outerWidth(true) + "px"
        });
		BannerEffectAutoScroll = setInterval(BannerEffect.fnScroll, 5000);
	},
	init: function() {
		var $banner = $("#indexBanner"),
			$bannerLen = $banner.find("li").length,
			$bannerLiWidth = $banner.outerWidth(true),
    		$bannerUl = $banner.find("ul"),
			c = 1,
			maxCounts = $bannerUl.find("li").size() - 0;

		$("li", $banner).width($bannerLiWidth);

		$("ul", $banner).width($bannerLiWidth * $bannerLen);

		BannerEffect.fnLastHtml(true);

		BannerEffectAutoScroll = setInterval(BannerEffect.fnScroll, 5000);

		// 鼠標移動或點擊下一頁按鈕
		$("#navNext", $banner).off().on({
			mouseover: function() {
				clearInterval(BannerEffectAutoScroll);
			},
			mouseout: function() {
				BannerEffectAutoScroll = setInterval(BannerEffect.fnScroll, 5000);
			},
			click: function() {
				clearInterval(BannerEffectAutoScroll);
				BannerEffect.fnScroll();
			}
		});

		// 鼠標移動或點擊上一頁按鈕
		$("#navPrev", $banner).off().on({
			mouseover: function() {
				clearInterval(BannerEffectAutoScroll);
			},
			mouseout: function() {
				BannerEffectAutoScroll = setInterval(BannerEffect.fnScroll, 5000);
			},
			click: function() {
				clearInterval(BannerEffectAutoScroll);
				BannerEffect.fnScroll({"prev": true});
			}
		});
	},

    // 精彩詞條滾動 - 自動切换
    fnScroll: function(args) {
    	var $banner = $("#indexBanner"),
    		$bannerUl = $banner.find("ul"),
			$bannerLiWidth = $banner.outerWidth(true),
			fAnimate = args && args.prev ? "+=" : "-=",
			sAnimate = args && args.prev ? "-=" : "+=",
			c = 1;
		$bannerUl.stop(true, true).animate({
            left: fAnimate + $bannerLiWidth
        }, 500, function() {
            $bannerUl.stop(true, true).animate({
                left: sAnimate + $bannerLiWidth
            }, 0);
            if(args && args.prev){
            	BannerEffect.fnLastHtml();
            }else{
            	$bannerUl.find("li:lt(" + c + ")").clone().appendTo($bannerUl);
            	$bannerUl.find("li:lt(" + c + ")").remove();
            }
        });
    },

    // 精彩詞條滾動 - 最後一個元素顯示
    fnLastHtml: function(init) {
    	var $banner = $("#indexBanner"),
    		$bannerUl = $banner.find("ul"),
			maxCounts = $bannerUl.find("li").size() - 0,
			$bannerLiWidth = $banner.outerWidth(true),
			c = 1, html = "";

        $bannerUl.find("li:gt(" + (maxCounts - c - 1) + ")").each(function() {
            html += "<li>" + $(this).html() + "</li>";
        });
        $bannerUl.html(html + $bannerUl.html());
        $("li", $banner).width($bannerLiWidth);

        init && $bannerUl.css({
            "margin-left": -$bannerLiWidth + "px"
        });

        $bannerUl.find("li:gt(" + (maxCounts - 1) + ")").remove();
    }

};



/**
*@author VickyHuang
*@param {Object} options include:
*@description 會員中心
*/
var Members = {
	init: function(args){

		// 跳到出錯提示
		Members.fnGoToEorr();
	},

    // 會員頁 - 顯示下來列表
	showSelect: function(args) {
		var target = $(args.target),
			parDis = target.parent().attr("disabled") || "";
		if(parDis != "disabled" && target.next().hasClass("selectlist")){
			if(target.next().is(":hidden")){
				target.next().show();
				var selectList = target.next().find("li");
				selectList.find("p").off().on({
					click: function() {
						// if(!$(this).hasClass("sub")){
							target.html($(this).text());
							target.next().hide();
						// }else{
						//
						// }
					}
				});
			}else{
				target.next().hide();
			}
		}
	},

    // 會員頁 - 左侧导航
	showSubNav: function() {
		var subNav = $("#memberSidebar>li").find(".sub"),
			subNavPrev = subNav.parents("li");
		subNavPrev.off().on("click", function() {
			if(!$(this).hasClass("on")){
				$(this).addClass("on").siblings().removeClass("on");
			}
		});
	},

    // 會員頁 - 發表文章前檢查文章是否重複
	ckList: function(args) {
		var target = args.target,
			title = $(target).val(),
			targetPars = $(target).parents(".ui_text_block"),
			formObj = targetPars.parents("form");
			url = args.url,
			post_id = args.post_id;
		if(title){
			targetPars.find("#chkTitle").html('');
			Com.fnLoading({"wrapId": $(targetPars)});
			$("#ct").val('');
			VK.doAjax({
				success: function(html){
					if ( html != '' )
					{
						targetPars.find("#chkTitle").html(html);
						targetPars.find(".checkPubTitle .btn_close").off().on("click", function(){
							$(this).parents(".checkPubTitle").remove();
							// formObj.find("input").attr("disabled", "").end()
									// .find("textarea").attr("disabled", "").end()
									// .find("div.selected_block").attr("disabled", "").end()
									// .find();
							//formObj.find(".afcktitle").removeAttr("disabled", "");
						});
						$("#ct").val('1');
					}
					Com.fnLoading({"closeLoad": true});
				},
				options: {type:'POST', dataType: "html", url: url, data:{title:title, post_id:post_id}}
			});
		}
	},

    // 會員頁 - 跳到出錯提示
	fnGoToEorr: function(args) {
		if($(".error").length > 0){
			Com.fnGoTop($(".error").eq(0).offset().top - 45);
		}
	},

    // 會員頁 - 複製  by: tim.yang
	fnCopyToClipboard: function(txt) {

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
			if (!clip) {
				return;
			}
			var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);
			if (!trans) {
				return;
			}
			trans.addDataFlavor("text/unicode");
			var str = new Object();
			var len = new Object();
			var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);
			var copytext = txt;
			str.data = copytext;
			trans.setTransferData("text/unicode", str, copytext.length * 2);
			var clipid = Components.interfaces.nsIClipboard;
			if (!clip) {
				return false;
			}
			clip.setData(trans, null, clipid.kGlobalClipboard);
			alert("複製成功！");
		}


	}
};



/**
*@author VickyHuang
*@param {Object} options include:
*@description bbs
*/
var Bbs = {
	init: function(args) {

	},

	fnShowPub: function(args) {
		$("#bbsPub").show();
		Com.fnGoTop($("div#bbsPub").offset().top - 45);
		$("#bbsPub").find("input[type='text']").eq(0).focus();
	},

	fnReply: function(args) {
		var target = args.target,
			parent_id = args.parent_id,
			userName = args.userName || target.parents(".content").find("user_name").text();

		$("#bbsComment").find("#reply_name").show().find(".name").text("@" + userName);
		$("#bbsComment").find("#reply_name").find("#parent_id").val(parent_id);
		Com.fnGoTop($("div#bbsComment").offset().top - 45);
		$("#bbsComment").find("textarea").eq(0).focus();
	},

	fnReplyCancel: function(args) {
		var obj = $("#bbsComment").find("#reply_name");
		obj.find(".name").text('');
		obj.find("#parent_id").val('');
		obj.hide();
	}
};



/**
*@author VickyHuang
*@param {Object} options include:
*@description article
$("body").append('<div class="fixedbar" style="height:45px;background:#fff;"><div id="mobileFBLike" class="mobile-fb-like-box" ><span class="mobile-join-fb-text">讚一下'+fb_name+'吧:)</span><div class="fb-like mobile-fb-like" data-href='+fb_page+' data-send="false" data-width="60" data-show-faces="false" layout="button_count"></div></div></div>');
*/
var Article = {
	init: function(){

		if(window.isMobile){
		$(".share_block").html('<a class="ui_btn ui_btn_blue ml5 mr5"><span class="ui_icon ui_icon_third20 ui_icon_third20_f"></span> 分享到Facebook</a>');
		$('#mobileFBLike').show();

		$("body").append('<div class="fixedbar"><div class="floatingbox"><ul id="tips"><li style="float: left;"><a class="hoverable share-fb sticky-bot-fb" id="botFbShare" onclick="return false();" href="#"><img src="/images/facebook.png"></a></li></ul></div></div>');
		jQuery('#botFbShare').on("click",function(event){event.preventDefault();var child=window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(window.location.href),'facebook-share-dialog','width=626,height=436');});

	   setTimeout('show_like()', 28000);
		}else{


	   setTimeout('show_like()', 28000);



		$('#mobileFBLike').hide();
		$(".share_block").html('<a class="ui_btn ui_btn_blue ml5 mr5"><span class="ui_icon ui_icon_third20 ui_icon_third20_f"></span> 分享到Facebook</a><a class="ui_btn ui_btn_red mr5"><span class="ui_icon ui_icon_third20 ui_icon_third20_g"></span> 分享到Google+</a><span class="othershare none"><a class="ui_btn ui_btn_cyanblue mr5"><span class="ui_icon ui_icon_third20 ui_icon_third20_t">Share on Twitter</span></a><a class="ui_btn ui_btn_blue2 mr5"><span class="ui_icon ui_icon_third20 ui_icon_third20_i">Share on LinkedIn</span></a><a class="ui_btn ui_btn_red2 mr5"><span class="ui_icon ui_icon_third20 ui_icon_third20_p">Share on pinterest</span></a></span><span class="addmore" onclick="Com.fnShowOther({\'target\': this, \'showDiv\': \'.othershare\'});">+</span>');
		}

		$("#detailContent").find("a.post_img").off().on({
			mouseenter: function() {
				if ($("#imgShare").length === 0) {
					var imgShareHtml = '<div id="imgShare" class="btn_img_share"><p><a  href="javascript:void(0);" onclick="javascript:shareToFb(\''+window.location.pathname+'\');" class="ui_btn ui_btn_blue">Facebook</a></p><p><a   href="javascript:void(0);" onclick="javascript:shareToGoogle(\''+window.location.pathname+'\');"  class="ui_btn ui_btn_red">Google Plus</a></p></div>';
					$(this).addClass("imgShare").append(imgShareHtml);
				}
			},
			mouseleave: function() {
				if ($(".imgShare").length === 1) {
					$(".imgShare").removeClass("imgShare").find("#imgShare").remove();
				}
			}
		});


		$(".share_block").find(".ui_btn_blue").off().on("click",function() {
				 return shareToFb(window.location.pathname);
		 });

		$(".share_block").find(".ui_btn_red").off().on("click",function() {
				 return shareToGoogle(window.location.pathname);
		 });

		$(".share_block").find(".ui_btn_cyanblue").off().on("click",function() {
				var title = $("body").find("h1").html();
				 return shareToTwitter(window.location.pathname, title);
		 });

		$(".share_block").find(".ui_btn_blue2").off().on("click",function() {
				 return shareToLinkin(window.location.pathname);
		 });


		$(".share_block").find(".ui_btn_red2").off().on("click",function() {
				 return shareToPinterest(window.location.pathname);
		 });

		if( $("#ac").length > 0 && top == self ){
		setTimeout(function(){
			article_container = $("#ac");
			var _img = '/images/2014' + article_container.attr("p") +  '042906669009' +  article_container.attr("ac") + '.png';
			article_container.append("<img src=\""+_img+"\" width=\"1\" height=\"1\">");
		},8000);
		}
	}

};


/**
 * @author tim.yang
 */

var searchSubmit = function ()
{
	var word=document.getElementById("s").value;
	location.href="/search/"+word + '.html';
	return false;
}


if(fb_name != 'BuzzHand'){
	fb_name = 'BH' + fb_name;
}

var templates = {};
templates["templates/lightbox"] = "<div class='mash-lightbox small-white-dialog'>\n  <div class='mash-lightbox-content-wrap'>\n    <a class='mash-lightbox-close' href='#'></a>\n    <div class='mash-lightbox-content'></div>\n  </div>\n</div>";

templates["templates/shared/like_us_on_facebook"] = "<div id='like-encourager'><a class='mash-lightbox-close  icon_close'></a><hgroup>\n    <h1 class='first'>喜歡我們分享的文章嗎?</h1>\n    <h1>立即按讚接收更多吧!</h1>\n  </hgroup>\n<iframe src='//www.facebook.com/plugins/like.php?href="+ encodeURIComponent(fb_page) +"&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21' scrolling='no' frameborder='0' style='border:none; overflow:hidden; height:21px;width: 88px;display: block;margin: 0 auto;' allowTransparency='true'> </iframe>\n</div>";


var shareTrack = function(type, path) {
	$.post("/post/sharetrack.html",{type: type, path: path });
}


var loadScriptAsync = function(i, r, s, a) {
        var e, t, n;
        n = [];
        e = null;
        t = {
            facebook: "https://connect.facebook.net/zh_TW/all.js#appId=184373368282608&xfbml=1&status=1&cookie=1",
            twitter: "https://platform.twitter.com/widgets.js",
            gplus: "https://apis.google.com/js/plusone.js",
            gplusapi: "https://apis.google.com/js/client:plusone.js?onload=plusOneLoaded"
        };

            var o, l, c, h, u;
            if (o = t[i], o && (r = i + "_ljssdk", i = o), s || (s = null), !document.getElementById(r) && !n[r] && !n[i]) {
                n[r] = !0,
                n[i] = !0,
                e || (e = document.getElementsByTagName("script")[0]),
                c = document.createElement("script"),
                c.id = r,
                c.async = !0,
                c.src = i;
                try {
                    c.innerHTML = s
                } catch(p) {
                    l = p,
                    c.textContent = s
                }
                if (a) for (h in a) u = a[h],
                c[h] = u;
                return e.parentNode.insertBefore(c, e),c
     }
};



var Lightbox = {
	positionY : -500,
	slideY: function() {
		this.positionY = this.positionY + 50;
		this.el.css({transform: 'translate(0px, '+this.positionY+'px)'})
		 if(this.positionY<0){
		   return this.a(this.slideY(), 100)
		}
     },


	t : jQuery(window),
	a : function(e, t) {
		return setTimeout(t, e)
	},

	l : function(e, t) {
		return setInterval(t, e)
	},

	o : function(e) {
		return clearInterval(e),
		null
	},

	showContent : function(e) {
				  return this.content.html(e)
	},

	init:function() {
		 if($('body').find('.mash-lightbox').length==0){
			 $('body').append(templates["templates/lightbox"]);;
		 }

		 var el = $('body').find('.mash-lightbox');
		 this.el = el;
		 this.content = this.el.find(".mash-lightbox-content");
	 },

	show:function(n) {
		Lightbox.init();
		 this.showContent(n);
		 this.el.show();
		 this.el.addClass("shown");

		this.el.css({
                height: "",
                top: ""
            });

		 jQuery("body").addClass("noscroll");

		this.el.addClass("mash-lightbox-fixed");
		this.el.addClass("shown");

		this.el.find(".mash-lightbox-content").css({
			   "margin-top": '120px'
		})

		this.slideY();

		$("#like-encourager").find(".opt-out").on("click",
        function() {
            $.cookie("fb_like_optout", "1", {
                expires: 7300,
                path: "/"
            })
			Lightbox.hide();
        });


		 this.el.find(".mash-lightbox-close").off().on("click",
				 function() {
				 return Lightbox.hide();
		 });
	 },

	hide : function() {
		   this.positionY = -500;
		   jQuery("body").removeClass("noscroll");
		   this.el.removeClass("mash-lightbox-fixed");
		   this.el.removeClass("shown");
			this.el.find(".mash-lightbox-content").css({
			   "margin-top": '120px'
			})
		   this.el.css({transform: 'translate(0px, -120%)'})
	},

};


var facebook = {
	showed : 0,
	show : function() {
		if( this.showed == 1 ) {
			return;
		}
		this.showed = 1;
		return Lightbox.show(templates["templates/shared/like_us_on_facebook"]),
			   loadScriptAsync('facebook'),
			   this.content = $("#like-encourager").html()
	}
}


var isReferreredFrom = function(e){
	var t=document.referrer.split("/");
	if(t.length>2 && t[2].indexOf(e)){
		return true;
	}
	return false;
}



var show_like = function() {
        return ("1" !== $.cookie("fb_like_optout")) ? (
        facebook.show(),
		$.cookie("fb_like_optout", "1", {
                expires: 3864000,
                path: "/"
            })
		) : void 0
}

var after = function(e) {
		var t;
		return t = $([window, document]),
	   setTimeout(
	   function() {
	   return t.on("focus focusin",
	   function() {
	   return t.off("focus focusin"),
		   e()
	   })},500)
};


var shareToPinterest = function(url) {
			return n = "http://pinterest.com/pin/create/button/?url=" + encodeURIComponent("http://www.buzzhand.com" + url),
            popupCenter(n, 685, 500);
}

var shareToFb = function(url) {
		return n = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent("http://www.buzzhand.com" + url),
        popupCenter(n, 685, 500),
		shareTrack('facebook', url),
		t = $([window, document]),
	   setTimeout(
	   function() {
	   return t.on("focus focusin",
	   function() {
	   return t.off("focus focusin"),
			show_like()
	   })},500),
        !1
}



var shareToGoogle = function(url) {
		var encoded_url = encodeURIComponent("http://www.buzzhand.com" + url);
		n = "https://plus.google.com/share?url=" + encoded_url;
		popupCenter(n, 600, 600),
        shareTrack('google', url);
}


var shareToLinkin= function(url) {
		var encoded_url = encodeURIComponent("http://www.buzzhand.com" + url);
		var n = "http://www.linkedin.com/cws/share?url=" + encoded_url + "&original_referer=" + encodeURIComponent(window.location.href) + "&isFramed=false&ts=" + (new Date).getTime();
        popupCenter(n, 505, 360),
        shareTrack('linkin', url);
}


var shareToTwitter= function(url,title) {
var encoded_url = encodeURIComponent("http://www.buzzhand.com" + url);
i = "https://twitter.com/intent/tweet?text=" + encodeURIComponent(title) + "&url=" + encoded_url;
popupCenter(i, 685, 500);
shareTrack('twitter', url);
}


window.popupCenter = function(e, t, n, i) {
	var r, s;
	return r = screen.width / 2 - t / 2,
	s = screen.height / 2 - n / 2,
    window.open(e, i, "menubar=no,toolbar=no,status=no,width=" + t + ",height=" + n + ",toolbar=no,left=" + r + ",top=" + s)
}




