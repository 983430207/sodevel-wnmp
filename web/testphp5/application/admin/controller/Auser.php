<?php
namespace app\admin\controller;

use app\common\model\AdminUser as AU;

class Auser extends Base
{
    public function index()
    {
        $au = new AU();
        $auData = $au->order('id','asc')->select();

        $data = [
            'auData'    => $auData,
        ];
        return view(null, $data);
    }

    /**
     * 添加和修改用户
     * @return [type] [description]
     */
    public function save()
    {
        $r = [
            'username'  => $this->request->post('username'),
            'password'  => $this->request->post('password'),
            '__token__' => $this->request->post('__token__'),
            'id' => $this->request->post('id'),
        ];
        //插入数据
        $au = new AU();
        try{
            $au->storage( $r );
        }catch(\Exception $e){
            return $this->error( $e->getMessage() );
        }       
        
        return $this->redirect("admin/auser/index");
    }

    /**
     * 添加用户的页面
     */
    public function add()
    {
        $data = [
            'typeName'  => '添加'
        ];
        return view(null,$data);
    }

    /**
     * 修改用户的页面
     * @return [type] [description]
     */
    public function modify()
    {
        $id = $this->request->get('id');

        $au = new AU();
        $item = $au->where('id',$id)->find();
        if(!$item){
            return $this->error('数据不存在');
        }

        $data = [
            'typeName'  => '修改',
            'item'  => $item,
        ];
        return view('auser/add',$data);
    }

    /**
     * 删除数据
     * @return [type] [description]
     */
    public function del()
    {
        $id = $this->request->get('id');

        $au = new AU();
        try{
            $au->remove( $id );
        }catch(\Exception $e){
            return $this->error( $e->getMessage() );
        }
        return $this->redirect('admin/auser/index');
    }
}
