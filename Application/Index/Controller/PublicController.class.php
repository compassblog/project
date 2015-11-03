<?php
namespace Index\Controller;
use Think\Controller;
class PublicController extends BaseController{
	
	public function _initialize(){
		parent::_initialize();
	}
	
	public function login(){		
		if(IS_POST){
			$db = D('Users');
			$username = I('post.username');
			$password = I('post.password');
			$verify   = I('post.verify');
			if($this->check_verify($verify)){
			
				if($db->login($username,$password)){
					showmsg(1,'登录成功',U('Index/index'));  								
				}else{
			        showmsg(0,$db->getError());
				}
			}else{
				showmsg(0,'验证码输入错误');
			}
		
		}else{
		$this->display();
		}
	}
	
	public function logout(){
		session('ADMIN_ID',NULL);
		session('ADMIN_NAME',NULL);
		session('[destroy]');
		$this->success('成功登出',U('Public/login'));
	}
	
	public function verify(){ //简易验证码
		$Verify =     new \Think\Verify();
		$Verify->codeSet ='123456789';
		$Verify->imageH =26;
		$Verify->fontSize = 15;
		$Verify->length   = 4;
		$Verify->useNoise = false;
		$Verify->useCurve =FALSE;
		$Verify->entry();
	}
	
// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
	public function check_verify($code, $id = ''){
		$verify = new \Think\Verify();    
		return $verify->check($code, $id);}
}	