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
    <div class="site">
        <a href="#">会员管理</a> > 添加会员
    </div>
    <span class="line_white"></span>
   <!-- <div class="sm">小提示：所添加的会员默认密码为<strong><font color='red'>123456</font></strong></div>-->
    <div class="install mt10">
        <dl>
            <dd>
                <div class="install mt10">
                    <div class="install mt10">
                        <dl>
                            <form action="<?php echo U(ACTION_NAME) ?>" class="addform" method="post" onsubmit="return false">
                                <dd>
                                    <ul class="web">
                                        <li>
                                            <strong>管理员名称：</strong>
                                         
                                                <input type="text" class="text_input"  name="username" placeholder='' datatype="*3-15" value="<?php echo ($info["username"]); ?>" /><span class="Validform_checktip ">设置管理组名称，3-15个字符，英文，数字或中文皆可</span>
                                          
                                           
                                        </li>
                                        
                                         <li>
                                            <strong>管理员等级：</strong>
                                            <select name="group_id" style="margin-right: 44px;" datatype="n1-20" ignore="ignore">
                                            	<?php if($info == null): ?><option value="0">请选择</option>
                                                <?php if(is_array($group)): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["group_id"]); ?>"><?php echo ($vo["group_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>	
                                                <?php else: ?>
                                               <?php if(is_array($group)): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["group_id"]); ?>" <?php if($vo['group_id'] == $info['group_id']): ?>selected<?php endif; ?>><?php echo ($vo["group_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                            </select>
                                            <span class="Validform_checktip">设置会员所属等级</span>
                                        </li>  
                                        <?php if($info == null): ?><li>
                                            <strong>管理员密码：</strong>
                                         
                                                <input type="text" class="text_input"  name="password" placeholder='' datatype="*3-15" value="<?php echo ($info["password"]); ?>" /><span class="Validform_checktip ">设置管理组名称，3-15个字符，英文，数字或中文皆可</span>
                                          
                                           
                                        </li>
                                        
                                        </li>
                                        
                                          <li>
                                            <strong>确认密码：</strong>
                                         
                                                <input type="text" class="text_input"  name="password2" placeholder='' datatype="*3-15" value="<?php echo ($info["password"]); ?>" /><span class="Validform_checktip ">设置管理组名称，3-15个字符，英文，数字或中文皆可</span>
                                          
                                           
                                        </li><?php endif; ?>       
                                      
                                      
                                                                                                      
    
    
    
    

                                      
                                        <?php if (!empty($info)): ?>
                                            <input type="hidden" value="<?php echo $info['id']; ?>" name="id">
                                        <?php endif ?>
                                    </ul>
                                    <div class="submit">
                                        <input type="submit" class='button_search' value='提交'/>
					                    <a href="<?php echo U('lists')?>">返回</a>
                                    </div>
                                </dd>
                            </form>
                        </dl>
                    </div>
                </div>
            </dd>
        </dl>
    </div>
    <div class="copy"><span class="line_white"></span>  版权所有 © 2013-2015 岚海网络，并保留所有权利。</div>
</body>
</html>
</div>
	<!--编辑器开始-->
	<link rel="stylesheet" type="text/css" href="<?php echo CS_PATH; ?>Editor/themes/default/default.css">
	<script type="text/javascript" src="<?php echo JS_PATH; ?>Editor/kindeditor-min.js"></script>
	<script type="text/javascript" src="<?php echo JS_PATH; ?>Editor/lang/zh_CN.js"></script>
	
	<script>  
		//切换
		$(function() {
			//编辑器载入
			KindEditor.ready(function(K) {
			
				editor = K.editor({
					uploadJson : '<?php echo U('User/member/upload')?>',
					fileManagerJson : '<?php echo U("Admin/Editor/file_manage");?>',
					extraFileUploadParams: {
						 PHPSESSID 	: '<?php echo session_id() ?>',
						 parentdir	: 'head/',
						 old_img	:'<?php echo $info['image'] ?>',
					},
					allowFileManager: true
				});
				//给按钮添加click事件
				$('.upimg').live('click', function() {
					var self = $(this);
					editor.extraFileUploadParams.saveRule	= 'image';
					editor.loadPlugin('image', function() {
						//图片弹窗的基本参数配置
						editor.plugin.imageDialog({
							imageUrl: self.prev('input').val(), //如果图片路径框内有内容直接赋值于弹出框的图片地址文本框
							//点击弹窗内”确定“按钮所执行的逻辑
							clickFn: function(url, title, width, height, border, align) {
								
								self.prev("input").val(url);
								
								editor.hideDialog(); //隐藏弹窗
							}
						});
					});
				});
				
			});
		});
	</script>

<script type="text/javascript">	
    //提交表单
    $(function() {
    	//默认高亮
		$(window.parent.document).find(".z_side").removeClass("hover");
		$(window.parent.document).find(".n12").addClass("hover");
        var demo = $(".addform").Validform({
        	
            btnSubmit: "#btn_sub",
            btnReset: ".btn_reset",
			tiptype:function(){},
            label: ".label",
            showAllError: false,
            ajaxPost: true,
            callback: function(data) {
                $("#Validform_msg").hide();
                if (data.status == "0") {
                    art.dialog({width: 320, time: 5, title: '温馨提示(5秒后关闭)', content: data.info, ok: true});
                }
                if (data.status == "1") {
                    window.location.href = data.url;
                }
            }
            
        });
    });
</script>