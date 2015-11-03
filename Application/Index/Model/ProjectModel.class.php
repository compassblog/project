<?php 
namespace Index\Model;
use Think\Model;
class ProjectModel extends Model {

	
 	protected $_auto = array (
      array('update_time','time',3,'function'), // 对update_time进行操作
  	);

}