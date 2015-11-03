<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace Org\Util;
/**
 * Auth 权限类
 * @category   Think
 * @package  Think
 * @subpackage  Util
 * @author    方宇超 <434497271@qq.com>
 */
class Auth {
       
      //获取管理员分组ID 
      public function getGroupId(){
        $group_id =M('Admin')->where('id='.session('ADMIN_ID'))->getField('group_id');
        return $group_id;
      } 


      //获取管理员权限列表
      public function getAuthList(){
         $group_id = $this->getGroupId();
         $rules= M('Admin_auth')->where('id='.$group_id)->getField('rules');
         if (in_array(session('ADMIN_ID'),C('ADMIN_LIST'))) {
             $where = '' ;      //如果是超级管理员获取所有节点
         }else{
             $where = array('id'=>array('in',$rules));
         }

         $nodeList = M('Node')->where($where)->select();
         return  $nodeList;
      }

      //获取节点菜单
      public function getMenu($pid = 0){
        $node = $this->getAuthList();
        $pid = $pid?$pid:1;
        foreach ($node as $key => $val) {
           if ($val['pid'] == 0) {
            $menu['top'][$key] =$val;
            $menu['top'][$key]['url'] = U('Index/index',array('pid'=>$val['id']));
                if ($pid == $val['id']){
                        $menu['top'][$key]['css'] = "hover";
                }
           }
           if ($val['pid'] == $pid) {
            $menu['son'][$key] =$val;
            $menu['son'][$key]['url'] = U("{$val['controller']}/{$val['action']}");
                if (CONTROLLER_NAME == $val['controller'] && ACTION_NAME == $val['action']) {
                    $menu['son'][$key]['css'] = "hover";
                }
           }
        }   
             return $menu; 
      }

      //权限检测
      public function checkAuth(){
        if(in_array(session('ADMIN_ID'),C('ADMIN_LIST'))){//超级管理员不需要检测权限
        return TRUE;
        }
        
        $map['model'] = MODULE_NAME;
        $map['controller'] = CONTROLLER_NAME;
        $map['action'] =ACTION_NAME;
        
       $group_id =  $this->getGroupId();
       $rulesIds =  M('Admin_auth')->where('id='.$group_id)->getField('rules');
       $rulesIn = explode(',', $rulesIds);
       
       if($map['model'] == 'Admin' && $map['controller'] == 'Index' && $map['action'] == 'index'){//后台首页权限
        $nodeIn = TRUE;
       }else{
        $nodeIn = M('Node')->where($map)->getField('id');
       }    

       $r = !$nodeIn || in_array($nodeIn, $rulesIn);
       return $r;
      }

         
      
  
}
