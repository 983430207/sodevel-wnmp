<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------



Route::get('/', 'index/index/index');

//个人主页
Route::get('/home/:id', 'index/Home/index')->pattern(['id' => '\d+']);
Route::get('/read/:id', 'index/Index/read')->pattern(['id' => '\d+']);


Route::get('test', 'index/Test/index');

Route::get('signup', 'index/sign/up');
Route::post('signup', 'index/sign/up_save');

Route::get('signin', 'index/sign/in');
Route::post('signin', 'index/sign/in_check');

Route::get('logout', 'index/sign/logout');

#提交留言
Route::post('gbook/save','index/gbook/save');
#留言首页
Route::get('gbook','index/gbook/index');

# 个人中心
Route::group('u', function () {
    Route::get('index','index/UserCenter/index');
    Route::get('profile','index/UserCenter/profile');
    Route::post('profile','index/UserCenter/profile_save');

    Route::get('blog/index','index/UserBlog/index');
    Route::get('blog/add','index/UserBlog/add');
    Route::get('blog/modify','index/UserBlog/modify');
    Route::post('blog/save','index/UserBlog/save');
    //管理内容状态，
    Route::get('blog/status','index/UserBlog/status');  
    
    //删除内容
    Route::get('blog/del','index/UserBlog/del'); 

    Route::post('blog/up','index/UserBlog/up');  
});

//后台路由
Route::group('admin', function () {
    #后台首页
    Route::get('index','admin/index/index');

    Route::group('login', function () {
        Route::post('check','admin/Login/check');
        Route::get('logout','admin/Login/logout');
        Route::get('/','admin/Login/index');
    });

    # 系统配置路由
    Route::group('setting', function () {
        Route::get('index','admin/Setting/index');
        Route::post('save','admin/Setting/save');
    });


    //管理员管理
    Route::group('auser', function () {
        Route::get('index','admin/auser/index');
        Route::get('add','admin/auser/add');
        Route::post('save','admin/auser/save');

        Route::get('modify','admin/auser/modify');
        Route::get('del','admin/auser/del');        
    });

    //用户管理
    Route::group('user', function () {
        Route::get('index','admin/user/index');
        Route::get('add','admin/user/add');
        Route::post('save','admin/user/save');

        Route::get('modify','admin/user/modify');
        //管理用户状态，
        Route::get('status','admin/user/status');        
    });

    //内容管理
    Route::group('content', function () {
        Route::get('index','admin/content/index');
        Route::get('add','admin/content/add');
        Route::post('save','admin/content/save');

        Route::post('up','admin/content/up');

        Route::get('modify','admin/content/modify');
        //管理内容状态，
        Route::get('status','admin/content/status');  
        
        //删除内容
        Route::get('del','admin/content/del');       
    });
});




return [

];
