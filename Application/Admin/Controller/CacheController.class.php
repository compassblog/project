<?php
namespace Admin\Controller;
use Think\Controller;
class CacheController extends BaseController {
    public function _initialize(){
     	parent::_initialize();
	}
	
	public function cache_clear(){
		$cache = array(
		    'Admincache' => RUNTIME_PATH . 'Cache/',
            "Admindata" => RUNTIME_PATH . 'Data/',
            "Adminlogs" => RUNTIME_PATH . 'Logs/',
            "Admintemp" => RUNTIME_PATH . 'Temp/',
		);
		foreach($cache as $val){
			del_files($val);
		}
		
		$this->success('成功更新缓存');
	}
}