<?php
namespace Admin\Controller;
use Think\Controller;
class UserGroupController extends BaseController{
	
	public function _initialize(){
		parent::_initialize();
		$this->db = M('User_group');
	}
	
	public function lists(){
		if(IS_POST){
			$sqlmap = array();
			$_order=isset($_POST['order']) ? ($_POST['order']) : NULL;
			$_sort=isset($_POST['sort']) ? ($_POST['sort']) : NULL;
			if($_order && $_sort){
				$order[$_sort] = $_order;
			}else{
				$order['id'] = 'DESC';
			}
			$pagenum=isset($_POST['page']) ? intval($_POST['page']) : 1;
			$rowsnum=isset($_POST['rows']) && (int)($_POST['rows']) != 0 ? intval($_POST['rows']) : PAGE_SIZE;
			$data['total'] = $this->db->count();    //计算总数 
			$data['rows']=$this->db->limit(($pagenum-1)*$rowsnum.','.$rowsnum)->order($order)->select();
			// echo $this->db->getlastsql();
			// exit;
			if (!$data['rows']) $data['rows']=array();
			echo json_encode($data);
		}else{
			$this->display();
		}
	
	}
	
	public function add(){
		if(IS_POST){
			$data['name'] = addslashes(trim($_POST['name']));
			$data['min_points'] =addslashes(trim($_POST['min_points']));
			$data['max_points'] = addslashes(trim($_POST['max_points']));
			$data['discount'] = addslashes(trim($_POST['discount']));
			$data['status'] = $_POST['status'];
			if($this->db->add($data)){
				$res['status']= '1';
				$res['info'] ='添加数据成功';
				$res['url'] = U('UserGroup/lists');
			}else{
				$res['status']= '0';
				$res['info'] ='添加数据失败';
			}
			echo json_encode($res);
		}else{
		  $this->display();
		}
		
	}

    public function edit(){
    	$id = I('id', 0, 'intval');
    	if(IS_POST){
    		$data['name'] = addslashes(trim($_POST['name']));
			$data['min_points'] =addslashes(trim($_POST['min_points']));
			$data['max_points'] = addslashes(trim($_POST['max_points']));
			$data['discount'] = addslashes(trim($_POST['discount']));
			$data['status'] = $_POST['status'];
			if($this->db->where("id={$id}")->save($data)){
				$res['status']= '1';
				$res['info'] ='编辑数据成功';
				$res['url'] = U('UserGroup/lists');
			}else{
				$res['status']= '0';
				$res['info'] ='编辑数据失败';
			}
			echo json_encode($res);
    	}else{
    		$this->display('add');
    	}
    }
	
	public function del(){
		$id = $_GET['id'];
		$sqlmap['id'] = array("IN", $id);
		$this->db->where($sqlmap)->delete();
		$res['status']= '1';
		$res['info'] ='删除数据成功';
		$res['url'] = U('UserGroup/lists');;
		echo json_encode($res);
	}
	
	
	
	
	
}	