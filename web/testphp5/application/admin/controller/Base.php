<?php
namespace app\admin\controller;

/**
 * 后台基础控制器
 * 所有后台控制器，都应该作为它的子类存在
 */
class Base extends \think\Controller
{   
    /**
     * thinkphp 自定义的构造函数，功能等同于 __construct()
     * @return [type] [description]
     */
    function initialize(){
        //登陆状态验证
        $admin_id = \think\facade\Session::get('admin_id');
        if( !$admin_id ){
            return $this->error('当前页面需要登陆',url('admin/login/index'));
        }
        $user = new \app\common\model\AdminUser();
        $user = $user->where('id',$admin_id)->find();
        if( !$user ){
            return $this->error('当前页面需要登陆',url('admin/login/index'));
        } 

        //赋值类属性，方便子控制器调用
        $this->user = $user;

        $this->assign('user', $user); 
        $this->assign('webname', setting('webname'));   
    }
}
