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
                                        <li>
                                            <strong>项目名称：</strong>
                                         
                                                <input type="text" class="text_input"  name="name" placeholder='' datatype="*3-15" value="<?php echo ($info["name"]); ?>" /><span class="Validform_checktip ">3-15个字符，英文，数字或中文皆可</span>
                                          
                                           
                                        </li>

                                        
                                          <li>
                                            <strong>类别：</strong>
                                             <b style="width:250px;">
                                                <!-- <label><input type="radio" name="status" placeholder=''  value='1' 
                                                    <?php if($info['status'] == 1 ): ?>checked<?php endif; ?>>开启</label> -->
                                                <?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><label><input type="radio" name="cid" placeholder=''  value="<?php echo ($vo["id"]); ?>" <?php if($info['cid'] == $vo['id']): ?>checked<?php endif; ?>> <?php echo ($vo["class_name"]); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </b>
                                            <span class="Validform_checktip" style="margin-left:3px;">设置类别</span>
                                        </li>

                                          <li>
                                             <strong id="tit">项目标签：

                                            <?php if(is_array($title)): $i = 0; $__LIST__ = $title;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?><li style="color:red;"><?php echo ($t); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                           
                                            </strong>
                                         
                                                <input type="text" class="text_input"
                                                id="title" placeholder=''/>
                                                  <input type="hidden" id="tot" name="title" value="<?php echo ($info["title"]); ?>">
                                                <span class="Validform_checktip ">可以用空格分割标签</span>
                                          
                                           
                                        </li>

                                         <li>
                                            <strong>项目简介：</strong>
                                                  <textarea class="text_input" name="intro" datatype="*3-15"><?php echo ($info["intro"]); ?></textarea>
                                                <span class="Validform_checktip "></span>
                                          
                                           
                                        </li>

                                        <li> <strong>封面图片：</strong>
                          <input type="text" class="text_input" value="<?php echo ($info["cover_img"]); ?>" name="cover_img" /><font class="cover" style="cursor: pointer;position: absolute;left:300px;line-height: 22px;">选择</font>
                            <span>选择文件
选择文件
支持JPG、JPEG、PNG、GIF格式；建议尺寸：690x512px；最多9张</span> </li>

                            <li> <strong>顶部通栏：</strong>
                            <input type="text" class="text_input" value="<?php echo ($info["top_img"]); ?>" name="top_img" /><font class="top" style="cursor: pointer;position: absolute;left:300px;line-height: 22px;">选择</font>
                            <span>（可选）支持JPG、JPEG、PNG、GIF格式；建议尺寸：2560x450px</span> </li>


                               <li>
                                            <strong>宣传视频：</strong>
                                         
                                                     <input type="text" class="text_input"  name="video_url" placeholder='' datatype="*3-15" value="<?php echo ($info["video_url"]); ?>" /><span class="Validform_checktip ">（可选）输入视频地址（支持爱奇艺、腾讯、优酷、土豆、酷6、新浪、搜狐视频）</span>
                                          
                                           
                                        </li>
                                        
                                       
                                       
                                          <?php if($info != null): ?><input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"><?php endif; ?>
                                      
                                                                                                      
    
    
    
                                      <input type="hidden" name="uid" value="<?php echo session('USERID');?>">

                                     
                                    </ul>
                                    <div class="submit">
                                            <input type="submit" class='button_search' value='下一步'/>
                                      <!--   <a href="">保存，下一步</a> -->
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
        //切换
        $(function() {
         
            //编辑器载入
            KindEditor.ready(function(K) {
                //K.create('#content');
                editor = K.editor({
                    uploadJson : '<?php echo U("Index/Editor/upload");?>',
                    fileManagerJson : '<?php echo U("Index/Editor/file_manage");?>',
                    extraFileUploadParams: {
                         PHPSESSID  : '<?php echo session_id() ?>',
                         parentdir  : 'pro/',
                    },
                    allowFileManager: true
                });
          //标签回车事件
               $('#title').keydown(function(e){
                if(e.keyCode==32){
                    var str= $(this).val();
                    var text = '<li style="color:red;">'+str+'</li>';
                    $('#tit').append(text);  
                    var postval = $('#tot').val();
                    if (postval == '') {
                        str = str +";";
                    }else{
                        str = postval +str +";";
                    }

                    
                    $('#tot').val(str);
                      

                    $(this).val("");
                    $(this).focus();
                         //$("#user_name").focus();
                }
});


                //给按钮添加click事件
                $('.cover').live('click', function() {
                    var self = $(this);
                    editor.extraFileUploadParams.saveRule   = 'cover';
                    editor.loadPlugin('image', function() {
                        //图片弹窗的基本参数配置
                        editor.plugin.imageDialog({
                            imageUrl: self.prev('input').val(), //如果图片路径框内有内容直接赋值于弹出框的图片地址文本框
                            //点击弹窗内”确定“按钮所执行的逻辑
                            clickFn: function(url, title, width, height, border, align) {
//                              alert(url);
                                self.prev("input").val(url);
                                
                                //self.next("span").html("<img src=" + url + " height=43>");
                                editor.hideDialog(); //隐藏弹窗
                            }
                        });
                    });
                });
                //给按钮添加click事件
                $('.top').live('click', function() {
                    var self = $(this);
                    editor.extraFileUploadParams.saveRule   = 'top';
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