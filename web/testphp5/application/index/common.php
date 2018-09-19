<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

use app\common\model\User as U;
use app\common\model\Content as C;

//获取优秀博主
function getNewUsers($number=5){

    //获取优秀博主
    $newUsers = U::where('user_status',1)->order('id','desc')->limit($number)->select();
    return $newUsers;
}

/**
 * 获取优秀博文
 * @param  integer $number [description]
 * @return [type]          [description]
 */
function getGoodBlogs($number=5){
    //获取优秀博文
    $goodIds = setting('good_contents');
    $newBlogs = C::where('id','in',$goodIds)->where('content_status',1)->order('id','desc')->limit($number)->select();
    return $newBlogs;
}