<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Cache;
class AdminController extends BaseController{
	
	public function _initialize(){
		parent::_initialize();
		$this->Db = M('Admin');
	}
	
	public function lists(){
		if(IS_POST){
    //          $redis = Cache::getInstance('Redis');
			 // $data = $redis->get('admin_list');
			 // if(empty($data)){
					 $field = "a.id,a.username ,u.description as group_name";
				
					if(isset($_POST['keyword']) && $_POST['keyword']){//分类
					
						$keyword = $_POST['keyword'];
						$sqlmap="a.username like '%{$keyword}%' and a.group_id = u.id";
					}else{
		                  $sqlmap = "a.group_id = u.id";
					}	  
					//分页
					$pagenum=isset($_POST['page']) ? intval($_POST['page']) : 1;
					$rowsnum=isset($_GET['rows']) && (int)($_GET['rows']) != 0 ? intval($_GET['rows']) : PAGE_SIZE;
					//计算总数 
					$data['total'] = $this->Db->table("shop_admin a,shop_admin_auth u")->where($sqlmap)->count();	

					$data['rows']=$this->Db->table("shop_admin a,shop_admin_auth u")->field($field)->where($sqlmap)->limit(($pagenum-1)*$rowsnum.','.$rowsnum)->select();

		           
		            //$redis->set('admin_list' ,$data,20); //查询数据库缓存到Reids
		            
					if (!$data['rows']) $data['rows']=array();
					echo json_encode($data);
			 // }else{
			 // 	if (!$data['rows']) $data['rows']=array();
			 // 	    echo json_encode($data);
			 // }

			
		}else{
			$this->display();
		}
	}
	
	public function add(){
		if(IS_POST){
			$data['username'] = addslashes(trim($_POST['username']));
			$data['password'] =md5(addslashes(trim($_POST['password'])));
			$data['group_id'] = $_POST['group_id'];
			if($_POST['password'] == $_POST['password2']){
				if($this->Db->add($data)){
					$res['status']= '1';
					$res['info'] ='添加数据成功';
					$res['url'] = U('Admin/lists');
				}else{
					$res['status']= '0';
					$res['info'] ='添加数据失败';
				}
			}else{
				$res['status']= '0';
				$res['info'] ='两次密码输入不一致';
			}	
			echo json_encode($res);
		}else{
		  $group=  M('Admin_auth')->field('id as group_id,description as group_name')->select();	
		  $this->assign('group',$group);
		  $this->display();
		}
		
	}

    public function edit(){
    	$id = I('id', 0, 'intval');
    	if(IS_POST){
    		$data['username'] = addslashes(trim($_POST['username']));
			$data['group_id'] = $_POST['group_id'];
			if($this->Db->where("id={$id}")->save($data)){
				$res['status']= '1';
				$res['info'] ='编辑数据成功';
				$res['url'] = U('Admin/lists');
			}else{
				$res['status']= '0';
				$res['info'] ='编辑数据失败';
			}
			echo json_encode($res);
    	}else{
    		
    	    $info =  $this->Db->where("id={$id}")->find();
		    $group=  M('Admin_auth')->field('id as group_id,description as group_name')->select();	
		    $this->assign('info',$info);
			$this->assign('group',$group);
    		$this->display('add');
    	}
    }
	
	public function del(){
		$id = $_GET['id'];
		$sqlmap['id'] = array("IN", $id);
		$this->Db->where($sqlmap)->delete();
		$res['status']= '1';
		$res['info'] ='删除数据成功';
		$res['url'] = U('Admin/lists');
		echo json_encode($res);
	}

	public function changePwd(){
		if (IS_POST) {

			$oldPwd = md5(addslashes(trim($_POST['oldpwd'])));
			$pwd = md5(addslashes(trim($_POST['pwd'])));
			$pwd2 =  md5(addslashes(trim($_POST['pwd2'])));
	
			if (!$this->Db->where(array('password'=>$oldPwd))->find()) {
				 $res['status'] = 0 ;
				 $res['info']	='请输入正确的旧密码';
			}else{
				if ($pwd!== $pwd2) {
				 $res['status'] = 0 ;
				 $res['info']	='两次密码输入不一致';
				}else{
                   $data['password'] = $pwd;
                   if ($this->Db->where(array('id'=>session('ADMIN_ID'),'password'=>$oldPwd))->save($data)) {
                   	 session('ADMIN_ID',NULL);
					 session('ADMIN_NAME',NULL);
		             session('[destroy]');
                   	 $res['status'] = 1 ;
				     $res['info']	='修改密码成功';
				     $res['url'] = U('Public/login');
                   }else{
                   	 $res['status'] = 0 ;
				     $res['info']	='修改密码失败';	
                   }
				}

			}
			echo json_encode($res);
		}else{
			$this->display();
		}
	}
	
	
	
	
	
}	