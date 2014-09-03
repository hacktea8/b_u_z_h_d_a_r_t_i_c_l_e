/**
 *@class  JavaScript library
 *@author Vickyhuang
 *@param
 */

var VK = {};
VK.version = "0.1";

/**
 *@author Vickyhuang
 *@param args:
 */
VK.doAjax = function(args){
	args = $.extend({
		success: function(data,suArgs){},//ret success
		suArgs: {},//success method argrement
		failed: function(data,suArgs){},//ret error
		error: function(){},
		options: {}//ajax config
	}, args);
	var options = $.extend({
		global: true,
		type: "POST",
		url: "",
		data: "",
		dataType: "json",//json,html,xml,text
		error: function(){},
		success: function(data){},//required data
		failed: function(data){}
	}, args.options);
	switch(options.dataType){
		case "json":
			options.success = function(data){
				// if(data && (data.ret === 0 || data.code === 0 )){
				if(data){
					args.success.call(this, data, args.suArgs);
				}else{
					args.failed.call(this, data, args.suArgs);
				}//To determine the validity of data
			};
		break;
		case "html":
			options.success = function(data){
				args.success.call(this, data);
			};
		break;
	}
	options.error = function(XMLHttpRequest,textStatus,errorThrown){
		VK.debug("Ajax error", {"XMLHttpRequest": XMLHttpRequest, "textStatus": textStatus, "errorThrown": errorThrown, "errorHandler": args.error});
		args.error.call(this, XMLHttpRequest, textStatus, errorThrown);
	};
	options.url && $.ajax(options);
	return true;
};

VK.debug = function(){
	if (window.console && window.console.log){
       	console.log(arguments);
	}
};


/**
 *@author VickyHuang
 *@arguments args: {object}
 *@param id: VK.uuid(), // dialog id
 *@param type:"custom",// 弹层类型 （custom、alert、confirm）
 *@param html:null,// html类型弹层的内容
 *@param title: null, // alert 与 confirm 的弹层标题
 *@param message: null,//  alert 与 confirm 的弹层内容
 *@param cancelText: null, // 取消按钮文本
 *@param cancelCallback: null,//取消的回调函数
 *@param cancelClass: null,//取消按钮的样式类
 *@param doneText: null,//确定按钮文本
 *@param doneCallback: null,//确定的回调函数
 *@param doneClass: null,//确定按钮的样式类
 *@param onShow: null, //弹层显示后回调
 *@param onBeforeShow:null,//弹层显示前回调
 *@param onHide:null,//弹层关闭后回调
 *@param onBeforeHide:null,//弹层关闭前回调
 *@param mask: true, //是否有底层遮罩
 *@param timeOut: 0,//延时自动关闭，单位毫秒
 *@param container: "#wrap",
 *@param offset:{left:0,top:0}
 *@description 采用jQ插件与自实现的方式
 */
