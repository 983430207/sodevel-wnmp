<?php

namespace app\common\validate;

class AdminLogin extends \think\Validate{
    
    protected $rule = [
        'username'  => 'require|token',
        'password'  => 'require|min:1',
    ];

    protected $message = [
        'username.require' => '用户名不能为空',
        'username.checkUser' => '用户名不能重复',
        'password.require' => '密码不能为空',
    ];
    
    /**
     * 添加场景的验证规则补充
     * @return [type] [description]
     */
    public function sceneAdd(){
        return $this->append('username','checkUser');
    }

    /**
     * 修改场景的验证规则补充
     * @return [type] [description]
     */
    public function sceneModify(){
        return $this
            ->remove('password','require')
            ->append('username','checkUser');
    }

    /**
     * 检查用户名是否唯一
     * @param  [type] $str  [description]
     * @param  [type] $rule [description]
     * @param  [type] $r    [description]
     * @return [type]       [description]
     */
    protected function checkUser($str, $rule, $r){

        $adminuser = new \app\common\model\AdminUser();
        $row = $adminuser
            ->where('username',$str)
            ->where('id','<>', $r['id'])
            ->find();
        if( $row ){
            return false;
        }
        return true;
    }
}