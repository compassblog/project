<?php
namespace Admin\Controller;
use Think\Controller;

class NodeController extends BaseController{
	public function _initialize(){
		parent::_initialize();
		$this->db =M('Node');
	}
	
	public function lists(){
		if(IS_POST){
		$Category = new \Org\Util\Category('Node',array('id','pid','node_name'));
		$data['rows'] = $Category->getList();
			if (!$data['rows']) $data['rows']=array();
			echo json_encode($data);
		}else{
		$this->display();
		}
	}
	
	public function add(){
		if(IS_POST){
			$data['node_name'] = I('post.node_name');
			$data['pid'] = I('post.pid');
			$data['controller'] = I('post.controller');
			$data['action'] = I('post.action');
			if($this->db->add($data)){
				showmsg(1, '添加成功', U('Node/lists'));
			}else{
				showmsg(0, '添加失败');
			}
		}else{
		 $node = $this->db->where(array('pid'=>0))->select();
		 $nodeArr = array();
		 foreach($node as $val){
		 	
		 	$val['node_name'] = "|-".$val['node_name'];
			 $nodeArr[] = $val;
		 }
		 $this->assign('node',$nodeArr);
		 $this->display();
		}
	}
	
	public function edit(){
		$id = I('id', 0, 'intval');
		if(IS_POST){
			$data['node_name'] = I('post.node_name');
			$data['pid'] = I('post.pid');
			$data['controller'] = I('post.controller');
			$data['action'] = I('post.action');
			if($this->db->where('id='.$id)->save($data)){
				showmsg(1, '修改成功', U('Node/lists'));
			}else{
				showmsg(0,'修改失败');
			}
		}else{

			$info = $this->db->where('id='.$id)->find();
		    $pid = $this->db->where('id='.$id)->getField('pid');
			$node = $this->db->where('id='.$pid)->find();
			
			$this->assign('node',$node);
			$this->assign('info',$info);
			$this->display('add');
		}

	}
	
	public function del(){
		$id = $_GET['id'];
		
		foreach($id as $ids){
			
			if($this->db->where('pid='.$ids)->find()){
				showmsg(0,'请先删除根节点下面的子节点');
				exit;
			};
		};
			
		$sqlmap['id'] = array("IN", $id);
		$this->db->where($sqlmap)->delete();
		$res['status']= '1';
		$res['info'] ='删除数据成功';
		$res['url'] = U('AdminAuth/lists');
		echo json_encode($res);
	}
	
}	