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
			<form action="<?php echo U('Member/lists'); ?>" method='post'>
				<span style="margin-right: 10px;">按等级查看</span>
				<select name='group_id' id='group_combbox' class="easyui-combobox" data-options="editable:false,panelHeight:'auto'" style="height: 26px;"></select>
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
    <div id="moneypanel" class="easyui-window"  style="width:320px;" closed="true" modal="true" minimizable="false" maximizable="false" collapsible="false" data-options="title:'修改余额'">
		<form id="SetMoneyForm" class="setmoneyform" method="post" action="<?php echo U('Member/setmoney'); ?>">
		<div class="login " style="border: none;">
			<!--<h3>设置余额</h3>-->
			<div class="table">
				<table>
				<tr style="border-top: none;">
					<td>修改方式</td>
					<td align="left"><input type="radio" value="setInc" name="at" checked>增加 <input type="radio" value="setDec" name="at">减少</td>
					<td align="left"></td>
				</tr>
				<tr style="border-top: none;">
					<td>修改余额</td>
					<td align="left"><input type="text" value="0" style="margin:0;" class="text_input1" name="user_money" ></td>
					<td align="left">变动的余额 如 10 </td>
				</tr>
				<tr style="border-bottom:1px solid #CCCCCC;border-top: none;">
					<td>修改原由</td>
					<td align="left" colspan="2"><input type="text" value="" style="margin:0;" class="input_ss" name="msg" ></td>
				</tr>
				</table>
			</div>
		</div>
		<div data-options="region:'south',border:false" style="text-align:right;padding:5px 20px;">
			<a class="easyui-linkbutton"  href="javascript:void(0)" onclick="$('#SetMoneyForm').submit()" style="padding: 0 10px;">确定</a>
			<a class="easyui-linkbutton"  href="javascript:void(0)" onclick="$('#moneypanel').window('close');" style="padding: 0 10px;">取消</a>
		</div>
			<input type="hidden" name="user_id" value="" />
		</form>
	</div>
	<div id="poinospanel" class="easyui-window"  style="width:320px;" closed="true" modal="true" minimizable="false" maximizable="false" collapsible="false" data-options="title:'修改积分'">
		<form id="SetPoinosForm" class="setpoinosform" method="post" action="<?php echo U('Member/setpoints'); ?>">
		<div class="login " style="border: none;">
			<!--<h3>设置积分</h3>-->
			<div class="table">
				<table>
				<tr style="border-top: none;">
					<td>修改方式</td>
					<td align="left"><input type="radio" value="setInc" name="at" checked>增加 <input type="radio" value="setDec" name="at">减少</td>
					<td align="left"></td>
				</tr>
				<tr style="border-top: none;">
					<td>修改积分</td>
					<td align="left"><input type="text" value="0" style="margin:0;" class="text_input1" name="pay_points" ></td>
					<td align="left">变动的积分 如 10 </td>
				</tr>
				<tr style="border-bottom:1px solid #CCCCCC;border-top: none;">
					<td>修改原由</td>
					<td align="left" colspan="2"><input type="text" value="" style="margin:0;" class="input_ss" name="descript" ></td>
				</tr>
				</table>
			</div>
		</div>
		<div data-options="region:'south',border:false" style="text-align:right;padding:5px 20px;">
			<a class="easyui-linkbutton"  href="javascript:void(0)" onclick="$('#SetPoinosForm').submit()" style="padding: 0 10px;">确定</a>
			<a class="easyui-linkbutton"  href="javascript:void(0)" onclick="$('#poinospanel').window('close');" style="padding: 0 10px;">取消</a>
		</div>
			<input type="hidden" name="user_id" value="" />
		</form>
	</div>
	<div id="exppanel" class="easyui-window" style="width: 350px;" closed="true" modal="true" minimizable="false" maximizable="false" collapsible="false" data-options="title:'修改经验'">
		<form id='SetExpForm' class="setexpform" method="post" action="<?php echo U('Member/setexp'); ?>">
		<div class="login " style="border: none;">
			<!--<h3>设置积分</h3>-->
			<div class="table">
				<table>
					<tr style="border-top: none;">
					<td>修改方式</td>
						<td align="left"><input type="radio" value="setInc" name="at" checked>增加 <input type="radio" value="setDec" name="at">减少</td>
						<td align="left"></td>
					</tr>
					<tr style="border-bottom:1px solid #CCCCCC;border-top: none;">
						<td>修改经验</td>
						<td align="left"><input type="text" value="0" style="margin:0;" class="text_input1" name="exp" ></td>
						<td align="left">变动的经验 如 10 </td>
					</tr>
				</table>
			</div>
		</div>
		<div data-options="region:'south',border:false" style="text-align:right;padding:5px 20px;">
			<a class="easyui-linkbutton"  href="javascript:void(0)" onclick="$('#SetExpForm').submit()" style="padding: 0 10px;">确定</a>
			<a class="easyui-linkbutton"  href="javascript:void(0)" onclick="$('#exppanel').window('close');" style="padding: 0 10px;">取消</a>
		</div>
		<input type="hidden" name="user_id" value="" />
		</form>
	</div>
