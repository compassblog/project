<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="x-ua-compatible"/>
<title>项目发布</title>
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
<a href="<?php echo U('Index/add');?>">添加档位</a>||<a href="<?php echo U('Index/lists');?>">查看列表</a>
<table border="1px" width="100%" >
   <tr>
       <td align="center">档位价格</td>
       <td align="center">名额限制</td>
       <td align="center">回报内容</td>
       <td align="center">快递选择</td>
       <td align="center">说明图片</td>
       <td align="center">状态</td>
       <td align="center">编辑</td>
   </tr>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
       <td align="center"><?php echo ($vo["price"]); ?></td>

       <?php if($vo['is_limit'] == 0 ): ?><td align="center">限制名额</td>
       <?php else: ?>
       <td align="center">不限名额（<?php echo ($vo["limit_num"]); ?>）</td><?php endif; ?>
       <td align="center"><?php echo ($vo["intro"]); ?></td>
       <?php if($vo['email_type'] == 0 ): ?><td align="center">快递</td>
       <?php else: ?>
       <td align="center">平邮</td><?php endif; ?>
       <td align="center"><img src="<?php echo ($vo["img"]); ?>" width="50px" height="50px"></td>
       <?php if($vo['status'] == 0 ): ?><td align="center">未审核</td>
       <?php else: ?>
        <td align="center">已审核</td><?php endif; ?>
       <td align="center"><a href="<?php echo U('Index/examine',array('id'=>$vo['id']));?>">审核</a>||<a href="<?php echo U('Index/edit',array('id'=>$vo['id']));?>">编辑</a>||<a href="<?php echo U('Index/del',array('id'=>$vo['id']));?>">删除</a></td>
   </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
   
</body>
</html>
<!--编辑器开始-->
    <link rel="stylesheet" type="text/css" href="<?php echo CS_PATH; ?>Editor/themes/default/default.css">
    <script type="text/javascript" src="<?php echo JS_PATH; ?>Editor/kindeditor-min.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH; ?>Editor/lang/zh_CN.js"></script>
<script>  

KindEditor.ready(function(K) {
            var editor1 = K.create('#dintro', {
                width : '80%',
                height: '500px',
                uploadJson : '<?php echo U("Index/Editor/upload");?>',
                fileManagerJson : '<?php echo U("Index/Editor/file_manage");?>',
                 extraFileUploadParams: {
                         PHPSESSID  : '<?php echo session_id() ?>',
                         parentdir  : 'pro/',
                    },
                allowFileManager : true
        
            });
           
        });
    </script>

<script type="text/javascript"> 
    //提交表单
    $(function() {
      
        var demo = $(".addform").Validform({
            
            btnSubmit: "#btn_sub",
            btnReset: ".btn_reset",
            tiptype:function(){},
            label: ".label",
            showAllError: false,
            ajaxPost: true,
            callback: function(data) {
             
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