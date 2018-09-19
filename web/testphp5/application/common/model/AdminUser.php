<?php
namespace app\common\model;

/**
 * 管理员用户模型类
 */
class AdminUser extends Base
{   
    /**
     * 负责用户的添加、修改工作。
     * @param  [type] $r [description]
     * @return [type]    [description]
     */
    public function storage( $r ){
        //数据格式验证
        $validate = new \app\common\validate\AdminLogin();

        $scene = $r['id'] ? 'modify' : 'add';
        if( !$validate->scene( $scene )->check($r) ){
            return exception($validate->getError(), 10002);
        }

        $au = $this;
        //如果是修改模式，就获取目标数据对象
        if( $r['id'] ){
            $au = $this->where('id',$r['id'])->find();
        }

        //如果没有输入新密码，则禁止数据库更新该字段
        if( $r['password'] ){
            $r['password']  = password_hash($r['password'],PASSWORD_DEFAULT);
        }else{
            unset($r['password']);
        }
        $result = $au->allowField(true)->save($r);
    }

    /**
     * 删除数据的方法
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function remove($id){
        $item = $this->where('id',$id)->find();
        if(!$item){
            return exception('数据不存在', 10004);
        }
        $item->delete();
    }
}