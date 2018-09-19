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
            <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{:url('/')}">{$webname}</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Link</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    {if !$user}
                    <li><a href="{:url('index/sign/in')}">登陆</a></li>
                    <li><a href="{:url('index/sign/up')}">注册</a></li>
                    {else}
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">欢迎 {$user->nickname} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="{:url('index/usercenter/index')}">个人中心</a></li>
                        <li><a href="{$user->blogurl}">个人主页</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{:url('index/sign/logout')}">退出</a></li>
                        </ul>
                    </li>
                    {/if}
                </ul>
            </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>        
        <div class='container'>
            <div class='row'>
                {if $tplType == 'one'}
                <div class='col-sm-12'>
                    {block name='content'}留给子模板继承{/block}
                </div>
                {/if}
                {if $tplType == 'two'}
                <div class='col-sm-3'>
                    {block name='sidebar'}
                        {include file='glob/sidebar_index' /}
                    {/block}
                </div>
                <div class='col-sm-9'>
                    {block name='content'}留给子模板继承{/block}
                </div>
                {/if}
            </div>
        </div>
        <div class='well text-center' style='height:150px'>
            版权所有 www.sodevel.com 2018
        </div>
    </body>
</html>