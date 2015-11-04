<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>支付</title>
<link rel="stylesheet" type="text/css" href="<?php echo CS_PATH;?>admin/style.css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.7.2.min.js"></script>
</head>

<body>
<h1><?php echo ($proName); ?></h1>
<h1>价格：<?php echo ($price); ?>￥</h1>
<h1>收货地址：<?php echo ($address); ?></h1><br/><br/>
<form method="post" action="<?php echo U('Pay/doPay');?>">
支付方式<input type="radio" value="" checked="checked" />余额支付<br/><br/>
你的余额:<?php echo ($balance); ?>￥
<input type="hidden" name="balance" value="<?php echo ($balance); ?>"><br/><br/>
<input type="hidden" name="price" value="<?php echo ($price); ?>">
<input type="hidden" name="sid" value="<?php echo ($sid); ?>">
<input type="submit" value="确认支付">
</form>
</body>
</html>