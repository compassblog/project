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

<h1><?php echo ($proName); ?></h1>
<h2>支持<?php echo ($list["price"]); ?>元</h2>
<h2 style="color:red;">恭喜抢单成功，请在30分钟内支付</h2>

<h3>回报内容:<?php echo ($list["intro"]); ?></h3>
<h3>收件地址：<?php echo ($address); ?></h3>

<a href="<?php echo U('Pay/index',array('id'=>$list['id']));?>">确定，提交</a>

</body>
</html>