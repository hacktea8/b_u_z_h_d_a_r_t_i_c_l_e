/**
 * @author jason
 */
document.write('<script language=javascript src="/public/js/topList_data.js?t='+new Date().getHours()+'"></script>');

var TopList = {
	getList: function (args) {
		var target = args.target,
			listID = args.listID,
			listObj = jsonList[listID],
			list = listObj.list,
			listLen = list.length,
			submenuContent = $(target).find(".submenu_content"),
			main = submenuContent.find(".main"),
			mainHtml = "",
			sidebar = submenuContent.find(".sidebar"),
			sidebarHtml = "";
		for(var i = 0; i < listLen; i++){
			var curList = list[i],
				subList = curList.subList,
				_mainHtml = "";
			sidebarHtml += '<li class="sidebar_nav" data-id="'+ i +'"><a href="'+curList.url+'">'+ curList.title +'</a></li>';
			_mainHtml = '<ul class="ui_list3 none" data-id="sub_'+ i +'">';
			for (var key in subList){
				_mainHtml += '<li><div class="img ui_imgbg"><a href="'+subList[key].url+'">'
		    			+ '<img src="'+ subList[key].img +'" /></a></div>'
		    			+ '<h3 class="mt5"><a href="'+subList[key].url+'">'+ subList[key].title +'</a></h3></li>';
			}
			_mainHtml += '</ul>';
			mainHtml += _mainHtml;
		}
		//sidebarHtml += '<li class="more"><a href="'+ listObj.more +'">更多</a></li>';
		sidebar.html(sidebarHtml);
		main.html(mainHtml);

		sidebar.find("li.sidebar_nav").off().on("mouseover", function(){
			var subCon = $(this).attr("data-id");
			$(this).parents(".submenu_content").find(".main>ul[data-id='sub_"+ subCon + "']").show().siblings().hide();
			$(this).addClass("cur").siblings().removeClass("cur");
		});

		sidebar.find("li").eq(0).addClass("cur").siblings().removeClass("cur");
		main.find("ul").eq(0).show().siblings().hide();
	}
};
