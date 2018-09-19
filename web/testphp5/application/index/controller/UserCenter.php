<?php
namespace app\index\controller;
use app\common\model\User as U;

//use think\Db;

class UserCenter extends UserBase
{
    public function index( \think\Request $request )
    {
        return view();
    }
    //个人资料表单
    public function profile( \think\Request $request )
    {
        return view();
    }
    //处理资料修改请求
    public function profile_save( \think\Request $request )
    {
        $r = [
            'id'  => $this->user->id,
            'password'  => $this->request->post('password'),
            'nickname'  => $this->request->post('nickname'),
            'phone'  => $this->request->post('phone'),
            'email'  => $this->request->post('email'),
            '__token__'  => $this->request->post('__token__'),
        ];

        //修改数据
        $u = new U();
        try{
            $u->storage( $r, 'profile' );
        }catch(\Exception $e){
            return $this->error( $e->getMessage() );
        }

        return $this->success('资料修改成功');
    }
}
