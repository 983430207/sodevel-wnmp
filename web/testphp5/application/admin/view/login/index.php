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
        <title>留言板 www.sodevel.com 出品</title>
    </head>
    <body>
        <div class='container' style='margin-top:200px;'>
            <div class='row'>
                <div class='col-sm-4 col-sm-offset-4'>
                    <form class='well' action="{:url('admin/login/check')}" method="post">
                        {:token()}
                        <div class="form-group">
                            <label for="username">用户</label>
                            <input name='username' type="text" class="form-control" id="username" placeholder="请输入用户名">
                        </div>
                        <div class="form-group">
                            <label for="password">密码</label>
                            <input name='password' type="password" class="form-control" id="password" placeholder="请输入密码">
                        </div>

                        <button type="submit" class="btn btn-default">登陆</button>
                    </form>
                </div>
            </div>
        </div>
        
    </body>
</html>