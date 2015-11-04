<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我支持的</title>
<link rel="stylesheet" type="text/css" href="<?php echo CS_PATH;?>admin/style.css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.7.2.min.js"></script>
</head>

<body>

<table border="1" width="80%" height="300px">
<tr>
	<td>项目</td>
	<td>金额</td>
	<td>状态</td>
	<td>操作</td>	
</tr>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	<td><?php echo ($vo["proname"]); ?></td>
	<td><?php echo ($vo["cart_price"]); ?>￥</td>
	<?php if($vo['cart_status'] == 0): ?><td>等待付款</td>
	<?php else: ?>
	<td>完成付款</td><?php endif; ?>
	<?php if($vo['cart_status'] == 0): ?><td><a href="<?php echo U('Pay/index',array('id'=>$vo['sid']));?>">完成付款</a>||<a href="#">取消</a></td>
	<?php else: ?>
	<td><a href="<?php echo U('Pay/delPay',array('id'=>$vo['id'],'price'=>$vo['cart_price']));?>">取消</a></td><?php endif; ?>
		
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>

</body>
</html>