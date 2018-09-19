<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>        
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        {block name='header'}{/block}
        <title>{$webname}{block name='webname'}{/block}</title>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{:url('/admin/index')}">Admin CP</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Link</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">欢迎 {$user->username} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="#">暂留</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{:url('admin/login/logout')}">退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>        
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-sm-2'>
                    <div class="list-group">
                        <a class="list-group-item active">
                            系统设置
                        </a>
                        <a href="{:url('admin/setting/index')}" class="list-group-item">基础设置</a>
                        <a href="{:url('admin/auser/index')}" class="list-group-item">管理员设置</a>
                    </div>
                    <div class="list-group">
                        <a class="list-group-item active">
                            用户管理
                        </a>
                        <a href="{:url('admin/user/index')}" class="list-group-item">所有用户</a>
                    </div>
                    <div class="list-group">
                        <a class="list-group-item active">
                            内容管理
                        </a>
                        <a href="{:url('admin/content/index')}" class="list-group-item">所有内容</a>
                    </div>

                </div>
                <div class='col-sm-10'>
                    {block name='content'}留给子模板继承{/block}
                </div>
            </div>
        </div>
        
    </body>
</html>