<?php
namespace app\admin\controller;
use app\common\model\User as U;

class User extends Base
{
    public function initialize(){
        parent::initialize();
        $this->user_status = config('project.user_status');
        $this->assign( 'user_status', $this->user_status );
    }

    public function index()
    {
        
        $key = trim($this->request->get('key'));

        $u = new U();

        //搜索条件
        if( $key ){
            $u = $u->where('username','like',"%{$key}%");
            $u = $u->whereOr('nickname','like',"%{$key}%");
            $u = $u->whereOr('phone',$key);
            $u = $u->whereOr('email',$key);
        }

        $uData = $u->order('id','desc')->paginate(10);

        $data = [
            'uData'    => $uData,
            'key'       => $key,
        ];
        return view(null, $data);
    }

    //添加用户 
    public function add()
    {
        $data = [
            'typeName'  => '添加'
        ];
        return view(null,$data);
    }

    //保存用户信息 
    public function save()
    {
        $r = [
            'id'  => $this->request->post('id'),
            'password'  => $this->request->post('password'),
            'nickname'  => $this->request->post('nickname'),
            'phone'  => $this->request->post('phone'),
            'email'  => $this->request->post('email'),
            'user_status'  => (int)$this->request->post('user_status'),
            '__token__'  => $this->request->post('__token__'),
        ];

        //如果你处于添加模式，则追加用户数据（编辑模式下不允许修改用户名）
        if( $r['id'] < 1 ){
            $r['username']  = $this->request->post('username');
        }


        //插入数据
        $u = new U();
        try{
            $u->storage( $r );
        }catch(\Exception $e){
            return $this->error( $e->getMessage() );
        }

        return $this->redirect('admin/user/index');
    }

    //修改用户 
    public function modify()
    {
        $id = $this->request->get('id');

        $u = new U();
        $item = $u->where('id',$id)->find();
        if(!$item){
            return $this->error('数据不存在');
        }

        $data = [
            'typeName'  => '修改',
            'disabled'  => 'disabled',
            'item'  => $item,
        ];
        return view('user/add',$data);
    }

    //管理用户状态
    public function status()
    {
        $status = (int)$this->request->get('status');
        $id = (int)$this->request->get('id');
        if( $id<1 ){
            return $this->error('数据无效');
        }

        $new_status = $status == 1 ? 0 : 1;
        $item = U::where('id',$id)->find();
        if( !$item ){
            return $this->error('数据无效');
        }
        $item->save([
            'user_status'   => $new_status
        ]);


        return $this->success("操作成功");
    }
}
