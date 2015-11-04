<?php
namespace Index\Controller;
use Think\Controller;

class CartController extends BaseController{
	public function _initialize(){
		parent::_initialize();
		$this->pDb= D('Project');
		$this->sDb= D('Stall');
		$this->uDb =D('Users');
		$this->cDb =M('Cart');
	}

	public function my(){
		$uid = session('USERID');
		$list = $this->cDb->where('uid ='.$uid)->select();
        foreach ($list as $key => $val) {
        	$list[$key]['proname'] = session('PRONAME');
        }
        //dump($list);

		$this->assign('list',$list);
		$this->display();
	}

	public function cart(){
		//获取信息
		$id  = I('get.id');
		$uid = $this->sDb->getUid($id);
        $proName = $this->pDb->where('uid='.$uid)->getField('name');
        $list = $this->sDb->where('id='.$id)->find();
        // dump($list);
        $address = $this->uDb->where('id='.session('USERID'))->getField('address');
        //信息存入session
        session('PRONAME',$proName);
        // session('LIST',$list);
        session('ADDRESS',$address);
        //加入购物车
        // // 每位用户支持限制
        // $limitCount = $this->sDb->where('id='.$id)->getField('limit_user');//档位限制
        //  $count = $this->cDb->where('uid='.session('USERID') . ' and sid = ' .$list['id'])->count();
        //  //支持数量
        //  $count >= $limitCount
         // echo $count;
         // exit;

        if ($this->cDb->where('uid='.session('USERID') . ' and sid = ' .$list['id'] )->find()) {//如果存在不用重复添加
        	//$this->error('你对该档位的支持数量已经上限');
        }else{
	        $data['cart_name'] = $proName;
	        $data['cart_price'] = $list['price'];
	        $data['cart_img'] = $list['img'];
	        $data['uid'] = session('USERID');
	        $data['sid'] =$list['id'];

	        $this->cDb->add($data);
        }
        $this->assign('address',$address);
        $this->assign('proName',$proName);
        $this->assign('list',$list);
		$this->display();
	}
}
?>