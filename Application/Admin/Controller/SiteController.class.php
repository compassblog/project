<?php
namespace Admin\Controller;
use Think\Controller;
class SiteController extends BaseController{
	public function index(){
		$this->display();
	}

	public function insert(){
		$files = $_POST['files'];
		if (file_exists(CONF_PATH.$files)) {
			unset($_POST['files']);
			if ($this->updata_conf(daddslashes($_POST),CONF_PATH.$files)) {
				$this->success('操作成功');
			}else{
				$this->error('操作失败');
			}
		}
	}

	private function updata_conf($config,$files){
		if (file_put_contents($files, "<?php\nreturn " .stripslashes(var_export($config, true))."; ")) {
			return true;
		}else{
			return false;
		}
	}
}