<script type="text/javascript">
	var dom = $('#member_list');
	var pageSize = <?php echo PAGE_SIZE?>;
	var dataurl = '<?php echo U('lists')?>';
	var addurl = '<?php echo U('add')?>';
	var delurl = '<?php echo U('del')?>';
	var addressurl = '<?php echo U('MemberAddress/lists')?>';
	var orderurl = '<?php echo U('Goods/AdminOrder/lists')?>';
	var editurl = '<?php echo U('edit')?>';
	var friendurl = '<?php echo U('MemberFriends/lists')?>';
	var repasswordurl = '<?php echo U('repassword')?>';
	var setpotionsurl = '<?php echo U('setpoints')?>';
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
			pagination:true,
			pageSize:pageSize,
			pageList: [pageSize,pageSize*2,pageSize*4],//可以设置每页记录条数的列表
			columns:[[
				{field:'username',title:'会员名',fixed:true,align:'center',width:'10%'},
			{field:'group_id',title:'会员等级',halign:'center',align:'center',width:'10%',sortable:true,
				formatter:function(value,row,index){
					var group = dom.datagrid('getData').group;
					var groupname = '-';
						for(var o in group){
							if(group[o].id == value){
								groupname = group[o].name
							}
						}
							return groupname;
					}
				}, 
				{field:'tel',title:'手机号',fixed:true,width:'10%',align:'center'},
				{field:'email',title:'电子邮箱',align:'center',width:'10%',align:'center'},
				{field:'money',title:'余额',width:'7%',align:'center',sortable:true},
				{field:'points',title:'积分',width:'7%',align:'center',sortable:true},
				{field:'exp',title:'经验',width:'6%',align:'center',sortable:true},
				{field:'time',title:'注册时间',width:'10%',align:'center',sortable:true,
					formatter:function(value,row,index){
  						return $.fn.datebox.defaults.timeformat(value);
					}
				},
				{field:'userID',title:'操作',width:'30%',align:'center',halign:'center',
					formatter:function(value,row,index){
						var sp_txt="&nbsp;&nbsp;&nbsp;&nbsp;";
							return '<a  href="javascript:void (0)" onclick="user_money('+row.id+','+index+')">余额</a>'+sp_txt+
							'<a  href="javascript:void (0)" onclick="pay_points('+row.id+','+index+')">积分</a>'+sp_txt+
							'<a  href="javascript:void (0)" onclick="exp('+row.id+','+index+')">经验</a>'+sp_txt+
							'<a  href="'+friendurl+'&id='+row.id+'">好友列表</a>'+sp_txt+
							'<a  href="'+editurl+'&id='+row.id+'">编辑</a>'+sp_txt+
							'<a  href="'+repasswordurl+'&id='+row.id+'">重置密码</a>'+sp_txt+
							'<a onclick="dom.datagrid(\'clearSelections\').datagrid(\'clearChecked\').datagrid(\'checkRow\','+index+');$(\'#delrows\').trigger(\'click\')" href="#">删除</a>';
						}
				},
			]],
			onLoadSuccess:function(data){
				var group = data.group;
				group.unshift({"id":"","name":"请选择"})
				$('#group_combbox').combobox({
					data:group,
					valueField:'id',
					textField:'name'
				});
			}
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
			queryParams.group_id = $('#group_combbox').combobox('getValue');
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
	//积分弹窗
	function pay_points(value,index){
		$('input[name="user_id"]').val(value);
		$('#poinospanel').window('open');
	}
	//经验
	function exp(value,index){
		$('input[name="user_id"]').val(value);
		$('#exppanel').window('open');
	}
	// 余额
	function user_money(value,index) {
		$('input[name="user_id"]').val(value);
		$('#moneypanel').window('open');
	}
</script>