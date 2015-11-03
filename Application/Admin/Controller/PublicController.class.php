<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends BackController{
	
	public function _initialize(){
		parent::_initialize();
	}
	
	public function login(){
		
		
		if(IS_POST){
			$db = M('Admin');
			$username = isset($_POST['username'])?addslashes(trim($_POST['username'])):'';
			$password = isset($_POST['password'])?md5(addslashes(trim($_POST['password']))):'';
			$verify   = isset($_POST['verify'])?addslashes(trim($_POST['verify'])):'';
			if($this->check_verify($verify)){
			 $userInfo = $db ->where(array('username'=>$username))->find();
				if($userInfo){
					
					 if($userInfo['password'] == $password){
					    session('ADMIN_ID',$userInfo['id']);
						session('ADMIN_NAME',$userInfo['username']);
						$res['status'] = 1 ;
			            $res['info'] ='登录成功';
						$res['url'] =U('Index/index'); 
					 }else{
					 	$res['status'] = 0 ;
			            $res['info'] ='密码填写错误';
					 } 								
				}else{
					$res['status'] = 0 ;
			        $res['info'] ='用户不存在';
				}
			}else{
			  $res['status'] = 0 ;
			  $res['info'] ='验证码输出错误';
			}
			echo json_encode($res);
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