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
<div class="content">
	<style>
		#Validform_msg{display: none}
	</style>
	<div class="site">
		 <a href="#">站点设置</a> > 站点设置
	</div>
	<span class="line_white"></span>
	<div class="install tabs mt10">
		<dl>
			<dt><a href="javascript:" class="hover">站点信息</a><a href="javascript:">基本设置</a></dt>
			<form name="form" method="post" action="<?php echo U('Site/insert?ct=setup&showpage=0') ?>">
				<dd>
					<ul class="web p0">
						<li> <strong>商城名称：</strong>
							<input type="text" class="text_input" name="site_name" value="<?php echo C('site_name') ?>" />
							<span style="margin-left:-1px">商城名称：将显示在导航条和标题中</span> </li>
						<li> <strong>公司名称：</strong>
							<input type="text"  class="text_input" name="site_company" value="<?php echo C('site_company') ?>" />
							<span style="margin-left:-1px">公司名称：将显示在页面底部公司信息处</span> </li>
						<li> <strong>网站地址URL：</strong>
							<input type="text" class="text_input" name="site_companyurl" value="<?php echo C('site_companyurl') ?>" />
							<span style="margin-left:-1px">网站地址URL：将作为链接显示在页面底部</span> </li>
						<li> <strong>网站后台文件名：</strong>
							<input type="text" class="text_input" name="site_adminfile" value="<?php echo C('site_adminfile') ?>" />
							<span style="margin-left:-1px">设置网站后台访问文件名，默认为“admin.php”，如果您更改了此设置，需要您手动重命名文件名称</span> </li>
						<li> <strong>网站备案信息代码：</strong>
							<input type="text" class="text_input" name="site_icp" value="<?php echo C('site_icp') ?>" />
							<span style="margin-left:-1px">页面底部可以显示ICP备案信息，如果网站已备案，在此输入您的备案号，它将显示在页面底部，如果没有请留空</span> </li>
						<li> <strong>关闭网站：</strong> <b>
								<label><input type="radio" name="site_status" id="RadioGroup1_0" value="0" 
									<?php if (C('site_state') == 0){ ?>
										checked
									<?php } ?>
											  /> 是 </label>
								<label><input type="radio" name="site_status" id="RadioGroup1_1" value="1" 
											   <?php if (C('site_status') == 1){ ?>checked  <?php } ?>
									/> 否 </label>
							</b> <span style="margin-left:-1px">暂时将网站关闭，其他人无法访问，但不影响管理员登录后访问</span> </li>
						<li> <strong>网站第三方统计代码：</strong>
							<textarea name="site_countcode"><?php echo C('site_countcode') ?></textarea>
							<p>页面底部可以显示第三方统计，推荐CNZZ,百度统计</p>
						</li>
					</ul>
				</dd>
				<dd>
					<ul class="web p1">
						<li> <strong>商城LOGO：</strong>
							<input type="text" class="text_input" value="<?php echo C('site_logo') ?>" name="site_logo" /><font class="uplogo" style="cursor: pointer;position: absolute;left:300px;line-height: 22px;">选择</font>
							<span>填写商城LOGO地址，请用逗号隔开URL，宽度和高度，如：logo.gif,120,60</span> </li>
						<li> <strong>标题附加字：</strong>
							<input type="text" class="text_input" value="<?php echo C('site_subtitle') ?>" name="site_subtitle" />
							<span>网页标题通常是搜索引擎关注的重点，本附加字设置出现在标题中商城名称后，如有多个关键字，建议用分隔符分隔</span> </li>
						<li> <strong>Meta Keywords：</strong>
							<input type="text" class="text_input" value="<?php echo C('site_keywords') ?>" name="site_keywords" />
							<span>Keywords项出现在页面头部的&lt;Meta&gt;标签中，用于记录本页面的关键字，多个关键字请用分隔符分隔</span> </li>
						<li> <strong>Meta Description：</strong>
							<input type="text" class="text_input" value="<?php echo C('site_description') ?>" name="site_description" />
							<span style="margin-left:-2px">Description出现在页面头部的Meta标签中，用于记录本页面的高腰与描述，建议不超过80个字</span> </li>
						<li> <strong>其他头部信息：</strong>
							<textarea name="site_headecode"><?php echo C('site_headecode') ?></textarea>
							<p>如需在&lt;head&gt;&lt;/head&gt;中添加其他的HTML代码，可以使用本设置，否则请留空</p>
						</li>
						<li> <strong>水印文件地址：</strong>
							<input type="text" class="text_input" value="<?php echo C('site_watermarkurl') ?>" name="site_watermarkurl" /><font class="upwatemark" style="cursor: pointer;position: absolute;left:300px;line-height: 22px;">选择</font>
							<span>水印文件须为gif格式才可支持透明度设置，并且在开启水印功能后上传的图片才有效果</span> </li>
						<li> <strong>水印位置：</strong> <b>
								<label><input type="radio" name="site_watermarkposition" value="0" 
									<?php if ((int)C('site_watermarkposition') == 0){ ?>checked <?php } ?>
									/> 关闭 </label>
								<label><input type="radio" name="site_watermarkposition" value="1" 
											   <?php if ((int)C('site_watermarkposition') == 1){ ?>checked <?php } ?>
									/> 左上 </label>
								<label><input type="radio" name="site_watermarkposition" value="7" 
											   <?php if ((int)C('site_watermarkposition') == 7){ ?>checked <?php } ?>
									/> 左下 </label><br>
								<label><input type="radio" name="site_watermarkposition" value="3" 
												<?php if ((int)C('site_watermarkposition') == 3){ ?>checked <?php } ?>
									/> 右上 </label>
								<label><input type="radio" name="site_watermarkposition" value="9" 
												<?php if ((int)C('site_watermarkposition') == 9){ ?>checked <?php } ?>
									/> 右下 </label>
								<label><input type="radio" name="site_watermarkposition" value="5" 
												<?php if ((int)C('site_watermarkposition') == 5){ ?>checked <?php } ?>
									/> 居中 </label>
							</b> <span>可以选择水印的位置，默认为关闭</span> </li>
						<li> <strong>水印融合度：</strong>
							<input type="text" class="text_input" value="<?php echo C('site_watermarkalignment') ?>" name="site_watermarkalignment" />
							<span>设置 GIF 类型水印图片与原始图片的融合度，范围为 1～100 的整数，数值越大水印图片透明度越低，需开启水印功能</span> </li>
						<li> <strong>消费积分名称：</strong>
							<input type="text" class="text_input" value="<?php echo C('site_integralname') ?>" name="site_integralname" />
							<span>您可以对消费积分进行重新命名，如：金币</span> </li>
						<li> <strong>积分换算比例：</strong>
							<input type="text" class="text_input" value="<?php echo C('site_integralexchange') ?>" name="site_integralexchange" />
							<span>设置每消费1元可以获得多少积分，默认为没消费1元获得1个积分，如设置为0则关闭消费积分功能</span> </li>
						<li> <strong>系统默认时区：</strong>
							<select name="site_zone" style="margin-right: 50px;">
								<option value="-12"  <?php if ((int)C('site_zone') == -12) { ?> selected = "selected"	<?php } ?> >(GMT -12:00) 埃尼威托克岛, 夸贾林..</option>
								<option value="-11"  <?php if ((int)C('site_zone') == -11) { ?> selected = "selected"	<?php } ?> >(GMT -11:00) 中途岛, 萨摩亚群岛..</option>
								<option value="-10"  <?php if ((int)C('site_zone') == -10) { ?> selected = "selected"	<?php } ?> >(GMT -10:00) 夏威夷</option>
								<option value="-9"  <?php if ((int)C('site_zone') == -9) { ?> selected = "selected"	<?php } ?> >(GMT -09:00) 阿拉斯加</option>
								<option value="-8"  <?php if ((int)C('site_zone') == -8) { ?> selected = "selected"	<?php } ?> >(GMT -08:00) 太平洋时间(美国和加拿..</option>
								<option value="-7"  <?php if ((int)C('site_zone') == -7) { ?> selected = "selected"	<?php } ?> >(GMT -07:00) 山区时间(美国和加拿大..</option>
								<option value="-6"  <?php if ((int)C('site_zone') == -6) { ?> selected = "selected"	<?php } ?> >(GMT -06:00) 中部时间(美国和加拿大..</option>
								<option value="-5"  <?php if ((int)C('site_zone') == -5) { ?> selected = "selected"	<?php } ?> >(GMT -05:00) 东部时间(美国和加拿大..</option>
								<option value="-4"  <?php if ((int)C('site_zone') == -4) { ?> selected = "selected"	<?php } ?> >(GMT -04:00) 大西洋时间(加拿大), ..</option>
								<option value="-3.5"  <?php if ((int)C('site_zone') == -3.5) { ?> selected = "selected"	<?php } ?> >(GMT -03:30) 纽芬兰</option>
								<option value="-3"  <?php if ((int)C('site_zone') == -3) { ?> selected = "selected"	<?php } ?> >(GMT -03:00) 巴西利亚, 布宜诺斯艾..</option>
								<option value="-2"  <?php if ((int)C('site_zone') == -2) { ?> selected = "selected"	<?php } ?> >(GMT -02:00) 中大西洋, 阿森松群岛,..</option>
								<option value="-1"  <?php if ((int)C('site_zone') == -1) { ?> selected = "selected"	<?php } ?> >(GMT -01:00) 亚速群岛, 佛得角群岛 ..</option>
								<option value="0"  <?php if ((int)C('site_zone') == -0) { ?> selected = "selected"	<?php } ?> >(GMT) 卡萨布兰卡, 都柏林, 爱丁堡, ..</option>
								<option value="1"  <?php if ((int)C('site_zone') == 1) { ?> selected = "selected"	<?php } ?> >(GMT +01:00) 柏林, 布鲁塞尔, 哥本..</option>
								<option value="2"  <?php if ((int)C('site_zone') == 2) { ?> selected = "selected"	<?php } ?> >(GMT +02:00) 赫尔辛基, 加里宁格勒,..</option>
								<option value="3"  <?php if ((int)C('site_zone') == 3) { ?> selected = "selected"	<?php } ?> >(GMT +03:00) 巴格达, 利雅得, 莫斯..</option>
								<option value="3.5"  <?php if ((int)C('site_zone') == 3.5) { ?> selected = "selected"	<?php } ?> >(GMT +03:30) 德黑兰</option>
								<option value="4"  <?php if ((int)C('site_zone') == 4) { ?> selected = "selected"	<?php } ?>>(GMT +04:00) 阿布扎比, 巴库, 马斯..</option>
								<option value="4.5"  <?php if ((int)C('site_zone') == 4.5) { ?> selected = "selected"	<?php } ?>>(GMT +04:30) 坎布尔</option>
								<option value="5"  <?php if ((int)C('site_zone') == 5) { ?> selected = "selected"	<?php } ?> >(GMT +05:00) 叶卡特琳堡, 伊斯兰堡,..</option>
								<option value="5.5"  <?php if ((int)C('site_zone') == 5.5) { ?> selected = "selected"	<?php } ?> >(GMT +05:30) 孟买, 加尔各答, 马德..</option>
								<option value="5.75"  <?php if ((int)C('site_zone') == 5.75) { ?> selected = "selected"	<?php } ?> >(GMT +05:45) 加德满都</option>
								<option value="6"  <?php if ((int)C('site_zone') == 6) { ?> selected = "selected"	<?php } ?>>(GMT +06:00) 阿拉木图, 科伦坡, 达..</option>
								<option value="6.5"  <?php if ((int)C('site_zone') == 6.5) { ?> selected = "selected"	<?php } ?> >(GMT +06:30) 仰光</option>
								<option value="7"  <?php if ((int)C('site_zone') == 7) { ?> selected = "selected"	<?php } ?> >(GMT +07:00) 曼谷, 河内, 雅加达..</option>
								<option value="8"  <?php if ((int)C('site_zone') == 8) { ?> selected = "selected"	<?php } ?> >(GMT +08:00) 北京, 香港, 帕斯, 新..</option>
								<option value="9"  <?php if ((int)C('site_zone') == 9) { ?> selected = "selected"	<?php } ?> >(GMT +09:00) 大阪, 札幌, 首尔, 东..</option>
								<option value="9.5"  <?php if ((int)C('site_zone') == 9.5) { ?> selected = "selected"	<?php } ?> >(GMT +09:30) 阿德莱德, 达尔文..</option>
								<option value="10"  <?php if ((int)C('site_zone') == 10) { ?> selected = "selected"	<?php } ?> >(GMT +10:00) 堪培拉, 关岛, 墨尔本,..</option>
								<option value="11"  <?php if ((int)C('site_zone') == 11) { ?> selected = "selected"	<?php } ?> >(GMT +11:00) 马加丹, 新喀里多尼亚,..</option>
								<option value="12"  <?php if ((int)C('site_zone') == 12) { ?> selected = "selected"	<?php } ?> >(GMT +12:00) 奥克兰, 惠灵顿, 斐济,..</option>   
							</select>
							<span>设置系统时区，默认时区：[GMT+08.00] 北京，香港，新加坡，台北</span> </li>
						<li> <strong>默认日期格式：</strong>
							<input type="text" value="<?php echo C('site_dataformat') ?>" name="site_dataformat" class="text_input" />
							<span>使用 yyyy(yy) 表示年，mm 表示月，dd 表示天。如 yyyy-mm-dd 表示 2000-01-01</span> </li>
						<li> <strong>默认时间格式：</strong> <b>
								<label>
									<input type="radio" name="site_timeformat" value="0" 
									 <?php  if (C('site_timeformat') == 0) {?> checked <?php } ?> />
									12小时制 </label>
								<label>
									<input type="radio" name="site_timeformat" value="1" 
									<?php  if (C('site_timeformat') == 1) {?> checked <?php } ?> />
									24小时制 </label>
							</b> <span>设置时间格式，默认为24小时制</span> </li>
						<li> <strong>启用Gzip模式：</strong> <b>
								<label><input type="radio" name="site_gzip" value="0" 
												<?php if (C('site_gzip') == 0) { ?>  checked <?php } ?>
									/> 关闭 </label>
								<label><input type="radio" name="site_gzip" value="1" 
											  <?php if (C('site_gzip') == 1) { ?>  checked <?php } ?>
									/> 开启 </label>
							</b> <span>启用Gzip模式可压缩页面大小，加快网页传输，需要php支持Gzip。如果已经用Apache等对页面进行Gzip压缩，请关闭</span> </li>
						<li> <strong>启用伪静态：</strong> <b>
								<label><input type="radio" name="site_rwrite" value="0" 
											   <?php if (C('site_rwrite') == 0) { ?>  checked <?php } ?>
									/> 关闭 </label>
								<label><input type="radio" name="site_rwrite" value="1" 
											   <?php if (C('site_rwrite') == 1) { ?>  checked <?php } ?>
									/> 开启 </label>
							</b> <span>伪静态是一种搜索引擎优化技术，可以将动态的地址模拟成静态的HTML文件。需要Apache的支持</span> </li>
						
					</ul>
				</dd>
				
				
			
				<div class="input1">
					<input type="submit" value="提交" class="button_search">
				</div>
				<input type="hidden" name="files" value="site.php" />
			</form>
		</dl>
	<!--编辑器开始-->
	<link rel="stylesheet" type="text/css" href="<?php echo CS_PATH; ?>Editor/themes/default/default.css">
	<script type="text/javascript" src="<?php echo JS_PATH; ?>Editor/kindeditor-min.js"></script>
	<script type="text/javascript" src="<?php echo JS_PATH; ?>Editor/lang/zh_CN.js"></script>
    
	<script>  
		//切换
		$(function() {
			var tabTitle = ".tabs dt a";
			var tabContent = ".tabs dd";
			$(tabTitle + ":first").addClass("hover");
			$(tabContent).not(":first").hide();
			$(tabTitle).unbind("click").bind("click", function() {
				$(this).siblings("a").removeClass("hover").end().addClass("hover");
				var index = $(tabTitle).index($(this));
				$(tabContent).eq(index).siblings(tabContent).hide().end().fadeIn(0);
			});
			//默认选中
			$(".tabs dt a").eq("<?php echo ($showpage); ?>").siblings("a").removeClass("hover").end().addClass("hover");
			$(".tabs dd").eq("<?php echo ($showpage); ?>").siblings(tabContent).hide().end().fadeIn(0);
			//编辑器载入
			KindEditor.ready(function(K) {
				//K.create('#content');
				editor = K.editor({
					uploadJson : '<?php echo U("Admin/Editor/upload");?>',
					fileManagerJson : '<?php echo U("Admin/Editor/file_manage");?>',
					extraFileUploadParams: {
						 PHPSESSID 	: '<?php echo session_id() ?>',
						 parentdir	: 'site/',
					},
					allowFileManager: true
				});
				//给按钮添加click事件
				$('.uplogo').live('click', function() {
					var self = $(this);
					editor.extraFileUploadParams.saveRule	= 'logo';
					editor.loadPlugin('image', function() {
						//图片弹窗的基本参数配置
						editor.plugin.imageDialog({
							imageUrl: self.prev('input').val(), //如果图片路径框内有内容直接赋值于弹出框的图片地址文本框
							//点击弹窗内”确定“按钮所执行的逻辑
							clickFn: function(url, title, width, height, border, align) {
//								alert(url);
								self.prev("input").val(url);
								
								//self.next("span").html("<img src=" + url + " height=43>");
								editor.hideDialog(); //隐藏弹窗
							}
						});
					});
				});
				//给按钮添加click事件
				$('.upwatemark').live('click', function() {
					var self = $(this);
					editor.extraFileUploadParams.saveRule	= 'upwatemark';
					editor.loadPlugin('image', function() {
						//图片弹窗的基本参数配置
						editor.plugin.imageDialog({
							imageUrl: self.prev('input').val(), //如果图片路径框内有内容直接赋值于弹出框的图片地址文本框
							//点击弹窗内”确定“按钮所执行的逻辑
							clickFn: function(url, title, width, height, border, align) {
								self.prev("input").val(url);
								//self.next("span").html("<img src=" + url + " height=43>");
								editor.hideDialog(); //隐藏弹窗
							}
						});
					});
				});
			});
		});
	</script>
<div class="copy"><span class="line_white"></span>  版权所有 © 2013-2015 <?php echo C('site_company');?>，并保留所有权利。</div>
</body>
</html>