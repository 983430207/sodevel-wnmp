<?php
namespace app\common\model;

/**
 * 普通用户模型类
 */
class User extends Base
{   

    /**
     * 获取用户信息
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getUser( $id ){
        $user = $this->where('id',$id)->find();
        if(!$user){
            return null;
        }
        return $user;
    }

    /**
     * 负责用户的添加、修改工作。
     * @param  [type] $r [description]
     * @return [type]    [description]
     */
    public function storage( $r, $scene = null ){
        //数据格式验证
        $validate = new \app\common\validate\User();

        if( !$scene ){
            $scene = $r['id'] ? 'modify' : 'add';
        }
        
        if( !$validate->scene( $scene )->check($r) ){
            return exception($validate->getError(), 10001);
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
     * 检查用户状态
     * @return boolean [description]
     */
    public function isStatus(){
        if( $this->user_status <> 1 ){
            return '当前用户已被禁用，请联系管理员。';
        }
        return true;
    }

    /**
     * 获取器，增加简介的字段，来自内容的裁剪
     * @return [type] [description]
     */
    public function getBlogurlAttr(){
        return url("index/home/index",['id'=>$this->id]);
    }  
}