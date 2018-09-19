<?php

namespace app\facade;

class Setting extends \think\Facade{

    protected static function getFacadeClass(){
        return 'app\common\Setting';
    }
}