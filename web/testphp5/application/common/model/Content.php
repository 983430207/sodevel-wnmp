<?php
namespace app\common\model;

/**
 * 内容模型类
 */
class Content extends Base
{   
    public function adminUser()
    {
        return $this->belongsTo('AdminUser');
    } 
    public function user()
    {
        return $this->belongsTo('User');
    }

    /**
     * 删除数据的方法
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function remove($id, $user_id = null){

        $obj = $this;
        if( $user_id ){
            $obj = $obj->my( $user_id );
        }

        $item = $obj->where('id',$id)->find();
        if(!$item){
            return exception('数据不存在', 10003);
        }
        $item->delete();
    }

    /**
     * 负责内容的添加、修改工作。
     * @param  [type] $r [description]
     * @return [type]    [description]
     */
    public function storage( $r , $user_id = null ){
        //数据格式验证
        $validate = new \app\common\validate\Content();

        $scene = $r['id'] ? 'modify' : 'add';
        if( !$validate->scene( $scene )->check($r) ){
            return exception($validate->getError(), 10005);
        }

        $content = $this;
        //如果是修改模式，就获取目标数据对象
        if( $r['id'] ){
            //如果传入user_id 就必须附加范围查询：my
            $obj = $this;
            if( $user_id ){
                $obj = $this->my( $user_id );
            }

            $content = $obj->where('id',$r['id'])->find();
            //如果最终没有取得数据，就抛出错误
            if( !$content ){
                return exception('数据不存在', 1010);
            }
        }
        $result = $content->allowField(true)->save($r);
    } 

    /**
     * 查询指定用户 的数据
     * @param  [type] $query   [description]
     * @param  [type] $user_id [description]
     * @return [type]          [description]
     */
    public function scopeMy($query,$user_id)
    {
        $query->where('user_id',$user_id);
    }    

    /**
     * 获取器，增加简介的字段，来自内容的裁剪
     * @return [type] [description]
     */
    public function getIntroAttr(){
        return mb_substr(strip_tags($this->content),0,180);
    }   

    /**
     * 获取器，增加内容的访问地址字段，来自内容的裁剪
     * @return [type] [description]
     */
    public function getUrlAttr(){
        return url("index/index/read",['id'=>$this->id]);
    }   

    /**
     * 获取器，增加图片的字段，来自内容的裁剪
     * @return [type] [description]
     */
    public function getImageAttr(){
        $is = preg_match("/<img.*?src=('|\")(.*?)('|\")/i",$this->content,$image);
        if($is){
            return $image[2];
        }else{
            return url("static/images/default.jpg");
        }
    }

}