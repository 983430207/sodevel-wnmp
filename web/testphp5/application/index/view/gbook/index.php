<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>留言板 www.sodevel.com 出品</title>
    </head>
    <body>
        <div class='container'>
            <div class="row">
                <form class="form-horizontal" action="<?php echo url('index/gbook/save');?>" method='post'>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea rows="5" name='content' class='form-control' placeholder="请输入留言"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <input type='text' name='username' class='form-control' placeholder="请输入用户名" />
                        </div>
                        <div class='col-sm-3'></div>
                        <div class="col-sm-6">
                            <input type='submit' class='btn btn-primary pull-right' value='提交留言'/>
                        </div>
                    </div>
                </form>
            </div>

        <?php foreach($rows as $row):?>
            <div class="row well">
                <div class='col-sm-8'>{$row.username}</div>
                <div class='col-sm-4'>
                    <span class='pull-right'>{$row.create_time|date='Y-m-d H:i:s'}</span>
                </div>
                <div class='col-sm-8'>
                    {$row.content}
                </div>
            </div>
        <?php endforeach;?>
        {$rows->render()|raw}


        </div>
    </body>
</html>