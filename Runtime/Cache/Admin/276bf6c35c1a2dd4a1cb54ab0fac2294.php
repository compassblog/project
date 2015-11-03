<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="x-ua-compatible"/>
<title>后台管理</title>
<link rel="stylesheet" type="text/css" href="<?php echo CS_PATH;?>admin/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo CS_PATH;?>font-awesome.css" />
<!--[if IE 6]>
<script type="text/javascript" src="<?php echo JS_PATH ?>DD_belatedPNG.js" ></script>
<script type="text/javascript">
DD_belatedPNG.fix('*');
</script>
<![endif]-->
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.7.2.min.js"></script>

<script type="text/javascript" src="<?php echo JS_PATH;?>Validform_v5.3.2_min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>Validform_Datatype.js"></script>


<script type="text/javascript" src="<?php echo JS_PATH;?>artDialog/artDialog.js?skin=default"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>artDialog/plugins/iframeTools.js" ></script>
<script type="text/javascript">
(function(config) {
	config['lock'] = true;
	config['fixed'] = true;
})(art.dialog.defaults);
</script>

<script type="text/javascript" src="<?php echo JS_PATH;?>common.js"></script>
</head>
<body>
<link rel="stylesheet" type="text/css" href="<?php echo JS_PATH;?>EasyUI/themes/lhave/easyui.css">
<link rel="stylesheet" type="text/css" href="<?php echo JS_PATH;?>EasyUI/themes/icon.css">
<script type="text/javascript" src="<?php echo JS_PATH;?>EasyUI/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>EasyUI/jquery.easyui.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>EasyUI/locale/easyui-lang-zh_CN.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>EasyUI/hd_default_config.js"></script>
<div class="content">
	<div class="site"><a href="#">会员管理</a> > 会员列表</div>
	<span class="line_white"></span>
	<div class="goods mt10">
		<div class="guanli">
			<form action="<?php echo U('Admin/lists'); ?>" method='post'>
				<!--<span style="margin-right: 10px;">按等级查看</span>-->
<!--				<select name='description' id='group_combbox' class="easyui-combobox" data-options="editable:false,panelHeight:'auto'" style="height: 26px;"></select>-->
				<span style="margin-right: 10px;margin-left: 10px;">搜索</span>
				<input id="keyword" class="easyui-textbox" name="keyword" style="width:210px;height: 26px;" prompt="输入会员名/手机/邮箱/均可搜索">
				<a id="search"href="#" class="easyui-linkbutton" style="height: 26px;padding-right: 10px;">查询</a>
			</form>
		</div>
		<div class="login mt10" style="border: none;">
			<table id="member_list" style="width:100%"></table>
			<div class="clear"></div>
		</div>
		<div class="copy"><span class="line_white"></span>  版权所有 © 2013-2015 <?php echo C('site_company');?>，并保留所有权利。</div>
</body>
</html>
		<div class="clear"></div>
    </div>
    
	
	
<script type="text/javascript">
	var dom = $('#member_list');
	var pageSize = <?php echo PAGE_SIZE?>;
	var dataurl = '<?php echo U('lists')?>';
	var addurl = '<?php echo U('add')?>';
	var delurl = '<?php echo U('del')?>';
	var editurl = '<?php echo U('edit')?>';
	$(function(){
		dom.datagrid({
			url:dataurl,
			striped:true,
			width:'100%',
			fitColumns:true,
			checkOnSelect:true,
			toolbar:[{
					id:'delrows',
					text:'删除',
					iconCls:'icon-del',
				},'-',
				{
					id:'addrow',
					text:'添加',
					iconCls:'icon-add',
				},'-'
			],
			frozenColumns:[[
				{field:'id',checkbox:true}
			]],
//			pagination:true,
//			pageSize:pageSize,
//			pageList: [pageSize,pageSize*2,pageSize*4],//可以设置每页记录条数的列表
			columns:[[
				{field:'fullname',title:'节点构造',fixed:true,align:'left',width:'20%'},
			
				{field:'node_name',title:'节点名称',fixed:true,width:'20%',align:'center'},
				{field:'model',title:'模块名',fixed:true,width:'10%',align:'center'},
				{field:'controller',title:'控制器名',fixed:true,width:'10%',align:'center'},
				{field:'action',title:'方法名',fixed:true,width:'10%',align:'center'},
				{field:'userID',title:'操作',width:'30%',align:'center',halign:'center',
					formatter:function(value,row,index){
						var sp_txt="&nbsp;&nbsp;&nbsp;&nbsp;";
							return '<a  href="'+editurl+'&id='+row.id+'">编辑</a>'+sp_txt+
							
							'<a onclick="dom.datagrid(\'clearSelections\').datagrid(\'clearChecked\').datagrid(\'checkRow\','+index+');$(\'#delrows\').trigger(\'click\')" href="#">删除</a>';
						}
				},
			]],
//			onLoadSuccess:function(data){
//				var group = data.rows;
//				group.unshift({"description":"请选择"})
//				$('#group_combbox').combobox({
//					data:group,
//					valueField:'description',
//					textField:'description'
//				});
//			}
		});
		//回车查询
		$('#keyword').textbox('textbox').bind('keydown',function (e) {
			if (e.keyCode == 13) {
				$('#search').trigger('click');
			}
		});
		//增加查询参数，重新加载表格
		$('#search').bind('click',function (){
				var queryParams = dom.datagrid('options').queryParams;
		//查询参数直接添加在queryParams中
			queryParams.keyword = $("#keyword").val();
//			queryParams.description = $('#group_combbox').combobox('getValue');
			dom.datagrid('options').queryParams = queryParams;
			dom.datagrid('reload');
		})
		//添加会员
		$('#addrow').bind('click',function(){
			window.location.href=addurl;
		})
		//删除操作
		$('#delrows').bind('click', function(){
			var ids = [];
			var rows = dom.datagrid('getChecked');
			for(var i=0; i<rows.length; i++){
				ids.push(rows[i].id);
			}
			if (ids.length > 0){
				$.messager.confirm('确认','您确认想要删除记录吗？',function(r){
					if (r){
						$.getJSON(delurl,
						{"id[]":ids},
						function(data){
							if(data.status == 1){
								
								dom.datagrid("reload");  //重新加载
							}else{
								$.messager.alert('警告',data.info);
							}
						})
					}else{
						dom.datagrid('clearSelections').datagrid('clearChecked');
					}
				});
			}else{
				$.messager.alert('警告','请选择要删除的记录');
				return false;
			}
		});
	});
</script>