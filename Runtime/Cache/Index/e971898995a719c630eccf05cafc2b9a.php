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

    <form action="<?php echo U(ACTION_NAME) ?>" class="addform" method="post" onsubmit="return false">
                                <dd>
                                    <ul class="web">
                                       <textarea id="dintro" name="dintro">
  <?php if($dintro != null): echo ($dintro); ?>
  <?php else: ?>

                                       关于我

向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。

我想要做什么

以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。

项目的进展和风险

让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险

为什么需要你的支持

这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。

我的承诺与回报

让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你。<?php endif; ?></textarea>
                                     
                                    </ul>
                                    <div class="submit">
                                        <input type="submit" class='button_search' value='下一步'/>
                                       <!--  <a href="">保存，下一步</a> -->
                                    </div>
                                </dd>
                            </form>
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