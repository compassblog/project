<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController{
	
	public function _initialize(){
		parent::_initialize();
		$this->db = M('User');
	}
	
	public function lists(){
		if(IS_POST){
			$sqlmap = array();
			$field = 'id,username,group_id,tel,email,points,money,exp,time';
			//排序
			$_order=isset($_POST['order']) ? ($_POST['order']) : NULL;
			$_sort=isset($_POST['sort']) ? ($_POST['sort']) : NULL;
			if($_order && $_sort){
				$order[$_sort] = $_order;
			}else{
				$order['id'] = 'DESC';
			}
			//筛选
			if(isset($_GET['group_id']) && $_GET['group_id']){//分类
				$sqlmap['group_id']= $_GET['group_id'];
			}
			if(isset($_GET['keyword']) && $_GET['keyword']){//分类
				$keyword = $_GET['keyword'];
				$sqlmap['username|email|tel'] = array("LIKE", "%".$keyword."%");
			}
			//分页
			$pagenum=isset($_POST['page']) ? intval($_POST['page']) : 1;
			$rowsnum=isset($_GET['rows']) && (int)($_GET['rows']) != 0 ? intval($_GET['rows']) : PAGE_SIZE;
			//计算总数 
			$data['total'] = $this->db->where($sqlmap)->count();	
			$data['group'] = M('UserGroup')->field('id,name')->order('sort ASC, id ASC')->select();
			$data['rows']=$this->db->field($field)->where($sqlmap)->limit(($pagenum-1)*$rowsnum.','.$rowsnum)->order($order)->select();
			if (!$data['group']) $data['group']=array();
			if (!$data['rows']) $data['rows']=array();
			echo json_encode($data);
		}else{
			$this->display();
		}
	
	}
	
	public function add(){
		if(IS_POST){
			$data['rules'] = implode(",", $_POST['rules']);
			$data['description'] =addslashes(trim($_POST['description']));
			$data['status'] = $_POST['status'];
			if($this->authDb->add($data)){
				$res['status']= '1';
				$res['info'] ='添加数据成功';
				$res['url'] = U('AdminAuth/lists');
			}else{
				$res['status']= '0';
				$res['info'] ='添加数据失败';
			}
			echo json_encode($res);
		}else{
		  $node =  M('Node')->field('id,node_name')->select();	
		  $this->assign('node',$node);
		  $this->display();
		}
		
	}

    public function edit(){
    	$id = I('id', 0, 'intval');
    	if(IS_POST){
    		$data['rules'] = implode(",", $_POST['rules']);
			$data['description'] =addslashes(trim($_POST['description']));
			$data['status'] = $_POST['status'];
			if($this->authDb->where("id={$id}")->save($data)){
				$res['status']= '1';
				$res['info'] ='编辑数据成功';
				$res['url'] = U('AdminAuth/lists');
			}else{
				$res['status']= '0';
				$res['info'] ='编辑数据失败';
			}
			echo json_encode($res);
    	}else{
    		
    	    $info =  $this->authDb->where("id={$id}")->find();
		    $node =  M('Node')->field('id,node_name')->select();
		    $this->assign('info',$info);
			$this->assign('node',$node);
    		$this->display('add');
    	}
    }
	
	public function del(){
		$id = $_GET['id'];
		$sqlmap['id'] = array("IN", $id);
		$this->db->where($sqlmap)->delete();
		$res['status']= '1';
		$res['info'] ='删除数据成功';
		$res['url'] = U('User/lists');;
		echo json_encode($res);
	}
	
	
	
	
	
}	