<?php
namespace app\admin\controller;

class Login extends \think\Controller
{
    public function index()
    {
        //var_dump( password_hash('admin',PASSWORD_DEFAULT) );
        return view();
    }

    public function logout(){
        \think\facade\Session::delete('admin_id');
        return $this->redirect('admin/login/index');
    }

    public function check(){
        $r['username'] = $this->request->post('username');
        $r['password'] = $this->request->post('password');
        $r['__token__'] = $this->request->post('__token__');

        //数据格式验证
        $validate = new \app\common\validate\AdminLogin();
        if( !$validate->check($r) ){
            return $this->error($validate->getError());
        }

        $adminuser = new \app\common\model\AdminUser;

        $user = $adminuser->where('username',$r['username'])->find();
        if( !$user ){
            return $this->error('用户名不存在'); 
        }

        if( password_verify( $r['password'], $user->password ) !== true ){
            return $this->error('密码不正确'); 
        }

        \think\facade\Session::set('admin_id',$user->id);

        return $this->redirect('admin/index/index');
    }
}
