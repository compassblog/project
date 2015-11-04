<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>项目列表</title>
<link rel="stylesheet" type="text/css" href="<?php echo CS_PATH;?>admin/style.css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.7.2.min.js"></script>
</head>

<body>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul>
	<li><a href="<?php echo U('Project/stallLists',array('uid'=>$vo['uid']));?>"><img src="<?php echo ($vo["cover_img"]); ?>" width="100px" height="100px"><a></li>
	<li><a href="<?php echo U('Project/stallLists',array('uid'=>$vo['uid']));?>"><?php echo ($vo["name"]); ?><a></li>
</ul><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>