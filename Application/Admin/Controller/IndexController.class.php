<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Cache;
class IndexController extends BaseController {
	public function _initialize(){
		parent::_initialize();
	}	
    public function index(){

    $this->assign('top',$this->getMenu['top']);
	$this->assign('son',$this->getMenu['son']);	
	$this->display();
    }

    public function home(){
        $this->assign('sys_info',get_sysinfo());
    	$this->display();
    }

}