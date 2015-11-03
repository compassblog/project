<?php 
namespace Index\Model;
use Think\Model;
class UsersModel extends Model {

	protected $_validate = array(     

	array('verify','require','验证码必须！'), //默认情况下用正则进行验证     
	array('username','','帐号名称已经存在！',0,'unique',1),//在新增的时候验证name字段是否唯一 
	array('password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理         
	
	);

	 protected $_auto = array (   

	  array('ip', 'get_client_ip', 3, 'function'), // 

	  );

	 public function login($username,$password){
      $Users = $this->where("username ='$username'")->find();
	     if (!$Users) {
	      
	      	  $this->error = '用户名不存在';
	      	  return false;
	      }
      	 if ($Users['password'] !== md5($password)) {
      	 	$this->error = '用户名或密码填写错误';
      	 	return false;
      	 }
      	 	session('USERID',$Users['id']);
      	 	session('USERNAME',$Users['username']);
      	 	/* 更新登录信息 */
			$data = array(
			'id' => $Users['id'],
			'last_login' => NOW_TIME,
			'last_ip' => get_client_ip(0),
			);
			$this->save($data);
			return true;
      	 
      

	 }
}