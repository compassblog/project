<?php
namespace Admin\Controller;
use Think\Db;
class DataController extends BaseController{
	
	public function backup(){
		if(IS_POST){
			
		$Db = Db::getInstance();
		$info = $Db->query('SHOW TABLE STATUS');
	    //dump($info);
		foreach($info as $key => $val){
			$size += $val['data_length']+$val['index_length'];
			$info[$key]['size'] = bytes_format($size);
			$info[$key]['table_name'] =$val['name'];
		}
		$data['rows'] = $info;

        if (!$data['rows']) $data['rows']=array();
		echo json_encode($data);
		}else{
		$this->display();
		}
	}
	
	public function dobackup(){
	$tables = I('table');
	$start =0;
	 if(IS_POST){ //初始化
            $path = C('BACK_PATH');
            if(!is_dir($path)){
                mkdir($path, 0755, true);
            }
            //读取备份配置
            $config = array(
                'path'     => C('BACK_PATH'),
                'part'     => C('BACK_PART'),
                'compress' => C('BACK_COMPRESS'),
                'level'    => C('BACK_LEVEL'),
            );
		

            //检查是否有正在执行的任务
            $lock = "{$config['path']}backup.lock";
            if(is_file($lock)){
                $this->error('检测到有一个备份任务正在执行，请稍后再试！');
            } else {
                //创建锁文件
                file_put_contents($lock, NOW_TIME);
            }

            //检查备份目录是否可写
            is_writeable($config['path']) || $this->error('备份目录不存在或不可写，请检查后重试！');
            session('backup_config', $config);

            //生成备份文件信息
            $file = array(
                'name' => date('Ymd-His', NOW_TIME),
                'part' => 1,
            );
            session('backup_file', $file);

            //缓存要备份的表
            session('backup_tables', $tables);

            //创建备份文件
            $Database = new \Org\Util\Database($file, $config);
            if(false !== $Database->create()){
            //备份开始 
			   foreach($tables as $k =>$v){
			   	 $Database->backup($tables[$k], $start);
				   
			   }
			   
			   unlink(session('backup_config.path') . 'backup.lock');
               session('backup_tables', null);
               session('backup_file', null);
               session('backup_config', null);

			   	showmsg(0, '成功备份');

            } else {
                showmsg(0, '初始化失败');
            }
        } 
	}

/**
     * 优化表
     * @param  String $tables 表名
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function yh(){
        if(IS_POST) {
        	$tables = I('table');
            $Db   = Db::getInstance();
            if(is_array($tables)){
                $tables = implode('`,`', $tables);
                $list = $Db->query("OPTIMIZE TABLE `{$tables}`");

                if($list){
                   showmsg(1, '数据优化成功');
                } else {
                    showmsg(0, '数据优化失败，请重新尝试');
                }
            } else {
                $list = $Db->query("OPTIMIZE TABLE `{$tables}`");
                if($list){
                   showmsg(1, "数据表'{$tables}'优化成功");
                } else {
                   showmsg(0, "数据表'{$tables}'优化失败，请重新尝试");
                }
            }
        } else {
            showmsg(0, "无效数据");
        }
    }
	
	/**
     * 修复表
     * @param  String $tables 表名
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function xf(){
        if(IS_POST) {
        	$tables = I('table');
            $Db   = Db::getInstance();
            if(is_array($tables)){
                $tables = implode('`,`', $tables);
                $list = $Db->query("REPAIR TABLE `{$tables}`");

                if($list){
                    showmsg(1, '数据表修复完成');
                } else {
                     showmsg(0, '数据修复失败，请重新尝试');
                }
            } else {
                $list = $Db->query("REPAIR TABLE `{$tables}`");
                if($list){
                    showmsg(1, "数据表'{$tables}'修复成功");
                } else {
                    showmsg(0, "数据表'{$tables}'修复失败，请重新尝试");
                }
            }
        } else {
             showmsg(0, "无效数据");
        }
    }
	
}	