var dialog = function(opts) {
	this.initialize(opts);
};
dialog.prototype = {
	opts : {},
	isShow : false,
	initialize : function(opts) {
		this.opts = $.extend({
			id : VK.uuid(), // dialog id
			type : "custom", // 弹层类型 （custom、alert、confirm）
			html : null, // html类型弹层的内容
			title : null, // alert 与 confirm 的弹层标题
			message : null, //  alert 与 confirm 的弹层内容
			cancelText : null, // 取消按钮文本
			cancelCallback : null, //取消的回调函数
			cancelClass : null, //取消按钮的样式类
			doneText : null, //确定按钮文本
			doneCallback : null, //确定的回调函数
			doneClass : null, //确定按钮的样式类
			onShow : null, //弹层显示后回调
			onBeforeShow : null, //弹层显示前回调
			onHide : null, //弹层关闭后回调
			onBeforeHide : null, //弹层关闭前回调
			mask : true, //是否有底层遮罩
			timeOut : 0, //延时自动关闭，单位毫秒
			container : "#wrap",
			isFixed : false,
			className : "",
			offset : {
				left : 0,
				top : 0
			}
		}, opts);
		VK.debug("dialog initialize ", this.opts, opts);
		this[this.opts.type]();
	},
	custom : function() {
		//VK.debug("custom dialog",this.opts);
		var that = this, opts = this.opts,
		//assecomle html
		markup = (function() {
			if ( typeof opts.html == "string") {
				return "<div id=\"" + opts.id + "\" class=\"ui_dialog hidden\">" + opts.html + "</div>";
			} else {
				return $("<div id=\"" + opts.id + "\" class=\"ui_dialog hidden\"></div>").html(opts.html);
			}
		})();
		//show dialog
		that.show(markup);
	},
	alert : function() {
		//VK.debug("alert dialog",this.opts);
		var that = this, opts = this.opts,
		//asseVKle html
		markup = "<div id=\"" + opts.id + "\" class=\"ui_dialog hidden\">" + opts.title + "<br/>" + opts.message + "</div>";
		//show dialog
		that.show(markup);
	},
	confirm : function() {
		//VK.debug("confirm dialog",this.opts);
		var that = this, opts = this.opts,
		//asseVKle html
		markup = "<div id=\"" + opts.id + "\" class=\"ui_dialog hidden\">" + opts.title + "<br/>" + opts.message + "<br/>" + opts.doneText + "<br/>" + opts.cancelText + "</div>";
		//show dialog
		that.show(markup);
	},
	show : function(markup) {
		var that = this, opts = this.opts, container = $(opts.container);
		if (VK.dialog.indexOf(VK.dialog.queue, opts.id) == -1) {//VK.dialog.queue.indexOf(that)
			// new dialog
			container.append(markup);
			that.target = $("#" + opts.id);
			// show mask or not
			opts.mask && that.showMask(container, opts);
			//set center position
			that.setPosition(container, that.target);
			//on before show callback
			opts.onBeforeShow && opts.onBeforeShow.call(that, opts);
			//show dialog
			that.target.removeClass("hidden");
			that.isShow = true;
			VK.dialog.queue.push(that);
			//on show callback
			opts.onShow && opts.onShow.call(that, opts);
			//bind event
			that.bindEvent();
		} else {
			//refresh old dialog
			that.target = $("#" + opts.id).html(opts.html);
			opts.onBeforeShow && opts.onBeforeShow.call(that, opts);
			opts.onShow && opts.onShow.call(that, opts);
			that.bindEvent();
		}
		//VK.debug("dialog queue",VK.dialog.queue);
	},
	hide : function() {
		var that = this, opts = this.opts, container = $(opts.container);
		opts.onBeforeHide && opts.onBeforeHide.call(that, opts);
		//hide dialog
		that.target.addClass("hidden").removeAttr("id");
		that.isShow = false;
		VK.dialog.remove(VK.dialog.queue, opts.id);
		// hide mask or not
		opts.mask && that.hideMask(container, opts);
		setTimeout(function() {
			that.remove(that.target);
		}, 350);
		opts.onHide && opts.onHide.call(that, opts);
		//VK.debug("dialog queue",VK.dialog.queue);
	},
	remove : function() {
		var that = this;
		that.target.remove();
		VK.dialog.maxZ = VK.dialog.queue.length == 0 ? 100 : VK.dialog.maxZ;
		//queue show
	},
	bindEvent : function() {
		var that = this, opts = this.opts, container = $(opts.container), eventType = "click";
		if (opts.type == "alert") {
			that.target.find(".dialog_cancel").bind(eventType, function(e) {
				that.hide();
			});
		}
		if (opts.type == "confirm") {
			that.target.find(".dialog_done").bind(eventType, function(e) {
				that.hide();
				opts.doneCallback.call(that, opts);
			});
			that.target.find(".dialog_cancel").bind(eventType, function(e) {
				that.hide();
				opts.cancelCallback.call(that, opts);
			});
		}
		that.target.find(".dialog_close").bind(eventType, function(e) {
			that.hide();
		});
		if (opts.timeOut) {
			window.setTimeout(function() {
				that.hide();
			}, opts.timeOut);
		}
	},
	setPosition : function(container, target) {
		var that = this, style = null;
		style = {
			"z-index" : VK.dialog.maxZ++,
			// "top" : container[0].clientHeight > target[0].clientHeight ? (container[0].clientHeight / 2.1) - (target[0].clientHeight / 2) + that.opts.offset.top : that.opts.offset.top,
			"top" : ($(window).height() / 2) - (target[0].clientHeight / 2) + that.opts.offset.top + $(document).scrollTop(),
			"left" : (container[0].clientWidth / 2) - (target[0].clientWidth / 2) + that.opts.offset.left
			// "margin-top": -(target[0].clientHeight / 2),
			// "margin-left": -(target[0].clientWidth / 2)
		};
		if (this.opts.isFixed) {
			style["top"] = that.opts.offset.top;
		}
		target.css(style);
	},
	showMask : function(container, opts) {
		var mask = "<div id=\"" + opts.id + "_mask\" class=\"dialog_mask ui_mask hidden\"></div>";
		container.append(mask);
		$("#" + opts.id + "_mask").css({
			"z-index" : VK.dialog.maxZ++
		}).removeClass("hidden");
	},
	hideMask : function(container, opts) {
		$("#" + opts.id + "_mask").remove();
	},
	close : function() {
		this.hide();
	}
};
VK.dialog = $.dialog = function(opts) {
	return new dialog(opts);
};
$.extend(VK.dialog, {
	queue : [],
	maxZ : 100,
	close : function(id) {
		//VK.debug(this,id,this.indexOf(VK.dialog.queue,id) ,this.queue);
		var i = this.indexOf(VK.dialog.queue, id);
		if (i != -1) {
			this.queue[i].hide();
		} else {
			return false;
		}
	},
	indexOf : function(queue, id) {
		for (var i = 0; i < queue.length; i++) {
			if (queue[i].opts.id == id)
				return i;
		}
		return -1;
	},
	remove : function(queue, id) {
		for (var i = 0; i < queue.length; i++) {
			if (queue[i].opts.id == id)
				queue.splice(i, 1);
		}
	}
});

