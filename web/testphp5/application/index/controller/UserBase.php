<?php
namespace app\index\controller;
use app\common\model\User as U;

/**
 * 后台基础控制器
 * 所有后台控制器，都应该作为它的子类存在
 */
class UserBase extends Base
{   
    /**
     * thinkphp 自定义的构造函数，功能等同于 __construct()
     * @return [type] [description]
     */
    function initialize(){
        parent::initialize();
        if( !$this->user ){
            return $this->error('请先登录','index/sign/in');
        }
        if( ($msg = $this->user->isStatus()) !== true  ){
            return $this->error($msg,'index/sign/in');
        }
    }
}
