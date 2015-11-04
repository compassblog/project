<?php
namespace Index\Controller;
use Think\Controller;
use Think\Log\Driver;
class PayController extends BaseController {

	public function _initialize(){
     parent::_initialize();
     $this->pDb= D('Project');
     $this->sDb= D('Stall');
     $this->uDb =D('Users');
     $this->cDb =M('Cart');
    }
    public function index(){
      $id  =I('get.id');
      $list = $this->sDb->where('id='.$id)->find();
      $balance = $this->uDb->where('id='.session('USERID'))->getField('balance');
      $this->assign('balance',$balance);
      $this->assign('proName',session('PRONAME'));
      $this->assign('price',$list['price']);
      $this->assign('sid',$id);
      $this->assign('address',session('ADDRESS'));
      $this->display();
    }

    //处理支付请求
    public function doPay(){
      $Log = new \Think\Log\Driver\File(array( 'log_path' =>  WEB_ROOT.'Pay/log/'));
      if (IS_POST) {           
          $sid = I('post.sid');
          $price = I('post.price');
          $balance = I('post.balance');
          //事物开启
          $model = M();
          $model->startTrans();

          if($balance < $price){
            $this->error('余额不足');
          }
          //余额减去操作
          $data['balance'] = $balance - $price;
          $re = $this->uDb->where('id='.session('USERID'))->save($data);
          
          //购物车状态操作
          $data['cart_status'] = 1;
          $res = $this->cDb->where('sid='.$sid)->save($data);
         
          if ($re && $res) {
             $model->commit();//完成数据库操作
             $Log->write('用户:' .session('USERNAME').'在'.date('Y-m-d H:i:s').'时间段完成了对（'.session('PRONAME').'）的支付，金额为'.$price.'元');

             $this->success('支付成功',U('Cart/my'));
          }else{
            $model->rollback();//回滚
            $Log->write('用户:' .session('USERNAME').'在'.date('Y-m-d H:i:s').'时间段对（'.session('PRONAME').'）进行支付，金额为'.$price.'元，交易失败');
             $this->success('支付失败',U('Cart/my'));
          }
        }else{
          $this->error('无效参数');
        }

    }

    public function delPay(){
      $Log = new \Think\Log\Driver\File(array( 'log_path' =>  WEB_ROOT.'Pay/log/'));
      $id = I('get.id');
      $price =I('get.price');
      $balance = $this->uDb->where('id='.session('USERID'))->getField('balance');
       //事物开启
          $model = M();
          $model->startTrans();

          $data['balance'] = $balance +$price;
          $re = $this->uDb->where('id='.session('USERID'))->save($data);

          $res = $this->cDb->where('id='.$id)->delete();

          if ($re && $res) {
             $model->commit();//完成数据库操作
              $Log->write('用户:' .session('USERNAME').'在'.date('Y-m-d H:i:s').'时间段完成了对（'.session('PRONAME').'）的支付进行了取消操作，金额为'.$price.'元');
             $this->success('取消成功',U('Cart/my'));
          }else{
             $model->rollback();//回滚
              $Log->write('用户:' .session('USERNAME').'在'.date('Y-m-d H:i:s').'时间段完成了对（'.session('PRONAME').'）的支付进行了取消操作，金额为'.$price.'元，取消失败');
             $this->error('取消失败',U('Cart/my'));
          }

    }
}