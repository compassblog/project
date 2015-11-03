<?php 
namespace Index\Model;
use Think\Model;
class StallModel extends Model {

	protected $_validate = array(     

	
	array('price','','档位金额已经存在！',0,'unique',1),//在新增的时候验证name字段是否唯一 
	array('password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理         
	
	);

	protected $_auto = array (
      array('update_time','time',3,'function'), // 对update_time进行操作
  	);

  	public function toExamine($id){
  		$data['status'] = 1;
  		$re = $this->where('id='.$id)->save($data);
  		if ($re) {
  			return  ture;
  		}else{
  			return false;
  		}
  	}

  	public function getStallList($uid){
  		$list = $this->where('uid='.$uid)->select();
  		return $list;
  	}

  	public function delStall($id){

  		$img = $this->where('id='.$id)->getField('img');


  		$image = '.'.$img;

  	
  		
  		if (is_file($image)) {
  			unlink($image);
  		}

        $re = $this->delete($id);
  		if ($re) {
  			return ture;
  		}else{
  			return false;
  		}
  	}
}