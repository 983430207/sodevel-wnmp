<?php

namespace app\common\validate;

class Setting extends \think\Validate{
    
    protected $rule = [
        'formdata'  => 'require|token',
    ];

    protected $message = [
        'formdata.require' => '数据不能为空',
    ];
    
}