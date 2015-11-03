<?php

// 数据库备份配置
return array(
    
    'BACK_PATH_NAME'=> 'Data',        //备份目录名称,主要是为了创建备份目录；
	'BACK_PATH'     =>WEB_ROOT.'Data/',     //数据库备份路径必须以 / 结尾；
	'BACK_PART'     => '20971520',  //该值用于限制压缩后的分卷最大长度。单位：B；建议设置20M
	'BACK_COMPRESS' => '0',         //压缩备份文件需要PHP环境支持gzopen,gzwrite函数        0:不压缩 1:启用压缩
	'BACK_LEVEL'    => '9',         //压缩级别   1:普通   4:一般   9:最高
);
