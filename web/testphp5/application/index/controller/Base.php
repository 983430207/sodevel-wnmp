<?php
namespace app\index\controller;
use app\common\model\User as U;
use app\common\model\Content as C;

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
        $this->assign('webname', setting('webname'));    
        $this->assign('tplType', 'two');

        //取出用户信息
        $u = new U();
        $user_id = (int) \think\facade\Session::get('id');
        $this->user = $u->getUser( $user_id );
        $this->assign('user', $this->user);

    }
}
