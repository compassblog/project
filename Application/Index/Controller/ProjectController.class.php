<?php
namespace Index\Controller;
use Think\Controller;
class ProjectController extends BaseController {

	public function _initialize(){
     parent::_initialize();
     $this->db=D('Project');
     $this->sDb =D('Stall');
    }
    public function stallLists(){
      $uid = I('get.uid');
      $list = $this->sDb->getStallStatusList($uid);
    // dump($list);
      $this->assign('list',$list);
      $this->display();
    }
     
   

}