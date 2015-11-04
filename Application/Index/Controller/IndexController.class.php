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
            $id = I('post.id');
            if (!empty($id)) {
                $this->db->where('id='.$id)->save($_POST);
              
                showmsg(1,'成功进入下一步',U("Index/my_pro_2"));
          
            }else{
       
                if ($this->db->create()) {
                   $this->db->add();
                    showmsg(1,'成功进入下一步',U("Index/my_pro_2"));
                }else{
                    showmsg(0,$this->db->getError());
                }
             }   
        }else{
           if ((int)session('USERID') < 1) {
                $this->error('请先登录后再操作',U('Public/login'));
            }
            $info = $this->db->where('uid='.session('USERID'))->find();
           
            $titles  = explode(';', rtrim($info['title'],';'));
            $class = M('Classify')->select();
            $this->assign('title',$titles);
            $this->assign('info',$info);
            $this->assign('class',$class);
            $this->display();
        }
    }


    public function my_pro_2(){
        if (IS_POST) {
             $data['dintro'] = I('post.dintro');
             if ( $this->db->where('uid='.session('USERID'))->save($data)) {
                 showmsg(1,'成功进入下一步',U('Index/my_pro_3'));
             }else{
                showmsg(0,'编辑失败');
             }
  
            # code...
        }else{
            if ((int)session('USERID') < 1) {
                $this->error('请先登录后再操作',U('Public/login'));
            }
            $dintro = $this->db->where('uid='.session('USERID'))->getField('dintro');
            $this->assign('dintro',$dintro);
            $this->display();
           
        }
  
    }


    public function my_pro_3(){
        if (IS_POST) {

          
        }else{
             if ((int)session('USERID') < 1) {
                $this->error('请先登录后再操作',U('Public/login'));
            }
             $db =D('Stall');
           $uid = session('USERID');
           $list = $db->getStallList($uid);
           $this->assign('list',$list);
            $this->display();
        }
    }

    public function add(){
        if (IS_POST) {
            $db =D('Stall');
            $id = I('post.id');
            if (!empty($id)) {
                $db->where('id='.$id)->save($_POST);
                showmsg(1,'编辑成功',U('Index/my_pro_3'));
            }else{
                if ($db->create()) {
                    $db->add();
                    showmsg(1,'添加成功',U('Index/my_pro_3'));
                }else{
                     showmsg(0,$db->getError());
                }

            }
        }else{
             if ((int)session('USERID') < 1) {
                $this->error('请先登录后再操作',U('Public/login'));
            }
            $this->display();
        }
    }

    public function examine(){
        $id = I('get.id');
        $db = D('Stall');
        if ($db->toExamine($id)) {
              $this->success('审核成功',U('Index/my_pro_3'));
        }else{
              $this->error('审核失败请重新尝试',U('Index/my_pro_3')); 
        }
    }

    public function edit(){
        $db = D('Stall');
        if (IS_POST) {
            $id  = I('post.id');
           if ($db->where('id='.$id)->save($_POST)) {
                showmsg(1,'修改成功',U('Index/my_pro_3'));
            } else{
                showmsg(0,'修改失败');
            }
        }else{
               if ((int)session('USERID') < 1) {
                $this->error('请先登录后再操作',U('Public/login'));
            }
            $id = I('get.id');
            
            $info = $db->where('id='.$id)->find();
            $this->assign('info',$info);
            $this->display('add');
        }
    }

    public function del(){
        $id = I('get.id');
        $db = D('Stall'); 

        if ($db->delStall($id)) {
          $this->success('删除成功',U('Index/my_pro_3'));
        }else{
          $this->error('删除失败，请重新尝试',U('Index/my_pro_3'));   
        }
    }

     public function lists(){
        $db = D('Project');
        $list = $db->getLists();
       // dump($list); 
       $this->assign('list',$list);
        $this->display();
    }

}