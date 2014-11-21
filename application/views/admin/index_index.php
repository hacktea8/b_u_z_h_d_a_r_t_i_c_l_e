<div class="container">
  <div class="row">
    <form id="searchForm" class="form-horizontal span24">
      <div class="row">
        <div class="control-group span8">
          <label class="control-label">
            学生编号：
          </label>
          <div class="controls">
            <input type="text" class="control-text" name="id">
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label">
            学生姓名：
          </label>
          <div class="controls">
            <input type="text" class="control-text" name="stuName">
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label">
            性别：
          </label>
          <div class="controls">
            <select name="" id="" name="sex">
              <option value="">
                男
              </option>
              <option value="">
                女
              </option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span9">
          <label class="control-label">
            入学时间：
          </label>
          <div class="controls">
            <input type="text" class=" calendar" name="startDate">
            <span>
              -
            </span>
            <input name="endDate" type="text" class=" calendar">
          </div>
        </div>
        <div class="span3 offset2">
          <button type="button" id="btnSearch" class="button button-primary">
            搜索
          </button>
        </div>
      </div>
    </form>
  </div>
  <div class="search-grid-container">
    <div id="grid">
    </div>
  </div>
</div>
<script type="text/javascript">
  BUI.use('common/page');
</script>
<script type="text/javascript">
  BUI.use(['common/search', 'bui/overlay'],
  function(Search, Overlay) {

    var enumObj = {
      "1": "男",
      "0": "女"
    },
    columns = [{
      title: '文章编号',
      dataIndex: 'id',
      width: 80,
      renderer: function(v,obj) {
        return Search.createLink({
          id: 'detail' + v,
          title: '文章链接',
          text: v,
          href: obj.url
        });
      }
    },
    {
      title: '文章名称',
      dataIndex: 'title',
      width: 200
    },
    {
      title: '一级分类',
      dataIndex: 'pname',
      width: 100,
      renderer: BUI.Grid.Format.dateRenderer
    },
    {
      title: '二级分类',
      dataIndex: 'cname',
      width: 100,
      renderer: BUI.Grid.Format.dateRenderer
    },
    {
      title: '发布时间',
      dataIndex: 'ptime',
      width: 150
    },
    {
      title: '更新时间',
      dataIndex: 'utime',
      width: 150
    },
    {
      title: '操作',
      dataIndex: '',
      width: 200,
      renderer: function(value, obj) {
        var editStr = Search.createLink({ //链接使用 此方式
          id: 'edit' + obj.id,
          title: '编辑文章信息',
          text: '编辑',
          href: '/console/postedit/'+obj.id
        }),
        delStr = '<span class="grid-command btn-del" title="删除文章信息">删除</span>'; //页面操作不需要使用Search.createLink
        viaStr = '<span class="grid-command btn-via" title="审核文章信息">审核</span>';
        return editStr + viaStr + delStr ;
      }
    }],
    store = Search.createStore('/admapi/article_verify'),
    gridCfg = Search.createGridCfg(columns, {
      tbar: {
        items: [{
          text: '<i class="icon-plus"></i>新建',
          btnCls: 'button button-small',
          handler: function() {
            alert('新建');
          }
        },
        {
          text: '<i class="icon-edit"></i>编辑',
          btnCls: 'button button-small',
          handler: function() {
            alert('编辑');
          }
        },
        {
          text: '<i class="icon-remove"></i>删除',
          btnCls: 'button button-small',
          handler: delFunction
        }]
      },
      plugins: [BUI.Grid.Plugins.CheckSelection] // 插件形式引入多选表格
    });

    var search = new Search({
      store: store,
      gridCfg: gridCfg
    }),
  grid = search.get('grid');
  //删除操作
  function delFunction() {
   var selections = grid.getSelection();
   delItems(selections,'del');
  }
  //审核操作
  function viadelFunction() {
   var selections = grid.getSelection();
   optItems(selections,'via');
  }
  function delItems(items,opt) {
   var ids = [];
   BUI.each(items,
   function(item) {
    ids.push(item.id);
   });
   if (ids.length) {
    BUI.Message.Confirm('确认要操作选中的记录么？',
    function() {
     $.ajax({
     url: '/admapi/optarticle_flag/'+opt,
     type: 'POST',
     dataType: 'json',
     data: {
      ids: ids
     },
     success: function(data) {
      if (data.success) { //删除成功
       search.load();
      } else { //删除失败
       BUI.Message.Alert('删除失败！');
      }
     }
    });
   },
   'question');
  }
 }

 //监听事件，删除一条记录
 grid.on('cellclick',
  function(ev) {
  var sender = $(ev.domTarget); //点击的Dom
  var record = ev.record;
  if (sender.hasClass('btn-del')) {
   delItems([record],'del');
  }else if(sender.hasClass('btn-via')){
   delItems([record],'via');
  }
 });
});
</script>
