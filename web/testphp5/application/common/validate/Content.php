<?php

namespace app\common\validate;

class Content extends \think\Validate{
    
    protected $rule = [
        'title'  => 'require',
        'content'  => 'require',
        'content_status'  => 'require|integer',
    ];

    protected $message = [
        'title.require' => '标题不能为空',
        'content.require' => '内容不能为空',
        'content_status.require' => '状态不能为空',
        'content_status.integer' => '状态必须为有效的数字',
    ];
    
    /**
     * 添加场景的验证规则补充
     * @return [type] [description]
     */
    public function sceneAdd(){
    }

    /**
     * 修改场景的验证规则补充
     * @return [type] [description]
     */
    public function sceneModify(){
    }
}