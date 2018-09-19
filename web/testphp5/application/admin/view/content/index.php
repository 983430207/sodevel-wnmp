{extend name="glob/base" /}



{block name="content"}
<div class="page-header">
    <h1><span>内容</span> <small class='pull-right'><a href='{:url("admin/content/add")}' class='btn btn-primary'>添加</a></small></h1>
</div>

<div class='well'>
<form class="form-inline" action="{:url('admin/content/index')}" method="get">
    <div class="form-group">
        <label for="exampleInputName2">关键字</label>
        <input type="text" class="form-control" id='key' name='key' placeholder="请输入标题进行搜索" value='{$key|default=""}'>
    </div>
    <button type="submit" class="btn btn-default">搜索</button>
</form>
</div>

<div class="table-responsive">
<table class="table">
    <thead>
          <tr>
            <th>#</th>
            <th>标题</th>
            <th>管理员</th>
            <th>用户</th>
            <th>创建时间</th>
            <th>修改时间</th>
            <th>状态</th>
            <th>管理</th>
          </tr>
        </thead>
    <tbody>
    {volist name="cData" id="item"}
      <tr>
        <th scope="row">{$item->id}</th>
        <td>{$item->title}</td>
        <td>
            {$item->admin_user->username|default=''}
        </td>
        <td>
            {$item->user->nickname|default=''}
        </td>
        <td>{$item->create_time|date='Y-m-d H:i:s'}</td>
        <td>{$item->update_time|date='Y-m-d H:i:s'}</td>
        <td>
            {$content_status[ $item->content_status ]|raw}
        </td>
        <td>
            <a href='{:url("admin/content/modify",["id"=>$item->id])}' class='btn btn-default'>修改</a>
            
            <a href='{:url("admin/content/status",["id"=>$item->id,"status"=>$item->content_status])}' class='btn btn-danger'>切换状态</a>

            <a href='{:url("admin/content/del",["id"=>$item->id])}' class='btn btn-default'>删除</a>
        </td>
      </tr>
    {/volist}
    </tbody>
</table>
{$cData->render()|raw}
</div>
{/block}