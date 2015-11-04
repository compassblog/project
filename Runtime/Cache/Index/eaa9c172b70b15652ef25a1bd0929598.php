<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>档位列表</title>
<link rel="stylesheet" type="text/css" href="<?php echo CS_PATH;?>admin/style.css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.7.2.min.js"></script>
</head>

<body>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul>
	<li><?php echo ($vo["price"]); ?>￥</li>
	<li><?php echo ($vo["intro"]); ?></li>
	<li><img src="<?php echo ($vo["img"]); ?>" width="50px" height="50px"></li>
	<li><a href="<?php echo U('Cart/cart',array('id'=>$vo['id']));?>">立即支付</a></li>
</ul><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>