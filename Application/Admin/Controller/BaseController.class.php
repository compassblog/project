<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends BackController {
    public function _initialize(){
     	parent::_initialize();
     	C('ADMIN_LIST',array(1)); //超级管理员ID
		C('PAGE_NUM',15); //后台每页默认显示数量；
		C('PAGE_CONFIG',array('header'=>'条记录','prev'=>'上一页','next'=>'下一页','first'=>'第一页','last'=>'最后一页','theme'=>' %totalRow% %header% %nowPage%/%totalPage% 页 每页<input onkeypress="changePageSize(event,this)" class="page_view_num" name="page_view_num" value=%listRows%>%frist% %upPage% %linkPage% %downPage% %end%')); 
		
		$page_size = $_GET['pagesize'] ? $_GET['pagesize'] : C('PAGE_NUM');
		define('PAGE_SIZE',$page_size); //每页显示数量
		
		$this->ADMIN_ID =(int)session('ADMIN_ID');
		if ($this->ADMIN_ID < 1) {
			$this->error('请登录后再操作',U('Public/login'));
		}

		$Auth = new \Org\Util\Auth();
		$pid = I('get.pid',1);
		$this->getMenu = $Auth-> getMenu($pid);
		if (!$Auth->checkAuth()) {
			$this->error('你没有权限操作');
		}
    }
}