VK.uuid = function() {
	var uuId = function() {
		return (((1 + Math.random()) * 0x10000) | 0).toString(16).substring(1);
	};
	return (uuId() + uuId() + "-" + uuId() + "-" + uuId() + "-" + uuId() + "-" + uuId() + uuId() + uuId());
};

/**
 *@author VickyHuang
 *@param
 */
VK.os = {};
(function(){
	/**
	 *@author VickyHuang
	 *@param
	 *@description initialization operation system detect
	 */
	var userAgent = navigator.userAgent;
	VK.os.webkit = userAgent.match(/WebKit\/([\d.]+)/) ? true : false;
	VK.os.opera = userAgent.match(/Opera Mobi/) ? true : false;
	VK.os.android = userAgent.match(/(Android)\s+([\d.]+)/) || userAgent.match(/Silk-Accelerated/) || userAgent.match(/Android/) ? true : false;
	VK.os.ipad = userAgent.match(/(iPad).*OS\s([\d_]+)/) ? true : false;
	VK.os.iphone = !VK.os.ipad && userAgent.match(/(iPhone\sOS)\s([\d_]+)/) ? true : false;
	VK.os.webos = userAgent.match(/(webOS|hpwOS)[\s\/]([\d.]+)/) ? true : false;
	VK.os.touchpad = VK.os.webos && userAgent.match(/TouchPad/) ? true : false;
	VK.os.ios = VK.os.ipad || VK.os.iphone;
	VK.os.blackberry = userAgent.match(/BlackBerry/) || userAgent.match(/PlayBook/) ? true : false;
	VK.os.fennec = userAgent.match(/fennec/i) ? true : false;
	VK.os.desktop = !(VK.os.ios || VK.os.android || VK.os.blackberry || VK.os.opera || VK.os.fennec);
})();
