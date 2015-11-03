<?php
namespace Index\Controller;
use Think\Controller;
class IndexController extends BaseController {

	public function _initialize(){
     parent::_initialize();
     $this->db=D('Project');
    }
    public function index(){
      $this->display();
    }
     
    //发起项目测试
    public function my_pro_1(){
        if (IS_POST) {
       
            if ($this->db->create()) {
               $id = $this->db->add();
                showmsg(1,'成功进入下一步',U("Index/my_pro_2",array('id'=>$id)));
            }else{
                showmsg(0,$this->db->getError());
            }
        }else{
           if ((int)session('USERID') < 1) {
            	$this->error('请先登录后再操作',U('Public/login'));
            }
            $class = M('Classify')->select();
            $this->assign('class',$class);
        	$this->display();
        }
    }

    public function my_pro_2(){
        if (IS_POST) {
            # code...
        }else{
           
        }
  
    }
}