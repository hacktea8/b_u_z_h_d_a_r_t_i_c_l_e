        var editor = UE.getEditor('Post_content',{
            UEDITOR_HOME_URL:_cdn_url+'/js/ueditor/'
            ,toolbars:[['source','|','undo', 'redo','|','bold', 'italic', 'underline', 'strikethrough','|','superscript', 'subscript','|','forecolor','|','removeformat','|','selectall', 'cleardoc', 'paragraph','|','fontfamily', 'fontsize','|','justifyleft', 'justifycenter', 'justifyright', 'justifyjustify'],
            		['link', 'unlink','|', 'insertimage', 'insertvideo','|','horizontal', 'searchreplace','preview', 'fullscreen']]
            ,lang:'zh-cn'
            ,wordCountMsg: '已经输入{#count}个字符。'
            ,maximumWords: 10240
            ,enableAutoSave: false
			,elementPathEnabled : false
			,scaleEnabled:false
            ,autoHeightEnabled:false
            ,wordOverFlowMsg: '输入字符数目已经超过10240，过大可能会导致提交失败！'
            	//填写过滤规则
        	,filterRules: function () {
            return{
                span:function(node){
                    if(/Wingdings|Symbol/.test(node.getStyle("font-family"))){
                        return true;
                    }else{
                        node.parentNode.removeChild(node,true)
                    }
                },
                p: function(node){
                    var listTag;
                    if(node.getAttr("class") == "MsoListParagraph"){
                        listTag = "MsoListParagraph"
                    }
                    node.setAttr();
                    if(listTag){
                        node.setAttr("class","MsoListParagraph")
                    }
                    if(!node.firstChild()){
                        node.innerHTML(UE.browser.ie ? " " : "<br>")
                    }
                },
                div: function (node) {
                    var tmpNode, p = UE.uNode.createElement("p");
                    while (tmpNode = node.firstChild()) {
                        if (tmpNode.type == "text" || !UE.dom.dtd.$block[tmpNode.tagName]) {
                            p.appendChild(tmpNode);
                        } else {
                            if (p.firstChild()) {
                                node.parentNode.insertBefore(p, node);
                                p = UE.uNode.createElement("p");
                            } else {
                                node.parentNode.insertBefore(tmpNode, node);
                            }
                        }
                    }
                    if (p.firstChild()) {
                        node.parentNode.insertBefore(p, node);
                    }
                    node.parentNode.removeChild(node);
                },
                //$:{}表示不保留任何属性
                br: {$: {}},
	                a: function (node) {
	                    if(!node.firstChild()){
	                        node.parentNode.removeChild(node);
	                        return;
	                    }
	                    node.setAttr();
	                    node.setAttr("href", "#")
	                },
	                strong: {$: {}},
	                b:function(node){
	                    node.tagName = "strong"
	                },
	                i:function(node){
	                    node.tagName = "em"
	                },
	                em: {$: {}},
	                img: function (node) {
	                    var src = node.getAttr("src");
	                    node.setAttr();
	                    node.setAttr({"src":src})
                },
                ol:{$: {}},
                ul: {$: {}},

                dl:function(node){
                    node.tagName = "ul";
                    node.setAttr()
                },
                dt:function(node){
                    node.tagName = "li";
                    node.setAttr()
                },
                dd:function(node){
                    node.tagName = "li";
                    node.setAttr()
                },
                li: function (node) {

                    var className = node.getAttr("class");
                    if (!className || !/list\-/.test(className)) {
                        node.setAttr()
                    }
                    var tmpNodes = node.getNodesByTagName("ol ul");
                    UE.utils.each(tmpNodes,function(n){
                        node.parentNode.insertAfter(n,node);

                    })

                },
                table: function (node) {
                    UE.utils.each(node.getNodesByTagName("table"), function (t) {
                        UE.utils.each(t.getNodesByTagName("tr"), function (tr) {
                            var p = UE.uNode.createElement("p"), child, html = [];
                            while (child = tr.firstChild()) {
                                html.push(child.innerHTML());
                                tr.removeChild(child);
                            }
                            p.innerHTML(html.join(" "));
                            t.parentNode.insertBefore(p, t);
                        })
                        t.parentNode.removeChild(t)
                    });
                    var val = node.getAttr("width");
                    node.setAttr();
                    if (val) {
                        node.setAttr("width", val);
                    }
                },
                tbody: {$: {}},
                caption: {$: {}},
                th: {$: {}},
                td: {$: {valign: 1, align: 1,rowspan:1,colspan:1,width:1,height:1}},
                tr: {$: {}},
                h3: {$: {}},
                h2: {$: {}},
                //黑名单，以下标签及其子节点都会被过滤掉
                "-": "script style meta iframe embed object"
            }
        }(),initialFrameHeight:'600'
            ,initialFrameWidth:'100%'
        });
        editor.ready(function(){
            this.addListener( "beforeInsertImage", function ( type, imgObjs ) {
                for(var i=0;i < imgObjs.length;i++){
                    imgObjs[i].src = imgObjs[i].src.replace(".thumbnail","");
                }
            });
        });
