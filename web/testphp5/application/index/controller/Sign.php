<?php
namespace app\index\controller;

use app\common\model\User as U;

class Sign extends Base
{

    function initialize(){
        parent::initialize();
        $this->assign('tplType', 'one');  
    }

    public function index( \think\Request $request )
    {
        return view();
    }
    /**
     * 登陆表单页
     * @param  \think\Request $request [description]
     * @return [type]                  [description]
     */
    public function in( \think\Request $request )
    {
        return view();
    }
    /**
     * 登陆处理页
     * @param  \think\Request $request [description]
     * @return [type]                  [description]
     */
    public function in_check( \think\Request $request )
    {

        $r['username'] = $this->request->post('username');
        $r['password'] = $this->request->post('password');
        $r['__token__'] = $this->request->post('__token__');

        //数据格式验证
        $validate = new \app\common\validate\User();
        if( !$validate->scene('login')->check($r) ){
            return $this->error($validate->getError());
        }

        $u = new U;

        $user = $u->where('username',$r['username'])->find();
        if( !$user ){
            return $this->error('用户名不存在'); 
        }

        if( password_verify( $r['password'], $user->password ) !== true ){
            return $this->error('密码不正确'); 
        }

        if( ($msg = $user->isStatus()) !== true  ){
            return $this->error($msg,'index/sign/in');
        }

        \think\facade\Session::set('id',$user->id);

        return $this->redirect('index/u/index');
    }
       
    /**
     * 注册表单页
     * @param  \think\Request $request [description]
     * @return [type]                  [description]
     */
    public function up( \think\Request $request )
    {
        return view();
    }
    /**
     * 处理注册页
     * @param  \think\Request $request [description]
     * @return [type]                  [description]
     */
    public function up_save( \think\Request $request )
    {
        $r = [
            'id'  => 0,
            'username'  => $this->request->post('username'),
            'password'  => $this->request->post('password'),
            'nickname'  => $this->request->post('nickname'),
            'phone'  => $this->request->post('phone'),
            'email'  => $this->request->post('email'),
            'user_status'  => setting("reg_status"),
            '__token__'  => $this->request->post('__token__'),
        ];
        //var_dump($r);exit;


        //插入数据
        $u = new U();
        try{
            $u->storage( $r );
        }catch(\Exception $e){
            return $this->error( $e->getMessage() );
        }

        return $this->redirect('index/sign/in');
    }

    //退出登陆
    public function logout(){
        \think\facade\Session::delete('id');
        return $this->redirect('index/sign/in');
    }
}
